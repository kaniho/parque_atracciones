<?php

namespace App\Controllers;

use App\Models\ReservaModel;
use App\Models\AtraccionesModel;
use App\Models\UserModel;
use App\Models\HorarioModel;

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
        if ($revervaArchivada) {
            $reservaModel->where('reservas.archivado', 1);
        }

        // Configuración de la paginación
        $perPage = 3; // Número de elementos por página
        // Obtener los resultados paginados
        $reservas = $reservaModel->paginate($perPage);

        // Obtener los nombres de las atracciones y usuarios
        foreach ($reservas as &$reserva) {
            $reserva["nombre_atraccion"] = $atraccionesModel->find($reserva["id_atraccion"])["nombre"];
            $reserva["nombre_usuario"] = $usuariosModel->find($reserva["id_usuario"])["nombre_usuario"];
            $reserva["nombre_horario"] = $horarioModel->find($reserva["id_horario"])["nombre_horario"];
        }

        $data["reservas"] = $reservas; // Pasar los datos a la vista
        $data["pager"] = $reservaModel->pager; // Instancia del paginador
        $data["atraccion"] = $atraccion; // Mantener el término de búsqueda en la vista
        $data["usuario"] = $usuario; // Mantener el filtro de usuario en la vista
        $data["fecha"] = $fecha; // Mantener el filtro de fecha en la vista
        $data["horario"] = $horario; // Mantener el filtro de horario en la vista
        $data["cantidaPersona"] = $cantidaPersona; // Mantener el filtro de cantidad de personas en la vista
        $data["estado"] = $estado; // Mantener el filtro de estado en la vista
        $data["fechaCreacion"] = $fechaCreacion; // Mantener el filtro de fecha de creación en la vista
        $data["revervaArchivada"] = $revervaArchivada; // Mantener el filtro de reserva archivada en la vista

    
        // Agregar ordenación por columnas


        return view('reserva_list', $data); // Cargar la vista con los datos
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
        return view('reserva_form', $data);
    }

    public function delete($id) {
        $reservaModel = new ReservaModel();
        // Marcamos el usuario como archivado en lugar de eliminarlo físicamente.
        $reservaModel->update($id, ['archivado' => 1]);
        return redirect()->to('/reservas')->with('success', 'Reserva archivada correctamente');
    }

    public function restore($id) {
        $reservaModel = new ReservaModel();
        // Restaurar el usuario archivado
        $reservaModel->update($id, ['archivado' => 0]);
        return redirect()->to('/reservas')->with('success', 'Reserva restaurada correctamente');
    }
}