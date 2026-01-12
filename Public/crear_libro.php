<?php

require_once __DIR__ . '/../models/Book.php';

$bookModel = new Book();
$mensaje = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = trim($_POST['titulo'] ?? '');
    $autor  = trim($_POST['autor'] ?? '');
    $anio   = $_POST['anio_publicacion'] ?? null;

    if ($titulo === '' || $autor === '') {
        $mensaje = "Título y autor son obligatorios";
    } elseif ($bookModel->create($titulo, $autor, $anio)) {
        $mensaje = "Libro creado correctamente";
    } else {
        $mensaje = "Error al crear el libro";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear libro</title>
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

    <h1>Crear libro</h1>

    <?php if ($mensaje): ?>
        <div class="alert <?php echo strpos($mensaje, 'Error') === false ? 'alert-success' : 'alert-error'; ?>">
            <?php echo $mensaje; ?>
        </div>
    <?php endif; ?>

    <form method="POST" class="mt-2">
        <label>Título:</label>
        <input type="text" name="titulo" required>

        <label>Autor:</label>
        <input type="text" name="autor" required>

        <label>Año publicación:</label>
        <input type="number" name="anio_publicacion">

        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="libros.php" class="btn btn-secondary">Volver al listado</a>
        <a href="index.php" class="btn btn-secondary">Inicio</a>
    </form>
</div>
</body>
</html>
