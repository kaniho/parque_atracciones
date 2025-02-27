<?php

namespace App\Models;

use CodeIgniter\Model;

class EventoModel extends Model
{
    protected $table = 'evento';
    protected $primaryKey = 'pk_id_evento';
    protected $allowedFields = ['titulo', 'fecha_inicio', 'fecha_final', 'descripcion_ES', 'descripcion_EN', 'fecha_borrado'];
}