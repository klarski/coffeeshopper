<?php
session_start();
include_once("analyticstracking.php") ;

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
        var latlng = new google.maps.LatLng(37.775341, -122.419061);
        var mapOptions = {
          zoom: 12,
          center: latlng,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
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
        <h1 class="white-text">SAN FRANCISCO</h1>
        <div id="map-canvas">
        </div>
      </div>
    </div>

    <div class="purple list-view">
      <div class="container">

        
        <?php
        $stmt = $dbh->prepare('SELECT * FROM shops WHERE (cityId=3 AND statusId=1);');
        $stmt->execute();
        $result = $stmt->fetchall(PDO::FETCH_ASSOC);
        $addressData = array();
        $nameData = array();
        $linkData = array();

        foreach  ($result as $row) {
            echo '<div class="shop-list">';
            echo '<h2>'.$row['shop_name'].'</h2>';
            echo '<p id="address">'.$row['shop_location'].'</p>';
            echo '<p>'.$row['phone_number'].'</p>';
            echo '<a href="shop.php?id='.$row['shopId'].'&name='.$row['shop_name'].'&city='.$row['cityId'].'"><button type="submit" class="my-btn">READ MORE</button></a>';
            echo '</div>';
            $shoplink = '<a href="shop.php?id='.$row['shopId'].'&name='.$row['shop_name'].'&city='.$row['cityId'].'"><button type="submit" class="my-btn">READ MORE</button></a>';
            $fullAddress = $row['shop_location'].',</br> San Francisco, CA';
            array_push($nameData, $row['shop_name']);
            array_push($addressData, $fullAddress);
            array_push($linkData, $shoplink);
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

    <script type="text/javascript">
    var address =  <?php echo json_encode($addressData); ?>;
    var shopName = <?php echo json_encode($nameData); ?>;
    var shopLink = <?php echo json_encode($linkData); ?>;
    console.log(shopLink);

    function codeAddress() {
        for(i=0; i<address.length; i++){
          a=0;    
        geocoder.geocode( { 'address': address[i]}, function(results, status) {
          if (status == google.maps.GeocoderStatus.OK) {
            map.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
                map: map,
                position: results[0].geometry.location,
            });
            console.log("This is the result, " + shopName[a]);
            var infowindow = new google.maps.InfoWindow({
                content: '<div class="mapModal"><h3>'+shopName[a]+'</h3><p>'+address[a]+'</p>'+shopLink[a]+'</div>',
                maxWidth: 300
            });
            a++;
            google.maps.event.addListener(marker, 'click', function() {
            infowindow.open(map,marker);
            google.maps.event.addDomListener(window, 'load', initialize);
          });
          } else {
            alert('Geocode was not successful for the following reason: ' + status);
          }
          i++;
        });
      };
    }

   
    </script>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>