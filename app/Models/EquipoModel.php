<?php
namespace App\Models;
use CodeIgniter\Model;

class EquipoModel extends Model
{
    protected $table = 'equipos';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = [
        'nombre_equipo',
        'color_equipo',
        'escudo'
    ];

    // si usás timestamps
    // protected $useTimestamps = true;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
}

