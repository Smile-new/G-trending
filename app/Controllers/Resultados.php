<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PublicacionModel;
use App\Models\CategoriaModel;
use App\Models\UsuarioModel;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\ResponseInterface;

class Resultados extends BaseController
{
    protected $publicacionModel;
    protected $categoriaModel;
    protected $usuarioModel;
    protected $helpers = ['form', 'url', 'filesystem']; // Ensure all necessary helpers are loaded

    public function __construct()
    {
        $this->publicacionModel = new PublicacionModel();
        $this->categoriaModel = new CategoriaModel();
        $this->usuarioModel = new UsuarioModel();
    }

    /**
     * Muestra la lista de resultados.
     *
     * @return string
     */
    public function index(): string
    {
        $data = [
            'page_title'    => 'Gestión de Resultados',
            'publicaciones' => $this->publicacionModel
                ->select('publicaciones_encuesta.*, categorias_encuesta.nombre as categoria_nombre, usuarios.nombre_usuario as usuario_nombre')
                ->join('categorias_encuesta', 'categorias_encuesta.id = publicaciones_encuesta.categoria_id')
                ->join('usuarios', 'usuarios.id = publicaciones_encuesta.usuario_id')
                ->findAll(),
        ];
        return view('dashboard/resultados', $data);
    }

    /**
     * Muestra el formulario para crear un nuevo resultado.
     *
     * @return string
     */
    public function create(): string
    {
        $data = [
            'page_title' => 'Crear Nuevo Resultado',
            'categorias' => $this->categoriaModel->findAll(),
            'validation' => \Config\Services::validation(),
        ];
        return view('dashboard/create_resultados', $data);
    }

