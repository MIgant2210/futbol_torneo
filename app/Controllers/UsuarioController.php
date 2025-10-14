<?php
namespace App\Controllers;

use App\Models\UsuarioModel;

class UsuarioController extends BaseController
{
    // Listar todos los usuarios
    public function index()
    {
        $usuarioModel = new UsuarioModel();
        $data['usuarios'] = $usuarioModel->findAll();
        return view('usuarios/index', $data);
    }

    // Mostrar formulario de registro
    public function registro()
    {
        return view('usuarios/registro');
    }

    // Guardar nuevo usuario
    public function guardar()
    {
        helper(['form']);
        $usuarioModel = new UsuarioModel();

        $rules = [
            'nombre'   => 'required|min_length[3]',
            'correo'   => 'required|valid_email|is_unique[usuarios.correo]',
            'usuario'  => 'required|min_length[3]|is_unique[usuarios.usuario]',
            'password' => 'required|min_length[6]'
        ];

        $errors = [
            'nombre' => [
                'required' => 'El nombre es obligatorio',
                'min_length' => 'Debe tener al menos 3 caracteres'
            ],
            'correo' => [
                'required' => 'El correo es obligatorio',
                'valid_email' => 'Debe ser un correo válido',
                'is_unique' => 'Este correo ya está registrado'
            ],
            'usuario' => [
                'required' => 'El usuario es obligatorio',
                'min_length' => 'Debe tener al menos 3 caracteres',
                'is_unique' => 'Este usuario ya existe'
            ],
            'password' => [
                'required' => 'La contraseña es obligatoria',
                'min_length' => 'Debe tener al menos 6 caracteres'
            ]
        ];

        if (!$this->validate($rules, $errors)) {
            return redirect()->back()->with('error', $this->validator->getErrors())->withInput();
        }

        $data = [
            'nombre'   => $this->request->getPost('nombre'),
            'correo'   => $this->request->getPost('correo'),
            'usuario'  => $this->request->getPost('usuario'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
        ];

        if ($usuarioModel->insert($data)) {
            // Si viene desde el login, redirige al login
            if ($this->request->getPost('origen') === 'login') {
                return redirect()->to('/login')->with('success', '✅ Cuenta creada. Ya puedes iniciar sesión.');
            }
            // Si viene desde el módulo de usuarios, redirige a la lista
            return redirect()->to('/usuarios')->with('success', '✅ Usuario registrado correctamente.');
        }

        return redirect()->back()->with('error', '❌ No se pudo registrar el usuario.');
    }

    // Ver detalles de un usuario
    public function ver($id)
    {
        $usuarioModel = new UsuarioModel();
        $usuario = $usuarioModel->find($id);

        if (!$usuario) {
            return redirect()->to('/usuarios')->with('error', '❌ Usuario no encontrado.');
        }

        return view('usuarios/ver', ['usuario' => $usuario]);
    }

    // Mostrar formulario de edición
    public function editar($id)
    {
        $usuarioModel = new UsuarioModel();
        $usuario = $usuarioModel->find($id);

        if (!$usuario) {
            return redirect()->to('/usuarios')->with('error', '❌ Usuario no encontrado.');
        }

        return view('usuarios/editar', ['usuario' => $usuario]);
    }

    // Actualizar usuario
    public function actualizar($id)
    {
        helper(['form']);
        $usuarioModel = new UsuarioModel();
        $usuario = $usuarioModel->find($id);

        if (!$usuario) {
            return redirect()->to('/usuarios')->with('error', '❌ Usuario no encontrado.');
        }

        $rules = [
            'nombre'   => 'required|min_length[3]',
            'correo'   => "required|valid_email|is_unique[usuarios.correo,id,{$id}]",
            'usuario'  => "required|min_length[3]|is_unique[usuarios.usuario,id,{$id}]"
        ];

        $errors = [
            'nombre' => [
                'required' => 'El nombre es obligatorio',
                'min_length' => 'Debe tener al menos 3 caracteres'
            ],
            'correo' => [
                'required' => 'El correo es obligatorio',
                'valid_email' => 'Debe ser un correo válido',
                'is_unique' => 'Este correo ya está en uso'
            ],
            'usuario' => [
                'required' => 'El usuario es obligatorio',
                'min_length' => 'Debe tener al menos 3 caracteres',
                'is_unique' => 'Este usuario ya existe'
            ]
        ];

        $password = $this->request->getPost('password');
        if (!empty($password)) {
            $rules['password'] = 'min_length[6]';
            $errors['password'] = [
                'min_length' => 'La contraseña debe tener al menos 6 caracteres'
            ];
        }

        if (!$this->validate($rules, $errors)) {
            return redirect()->back()->with('error', $this->validator->getErrors())->withInput();
        }

        $data = [
            'nombre'   => $this->request->getPost('nombre'),
            'correo'   => $this->request->getPost('correo'),
            'usuario'  => $this->request->getPost('usuario')
        ];

        if (!empty($password)) {
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        if ($usuarioModel->update($id, $data)) {
            return redirect()->to('/usuarios')->with('success', '✅ Usuario actualizado correctamente.');
        }

        return redirect()->back()->with('error', '❌ No se pudo actualizar el usuario.');
    }

    // Eliminar usuario
    public function eliminar($id)
    {
        $usuarioModel = new UsuarioModel();
        $usuario = $usuarioModel->find($id);

        if (!$usuario) {
            return redirect()->to('/usuarios')->with('error', '❌ Usuario no encontrado.');
        }

        if ($usuarioModel->delete($id)) {
            return redirect()->to('/usuarios')->with('success', '✅ Usuario eliminado correctamente.');
        }

        return redirect()->to('/usuarios')->with('error', '❌ No se pudo eliminar el usuario.');
    }
}
