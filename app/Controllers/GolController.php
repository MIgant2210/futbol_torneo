<?php
namespace App\Controllers;

use App\Models\GolModel;
use App\Models\JugadorModel;
use App\Models\JornadaModel;

class GolController extends BaseController
{
    public function index()
    {
        $golModel = new GolModel();

        // Traer goles con nombre de jugador y jornada
        $goles = $golModel->select('goles.id, goles.cantidad_goles, jugadores.nombre, jugadores.apellido, jornadas.nombre_jornada, jornadas.fecha_juego')
                           ->join('jugadores', 'jugadores.id = goles.jugador_id')
                           ->join('jornadas', 'jornadas.id = goles.jornada_id')
                           ->orderBy('goles.id', 'DESC')
                           ->findAll();

        $data = [
            'goles' => $goles,
            'jornadas' => (new JornadaModel())->findAll()
        ];

        return view('goles/index', $data);
    }

    public function crear()
    {
        $data = [
            'jugadores' => (new JugadorModel())->findAll(),
            'jornadas' => (new JornadaModel())->findAll()
        ];
        return view('goles/crear', $data);
    }

    public function guardar()
    {
        $golModel = new GolModel();
        $golModel->save([
            'jugador_id' => $this->request->getPost('jugador_id'),
            'jornada_id' => $this->request->getPost('jornada_id'),
            'cantidad_goles' => $this->request->getPost('cantidad_goles')
        ]);

        return redirect()->to('/goles');
    }

   public function buscar()
{
    $query = $this->request->getGet('query');
    $jornada = $this->request->getGet('jornada');

    $golModel = new GolModel();
    $golModel->select('goles.id, goles.cantidad_goles, jugadores.nombre, jugadores.apellido, jornadas.nombre_jornada, jornadas.fecha_juego')
             ->join('jugadores', 'jugadores.id = goles.jugador_id')
             ->join('jornadas', 'jornadas.id = goles.jornada_id');

    // 🔍 Filtro por nombre o apellido del jugador
    if (!empty($query)) {
        $golModel->groupStart()
                 ->like('jugadores.nombre', $query)
                 ->orLike('jugadores.apellido', $query)
                 ->groupEnd();
    }

    // Filtro por jornada
    if (!empty($jornada)) {
        $golModel->where('goles.jornada_id', $jornada);
    }

    $goles = $golModel->orderBy('goles.id', 'DESC')->findAll();

    // Devolver solo el HTML de las filas (sin layout)
    return $this->response
                ->setHeader('Content-Type', 'text/html')
                ->setBody(view('goles/_rows', ['goles' => $goles]));
}



    public function editar($id)
    {
        $golModel = new GolModel();
        $gol = $golModel->find($id);

        $data = [
            'gol' => $gol,
            'jugadores' => (new JugadorModel())->findAll(),
            'jornadas' => (new JornadaModel())->findAll()
        ];

        return view('goles/editar', $data);
    }

    public function actualizar($id)
    {
        $golModel = new GolModel();
        $golModel->update($id, [
            'jugador_id' => $this->request->getPost('jugador_id'),
            'jornada_id' => $this->request->getPost('jornada_id'),
            'cantidad_goles' => $this->request->getPost('cantidad_goles')
        ]);

        return redirect()->to('/goles');
    }

    public function eliminar($id)
    {
        $golModel = new GolModel();
        $golModel->delete($id);

        return redirect()->to('/goles');
    }
}
