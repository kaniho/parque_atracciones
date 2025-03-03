<?php

namespace App\Controllers;

use App\Models\ReservaModel;
use App\Models\AtraccionesModel;
use App\Models\UserModel;
use App\Models\HorarioModel;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class ReservaController extends BaseController {

    public function index() {
        $reservaModel = new ReservaModel();
        $atraccionesModel = new AtraccionesModel();
        $usuariosModel = new UserModel();
        $horarioModel = new HorarioModel();

        // Obtener los parámetros de búsqueda
        $atraccion = $this->request->getVar('atraccion'); // Obtener el término de búsqueda desde el formulario
        $usuario = $this->request->getVar('usuario'); // Obtener el filtro de usuario
        $fecha = $this->request->getVar('fecha'); // Obtener el filtro de fecha
        $horario = $this->request->getVar('horario'); // Obtener el filtro de horario
        $cantidaPersona = $this->request->getVar('cantidaPersona'); // Obtener el filtro de cantidad de personas
        $estado = $this->request->getVar('estado'); // Obtener el filtro de estado
        $fechaCreacion = $this->request->getVar('fechaCreacion'); // Obtener el filtro de fecha de creación
        $revervaArchivada = $this->request->getVar('revervaArchivada'); // Obtener el filtro de reserva archivada
        $perPage = $this->request->getVar('perPage') ?? 3; // Obtener el número de elementos por página, por defecto 3 
        
        // Parámetros de ordenación
        $sort = $this->request->getVar('sort') ?? 'reservas.id';
        $order = $this->request->getVar('order') ?? 'asc';
        
        // Contador de filtros activos
        $filtrosActivos = 0;
        if ($atraccion) $filtrosActivos++;
        if ($usuario) $filtrosActivos++;
        if ($fecha) $filtrosActivos++;
        if ($horario) $filtrosActivos++;
        if ($cantidaPersona) $filtrosActivos++;
        if ($estado) $filtrosActivos++;
        if ($fechaCreacion) $filtrosActivos++;
        if ($revervaArchivada !== null) $filtrosActivos++;

        // Construir la consulta con uniones
        $reservaModel->select('reservas.*, atracciones.nombre as nombre_atraccion, users.nombre_usuario, horarios.nombre_horario')
            ->join('atracciones', 'atracciones.id = reservas.id_atraccion')
            ->join('users', 'users.id = reservas.id_usuario')
            ->join('horarios', 'horarios.id = reservas.id_horario');
            

        // Aplicar filtros si se introducen
        if ($atraccion) {
            $reservaModel->like('atracciones.nombre', $atraccion);
        }
        if ($usuario) {
            $reservaModel->like('users.nombre_usuario', $usuario);
        }
        if ($fecha) {
            $reservaModel->like('reservas.fecha', $fecha);
        }
        if ($horario) {
            $reservaModel->like('horarios.nombre_horario', $horario);
        }
        if ($cantidaPersona) {
            $reservaModel->like('reservas.cantidad_personas', $cantidaPersona);
        }
        if ($estado) {
            $reservaModel->like('reservas.estado', $estado);
        }
        if ($fechaCreacion) {
            $reservaModel->like('reservas.fecha_creacion', $fechaCreacion);
        }
        if ($revervaArchivada === '0') {
            $reservaModel->where('reservas.archivado', 0);
        } elseif ($revervaArchivada === '1') {
            $reservaModel->where('reservas.archivado', 1);
        }

        // Aplicar ordenación
        $reservaModel->orderBy($sort, $order);

        // Configuración de la paginación   
        $reservas = $reservaModel->paginate($perPage); // Obtener los resultados paginados
        $pager = $reservaModel->pager; // Instancia del paginador
        $data = [
            'reservas' => $reservas, // Pasar los datos a la vista
            'pager' => $pager,
            'atraccion' => $atraccion, // Mantener el término de búsqueda en la vista
            'usuario' => $usuario, 
            'fecha' => $fecha, 
            'horario' => $horario, 
            'cantidaPersona' => $cantidaPersona, 
            'estado' => $estado,
            'fechaCreacion' => $fechaCreacion,
            'revervaArchivada' => $revervaArchivada,
            'perPage' => $perPage,
            'filtrosActivos' => $filtrosActivos, // Enviar el contador de filtros activos a la vista
            'sort' => $sort, // Enviar el campo de ordenación a la vista
            'order' => $order, // Enviar la dirección de ordenación a la vista
        ];

        // Obtener los nombres de las atracciones y usuarios
        foreach ($reservas as &$reserva) {
            $reserva["nombre_atraccion"] = $atraccionesModel->find($reserva["id_atraccion"])["nombre"];
            $reserva["nombre_usuario"] = $usuariosModel->find($reserva["id_usuario"])["nombre_usuario"];
            $reserva["nombre_horario"] = $horarioModel->find($reserva["id_horario"])["nombre_horario"];
        }

        return view('reservas/reserva_list', $data); // Cargar la vista con los datos
    }

    // parte de exportar a excel
    public function exportExcel() {
        $reservaModel = new ReservaModel();
        $atraccionesModel = new AtraccionesModel();
        $usuariosModel = new UserModel();
        $horarioModel = new HorarioModel();

        // Obtener los parámetros de búsqueda
        $atraccion = $this->request->getVar('atraccion'); // Obtener el término de búsqueda desde el formulario
        $usuario = $this->request->getVar('usuario'); // Obtener el filtro de usuario
        $fecha = $this->request->getVar('fecha'); // Obtener el filtro de fecha
        $horario = $this->request->getVar('horario'); // Obtener el filtro de horario
        $cantidaPersona = $this->request->getVar('cantidaPersona'); // Obtener el filtro de cantidad de personas
        $estado = $this->request->getVar('estado'); // Obtener el filtro de estado
        $fechaCreacion = $this->request->getVar('fechaCreacion'); // Obtener el filtro de fecha de creación
        $revervaArchivada = $this->request->getVar('revervaArchivada'); // Obtener el filtro de reserva archivada

        // Construir la consulta con uniones
        $reservaModel->select('reservas.*, atracciones.nombre as nombre_atraccion, users.nombre_usuario, horarios.nombre_horario')
            ->join('atracciones', 'atracciones.id = reservas.id_atraccion')
            ->join('users', 'users.id = reservas.id_usuario')
            ->join('horarios', 'horarios.id = reservas.id_horario');

        // Aplicar filtros si se introducen
        if ($atraccion) {
            $reservaModel->like('atracciones.nombre', $atraccion);
        }
        if ($usuario) {
            $reservaModel->like('users.nombre_usuario', $usuario);
        }
        if ($fecha) {
            $reservaModel->like('reservas.fecha', $fecha);
        }
        if ($horario) {
            $reservaModel->like('horarios.nombre_horario', $horario);
        }
        if ($cantidaPersona) {
            $reservaModel->like('reservas.cantidad_personas', $cantidaPersona);
        }
        if ($estado) {
            $reservaModel->like('reservas.estado', $estado);
        }
        if ($fechaCreacion) {
            $reservaModel->like('reservas.fecha_creacion', $fechaCreacion);
        }
        if ($revervaArchivada === '0') {
            $reservaModel->where('reservas.archivado', 0);
        } elseif ($revervaArchivada === '1') {
            $reservaModel->where('reservas.archivado', 1);
        }

        $reserva = $reservaModel->findAll(); // Obtener todos los resultados

        $spreadsheet = new Spreadsheet(); // Crear una nueva hoja de cálculo
        $sheet = $spreadsheet->getActiveSheet(); // Obtener la hoja activa

        // Agregar encabezados a la hoja de cálculo
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Atracción');
        $sheet->setCellValue('C1', 'Usuario');
        $sheet->setCellValue('D1', 'Fecha');
        $sheet->setCellValue('E1', 'Horario');
        $sheet->setCellValue('F1', 'Cantidad de personas');
        $sheet->setCellValue('G1', 'Estado');
        $sheet->setCellValue('H1', 'Fecha de creación');

        // Recorre los resultados y los agrega a la hoja de cálculo
        $row = 2;
        foreach ($reserva as $reserva) {
            $sheet->setCellValue('A' . $row, $reserva['id']);
            $sheet->setCellValue('B' . $row, $reserva['nombre_atraccion']);
            $sheet->setCellValue('C' . $row, $reserva['nombre_usuario']);
            $sheet->setCellValue('D' . $row, $reserva['fecha']);
            $sheet->setCellValue('E' . $row, $reserva['nombre_horario']);
            $sheet->setCellValue('F' . $row, $reserva['cantidad_personas']);
            $sheet->setCellValue('G' . $row, $reserva['estado']);
            $sheet->setCellValue('H' . $row, $reserva['fecha_creacion']);
            $row++;
        }

        $writer = new Xlsx($spreadsheet); // Crear un escritor de Excel
        $filename = 'reservas.xlsx'; // Nombre del archivo

        // Enviar el archivo al navegador para descargar
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit;
    }

    public function saveReserva($id = null) {
        $reservaModel = new ReservaModel();
        $atraccionesModel = new AtraccionesModel();
        $usuariosModel = new UserModel();
        $horarioModel = new HorarioModel();
        helper(['form', 'url']);

        // Obtener todas las atracciones
        $data['atracciones'] = $atraccionesModel->findAll();
        $data['horarios'] = $horarioModel->findAll();
        $data['users'] = $usuariosModel->findAll();

        // Cargar datos de la reserva si es edición
        $data['reserva'] = $id ? $reservaModel->find($id) : null;

        if ($this->request->getMethod() == 'POST') {
            // Reglas de validación
            $validation = \Config\Services::validation();
            $validation->setRules([
                'id_atraccion' => 'required|integer',
                'id_usuario' => 'required|string',
                'fecha' => 'required',
                'id_horario' => 'required|integer',
                'cantidad_personas' => 'required|integer',
                'estado' => 'required|string',
            ]);

            if(!$validation->withRequest($this->request)->run()) {
                // Mostrar errores de validación
                $data['validation'] = $validation;
            } else {
                // Buscar el ID del usuario basado en el nombre ingresado
                $usuarioNombre = $this->request->getPost('usuario_nombre');
                $usuario = $usuariosModel->where('nombre_usuario', $usuarioNombre)->first();

                // Preparar datos del formulario
                $fecha = (new \DateTime())->format('Y-m-d'); // Formato compatible con la base de datos
                $fechaCreacion = (new \DateTime())->format('Y-m-d H:i:s'); // Formato compatible con la base de datos
                $reservaData = [
                    'id_atraccion' => $this->request->getPost('id_atraccion'),
                    'id_usuario' => $this->request->getPost('id_usuario'), //$usuario['id'],
                    'fecha' => $fecha,
                    'id_horario' => $this->request->getPost('id_horario'),
                    'cantidad_personas' => $this->request->getPost('cantidad_personas'),
                    'estado' => $this->request->getPost('estado'),
                    'fecha_creacion' => $fechaCreacion,
                ];

                if ($id) {
                    // Actualizar atracción existente
                    $reservaModel->update($id, $reservaData);
                    $message = 'Reseña actualizada correctamente';
                } else {
                    // Crear nueva atracción
                    $reservaModel->save($reservaData);
                    $message = 'Reseña creada correctamente';
                }

                // Redirigir al listado con un mensaje de éxito
                return redirect()->to('/reservas')->with('success',$message);

            }
        }

        // Cargar la vista del formulario (crear/editar)
        return view('reservas/reserva_form', $data);
    }

    public function delete($id) {
        $reservaModel = new ReservaModel();
        // Marcamos el usuario como archivado en lugar de eliminarlo físicamente.
        $reservaModel->update($id, ['archivado' => 1]);
        return redirect()->to('/reservas')->with('error', 'Reserva archivada correctamente');
    }

    public function restore($id) {
        $reservaModel = new ReservaModel();
        // Restaurar el usuario archivado
        $reservaModel->update($id, ['archivado' => 0]);
        return redirect()->to('/reservas')->with('success', 'Reserva restaurada correctamente');
    }
}