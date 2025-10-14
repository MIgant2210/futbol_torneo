<?php
namespace App\Models;
use CodeIgniter\Model;

class GolModel extends Model
{
    protected $table = 'goles';
    protected $primaryKey = 'id';
    protected $allowedFields = ['jugador_id', 'jornada_id', 'cantidad_goles'];
}
