<?php

namespace App\Controllers;

use App\Models\TicketModel;
use App\Models\ReservaModel;

class TicketController extends BaseController
{
    public function index()
    {
        $ticketModel = new TicketModel();
        $reservaModel = new ReservaModel();

        // Obtener los parámetros de búsqueda
        $codigoTicket = $this->request->getVar('codigoTicket'); // Obtener el filtro de código de ticket
        $fechaCreacion = $this->request->getVar('fechaCreacion'); // Obtener el filtro de fecha de creación
        $estado = $this->request->getVar('estado'); // Obtener el filtro de estado
        $ticketArchivado = $this->request->getVar('ticketArchivado'); // Obtener el filtro de ticket archivado

        // Construir la consulta con uniones
        $ticketModel->select('ticket.*, reservas.estado')
            ->join('reservas', 'reservas.id = ticket.id_reserva');

        // Aplicar filtro si se introduce un nombre
        if ($codigoTicket) {
            $ticketModel->like('codigo_ticket', $codigoTicket);
        }
        if ($fechaCreacion) {
            $ticketModel->like('fecha_creacion', $fechaCreacion);
        }
        if ($estado) {
            $ticketModel->like('estado', $estado);
        }
        if ($ticketArchivado) {
            $ticketModel->where('ticket.archivado', 1);
        }
       
        // Configuración de la paginación
        $perPage = 3; // Número de elementos por página
        $tickets = $ticketModel->paginate($perPage); // Obtener tickets paginados
        $pager = $ticketModel->pager; // Instancia del paginador
        $data['pager'] = $ticketModel->pager; // Instancia del paginador
        $data = [
            'tickets' => $tickets,
            'pager' => $pager,
            'codigoTicket' => $codigoTicket,
            'fechaCreacion' => $fechaCreacion,
            'estado' => $estado,
            'ticketArchivado' => $ticketArchivado,
        ];
      
        // Obtener los nombres de las reservas
        foreach ($tickets as &$ticket) {
            $reserva = $reservaModel->find($ticket['id_reserva']);
            $ticket['id_reserva'] = $reserva ? $reserva['estado'] : '--';
        }

      /*  $data['tickets'] = $tickets;
        $data['pager'] = $ticketModel->pager; // Instancia del paginador
        $data['codigoTicket'] = $codigoTicket; // Mantener el término de búsqueda en la vista
        $data['fechaCreacion'] = $fechaCreacion; // Mantener el filtro de fecha de creación en la vista
        $data['estado'] = $estado; // Mantener el filtro de estado en la vista
        $data['ticketArchivado'] = $ticketArchivado; // Mantener el filtro de ticket archivado en la vista*/
        
        return view('tickets/ticket_list', $data); // Cargar la vista con los datos
    }

    public function saveTicket($id = null)
    {
        $ticketModel = new TicketModel();
        $reservaModel = new ReservaModel();
        helper(['form', 'url']);

        // Cargar datos del ticket si es edición
        $data['ticket'] = $id ? $ticketModel->find($id) : null;
    

        // Obtener todas las reservas confirmadas
        $data['reservas'] = $reservaModel->where('estado', 'confirmada')->findAll();

   
        if ($this->request->getMethod() == 'POST') {
            // Reglas de validación
            $validation = \Config\Services::validation();
            $validation->setRules([
                'id_reserva' => 'required|integer',
                'codigo_ticket' => 'required|string|max_length[20]',
            ]);
         

            if (!$validation->withRequest($this->request)->run()) {
                // Mostrar errores de validación
                $data['validation'] = $validation;
                return view('ticket_form', $data);
            } else {
                // Verificar que la reserva esté confirmada
                $idReserva = $this->request->getPost('id_reserva');
                $reserva = $reservaModel->find($idReserva);

                if (!$reserva || $reserva['estado'] !== 'confirmada') {
                    // Mostrar error si la reserva no está confirmada
                    return redirect()->back()->with('error', 'La reserva no está confirmada');
                }

                // Preparar datos del formulario
                $fechaCreacion = (new \DateTime())->format('Y-m-d H:i:s'); // Formato compatible con la base de datos
                $ticketData = [
                    'id_reserva' => $this->request->getPost('id_reserva'),
                    'codigo_ticket' => $this->request->getPost('codigo_ticket'),
                    'fecha_creacion' => $fechaCreacion, // Establecer la fecha de creación automáticamente
                ];

                if ($id) {
                    // Actualizar ticket existente
                    $ticketModel->update($id, $ticketData);
                    $message = 'Ticket actualizado correctamente';
                } else {
                    // Crear nuevo ticket
                    $ticketModel->save($ticketData);
                    $message = 'Ticket creado correctamente';
                }

                // Redirigir al listado con un mensaje de éxito
                return redirect()->to('/tickets')->with('success', $message);
            }
        }

        // Cargar la vista del formulario (crear/editar)
        return view('tickets/ticket_form', $data);
    }

    public function delete($id)
    {
        $ticketModel = new TicketModel();
        // Marcamos el usuario como archivado en lugar de eliminarlo físicamente.
        $ticketModel->update($id, ['archivado' => 1]);
        return redirect()->to('/tickets')->with('success', 'Ticket eliminado correctamente');
    }

    public function restore($id) {
        $ticketModel = new TicketModel();
        // Restaurar el ticket archivado
        $ticketModel->update($id,['archivado' => 0]);
        return redirect()->to('/tickets')->with('success', 'Ticket restaurado correctamente');
    }
}