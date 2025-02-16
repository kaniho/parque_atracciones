<?php

namespace App\Models;

use CodeIgniter\Model;

class ReviewModel extends Model
{
    // Especificamos la tabla que este modelo utilizará en la base de datos.
    protected $table = "review";

    // La clave primaria de la tabla (en este caso, id).
    protected $primaryKey = "id";

    // Habilitamos el uso de las marcas de tiempo automáticas (created_at, updated_at).
    protected $useTimestamps = true;

    // Campos que se pueden insertar o actualizar en la base de datos de manera masiva
    protected $allowedFields = ["id_atraccion", "id_usuario", "calificacion", "comentario", "fecha_creacion","archivado"];
}