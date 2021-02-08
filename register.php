<?php
ob_start();
session_start();
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
<div class="col-lg-7">
<div class="card shadow-lg border-0 rounded-lg mt-5">
<div class="card-header">
<h3 class="text-center font-weight-light my-4">Create Account</h3>
</div>
<div class="card-body">
<form action="" method="POST">
<div class="form-row">
<div class="col-md-6">
<div class="form-group">
<label class="small mb-1" for="inputFirstName">First Name</label>
<input name="fname" class="form-control py-4" id="inputFirstName" type="text" placeholder="Enter first name" />
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label class="small mb-1" for="inputLastName">Last Name</label>
<input name="lname" class="form-control py-4" id="inputLastName" type="text" placeholder="Enter last name" />
</div>
</div>
</div>
<div class="form-group">
<label class="small mb-1" for="inputEmailAddress">Email</label>
<input class="form-control py-4" name="email" id="inputEmailAddress" type="email" aria-describedby="emailHelp" placeholder="Enter email address" />
<div style="color:red">
<?php
if(isset($_SESSION['emailerror'])){
echo $_SESSION['emailerror']; 
unset($_SESSION['emailerror']);
}
?>
</div>
</div>
<div class="form-row">
<div class="col-md-6">
<div class="form-group">
<label class="small mb-1" for="inputPassword">Password</label>
<input class="form-control py-4" name="pass" id="inputPassword" type="password" placeholder="Enter password" />
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label class="small mb-1" for="inputConfirmPassword">Confirm Password</label>
<input class="form-control py-4" id="inputConfirmPassword" type="password" placeholder="Confirm password" />
</div>
</div>
</div>
<button name="register" class="btn btn-primary btn-block" type="submit">Sign Up</button>
</form>
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
include("includes/db.php");
//fetch input data from form
if (isset($_POST['register'])) {

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$pass = md5($_POST['pass']);

//TASK 1
//check if email already exists
$email_check = "select * from users where email='$email'";
$email_query = mysqli_query($conn, $email_check);

// echo mysqli_num_rows($email_query);

if (mysqli_num_rows($email_query) > 0) {

$_SESSION['emailerror']="email is already taken";
header("location: register.php");
// echo "<script>alert('email already in use')</script>";
} else {

$query = "insert into users(FNAME,LNAME,email,password) values(
'$fname','$lname','$email','$pass')";

$execute_query = mysqli_query($conn, $query);
// var_dump($execute_query);

if ($execute_query) {
header("location: login.php");
// echo "<script>alert('user created successfully')</script>";
} else {
echo "<script>alert('something went wrong')</script>";
}
}
}

ob_flush();
?>