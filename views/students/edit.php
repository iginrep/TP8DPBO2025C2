<?php
require_once '../../models/Student.php';

$id = "";
$name = "";
$nim = "";
$phone = "";
$join_date = "";

// Fungsi untuk menampilkan halaman edit mahasiswa
if ($_SERVER["REQUEST_METHOD"] == 'GET') {
  if (!isset($_GET['id'])) {
    header("Location: ../index.php");
    exit;
  }
  $id = $_GET['id'];
  $studentModel = new Student();
  $student = $studentModel->getById($id);
  if (!$student) {
    header("Location: ../index.php");
    exit;
  }
  $name = $student['name'];
  $nim = $student['nim'];
  $phone = $student['phone'];
  $join_date = $student['join_date'];
} elseif ($_SERVER["REQUEST_METHOD"] == 'POST') {
  $id = $_POST["id"];
  $data = [
    'name' => $_POST["name"],
    'nim' => $_POST["nim"],
    'phone' => $_POST["phone"],
    'join_date' => $_POST["join_date"],
    'email' => '',
    'address' => ''
  ];
  $studentModel = new Student();
  $studentModel->update($id, $data);
  header("Location: ../../index.php?view=students");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Student</title>
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
            <a class="nav-link active" href="../../views/students/index.php">Students</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../views/courses/index.php">Courses</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../views/enrollments/index.php">Enrollments</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container mt-5">
    <h1 class="mb-4">Edit Student</h1>
    <form method="post" class="bg-light p-4 rounded shadow-sm">
      <input type="hidden" name="id" value="<?= $id; ?>">
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="<?= $name; ?>" required>
      </div>
      <div class="mb-3">
        <label for="nim" class="form-label">NIM</label>
        <input type="text" class="form-control" id="nim" name="nim" value="<?= $nim; ?>" required>
      </div>
      <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input type="text" class="form-control" id="phone" name="phone" value="<?= $phone; ?>" required>
      </div>
      <div class="mb-3">
        <label for="join_date" class="form-label">Join Date</label>
        <input type="date" class="form-control" id="join_date" name="join_date" value="<?= $join_date; ?>" required>
      </div>
      <button type="submit" class="btn btn-primary">Save Changes</button>
      <a href="../../index.php?view=students" class="btn btn-secondary">Cancel</a>
    </form>
  </div>

  <script src="../../public/bootstrap.bundle.min.js"></script>
</body>

</html>