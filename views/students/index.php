<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>
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
        <h1 class="mb-4">Students</h1>
        <a href="create.php" class="btn btn-primary mb-3">Add New Student</a>
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>NIM</th>
                    <th>Phone</th>
                    <th>Join Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($students as $student): ?>
                    <tr>
                        <td><?= $student['id'] ?></td>
                        <td><?= $student['name'] ?></td>
                        <td><?= $student['nim'] ?></td>
                        <td><?= $student['phone'] ?></td>
                        <td><?= $student['join_date'] ?></td>
                        <td>
                            <a href="edit.php?id=<?= $student['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="delete.php?id=<?= $student['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>