<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class RoleFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();

        // Verifica si el usuario está autenticado
        if (!$session->has('isLoggedIn')) {
            return redirect()->to('/login')->with('error', 'Debes iniciar sesión.');
        }

        // Verifica si el usuario tiene el rol adecuado (Administrador)
        if ($session->get('id_rol') != 1) { // 1 = Administrador
            return redirect()->to('/')->with('error', 'No tienes permisos para acceder a esta área.');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No se necesita implementar nada aquí
    }
}
/**
 * Realiza cualquier proceso que este filtro necesite hacer.
 * Por defecto no debe devolver nada durante
 * ejecución normal. Sin embargo, cuando un estado anormal
 * anormal, debería devolver una instancia de
 * CodeIgniter\HTTP\Response. Si lo hace, la ejecución del script
 * la ejecución del script terminará y esa respuesta será
 * enviada de vuelta al cliente, permitiendo páginas de error,
 * redirecciones, etc.
 *
 * @param RequestInterface $request
 * @param array|null       $arguments
 *
 * @return RequestInterface|ResponseInterface|string|void
*/
/**
* Permite a los filtros After inspeccionar y modificar la respuesta
    * según sea necesario. Este método no permite
    * de detener la ejecución de otros filtros posteriores, a excepción de
    * lanzando una Excepción o Error.
    *
    * @param RequestInterface  $request
    * @param ResponseInterface $response
    * @param array|null        $arguments
    *
    * @return ResponseInterface|void
*/