<?php

class Enrollment
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

    // Fungsi untuk mendapatkan semua data pendaftaran
    public function getAll()
    {
        $result = $this->conn->query('SELECT enrollments.id, students.name AS student_name, courses.name AS course_name FROM enrollments 
                                      JOIN students ON enrollments.student_id = students.id 
                                      JOIN courses ON enrollments.course_id = courses.id');
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Fungsi untuk menambahkan data pendaftaran baru
    public function create($student_id, $course_id)
    {
        $stmt = $this->conn->prepare('INSERT INTO enrollments (student_id, course_id) VALUES (?, ?)');
        $stmt->bind_param('ii', $student_id, $course_id);
        return $stmt->execute();
    }

    // Fungsi untuk menghapus data pendaftaran berdasarkan ID
    public function delete($id)
    {
        $stmt = $this->conn->prepare('DELETE FROM enrollments WHERE id = ?');
        $stmt->bind_param('i', $id);

        // Debugging: Print the ID and check if the query executes
        echo "Attempting to delete enrollment with ID: $id<br>";

        if ($stmt->execute()) {
            echo "Query executed successfully.<br>";
            return true;
        } else {
            echo "Error: " . $this->conn->error . "<br>";
            return false;
        }
    }

    // Fungsi untuk mendapatkan data pendaftaran berdasarkan ID
    public function getById($id)
    {
        $stmt = $this->conn->prepare('SELECT enrollments.id, students.name AS student_name, courses.name AS course_name, enrollments.student_id, enrollments.course_id FROM enrollments 
                                      JOIN students ON enrollments.student_id = students.id 
                                      JOIN courses ON enrollments.course_id = courses.id 
                                      WHERE enrollments.id = ?');
        $stmt->bind_param('i', $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    // Fungsi untuk memperbarui data pendaftaran berdasarkan ID
    public function update($id, $student_id, $course_id)
    {
        $stmt = $this->conn->prepare('UPDATE enrollments SET student_id = ?, course_id = ? WHERE id = ?');
        $stmt->bind_param('iii', $student_id, $course_id, $id);
        return $stmt->execute();
    }

    // Fungsi destruktor untuk menutup koneksi database
    public function __destruct()
    {
        $this->conn->close();
    }
}
