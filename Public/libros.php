<?php

require_once __DIR__ . '/../models/Book.php';

$bookModel = new Book();
$result = $bookModel->getAll();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de libros</title>
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

    <h1>Listado de libros</h1>

    <?php if (isset($_GET['error']) && $_GET['error'] === 'tiene_prestamos_activos'): ?>
        <div class="alert alert-error">
            No puedes eliminar un libro que tiene préstamos activos.
        </div>
    <?php endif; ?>

    <p class="mt-2">
        <a href="crear_libro.php" class="btn btn-primary">Crear nuevo libro</a>
    </p>

    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Autor</th>
            <th>Año</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['titulo']; ?></td>
                <td><?php echo $row['autor']; ?></td>
                <td><?php echo $row['anio_publicacion']; ?></td>
                <td><?php echo $row['estado']; ?></td>
                <td>
                    <a href="editar_libro.php?id=<?php echo $row['id']; ?>" class="action-link">Editar</a>
                    <a href="eliminar_libro.php?id=<?php echo $row['id']; ?>"
                       class="action-link action-link-danger"
                       onclick="return confirm('¿Seguro que deseas eliminar este libro?');">
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

