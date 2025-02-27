<?php

namespace App\Controllers;

use App\Models\HorarioModel;

class HorarioController extends BaseController {

    public function index() {
        $horarioModel = new HorarioModel();

        $nombre = $this->request->getVar('nombre');
        $horarioInicio = $this->request->getVar('horarioInicio');
        $horarioFinalizacion = $this->request->getVar('horarioFinalizacion');
        $horarioArchivado = $this->request->getVar('horarioArchivado');

        // Aplicar filtro si se introduce un nombre
        if ($nombre) {
            $horarioModel->like('nombre_horario', $nombre);
        }
        // Aplicar filtro si se selecciona una hora de inicio
        if ($horarioInicio) {
            $horarioModel->like('hora_inicio', $horarioInicio);
        }
        // Aplicar filtro si se selecciona una hora de finalización
        if ($horarioFinalizacion) {
            $horarioModel->like('hora_fin', $horarioFinalizacion);
        }
        if ($horarioArchivado) {
            $horarioModel->where('archivado', 1);
        }

        // Configuración de la paginación
        $perPage = 3; // Número de elementos por página
        $horarios = $horarioModel->paginate($perPage); // Obtener horarios paginados
        $data['pager'] = $horarioModel->pager; // Instancia del paginador
        $pager = $horarioModel->pager; // Instancia del paginador
        $data = [
            'horarios' => $horarios,
            'pager' => $pager,
            'nombre' => $nombre, // Mantener el término de búsqueda en la vista
            'horarioInicio' => $horarioInicio,
            'horarioFinalizacion' => $horarioFinalizacion,
            'horarioArchivado' => $horarioArchivado,
        ];
       

        return view('horarios/horario_list', $data); // Cargar la vista con los datos
    }

    public function saveHorario($id = null) {

        $horarioModel = new HorarioModel();
        helper(['form', 'url']);

        //Cargamos datos del usuario si es edición
        $data['horario'] = $id ? $horarioModel->find($id) : null;

        if ($this->request->getMethod() == 'POST') {

            // Reglas de validación
            $validation = \Config\Services::validation();
            $validation->setRules([
                'nombre_horario' => 'required|min_length[3]|max_length[50]',
                'hora_inicio' => 'required',
                'hora_fin' => 'required',
            ]);

            if (!$validation->withRequest($this->request)->run()) {
                // Mostrar errores de validación
                $data['validation'] = $validation;
            } else {
                // Preparar datos del formulario
                $horarioData = [
                    'nombre_horario' => $this->request->getPost('nombre_horario'),
                    'hora_inicio' => $this->request->getPost('hora_inicio'),
                    'hora_fin' => $this->request->getPost('hora_fin'),
                ];

                if ($id) {
                    // Actualizar horario existente
                    $horarioModel->update($id, $horarioData);
                    $message = 'Horario actualizado correctamente';
                } else {
                    // Crear un nuevo horario
                    $horarioModel->save($horarioData);
                    $message = 'Horario creado correctamente';
                }

                // Redirigir a la lista de horarios con un mensaje de éxito
                return redirect()->to('/horarios')->with('success', $message);
            }
        }

        // Cargar la vista del formulario (crear/editar)
        return view('horarios/horario_form', $data);
    }

    public function delete($id) {
        $horarioModel = new HorarioModel();
        // Marcar el horario como archivada en lugar de eliminarla físicamente
        $horarioModel->update($id, ['archivado' => 1]);
        return redirect()->to('/horarios')->with('success', 'Horario archivado correctamente');
    }

    public function restore($id) {
        $horarioModel = new HorarioModel();
        // Restaurar el horario archivado
        $horarioModel->update($id, ['archivado' => 0]);
        return redirect()->to('/horarios')->with('success', 'Horario restaurado correctamente');
    }
}