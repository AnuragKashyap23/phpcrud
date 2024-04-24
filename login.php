<?php session_start();
?>

<!DocType>
<html>
<head>
<title>Login</title>
<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

<script src="https://kit.fontawesome.com/767eb27502.js" crossorigin="anonymous"></script>
</head>
<body style="background-image: url('images/bg1.jpg');">
<div class="container">
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6">

<h1 style="text-align:center;">Sign-In</h1>
<form name="loginform" action="login.php" method="GET">
<div class="form-group mb-2">
<input type="text" name="txtuser" value="" class="form-control" placeholder="Enter Username">
</div>

<div class="form-group mb-2">
<input type="password" name="txtpassword" value="" class="form-control" placeholder="Enter Password">
</div>

<div class="form-group">
<input type="submit" name="btnlogin" value="Login" class="btn btn-success d-block mx-auto">
</div>

</form>

</div>
<div class="col-md-3"></div>
</div>
</div>



<?php
if(isset($_REQUEST["btnlogin"]))
{
	$user=$_REQUEST["txtuser"];
	$password=$_REQUEST["txtpassword"];
	include'connection.php';
    
	$qry="SELECT * FROM login WHERE username='$user' AND password='$password'";
    $result=mysqli_query($con,$qry);
	if(mysqli_affected_rows($con)>0)
	{
		$record=mysqli_fetch_array($result);
		$_SESSION["user"]=$record["username"];
		$_SESSION["usertype"]=$record["usertype"];
		header("Location:Dashboard.php");
	}
	else
	{
		echo"<h2>Invalid Username or Password</h2>";
	}





}
?>

<!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->
</body>
</html>