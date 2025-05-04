<?php
require_once '../models/Course.php';

class CourseController
{
    private $courseModel;

    // Fungsi konstruktor untuk menginisialisasi model Course
    public function __construct()
    {
        $this->courseModel = new Course();
    }

    // Fungsi untuk menampilkan semua data mata kuliah
    public function index()
    {
        $courses = $this->courseModel->getAll();
        require_once '../views/courses/index.php';
    }

    // Fungsi untuk menampilkan halaman tambah mata kuliah
    public function create()
    {
        require_once '../views/courses/create.php';
    }

    // Fungsi untuk menyimpan data mata kuliah baru
    public function store($data)
    {
        $this->courseModel->create($data);
        header('Location: ../views/courses/index.php');
        exit;
    }

    // Fungsi untuk menampilkan halaman edit mata kuliah
    public function edit($id)
    {
        $course = $this->courseModel->getById($id);
        require_once '../views/courses/edit.php';
    }

    // Fungsi untuk memperbarui data mata kuliah berdasarkan ID
    public function update($id, $data)
    {
        $this->courseModel->update($id, $data);
        header('Location: ../views/courses/index.php');
        exit;
    }

    // Fungsi untuk menghapus data mata kuliah berdasarkan ID
    public function delete($id)
    {
        $this->courseModel->delete($id);
        header('Location: ../views/courses/index.php');
        exit;
    }
}
