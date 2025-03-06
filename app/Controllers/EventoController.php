<?php

namespace App\Controllers;

use App\Models\EventoModel;
use App\Models\UserModel;
use App\Models\ReservaModel;
use App\Models\ReviewModel;
use App\Models\AtraccionesModel;

class EventoController extends BaseController
{
    public function index(): string
    {
        return view('calendario');
    }

    
    public function fetchEvents()
    {
        $eventModel = new EventoModel(); // Crea una instancia del modelo
        $events = $eventModel->where('fecha_borrado', null)->findAll(); // Solo obtener eventos no borrados

        return $this->response->setJSON($events); // Devuelve los eventos en formato JSON
    }

    public function addEvent()
    {
        $eventModel = new EventoModel();
    
        $data = [
            'titulo' => $this->request->getPost('titulo'), // Obtiene el título desde la petición AJAX
            'fecha_inicio' => $this->request->getPost('fecha_inicio'), // Obtiene la fecha de inicio
            'fecha_final' => $this->request->getPost('fecha_final'), // Obtiene la fecha de fin
            'descripcion_ES' => $this->request->getPost('descripcion_ES') // Obtiene la descripción
        ];
    
        if ($eventModel->insert($data)) { // Intenta insertar el evento en la BD
            return $this->response->setJSON(['status' => 'success']); // Responde con éxito
        } else {
            return $this->response->setJSON(['status' => 'error']); // Responde con error
        }
    }

    public function deleteEvent($id)
    {
        $eventModel = new EventoModel();
        $data = ['fecha_borrado' => date('Y-m-d H:i:s')]; // Establecer la fecha de borrado actual
        $eventModel->update($id, $data); // Actualizar el evento con la fecha de borrado

        return $this->response->setJSON(['status' => 'success']); 
    }

    /**
    * Parte de la graficas.
    */
     /*Parte del graficos */
     public function graficos() {  
        $session = session();

        if (!$session ->get('isLoggedIn')) {
            return redirect()->to('/login')->with('error', 'Debes iniciar sesión para acceder a los gráficos.');
        }
        return view('graficos');
    }
    public function getUserData()
    {
        $userModel = new UserModel();
        $users = $userModel->findAll();

        $data = [
            'total_users' => count($users),
            'users' => $users
        ];

        return $this->response->setJSON($data);
    }

    public function getReservaData()
    {
        $reservaModel = new ReservaModel();
        $reservas = $reservaModel->findAll();

        $data = [
            'total_reservas' => count($reservas),
            'reservas' => $reservas
        ];

        return $this->response->setJSON($data);
    }

    public function getReviewData()
    {
        $reviewModel = new ReviewModel();
        $reviews = $reviewModel->findAll();

        $data = [
            'total_reviews' => count($reviews),
            'reviews' => $reviews
        ];

        return $this->response->setJSON($data);
    }

    public function getAtraccionData()
    {
        $atraccionModel = new AtraccionesModel();
        $atracciones = $atraccionModel->findAll();

        $data = [
            'total_atracciones' => count($atracciones),
            'atracciones' => $atracciones
        ];

        return $this->response->setJSON($data);
    }



   
}