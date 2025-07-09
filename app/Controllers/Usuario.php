<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsuarioModel;
use App\Models\RolModel;
use CodeIgniter\HTTP\RedirectResponse; // Para asegurar el tipo de retorno en redirecciones
use CodeIgniter\HTTP\ResponseInterface; // Para asegurar el tipo de retorno en respuestas JSON

class Usuario extends BaseController
{
    protected $usuarioModel;
    protected $rolModel;

    public function __construct()
    {
        $this->usuarioModel = new UsuarioModel();
        $this->rolModel     = new RolModel();
        helper(['form', 'url']); // Carga helpers para formularios y URLs
    }

    /**
     * Muestra la lista de usuarios.
     *
     * @return string
     */
    public function index(): string
    {
        $data = [
            'page_title' => 'Gestión de Usuarios',
            'usuarios'   => $this->usuarioModel->findAll(),
            'roles'      => $this->rolModel->findAll(), // Necesario para mostrar el nombre del rol
        ];
        return view('dashboard/user', $data); // Vista: app/Views/dashboard/user.php
    }

    /**
     * Muestra el formulario para crear un nuevo usuario.
     *
     * @return string
     */
    public function create(): string
    {
        $data = [
            'page_title' => 'Crear Nuevo Usuario',
            'roles'      => $this->rolModel->findAll(),
            'validation' => \Config\Services::validation(),
        ];
        return view('dashboard/create_user', $data); // Vista: app/Views/dashboard/create_user.php
    }

    /**
     * Guarda un nuevo usuario en la base de datos.
     * Incluye generación automática de nombre de usuario y contraseña,
     * y manejo de subida de foto de perfil.
     *
     * @return RedirectResponse
     */
    public function store(): RedirectResponse
    {
        // Reglas de validación
        $rules = [
            'nombre_usuario'   => 'required|min_length[3]|max_length[100]', // Nombre Completo, no es único
            'user'             => 'required|max_length[255]|is_unique[usuarios.user]', // Usuario (login), debe ser único
            'password'         => 'required|min_length[6]', // Contraseña
            'rol_id'           => 'required|integer',
            'activo'           => 'permit_empty|is_natural_no_zero',
            'imagen_perfil'    => [ // Reglas para la imagen de perfil
                'rules'  => 'if_exist|uploaded[imagen_perfil]|max_size[imagen_perfil,1024]|is_image[imagen_perfil]|mime_in[imagen_perfil,image/jpg,image/jpeg,image/png,image/gif]',
                'errors' => [
                    'uploaded' => 'Por favor, sube una imagen de perfil.',
                    'max_size' => 'La imagen de perfil es demasiado grande (máximo 1MB).',
                    'is_image' => 'El archivo subido no es una imagen válida.',
                    'mime_in'  => 'Formato de imagen no permitido. Solo JPG, JPEG, PNG, GIF.',
                ],
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        // Datos para guardar en la base de datos
        $data = [
            'nombre_usuario' => $this->request->getPost('nombre_usuario'), // Tomado del formulario
            'user'           => $this->request->getPost('user'),           // El usuario (username) generado para login
            'password'       => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),

            'rol_id'         => $this->request->getPost('rol_id'),
            'activo'         => $this->request->getPost('activo') ? 1 : 0,
        ];

        // Manejo de la subida de la imagen de perfil
        $imagen = $this->request->getFile('imagen_perfil');
        $rutaFoto = 'default.png'; // Valor por defecto si no se sube imagen

        // Asegúrate de que IMG_USER_PATH esté definido en app/Config/Constants.php
        if (!defined('IMG_USER_PATH')) {
            define('IMG_USER_PATH', 'img_user'); // Definición de fallback si no está en Constants.php
        }

        if ($imagen && $imagen->isValid() && !$imagen->hasMoved()) {
            $nombreAleatorio = $imagen->getRandomName(); // Genera un nombre único para el archivo
            // Mover la imagen a la carpeta public/img_user
            $imagen->move(FCPATH . IMG_USER_PATH, $nombreAleatorio);
            $rutaFoto = $nombreAleatorio; // Solo guardamos el nombre del archivo en la DB
        }

        $data['foto'] = $rutaFoto; // Asigna la ruta de la foto a los datos

        if ($this->usuarioModel->save($data)) {
            session()->setFlashdata('success', 'Usuario "' . esc($data['nombre_usuario']) . '" creado exitosamente. Nombre de usuario para acceso: **' . esc($data['user']) . '**. Contraseña: **' . esc($this->request->getPost('password')) . '**');
        } else {
            session()->setFlashdata('error', 'Error al crear el usuario.');
        }

        return redirect()->to(base_url('users'));
    }

    /**
     * Muestra el formulario para editar un usuario existente.
     *
     * @param int|null $id ID del usuario a editar.
     * @return string
     * @throws \CodeIgniter\Exceptions\PageNotFoundException Si el usuario no es encontrado.
     */
    public function edit(?int $id = null): string
    {
        $usuario = $this->usuarioModel->find($id);

        if (!$usuario) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('No se pudo encontrar el usuario con ID: ' . $id);
        }

        $data = [
            'page_title' => 'Editar Usuario',
            'usuario'    => $usuario,
            'roles'      => $this->rolModel->findAll(),
            'validation' => \Config\Services::validation(),
        ];
        return view('dashboard/update_user', $data); // Vista: app/Views/dashboard/update_user.php
    }

