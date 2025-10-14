<?php
namespace App\Controllers;
use App\Models\JornadaModel;

class JornadaController extends BaseController
{
    public function index()
    {
        $model = new JornadaModel();
        $data['jornadas'] = $model->findAll();
        return view('jornadas/lista', $data);
    }

    public function crear()
    {
        return view('jornadas/crear');
    }

    public function guardar()
    {
        $model = new JornadaModel();
        $model->save([
            'nombre_jornada' => $this->request->getPost('nombre_jornada'),
            'fecha_juego' => $this->request->getPost('fecha_juego')
        ]);
        return redirect()->to('/jornadas');
    }
}
