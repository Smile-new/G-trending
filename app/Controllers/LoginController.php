<?php

namespace App\Controllers;

use App\Models\UsuarioModel;
use CodeIgniter\Controller;

class LoginController extends Controller
{
    public function index()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to(base_url('dashboard'));
        }

        return view('login');
    }

    public function authenticate()
    {
        $session = session();
        $model = new UsuarioModel();

        $user_input = $this->request->getPost('user');
        $password_input = $this->request->getPost('password');

        $rules = [
            'user'     => 'required',
            'password' => 'required|min_length[6]',
        ];

        if (! $this->validate($rules)) {
            $session->setFlashdata('error', 'Por favor, introduce tu usuario y contraseña.');
            return redirect()->back()->withInput();
        }

        $user_data = $model->getUserByUsernameWithRole($user_input);

        if ($user_data) {
            if (password_verify($password_input, $user_data['password'])) {
                // Verifica si está activo
                if ((int)$user_data['activo'] !== 1) {
                    $session->setFlashdata('error', 'Tu cuenta está inactiva. Contacta al administrador.');
                    return redirect()->back()->withInput();
                }

                $ses_data = [
                    'id'         => $user_data['id'],
                    'username'   => $user_data['nombre_usuario'],
                    'user'       => $user_data['user'],
                    'role'       => $user_data['rol_id'],
                    'role_name'  => $user_data['nombre_rol'], // Obtenemos el NOMBRE del rol de la sesión
                    'foto'       => $user_data['foto'], 
                    'isLoggedIn' => true,
                ];
                $session->set($ses_data);

                return redirect()->to(base_url('dashboard'));
            } else {
                $session->setFlashdata('error', 'Contraseña incorrecta.');
                return redirect()->back()->withInput();
            }
        } else {
            $session->setFlashdata('error', 'Usuario no registrado.');
            return redirect()->back()->withInput();
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('login'));
    }
}
