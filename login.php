<?php 
session_start();
require 'functions.php';

// cek cookie
if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
	$id = $_COOKIE['id'];
	$key = $_COOKIE['key'];

	// ambil username berdasarkan id
	$result = mysqli_query($conn, "SELECT username FROM user WHERE id = $id");
	$row = mysqli_fetch_assoc($result);

	// cek cookie dan username
	if ($key === hash('sha256', $row['username'])) {
		$_SESSION['login'] = true;
	}
}




if (isset($_SESSION["login"])) {
	header("Location: index.php");
	exit;
}




if (isset($_POST["login"])) {

	
	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");



	// cek username
	if (mysqli_num_rows($result) > 0) {
		
		// cek password
		$row = mysqli_fetch_assoc($result);
		if (password_verify($password, $row["password"])) {
			// set session
			$_SESSION["login"] = true;

			// cek remember me
			if (isset($_POST["remember"])) {
				// buat cookie

			setcookie('id', $row['id'], time() + 60);
			setcookie('key', hash('sha256', $row['username']), time()+60);
			}

			header("Location: index.php");
			exit;
		}
	}

	$error = true;
}


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css" type="text/css">
    <link rel="stylesheet" href="fontawesome-free/css/all.min.css">

 <title>Login</title>
<?php if (isset($error)) : ?>
	<script>alert('username / password salah')</script>
<?php endif; ?>

 </head>
  <body>
  	<div class="container">
  		<div class="row content">
  			<div class="col-md-6 mb-3">
  				<img src="img/gambar.png" alt="image" class="img-fluid">
  			</div>
  			<div class="col-md-6">
  				<h3 class="signin-text mb-3">Login</h3>
  				<form action="" method="post">
  					<div class="form-group">
  						<label for="username">Username</label>
  						<input type="text" name="username" class="form-control" id="username" autofocus="" autocomplete="" required="">
  					</div>
  					<div class="form-group">
  						<label for="password">Password</label>
  						<input type="password" name="password" class="form-control" id="password" autofocus="" autocomplete="" required="">
  					</div>
  					<div class="form-group form-check">
  						<input type="checkbox" name="remember" class="form-check-input" id="remember">
  						<label for="remember" class="form-check-label">Remember Me</label>
  					</div>
  					<button class="btn btn-primary" type="submit" name="login">Login</button>
  					<button class="btn btn-danger" type="submit" name="register"><a href="registrasi.php" class="text-white">Registrasi</a></button>
  				</form>
  			</div>
  		</div>
  	</div>
    
  

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>