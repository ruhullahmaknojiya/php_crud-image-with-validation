<?php
session_start();
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

    <title>Employees CRUD</title>
</head>

<body>
    <div class="container mt-4">
        <?php include('message.php'); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Employees Details
                            <a href="form.php" class="btn btn-primary btn-sm float-end">Add Employees</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Mobile_number</th>
                                   
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $fetch_query = "SELECT * FROM employees";
                                $fetch_query_run = mysqli_query($conn, $fetch_query);

                                if (mysqli_num_rows($fetch_query_run) > 0) {
                                    foreach ($fetch_query_run as $employees) {
                                ?>
                                <tr>
                                    <td><?= $employees['id']; ?></td>
                                    <td><?= $employees['name']; ?></td>
                                    <td><?= $employees['email']; ?></td>
                                    <td><?= $employees['password']; ?></td>
                                    <td><?= $employees['mobile_number']; ?></td>
                                   
                                    <td>
                                        <a href="view.php?id=<?= $employees['id']; ?>"
                                            class="btn btn-info btn-sm">View</a>
                                        <a href="edit.php?id=<?= $employees['id']; ?>"
                                            class="btn btn-success btn-sm">Edit</a>

                                        <a href="delete.php?id=<?= $employees['id']; ?>" class="btn btn-danger btn-sm"
                                            onclick="return check_delete()">Delete</a>

                                    </td>
                                </tr>
                                <?php
                                    }
                                } else {
                                    echo "<h5> No Record Found </h5>";
                                }
                                ?>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    function check_delete() {
        return confirm('Are You Want To delete This Record');
    }
    </script>

</body>

</html>