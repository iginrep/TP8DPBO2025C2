<?php
require_once '../../models/Course.php';

// Fungsi untuk menampilkan halaman konfirmasi hapus mata kuliah
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $courseModel = new Course();
    $courseModel->delete($id);
}
header('Location: ../../index.php?view=courses');
exit;
?>
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
                    <a class="nav-link active" href="../../views/courses/index.php">Courses</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../views/enrollments/index.php">Enrollments</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <h1 class="mb-4">Delete Course</h1>
    <p class="bg-light p-3 rounded shadow-sm">Are you sure you want to delete this course?</p>
    <form method="post">
        <input type="hidden" name="id" value="<?= $id; ?>">
        <button type="submit" class="btn btn-danger">Delete</button>
        <a href="index.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>