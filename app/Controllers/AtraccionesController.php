<?php

namespace App\Controllers;

use App\Models\AtraccionesModel;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class AtraccionesController extends BaseController
{
    public function index()
    {
        $atraccionesModel = new AtraccionesModel();

        $nombre = $this->request->getVar("nombre"); // Obtener el término de búsqueda desde el formulario
        $descripcion = $this->request->getVar('descripcion');
        $altura_minima = $this->request->getVar('altura_minima');
        $capacidad_maxima = $this->request->getVar('capacidad_maxima');
        $estado = $this->request->getVar('estado');
        $atracionneArchivada = $this->request->getVar('atraccionArchivada'); // Obtener el filtro de atracción archivada
        $perPage = $this->request->getVar('perPage') ?? 3; // Obtener el número de elementos por página, por defecto 3

        // Parámetros de ordenación
        $sort = $this->request->getVar('sort') ?? 'id';
        $order = $this->request->getVar('order') ?? 'asc';

        // Contador de filtros activos
        $filtrosActivos = 0;
        if ($nombre) $filtrosActivos++;
        if ($descripcion) $filtrosActivos++;
        if ($altura_minima) $filtrosActivos++;
        if ($capacidad_maxima) $filtrosActivos++;
        if ($estado) $filtrosActivos++;
        if ($atracionneArchivada !== null) $filtrosActivos++;

        // Aplicar filtro si se introduce un nombre
        if ($nombre) {
            $atraccionesModel->like("nombre", $nombre);
        }
        if ($descripcion) {
            $atraccionesModel->like('descripcion', $descripcion);
        }
        if ($altura_minima) {
            $atraccionesModel->like('altura_minima', $altura_minima);
        }
        if ($capacidad_maxima) {
            $atraccionesModel->like('capacidad_maxima', $capacidad_maxima);
        }
        if ($estado) {
            $atraccionesModel->where('estado', $estado);
        }
        if ($atracionneArchivada === '0') {
            $atraccionesModel->where('archivado', 0);
        } elseif ($atracionneArchivada === '1') {
            $atraccionesModel->where('archivado', 1);
        }
        
        // Aplicar ordenación
        $atraccionesModel->orderBy($sort, $order);

        // Configuración de la paginación
        $atracciones = $atraccionesModel->paginate($perPage); // Obtener atracciones paginadas
        $pager = $atraccionesModel->pager; // Instancia del paginador
        $data = [
            'atracciones' => $atracciones,
            'pager' => $pager,
            'nombre' => $nombre, // Mantener el término de búsqueda en la vista
            'descripcion' => $descripcion,
            'altura_minima' => $altura_minima,
            'capacidad_maxima' => $capacidad_maxima,
            'estado' => $estado,
            'atraccionArchivada' => $atracionneArchivada, // Mantener el filtro de atracción archivada en la vista
            'perPage' => $perPage, // Mantener el número de elementos por página en la vista
            'filtrosActivos' => $filtrosActivos, // Enviar el contador de filtros activos a la vista    
            'sort' => $sort, // Enviar el campo de ordenación a la vista
            'order' => $order, // Enviar la dirección de ordenación a la vista
        ];
              
        return view('atracciones/atracciones_list', $data); // Cargar la vista con los datos
    }

    // parte de la exportación de excel
    public function exportExcel() {
        $atraccionesModel = new AtraccionesModel();

        $nombre = $this->request->getVar("nombre"); // Obtener el término de búsqueda desde el formulario
        $descripcion = $this->request->getVar('descripcion');
        $altura_minima = $this->request->getVar('altura_minima');
        $capacidad_maxima = $this->request->getVar('capacidad_maxima');
        $estado = $this->request->getVar('estado');
        $atracionneArchivada = $this->request->getVar('atraccionArchivada'); // Obtener el filtro de atracción archivada

        // Aplicar filtro si se introduce un nombre
        if ($nombre) {
            $atraccionesModel->like("nombre", $nombre);
        }
        if ($descripcion) {
            $atraccionesModel->like('descripcion', $descripcion);
        }
        if ($altura_minima) {
            $atraccionesModel->like('altura_minima', $altura_minima);
        }
        if ($capacidad_maxima) {
            $atraccionesModel->like('capacidad_maxima', $capacidad_maxima);
        }
        if ($estado) {
            $atraccionesModel->where('estado', $estado);
        }
        if ($atracionneArchivada === '0') {
            $atraccionesModel->where('archivado', 0);
        } elseif ($atracionneArchivada === '1') {
            $atraccionesModel->where('archivado', 1);
        }

        $atracciones = $atraccionesModel->findAll(); // Obtener todas las atracciones
        $spreadsheet = new Spreadsheet(); // Crear una instancia de la clase Spreadsheet
        $sheet = $spreadsheet->getActiveSheet(); // Obtener la hoja activa

        // Agrergar encabezados a la hoja de cálculo
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Nombre');
        $sheet->setCellValue('C1', 'Descripción');
        $sheet->setCellValue('D1', 'Altura mínima');
        $sheet->setCellValue('E1', 'Capacidad máxima');
        $sheet->setCellValue('F1', 'Estado');

        // Recorrer las atracciones y agregarlas a la hoja de cálculo
        $row = 2;
        foreach ($atracciones as $atraccion) {
            $sheet->setCellValue('A' . $row, $atraccion['id']);
            $sheet->setCellValue('B' . $row, $atraccion['nombre']);
            $sheet->setCellValue('C' . $row, $atraccion['descripcion']);
            $sheet->setCellValue('D' . $row, $atraccion['altura_minima']);
            $sheet->setCellValue('E' . $row, $atraccion['capacidad_maxima']);
            $sheet->setCellValue('F' . $row, $atraccion['estado']);
            $row++;
        }

        $writer = new Xlsx($spreadsheet); // Crear una instancia de la clase Xlsx
        $filename = 'atracciones.xlsx'; // Nombre del archivo

        // Enviar el archivo al navegador para descargar
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit;
    }

    public function saveAtraccion($id = null)
    {
        $atraccionesModel = new AtraccionesModel();
        helper(['form', 'url']);
        // Cargar datos de la atracción si es edición
        $data['atraccion'] = $id ? $atraccionesModel->find($id) : null;

        if ($this->request->getMethod() == 'POST') {

            // Reglas de validación
            $validation = \Config\Services::validation();
            $validation->setRules([
                'nombre' => 'required|min_length[3]|max_length[100]',
                'descripcion' => 'required|string',
                'altura_minima' => 'required|string',
                'capacidad_maxima' => 'required',
                'estado' => 'required|in_list[activo,inactivo]',
            ]);

            if (!$validation->withRequest($this->request)->run()) {
                // Mostrar errores de validación
                $data['validation'] = $validation;
            } else {
                // Preparar datos del formulario
                $atraccionData = [
                    'nombre' => $this->request->getPost('nombre'),
                    'descripcion' => $this->request->getPost('descripcion'),
                    'altura_minima' => $this->request->getPost('altura_minima'),
                    'capacidad_maxima' => $this->request->getPost('capacidad_maxima'),
                    'estado' => $this->request->getPost('estado'),
                ];

                if ($id) {
                    // Actualizar atracción existente
                    $atraccionesModel->update($id, $atraccionData);
                    $message = 'Atracción actualizada correctamente.';
                } else {
                    // Crear nueva atracción
                    $atraccionesModel->save($atraccionData);
                    $message = 'Atracción creada correctamente.';
                }

                // Redirigir al listado con un mensaje de éxito
                return redirect()->to('/atracciones')->with('success', $message);
            }
        }

        // Cargar la vista del formulario (crear/editar)
        return view('atracciones/atracciones_form', $data);
    }

    public function delete($id)
    {
        $atraccionesModel = new AtraccionesModel();
        // Marcar la atracción como archivada en lugar de eliminarla físicamente
        $atraccionesModel->update($id, ['archivado' => 1]);
        return redirect()->to('/atracciones')->with('error', 'Atracción archivada correctamente.');
    }

    public function restore($id) {
        $atraccionesModel = new AtraccionesModel();
        // Restaurar la atracción archivada
        $atraccionesModel->update($id, ['archivado' => 0]);
        return redirect()->to('/atracciones')->with('success', 'Atracción restaurada correctamente.');
    }
}