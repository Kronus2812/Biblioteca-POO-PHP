<?php

require_once __DIR__ . '/../config/Database.php';

class Book
{
    private $conn;
    private $table = "libros";

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM " . $this->table . " ORDER BY created_at DESC";
        $result = $this->conn->query($sql);

        return $result;
    }

    public function create($titulo, $autor, $anio_publicacion)
    {
        $stmt = $this->conn->prepare(
            "INSERT INTO " . $this->table . " (titulo, autor, anio_publicacion) VALUES (?, ?, ?)"
        );

        $stmt->bind_param("ssi", $titulo, $autor, $anio_publicacion);

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

public function update($id, $titulo, $autor, $anio_publicacion)
{
    $stmt = $this->conn->prepare(
        "UPDATE " . $this->table . "
        SET titulo = ?, autor = ?, anio_publicacion = ?
        WHERE id = ?"
    );

    $stmt->bind_param("ssii", $titulo, $autor, $anio_publicacion, $id);

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
    public function markAsPrestado($id)
    {
        $stmt = $this->conn->prepare(
            "UPDATE " . $this->table . " SET estado = 'prestado' WHERE id = ?"
        );

        $stmt->bind_param("i", $id);

        return $stmt->execute();
    }

    public function markAsDisponible($id)
    {
        $stmt = $this->conn->prepare(
            "UPDATE " . $this->table . " SET estado = 'disponible' WHERE id = ?"
        );

        $stmt->bind_param("i", $id);

        return $stmt->execute();
    }

}
