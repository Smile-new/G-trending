<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PublicacionModel;
use App\Models\CategoriaModel; // Necesario para el dropdown de categorías
use App\Models\UsuarioModel;   // Necesario para el dropdown de usuarios
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\ResponseInterface;

class Publicaciones extends BaseController
{
    protected $publicacionModel;
    protected $categoriaModel;
    protected $usuarioModel; // Not strictly needed for 'store' if auto-detecting author, but useful for 'create' and 'edit' views

    public function __construct()
    {
        $this->publicacionModel = new PublicacionModel();
        $this->categoriaModel = new CategoriaModel();
        $this->usuarioModel = new UsuarioModel(); // Keep for dropdown in edit/create views if needed later
        helper(['form', 'url', 'filesystem']); // Carga helpers necesarios, 'filesystem' para unlink
    }

    /**
     * Muestra la lista de publicaciones.
     *
     * @return string
     */
    public function index(): string
    {
        $data = [
            'page_title'    => 'Gestión de Publicaciones',
            'publicaciones' => $this->publicacionModel
                                        ->select('publicaciones_encuesta.*, categorias_encuesta.nombre as categoria_nombre, usuarios.nombre_usuario as usuario_nombre')
                                        ->join('categorias_encuesta', 'categorias_encuesta.id = publicaciones_encuesta.categoria_id')
                                        ->join('usuarios', 'usuarios.id = publicaciones_encuesta.usuario_id')
                                        ->findAll(),
        ];
        // Asegúrate de que tus vistas estén en 'app/Views/dashboard/'
        return view('dashboard/publicaciones', $data);
    }

    /**
     * Muestra el formulario para crear una nueva publicación.
     *
     * @return string
     */
    public function create(): string
    {
        $data = [
            'page_title' => 'Crear Nueva Publicación',
            'categorias' => $this->categoriaModel->findAll(),
            // No pasamos 'usuarios' para el dropdown si el autor se auto-detecta
            'validation' => \Config\Services::validation(),
        ];
        // Make sure your view 'create_publicaciones' doesn't have the usuario_id dropdown
        return view('dashboard/create_publicaciones', $data);
    }

