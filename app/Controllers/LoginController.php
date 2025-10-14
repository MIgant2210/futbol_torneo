<?php
namespace App\Controllers;
use App\Models\UsuarioModel;

class LoginController extends BaseController
{
    public function index()
    {
        return view('auth/login');
    }

    public function autenticar()
    {
        $usuarioInput = $this->request->getPost('usuario');
        $password = $this->request->getPost('password');

        $usuario = (new UsuarioModel())->where('usuario', $usuarioInput)->first();

        if ($usuario && password_verify($password, $usuario['password'])) {
            session()->set([
                'usuario_id' => $usuario['id'],
                'usuario_nombre' => $usuario['nombre'],
                'logueado' => true
            ]);
            return redirect()->to('/dashboard');
        } else {
            return redirect()->back()->with('error', 'Usuario o contraseña incorrectos');
        }
    }

    public function salir()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
