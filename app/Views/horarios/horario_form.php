<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($horario) ? 'Editar Horario' : 'Crear Horario' ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">

        <h1 class="text-center"><?= isset($horario) ? 'Editar Horario' : 'Crear Horario' ?></h1>

        <!-- Mostrar errores de validación -->
        <?php if (isset($validation)): ?>
            <div class="alert alert-danger">
                <?= $validation->listErrors() ?>
            </div>
        <?php endif; ?>

        <!-- Formulario -->
        <form action="<?= isset($horario) ? base_url('horarios/save/') . $horario['id'] : base_url('horarios/save') ?>" method="post">
            <?= csrf_field(); ?>
            <div class="mb-3">
                <label for="nombre_horario" class="form-label">Nombre</label>
                <input type="text" name="nombre_horario" id="nombre_horario" class="form-control" 
                    value="<?= isset($user) ? esc($user['nombre_horario']) : '' ?>" required>
            </div>
            <div class="mb-3">
                <label for="hora_inicio" class="form-label">Horario de inicio</label>
                <input type="hora_inicio" name="hora_inicio" id="hora_inicio" class="form-control" 
                    value="<?= isset($user) ? esc($user['hora_inicio']) : '' ?>" required>
            </div>
            <div class="mb-3">
                <label for="hora_fin" class="form-label">Horario de finalización</label>
                <input type="hora_fin" name="hora_fin" id="hora_fin" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success"><?= isset($user) ? 'Actualizar' : 'Guardar' ?></button>
            <a href="<?= base_url('horarios') ?>" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