    /**
     * Guarda un nuevo resultado en la base de datos.
     *
     * @return RedirectResponse
     */
    public function store(): RedirectResponse
    {
        // IMPORTANT: Check your login process for the actual session key.
        // If your login sets 'user_id', change 'id_usuario' back to 'user_id'.
        $loggedInUserId = session()->get('id_usuario'); 

        if (empty($loggedInUserId)) {
            session()->setFlashdata('error', 'Debes iniciar sesión para crear un resultado.');
            return redirect()->to(base_url('login')); // Redirect to login if not logged in
        }

        $rules = [
            'titulo'              => 'required|min_length[3]|max_length[255]',
            'descripcion'         => 'permit_empty|max_length[65535]',
            'fecha_publicacion'   => 'required|valid_date',
            'ruta_foto'           => 'permit_empty|uploaded[ruta_foto]|max_size[ruta_foto,2048]|is_image[ruta_foto]|mime_in[ruta_foto,image/jpg,image/jpeg,image/png]',
            'ruta_pdf'            => 'permit_empty|uploaded[ruta_pdf]|max_size[ruta_pdf,5120]|ext_in[ruta_pdf,pdf]',
            'categoria_id'        => 'required|integer|is_not_unique[categorias_encuesta.id]',
            'activo'              => 'permit_empty|integer|in_list[0,1]',
        ];

        $messages = [
            'titulo' => [
                'required'   => 'El título es obligatorio.',
                'min_length' => 'El título debe tener al menos {param} caracteres.',
                'max_length' => 'El título no debe exceder los {param} caracteres.',
            ],
            'descripcion' => [
                'max_length' => 'La descripción es demasiado larga.',
            ],
            'fecha_publicacion' => [
                'required'   => 'La fecha de publicación es obligatoria.',
                'valid_date' => 'La fecha de publicación no es válida.',
            ],
            'ruta_foto' => [
                'uploaded' => 'Por favor, selecciona una imagen para subir (si aplica).',
                'max_size' => 'La imagen es demasiado grande. El tamaño máximo es de {param} KB.',
                'is_image' => 'El archivo subido no es una imagen válida.',
                'mime_in'  => 'Solo se permiten imágenes JPG, JPEG y PNG.',
            ],
            'ruta_pdf' => [
                'uploaded' => 'Por favor, selecciona un archivo PDF para subir (si aplica).',
                'max_size' => 'El archivo PDF es demasiado grande. El tamaño máximo es de {param} KB.',
                'ext_in'   => 'Solo se permiten archivos PDF.',
            ],
            'categoria_id' => [
                'required'      => 'La categoría es obligatoria.',
                'integer'       => 'La categoría seleccionada no es válida.',
                'is_not_unique' => 'La categoría seleccionada no existe.',
            ],
            'activo' => [
                'integer' => 'El valor de activo no es válido.',
                'in_list' => 'El valor de activo no es válido.',
            ]
        ];

        if (!$this->validate($rules, $messages)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $rutaFoto = null;
        $fileFoto = $this->request->getFile('ruta_foto');
        if ($fileFoto && $fileFoto->isValid() && !$fileFoto->hasMoved()) {
            $newNameFoto = $fileFoto->getRandomName();
            // Using FCPATH for absolute path to ensure correct directory creation and movement
            $imageUploadPath = FCPATH . PUBLICACIONES_IMAGE_UPLOAD_PATH; 
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
            // Using FCPATH for absolute path
            $pdfUploadPath = FCPATH . PUBLICACIONES_PDF_UPLOAD_PATH;
            if (!is_dir($pdfUploadPath)) {
                mkdir($pdfUploadPath, 0777, true);
            }
            $filePdf->move($pdfUploadPath, $newNamePdf);
            $rutaPdf = PUBLICACIONES_PDF_UPLOAD_PATH . '/' . $newNamePdf;
        }

        $data = [
            'titulo'              => $this->request->getPost('titulo'),
            'descripcion'         => $this->request->getPost('descripcion'),
            'fecha_publicacion'   => $this->request->getPost('fecha_publicacion'),
            'ruta_foto'           => $rutaFoto,
            'ruta_pdf'            => $rutaPdf,
            'categoria_id'        => $this->request->getPost('categoria_id'),
            'usuario_id'          => $loggedInUserId, // Ensure this is the correct user ID from session
            'activo'              => $this->request->getPost('activo') ? 1 : 0,
            'fecha_creacion'      => date('Y-m-d H:i:s'),
            'fecha_actualizacion' => date('Y-m-d H:i:s'),
        ];

        if ($this->publicacionModel->insert($data)) {
            session()->setFlashdata('success', 'Resultado "' . esc($data['titulo']) . '" creado exitosamente.');
            return redirect()->to(base_url('resultado')); // Explicit redirect on success
        } else {
            session()->setFlashdata('error', 'Error al crear el resultado. Inténtelo de nuevo.');
            log_message('error', 'PublicacionModel insert error: ' . json_encode($this->publicacionModel->errors()));
            return redirect()->back()->withInput(); // Explicit redirect back on failure
        }
    }

    /**
     * Muestra el formulario para editar un resultado existente.
     *
     * @param int|null $id ID del resultado a editar.
     * @return string
     * @throws \CodeIgniter\Exceptions\PageNotFoundException Si el resultado no es encontrado.
     */
    public function edit(?int $id = null): string
    {
        $publicacion = $this->publicacionModel->find($id);

        if (!$publicacion) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('No se pudo encontrar el resultado con ID: ' . $id);
        }

        $data = [
            'page_title'  => 'Editar Resultado',
            'publicacion' => $publicacion,
            'categorias'  => $this->categoriaModel->findAll(),
            'usuarios'    => $this->usuarioModel->findAll(),
            'validation'  => \Config\Services::validation(),
        ];
        return view('dashboard/update_resultados', $data);
    }

    /**
     * Actualiza un resultado existente en la base de datos.
     *
     * @param int $id ID del resultado a actualizar.
     * @return RedirectResponse
     * @throws \CodeIgniter\Exceptions\PageNotFoundException Si el resultado no es encontrado.
     */
    public function update(int $id): RedirectResponse
    {
        $publicacionExistente = $this->publicacionModel->find($id);
        if (!$publicacionExistente) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('No se pudo encontrar el resultado con ID: ' . $id);
        }

