<?php
session_start();
	$db=mysqli_connect("localhost","root","Naruto97","musicgallery");
	if(isset($_POST['remove_btn'])){
		$product_id=mysqli_real_escape_string($db,$_POST['hidden_id']);
		$sql="DELETE FROM cart where product_id='$product_id'";
		mysqli_query($db,$sql);
		
	}
	
?>
<!DOCTYPE html>
<html lang='en-IN'>
<head><title> KPOP </title>
<meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
 <body><div class="container-fluid" >
 <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Music Gallery</a>
    </div>
    <ul class="nav navbar-nav">
      <li ><a href="home.php">Home</a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#" class="active">Genre
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="kpop.php">Kpop</a></li>
          <li><a href="pop.php">Pop</a></li>
          <li><a href="hiphop.php">Hip hop</a></li>
          <li><a href="rock.php">Rock</a></li>
          <li><a href="jazz.php">Jazz</a></li>
        </ul>
      </li>



    </ul>
    <ul class="nav navbar-nav navbar-right">
       <?php
          if(isset($_SESSION["email"])){
        ?>  	
      <li><a href="">Cart</a></li>
      <li><a href="Logout.php"><span class="glyphicon glyphicon-log-out"></span> Log out</a></li><?php
    }
    else{
      ?>
      <li><a href="Register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="Login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      <?php

    }?>
    </ul>
  </div>
</nav>
<?php
	$email1= $_SESSION["email"];
	$sql = "SELECT c.* FROM Cart c,Logincredentials L where L.email='$email1'and c.customer_id=L.customer_id";
	
	
    $result= mysqli_query($db,$sql);
    if(mysqli_num_rows($result)>0)
    {
    	while($row=mysqli_fetch_array($result)){
 ?>

 <div class="col-md-4">

 	<form method="post" action="orders.php">
 		<div style="border:1px solid #333; background-color: #f1f1f1; border-radius:5px; padding:16px; margin-top:70px;" align="center">
 		 <!--<img src="<?php //echo $row["album_image"];?>"/>-->
 		<h4 class="text-info"><?php echo $row["album_name"]; ?></h4>

 	
 		<h4 class="text-danger">Rs.<?php echo $row["price"]; ?></h4>
 	<h4 class="text-info"><?php echo $row["quantity"]; ?></h4></div>
 		<input type="hidden" name="hidden_id" value="<?php echo $row["product_id"]; ?>"/>
 		<input type="Submit" class="button1" name="remove_btn" value="Remove"/>

 	 </form>

 </div> 
 <?php
    	}
    }

    	
 ?>
</div></body></html>