<?php

$user="root";
$pass="root";
$dbh = new PDO('mysql:host=localhost;dbname=coffeeshopper;port=8889', $user, $pass);

$id=$_GET['id'];
$name=$_GET['name'];
$name= strtoupper($name)


// $stmt = $dbh->prepare('SELECT * FROM shops WHERE shopId=$id;');
// $stmt->execute();
// $result = $stmt->fetchall(PDO::FETCH_ASSOC);
// // echo var_dump($result[0]);

// foreach($_GET as $key=>$value){
//  echo $key, ' => ', $value, "<br/>";
// }

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
    
    <!-- Add mousewheel plugin (this is optional) -->
    <script type="text/javascript" src="/fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>

    <!-- Add fancyBox -->
    <link rel="stylesheet" href="/fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
    <script type="text/javascript" src="/fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>

    <!-- Optionally add helpers - button, thumbnail and/or media -->
    <link rel="stylesheet" href="/fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
    <script type="text/javascript" src="/fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
    <script type="text/javascript" src="/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>

    <link rel="stylesheet" href="/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
    <script type="text/javascript" src="/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="index.html">
            <img alt="Brand" width="250" height="auto" src="images/logo.png">
          </a>
        </div>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="index.php">HOME</a></li>
          <li><a href="about.php">ABOUT</a></li>
          <li><a href="cities.php">CITIES</a></li>
          <li><a href="signup.php">SIGN UP</a></li>
          <li><a href="login.php">LOGIN</a></li>
        </ul>
      </div>
    </nav>


    <div class="bright-brown" id="shop-details">
      <div class="container">
        <?php
        echo '<h1 class="col-md-5">'.$name.'</h1>';
        ?>
        <div class="col-md-6 col-md-offset-1">
        <button class="my-btn">EDIT SHOP INFO</button>
        <a href="atlanta.html"><button class="my-btn">BACK TO ATLANTA</button></a>
      </div>
    </div>

  <div class="container">
    
    <div class="purple col-md-5 white-text">
      <?php
      $id=$_GET['id'];
      $stmt = $dbh->prepare('SELECT * FROM shops WHERE shopId=:id;');
      $stmt->bindParam(':id',$id);
      $stmt->execute();
      $result = $stmt->fetchall(PDO::FETCH_ASSOC);

        foreach  ($result as $row) {
            echo '<h3>LOCATION:</h3>';
            echo '<p>'.$row['shop_location'].'</p>';
            echo '<p>'.$row['phone_number'].'</p>';  
        }
      $stmt = $dbh->prepare('SELECT * FROM shop_hours WHERE shopId=:id;');
      $stmt->bindParam(':id',$id);
      $stmt->execute();
      $result = $stmt->fetchall(PDO::FETCH_ASSOC);

        echo '<h3>HOURS:</h3>';
        foreach  ($result as $row) {
            echo '<p>'.$row['day_of_week'].' :  '.$row['time_open'].' - '.$row['time_closed'].'</p>'; 
        }

        ?>     
<!-- 
      <h3>Methods of Brewing:</h3>
      <ul class="list-inline list-unstyled">
        <li><span class="glyphicon glyphicon-tint"></span>Drip</li>
        <li><span class="glyphicon glyphicon-tint"></span>Espresso</li>
        <li><span class="glyphicon glyphicon-tint"></span>Pour Over</li>
      </ul>
      <ul class="list-inline list-unstyled">
        <li><span class="glyphicon glyphicon-tint"></span>French Press</li>
        <li><span class="glyphicon glyphicon-tint"></span>Chemex</li>
        <li><span class="glyphicon glyphicon-tint"></span>Cold Brew</li>
      </ul>
 -->    </div>

    
      
      <?php
      $id=$_GET['id'];
      $stmt = $dbh->prepare('SELECT * FROM blends WHERE shopId=:id;');
      $stmt->bindParam(':id',$id);
      $stmt->execute();
      $result = $stmt->fetchall(PDO::FETCH_ASSOC);

        foreach  ($result as $row) {
            echo '<div class="col-md-7"><div class="blend">';
            echo '<img class="thumbnail col-md-2"src="images/beans.jpg">';
            echo '<p><strong>'.$row['blend_name'].'</strong></p>';
            echo '<p>'.$row['blend_desc'].'</p>';
            echo '</div></div>'; 
        }

        ?>  
    </div>
  </div>
