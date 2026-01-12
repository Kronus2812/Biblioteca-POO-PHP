<?php

require_once __DIR__ . '/../config/Database.php';

class Loan
{
    private $conn;
    private $table = "prestamos";

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll()
    {
        $sql = "SELECT p.*, 
                       l.titulo AS libro_titulo,
                       u.nombre AS usuario_nombre
                FROM " . $this->table . " p
                JOIN libros l ON p.libro_id = l.id
                JOIN usuarios u ON p.usuario_id = u.id
                ORDER BY p.fecha_prestamo DESC";

        return $this->conn->query($sql);
    }

    public function create($libro_id, $usuario_id)
    {
        $stmt = $this->conn->prepare(
            "INSERT INTO " . $this->table . " (libro_id, usuario_id, estado)
             VALUES (?, ?, 'activo')"
        );

        $stmt->bind_param("ii", $libro_id, $usuario_id);

        return $stmt->execute();
    }

    public function returnLoan($id)
    {
        $stmt = $this->conn->prepare(
            "UPDATE " . $this->table . "
             SET estado = 'devuelto', fecha_devolucion = CURRENT_DATE
             WHERE id = ?"
        );

        $stmt->bind_param("i", $id);

        return $stmt->execute();
    }

    public function getById($id)
    {
        $stmt = $this->conn->prepare(
            "SELECT * FROM " . $this->table . " WHERE id = ? LIMIT 1"
        );

        $stmt->bind_param("i", $id);
        $stmt->execute();

        return $stmt->get_result()->fetch_assoc();
    }
}
