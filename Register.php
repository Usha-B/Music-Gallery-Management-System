<?php
	session_start();
	$db=mysqli_connect("localhost","root","Naruto97","musicgallery");

	if (isset($_POST['register_btn'])){
		
		$username = mysqli_real_escape_string($db,$_POST['username']);
		$email = mysqli_real_escape_string($db,$_POST['email']);
		$password = mysqli_real_escape_string($db,$_POST['password']);
		$password2 = mysqli_real_escape_string($db,$_POST['password2']);

		if($password==$password2){
			$password=md5($password);
			$sql = "INSERT INTO LoginCredentials(Username,email,password) VALUES('$username','$email','$password')";
			mysqli_query($db, $sql);
			$_SESSION['message']="You are now logged in";
			$_SESSION['email']=$email;
			

			header("location:home.php");
		}else{
			$_SESSION['message']="The passwords do not match";
			
		}
	}

?>
<!DOCTYPE html>
<html lang ='en-IN'>
<head><title>Register</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="style.css"></head>
<body><div class="container"><h1>Register</h1>
<?php
 	if(isset($_SESSION['message']))
 	{
 		echo "<div id='errormsg'>".$_SESSION['message']."</div>";
 		unset($_SESSION['message']);
 	}
 ?>
<form method="post" action="Register.php" >
	<table>
		<tr>
			<td>UserName:</td>
			<td><input type="text" name="username" class="textInput" required></td></tr>
		<tr>
			<td>Email:</td>
			<td><input type="email" name="email" class="textInput" required></td></tr>
		<tr>
			<td>Password:</td>
			<td><input type="password" name="password" class="textInput" required></td></tr>
		<tr>
			<td>Re-enter Password:</td>
			<td><input type="password" name="password2" class="textInput" required></td></tr>	
		<tr>	
			<td></td>
			<td><input type="Submit" name="register_btn" value="Register"></td></tr>
			</table></form></div></body></html>


