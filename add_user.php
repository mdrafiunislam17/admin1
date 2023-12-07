<?php 
require "includes/config.php";
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $service_name = trim($_POST["service_name"]);
    $service_detail = trim($_POST["service_detail"]);
	$status = trim($_POST["status"]);
	$created_at = date("Y-m-d H:i:s");
	$updated_at = date("Y-m-d H:i:s");

	// Insert data
	$statement = $pdo->prepare("INSERT INTO `services` (`id`, `service_name`, `service_detail`, `status`, `created_at`, `updated_at`) VALUES (NULL, ?, ?, ?, '?, ?)");
	$statement->execute([
		$service_name,
		$service_detail,
		$status,
		$created_at,
        $updated_at
	]);

	$success = "Data inserted success";


}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>service</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/util.css">
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="assets/img/service.jpg" alt="IMG">
                </div>

                <form class="login100-form validate-form">
                    <span class="login100-form-title">
						service
					</span>

                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="text" name="service_name" placeholder="service_name">
                    </div>
                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="text" name="service_detail" placeholder="service_detail">
                    </div>
                    <div class="wrap-input100 validate-input">
                        <textarea class="input100 message" id="message" name="status" rows="3"  placeholder="status"></textarea>
                    </div>



                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
							Submet
						</button>
                    </div>

                </form>
            </div>
        </div>
    </div>




    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/tilt/tilt.jquery.min.js"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <script src="js/main.js"></script>

</body>

</html>