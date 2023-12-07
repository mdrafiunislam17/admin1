<?php
require "includes/config.php";

// Registration
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Collection form data
    $first_name = trim($_POST["first_name"]);
    $last_name = trim($_POST["last_name"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $conf_password = trim($_POST["conf_password"]);

    $error = "";
    $valid = true;
    
    if (empty($first_name)) {
        $valid = false;
        $error .= "First name is required.<br>";
    }

    if (empty($last_name)) {
        $valid = false;
        $error .= "Last name is required.<br>";
    }

    if (empty($email)) {
        $valid = false;
        $error .= "Email is required.<br>";
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $valid = false;
            $error .= "Email is not valid.<br>";
        }
    }

    if (empty($password)) {
        $valid = false;
        $error .= "Password is required.<br>";
    }

    if (empty($conf_password)) {
        $valid = false;
        $error .= "Confirm password is required.<br>";
    }

    if ($password !== $conf_password) {
        $valid = false;
        $error .= "Password and confirm password doesn't match.<br>";
    }

    if ($valid == true) {
        $role = "Guest";
        $created_at = date("Y-m-d H:i:s");
        
        // Insert data
        $statement = $pdo->prepare("INSERT INTO users(`first_name`, `last_name`, `email`, `password`, `role`, `account_created`) VALUES (?, ?, ?, ?, ?, ?)");
        $statement->execute([
            $first_name,
            $last_name,
            $email,
            $password,
            $role,
            $created_at
        ]);

        $success = "Data inserted success";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin : : Registration</title>
    <link rel="shortcut icon" href="<?= BASE_URL; ?>assets/img/undraw_rocket.svg" type="image/x-icon">
    <link href="<?= BASE_URL; ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="<?= BASE_URL; ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Registration</h1>
                                <?= !empty($error) ? "<div class=\"alert alert-danger text-left\">$error</div>" : ""; ?>
                                <?= !empty($success) ? "<div class=\"alert alert-success text-left\">$success</div>" : ""; ?>

                            </div>
                            <form method="post" class="user">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="first_name" value="<?= $_POST["first_name"] ?? ""; ?>" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="First Name">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="last_name" value="<?= $_POST["last_name"] ?? ""; ?>" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="email" value="<?= $_POST["email"] ?? ""; ?>" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Email Address">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" name="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" name="conf_password" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Repeat Password">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>
                            </form>
                        
                            <div class="text-center">
                                <a class="small" href="<?= BASE_URL; ?>login.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= BASE_URL; ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= BASE_URL; ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= BASE_URL; ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="<?= BASE_URL; ?>assets/js/sb-admin-2.min.js"></script>
</body>
</html>