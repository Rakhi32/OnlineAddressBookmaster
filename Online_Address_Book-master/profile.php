<?php
session_start();

if(isset($_SESSION['usr_id'])  && isset($_SESSION['email'])) {
	header("Location: home.php");
}

include_once 'dbconnect.php';

//set validation error flag as false
$error = false;

//check if form is submitted
if (isset($_POST['submit'])) {
	$name = mysqli_real_escape_string($con, $_POST['name']);
	$userId=$_SESSION['usr_id'];
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$Address = mysqli_real_escape_string($con, $_POST['Address']);
	$Phone = mysqli_real_escape_string($con, $_POST['Phone']);
	
  
	if (!$error) {
		if(mysqli_query($con, "INSERT INTO userInfo (userID,name,email,Address,Phone) VALUES('" . $userId . "','" . $name . "', '" . $email . "', '" . $Address . "', '" . $Phone. "')")) 
		{
			$successmsg = "Successfully Data are added!";
		} 
		else {
			$errormsg = "Error in added...Please try again later!";
		}
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Phone Book</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" >
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
	<link href='img/pb1.png' rel='icon' type='image/x-icon'/>
	
	
	<style>
	body  {
	    background-image: url("img/1.jpg");
	    background-color: #cccccc;
	}
	</style>

</head>
<body>

<nav class="navbar navbar-inverse">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="home.php">Home</a>
		</div>
		<div class="collapse navbar-collapse" id="navbar1">
			<ul class="nav navbar-nav navbar-right">
				<?php if (isset($_SESSION['usr_id'])) { ?>
				<li><a href="home.php"> <span class="glyphicon glyphicon-plus-sign"></span>   Add</a></li>
				<li><a href="edit.php"> <span class="glyphicon glyphicon-edit"></span>  Edit</a></li>
				<li><a href="view.php"> <span class="glyphicon glyphicon-eye-open"></span>  View</a></li>
				<li><a href="delete.php"> <span class="glyphicon glyphicon-remove"></span>  Delete</a></li>
				<li><a href="search.php"> <span class="glyphicon glyphicon-search"></span>  Search</a></li>
				<li><a href="profile.php"> <span class="glyphicon glyphicon-search"></span>  Profile</a></li>
        
            
				<li><p class="navbar-text">Hi! <span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['usr_name']; ?></p></li>
				<li><a href="logout.php"> <span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
				<?php } else { ?>
				<li><a href="login.php"><span class="glyphicon glyphicon-log-in"> Login</a></li>
				<li class="active"><a href="register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
				<?php } ?>
			</ul>
		</div>
	</div>
</nav>


<center> 
  <marquee><h3>WELCOME TO YOUR PROFILE</h3></marquee>
</center>
 

         
 

<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>


