<?php

namespace App\Controllers;

use App\Models\UserModel; // Importamos el modelo de usuarios para interactuar con la base de datos.

class AuthController extends BaseController {

    /**
    * Muestra el formulario de registro de usuario.
    */

    public function register() {
        helper(['form']); // Carga el helper de formularios
        return view("register"); // Carga y retorna la vista del formulario de registro
    }

    /**
    * Procesa el registro de un nuevo usuario.
    */

    public function processRegister() {
        helper(["form", "url"]); //Carga los helpers necesarios para trabajar con formularios y urls
        
        // Configuración de las reglas de validación del formulario
        $rules = [
            'name' => 'required|min_length[3]|max_length[50]', // El nombre es obligatorio y debe tener entre 3 y 50 caracteres.
            'email' => 'required|valid_email|is_unique[users.email]', // El correo debe ser válido y único en la tabla `users`.
            'password' => [
                'rules' => 'required|min_length[6]|regex_match[/^(?=.*[A-Z])(?=.*\d).+$/]',
                'errors' => [
                    'regex_match' => 'La contraseña debe contener al menos una letra mayúscula y un número.',
                ],
            ], // La contraseña debe ser obligatoria, tener al menos 6 caracteres, una letra mayúscula y un número.
            'password_confirm' => 'required|matches[password]', // La confirmación de la contraseña debe coincidir con la contraseña.
        ];

        // Si la validación falla, volvemos a mostrar el formulario con los errores
        if (!$this->validate($rules)) {
            return view("register", [
                "validation" => $this->validator, // Pasamos los errores de validación a la vista
            ]);
        }
        
        // Si la validación pasa, procedemos a guardar el usuario en la base de datos
        $userModel = new UserModel();
        $userModel->save( [
            'nombre_usuario' => $this->request->getPost('name'), // Obtenemos el nombre del formulario.
            'email' => $this->request->getPost('email'), // Obtenemos el correo del formulario.
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT), // Encriptamos la contraseña antes de guardarla.
            'id_rol' => 2 // Forzamos que siempre sea "usuario"
        ]);

        // Redirigimos al formulario de inicio de sesión con un mensaje de éxito
        return redirect()->to("/login")->with("success", "Usuario registrado correctamente.");
    }

    /**
    * Muestra el formulario de inicio de sesión.
    */
    public function login()
    {
        helper(['form']); // Carga el helper de formularios
        return view('login'); // Carga y retorna la vista del formulario de inicio de sesión.
    }

    /**
    * Procesa el inicio de sesión del usuario.
    */

    public function processLogin() {
        helper(["form", "url"]); // Carga los helpers necesarios para trabajar con formularios y urls.
        $session = session(); // Inicia una sesión para el usuario

        // Configuración de las reglas de validación del formulario
        $rules = [
            "email" => "required|valid_email", // El correo es obligatorio y debe ser válido
            "password" => "required", // La contraseña es obligatoria
        ];

        // Si la validación falla, volvemos a mostrar el formulario con los errores.
        if (!$this->validate($rules)) {
            return view('login', [
                'validation' => $this->validator, // Pasamos los errores de validación a la vista.
            ]);
        }

        // Si la validación pasa, verificamos las credenciales.
        $userModel = new UserModel();
        $user = $userModel->usuarioConRoles($this->request->getPost("email")); //Buscamos al usuario por su correo

        if ($user && password_verify($this->request->getPost('password'), $user['password'])) {
            // Verificar si el usuario está archivado
            if ($user['archivado'] == 1) {
                return redirect()->to('/login')->with('error', 'Tu cuenta está desactivada.');
            }
            
            // Si las credenciales son correctas, guardamos datos del usuario en la sesión.
            $session->set([
                'id' => $user['id'],           // ID del usuario.
                'id_rol' => $user['id_rol'],   // ID del rol.
                'rol' => $user['nombre_rol'],   // Nombre del rol.
                'name' => $user['nombre_usuario'],       // Nombre del usuario.
                'email' => $user['email'],     // Correo del usuario.
                'isLoggedIn' => true,          // Bandera para indicar que está logueado.
            
            ]);

            // Redirigir dependiendo del rol
            if ($user['id_rol'] == 1) {
                return redirect()->to('/users')->with('success', 'Bienvenido Administrador.');
            } else if ($user['id_rol'] == 2) {
                return redirect()->to('/dashboard')->with('success', 'Inicio de sesión exitoso.');
            }

            // Redirigimos a la página de inicio con un mensaje de éxito.
            //return redirect()->to('/users')->with('success', 'Inicio de sesión exitoso.');
        }

        // Si las credenciales son incorrectas, mostramos un mensaje de error.
        return redirect()->to('/login')->with('error', 'Correo o contraseña incorrectos.');

    }

    public function deactivateAccount()
    {
        $session = session();
        $userId = $session->get('id');

        if ($this->request->getMethod() == 'POST') {
            $userModel = new UserModel();
            $userModel->update($userId, ['archivado' => 1]);

            $session->destroy();
            return redirect()->to('/login')->with('success', 'Tu cuenta ha sido desactivada.');
        }

        return redirect()->to('/settings')->with('error', 'No se pudo desactivar la cuenta.');
    }

    /**
    * Cierra la sesión del usuario.
    */
    public function logout()
    {
        $session = session(); // Inicia o accede a la sesión.
        $session->destroy(); // Destruye todos los datos de la sesión.

        // Redirige al formulario de inicio de sesión con un mensaje de éxito.
        return redirect()->to('/login')->with('success', 'Has cerrado sesión correctamente.');
    }

    


    /*Parte del dashboard */
    public function dashboard() {
        $session = session();
        
        if (!$session->get('isLoggedIn')) {
            return redirect()->to('/login')->with('error', 'Debes iniciar sesión para acceder al Dashboard.');
        }
        
        return view('dashboard');
    }

   

    /* Parte de los ajuste de la cuenta */
    public function setting() {
        $session = session();
        
        if (!$session->get('isLoggedIn')) {
            return redirect()->to('/login')->with('error', 'Debes iniciar sesión para acceder a los ajustes de la cuenta.');
        }
        return view('user_settings');
    }

    /* Parte del información de la cuenta */
    public function info_users() {
        $session = session();

        if (!$session->get('isLoggedIn')) {
            return redirect()->to('/login')->with('error', 'Debes iniciar sesión para acceder a la información de la cuenta.');
        }
        return view('info_users');
    }

    /* Parte del changelog */
    public function changelog() {
        $session = session();

        if (!$session->get('isLoggedIn')) {
            return redirect()->to('/login')->with('error', 'Debes iniciar sesión para acceder al changelog.');
        }
        return view('changelog');
    }


}

?>