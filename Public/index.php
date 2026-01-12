<?php
require_once __DIR__ . '/../models/Book.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../models/Loan.php';

$bookModel   = new Book();
$userModel   = new User();
$loanModel   = new Loan();

$totalLibros    = $bookModel->getAll()->num_rows;
$totalUsuarios  = $userModel->getAll()->num_rows;
$totalPrestamos = $loanModel->getAll()->num_rows;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sistema Biblioteca POO PHP</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 16px;
            margin-top: 16px;
        }
        .card-dashboard {
            background: #ffffff;
            border-radius: 8px;
            padding: 16px 18px;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.06);
        }
        .card-dashboard h2 {
            font-size: 18px;
            margin-bottom: 6px;
        }
        .card-dashboard p {
            margin-bottom: 8px;
            font-size: 14px;
            color: #4b5563;
        }
    </style>
</head>
<body>
<div class="container">
    <nav>
        <a href="index.php">Inicio</a> |
        <a href="libros.php">Libros</a> |
        <a href="usuarios.php">Usuarios</a> |
        <a href="prestamos.php">Préstamos</a>
    </nav>

    <h1>Sistema Biblioteca POO PHP</h1>

    <div class="cards">
        <div class="card-dashboard">
            <h2>Libros</h2>
            <p>Total: <?php echo $totalLibros; ?></p>
            <a href="libros.php" class="btn btn-primary">Gestionar libros</a>
        </div>

        <div class="card-dashboard">
            <h2>Usuarios</h2>
            <p>Total: <?php echo $totalUsuarios; ?></p>
            <a href="usuarios.php" class="btn btn-primary">Gestionar usuarios</a>
        </div>

        <div class="card-dashboard">
            <h2>Préstamos</h2>
            <p>Total: <?php echo $totalPrestamos; ?></p>
            <a href="prestamos.php" class="btn btn-primary">Ver préstamos</a>
        </div>
    </div>
</div>
</body>
</html>
