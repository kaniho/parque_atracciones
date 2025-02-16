<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($reserva) ? 'Editar Reserva' : 'Crear Reserva' ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center"><?= isset($reserva) ? 'Editar Reserva' : 'Crear Reserva' ?></h1>

        <!-- Mostrar errores de validación -->
        <?php if (isset($validation)): ?>
            <div class="alert alert-danger">
                <?= $validation->listErrors() ?>
            </div>
        <?php endif; ?>

        <!-- Formulario -->
        <form action="<?= isset($reserva) ? base_url('reservas/save/') . $reserva['id'] : base_url('reservas/save') ?>" method="post">
            <?= csrf_field(); ?>

            <div class="mb-3">
                <label for="id_atraccion" class="form-label">Atracción:</label>
                <select name="id_atraccion" id="id_atraccion" class="form-select" aria-label="Default select example" required>
                    <option value="">Selecciona una atracción</option>
                    <?php foreach ($atracciones as $atraccion): ?>
                        <option value="<?= $atraccion['id'] ?>" <?= set_select('id_atraccion', $atraccion['id'], isset($reserva) && $reserva['id_atraccion'] == $atraccion['id']) ?>>
                            <?= $atraccion['nombre'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="id_usuario" class="form-label">Usuario:</label>
                <select name="id_usuario" id="id_usuario" class="form-select" aria-label="Default select example" required>
                    <option value="">Selecciona un usuario</option>
                    <?php foreach ($users as $user): ?>
                        <option value="<?= $user['id'] ?>" <?= set_select('id_usuario', $user['id'], isset($reserva) && $reserva['id_usuario'] == $user['id']) ?>>
                            <?= $user['nombre_usuario'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
                

            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha:</label>
                <input type="text" name="fecha" id="fecha" class="form-control" value="<?= set_value('fecha', $reserva['fecha'] ?? '') ?>" required>
            </div>

            <div class="mb-3">
                <label for="id_horario" class="form-label">Horario:</label>
                <select name="id_horario" id="id_horario" class="form-select" aria-label="Default select example">
                    <?php foreach ($horarios as $horario): ?>
                    <option value="<?= $horario['id'] ?>" <?= isset($reserva['id_horario']) && $reserva['id_horario'] == $horario['id'] ? 'selected' : '' ?>><?= $horario['nombre_horario'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="cantidad_personas" class="form-label">Cantidad de Personas:</label>
                <input name="cantidad_personas" id="cantidad_personas" class="form-control" value="<?= set_value('cantidad_personas', $reserva['cantidad_personas'] ?? '') ?>" required>
            </div>

            <div class="mb-3">
                <label for="estado" class="form-label">Estado:</label>
                <select name="estado" id="estado" class="form-select" aria-label="Default select example">
                    <option value="pendiente" <?= isset($reserva['estado']) && $reserva['estado'] == 'pendiente' ? 'selected' : '' ?>>Pendiente</option>
                    <option value="confirmada" <?= isset($reserva['estado']) && $reserva['estado'] == 'confirmada' ? 'selected' : '' ?>>Confirmada</option>
                    <option value="cancelada" <?= isset($reserva['estado']) && $reserva['estado'] == 'cancelada' ? 'selected' : '' ?>>Cancelada</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success"><?= isset($review) ? 'Actualizar' : 'Guardar' ?></button>
            <a href="<?= base_url('reservas') ?>" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>