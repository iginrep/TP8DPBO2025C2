<?php
require_once '../../models/Course.php';

$id = "";
$name = "";
$description = "";

// Fungsi untuk menampilkan halaman edit mata kuliah
if ($_SERVER["REQUEST_METHOD"] == 'GET') {
    if (!isset($_GET['id'])) {
        header("Location: index.php");
        exit;
    }
    $id = $_GET['id'];
    $courseModel = new Course();
    $course = $courseModel->getById($id);
    if (!$course) {
        header("Location: index.php");
        exit;
    }
    $name = $course['name'];
    $description = $course['description'];
} elseif ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $id = $_POST["id"];
    $data = [
        'name' => $_POST["name"],
        'description' => $_POST["description"]
    ];
    $courseModel = new Course();
    $courseModel->update($id, $data);
    header("Location: ../../index.php?view=courses");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Course</title>
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
        <h1 class="mb-4">Edit Course</h1>
        <form method="post" class="bg-light p-4 rounded shadow-sm">
            <input type="hidden" name="id" value="<?= $id; ?>">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= $name; ?>" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required><?= $description; ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Save Changes</button>
            <a href="../../index.php?view=courses" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>

</html>