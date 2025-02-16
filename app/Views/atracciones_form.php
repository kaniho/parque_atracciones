<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($atraccion) ? 'Editar Atracción' : 'Crear Atracción' ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center"><?= isset($atraccion) ? 'Editar Atracción' : 'Crear Atracción' ?></h1>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <?php if (isset($validation)): ?>
            <div class="alert alert-danger">
                <?= $validation->listErrors() ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('atracciones/save' . (isset($atraccion['id']) ? '/' . $atraccion['id'] : '')) ?>" method="post">
            <?= csrf_field() ?>

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control" value="<?= isset($atraccion['nombre']) ? esc($atraccion['nombre']) : '' ?>" required>
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea name="descripcion" class="form-control" required><?= isset($atraccion['descripcion']) ? esc($atraccion['descripcion']) : '' ?></textarea>
            </div>

            <div class="mb-3">
                <label for="altura_minima" class="form-label">Altura Mínima</label>
                <input type="number" name="altura_minima" class="form-control" value="<?= isset($atraccion['altura_minima']) ? esc($atraccion['altura_minima']) : '' ?>" required>
            </div>

            <div class="mb-3">
                <label for="capacidad_maxima" class="form-label">Capacidad Máxima</label>
                <input type="number" name="capacidad_maxima" class="form-control" value="<?= isset($atraccion['capacidad_maxima']) ? esc($atraccion['capacidad_maxima']) : '' ?>" required>
            </div>

            <div class="mb-3">
                <label for="estado" class="form-label">Estado</label>
                <select name="estado" class="form-control" required>
                    <option value="activo" <?= isset($atraccion['estado']) && $atraccion['estado'] == 'activo' ? 'selected' : '' ?>>Activo</option>
                    <option value="inactivo" <?= isset($atraccion['estado']) && $atraccion['estado'] == 'inactivo' ? 'selected' : '' ?>>Inactivo</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary"><?= isset($atraccion) ? 'Actualizar' : 'Crear' ?></button>
            <a href="<?= base_url('atracciones') ?>" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>