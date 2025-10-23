<?php
namespace App\Models;
use CodeIgniter\Model;

class GolModel extends Model
{
    protected $table = 'goles';
    protected $primaryKey = 'id';
    protected $allowedFields = ['jugador_id', 'jornada_id', 'cantidad_goles'];

    // Obtener goles con join a jugador y jornada
    public function getGoles($jugador = null, $jornada = null)
    {
        $builder = $this->select('goles.*, jugador.nombre AS nombre_jugador, jugador.apellido AS apellido_jugador, jornada.nombre_jornada, jornada.fecha_juego')
                        ->join('jugador', 'goles.jugador_id = jugador.id')
                        ->join('jornada', 'goles.jornada_id = jornada.id');

        if ($jugador) {
            $builder->like('jugador.nombre', $jugador);
        }
        if ($jornada) {
            $builder->where('goles.jornada_id', $jornada);
        }

        return $builder->orderBy('goles.id', 'DESC')->findAll();
    }
}
