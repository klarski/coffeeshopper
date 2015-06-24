<?php
session_start(); 

$user="root";
$pass="root";
$dbh = new PDO('mysql:host=localhost;dbname=coffeeshopper;port=8889', $user, $pass);
include_once("analyticstracking.php");

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

    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

    <!-- Add fancyBox -->
    <link rel="stylesheet" href="fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
    <script type="text/javascript" src="fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>

    <!-- Optionally add helpers - button, thumbnail and/or media -->
    <link rel="stylesheet" href="fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
    <script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
    <script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>

    <link rel="stylesheet" href="fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
    <script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

    <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>

    

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
            header('Location:index.php');
          }else{
          echo '<li class="welcome">ADMIN DASHBOARD</li>';
          echo '<li><a href="logout.php">LOGOUT</a></li>';
          }?>
        </ul>
      </div>
    </nav>

     <div class="bright-brown">
      <div class="container admin">
        <h2>PENDING APPROVAL</h2>
        
        <?php
        $stmt = $dbh->prepare('SELECT * FROM shops LEFT JOIN cities ON shops.cityId=cities.cityId WHERE statusId=2;');
        $stmt->execute();
        $result = $stmt->fetchall(PDO::FETCH_ASSOC);

        foreach  ($result as $row) {
            echo '<div class="col-md-4">';
            echo '<div class="panel panel-default">';
            echo '<div class="panel-heading">'.$row['shop_name'].'</div>';
            echo '<div class="panel-body">';
            echo '<p>City: '.$row['city'].'</br>';
            echo $row['shop_location'].'</br>';
            echo $row['phone_number'].'</br>';
            echo $row['website'].'</p>';
            echo '<p><a href="approveshop.php?id='.$row['shopId'].'">APPROVE</a> | ';
            echo '<a href="deleteshop.php?id='.$row['shopId'].'">REJECT</a></p>';
            echo '</div></div></div>';
        }?>
      </div>
      <div class="container admin">
        <h2>APPROVED</h2>
          <?php
          $stmt = $dbh->prepare('SELECT * FROM shops LEFT JOIN cities ON shops.cityId=cities.cityId WHERE statusId=1;');
          $stmt->execute();
          $result = $stmt->fetchall(PDO::FETCH_ASSOC);

          foreach  ($result as $row) {
              echo '<div class="col-md-3">';
              echo '<div class="panel panel-default">';
              echo '<div class="panel-heading">'.$row['shop_name'].'</div>';
              echo '<div class="panel-body">';
              echo '<p>City: '.$row['city'].'</br>';
              echo $row['shop_location'].'</br>';
              echo $row['phone_number'].'</br>';
              echo $row['website'].'</p>';
              echo '<a href="deleteshop.php?id='.$row['shopId'].'">DELETE</a></p>';
              echo '</div></div></div>';
          }?>

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
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="slick/slick.min.js"></script>
  </body>
</html>