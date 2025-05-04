<?php
require_once '../../models/Enrollment.php';

// Memproses permintaan penghapusan pendaftaran
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;
    if ($id) {
        $enrollmentModel = new Enrollment();
        if ($enrollmentModel->delete($id)) {
            header('Location: ../../index.php?view=enrollments');
            exit;
        } else {
            header('Location: ../../index.php?view=enrollments&error=delete_failed');
            exit;
        }
    } else {
        header('Location: ../../index.php?view=enrollments&error=missing_id');
        exit;
    }
}
header('Location: ../../index.php?view=enrollments');
exit;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Enrollment</title>
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
        <h1 class="mb-4">Delete Enrollment</h1>
        <p class="bg-light p-3 rounded shadow-sm">Are you sure you want to delete this enrollment?</p>
        <form method="post">
            <input type="hidden" name="id" value="<?= $enrollment['id'] ?>">
            <button type="submit" class="btn btn-danger">Delete</button>
            <a href="index.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>

</html>