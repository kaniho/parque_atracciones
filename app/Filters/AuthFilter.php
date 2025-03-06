<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Verificar si el usuario está autenticado
        if (!session()->get('isLoggedIn')) {
            // Si no está autenticado, redirigir al login
            return redirect()->to('/login')->with('error', 'Debes iniciar sesión.');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No hacer nada después de la solicitud
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