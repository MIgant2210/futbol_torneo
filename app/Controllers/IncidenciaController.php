<?php
namespace App\Controllers;

use App\Models\IncidenciaModel;
use App\Models\JugadorModel;

class IncidenciaController extends BaseController
{
    public function crear()
    {
        $data['jugadores'] = (new JugadorModel())->findAll();
        return view('incidencias/crear', $data);
    }

    public function guardar()
    {
        $model = new IncidenciaModel();
        $model->save([
            'jugador_id' => $this->request->getPost('jugador_id'),
            'descripcion' => $this->request->getPost('descripcion'),
            'tipo_tarjeta' => $this->request->getPost('tipo_tarjeta'),
            'fecha_incidencia' => $this->request->getPost('fecha_incidencia'),
            'fecha_suspension' => $this->request->getPost('tipo_tarjeta') === 'roja'
                ? $this->request->getPost('fecha_suspension')
                : null
        ]);
        return redirect()->to('/incidencias/crear');
    }
}
