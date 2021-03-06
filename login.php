<?php
ob_start();
session_start();
include('includes/db.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<meta name="description" content="" />
<meta name="author" content="" />
<title>Page Title - SB Admin</title>
<link href="includes/dist/css/styles.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
<div id="layoutAuthentication">
<div id="layoutAuthentication_content">
<main>
<div class="container">
<div class="row justify-content-center">
<div class="col-lg-5">
<div class="card shadow-lg border-0 rounded-lg mt-5">
<div class="card-header">
<h3 class="text-center font-weight-light my-4">Login</h3>
</div>
<div class="card-body">
<?php
if(isset($_SESSION['loginerror'])){
?>
<div class="alert alert-warning alert-dismissible fade show" role="alert">
<strong>Holy guacamole!</strong>
<?php
echo $_SESSION['loginerror'];
unset($_SESSION['loginerror']);
?>.
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<?php
}                                    
?>
<form action="" method="POST">
<div class="form-group">
<label class="small mb-1" for="inputEmailAddress">Email</label>
<input name="email" class="form-control py-4" id="inputEmailAddress" type="email" placeholder="Enter email address" />
</div>
<div class="form-group">
<label class="small mb-1" for="inputPassword">Password</label>
<input name="pass" class="form-control py-4" id="inputPassword" type="password" placeholder="Enter password" />
</div>
<div class="form-group">
<div class="custom-control custom-checkbox">
<input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" />
<label class="custom-control-label" for="rememberPasswordCheck">Remember password</label>
</div>
</div>
<div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
<a class="small" href="password.html">Forgot Password?</a>
<button class="btn btn-primary" type="submit" name="login">Login</button>
</div>
</form>
</div>
<div class="card-footer text-center">
<div class="small"><a href="register.html">Need an account? Sign up!</a></div>
</div>
</div>
</div>
</div>
</div>
</main>
</div>
<div id="layoutAuthentication_footer">
<footer class="py-4 bg-light mt-auto">
<div class="container-fluid">
<div class="d-flex align-items-center justify-content-between small">
<div class="text-muted">Copyright &copy; Your Website 2020</div>
<div>
<a href="#">Privacy Policy</a>
&middot;
<a href="#">Terms &amp; Conditions</a>
</div>
</div>
</div>
</footer>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="includes/dist/js/scripts.js"></script>
</body>

</html>
<?php

if (isset($_POST['login'])) {

$email=$_POST['email'];
$pass=md5($_POST['pass']);

$email_check = "select * from users where email='$email' AND password='$pass'";
$email_query = mysqli_query($conn, $email_check);
// var_dump($email_query);
// echo mysqli_num_rows($email_query);

if (mysqli_num_rows($email_query) > 0) {
header("location:index.php");
} else {
$_SESSION['loginerror'] = "Incorrect email/password";
header("location:index.php");

}

}
ob_flush();
?>