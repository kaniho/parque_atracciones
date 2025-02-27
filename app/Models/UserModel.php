<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    // Especificamos la tabla que este modelo utilizará en la base de datos.
    protected $table = "users";

    // La clave primaria de la tabla (en este caso, id).
    protected $primarykey = "id";

    // Habilitamos el uso de las marcas de tiempo automáticas (created_at, updated_at).
    //protected $useTimestamps = true;

    // Campos que se pueden insertar o actualizar en la base de datos de manera masiva
    protected $allowedFields = ["nombre_usuario", "email", "password", "id_rol", "archivado"];

    /**
     * Método personalizado para encontrar un usuario por correo electrónico.
     * @param string $email El correo electrónico que se desea buscar.
     * @return array|null Retorna un array con los datos del usuario si lo encuentra, o null si no existe.
    */

    public function findByEmail(string $email) {
        return $this->where("email", $email)->first();
    }

    public function usuarioConRoles($email) {
        return $this->select('users.*, roles.nombre_rol')
        ->join('roles', 'roles.id = users.id_rol')
        ->where('users.email', $email)
        ->first();
    }

}
