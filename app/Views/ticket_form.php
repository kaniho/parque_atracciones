<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($review) ? 'Editar Ticket' : 'Crear Ticket' ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center"><?= isset($ticket) ? 'Editar Ticket' : 'Crear Ticket' ?></h1>

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
                        
        <form action="<?= isset($ticket) ? base_url('tickets/save/') . $ticket['id'] : base_url('tickets/save') ?>" method="post">
            <?= csrf_field() ?>

            <div class="mb-3">
                <label for="id_reserva" class="form-label">Estado de  Reserva</label>
                <select name="id_reserva" id="id_reserva" class="form-control" required>
                    <option value="">Selecciona una reserva</option>
                    <?php foreach ($reservas as $reserva): ?>
                        <option value="<?= $reserva['id'] ?>" <?= set_select('id_reserva', $reserva['id'], isset($ticket) && $ticket['id_reserva'] == $reserva['id']) ?>>
                            <?= $reserva['estado'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="codigo_ticket" class="form-label">Código del Ticket</label>
                <input type="text" name="codigo_ticket" class="form-control" value="<?= set_value('codigo_ticket', $ticket['codigo_ticket'] ?? '') ?>" required>
            </div>

            <button type="submit" class="btn btn-primary"><?= isset($ticket) ? 'Actualizar' : 'Crear' ?></button>
            <a href="<?= base_url('tickets') ?>" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>