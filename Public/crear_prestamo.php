<?php

require_once __DIR__ . '/../models/Loan.php';
require_once __DIR__ . '/../models/Book.php';
require_once __DIR__ . '/../models/User.php';

$loanModel = new Loan();
$bookModel = new Book();
$userModel = new User();
$mensaje = "";

$librosResult = $bookModel->getAll();
$librosDisponibles = [];
while ($row = $librosResult->fetch_assoc()) {
    if ($row['estado'] === 'disponible') {
        $librosDisponibles[] = $row;
    }
}

$usuariosResult = $userModel->getAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $libro_id   = $_POST['libro_id'] ?? null;
    $usuario_id = $_POST['usuario_id'] ?? null;

    if ($libro_id && $usuario_id) {
        $libro = $bookModel->getById($libro_id);
        if ($libro['estado'] !== 'disponible') {
            $mensaje = "Este libro no está disponible para préstamo";
        } elseif ($loanModel->create($libro_id, $usuario_id)) {
            $bookModel->markAsPrestado($libro_id);
            $mensaje = "Préstamo creado correctamente";
        } else {
            $mensaje = "Error al crear el préstamo";
        }
    } else {
        $mensaje = "Debes seleccionar libro y usuario";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear préstamo</title>
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

    <h1>Crear préstamo</h1>

    <?php if ($mensaje): ?>
        <div class="alert <?php echo strpos($mensaje, 'Error') === false ? 'alert-success' : 'alert-error'; ?>">
            <?php echo $mensaje; ?>
        </div>
    <?php endif; ?>

    <form method="POST" class="mt-2">
        <label>Libro:</label>
        <select name="libro_id" required>
            <option value="">-- Selecciona un libro disponible --</option>
            <?php foreach ($librosDisponibles as $libro): ?>
                <option value="<?php echo $libro['id']; ?>">
                    <?php echo $libro['titulo'] . " (" . $libro['autor'] . ")"; ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label>Usuario:</label>
        <select name="usuario_id" required>
            <option value="">-- Selecciona un usuario --</option>
            <?php while ($u = $usuariosResult->fetch_assoc()): ?>
                <option value="<?php echo $u['id']; ?>">
                    <?php echo $u['nombre']; ?>
                </option>
            <?php endwhile; ?>
        </select>

        <button type="submit" class="btn btn-primary">Crear préstamo</button>
        <a href="prestamos.php" class="btn btn-secondary">Volver al listado</a>
        <a href="index.php" class="btn btn-secondary">Inicio</a>
    </form>
</div>
</body>
</html>

