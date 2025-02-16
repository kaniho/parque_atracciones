<?php

namespace App\Controllers;

use App\Models\RolesModel;

class RolesController extends BaseController
{
    public function index()
    {
        $roleModel = new RolesModel();
        $data['roles'] = $roleModel->findAll(); // Obtener todos los roles
        return view('role_list', $data); // Cargar la vista con los datos
    }

    public function saveRole($id = null)
    {
        $roleModel = new RolesModel();
        helper(['form', 'url']);
        // Cargar datos del rol si es edición
        $data['role'] = $id ? $roleModel->find($id) : null;

        if ($this->request->getMethod() == 'POST') {

            // Reglas de validación
            $validation = \Config\Services::validation();
            $validation->setRules([
                'nombre_rol' => 'required|min_length[3]|max_length[50]',
            ]);

            if (!$validation->withRequest($this->request)->run()) {
                // Mostrar errores de validación
                $data['validation'] = $validation;
            } else {
                // Preparar datos del formulario
                $roleData = [
                    'nombre_rol' => $this->request->getPost('nombre'),
                ];

                if ($id) {
                    // Actualizar rol existente
                    $roleModel->update($id, $roleData);
                    $message = 'Rol actualizado correctamente.';
                } else {
                    // Crear nuevo rol
                    $roleModel->save($roleData);
                    $message = 'Rol creado correctamente.';
                }

                // Redirigir al listado con un mensaje de éxito
                return redirect()->to('/roles')->with('success', $message);
            }
        }

        return view('role_form', $data); // Cargar la vista con los datos
    }

    public function delete($id)
    {
        $roleModel = new RolesModel();
        $roleModel->delete($id); // Eliminar rol
        return redirect()->to('/roles')->with('success', 'Rol eliminado correctamente.');
    }
}