<?php

namespace App\Controllers;

use App\Models\HorarioModel;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class HorarioController extends BaseController {

    public function index() {
        $horarioModel = new HorarioModel();

        $nombre = $this->request->getVar('nombre');
        $horarioInicio = $this->request->getVar('horarioInicio');
        $horarioFinalizacion = $this->request->getVar('horarioFinalizacion');
        $horarioArchivado = $this->request->getVar('horarioArchivado');
        $perPage = $this->request->getVar('perPage') ?? 3;
        $page = $this->request->getVar('page') ?? 1; // Obtener la página actual, por defecto 1

        // Parámetros de ordenación
        $sort = $this->request->getVar('sort') ?? 'id';
        $order = $this->request->getVar('order') ?? 'asc';

        // Contador de filtros activos
        $filtrosActivos = 0;
        if ($nombre) $filtrosActivos++;
        if ($horarioInicio) $filtrosActivos++;
        if ($horarioFinalizacion) $filtrosActivos++;
        if ($horarioArchivado !== null) $filtrosActivos++;

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
        if ($horarioArchivado === '0') {
            $horarioModel->where('horarios.archivado', 0);
        } elseif ($horarioArchivado === '1') {
            $horarioModel->where('horarios.archivado', 1);
        }

        // Aplicar ordenación
        $horarioModel->orderBy($sort, $order);

        // Configuración de la paginación
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
            'perPage' => $perPage,
            'filtrosActivos' => $filtrosActivos,
            'sort' => $sort, // Enviar el campo de ordenación a la vista
            'order' => $order, // Enviar la dirección de ordenación a la vista
            'page' => $page, // Enviar la página actual a la vista
        ];
       

        return view('horarios/horario_list', $data); // Cargar la vista con los datos
    }

    // parte de la exportación de excel
    public function exportExcel() {
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
        if ($horarioArchivado === '0') {
            $horarioModel->where('horarios.archivado', 0);
        } elseif ($horarioArchivado === '1') {
            $horarioModel->where('horarios.archivado', 1);
        }

        $horarios = $horarioModel->findAll(); // Obtener todos los horarios
        $spreadsheet = new Spreadsheet(); // Crear una nueva hoja de cálculo
        $sheet = $spreadsheet->getActiveSheet(); // Obtener la hoja activa

        // Agregar encabezados de columna
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Nombre');
        $sheet->setCellValue('C1', 'Hora de inicio');
        $sheet->setCellValue('D1', 'Hora de finalización');
        $sheet->setCellValue('E1', 'Archivado');

        // Recorrer los horarios y agregarlos a la hoja de cálculo
        $row = 2;
        foreach ($horarios as $horario) {
            $sheet->setCellValue('A' . $row, $horario['id']);
            $sheet->setCellValue('B' . $row, $horario['nombre_horario']);
            $sheet->setCellValue('C' . $row, $horario['hora_inicio']);
            $sheet->setCellValue('D' . $row, $horario['hora_fin']);
            $sheet->setCellValue('E' . $row, $horario['archivado'] ? 'Sí' : 'No');
            $row++;
        }

        $writer = new Xlsx($spreadsheet); // Crear un escritor de Excel
        $fileName = 'horarios.xlsx'; // Nombre del archivo de Excel
        
        // Enviar el archivo al navegador para descargar
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $fileName . '"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit;
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
        return redirect()->to('/horarios')->with('error', 'Horario archivado correctamente');
    }

    public function restore($id) {
        $horarioModel = new HorarioModel();
        // Restaurar el horario archivado
        $horarioModel->update($id, ['archivado' => 0]);
        return redirect()->to('/horarios')->with('success', 'Horario restaurado correctamente');
    }
}