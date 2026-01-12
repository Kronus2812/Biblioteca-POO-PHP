<?php

require_once __DIR__ . '/../config/Database.php';

class User
{
    private $conn;
    private $table = "usuarios";

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM " . $this->table . " ORDER BY created_at DESC";
        return $this->conn->query($sql);
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

    public function create($nombre, $email, $telefono)
    {
        $stmt = $this->conn->prepare(
            "INSERT INTO " . $this->table . " (nombre, email, telefono)
             VALUES (?, ?, ?)"
        );
        $stmt->bind_param("sss", $nombre, $email, $telefono);

        return $stmt->execute();
    }

    public function update($id, $nombre, $email, $telefono)
    {
        $stmt = $this->conn->prepare(
            "UPDATE " . $this->table . "
             SET nombre = ?, email = ?, telefono = ?
             WHERE id = ?"
        );
        $stmt->bind_param("sssi", $nombre, $email, $telefono, $id);

        return $stmt->execute();
    }

    public function delete($id)
    {
        $stmt = $this->conn->prepare(
            "DELETE FROM " . $this->table . " WHERE id = ?"
        );
        $stmt->bind_param("i", $id);

        return $stmt->execute();
    }
}
