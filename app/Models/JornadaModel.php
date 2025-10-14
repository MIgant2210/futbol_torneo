<?php
namespace App\Models;
use CodeIgniter\Model;

class JornadaModel extends Model
{
    protected $table = 'jornadas';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre_jornada', 'fecha_juego'];
}
