<?php

require_once __DIR__ . '/../models/User.php';

$userModel = new User();
$result = $userModel->getAll();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Usuarios</title>
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

    <h1>Listado de usuarios</h1>

    <p class="mt-2">
        <a href="crear_usuario.php" class="btn btn-primary">Crear usuario</a>
    </p>

    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['nombre']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['telefono']; ?></td>
                <td>
                    <a href="editar_usuario.php?id=<?php echo $row['id']; ?>" class="action-link">
                        Editar
                    </a>
                    <a href="eliminar_usuario.php?id=<?php echo $row['id']; ?>"
                       class="action-link action-link-danger"
                       onclick="return confirm('¿Eliminar usuario?');">
                        Eliminar
                    </a>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>
</body>
</html>
