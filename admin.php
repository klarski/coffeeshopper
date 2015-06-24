<?php
session_start();
// $user="root";
// $pass="root";
// $dbh = new PDO('mysql:host=localhost;dbname=coffeeshopper;port=8889', $user, $pass);
include_once("analyticstracking.php");
error_reporting(E_ALL ^ E_DEPRECATED);


$connection = mysql_connect("localhost","root", "root"); 
if(!$connection) { 
   die("Database connection failed: " . mysql_error()); 
}else{
   $db_select = mysql_select_db("coffeeshopper",$connection); 
   if (!$db_select) { 
       die("Database selection failed:: " . mysql_error()); 
   } 
}

if ($_SERVER['REQUEST_METHOD']=='POST') {
$username = $_POST['username'];
$password = $_POST['password'];
$query = "SELECT * FROM `admin` WHERE username='$username' and password='$password'";
$result = mysql_query($query) or die(mysql_error());
$count = mysql_num_rows($result);

  
if ($count == 1){
$_SESSION['username'] = $username;
header('Location:admindash.php');
}else{
 echo "Invalid Login Credentials.";
}
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>CoffeeShopper</title>

    <!-- Bootstrap -->
    <link href='http://fonts.googleapis.com/css?family=Josefin+Sans:400,600,700' rel='stylesheet' type='text/css'>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="index.php">
            <img alt="Brand" width="250" height="auto" src="images/logo.png">
          </a>
        </div>
        <ul class="nav navbar-nav navbar-right">
          <?php  if(!isset($_SESSION['username'])){
          echo '<li><a href="index.php">HOME</a></li>';
          echo '<li><a href="about.php">ABOUT</a></li>';
          echo '<li><a href="cities.php">CITIES</a></li>';
          echo '<li><a href="addshop.php">ADD A SHOP</a></li>';
          echo '<li><a href="signup.php">SIGN UP</a></li>';
          echo '<li><a href="login.php">LOGIN</a></li>'; 
          }else{
          echo '<li class="welcome">Hello, '.$_SESSION['username'].'!</li>';
          echo '<li><a href="index.php">HOME</a></li>';
          echo '<li><a href="about.php">ABOUT</a></li>';
          echo '<li><a href="cities.php">CITIES</a></li>';
          echo '<li><a href="addshop.php">ADD A SHOP</a></li>';
          echo '<li><a href="logout.php">LOGOUT</a></li>';
          }?>
        </ul>
      </div>
    </nav>

  <div class="purple" id="login">
    <div class="container">
      <h1 class="white-text">ADMIN LOGIN</h1>
      <form method="POST" action="">
        <div class="form-group">
          <label class="white-text" for="username">USERNAME</label>
          <input type="text" class="form-control" id="username" name="username" placeholder="Enter email" required/>
        </div>
        <div class="form-group">
          <label class="white-text" for="password">PASSWORD</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Password" required/>
        </div>
        <button type="submit" class="my-btn">SUBMIT</button>
      </form>
    </div>
  </div>

    <div class="row" id="footer">
      <div class="container">
      <div class="col-md-9">
      <li><a href="index.php">HOME</a></li>
      <li><a href="about.php">ABOUT</a></li>
      <li><a href="cities.php">CITIES</a></li> 
      <li><a href="signup.php">SIGN UP</a></li>
      <li><a href="login.php">LOGIN</a></li>
      </div>
      <button class="col-md-2 my-btn" onClick="window.location.href='admin.php'">ADMIN LOGIN</button>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>