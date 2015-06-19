<?php
session_start(); 

$user="root";
$pass="root";
$dbh = new PDO('mysql:host=localhost;dbname=coffeeshopper;port=8889', $user, $pass);

$id=$_GET['id'];
$name=$_GET['name'];
$name= strtoupper($name);
$cityid=$_GET['city'];

$city="";
if($cityid==1){
  $city="atlanta";
}elseif ($cityid==2) {
  $city="newyork";  
}elseif ($cityid==3) {
  $city="sanfran";
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

    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>

    <!-- Add fancyBox -->
    <link rel="stylesheet" href="/fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
    <script type="text/javascript" src="/fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>

    <!-- Optionally add helpers - button, thumbnail and/or media -->
    <link rel="stylesheet" href="/fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
    <script type="text/javascript" src="/fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
    <script type="text/javascript" src="/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>

    <link rel="stylesheet" href="/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
    <script type="text/javascript" src="/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

    <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>

    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

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
          <li><a href="index.php">HOME</a></li>
          <li><a href="about.php">ABOUT</a></li>
          <li><a href="cities.php">CITIES</a></li>
          <li><a href="addshop.php">ADD A SHOP</a></li>
          <?php  if(!isset($_SESSION['username'])){
          echo '<li><a href="signup.php">SIGN UP</a></li>';
          echo '<li><a href="login.php">LOGIN</a></li>'; 
          }else{
          echo '<li><a href="logout.php">LOGOUT</a></li>';
          }?>
        </ul>
      </div>
    </nav>


    <div class="bright-brown" id="shop-details">
      <div class="container">
        <div class="row">
        <?php
        echo '<h1 class="col-md-7 white-text">'.$name.'</h1>';
        ?>
        <div class="row col-md-offset-3">
        <?php 
        echo '<a href="'.$city.'.php"><button class="my-btn col-md-offset-3">BACK TO LIST OF SHOPS</button></a>'
        ?>
        </div>
      </div>   
    </div>

  <div class="container">
    <div class="purple details-box col-md-4 white-text">
      <?php
      $id=$_GET['id'];
      $stmt = $dbh->prepare('SELECT * FROM shops WHERE shopId=:id;');
      $stmt->bindParam(':id',$id);
      $stmt->execute();
      $result = $stmt->fetchall(PDO::FETCH_ASSOC);

        foreach  ($result as $row) {
            echo '<p>'.$row['shop_location'].'</br>';
            echo '<p>'.$row['phone_number'].'</br>';
            echo '<a href="'.$row['website'].'">'.$row['website'].'</a></p>';  
        }
      $stmt = $dbh->prepare('SELECT * FROM shop_hours WHERE shopId=:id;');
      $stmt->bindParam(':id',$id);
      $stmt->execute();
      $result = $stmt->fetchall(PDO::FETCH_ASSOC);

        echo '<h3>HOURS:</h3>';
        foreach  ($result as $row) {
            echo '<p>'.$row['day_of_week'].' :  '.$row['time_open'].' - '.$row['time_closed'].'</p>'; 
        }
      $stmt = $dbh->prepare('SELECT * FROM brew_methods WHERE shopId=:id;');
      $stmt->bindParam(':id',$id);
      $stmt->execute();
      $result = $stmt->fetchall(PDO::FETCH_ASSOC);

        echo '<h3>METHODS OF BREWING:</h3>';
        foreach  ($result as $row) {
            echo '<ul class="list-inline list-unstyled">';
            echo '<li><span class="glyphicon glyphicon-tint"></span>'.$row['brew_type'].'</li>';
            echo '</ul>';
        }

        ?>     
   </div>

    
      <div class="col-md-7">
      <h2 class="white-text">BLENDS & SINGLE ORIGIN COFFEES</h2>
      <?php
      $id=$_GET['id'];
      $stmt = $dbh->prepare('SELECT * FROM blends WHERE shopId=:id;');
      $stmt->bindParam(':id',$id);
      $stmt->execute();
      $result = $stmt->fetchall(PDO::FETCH_ASSOC);

        foreach  ($result as $row) {
            echo '<div class="col-md-12 blend">';
            echo '<img class="thumbnail col-md-2"src="images/beans.jpg">';
            echo '<p><strong>'.$row['blend_name'].'</strong></p>';
            echo '<p>'.$row['blend_desc'].'</p>';
            echo '</div>'; 
        }
        ?>
        </div> 
    </div>
  </div>
</div>

  <div class="purple" id="image-gallery">
    <div class="container section-padding">
      <h2 class="white-text col-md-4">IMAGE GALLERY</h2>
      <?php

      echo '<button class="col-md-2 col-md-offset-5 my-btn various fancybox.iframe" href="addimage.php?id='.$id.'">ADD AN IMAGE</button>';
      ?>
      
      <div class="row col-md-12 carousel">
        <?php
        $id=$_GET['id'];
        $stmt = $dbh->prepare('SELECT * FROM shop_images WHERE shopId=:id;');
        $stmt->bindParam(':id',$id);
        $stmt->execute();
        $result = $stmt->fetchall(PDO::FETCH_ASSOC);

        foreach  ($result as $row) {
            echo '<div><img height="200" width="auto" src="'.$row['image_file'].'" alt=""/></div>';
        }
        ?>

      </div>
    </div>
  </div>


<div class="bright-brown">
  <div class="container">
    <div class="col-md-12 section-padding">
      <div class="row divider">
         <div class="row">
      <h2 class="white-text col-md-7">REVIEWS</h2>
      <?php

      echo '<button class="col-md-2 col-md-offset-2 my-btn various fancybox.iframe" href="addimage.php?id='.$id.'">ADD A REVIEW</button>';
      ?>
      </div>
      <?php
      $id=$_GET['id'];
      $stmt = $dbh->prepare('SELECT * FROM reviews LEFT JOIN users ON reviews.userId=users.userId WHERE shopId=:id; ');
      $stmt->bindParam(':id',$id);
      $stmt->execute();
      $result = $stmt->fetchall(PDO::FETCH_ASSOC);

        foreach  ($result as $row) {
          echo '<h4>Submitted by: '.$row['username'].'</h4>';

          if ($row['taste_rating'] > 4) {
              echo '<span> TASTE: <img height=15 src="images/5star.png"></span></br>';
          } elseif ($row['taste_rating'] > 3) {
              echo '<span> TASTE: <img height=15 src="images/4star.png"</span></br>';
          } elseif ($row['taste_rating'] > 2) {
              echo '<span> TASTE: <img height=15 src="images/3star.png"></span></br>';
          } elseif ($row['taste_rating'] > 1) {
              echo '<span> TASTE: <img height=15 src="images/2star.png"></span></br>';
          } else {
              echo '<span> TASTE: <img height=15 src="images/2star.png"></span></br>';
          };

          if ($row['atmos_rating'] > 4) {
              echo '<span> ATMOSPHERE: <img height=15 src="images/5star.png"</span></br>';
          } elseif ($row['atmos_rating'] > 3) {
              echo '<span> ATMOSPHERE: <img height=15 src="images/4star.png"</span></br>';
          } elseif ($row['atmos_rating'] > 2) {
              echo '<span> ATMOSPHERE: <img height=15 src="images/3star.png"></span></br>';
          } elseif ($row['atmos_rating'] > 1) {
              echo '<span> ATMOSPHERE: <img height=15 src="images/2star.png"></span></br>';
          } else {
              echo '<span> ATMOSPHERE: <img height=15 src="images/1star.png"></span></br>';
          };
          echo '<h4 class="review">'.$row['review'].'</h4>'; 
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
<script type="text/javascript">
  $(document).ready(function() {
    $(".fancybox").fancybox();
  });

  $(document).ready(function() {
  $(".various").fancybox({
    maxWidth  : 800,
    maxHeight : 600,
    fitToView : false,
    width   : '70%',
    height    : '70%',
    autoSize  : false,
    closeClick  : false,
    openEffect  : 'none',
    closeEffect : 'none'
  });
});
</script>

<script type="text/javascript">
      $(document).ready(function(){
          $('.carousel').slick({
          dots: true,
          infinite: false,
          speed: 300,
          slidesToShow: 4,
          slidesToScroll: 4,
          responsive: [
            {
              breakpoint: 1024,
              settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
                dots: true
              }
            },
            {
              breakpoint: 600,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 2
              }
            },
            {
              breakpoint: 480,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1
              }
            }
          ]
      });
      });      
        
  </script>

    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="slick/slick.min.js"></script>
  </body>
</html>