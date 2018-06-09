<?php
  session_start();
  $db=mysqli_connect("localhost","root","Naruto97","musicgallery");
?>
<!DOCTYPE html>
<html lang='en-IN'>
<head><title> Music Gallery </title>
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
      <li class="active"><a>Home</a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Genre
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
  if(isset($_SESSION["message"]))
  {
    echo "<div id='errormsg'>".$_SESSION['message']."</div>";
    unset($_SESSION['message']);
  }
 ?>
 <p> Are you a Music Freak? <br> Love to keep a collection of all your favourite artists? <br> Find all the albums of your favourite artist at our store! <br> And Good News! <br> Merchandise Coming SOON! 

  <h2> CLICK and ORDER.</h2></p><div><div class="clearfix"></div>
</div></body></html>