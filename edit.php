    <?php
    session_start();
    include 'conn.php';

    if (isset($_POST['update'])) {
        $update_id = $_POST['id'];
        $Name = $_POST['Name'];
        $Email = $_POST['Email'];
        $Password = mysqli_real_escape_string($conn, $_POST['Password']);
        $Mobile_number = $_POST['Mobile_number'];
       
$update_query = "UPDATE employees SET Name='$Name',Email='$Email',Password='$Password',Mobile_number='$Mobile_number' WHERE id=$update_id";            
$update_query_run = mysqli_query($conn, $update_query);
                if ($update_query_run) {
                    $_SESSION['success'] = "Employees Record Updated Successfully";
                    header('Location: index.php');
                } else {
                    $_SESSION['error'] = "Employees Record Not Updated Successfully";
                    header('Location: edit.php');
                }
    }
     

    ?>

    <!doctype html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <title>Student Edit</title>
    </head>

    <body>
        <div class="container mt-5">
            <?php include('message.php'); ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Student Edit
                                <a href="index.php" class="btn btn-danger float-end">BACK</a>
                            </h4>
                        </div>
                        <div class="card-body">

                            <?php
                            if (isset($_GET['id'])) {
                                $student_id = mysqli_real_escape_string($conn, $_GET['id']);
                                $edit_query = "SELECT * FROM employees WHERE id='$student_id' ";
                                $edit_query_run = mysqli_query($conn, $edit_query);

                                if (mysqli_num_rows($edit_query_run) > 0) {
                                    $employees = mysqli_fetch_array($edit_query_run);
                            ?>
                            <form action="" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?= $employees['id']; ?>">

                                <div class="mb-3">
                                    <label>Name</label>
                                    <input type="text" name="Name" value="<?= $employees['Name']; ?>" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Email</label>
                                    <input type="email" name="Email" value="<?= $employees['Email']; ?>"
                                        class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Password</label>
                                    <input type="password" name="Password" value="<?= $employees['Password']; ?>"
                                        class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Mobile Number</label>
                                    <input type="number" name="Mobile_number" value="<?= $employees['Mobile_number']; ?>"
                                        class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Image</label>
                                    <input type="file" name="Photo" class="form-control">
                                    <img src="uploads/<?= $employees['Photo'] ?>" style="width:120px">
                                </div>
                                <div class="mb-3">
                                    <button type="submit" name="update" class="btn btn-primary">
                                    update
                                    </button>

                            </form>
                            <?php
                                } else {
                                    echo "<h4>No Id Found</h4>";
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