<?php

require_once __DIR__ . '/../config/Database.php';

$db = new Database();
$conn = $db->getConnection();

echo "Conexión OK a biblioteca_db";
