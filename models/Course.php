<?php

class Course
{
    private $conn;

    // Fungsi konstruktor untuk menginisialisasi koneksi database
    public function __construct()
    {
        $this->conn = new mysqli('localhost', 'root', '', 'tp_mvc');
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    // Fungsi untuk mendapatkan semua data mata kuliah
    public function getAll()
    {
        $result = $this->conn->query('SELECT * FROM courses');
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Fungsi untuk mendapatkan data mata kuliah berdasarkan ID
    public function getById($id)
    {
        $stmt = $this->conn->prepare('SELECT * FROM courses WHERE id = ?');
        $stmt->bind_param('i', $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    // Fungsi untuk menambahkan data mata kuliah baru
    public function create($data)
    {
        $stmt = $this->conn->prepare('INSERT INTO courses (name, description) VALUES (?, ?)');
        $stmt->bind_param('ss', $data['name'], $data['description']);
        return $stmt->execute();
    }

    // Fungsi untuk memperbarui data mata kuliah berdasarkan ID
    public function update($id, $data)
    {
        $stmt = $this->conn->prepare('UPDATE courses SET name = ?, description = ? WHERE id = ?');
        $stmt->bind_param('ssi', $data['name'], $data['description'], $id);
        return $stmt->execute();
    }

    // Fungsi untuk menghapus data mata kuliah berdasarkan ID
    public function delete($id)
    {
        $stmt = $this->conn->prepare('DELETE FROM courses WHERE id = ?');
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }

    // Fungsi destruktor untuk menutup koneksi database
    public function __destruct()
    {
        $this->conn->close();
    }
}
