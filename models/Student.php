<?php

class Student
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

    // Fungsi untuk mendapatkan semua data mahasiswa
    public function getAll()
    {
        $result = $this->conn->query('SELECT * FROM students');
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Fungsi untuk mendapatkan data mahasiswa berdasarkan ID
    public function getById($id)
    {
        $stmt = $this->conn->prepare('SELECT * FROM students WHERE id = ?');
        $stmt->bind_param('i', $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    // Fungsi untuk menambahkan data mahasiswa baru
    public function create($data)
    {
        $stmt = $this->conn->prepare('INSERT INTO students (name, nim, phone, join_date, email, address) VALUES (?, ?, ?, ?, ?, ?)');
        $stmt->bind_param('ssssss', $data['name'], $data['nim'], $data['phone'], $data['join_date'], $data['email'], $data['address']);
        return $stmt->execute();
    }

    // Fungsi untuk memperbarui data mahasiswa berdasarkan ID
    public function update($id, $data)
    {
        $stmt = $this->conn->prepare('UPDATE students SET name = ?, nim = ?, phone = ?, join_date = ?, email = ?, address = ? WHERE id = ?');
        $stmt->bind_param('ssssssi', $data['name'], $data['nim'], $data['phone'], $data['join_date'], $data['email'], $data['address'], $id);
        return $stmt->execute();
    }

    // Fungsi untuk menghapus data mahasiswa berdasarkan ID
    public function delete($id)
    {
        $stmt = $this->conn->prepare('DELETE FROM students WHERE id = ?');
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }

    // Fungsi destruktor untuk menutup koneksi database
    public function __destruct()
    {
        $this->conn->close();
    }
}
