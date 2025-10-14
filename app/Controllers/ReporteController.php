<?php
namespace App\Controllers;

use App\Models\JugadorModel;
use App\Models\GolModel;
use App\Models\IncidenciaModel;
use App\Models\EquipoModel;

class ReporteController extends BaseController
{
    public function jugadores()
    {
        $model = new JugadorModel();
        $data['jugadores'] = $model->findAll();
        return view('reportes/jugadores', $data);
    }

    public function goleadores()
    {
        $db = \Config\Database::connect();
        $query = $db->query("
            SELECT j.id, j.nombre, j.apellido, j.foto, e.nombre_equipo, SUM(g.cantidad_goles) AS total_goles
            FROM goles g
            JOIN jugadores j ON j.id = g.jugador_id
            JOIN equipos e ON e.id = j.equipo_id
            GROUP BY j.id
            ORDER BY total_goles DESC
        ");
        $data['goleadores'] = $query->getResultArray();
        return view('reportes/goleadores', $data);
    }

    public function incidencias()
    {
        $model = new IncidenciaModel();
        $data['incidencias'] = $model->findAll();
        return view('reportes/incidencias', $data);
    }

    public function jugador($id)
    {
        $model = new JugadorModel();
        $data['jugador'] = $model->find($id);
        return view('reportes/jugador', $data);
    }
}
