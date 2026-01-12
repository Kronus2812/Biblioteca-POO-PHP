<?php

require_once __DIR__ . '/../models/User.php';

$userModel = new User();

$id = $_GET['id'] ?? null;

if (!$id) {
    die("ID de usuario no proporcionado");
}

$userModel->delete($id);

header("Location: usuarios.php");
exit;
