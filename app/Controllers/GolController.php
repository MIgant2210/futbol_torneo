<?php
namespace App\Controllers;
use App\Models\GolModel;
use App\Models\JugadorModel;
use App\Models\JornadaModel;

class GolController extends BaseController
{
    public function crear()
    {
        $data['jugadores'] = (new JugadorModel())->findAll();
        $data['jornadas'] = (new JornadaModel())->findAll();
        return view('goles/crear', $data);
    }

    public function guardar()
    {
        $model = new GolModel();
        $model->save([
            'jugador_id' => $this->request->getPost('jugador_id'),
            'jornada_id' => $this->request->getPost('jornada_id'),
            'cantidad_goles' => $this->request->getPost('cantidad_goles')
        ]);
        return redirect()->to('/goles/crear');
    }
}