    /**
     * Guarda una nueva publicación en la base de datos.
     *
     * @return RedirectResponse
     */
    public function store(): RedirectResponse
    {
        // 1. Get logged-in user ID
        // IMPORTANT: Adjust 'user_id' to the actual session key your authentication uses
        $loggedInUserId = session()->get('user_id');

        if (empty($loggedInUserId)) {
            session()->setFlashdata('error', 'Debes iniciar sesión para crear una publicación.');
            return redirect()->to(base_url('login')); // Redirect to login if not logged in
        }

        $rules = [
            'titulo'            => 'required|min_length[3]|max_length[255]',
            'descripcion'       => 'permit_empty|max_length[65535]', // Adjusted max_length for CKEditor content (TEXT/LONGTEXT in DB)
            'fecha_publicacion' => 'required|valid_date',
            'ruta_foto'         => 'permit_empty|uploaded[ruta_foto]|max_size[ruta_foto,2048]|ext_in[ruta_foto,jpg,jpeg,png]',
            'ruta_pdf'          => 'permit_empty|uploaded[ruta_pdf]|max_size[ruta_pdf,5120]|ext_in[ruta_pdf,pdf]',
            'categoria_id'      => 'required|integer|is_not_unique[categorias_encuesta.id]',
            // 'usuario_id' rule is removed as it's not from form input anymore
            'activo'            => 'permit_empty|integer|in_list[0,1]',
        ];

        // Set custom error messages if needed for better UX
        $messages = [
            'titulo' => [
                'required'   => 'El título es obligatorio.',
                'min_length' => 'El título debe tener al menos {param} caracteres.',
                'max_length' => 'El título no debe exceder los {param} caracteres.',
            ],
            'fecha_publicacion' => [
                'required'   => 'La fecha de publicación es obligatoria.',
                'valid_date' => 'La fecha de publicación no es válida.',
            ],
            'ruta_foto' => [
                'uploaded' => 'Por favor, sube una imagen para la publicación.',
                'max_size' => 'La imagen es demasiado grande. El tamaño máximo es de {param} KB.',
                'is_image' => 'El archivo subido no es una imagen válida.',
                'mime_in'  => 'Solo se permiten imágenes JPG, JPEG y PNG.',
            ],
            'ruta_pdf' => [
                'uploaded' => 'Por favor, sube un archivo PDF para la publicación.',
                'max_size' => 'El archivo PDF es demasiado grande. El tamaño máximo es de {param} KB.',
                'ext_in'   => 'Solo se permiten archivos PDF.',
            ],
            'categoria_id' => [
                'required'     => 'La categoría es obligatoria.',
                'integer'      => 'La categoría seleccionada no es válida.',
                'is_not_unique'=> 'La categoría seleccionada no existe.',
            ],
        ];


        if (!$this->validate($rules, $messages)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $rutaFoto = null;
        $fileFoto = $this->request->getFile('ruta_foto');
        if ($fileFoto && $fileFoto->isValid() && !$fileFoto->hasMoved()) {
            $newNameFoto = $fileFoto->getRandomName();
            // Using FCPATH for direct public folder access
            $imageUploadPath = FCPATH . PUBLICACIONES_IMAGE_UPLOAD_PATH;
            // Ensure the directory exists
            if (!is_dir($imageUploadPath)) {
                mkdir($imageUploadPath, 0777, true);
            }
            $fileFoto->move($imageUploadPath, $newNameFoto);
            $rutaFoto = PUBLICACIONES_IMAGE_UPLOAD_PATH . '/' . $newNameFoto;
        }

        $rutaPdf = null;
        $filePdf = $this->request->getFile('ruta_pdf');
        if ($filePdf && $filePdf->isValid() && !$filePdf->hasMoved()) {
            $newNamePdf = $filePdf->getRandomName();
            // Using FCPATH for direct public folder access
            $pdfUploadPath = FCPATH . PUBLICACIONES_PDF_UPLOAD_PATH;
            // Ensure the directory exists
            if (!is_dir($pdfUploadPath)) {
                mkdir($pdfUploadPath, 0777, true);
            }
            $filePdf->move($pdfUploadPath, $newNamePdf);
            $rutaPdf = PUBLICACIONES_PDF_UPLOAD_PATH . '/' . $newNamePdf;
        }

        $data = [
            'titulo'            => $this->request->getPost('titulo'),
            'descripcion'       => $this->request->getPost('descripcion'),
            'fecha_publicacion' => $this->request->getPost('fecha_publicacion'),
            'ruta_foto'         => $rutaFoto,
            'ruta_pdf'          => $rutaPdf,
            'categoria_id'      => $this->request->getPost('categoria_id'),
            'usuario_id'        => $loggedInUserId, // Automatically assign logged-in user ID
            'activo'            => $this->request->getPost('activo') ? 1 : 0,
            'fecha_creacion'    => date('Y-m-d H:i:s'), // Add creation timestamp
            'fecha_actualizacion' => date('Y-m-d H:i:s'), // Add update timestamp
        ];

        if ($this->publicacionModel->insert($data)) { // Use insert() for new records
            session()->setFlashdata('success', 'Publicación "' . esc($data['titulo']) . '" creada exitosamente.');
        } else {
            session()->setFlashdata('error', 'Error al crear la publicación. Inténtelo de nuevo.');
            // You might want to log the errors from the model if save() returns false
            // error_log(json_encode($this->publicacionModel->errors()));
        }

        return redirect()->to(base_url('publicacion'));
    }

    /**
     * Muestra el formulario para editar una publicación existente.
     *
     * @param int|null $id ID de la publicación a editar.
     * @return string
     * @throws \CodeIgniter\Exceptions\PageNotFoundException Si la publicación no es encontrada.
     */
    public function edit(?int $id = null): string
    {
        $publicacion = $this->publicacionModel->find($id);

        if (!$publicacion) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('No se pudo encontrar la publicación con ID: ' . $id);
        }

        $data = [
            'page_title'  => 'Editar Publicación',
            'publicacion' => $publicacion,
            'categorias'  => $this->categoriaModel->findAll(),
            'usuarios'    => $this->usuarioModel->findAll(), // Keep for editing view, allows changing author if needed
            'validation'  => \Config\Services::validation(),
        ];
        return view('dashboard/update_publicaciones', $data);
    }

    /**
     * Actualiza una publicación existente en la base de datos.
     *
     * @param int $id ID de la publicación a actualizar.
     * @return RedirectResponse
     * @throws \CodeIgniter\Exceptions\PageNotFoundException Si la publicación no es encontrada.
     */
    public function update(int $id): RedirectResponse
    {
        $publicacionExistente = $this->publicacionModel->find($id);
        if (!$publicacionExistente) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('No se pudo encontrar la publicación con ID: ' . $id);
        }

        $rules = [
            'titulo'            => 'required|min_length[3]|max_length[255]',
            'descripcion'       => 'permit_empty|max_length[65535]',
            'fecha_publicacion' => 'required|valid_date',
            // 'if_exist' allows the field to be optional if no new file is uploaded
            'ruta_foto'         => 'if_exist|uploaded[ruta_foto]|max_size[ruta_foto,2048]|is_image[ruta_foto]|mime_in[ruta_foto,image/jpg,image/jpeg,image/png]',
            'ruta_pdf'          => 'if_exist|uploaded[ruta_pdf]|max_size[ruta_pdf,5120]|ext_in[ruta_pdf,pdf]',
            'categoria_id'      => 'required|integer|is_not_unique[categorias_encuesta.id]',
            'usuario_id'        => 'required|integer|is_not_unique[usuarios.id]', // Keep this for update, as it's explicitly sent from form
            'activo'            => 'permit_empty|integer|in_list[0,1]',
        ];

        $messages = [ /* ... same custom messages as in store method ... */ ]; // Copy from store if needed

