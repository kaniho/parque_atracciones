<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($review) ? 'Editar Reseña' : 'Crear Reseña' ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center"><?= isset($review) ? 'Editar Reseña' : 'Crear Reseña' ?></h1>

        <!-- Mostrar errores de validación -->
        <?php if (isset($validation)): ?>
            <div class="alert alert-danger">
                <?= $validation->listErrors() ?>
            </div>
        <?php endif; ?>

        <!-- Formulario -->
        <form action="<?= isset($review) ? base_url('reviews/save/') . $review['id'] : base_url('reviews/save') ?>" method="post">
            <?= csrf_field(); ?>

            <div class="mb-3">
                <label for="id_atraccion" class="form-label">Atracción:</label>
                <select name="id_atraccion" id="id_atraccion" class="form-select" aria-label="Default select example" >
                    <option value="">Selecciona una atracción</option>
                    <?php foreach ($atracciones as $atraccion): ?>
                        <option value="<?= $atraccion['id'] ?>" <?= set_select('id_atraccion', $atraccion['id'], isset($review) && $review['id_atraccion'] == $atraccion['id']) ?>>
                            <?= $atraccion['nombre'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="id_usuario" class="form-label">Usuario:</label>
                <select name="id_usuario" id="id_usuario" class="form-select" aria-label="Default select example" >
                    <option value="">Selecciona un usuario</option>
                    <?php foreach ($users as $user): ?>
                        <option value="<?= $user['id'] ?>" <?= set_select('id_usuario', $user['id'], isset($review) && $review['id_usuario'] == $user['id']) ?>>
                            <?= $user['nombre_usuario'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="calificacion" class="form-label">Calificación:</label>
                <input type="text" name="calificacion" id="calificacion" class="form-control" value="<?= set_value('calificacion', $review['calificacion'] ?? '') ?>" required>
            </div>

            <div class="mb-3">
                <label for="comentario" class="form-label">Comentario:</label>
                <textarea name="comentario" id="comentario" class="form-control"><?= set_value('comentario', $review['comentario'] ?? '') ?></textarea>
            </div>

            <button type="submit" class="btn btn-success"><?= isset($review) ? 'Actualizar' : 'Guardar' ?></button>
            <a href="<?= base_url('reviews') ?>" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>