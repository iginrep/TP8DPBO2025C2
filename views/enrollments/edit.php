<?php
require_once '../../models/Enrollment.php';
require_once '../../models/Student.php';
require_once '../../models/Course.php';

$enrollmentModel = new Enrollment();
$studentModel = new Student();
$courseModel = new Course();

// Ambil data pendaftaran
$id = $_GET['id'] ?? null;
if (!$id) {
    header("Location: index.php");
    exit;
}
$enrollment = $enrollmentModel->getById($id);
if (!$enrollment) {
    header("Location: index.php");
    exit;
}

// Ambil data siswa dan kursus
$students = $studentModel->getAll();
$courses = $courseModel->getAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Enrollment</title>
    <link rel="stylesheet" href="../../public/bootstrap.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="../../index.php">Home</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../../views/students/index.php">Students</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../views/courses/index.php">Courses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="../../views/enrollments/index.php">Enrollments</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="mb-4">Edit Enrollment</h1>
        <!-- Form untuk mengedit pendaftaran -->
        <form method="post" action="../../controllers/EnrollmentController.php?action=update" class="bg-light p-4 rounded shadow-sm">
            <input type="hidden" name="id" value="<?= $enrollment['id'] ?>">
            <div class="mb-3">
                <label for="student_id" class="form-label">Student</label>
                <select class="form-control" id="student_id" name="student_id" required>
                    <?php foreach ($students as $student): ?>
                        <option value="<?= $student['id'] ?>" <?= $student['id'] == $enrollment['student_id'] ? 'selected' : '' ?>><?= $student['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="course_id" class="form-label">Course</label>
                <select class="form-control" id="course_id" name="course_id" required>
                    <?php foreach ($courses as $course): ?>
                        <option value="<?= $course['id'] ?>" <?= $course['id'] == $enrollment['course_id'] ? 'selected' : '' ?>><?= $course['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Save Changes</button>
            <a href="../../index.php?view=enrollments" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>

</html>