<?php
session_start();

$user="root";
$pass="root";
$dbh = new PDO('mysql:host=localhost;dbname=coffeeshopper;port=8889', $user, $pass);
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
    <script src="https://maps.googleapis.com/maps/api/js"></script>
    <script>

      var geocoder;
      var map;
      function initialize() {
        geocoder = new google.maps.Geocoder();
        var latlng = new google.maps.LatLng(40.709559, -74.005774);
        var mapOptions = {
          zoom: 12,
          center: latlng,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
      }

      function codeAddress() {
        var address =[];
        // address.push("6640 Akers Mill Rd SE")
        for(i=1; i<5; i++){
        var pushaddresses= document.getElementById('address').innerHTML + ", New York, NY";
        address.push(pushaddresses);
        i++;
        };

        console.log(address);
        
        for(i=1; i<address.length; i++){
        geocoder.geocode( { 'address': address[0]}, function(results, status) {
          if (status == google.maps.GeocoderStatus.OK) {
            map.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
                map: map,
                position: results[0].geometry.location
            });
          } else {
            console.log("this is not working");
            alert('Geocode was not successful for the following reason: ' + status);
          }
          i++;
          console.log(address[i]);

        });
      };
    }


    </script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body onload="initialize(); codeAddress(); ">
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

    <div class="bright-brown map">
      <div class="container">
        <h1 class="white-text">NEW YORK</h1>
        <div id="map-canvas">
        </div>
      </div>
    </div>

    <div class="purple list-view">
      <div class="container">

        
        <?php
        $stmt = $dbh->prepare('SELECT * FROM shops WHERE (cityId=2 AND statusId=1);');
        $stmt->execute();
        $result = $stmt->fetchall(PDO::FETCH_ASSOC);
        $shopnumber= 0;

        foreach  ($result as $row) {
            echo '<div class="shop-list">';
            echo '<h2>'.$row['shop_name'].'</h2>';
            echo '<p id="address">'.$row['shop_location'].'</p>';
            echo '<input id="address'.$shopnumber.'" type="textbox" value="'.$row['shop_location'].', New York, NY" hidden>';
            echo '<p>'.$row['phone_number'].'</p>';
            echo '<a href="shop.php?id='.$row['shopId'].'&name='.$row['shop_name'].'&city='.$row['cityId'].'"><button type="submit" class="my-btn">READ MORE</button></a>';
            $shopnumber+=1;
            // echo '<p>'.$shopnumber.'</p>';
            echo '</div>';
        }

        ?>
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