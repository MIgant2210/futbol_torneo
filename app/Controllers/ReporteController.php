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
        // Mejor consulta: traer equipo y total de goles por jugador
    $db = \Config\Database::connect();
        $query = $db->query("SELECT j.id, j.nombre, j.apellido, j.foto, j.fecha_nacimiento, e.nombre_equipo, COALESCE(SUM(g.cantidad_goles),0) AS total_goles
            FROM jugadores j
            LEFT JOIN equipos e ON e.id = j.equipo_id
            LEFT JOIN goles g ON g.jugador_id = j.id
            GROUP BY j.id, j.nombre, j.apellido, j.foto, j.fecha_nacimiento, e.nombre_equipo
            ORDER BY total_goles DESC, j.apellido ASC");

        $data['jugadores'] = $query->getResultArray();
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
        $db = \Config\Database::connect();
        $query = $db->query("
            SELECT i.*, j.nombre, j.apellido, j.foto, e.nombre_equipo 
            FROM incidencias i
            JOIN jugadores j ON j.id = i.jugador_id
            LEFT JOIN equipos e ON e.id = j.equipo_id
            ORDER BY i.fecha_incidencia DESC, i.tipo_tarjeta ASC");
            
        $data['incidencias'] = $query->getResultArray();
        return view('reportes/incidencias', $data);
    }

 public function jugador($id)
    {
        $model = new JugadorModel();
        $jugador = $model->find($id);
        if (!$jugador) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Jugador no encontrado');
        }

        $db = \Config\Database::connect();
        // total de goles del jugador
        $totalRes = $db->query('SELECT COALESCE(SUM(cantidad_goles),0) AS total_goles FROM goles WHERE jugador_id = ?', [$id])->getRowArray();
        $total_goles = $totalRes['total_goles'] ?? 0;

        // detalle de goles por jornada
        $detalle = [];
        try {
            // Intentar con diferentes posibles nombres de columna de fecha
            $detalle = $db->query("SELECT jor.id AS jornada_id, jor.nombre_jornada, 
                COALESCE(jor.fecha_juego, jor.fecha_jornada, jor.fecha) AS fecha_juego,
                SUM(g.cantidad_goles) AS goles
                FROM goles g
                JOIN jornadas jor ON jor.id = g.jornada_id
                WHERE g.jugador_id = ?
                GROUP BY jor.id, jor.nombre_jornada, fecha_juego
                ORDER BY jor.id DESC", [$id])->getResultArray();
        } catch (\Throwable $e) {
            // Si falla, intentar sin ordenar por fecha
            try {
                $detalle = $db->query("SELECT jor.id AS jornada_id, jor.nombre_jornada, SUM(g.cantidad_goles) AS goles
                    FROM goles g
                    JOIN jornadas jor ON jor.id = g.jornada_id
                    WHERE g.jugador_id = ?
                    GROUP BY jor.id, jor.nombre_jornada
                    ORDER BY jor.id DESC", [$id])->getResultArray();
            } catch (\Throwable $e2) {
                $detalle = [];
            }
        }

        $data['jugador'] = $jugador;
        $data['total_goles'] = $total_goles;
        $data['goles_detalle'] = $detalle;

        return view('reportes/jugador', $data);
    }
}
