<?php

namespace App\Models;

use CodeIgniter\Model;

class ReservaModel extends Model
{
    // Especificamos la tabla que este modelo utilizará en la base de datos.
    protected $table = "reservas";

    // La clave primaria de la tabla (en este caso, id).
    protected $primarykey = "id";

    // Habilitamos el uso de las marcas de tiempo automáticas (created_at, updated_at).
    //protected $useTimestamps = true;

    // Campos que se pueden insertar o actualizar en la base de datos de manera masiva
    protected $allowedFields = ["id_usuario","id_atraccion","fecha", "id_horario", "cantidad_personas", "estado", 'fecha_creacion', 'fecha_actualizacion', "archivado"];

    public function search($filters) {
        foreach ($filters as $field => $value) {
            $this->like($field, $value);
        }
        return $this;
    }
    


}
