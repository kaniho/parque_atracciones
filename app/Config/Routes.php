<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//$routes->get('/', 'Home::index');

// rutas login y registro
$routes->get('login', 'AuthController::login'); // Página de login
$routes->post('login/process', 'AuthController::processLogin'); // Procesar login
$routes->get("register", "AuthController::register"); //Página de registro
$routes->post("register/process", "AuthController::processRegister"); //Procesar registro
$routes->get('logout', 'AuthController::logout'); // Cerrar sesión
$routes->get("dashboard", "AuthController::dashboard"); // Página de dashboard
$routes->get("calendario", "Calendario::index"); // Página de calendario
$routes->get('settings', 'AuthController::setting');
$routes->get('info_users', 'AuthController::info_users');


// rutas de atracciones
$routes->get('atracciones', 'AtraccionesController::index');
$routes->get('atracciones/save', 'AtraccionesController::saveAtraccion');
$routes->get('atracciones/save/(:num)', 'AtraccionesController::saveAtraccion/$1');
$routes->post('atracciones/save', 'AtraccionesController::saveAtraccion');
$routes->post('atracciones/save/(:num)', 'AtraccionesController::saveAtraccion/$1');
$routes->get('atracciones/delete/(:num)', 'AtraccionesController::delete/$1');
$routes->get('atracciones/restore/(:num)', 'AtraccionesController::restore/$1');
$routes->get('atracciones/exportExcel', 'AtraccionesController::exportExcel');

// rutas de reseñas
$routes->get('reviews', 'ReviewController::index');
$routes->get('reviews/save', 'ReviewController::saveReview');
$routes->get('reviews/save/(:num)', 'ReviewController::saveReview/$1');
$routes->post('reviews/save', 'ReviewController::saveReview');
$routes->post('reviews/save/(:num)', 'ReviewController::saveReview/$1');
$routes->get('reviews/delete/(:num)', 'ReviewController::delete/$1');
$routes->get('reviews/restore/(:num)', 'ReviewController::restore/$1');
$routes->get('reviews/exportExcel', 'ReviewController::exportExcel');

// rutas de reservas
$routes->get('reservas', 'ReservaController::index');
$routes->get('reservas/save', 'ReservaController::saveReserva');
$routes->get('reservas/save/(:num)', 'ReservaController::saveReserva/$1');
$routes->post('reservas/save', 'ReservaController::saveReserva');
$routes->post('reservas/save/(:num)', 'ReservaController::saveReserva/$1');
$routes->get('reservas/delete/(:num)', 'ReservaController::delete/$1');
$routes->get('reservas/restore/(:num)', 'ReservaController::restore/$1');
$routes->get('reservas/exportExcel', 'ReservaController::exportExcel');

// rutas de horarios
$routes->get('horarios', 'HorarioController::index');
$routes->get('horarios/save', 'HorarioController::saveHorario');
$routes->get('horarios/save/(:num)', 'HorarioController::saveHorario/$1');
$routes->post('horarios/save', 'HorarioController::saveHorario');
$routes->post('horarios/save/(:num)', 'HorarioController::saveHorario/$1');
$routes->get('horarios/delete/(:num)', 'HorarioController::delete/$1');
$routes->get('horarios/restore/(:num)', 'HorarioController::restore/$1');
$routes->get('horarios/exportExcel', 'HorarioController::exportExcel');

// rutas de tickets
$routes->get('tickets', 'TicketController::index');
$routes->get('tickets/save', 'TicketController::saveTicket');
$routes->get('tickets/save/(:num)', 'TicketController::saveTicket/$1');
$routes->post('tickets/save', 'TicketController::saveTicket');
$routes->post('tickets/save/(:num)', 'TicketController::saveTicket/$1');
$routes->get('tickets/delete/(:num)', 'TicketController::delete/$1');
$routes->get('tickets/restore/(:num)', 'TicketController::restore/$1');
$routes->get('tickets/exportExcel', 'TicketController::exportExcel');

// rutas de eventos
$routes->get('fetch-events', 'EventoController::fetchEvents');
$routes->post('add-event', 'EventoController::addEvent');
$routes->delete('delete-event/(:num)', 'EventoController::deleteEvent/$1');


// Grupo de rutas con filtro
$routes->group("", ["filter" => "role"], function ($routes) {
    //$routes->get("/", "AdminController::dashboard");
    // rutas crud
    $routes->get('users', 'UserController::index'); // Listar usuarios
    $routes->get('users/save', 'UserController::saveUser'); // Mostrar formulario para crear usuario
    $routes->get('users/save/(:num)', 'UserController::saveUser/$1'); // Mostrar formulario para editar usuario
    $routes->post('users/save', 'UserController::saveUser'); // Crear usuario (POST)
    $routes->post('users/save/(:num)', 'UserController::saveUser/$1'); // Editar usuario (POST)
    $routes->get('users/delete/(:num)', 'UserController::delete/$1'); // Eliminar usuario
    $routes->get('users/restore/(:num)', 'UserController::restore/$1'); // Restaurar usuario
    $routes->get('users/exportExcel', 'UserController::exportExcel'); // Exportar usuarios a Excel
    $routes->post('user/updateProfile', 'UserController::updateProfile'); // Actualizar perfil de usuario
    $routes->post('user/deactivateAccount', 'UserController::deactivateAccount'); // Desactivar cuenta de usuario
});