    /**
     * Actualiza un usuario existente en la base de datos.
     * Maneja la actualización de la foto de perfil y la eliminación de la anterior.
     *
     * @param int $id ID del usuario a actualizar.
     * @return RedirectResponse
     * @throws \CodeIgniter\Exceptions\PageNotFoundException Si el usuario no es encontrado.
     */
    public function update(int $id): RedirectResponse
    {
        $usuarioExistente = $this->usuarioModel->find($id);
        if (!$usuarioExistente) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('No se pudo encontrar el usuario con ID: ' . $id);
        }

        // Reglas de validación para la actualización
        $rules = [
            'nombre_usuario' => 'required|min_length[3]|max_length[100]', // Nombre Completo, no es único
            'user'           => 'required|max_length[255]|is_unique[usuarios.user,id,' . $id . ']', // Usuario (login), debe ser único
            'rol_id'         => 'required|integer',
            'activo'         => 'permit_empty|is_natural_no_zero',
            'imagen_perfil'  => [ // Reglas para la imagen de perfil (opcional en edición)
                'rules'  => 'if_exist|uploaded[imagen_perfil]|max_size[imagen_perfil,1024]|is_image[imagen_perfil]|mime_in[imagen_perfil,image/jpg,image/jpeg,image/png,image/gif]',
                'errors' => [
                    'max_size' => 'La imagen de perfil es demasiado grande (máximo 1MB).',
                    'is_image' => 'El archivo subido no es una imagen válida.',
                    'mime_in'  => 'Formato de imagen no permitido. Solo JPG, JPEG, PNG, GIF.',
                ],
            ],
        ];

        // Solo añade la regla de validación de contraseña si se proporciona una nueva
        if ($this->request->getPost('password')) {
            $rules['password'] = 'required|min_length[6]'; // La contraseña se hasheará en el modelo
        }

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $data = [
            'nombre_usuario' => $this->request->getPost('nombre_usuario'),
            'user'           => $this->request->getPost('user'),
            'rol_id'         => $this->request->getPost('rol_id'),
            'activo'         => $this->request->getPost('activo') ? 1 : 0,
        ];

        // Si se proporcionó una nueva contraseña, la incluimos en los datos.
        // El modelo se encargará de hashearla automáticamente gracias al hook beforeUpdate.
        if ($this->request->getPost('password')) {
    $data['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
}


        // Manejo de la subida de la imagen de perfil en edición
        $imagen = $this->request->getFile('imagen_perfil');
        $rutaFotoActual = $usuarioExistente['foto']; // Mantener la foto existente por defecto

        if (!defined('IMG_USER_PATH')) {
            define('IMG_USER_PATH', 'img_user'); // Definición de fallback (mejor definir en Constants.php)
        }

        if ($imagen && $imagen->isValid() && !$imagen->hasMoved()) {
            // Eliminar la foto antigua si existe y no es la por defecto
            if (!empty($rutaFotoActual) && $rutaFotoActual !== 'default.png' && file_exists(FCPATH . IMG_USER_PATH . '/' . $rutaFotoActual)) {
                unlink(FCPATH . IMG_USER_PATH . '/' . $rutaFotoActual);
            }
            $nombreAleatorio = $imagen->getRandomName();
            $imagen->move(FCPATH . IMG_USER_PATH, $nombreAleatorio);
            $data['foto'] = $nombreAleatorio; // Actualiza el nombre del archivo en la DB
        } else if ($this->request->getPost('remove_photo')) { // Si hay un checkbox para eliminar la foto
            if (!empty($rutaFotoActual) && $rutaFotoActual !== 'default.png' && file_exists(FCPATH . IMG_USER_PATH . '/' . $rutaFotoActual)) {
                unlink(FCPATH . IMG_USER_PATH . '/' . $rutaFotoActual);
            }
            $data['foto'] = 'default.png'; // O NULL, según tu preferencia en la DB
        } else {
            // Si no se subió una nueva imagen y no se marcó para eliminar, mantener la existente
            $data['foto'] = $rutaFotoActual;
        }

        $this->usuarioModel->update($id, $data);

        session()->setFlashdata('success', 'Usuario actualizado exitosamente.');
        return redirect()->to(base_url('users'));
    }