        $rules = [
            'titulo'              => 'required|min_length[3]|max_length[255]',
            'descripcion'         => 'permit_empty|max_length[65535]',
            'fecha_publicacion'   => 'required|valid_date',
            // 'if_exist' checks if a file input was actually provided, then applies other rules
            'ruta_foto'           => 'if_exist|uploaded[ruta_foto]|max_size[ruta_foto,2048]|is_image[ruta_foto]|mime_in[ruta_foto,image/jpg,image/jpeg,image/png]',
            'ruta_pdf'            => 'if_exist|uploaded[ruta_pdf]|max_size[ruta_pdf,5120]|ext_in[ruta_pdf,pdf]',
            'categoria_id'        => 'required|integer|is_not_unique[categorias_encuesta.id]',
            'usuario_id'          => 'required|integer|is_not_unique[usuarios.id]', // Added this rule as it's now editable
            'activo'              => 'permit_empty|integer|in_list[0,1]',
        ];

        $messages = [
            'titulo' => [
                'required'   => 'El título es obligatorio.',
                'min_length' => 'El título debe tener al menos {param} caracteres.',
                'max_length' => 'El título no debe exceder los {param} caracteres.',
            ],
            'descripcion' => [
                'max_length' => 'La descripción es demasiado larga.',
            ],
            'fecha_publicacion' => [
                'required'   => 'La fecha de publicación es obligatoria.',
                'valid_date' => 'La fecha de publicación no es válida.',
            ],
            'ruta_foto' => [
                'uploaded' => 'Por favor, selecciona una imagen para subir (si aplica).',
                'max_size' => 'La imagen es demasiado grande. El tamaño máximo es de {param} KB.',
                'is_image' => 'El archivo subido no es una imagen válida.',
                'mime_in'  => 'Solo se permiten imágenes JPG, JPEG y PNG.',
            ],
            'ruta_pdf' => [
                'uploaded' => 'Por favor, selecciona un archivo PDF para subir (si aplica).',
                'max_size' => 'El archivo PDF es demasiado grande. El tamaño máximo es de {param} KB.',
                'ext_in'   => 'Solo se permiten archivos PDF.',
            ],
            'categoria_id' => [
                'required'      => 'La categoría es obligatoria.',
                'integer'       => 'La categoría seleccionada no es válida.',
                'is_not_unique' => 'La categoría seleccionada no existe.',
            ],
            'usuario_id' => [
                'required'      => 'El autor es obligatorio.',
                'integer'       => 'El autor seleccionado no es válido.',
                'is_not_unique' => 'El autor seleccionado no existe.',
            ],
            'activo' => [
                'integer' => 'El valor de activo no es válido.',
                'in_list' => 'El valor de activo no es válido.',
            ]
        ];

