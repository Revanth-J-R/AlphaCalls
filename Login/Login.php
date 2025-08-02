<?php
include ("../Includes/db.php");
//session_start();
include ("../Functions/functions.php");
?>


<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Agent Login</title>
	<!-- <link rel="stylesheet" type="text/css" href="../Styles/agentLogin.css"> -->
	<script src="https://kit.fontawesome.com/c587fc1763.js" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<a href="https://icons8.com/icon/83325/roman-soldier"></a>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<script src="https://kit.fontawesome.com/c587fc1763.js" crossorigin="anonymous"></script>
	<style>
		body {
			background-color: aliceblue;
		}

		.header {
			height: 100px;
		}

		.card {
			border: none;
			background-color: none;
		}

		.card-body {
			background-color: aliceblue;
		}

		.btn {
			border: 1px solid rgb(255, 78, 58);
		}
	</style>
</head>

<body>
	<div class="header row justify-content-center align-items-center" style="background-color:rgb(219, 83, 52)">
		<h2 style="font-style:bold;color:white;">Login</h2>
	</div>
	<main class="my-form">
		<div class="cotainer">
			<div class="row justify-content-center">
				<div class="col-md-8">
					<div class="card ">
						<div class="card-body ">
							<form name="my-form" action="Login.php" method="post">
								<div class="form-group row">
									<label for="name"
										class="col-md-4 col-form-label text-md-right"><b>Username</b></label>
									<div class="col-md-6">
										<input type="text" id="name" class="form-control border border-dark" name="name"
											placeholder="Username" required>
									</div>
								</div>

								<div class="form-group row">
									<label for="p1"
										class="col-md-4 col-form-label text-md-right"><b>Password</b></label>
									<div class="col-md-6">
										<input id="p1" class="form-control border border-dark" type="password"
											name="password" placeholder="Password" required>
									</div>
								</div>

								<div class="col-md-6 offset-md-4">
									<button type="submit" class="btn btn-primary text-right"
										style="background-color:rgb(255, 78, 58);color:rgb(255, 255, 255)" name="login"
										value="Login">
										Login
									</button>
								</div>
								<br>
								<div class="col-md-6 offset-md-4">
									<label id="forgotPassword" class="text-left"><a id='link' style=""
											href="agentForgotPassword.php"><b style="color:black ;text-align:left">
												Forgot your password </b></a></label>
									<br>
									<label id="account" class="text-left"><a id='link' href="Register.php"><b
												style="color:black"> Create New Account</b></a></label>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>

</body>

</html>

<?php
if (isset($_POST['login'])) {

	// $phonenumber = mysqli_real_escape_string($con, $_POST['phonenumber']);
	$name = mysqli_real_escape_string($con, $_POST['name']);
	$password = mysqli_real_escape_string($con, $_POST['password']);

	$ciphering = "AES-128-CTR";
	$iv_length = openssl_cipher_iv_length($ciphering);
	$options = 0;
	$encryption_iv = '2345678910111211';
	$encryption_key = "DE";
	$encryption = openssl_encrypt(
		$password,
		$ciphering,
		$encryption_key,
		$options,
		$encryption_iv
	);
	// echo $encryption;

	$query = "select * from registration where agent_name = '$name' and agent_password = '$encryption';";
	// echo $query;
	$run_query = mysqli_query($con, $query);
	$count_rows = mysqli_num_rows($run_query);
	if ($count_rows == 0) {
		echo "<script>alert('Please Enter Valid Details');</script>";
		echo "<script>window.open('Login.php','_self')</script>";
	}
	while ($row = mysqli_fetch_array($run_query)) {
		$id = $row['agent_id'];
	}

	$_SESSION['name'] = $name;
	echo "<script>window.open('../Portal/index.php','_self')</script>";
}

?>