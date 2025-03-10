<?php
   
return [
    'required' => 'El campo {field} es obligatorio.',
    'min_length' => 'El campo {field} debe tener al menos {param} caracteres.',
    'max_length' => 'El campo {field} no puede exceder de {param} caracteres.',
    'valid_email' => 'El campo {field} debe contener una dirección de correo electrónico válida.',
    'integer' => 'El campo {field} debe contener un número entero.',
    'permit_empty' => 'El campo {field} puede estar vacío.',
    // Añade aquí otras reglas de validación que necesites...
    'attributes' => [
        'name' => 'nombre',
        'email' => 'correo electrónico',
        'rol' => 'rol',
        'password' => 'contraseña',
    ],
];