<?php
  session_start();
  $db=mysqli_connect("localhost","root","Naruto97","musicgallery");
  if(isset($_POST["add_to_cart"])){
    if(isset($_SESSION['email'])){
      $album_name = mysqli_real_escape_string($db,$_POST['hidden_name']);
    $price = mysqli_real_escape_string($db,$_POST['hidden_price']);
    $quantity = mysqli_real_escape_string($db,$_POST['quantity']);
    $customer_id =mysqli_real_escape_string($db,$_POST['hidden_id']);
  
    $sql = "INSERT INTO cart(album_name,price,quantity,customer_id) VALUES('$album_name','$price','$quantity','$customer_id')";
      mysqli_query($db, $sql);
       echo "<script>alert('Added to cart')</script>";
       echo "<script>window.location('hippop.php')</script>";
      } 
    else
    {
      echo "<script>alert('Please Login')</script>";
      echo "<script>window.location('hippop.php')</script>";
    }
  }
?>
<!DOCTYPE html>
<html lang='en-IN'>
<head><title> HIPHOP </title>
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
      <li ><a>Home</a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" class="active">Genre
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
          if(isset($_SESSION['email'])){
            
          ?> 
      <li><a href="orders.php">Cart</a></li>
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
if(isset($_SESSION['email'])){
 $email=$_SESSION['email'];
  $sql = "SELECT A.*,L.customer_id FROM ALBUM A,LoginCredentials L where A.genre_id=3 and L.email='$email' order by A.album_id ASC";
  
    $result= mysqli_query($db,$sql);}
    else{
  $sql1="SELECT A.* FROM ALBUM A WHERE A.genre_id=3 order by A.album_id ASC";
  $result=mysqli_query($db,$sql1);
}
    if(mysqli_num_rows($result)>0)
    {
      while($row=mysqli_fetch_array($result)){
 ?>
 <div class="col-md-4">
 	<form method="post" action="hiphop.php">
 		<div style="border:1px solid #333; background-color: #f1f1f1; border-radius:5px; padding:16px; margin-top:70px;" align="center">
 		 <!--<img src="<?php //echo $row["album_image"];?>"/>-->
 		<h4 class="text-info"><?php echo $row["album_name"]; ?></h4>
 		<h4 class="text-danger">Rs.<?php echo $row["price"]; ?></h4>
 		<input type="text" name="quantity" class="form-control" value="1" />
 		<input type="hidden" name="hidden_name" value="<?php echo $row["album_name"]; ?>" />
		<input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />
     <input type="hidden" name="hidden_id" value="<?php echo $row["customer_id"]; ?>" />
 	 	<input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />
 	 	</div>
 	 </form>
 </div>
 <?php
    	}

    }	
 ?></div></body></html>