</div>

  <div class="purple" id="image-gallery">
    <div class="container section-padding">
      <h2 class="white-text col-md-4">IMAGE GALLERY</h2>
      <button class="col-md-2 col-md-offset-5 my-btn">ADD AN IMAGE</button>
      <div class="row col-md-12 ">
        <a class="fancybox" rel="group" href="images/octane1.jpg"><img src="images/octane1.jpg" alt=""/></a>
        <a class="fancybox" rel="group" href="images/octane2.jpg"><img width="300" src="images/octane2.jpg"></a>
        <a class="fancybox" rel="group" href="images/octane3.jpg"><img width="300" src="images/octane3.jpg"></a>
      </div>
    </div>
  </div>


<div class="bright-brown">
  <div class="container">
    <div class="clearfix col-md-12 section-padding">
      <div class="row divider">
      <h2 class="white-text">REVIEWS</h2>
      <?php
      $id=$_GET['id'];
      $stmt = $dbh->prepare('SELECT * FROM reviews WHERE shopId=:id;');
      $stmt->bindParam(':id',$id);
      $stmt->execute();
      $result = $stmt->fetchall(PDO::FETCH_ASSOC);

        foreach  ($result as $row) {

          if ($row['taste_rating'] > 4) {
              echo '<h3>TASTE</h3><img src="images/5star.png">';
          } elseif ($row['taste_rating'] > 3) {
              echo '<h3>TASTE</h3><img src="images/4star.png">';
          } elseif ($row['taste_rating'] > 2) {
              echo '<h3>TASTE</h3><img src="images/3star.png">';
          } elseif ($row['taste_rating'] > 1) {
              echo '<h3 class="white-text">TASTE</h3><img src="images/2star.png">';
          } else {
              echo '<h3 class="white-text">TASTE:</h3><img src="images/2star.png">';
          };

          if ($row['atmos_rating'] > 4) {
              echo '<h3>ATMOSPHERE</h3><img src="images/5star.png">';
          } elseif ($row['atmos_rating'] > 3) {
              echo '<h3>ATMOSPHERE</h3><img src="images/4star.png">';
          } elseif ($row['atmos_rating'] > 2) {
              echo '<h3>ATMOSPHERE</h3><img src="images/3star.png">';
          } elseif ($row['atmos_rating'] > 1) {
              echo '<h3>ATMOSPHERE</h3><img src="images/2star.png">';
          } else {
              echo '<h3>ATMOSPHERE</h3><img src="images/2star.png">';
          };
          echo '<p>'.$row['review'].'</p>'; 
        }
      ?>
      </div>
      <!-- <div>
      <h4>Taste <span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span></h4>
      </div>
      <div>
      <h4>Atmosphere <span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span></h4>
      </div>
      <p>Macaroon caramels topping gummi bears brownie sugar plum liquorice pastry. Cake tiramisu sweet cake cupcake. Tart icing sweet roll cotton candy powder gummies. Wafer gingerbread cake carrot cake caramels dragée macaroon cupcake croissant. Pastry macaroon jelly-o. Bonbon sweet roll icing dessert liquorice oat cake jelly-o. Powder ice cream cake muffin powder caramels tootsie roll icing pudding.</p>
    </div> -->
  </div>
</div>

  

    <div class="row" id="footer">
      <div class="col-md-9">
      <li><a href="index.php">HOME</a></li>
      <li><a href="about.php">ABOUT</a></li>
      <li><a href="cities.php">CITIES</a></li>
      <li><a href="signup.php">SIGN UP</a></li>
      <li><a href="login.php">LOGIN</a></li>
      </div>
      <button class="col-md-2 my-btn" onClick="window.location.href='admin.php'">ADMIN LOGIN</button>
    </div>

<script type="text/javascript">
  $(document).ready(function() {
    $(".fancybox").fancybox();
  });
</script>
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>