<?php

require_once __DIR__ . '/../models/Book.php';

$bookModel = new Book();
$mensaje = "";

$id = $_GET['id'] ?? null;

if (!$id) {
    die("ID de libro no proporcionado");
}

$libro = $bookModel->getById($id);

if (!$libro) {
    die("Libro no encontrado");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'] ?? '';
    $autor = $_POST['autor'] ?? '';
    $anio  = $_POST['anio_publicacion'] ?? null;

    if ($bookModel->update($id, $titulo, $autor, $anio)) {
        $mensaje = "Libro actualizado correctamente";
        $libro = $bookModel->getById($id); 
    } else {
        $mensaje = "Error al actualizar el libro";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar libro</title>
</head>
<body>
    <h1>Editar libro</h1>

    <?php if ($mensaje): ?>
        <p><?php echo $mensaje; ?></p>
    <?php endif; ?>

    <form method="POST">
        <label>Título:</label><br>
        <input type="text" name="titulo"
               value="<?php echo htmlspecialchars($libro['titulo']); ?>" required><br><br>

        <label>Autor:</label><br>
        <input type="text" name="autor"
               value="<?php echo htmlspecialchars($libro['autor']); ?>" required><br><br>

        <label>Año publicación:</label><br>
        <input type="number" name="anio_publicacion"
               value="<?php echo htmlspecialchars($libro['anio_publicacion']); ?>"><br><br>

        <button type="submit">Guardar cambios</button>
    </form>

    <p><a href="libros.php">Volver al listado</a></p>
</body>
</html>
