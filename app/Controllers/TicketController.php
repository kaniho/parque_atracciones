<?php

namespace App\Controllers;

use App\Models\TicketModel;
use App\Models\ReservaModel;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

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
        $perPage = $this->request->getVar('perPage') ?? 3; // Obtener el número de elementos por página, por defecto 3
        $page = $this->request->getVar('page') ?? 1; // Obtener la página actual, por defecto 1

        // Parámetros de ordenación
        $sort = $this->request->getVar('sort') ?? 'id';
        $order = $this->request->getVar('order') ?? 'asc';

        // Construir la consulta con uniones
        $ticketModel->select('ticket.*, reservas.estado')
            ->join('reservas', 'reservas.id = ticket.id_reserva');

        // Contador de filtros activos
        $filtrosActivos = 0;
        if ($codigoTicket) $filtrosActivos++;
        if ($fechaCreacion) $filtrosActivos++;
        if ($estado) $filtrosActivos++;
        if ($ticketArchivado !== null) $filtrosActivos++;

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
        if ($ticketArchivado === '0') {
            $ticketModel->where('ticket.archivado', 0);
        } elseif ($ticketArchivado === '1') {
            $ticketModel->where('ticket.archivado', 1);
        }

        // Aplicar ordenación
        $ticketModel->orderBy($sort, $order);
       
        // Configuración de la paginación
        $tickets = $ticketModel->paginate($perPage); // Obtener tickets paginados
        $pager = $ticketModel->pager; // Instancia del paginador
        // Pasar los datos a la vista
        $data = [
            'tickets' => $tickets,
            'pager' => $pager,
            'codigoTicket' => $codigoTicket,
            'fechaCreacion' => $fechaCreacion,
            'estado' => $estado,
            'ticketArchivado' => $ticketArchivado,
            'perPage' => $perPage,
            'filtrosActivos' => $filtrosActivos,
            'sort' => $sort, // Enviar el campo de ordenación a la vista
            'order' => $order, // Enviar la dirección de ordenación a la vista
            'page' => $page, // Enviar la página actual a la vista
        ];
      
        // Obtener los nombres de las reservas
        foreach ($tickets as &$ticket) {
            $reserva = $reservaModel->find($ticket['id_reserva']);
            $ticket['id_reserva'] = $reserva ? $reserva['estado'] : '--';
        }
        
        return view('tickets/ticket_list', $data); // Cargar la vista con los datos
    }

    // Exporta a excel
    public function exportExcel() {
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
        if ($ticketArchivado === '0') {
            $ticketModel->where('ticket.archivado', 0);
        } elseif ($ticketArchivado === '1') {
            $ticketModel->where('ticket.archivado', 1);
        }

        $tickets = $ticketModel->findAll(); // Obtener todos los tickets

        $spreadsheets = new Spreadsheet(); // Crear una nueva hoja de cálculo
        $sheet = $spreadsheets->getActiveSheet(); // Obtener la hoja activa

        // Agregar ancabezados a la hoja de cálculo
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'ID Reserva');
        $sheet->setCellValue('C1', 'Código Ticket');
        $sheet->setCellValue('D1', 'Fecha Creación');
        $sheet->setCellValue('E1', 'Estado');

        // Agregar los datos de los tickets a la hoja de cálculo
        $row = 2;
        foreach ($tickets as $ticket) {
            $reserva = $reservaModel->find($ticket['id_reserva']);
            $sheet->setCellValue('A' . $row, $ticket['id']);
            $sheet->setCellValue('B' . $row, $reserva ? $reserva['estado'] : '--');
            $sheet->setCellValue('C' . $row, $ticket['codigo_ticket']);
            $sheet->setCellValue('D' . $row, $ticket['fecha_creacion']);
            $sheet->setCellValue('E' . $row, $ticket['estado']);
            $row++;
        }

        $writer = new Xlsx($spreadsheets); // Crear un escritor de hoja de cálculo
        $fileName = 'tickets.xlsx'; // Nombre del archivo
        
        // Enviar el achivo al navegador para descargar
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $fileName . '"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit;     
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
        return redirect()->to('/tickets')->with('error', 'Ticket eliminado correctamente');
    }

    public function restore($id) {
        $ticketModel = new TicketModel();
        // Restaurar el ticket archivado
        $ticketModel->update($id,['archivado' => 0]);
        return redirect()->to('/tickets')->with('success', 'Ticket restaurado correctamente');
    }
}