<?php
require_once 'models/Student.php';
require_once 'models/Course.php';
require_once 'models/Enrollment.php';

$studentModel = new Student();
$courseModel = new Course();
$enrollmentModel = new Enrollment();

// Fungsi untuk mengatur tampilan berdasarkan parameter 'view'
$view = $_GET['view'] ?? 'students';

switch ($view) {
  // Fungsi untuk menampilkan data mata kuliah
  case 'courses':
    $data = $courseModel->getAll();
    $columns = ['ID', 'Name', 'Description'];
    $actions = ['Edit', 'Delete'];
    break;
  // Fungsi untuk menampilkan data pendaftaran
  case 'enrollments':
    $data = $enrollmentModel->getAll();
    $columns = ['ID', 'Student Name', 'Course Name'];
    $actions = ['Edit', 'Delete'];
    break;
  // Fungsi default untuk menampilkan data mahasiswa
  default:
    $data = $studentModel->getAll();
    $columns = ['ID', 'Name', 'NIM', 'Phone', 'Join Date'];
    $actions = ['Edit', 'Delete'];
    break;
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="public/bootstrap.min.css" rel="stylesheet">
  <title>Home</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Home</a>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link <?= $view === 'students' ? 'active' : '' ?>" href="index.php?view=students">Students</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= $view === 'courses' ? 'active' : '' ?>" href="index.php?view=courses">Courses</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= $view === 'enrollments' ? 'active' : '' ?>" href="index.php?view=enrollments">Enrollments</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container my-4">
    <div class="col-1 my-3">
      <a type="button" class="btn btn-primary" href="views/<?= $view ?>/create.php">Add New</a>
    </div>
    <table class="table">
      <thead>
        <tr>
          <?php foreach ($columns as $column): ?>
            <th><?= $column ?></th>
          <?php endforeach; ?>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($data as $row): ?>
          <tr>
            <?php foreach ($row as $value): ?>
              <td><?= $value ?></td>
            <?php endforeach; ?>
            <td>
              <a class="btn btn-success" href="views/<?= $view ?>/edit.php?id=<?= $row['id'] ?>">Edit</a>
              <a class="btn btn-danger" href="views/<?= $view ?>/delete.php?id=<?= $row['id'] ?>">Delete</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <script src="public/bootstrap.bundle.min.js"></script>
</body>

</html>