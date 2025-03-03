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
        //$ultimaConexion = $this->request->getVar('ultimaConexion'); // Obtener el filtro de última conexión
        //$fechaIngreso = $this->request->getVar('fechaIngreso'); // Obtener el filtro de fecha de ingreso
        $usuarioArchivado = $this->request->getVar('usuarioArchivado'); // Obtener el filtro de usuario archivado
        $perPage = $this->request->getVar('perPage') ?? 3; // Obtener el número de elementos por página, por defecto 3

        // Parámetros de ordenación
        $sort = $this->request->getVar('sort') ?? 'id';
        $order = $this->request->getVar('order') ?? 'asc';

        // Construir la consulta con uniones
        $userModel->select('users.*, roles.nombre_rol')
            ->join('roles', 'roles.id = users.id_rol');
            
        // Contador de filtros activos
        $filtrosActivos = 0;
        if ($usuario) $filtrosActivos++;
        if ($email) $filtrosActivos++;
        if ($rol) $filtrosActivos++;
        //if ($ultimaConexion) $filtrosActivos++;
        //if ($fechaIngreso) $filtrosActivos++;
        if ($usuarioArchivado !== null) $filtrosActivos++;


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
       /* if ($ultimaConexion) {
            //$userModel->like('users.ultima_conexion', $ultimaConexion);
        }
        if ($fechaIngreso) {
            $userModel->like('users.fecha_ingreso', $fechaIngreso);
        }*/
        if ($usuarioArchivado === '0') {
            $userModel->where('users.archivado', 0);
        } elseif ($usuarioArchivado === '1') {
            $userModel->where('users.archivado', 1);
        }

        // Aplicar ordenación
        $userModel->orderBy($sort, $order);

        // Configuración de la paginación  
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
            //'ultimaConexion' => $ultimaConexion,
            //'fechaIngreso' => $fechaIngreso,
            'usuarioArchivado' => $usuarioArchivado,
            'perPage' => $perPage,
            'filtrosActivos' => $filtrosActivos,
            'sort' => $sort, // Enviar el campo de ordenación a la vista
            'order' => $order, // Enviar la dirección de ordenación a la vista
        ];
        
        return view('usuarios/user_list', $data); // Cargar la vista con los datos
    }

    public function exportExcel() {
        $userModel = new UserModel();
    
        $usuario = $this->request->getVar('usuario'); // Obtener el término de búsqueda desde el formulario
        $email = $this->request->getVar('email'); // Obtener el filtro de email
        $rol = $this->request->getVar('rol'); // Obtener el filtro de rol
       // $ultimaConexion = $this->request->getVar('ultimaConexion'); // Obtener el filtro de última conexión
       //$fechaIngreso = $this->request->getVar('fechaIngreso'); // Obtener el filtro de fecha de ingreso
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
        /*if ($ultimaConexion) {
            $userModel->like('users.ultima_conexion', $ultimaConexion);
        }
        if ($fechaIngreso) {
            $userModel->like('users.fecha_ingreso', $fechaIngreso);
        }*/
        if ($usuarioArchivado === '0') {
            $userModel->where('users.archivado', 0);
        } elseif ($usuarioArchivado === '1') {
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
                'password' => 'permit_empty|min_length[6]', // Permitir campo vacío para la contraseña
            ]);

            if (!$validation->withRequest($this->request)->run()) {
                // Mostrar errores de validación
                $data['validation'] = $validation;
            } else {
                // Preparar datos del formulario
                $userData = [
                    'nombre_usuario' => $this->request->getPost('name'),
                    'email' => $this->request->getPost('email'),
                    //'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT), // Encriptamos la contraseña antes de guardarla.
                    'id_rol' => $this->request->getPost('rol'),
                ];

                // Verificar si se ha proporcionado una nueva contraseña
                $password = $this->request->getPost('password');
                if (!empty($password)) {
                    $userData['password'] = password_hash($password, PASSWORD_DEFAULT); // Encriptamos la nueva contraseña antes de guardarla.
                }

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

    public function updateProfile()
    {
        $session = session();
        $userModel = new UserModel();

        // Obtener el ID del usuario desde la sesión
        $userId = $session->get('id');

        // Validar los datos del formulario
        $validation = \Config\Services::validation();
        $validation->setRules([
            'name' => 'required|min_length[3]|max_length[50]',
            'email' => 'required|valid_email',
            'password' => 'permit_empty|min_length[6]', // Permitir campo vacío para la contraseña
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // Mostrar errores de validación
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Preparar datos del formulario
        $userData = [
            'nombre_usuario' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
        ];

        // Verificar si se ha proporcionado una nueva contraseña
        $password = $this->request->getPost('password');
        if (!empty($password)) {
            $userData['password'] = password_hash($password, PASSWORD_DEFAULT); // Encriptamos la nueva contraseña antes de guardarla.
        }

        // Actualizar usuario existente
        $userModel->update($userId, $userData);

        // Actualizar los datos en la sesión
        $session->set([
            'name' => $userData['nombre_usuario'],
            'email' => $userData['email'],
        ]);

        // Redirigir con un mensaje de éxito
        return redirect()->to('/settings')->with('success', 'Perfil actualizado correctamente.');
    }

    public function deactivateAccount()
    {
        $session = session();
        $userModel = new UserModel();

        // Obtener el ID del usuario desde la sesión
        $userId = $session->get('id');

        // Actualizar el estado del usuario a archivado
        $userModel->update($userId, ['archivado' => 1]);

        // Destruir la sesión del usuario
        $session->destroy();

        // Redirigir al usuario a la página de inicio de sesión con un mensaje de éxito
        return redirect()->to('/login')->with('success', 'Tu cuenta ha sido desactivada correctamente.');
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