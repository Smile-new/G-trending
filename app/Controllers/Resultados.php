<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PublicacionModel;
use App\Models\CategoriaModel;
use App\Models\UsuarioModel;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\Exceptions\PageNotFoundException;

class Resultados extends BaseController
{
    protected $publicacionModel;
    protected $categoriaModel;
    protected $usuarioModel;
    protected $helpers = ['form', 'url', 'filesystem'];

    public function __construct()
    {
        $this->publicacionModel = new PublicacionModel();
        $this->categoriaModel = new CategoriaModel();
        $this->usuarioModel = new UsuarioModel();
    }

    /**
     * Filters for authentication.
     * Ensure only logged-in users can access these methods.
     */
    public function __before()
    {
        if (!session()->get('isLoggedIn')) {
            session()->setFlashdata('error', 'Debes iniciar sesión para acceder a esta sección.');
            return redirect()->to(base_url('login'));
        }
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
        $loggedInUserId = session()->get('id');

        if (empty($loggedInUserId)) {
            session()->setFlashdata('error', 'Debes iniciar sesión para crear un resultado.');
            return redirect()->to(base_url('login'));
        }

        $rules = [
            'titulo'            => 'required|min_length[3]|max_length[255]',
            'descripcion'       => 'permit_empty|max_length[65535]',
            'fecha_publicacion' => 'required|valid_date',
            'ruta_foto'         => 'permit_empty|uploaded[ruta_foto]|max_size[ruta_foto,2048]|is_image[ruta_foto]|mime_in[ruta_foto,image/jpg,image/jpeg,image/png]',
            'ruta_pdf'          => 'permit_empty|uploaded[ruta_pdf]|max_size[ruta_pdf,5120]|ext_in[ruta_pdf,pdf]',
            'categoria_id'      => 'required|integer|is_not_unique[categorias_encuesta.id]',
            'activo'            => 'permit_empty|integer|in_list[0,1]',
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
            $pdfUploadPath = FCPATH . PUBLICACIONES_PDF_UPLOAD_PATH;
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
            'usuario_id'        => $loggedInUserId,
            'activo'            => $this->request->getPost('activo') ? 1 : 0,
        ];

        if ($this->publicacionModel->insert($data)) {
            session()->setFlashdata('success', 'Resultado "' . esc($data['titulo']) . '" creado exitosamente.');
            return redirect()->to(base_url('resultado'));
        } else {
            $dbErrors = $this->publicacionModel->errors();
            log_message('error', 'PublicacionModel insert error: ' . json_encode($dbErrors));
            session()->setFlashdata('error', 'Error al crear el resultado. Inténtelo de nuevo. Detalles: ' . json_encode($dbErrors));
            return redirect()->back()->withInput();
        }
    }


    /**
     * Muestra el formulario para editar un resultado existente.
     *
     * @param int|null $id ID del resultado a editar.
     * @return string
     * @throws PageNotFoundException Si el resultado no es encontrado.
     */
    public function edit(?int $id = null): string
    {
        $publicacion = $this->publicacionModel->find($id);

        if (!$publicacion) {
            throw new PageNotFoundException('No se pudo encontrar el resultado con ID: ' . $id);
        }

        // OPTIONAL: Add authorization check here if only the author or admin can edit
        // if ($publicacion['usuario_id'] != session()->get('id') && session()->get('role') != 'admin_role_id') {
        //     session()->setFlashdata('error', 'No tienes permiso para editar este resultado.');
        //     return redirect()->to(base_url('resultado'));
        // }

        $data = [
            'page_title'  => 'Editar Resultado',
            'publicacion' => $publicacion,
            'categorias'  => $this->categoriaModel->findAll(),
            'usuarios'    => $this->usuarioModel->findAll(), // You might want to filter this based on roles for security
            'validation'  => \Config\Services::validation(),
        ];
        return view('dashboard/update_resultados', $data);
    }

