<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>services</title>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="./assets/css/style.css">

</head>
<body>
	<?php require "dashboard.php" ?>

	<div class="crud">
		<h1>Oure Services</h1>
	</div>
<div class="container">
	<div class="table-responsive">
		<div class="table-wrapper">
				<div class="row">
					<div class="col-sm-6">
						<a href="add_user.php" class="btn btn-success" data-toggle="modal">
							<i class="material-icons">&#xE147;</i>
							<span>Add User</span>
						</a>	
					</div>
				</div>
				<br><br>
			
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>service_name</th>
						<th>service_detail</th>
						<th>status</th>
						<th>CreatedAt</th>
						<th>CpdatedAt</th>
					</tr>
				</thead>
				<tbody>
				<?php
						require "includes/config.php";

						// Assuming $pdo is your PDO connection object

						$query = 'SELECT * FROM services';
						$stmt = $pdo->query($query);

						while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
							// Your code to process each row goes here
							// Access columns using $result['column_name']
				?>

				<tr>
					<td>
						<?php echo $result['service_name']; ?>
					</td>
					<td>
						<?php echo $result['service_detail']; ?>
					</td>
					<td>
						<?php echo $result['status']; ?>
					</td>
					<td>
						<?php echo $result['Y-m-d H:i:s']; ?>
					</td>
					<td>
						<?php echo $result['Y-m-d H:i:s']; ?>
					</td>
				</tr>
				<?php
					}
				?>		
				</tbody>
			</table>	
	</div>  
</div>


  

</div>


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</body>
</html>