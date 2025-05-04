<?php
require_once '../models/Enrollment.php';
require_once '../models/Student.php';
require_once '../models/Course.php';

$action = $_GET['action'] ?? null;
$controller = new EnrollmentController();

switch ($action) {
    case 'update':
        $id = $_POST['id'] ?? null;
        $student_id = $_POST['student_id'] ?? null;
        $course_id = $_POST['course_id'] ?? null;
        if ($id && $student_id && $course_id) {
            $controller->update($id, $student_id, $course_id);
        } else {
            header('Location: ../index.php?view=enrollments&error=missing_data');
            exit;
        }
        break;
    default:
        header('Location: ../index.php?view=enrollments');
        exit;
}

class EnrollmentController
{
    private $enrollmentModel;
    private $studentModel;
    private $courseModel;

    // Fungsi konstruktor untuk menginisialisasi model Enrollment, Student, dan Course
    public function __construct()
    {
        $this->enrollmentModel = new Enrollment();
        $this->studentModel = new Student();
        $this->courseModel = new Course();
    }

    // Fungsi untuk menampilkan semua data pendaftaran
    public function index()
    {
        $enrollments = $this->enrollmentModel->getAll();
        require_once '../views/enrollments/index.php';
    }

    // Fungsi untuk menampilkan halaman tambah pendaftaran
    public function create()
    {
        $students = $this->studentModel->getAll();
        $courses = $this->courseModel->getAll();
        require_once '../views/enrollments/create.php';
    }

    // Fungsi untuk menyimpan data pendaftaran baru
    public function store($student_id, $course_id)
    {
        $this->enrollmentModel->create($student_id, $course_id);
        header('Location: ../views/enrollments/index.php');
        exit;
    }

    // Fungsi untuk menghapus data pendaftaran berdasarkan ID
    public function delete($id)
    {
        $this->enrollmentModel->delete($id);
        header('Location: ../views/enrollments/index.php');
        exit;
    }

    // Fungsi untuk menampilkan halaman edit pendaftaran
    public function edit($id)
    {
        $enrollment = $this->enrollmentModel->getById($id);
        $students = $this->studentModel->getAll();
        $courses = $this->courseModel->getAll();
        require_once '../views/enrollments/edit.php';
    }

    // Fungsi untuk memperbarui data pendaftaran berdasarkan ID
    public function update($id, $student_id, $course_id)
    {
        $this->enrollmentModel->update($id, $student_id, $course_id);
        header('Location: ../index.php?view=enrollments');
        exit;
    }
}
