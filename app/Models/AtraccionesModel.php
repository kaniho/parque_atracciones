<?php

namespace App\Models;

use CodeIgniter\Model;

class AtraccionesModel extends Model
{
    // Especificamos la tabla que este modelo utilizará en la base de datos.
    protected $table = "atracciones";

    // La clave primaria de la tabla (en este caso, id).
    protected $primaryKey = "id";

    // Habilitamos el uso de las marcas de tiempo automáticas (created_at, updated_at).
    protected $useTimestamps = true;

    // Especificamos los nombres de las columnas de creación y actualización
    protected $createdField  = 'fecha_creacion';
    protected $updatedField  = 'fecha_actualizacion';

    // Campos que se pueden insertar o actualizar en la base de datos de manera masiva
    protected $allowedFields = ["nombre", "descripcion", "altura_minima", "capacidad_maxima", "estado", 'plazas_manana', 'plazas_tarde', "archivado"];
}