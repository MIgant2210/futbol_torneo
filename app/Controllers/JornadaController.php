<?php
namespace App\Controllers;
use App\Models\JornadaModel;

class JornadaController extends BaseController
{
    public function index()
    {
        $model = new JornadaModel();
        $data['jornadas'] = $model->orderBy('fecha_juego', 'DESC')->findAll();
        return view('jornadas/index', $data); // ✅ usa "index"
    }

    public function buscar()
{
    $nombre = $this->request->getGet('nombre');
    $fecha = $this->request->getGet('fecha');

    $model = new JornadaModel();

    if (!empty($nombre)) {
        $model->like('nombre_jornada', $nombre);
    }

    if (!empty($fecha)) {
        $model->where('fecha_juego', $fecha);
    }

    $jornadas = $model->orderBy('fecha_juego', 'DESC')->findAll();

    if ($this->request->isAJAX()) {
        return view('jornadas/_rows', ['jornadas' => $jornadas]);
    }

    return view('jornadas/index', ['jornadas' => $jornadas]);
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

    public function editar($id)
    {
        $model = new JornadaModel();
        $data['jornada'] = $model->find($id);
        return view('jornadas/editar', $data);
    }

    public function actualizar($id)
    {
        $model = new JornadaModel();
        $model->update($id, [
            'nombre_jornada' => $this->request->getPost('nombre_jornada'),
            'fecha_juego' => $this->request->getPost('fecha_juego')
        ]);
        return redirect()->to('/jornadas');
    }

    public function eliminar($id)
    {
        $model = new JornadaModel();
        $model->delete($id);
        return redirect()->to('/jornadas');
    }
}
