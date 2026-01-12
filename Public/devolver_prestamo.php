<?php

require_once __DIR__ . '/../models/Loan.php';
require_once __DIR__ . '/../models/Book.php';

$loanModel = new Loan();
$bookModel = new Book();

$id = $_GET['id'] ?? null;

if (!$id) {
    die("ID de préstamo no proporcionado");
}

$prestamo = $loanModel->getById($id);

if (!$prestamo) {
    die("Préstamo no encontrado");
}

$loanModel->returnLoan($id);

$bookModel->markAsDisponible($prestamo['libro_id']);

header("Location: prestamos.php");
exit;
