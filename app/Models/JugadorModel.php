<?php

namespace App\Models;

use CodeIgniter\Model;

class JugadorModel extends Model
{
    protected $table = 'jugadores';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'nombre',
        'apellido',
        'fecha_nacimiento',
        'foto',
        'equipo_id'
    ];
}