        if (!$this->validate($rules, $messages)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $rutaFoto = $publicacionExistente['ruta_foto']; // Mantener la foto existente por defecto
        $fileFoto = $this->request->getFile('ruta_foto');
        if ($fileFoto && $fileFoto->isValid() && !$fileFoto->hasMoved()) {
            // Eliminar foto antigua si existe, usando la ruta absoluta
            if (!empty($publicacionExistente['ruta_foto']) && file_exists(FCPATH . $publicacionExistente['ruta_foto'])) {
                unlink(FCPATH . $publicacionExistente['ruta_foto']);
            }
            $newNameFoto = $fileFoto->getRandomName();
            $imageUploadPath = FCPATH . PUBLICACIONES_IMAGE_UPLOAD_PATH;
            if (!is_dir($imageUploadPath)) {
                mkdir($imageUploadPath, 0777, true);
            }
            $fileFoto->move($imageUploadPath, $newNameFoto);
            $rutaFoto = PUBLICACIONES_IMAGE_UPLOAD_PATH . '/' . $newNameFoto; // Guarda la ruta relativa
        } elseif ($this->request->getPost('remove_ruta_foto') == 1) { // If checkbox for removing photo is checked
            if (!empty($publicacionExistente['ruta_foto']) && file_exists(FCPATH . $publicacionExistente['ruta_foto'])) {
                unlink(FCPATH . $publicacionExistente['ruta_foto']);
            }
            $rutaFoto = null;
        }


        $rutaPdf = $publicacionExistente['ruta_pdf']; // Mantener el PDF existente por defecto
        $filePdf = $this->request->getFile('ruta_pdf');
        if ($filePdf && $filePdf->isValid() && !$filePdf->hasMoved()) {
            // Eliminar PDF antiguo si existe, usando la ruta absoluta
            if (!empty($publicacionExistente['ruta_pdf']) && file_exists(FCPATH . $publicacionExistente['ruta_pdf'])) {
                unlink(FCPATH . $publicacionExistente['ruta_pdf']);
            }
            $newNamePdf = $filePdf->getRandomName();
            $pdfUploadPath = FCPATH . PUBLICACIONES_PDF_UPLOAD_PATH;
            if (!is_dir($pdfUploadPath)) {
                mkdir($pdfUploadPath, 0777, true);
            }
            $filePdf->move($pdfUploadPath, $newNamePdf);
            $rutaPdf = PUBLICACIONES_PDF_UPLOAD_PATH . '/' . $newNamePdf; // Guarda la ruta relativa
        } elseif ($this->request->getPost('remove_ruta_pdf') == 1) { // If checkbox for removing PDF is checked
            if (!empty($publicacionExistente['ruta_pdf']) && file_exists(FCPATH . $publicacionExistente['ruta_pdf'])) {
                unlink(FCPATH . $publicacionExistente['ruta_pdf']);
            }
            $rutaPdf = null;
        }

        $data = [
            'titulo'            => $this->request->getPost('titulo'),
            'descripcion'       => $this->request->getPost('descripcion'),
            'fecha_publicacion' => $this->request->getPost('fecha_publicacion'),
            'ruta_foto'         => $rutaFoto,
            'ruta_pdf'          => $rutaPdf,
            'categoria_id'      => $this->request->getPost('categoria_id'),
            'usuario_id'        => $this->request->getPost('usuario_id'), // Get directly from form for update
            'activo'            => $this->request->getPost('activo') ? 1 : 0,
            'fecha_actualizacion' => date('Y-m-d H:i:s'), // Update timestamp on modification
        ];

        if ($this->publicacionModel->update($id, $data)) {
            session()->setFlashdata('success', 'Publicación "' . esc($data['titulo']) . '" actualizada exitosamente.');
        } else {
            session()->setFlashdata('error', 'Error al actualizar la publicación.');
            // error_log(json_encode($this->publicacionModel->errors()));
        }

        return redirect()->to(base_url('publicacion'));
    }

    /**
     * Elimina una publicación de la base de datos.
     *
     * @param int|null $id ID de la publicación a eliminar.
     * @return RedirectResponse
     */
    public function delete(?int $id = null): RedirectResponse
    {
        $publicacion = $this->publicacionModel->find($id);

        if (!$publicacion) {
            session()->setFlashdata('error', 'Publicación no encontrada.');
            return redirect()->to(base_url('publicacion'));
        }

        // Eliminar archivos asociados si existen, usando la ruta absoluta
        // Use FCPATH for absolute path to public directory
        if (!empty($publicacion['ruta_foto']) && file_exists(FCPATH . $publicacion['ruta_foto'])) {
            unlink(FCPATH . $publicacion['ruta_foto']);
        }
        if (!empty($publicacion['ruta_pdf']) && file_exists(FCPATH . $publicacion['ruta_pdf'])) {
            unlink(FCPATH . $publicacion['ruta_pdf']);
        }

        if ($this->publicacionModel->delete($id)) {
            session()->setFlashdata('success', 'Publicación "' . esc($publicacion['titulo']) . '" eliminada exitosamente.');
        } else {
            session()->setFlashdata('error', 'Error al eliminar la publicación.');
        }

        return redirect()->to(base_url('publicacion'));
    }
}