    /**
     * Actualiza un resultado existente en la base de datos.
     *
     * @param int $id ID del resultado a actualizar.
     * @return RedirectResponse
     * @throws PageNotFoundException Si el resultado no es encontrado.
     */
    public function update(int $id): RedirectResponse
    {
        $publicacionExistente = $this->publicacionModel->find($id);
        if (!$publicacionExistente) {
            throw new PageNotFoundException('No se pudo encontrar el resultado con ID: ' . $id);
        }

        // OPTIONAL: Authorization check before updating
        // if ($publicacionExistente['usuario_id'] != session()->get('id') && session()->get('role') != 'admin_role_id') {
        //     session()->setFlashdata('error', 'No tienes permiso para actualizar este resultado.');
        //     return redirect()->to(base_url('resultado'));
        // }

        $rules = [
            'titulo'            => 'required|min_length[3]|max_length[255]',
            'descripcion'       => 'permit_empty|max_length[65535]',
            'fecha_publicacion' => 'required|valid_date',
            'ruta_foto'         => 'if_exist|uploaded[ruta_foto]|max_size[ruta_foto,2048]|is_image[ruta_foto]|mime_in[ruta_foto,image/jpg,image/jpeg,image/png]',
            'ruta_pdf'          => 'if_exist|uploaded[ruta_pdf]|max_size[ruta_pdf,5120]|ext_in[ruta_pdf,pdf]',
            'categoria_id'      => 'required|integer|is_not_unique[categorias_encuesta.id]',
            'usuario_id'        => 'required|integer|is_not_unique[usuarios.id]',
            'activo'            => 'permit_empty|integer|in_list[0,1]',
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

        $rutaFoto = $publicacionExistente['ruta_foto'];
        $fileFoto = $this->request->getFile('ruta_foto');

        if ($fileFoto && $fileFoto->isValid() && !$fileFoto->hasMoved()) {
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
            if (!empty($publicacionExistente['ruta_foto']) && file_exists(FCPATH . $publicacionExistente['ruta_foto'])) {
                unlink(FCPATH . $publicacionExistente['ruta_foto']);
            }
            $rutaFoto = null;
        }

        $rutaPdf = $publicacionExistente['ruta_pdf'];
        $filePdf = $this->request->getFile('ruta_pdf');

        if ($filePdf && $filePdf->isValid() && !$filePdf->hasMoved()) {
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
            'usuario_id'        => $this->request->getPost('usuario_id'),
            'activo'            => $this->request->getPost('activo') ? 1 : 0,
        ];

        if ($this->publicacionModel->update($id, $data)) {
            session()->setFlashdata('success', 'Resultado "' . esc($data['titulo']) . '" actualizado exitosamente.');
            return redirect()->to(base_url('resultado'));
        } else {
            session()->setFlashdata('error', 'Error al actualizar el resultado.');
            log_message('error', 'PublicacionModel update error: ' . json_encode($this->publicacionModel->errors()));
            return redirect()->back()->withInput();
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

        // OPTIONAL: Authorization check before deleting
        // if ($publicacion['usuario_id'] != session()->get('id') && session()->get('role') != 'admin_role_id') {
        //     session()->setFlashdata('error', 'No tienes permiso para eliminar este resultado.');
        //     return redirect()->to(base_url('resultado'));
        // }

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

    /**
     * Cambia el estado (activo/inactivo) de una publicación.
     *
     * @param int|null $id ID de la publicación a cambiar.
     * @return RedirectResponse
     */
    public function toggleStatus(?int $id = null): RedirectResponse
    {
        // 1. Verificar si se proporcionó un ID válido
        if ($id === null) {
            session()->setFlashdata('error', 'ID de publicación no proporcionado para cambiar el estado.');
            return redirect()->to(base_url('resultado'));
        }

        // 2. Buscar la publicación
        $publicacion = $this->publicacionModel->find($id);

        if (!$publicacion) {
            session()->setFlashdata('error', 'Publicación no encontrada.');
            return redirect()->to(base_url('resultado'));
        }

        // OPTIONAL: Authorization check here if only specific roles can toggle status
        // if (session()->get('role') != 'admin_role_id') { // Example for admin role
        //     session()->setFlashdata('error', 'No tienes permiso para cambiar el estado de esta publicación.');
        //     return redirect()->to(base_url('resultado'));
        // }

        // 3. Determinar el nuevo estado
        $nuevoEstado = ($publicacion['activo'] == 1) ? 0 : 1; // Si es 1, cambia a 0; si es 0, cambia a 1.

        // 4. Actualizar el estado en la base de datos
        if ($this->publicacionModel->update($id, ['activo' => $nuevoEstado])) {
            $mensaje = ($nuevoEstado == 1) ? 'Publicación activada correctamente.' : 'Publicación desactivada correctamente.';
            session()->setFlashdata('success', $mensaje);
        } else {
            $dbErrors = $this->publicacionModel->errors();
            log_message('error', 'PublicacionModel toggleStatus error: ' . json_encode($dbErrors));
            session()->setFlashdata('error', 'Error al cambiar el estado de la publicación. Detalles: ' . json_encode($dbErrors));
        }

        // 5. Redirigir de vuelta a la página de resultados
        return redirect()->to(base_url('resultado'));
    }
}