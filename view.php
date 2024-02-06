<?php
include 'conn.php';
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Student View</title>
</head>

<body>

    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Student View Details
                            <a href="index.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if (isset($_GET['id'])) {
                            $student_id = mysqli_real_escape_string($conn, $_GET['id']);
                            $query = "SELECT * FROM employees WHERE id='$student_id' ";
                            $query_run = mysqli_query($conn, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                $employees = mysqli_fetch_array($query_run);
                        ?>

                        <div class="mb-3">
                            <label>Student Name</label>
                            <p class="form-control">
                                <?= $employees['Name']; ?>
                            </p>
                        </div>
                        <div class="mb-3">
                            <label>Student Email</label>
                            <p class="form-control">
                                <?= $employees['Email']; ?>
                            </p>
                        </div>
                        <div class="mb-3">
                            <label>Password</label>
                            <p class="form-control">
                                <?= $employees['Password']; ?>
                            </p>
                        </div>
                        <div class="mb-3">
                            <label>Mobile Number</label>
                            <p class="form-control">
                                <?= $employees['Mobile_number']; ?>
                            </p>
                        </div>
                        <div class="mb-3">
                            <label>Image</label>
                            <p class="form-control">
                                <img src="uploads/<?= $employees['Photo']; ?>" style="width:120px">
                            </p>
                        </div>

                        <?php
                            } else {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>