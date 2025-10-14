<?php
namespace App\Controllers;

use App\Models\JugadorModel;
use App\Models\EquipoModel;
use App\Models\GolModel;
use App\Models\IncidenciaModel;
use App\Models\JornadaModel;

class DashboardController extends BaseController
{
    public function index()
    {
        try {
            // 🔹 Cargar modelos
            $jugadorModel = new JugadorModel();
            $equipoModel = new EquipoModel();
            $golModel = new GolModel();
            $incidenciaModel = new IncidenciaModel();
            $jornadaModel = new JornadaModel();

            // 🔹 Totales seguros
            $totalJugadores = $jugadorModel->countAllResults() ?? 0;
            $totalEquipos = $equipoModel->countAllResults() ?? 0;
            $totalIncidencias = $incidenciaModel->countAllResults() ?? 0;

            // 🔹 Total de goles — maneja tabla vacía
            $totalGoles = 0;
            $golesData = $golModel->selectSum('cantidad_goles')->first();
            if (is_array($golesData) && isset($golesData['cantidad_goles'])) {
                $totalGoles = $golesData['cantidad_goles'] ?? 0;
            }

            // 🔹 Próxima jornada (segura)
            $proxima = $jornadaModel
                ->where('fecha_juego >=', date('Y-m-d'))
                ->orderBy('fecha_juego', 'ASC')
                ->first();

            if (is_array($proxima) && isset($proxima['nombre_jornada'])) {
                $proximaJornada = $proxima['nombre_jornada'] . ' (' . ($proxima['fecha_juego'] ?? '') . ')';
            } else {
                $proximaJornada = 'No definida';
            }

            // ✅ Cargar vista del dashboard
            return view('dashboard/index', [
                'totalJugadores' => $totalJugadores,
                'totalEquipos' => $totalEquipos,
                'totalGoles' => $totalGoles,
                'totalIncidencias' => $totalIncidencias,
                'proximaJornada' => $proximaJornada
            ]);

        } catch (\Throwable $e) {
            // 🔹 Manejo de errores
            return view('dashboard/index', [
                'totalJugadores' => 0,
                'totalEquipos' => 0,
                'totalGoles' => 0,
                'totalIncidencias' => 0,
                'proximaJornada' => 'Error al cargar',
                'errorMessage' => $e->getMessage()
            ]);
        }
    }
}
