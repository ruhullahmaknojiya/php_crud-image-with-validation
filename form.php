<html>

<head>

    <style>

        .error {color: red;}

    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>

    <?php

$nameErr = $emailErr = $passwordErr = $confirm_passwordErr = $mobileErr = "";

$name = $email = $password = $confirm_password = $mobile_number = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["name"])) {

        $nameErr = "Please enter Your Name.";

    } else {

        $name = test_input($_POST["name"]);

        // check if name only contains letters and whitespace

        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {

            $nameErr = "Only letters and white space allowed";

        }

    }

    if (empty($_POST["email"])) {

        $emailErr = "Please Enter your Email Field.";

    } else {

        $email = test_input($_POST["email"]);

        // check if e-mail address is well-formed

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

            $emailErr = "The email  is incorrect";

        }

    }

    if (!empty($_POST["password"]) && ($_POST["password"] == $_POST["confirm_password"])) {
        $password = test_input($_POST["password"]);
        $confirm_password = test_input($_POST["confirm_password"]);
        if (strlen($_POST["password"]) <= '8') {
            $passwordErr = "Your Password Must Contain At Least 8 Characters!";
        } elseif (!preg_match("#[0-9]+#", $password)) {
            $passwordErr = "Your Password Must Contain At Least 1 Number!";
        } elseif (!preg_match("#[A-Z]+#", $password)) {
            $passwordErr = "Your Password Must Contain At Least 1 Capital Letter!";
        } elseif (!preg_match("#[a-z]+#", $password)) {
            $passwordErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
        } else {
            $confirm_passwordErr = "Please Entered Or Confirmed Your Password!";
        }   
    }else{
        $passwordErr= "please enter Your password";
    }

    if (empty($_POST["mobile_number"])) {
        $mobileErr = "Mobile no is required";
    } else {
        $mobile_number = test_input($_POST["mobile_number"]);
        // check if mobile no is well-formed
        if (!preg_match("/^[0-9]*$/", $mobile_number)) {
            $mobileErr = "Only numeric value is allowed.";
        }

        //check mobile no length should not be less and greater than 10
        if (strlen($mobile_number) != 10) {
            $mobileErr = "Mobile no must contain 10 digits.";
        }
    }

}

function test_input($data)
{

    $data = trim($data);

    $data = stripslashes($data);

    $data = htmlspecialchars($data);

    return $data;

}

?>

    <h2 class="text-center"><b>PHP Form Validation</b></h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
<div class="container col-lg-6 mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control">
        <span class="error"> <?php echo $nameErr; ?></span>

        </div>

        <div class="container col-lg-6 mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control">
        <span class="error"><?php echo $emailErr; ?></span>
        </div>

        <div class="container col-lg-6 mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control">
        <span class="error"> <?php echo $passwordErr; ?></span>
        </div>

        <div class="container col-lg-6 mb-3">
        <label>Confirm Password</label>
        <input type="password" name="confirm_password" class="form-control">
        <span class="error"> <?php echo $confirm_passwordErr; ?></span>
        </div>

        <div class="container col-lg-6 mb-3">
        <label>Mobile Number</label>
        <input type="number" name="mobile_number" class="form-control">
        <span class="error"> <?php echo $mobileErr; ?></span>
        </div>

        <div class="container col-lg-6">
            <input type="submit" name="submit" class="btn btn-outline-primary">
        </div>

    </form>

    <?php

echo $name;

echo "<br>";

echo $email;

echo "<br>";

echo $password;

echo "<br>";

echo $mobile_number;

echo "<br>";

?>

</body>

</html>