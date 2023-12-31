<?php
require "includes/config.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $valid = true;

    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

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

    if ($valid) {
        $statement = $pdo->prepare("SELECT * FROM users WHERE email=? AND password=?");
        $statement->execute([$email, $password]);

        if ($statement->rowCount()) {
            $_SESSION["user"] = $statement->fetch(PDO::FETCH_ASSOC);
            header("Location: dashboard.php");
        } else {
            $error = "Email or Password doesn't match";
        }
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
    <title>Admin : : Login</title>
    <link rel="shortcut icon" href="<?= BASE_URL; ?>assets/img/undraw_rocket.svg" type="image/x-icon">
    <link href="<?= BASE_URL; ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="<?= BASE_URL; ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                        <?= !empty($error) ? "<div class=\"alert alert-danger text-left\">$error</div>" : ""; ?>
                                    </div>
                                    <form class="user" method="post">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password">
                                        </div>
                                    
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                    </form>
                            
                                    <div class="text-center">
                                        <a class="small" href="<?= BASE_URL; ?>register.php">Registration</a>
                                    </div>
                                </div>
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