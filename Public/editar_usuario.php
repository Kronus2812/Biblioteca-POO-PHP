<?php

require_once __DIR__ . '/../models/User.php';

$userModel = new User();
$mensaje = "";

$id = $_GET['id'] ?? null;

if (!$id) {
    die("ID de usuario no proporcionado");
}

$user = $userModel->getById($id);

if (!$user) {
    die("Usuario no encontrado");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre   = $_POST['nombre'] ?? '';
    $email    = $_POST['email'] ?? '';
    $telefono = $_POST['telefono'] ?? '';

    if ($userModel->update($id, $nombre, $email, $telefono)) {
        $mensaje = "Usuario actualizado correctamente";
        $user = $userModel->getById($id); 
    } else {
        $mensaje = "Error al actualizar el usuario";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar usuario</title>
</head>
<body>
    <h1>Editar usuario</h1>

    <?php if ($mensaje): ?>
        <p><?php echo $mensaje; ?></p>
    <?php endif; ?>

    <form method="POST">
        <label>Nombre:</label><br>
        <input type="text" name="nombre"
               value="<?php echo htmlspecialchars($user['nombre']); ?>" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email"
               value="<?php echo htmlspecialchars($user['email']); ?>" required><br><br>

        <label>Teléfono:</label><br>
        <input type="text" name="telefono"
               value="<?php echo htmlspecialchars($user['telefono']); ?>"><br><br>

        <button type="submit">Guardar cambios</button>
    </form>

    <p><a href="usuarios.php">Volver al listado</a></p>
</body>
</html>
