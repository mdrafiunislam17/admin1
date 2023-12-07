<?php
require "includes/config.php";
if (empty($_SESSION["user"])) {
    header("Location: login.php");
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
    <title>Admin Panel : : Dashboard</title>
    <link rel="shortcut icon" href="<?= BASE_URL;?>assets/img/undraw_rocket.svg" type="image/x-icon">
    <link href="<?= BASE_URL; ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="<?= BASE_URL; ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
    <div id="wrapper">
        <?php require PROJECT_DIR . "includes/sidebar.php"; ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php require PROJECT_DIR . "includes/topbar.php"; ?>
                <div class="container-fluid">
                    <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
                    
                </div>
            </div>
            <?php #require PROJECT_DIR . "includes/footer.php"; ?>
        </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script src="<?= BASE_URL; ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= BASE_URL; ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= BASE_URL; ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="<?= BASE_URL; ?>assets/js/sb-admin-2.min.js"></script>

</body>

</html>