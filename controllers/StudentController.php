<?php
require_once '../models/Student.php';

class StudentController
{
    private $studentModel;

    // Fungsi konstruktor untuk menginisialisasi model Student
    public function __construct()
    {
        $this->studentModel = new Student();
    }

    // Fungsi untuk menampilkan semua data mahasiswa
    public function index()
    {
        $students = $this->studentModel->getAll();
        require_once '../views/students/index.php';
    }

    // Fungsi untuk menambahkan data mahasiswa baru
    public function create($data)
    {
        $this->studentModel->create($data);
        header('Location: ../views/students/index.php');
        exit;
    }

    // Fungsi untuk memperbarui data mahasiswa berdasarkan ID
    public function edit($id, $data)
    {
        $this->studentModel->update($id, $data);
        header('Location: ../views/students/index.php');
        exit;
    }

    // Fungsi untuk menghapus data mahasiswa berdasarkan ID
    public function delete($id)
    {
        $this->studentModel->delete($id);
        header('Location: ../views/students/index.php');
        exit;
    }
}