    /**
     * Elimina un usuario de la base de datos.
     * También elimina la foto de perfil asociada.
     *
     * @param int|null $id ID del usuario a eliminar.
     * @return RedirectResponse
     */
    public function delete(?int $id = null): RedirectResponse
    {
        $usuario = $this->usuarioModel->find($id);

        if (!$usuario) {
            session()->setFlashdata('error', 'Usuario no encontrado.');
            return redirect()->to(base_url('users')); // Corregido: 'admin/users' a 'users'
        }

        // Asegúrate de que IMG_USER_PATH esté definido
        if (!defined('IMG_USER_PATH')) {
            define('IMG_USER_PATH', 'img_user'); // Definición de fallback
        }

        // Eliminar la foto de perfil asociada si existe y no es la por defecto
        if (!empty($usuario['foto']) && $usuario['foto'] !== 'default.png' && file_exists(FCPATH . IMG_USER_PATH . '/' . $usuario['foto'])) {
            unlink(FCPATH . IMG_USER_PATH . '/' . $usuario['foto']);
        }

        $this->usuarioModel->delete($id);

        session()->setFlashdata('success', 'Usuario eliminado exitosamente.');
        return redirect()->to(base_url('users'));
    }

    /**
     * Cambia el estado (activo/inactivo) de un usuario.
     *
     * @param int|null $id ID del usuario a cambiar de estado.
     * @return RedirectResponse
     */
    public function toggleStatus(?int $id = null): RedirectResponse
    {
        $usuario = $this->usuarioModel->find($id);

        if (!$usuario) {
            session()->setFlashdata('error', 'Usuario no encontrado para cambiar estado.');
            return redirect()->to(base_url('users')); // Corregido: 'admin/users' a 'users'
        }

        $nuevoEstado = ($usuario['activo'] == 1) ? 0 : 1;

        $this->usuarioModel->update($id, ['activo' => $nuevoEstado]);

        session()->setFlashdata('success', 'Estado del usuario "' . esc($usuario['nombre_usuario']) . '" cambiado a ' . ($nuevoEstado ? 'Activo' : 'Inactivo') . ' exitosamente.');
        return redirect()->to(base_url('users'));
    }

    /**
     * Genera un nombre de usuario único automático y lo devuelve como JSON para AJAX.
     *
     * @return ResponseInterface
     */
    public function generateUsernameAjax(): ResponseInterface
    {
        $generatedUsername = $this->generateUniqueUsername();
        return $this->response->setJSON(['username' => $generatedUsername]);
    }

    /**
     * Genera una contraseña aleatoria segura y la devuelve como JSON para AJAX.
     *
     * @return ResponseInterface
     */
    public function generatePasswordAjax(): ResponseInterface
    {
        $generatedPassword = $this->generateRandomPassword();
        return $this->response->setJSON(['password' => $generatedPassword]);
    }

    /**
     * Método protegido para generar un nombre de usuario único.
     *
     * @return string
     * @throws \RuntimeException Si no se puede generar un nombre de usuario único después de varios intentos.
     */
    protected function generateUniqueUsername(): string
    {
        $baseUsername = 'user_';
        $unique = false;
        $attempt = 0;
        $username = '';

        while (!$unique && $attempt < 10) { // Intentar un número limitado de veces
            $randomString = bin2hex(random_bytes(4)); // Genera 8 caracteres hexadecimales
            $username = $baseUsername . $randomString;
            // Verificar si el nombre de usuario ya existe en la base de datos en la columna 'user'
            $existingUser = $this->usuarioModel->where('user', $username)->first();
            if (empty($existingUser)) {
                $unique = true;
            }
            $attempt++;
        }

        if (!$unique) {
            // Si después de varios intentos no se genera un nombre único, lanza una excepción
            throw new \RuntimeException('No se pudo generar un nombre de usuario único automático. Intenta de nuevo.');
        }

        return $username;
    }

    /**
     * Método protegido para generar una contraseña aleatoria segura.
     *
     * @param int $length Longitud de la contraseña.
     * @return string
     */
    protected function generateRandomPassword(int $length = 12): string
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()_+=-';
        $charactersLength = strlen($characters);
        $randomPassword = '';
        for ($i = 0; $i < $length; $i++) {
            $randomPassword .= $characters[random_int(0, $charactersLength - 1)]; // Usa random_int para mayor seguridad
        }
        return $randomPassword;
    }
}