<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\RolesModel;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Spreadsheet;


class UserController extends BaseController
{
        
    public function index()
    {
        $userModel = new UserModel();

        // Obtener los datos del formulario de búsqueda    
        $usuario = $this->request->getVar('usuario'); // Obtener el término de búsqueda desde el formulario
        $email = $this->request->getVar('email'); // Obtener el filtro de email
        $rol = $this->request->getVar('rol'); // Obtener el filtro de rol
        $ultimaConexion = $this->request->getVar('ultimaConexion'); // Obtener el filtro de última conexión
        $fechaIngreso = $this->request->getVar('fechaIngreso'); // Obtener el filtro de fecha de ingreso
        $usuarioArchivado = $this->request->getVar('usuarioArchivado'); // Obtener el filtro de usuario archivado

        // Construir la consulta con uniones
        $userModel->select('users.*, roles.nombre_rol')
            ->join('roles', 'roles.id = users.id_rol');
            

        // Aplicar filtros si se introducen
        if ($usuario) {
            $userModel->like('users.nombre_usuario', $usuario);
        }
        if ($email) {
            $userModel->like('users.email', $email);
        }
        if ($rol) {
            $userModel->like('roles.nombre_rol', $rol);
        }
        if ($ultimaConexion) {
            $userModel->like('users.ultima_conexion', $ultimaConexion);
        }
        if ($fechaIngreso) {
            $userModel->like('users.fecha_ingreso', $fechaIngreso);
        }
        if ($usuarioArchivado) {
            $userModel->where('users.archivado', 1);
        }

        // Configuración de la paginación
        $perPage = 3; // Número de elementos por página
        $users = $userModel->paginate($perPage); // Obtener usuarios paginados
        $data['pager'] = $userModel->pager; // Instancia del paginador
        // Pasar los datos a la vista
        $pager = $userModel->pager; // Instancia del paginador
        $data = [
            'users' => $users,
            'pager' => $pager,
            'usuario' => $usuario,
            'email' => $email,
            'rol' => $rol,
            'ultimaConexion' => $ultimaConexion,
            'fechaIngreso' => $fechaIngreso,
            'usuarioArchivado' => $usuarioArchivado,
        ];
        /*$data['users'] = $users; // Pasar los usuarios a la vista
        $data['pager'] = $userModel->pager; // Instancia del paginador
        $data['usuario'] = $usuario; // Mantener el término de búsqueda en la vista
        $data['email'] = $email; // Manterner el término de búsqueda en la vista
        $data['rol'] = $rol; // Mantener el filtro de rol en la vista
        $data['ultimaConexion'] = $ultimaConexion; // Mantener el filtro de última conexión en la vista
        $data['fechaIngreso'] = $fechaIngreso; // Mantener el filtro de fecha de ingreso en la vista
        $data['usuarioArchivado'] = $usuarioArchivado; // Mantener el filtro de usuario archivado en la vista*/
        
        
        return view('usuarios/user_list', $data); // Cargar la vista con los datos
    }

