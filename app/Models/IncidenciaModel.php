<?php
namespace App\Models;

use CodeIgniter\Model;

class IncidenciaModel extends Model
{
    protected $table = 'incidencias';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'jugador_id',
        'descripcion',
        'tipo_tarjeta',
        'fecha_incidencia',
        'fecha_suspension'
    ];
}

