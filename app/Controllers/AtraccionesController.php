<?php

namespace App\Controllers;

use App\Models\AtraccionesModel;

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
        if ($atracionneArchivada) {
            $atraccionesModel->where('archivado', 1);
        }
        

        // Configuración de la paginación
        $perPage = 3; // Número de elementos por página
        $data["atracciones"] = $atraccionesModel->paginate($perPage); // Obtener atracciones paginadas
        $data["pager"] = $atraccionesModel->pager; // Instancia del paginador
        $data["nombre"] = $nombre; // Mantener el término de búsqueda en la vista
        $data["descripcion"] = $descripcion;
        $data["altura_minima"] = $altura_minima;
        $data["capacidad_maxima"] = $capacidad_maxima;
        $data["estado"] = $estado;
        $data["atraccionArchivada"] = $atracionneArchivada; // Mantener el filtro de atracción archivada en la vista

        // Otras configuraciones de paginación
        // $atraccionesModel->orderBy('id', 'DESC'); // Ordenar por ID de forma descendente

        
        return view('atracciones_list', $data); // Cargar la vista con los datos
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
        return view('atracciones_form', $data);
    }

    public function delete($id)
    {
        $atraccionesModel = new AtraccionesModel();
        // Marcar la atracción como archivada en lugar de eliminarla físicamente
        $atraccionesModel->update($id, ['archivado' => 1]);
        return redirect()->to('/atracciones')->with('success', 'Atracción archivada correctamente.');
    }

    public function restore($id) {
        $atraccionesModel = new AtraccionesModel();
        // Restaurar la atracción archivada
        $atraccionesModel->update($id, ['archivado' => 0]);
        return redirect()->to('/atracciones')->with('success', 'Atracción restaurada correctamente.');
    }
}