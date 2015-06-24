<?php
$user="root";
$pass="root";
$dbh = new PDO('mysql:host=localhost;dbname=coffeeshopper;port=8889', $user, $pass);

session_start(); 

if ($_SERVER['REQUEST_METHOD']=='POST') {
      $cityId=$_POST['cityId'];
      $shop_name=$_POST['shop_name']; //get POST values
      $shop_location=$_POST['shop_location'];
      $phone_number=$_POST['phone_number'];
      $website=$_POST['website'];
      $statusId=2;
      $stmt=$dbh->prepare('INSERT INTO shops(shop_name, shop_location, website, statusId, cityId, phone_number) values(:shop_name, :shop_location, :website, :statusId, :cityId, :phone_number);');
      $stmt->bindParam(':cityId',$cityId);
      $stmt->bindParam(':shop_name',$shop_name);
      $stmt->bindParam(':shop_location',$shop_location);
      $stmt->bindParam(':phone_number',$phone_number);
      $stmt->bindParam(':website',$website);
      $stmt->bindParam(':statusId',$statusId);
      $stmt->execute();
      header('Location:addshop2.php?name='.$shop_name);
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
  end if]-->
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
        <div class="nologin white-text">
          <h1>Thanks for submitting a new shop!</h1>
          <h2>It will be posted to the website upon approval. Feel free to explore other shops in the meantime.</h2>      
          <button class="col-md-4 col-md-offset-4 my-btn" onClick="window.location.href='cities.php'">GO TO CITIES</button>
      </div>
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