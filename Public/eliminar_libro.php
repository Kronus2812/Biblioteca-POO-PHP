<?php

require_once __DIR__ . '/../models/Book.php';
require_once __DIR__ . '/../models/Loan.php';

$bookModel = new Book();
$loanModel = new Loan();

$id = $_GET['id'] ?? null;

if (!$id) {
    die("ID de libro no proporcionado");
}

$prestamosActivos = $loanModel->getAll(); 

$tienePrestamoActivo = false;

while ($p = $prestamosActivos->fetch_assoc()) {
    if ($p['libro_id'] == $id && $p['estado'] === 'activo') {
        $tienePrestamoActivo = true;
        break;
    }
}

if ($tienePrestamoActivo) {
    header("Location: libros.php?error=tiene_prestamos_activos");
    exit;
}

$bookModel->delete($id);

header("Location: libros.php");
exit;