        if (!$this->validate($rules, $messages)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $rutaFoto = $publicacionExistente['ruta_foto']; // Keep existing path by default
        $fileFoto = $this->request->getFile('ruta_foto');
        
        if ($fileFoto && $fileFoto->isValid() && !$fileFoto->hasMoved()) {
            // Delete old file if a new one is uploaded
            if (!empty($publicacionExistente['ruta_foto']) && file_exists(FCPATH . $publicacionExistente['ruta_foto'])) {
                unlink(FCPATH . $publicacionExistente['ruta_foto']);
            }
            $newNameFoto = $fileFoto->getRandomName();
            $imageUploadPath = FCPATH . PUBLICACIONES_IMAGE_UPLOAD_PATH;
            if (!is_dir($imageUploadPath)) {
                mkdir($imageUploadPath, 0777, true);
            }
            $fileFoto->move($imageUploadPath, $newNameFoto);
            $rutaFoto = PUBLICACIONES_IMAGE_UPLOAD_PATH . '/' . $newNameFoto;
        } elseif ($this->request->getPost('remove_ruta_foto') == 1) {
            // Remove existing file if checkbox is checked
            if (!empty($publicacionExistente['ruta_foto']) && file_exists(FCPATH . $publicacionExistente['ruta_foto'])) {
                unlink(FCPATH . $publicacionExistente['ruta_foto']);
            }
            $rutaFoto = null; // Clear the path in DB
        }

        $rutaPdf = $publicacionExistente['ruta_pdf']; // Keep existing path by default
        $filePdf = $this->request->getFile('ruta_pdf');
        
        if ($filePdf && $filePdf->isValid() && !$filePdf->hasMoved()) {
            // Delete old file if a new one is uploaded
            if (!empty($publicacionExistente['ruta_pdf']) && file_exists(FCPATH . $publicacionExistente['ruta_pdf'])) {
                unlink(FCPATH . $publicacionExistente['ruta_pdf']);
            }
            $newNamePdf = $filePdf->getRandomName();
            $pdfUploadPath = FCPATH . PUBLICACIONES_PDF_UPLOAD_PATH;
            if (!is_dir($pdfUploadPath)) {
                mkdir($pdfUploadPath, 0777, true);
            }
            $filePdf->move($pdfUploadPath, $newNamePdf);
            $rutaPdf = PUBLICACIONES_PDF_UPLOAD_PATH . '/' . $newNamePdf;
        } elseif ($this->request->getPost('remove_ruta_pdf') == 1) {
            // Remove existing file if checkbox is checked
            if (!empty($publicacionExistente['ruta_pdf']) && file_exists(FCPATH . $publicacionExistente['ruta_pdf'])) {
                unlink(FCPATH . $publicacionExistente['ruta_pdf']);
            }
            $rutaPdf = null; // Clear the path in DB
        }

        $data = [
            'titulo'              => $this->request->getPost('titulo'),
            'descripcion'         => $this->request->getPost('descripcion'),
            'fecha_publicacion'   => $this->request->getPost('fecha_publicacion'),
            'ruta_foto'           => $rutaFoto,
            'ruta_pdf'            => $rutaPdf,
            'categoria_id'        => $this->request->getPost('categoria_id'),
            'usuario_id'          => $this->request->getPost('usuario_id'), // Now from form, not session
            'activo'              => $this->request->getPost('activo') ? 1 : 0,
            'fecha_actualizacion' => date('Y-m-d H:i:s'),
        ];

        if ($this->publicacionModel->update($id, $data)) {
            session()->setFlashdata('success', 'Resultado "' . esc($data['titulo']) . '" actualizado exitosamente.');
            return redirect()->to(base_url('resultado')); // Explicit redirect on success
        } else {
            session()->setFlashdata('error', 'Error al actualizar el resultado.');
            log_message('error', 'PublicacionModel update error: ' . json_encode($this->publicacionModel->errors()));
            return redirect()->back()->withInput(); // Explicit redirect back on failure
        }
    }

    /**
     * Elimina un resultado de la base de datos.
     *
     * @param int|null $id ID del resultado a eliminar.
     * @return RedirectResponse
     */
    public function delete(?int $id = null): RedirectResponse
    {
        $publicacion = $this->publicacionModel->find($id);

        if (!$publicacion) {
            session()->setFlashdata('error', 'Resultado no encontrado.');
            return redirect()->to(base_url('resultado'));
        }

        // Delete associated files from the file system
        if (!empty($publicacion['ruta_foto']) && file_exists(FCPATH . $publicacion['ruta_foto'])) {
            unlink(FCPATH . $publicacion['ruta_foto']);
        }
        if (!empty($publicacion['ruta_pdf']) && file_exists(FCPATH . $publicacion['ruta_pdf'])) {
            unlink(FCPATH . $publicacion['ruta_pdf']);
        }

        if ($this->publicacionModel->delete($id)) {
            session()->setFlashdata('success', 'Resultado "' . esc($publicacion['titulo']) . '" eliminado exitosamente.');
        } else {
            session()->setFlashdata('error', 'Error al eliminar el resultado.');
            log_message('error', 'PublicacionModel delete error: ' . json_encode($this->publicacionModel->errors()));
        }

        return redirect()->to(base_url('resultado'));
    }
}