    public function exportExcel() {
        $userModel = new UserModel();
    
        $usuario = $this->request->getVar('usuario'); // Obtener el término de búsqueda desde el formulario
        $email = $this->request->getVar('email'); // Obtener el filtro de email
        $rol = $this->request->getVar('rol'); // Obtener el filtro de rol
        $ultimaConexion = $this->request->getVar('ultimaConexion'); // Obtener el filtro de última conexión
        $fechaIngreso = $this->request->getVar('fechaIngreso'); // Obtener el filtro de fecha de ingreso
        $usuarioArchivado = $this->request->getVar('usuarioArchivado'); // Obtener el filtro de usuario archivado
    
        // Construir la consulta con uniones
        $userModel->select('users.*, roles.nombre_rol')
            ->join('roles', 'roles.id = users.id_rol');
    
        // Aplicar filtros si se introducen
        if ($usuario) {
            $userModel->like('users.nombre_usuario', $usuario);
        }
        if ($email) {
            $userModel->like('users.email', $email);
        }
        if ($rol) {
            $userModel->like('roles.nombre_rol', $rol);
        }
        if ($ultimaConexion) {
            $userModel->like('users.ultima_conexion', $ultimaConexion);
        }
        if ($fechaIngreso) {
            $userModel->like('users.fecha_ingreso', $fechaIngreso);
        }
        if ($usuarioArchivado) {
            $userModel->where('users.archivado', 1);
        } 
    
        $users = $userModel->findAll(); // Obtener todos los usuarios que coinciden con los filtros
    
        $spreadsheet = new Spreadsheet(); // Crear una nueva hoja de cálculo
        $sheet = $spreadsheet->getActiveSheet(); // Obtener la hoja activa
    
        // Agregar encabezados a la hoja de cálculo
        $sheet->setCellValue('A1', 'Nombre');
        $sheet->setCellValue('B1', 'Email');
        $sheet->setCellValue('C1', 'Rol');
        //$sheet->setCellValue('D1', 'Última conexión');
        //$sheet->setCellValue('E1', 'Fecha de ingreso');
        $sheet->setCellValue('F1', 'Archivado');
    
        // Recorrer los usuarios y agregarlos a la hoja de cálculo
        $row = 2;
        foreach ($users as $user) {
            $sheet->setCellValue('A' . $row, $user['nombre_usuario']);
            $sheet->setCellValue('B' . $row, $user['email']);
            $sheet->setCellValue('C' . $row, $user['nombre_rol']);
            //$sheet->setCellValue('D' . $row, $user['ultima_conexion']);
           // $sheet->setCellValue('E' . $row, $user['fecha_ingreso']);
            $sheet->setCellValue('F' . $row, $user['archivado'] ? 'Sí' : 'No');
            $row++;
        }
    
        $writer = new Xlsx($spreadsheet); // Crear un escritor de hoja de cálculo
        $filename = 'usuarios.xlsx'; // Nombre del archivo
    
        // Enviar el archivo al navegador para descargar
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit;
    }

    public function saveUser($id = null)
    {
        $userModel = new UserModel();
        $roleModel = new RolesModel();
        helper(['form', 'url']);
        
        // Cargar datos del usuario si es edición
        $data['user'] = $id ? $userModel->find($id) : null;
        $data['roles'] = $roleModel->findAll(); // Obtener todos los roles para el formulario

        if ($this->request->getMethod() == 'POST') {

            // Reglas de validación
            $validation = \Config\Services::validation();
            $validation->setRules([
                'name' => 'required|min_length[3]|max_length[50]',
                'email' => 'required|valid_email',
                'rol' => 'required|integer',
            ]);

            if (!$validation->withRequest($this->request)->run()) {
                // Mostrar errores de validación
                $data['validation'] = $validation;
            } else {
                // Preparar datos del formulario
                $userData = [
                    'nombre_usuario' => $this->request->getPost('name'),
                    'email' => $this->request->getPost('email'),
                    'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT), // Encriptamos la contraseña antes de guardarla.
                    'id_rol' => $this->request->getPost('rol'),
                ];

                if ($id) {
                    // Actualizar usuario existente
                    $userModel->update($id, $userData);
                    $message = 'Usuario actualizado correctamente.';  
                } else {
                    // Crear nuevo usuario
                    $userModel->save($userData);
                    $message = 'Usuario creado correctamente.';
                }

                // Redirigir al listado con un mensaje de éxito
                return redirect()->to('/users')->with('success', $message);
            }
        }

        // Cargar la vista del formulario (crear/editar)
        return view('usuarios/user_form', $data);
    }

    public function delete($id)
    {
        $userModel = new UserModel();
        // Marcamos el usuario como archivado en lugar de eliminarlo físicamente.
        $userModel->update($id, ['archivado' => 1]);
        return redirect()->to('/users')->with('error', 'Usuario archivado correctamente.');
    }

    public function restore($id) { // parte para restaurar un usuario
        $userModel = new UserModel();
        // Restaurar el usuario archivado
        $userModel->update($id, ['archivado' => 0]);
        return redirect()->to('/users')->with('success', 'Usuario restaurado correctamente.');
    }
}