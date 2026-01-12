<?php

require_once __DIR__ . '/../models/Loan.php';

$loanModel = new Loan();
$result = $loanModel->getAll();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Préstamos</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
    <nav>
        <a href="index.php">Inicio</a> |
        <a href="libros.php">Libros</a> |
        <a href="usuarios.php">Usuarios</a> |
        <a href="prestamos.php">Préstamos</a>
    </nav>

    <h1>Préstamos</h1>

    <p class="mt-2">
        <a href="crear_prestamo.php" class="btn btn-primary">Crear nuevo préstamo</a>
    </p>

    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Libro</th>
            <th>Usuario</th>
            <th>Fecha préstamo</th>
            <th>Fecha devolución</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['libro_titulo']; ?></td>
                <td><?php echo $row['usuario_nombre']; ?></td>
                <td><?php echo $row['fecha_prestamo']; ?></td>
                <td><?php echo $row['fecha_devolucion']; ?></td>
                <td><?php echo $row['estado']; ?></td>
                <td>
                    <?php if ($row['estado'] === 'activo'): ?>
                        <a href="devolver_prestamo.php?id=<?php echo $row['id']; ?>"
                           class="action-link">
                            Marcar como devuelto
                        </a>
                    <?php else: ?>
                        -
                    <?php endif; ?>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>
</body>
</html>
