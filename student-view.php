<?php
require 'dbcon.php';
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student View</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <?php include('message.php') ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Student View Details
                            <a href="index.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-boy">
                        <?php
                        if (isset($_GET['id'])) {
                            $student_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM students WHERE id='$student_id' ";
                            $query_run = mysqli_query($con, $query);
                        }
                        if (mysqli_num_rows($query_run) > 0) {
                            $student = mysqli_fetch_array($query_run);
                        ?>
                
                                <div class="mb-3">
                                    <label>Student Name</label>
                                <h3 class="form-control">
                                    <?= $student['name']; ?>
                                </h3>
                                <div class="mb-3">
                                    <label>Student Email</label>
                                    <p class="form-control">
                                    <?= $student['email']; ?>
                                </p>
                                <div class="mb-3">
                                    <label>Student Phone</label>
                                    <p class="form-control">
                                    <?= $student['phone']; ?>
                                </p>
                                <div class="mb-3">
                                    <label>Student Course</label>
                                    <h3 class="form-control">
                                    <?= $student['course']; ?>
                                </h3>
                                </div>
                        <?php
                        } else {
                            echo "<h4>No Such ID Found</h4>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>