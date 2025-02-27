<?php

namespace App\Controllers;

use App\Models\ReviewModel;
use App\Models\AtraccionesModel;
use App\Models\UserModel;

class ReviewController extends BaseController {

    public function index() {
        $reviewModel = new ReviewModel();
        $atraccionesModel = new AtraccionesModel();
        $usuariosModel = new UserModel();

        // Obtener los parámetros de búsqueda
        $atraccion = $this->request->getVar('atraccion'); // Obtener el término de búsqueda desde el formulario
        $usuario = $this->request->getVar('usuario'); // Obtener el filtro de usuario
        $calificacion = $this->request->getVar('calificacion'); // Obtener el filtro de calificación
        $comentario = $this->request->getVar('comentario'); // Obtener el filtro de comentario
        $fechaCreacion = $this->request->getVar('fechaCreacion'); // Obtener el filtro de fecha de creación
        $reviewArchivada = $this->request->getVar('reviewArchivada'); // Obtener el filtro de reseña archivada

        // Construir la consulta con uniones
        $reviewModel->select('review.*, atracciones.nombre as nombre_atraccion, users.nombre_usuario as nombre_usuario')
            ->join('atracciones', 'atracciones.id = review.id_atraccion')
            ->join('users', 'users.id = review.id_usuario');

        // Aplicar filtros si se introducen
        if ($atraccion) {
            $reviewModel->like('atracciones.nombre', $atraccion);
        }
        if ($usuario) {
            $reviewModel->like('users.nombre_usuario', $usuario);
        }
        if ($calificacion) {
            $reviewModel->like('calificacion', $calificacion);
        }
        if ($comentario) {
            $reviewModel->like('comentario', $comentario);
        }
        if ($fechaCreacion) {
            $reviewModel->like('fecha_creacion', $fechaCreacion);
        }
        if ($reviewArchivada) {
            $reviewModel->where('review.archivado', 1);
        }

        // Configuración de la paginación
        $perPage = 3; // Número de elementos por página
        $reviews = $reviewModel->paginate($perPage); // Obtener reseñas paginadas
        $pager = $reviewModel->pager; // Instancia del paginador
        $data = [
            'reviews' => $reviews,
            'pager' => $pager,
            'atraccion' => $atraccion,
            'usuario' => $usuario,
            'calificacion' => $calificacion,
            'comentario' => $comentario,
            'fechaCreacion' => $fechaCreacion,
            'reviewArchivada' => $reviewArchivada,
        ];

        // Obtener los nombres de las atracciones y usuarios
        foreach ($reviews as &$review) {
            $review['nombre_atraccion'] = $atraccionesModel->find($review['id_atraccion'])['nombre'];
            $review['nombre_usuario'] = $usuariosModel->find($review['id_usuario'])['nombre_usuario'];
        }

        

        return view('reviews/review_list', $data); // Cargar la vista con los datos
    }

    public function saveReview($id = null) {
        $reviewModel= new ReviewModel();
        $atraccionesModel = new AtraccionesModel();
        $usuariosModel = new UserModel();
        helper(['form', 'url']);

        // Obtener todas las atracciones
        $data['atracciones'] = $atraccionesModel->findAll();
        // Obtener todos los usuarios
        $data['users'] = $usuariosModel->findAll();

        // Cargar datos de la reseña si es edición
        $data['review'] = $id ? $reviewModel->find($id) : null;

        if ($this->request->getMethod() == 'POST') {
             // Reglas de validación
             $validation = \Config\Services::validation();
             $validation->setRules([
                'id_atraccion' => 'required|integer',
                'id_usuario' => 'required|string',
                'calificacion' => 'required|integer',
                'comentario' => 'required',
            ]);

            if (!$validation->withRequest($this->request)->run()) {
                // Mostrar errores de validación
                $data['validation'] = $validation;
            } else {
                // Buscar el ID del usuario basado en el nombre ingresado
                $usuarioNombre = $this->request->getPost('usuario_nombre');
                $usuario = $usuariosModel->where('nombre_usuario', $usuarioNombre)->first();

                // Preparar datos del formulario 
                $fechaCreacion = (new \DateTime())->format('Y-m-d H:i:s'); // Formato compatible con la base de datos
                $revieData = [
                    'id_atraccion' => $this->request->getPost('id_atraccion'),
                    'id_usuario' => $this->request->getPost('id_usuario'), //$usuario['id'],
                    'calificacion' => $this->request->getPost('calificacion'),
                    'comentario' => $this->request->getPost('comentario'),
                    'fecha_creacion' => $fechaCreacion, // Establecer la fecha de creación automáticamente
                ];

                if ($id) {
                    // Actualizar atracción existente
                    $reviewModel->update($id, $revieData);
                    $message = 'Reseña actualizada correctamente';
                } else {
                    // Crear nueva atracción
                    $reviewModel->save($revieData);
                    $message = 'Reseña creada correctamente';
                }

                // Obtener nombres de atracción y usuario
                //$data['atraccion_nombre'] = $atraccionesModel->find($revieData['id_atraccion'])['nombre'];
               // $data['usuario_nombre'] = $usuariosModel->find($revieData['id_usuario'])['nombre'];

                // Redirigir al listado con un mensaje de éxito
                return redirect()->to('/reviews')->with('success',$message);
            }
        }

        // Cargar la vista del formulario (crear/editar)
        return view('reviews/review_form', $data);
    }


    public function delete($id) {
        $revieModel = new ReviewModel();
        // Marcamos la reseña como archivada en lugar de eliminarla físicamente.
        $revieModel->update($id, ['archivado' => 1]);
        return redirect()->to('/reviews')->with('success', 'Reseña eliminada correctamente.');
    }

    public function restore($id) {
        $revieModel = new ReviewModel();
        // Restaurar la reseña archivada
        $revieModel->update($id, ['archivado' => 0]);
        return redirect()->to('/reviews')->with('success', 'Reseña restaurada correctamente.');
    }
}