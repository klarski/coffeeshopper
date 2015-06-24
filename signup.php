<?php
session_start();

include_once("analyticstracking.php");

$user="root";
$pass="root";
$dbh = new PDO('mysql:host=localhost;dbname=coffeeshopper;port=8889', $user, $pass);

$stmt = $dbh->prepare('select * from users;');
if ($_SERVER['REQUEST_METHOD']=='POST') {
  $firstname=$_POST['firstname']; //get POST values
  $lastname=$_POST['lastname'];
  $email=$_POST['email'];
  $username=$_POST['username'];
  $password=$_POST['password'];
  $hash=md5($password);
  $stmt=$dbh->prepare('INSERT INTO users(firstname, lastname, email, username, password) values(:firstname, :lastname, :email, :username, :password);');
  $stmt->bindParam(':firstname',$firstname);
  $stmt->bindParam(':lastname',$lastname);
  $stmt->bindParam(':email',$email);
  $stmt->bindParam(':username',$username);
  $stmt->bindParam(':password',$hash);
  $stmt->execute();
  header('Location:signup-complete.php');
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
      <h1 class="white-text">SIGN UP</h1>
      <form enctype="multipart/form-data" action="signup.php" method="POST">
        <div class="form-group">
          <label class="white-text" for="firstname">FIRST NAME</label>
          <input type="firstname" class="form-control" id="firstname" name="firstname" placeholder="Enter first name" required/>
        </div>
        <div class="form-group">
          <label class="white-text" for="lastname">LAST NAME</label>
          <input type="lastname" class="form-control" id="lastname"  name="lastname"  placeholder="Enter last name" required/>
        </div>
        <div class="form-group">
          <label class="white-text" for="email">EMAIL ADDRESS</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required/>
        </div>
        <div class="form-group">
          <label class="white-text" for="username">USERNAME</label>
          <input type="username" class="form-control" id="username" name="username" placeholder="Enter username" required/>
        </div>
        <div class="form-group">
          <label class="white-text" for="password">PASSWORD</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Password" required/>
        </div>
        <button type="submit" class="my-btn">SIGN ME UP</button>
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
