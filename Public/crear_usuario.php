<?php

require_once __DIR__ . '/../models/User.php';

$userModel = new User();
$mensaje = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre   = trim($_POST['nombre'] ?? '');
    $email    = trim($_POST['email'] ?? '');
    $telefono = trim($_POST['telefono'] ?? '');

    if ($nombre === '' || $email === '') {
        $mensaje = "Nombre y email son obligatorios";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $mensaje = "El email no tiene un formato válido";
    } elseif ($userModel->create($nombre, $email, $telefono)) {
        $mensaje = "Usuario creado correctamente";
    } else {
        $mensaje = "Error al crear el usuario";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear usuario</title>
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

    <h1>Crear usuario</h1>

    <?php if ($mensaje): ?>
        <div class="alert <?php echo strpos($mensaje, 'Error') === false ? 'alert-success' : 'alert-error'; ?>">
            <?php echo $mensaje; ?>
        </div>
    <?php endif; ?>

    <form method="POST" class="mt-2">
        <label>Nombre:</label>
        <input type="text" name="nombre" required>

        <label>Email:</label>
        <input type="email" name="email" required>

        <label>Teléfono:</label>
        <input type="text" name="telefono">

        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="usuarios.php" class="btn btn-secondary">Volver al listado</a>
        <a href="index.php" class="btn btn-secondary">Inicio</a>
    </form>
</div>
</body>
</html>
