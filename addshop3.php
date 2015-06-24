<?php
$user="root";
$pass="root";
$dbh = new PDO('mysql:host=localhost;dbname=coffeeshopper;port=8889', $user, $pass);

session_start(); 
$id=$_GET['id'];

if ($_SERVER['REQUEST_METHOD']=='POST') {

  if(isset($_POST['drip']) && $_POST['drip'] == 'Drip'){ 
  $drip=$_POST['drip'];
  $shopId=$id;
  $stmt=$dbh->prepare('INSERT INTO brew_methods (shopId, brew_type) values(:shopId, :brew_type);');
  $stmt->bindParam(':brew_type', $drip);
  $stmt->bindParam(':shopId', $shopId);
  $stmt->execute();
  };

  if(isset($_POST['espresso']) && $_POST['espresso'] == 'Espresso'){ 
  $espresso=$_POST['espresso'];
  $shopId=$id;
  $stmt=$dbh->prepare('INSERT INTO brew_methods (shopId, brew_type) values(:shopId, :brew_type);');
  $stmt->bindParam(':brew_type', $espresso);
  $stmt->bindParam(':shopId', $shopId);
  $stmt->execute();
  };

  if(isset($_POST['frenchpress']) && $_POST['frenchpress'] == 'French Press'){ 
  $frenchpress=$_POST['frenchpress'];
  $shopId=$id;
  $stmt=$dbh->prepare('INSERT INTO brew_methods (shopId, brew_type) values(:shopId, :brew_type);');
  $stmt->bindParam(':brew_type', $frenchpress);
  $stmt->bindParam(':shopId', $shopId);
  $stmt->execute();
  };

  if(isset($_POST['chemex']) && $_POST['chemex'] == 'Chemex'){ 
  $chemex=$_POST['chemex'];
  $shopId=$id;
  $stmt=$dbh->prepare('INSERT INTO brew_methods (shopId, brew_type) values(:shopId, :brew_type);');
  $stmt->bindParam(':brew_type', $chemex);
  $stmt->bindParam(':shopId', $shopId);
  $stmt->execute();
  };

  if(isset($_POST['aeropress']) && $_POST['aeropress'] == 'Aeropress'){ 
  $aeropress=$_POST['aeropress'];
  $shopId=$id;
  $stmt=$dbh->prepare('INSERT INTO brew_methods (shopId, brew_type) values(:shopId, :brew_type);');
  $stmt->bindParam(':brew_type', $aeropress);
  $stmt->bindParam(':shopId', $shopId);
  $stmt->execute();
  };

  if(isset($_POST['turkish']) && $_POST['turkish'] == 'Turkish'){ 
  $turkish=$_POST['turkish'];
  $shopId=$id;
  $stmt=$dbh->prepare('INSERT INTO brew_methods (shopId, brew_type) values(:shopId, :brew_type);');
  $stmt->bindParam(':brew_type', $turkish);
  $stmt->bindParam(':shopId', $shopId);
  $stmt->execute();
  };

  if(isset($_POST['pourover']) && $_POST['pourover'] == 'Pour Over'){ 
  $pourover=$_POST['pourover'];
  $shopId=$id;
  $stmt=$dbh->prepare('INSERT INTO brew_methods (shopId, brew_type) values(:shopId, :brew_type);');
  $stmt->bindParam(':brew_type', $pourover);
  $stmt->bindParam(':shopId', $shopId);
  $stmt->execute();
  };

  if(isset($_POST['pourover']) && $_POST['pourover'] == 'Pour Over'){ 
  $pourover=$_POST['pourover'];
  $shopId=$id;
  $stmt=$dbh->prepare('INSERT INTO brew_methods (shopId, brew_type) values(:shopId, :brew_type);');
  $stmt->bindParam(':brew_type', $pourover);
  $stmt->bindParam(':shopId', $shopId);
  $stmt->execute();
  };

  if(isset($_POST['coldbrew']) && $_POST['coldbrew'] == 'Cold Brew'){ 
  $coldbrew=$_POST['coldbrew'];
  $shopId=$id;
  $stmt=$dbh->prepare('INSERT INTO brew_methods (shopId, brew_type) values(:shopId, :brew_type);');
  $stmt->bindParam(':brew_type', $coldbrew);
  $stmt->bindParam(':shopId', $shopId);
  $stmt->execute();
  };

  if(isset($_POST['blend_name'])){
    if (empty($_POST['blend_name'])){
      header('Location:shopsubmitted.php');
    }else{
      $blend_name=$_POST['blend_name'];
      $blend_desc=$_POST['blend_desc'];
      $shopId=$id;
      $stmt=$dbh->prepare('INSERT INTO blends(blend_name, blend_desc, shopId) values(:blend_name, :blend_desc, :shopId);');
      $stmt->bindParam(':blend_name',$blend_name);
      $stmt->bindParam(':blend_desc',$blend_desc);
      $stmt->bindParam(':shopId', $shopId);
      $stmt->execute();
    };
  };

  if(isset($_POST['blend_name2'])){
    if (empty($_POST['blend_name'])){
      header('Location:shopsubmitted.php');
    }else{
      $blend_name2=$_POST['blend_name2'];
      $blend_desc2=$_POST['blend_desc2'];
      $shopId=$id;
      $stmt=$dbh->prepare('INSERT INTO blends(blend_name, blend_desc, shopId) values(:blend_name, :blend_desc, :shopId);');
      $stmt->bindParam(':blend_name',$blend_name2);
      $stmt->bindParam(':blend_desc',$blend_desc2);
      $stmt->bindParam(':shopId', $shopId);
      $stmt->execute();
    };
  };

  if(isset($_POST['blend_name3'])){
    if (empty($_POST['blend_name'])){
      header('Location:shopsubmitted.php');
    }else{
      $blend_name3=$_POST['blend_name3'];
      $blend_desc3=$_POST['blend_desc3'];
      $shopId=$id;
      $stmt=$dbh->prepare('INSERT INTO blends(blend_name, blend_desc, shopId) values(:blend_name, :blend_desc, :shopId);');
      $stmt->bindParam(':blend_name',$blend_name3);
      $stmt->bindParam(':blend_desc',$blend_desc3);
      $stmt->bindParam(':shopId', $shopId);
      $stmt->execute();
    };
  };

  if(isset($_POST['blend_name4'])){
    if (empty($_POST['blend_name'])){
      header('Location:shopsubmitted.php');
    }else{
      $blend_name4=$_POST['blend_name4'];
      $blend_desc4=$_POST['blend_desc4'];
      $shopId=$id;
      $stmt=$dbh->prepare('INSERT INTO blends(blend_name, blend_desc, shopId) values(:blend_name, :blend_desc, :shopId);');
      $stmt->bindParam(':blend_name',$blend_name4);
      $stmt->bindParam(':blend_desc',$blend_desc4);
      $stmt->bindParam(':shopId', $shopId);
      $stmt->execute();
    };
  };

};



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
      <h1 class="white-text">ADD A SHOP</h1>
      <?php
      echo '<form action="addshop3.php?id='.$id.'" method="POST">'
      ?>
      <div class="form-group white-text">
        <label class="white-text" for="website">METHODS OF BREWING:</label></br>
        <label class="checkbox-inline">
          <input type="checkbox" id="drip" name="drip" value="Drip"> Drip
        </label>
        <label class="checkbox-inline">
          <input type="checkbox" id="espresso" name="espresso" value="Espresso"> Espresso
        </label>
        <label class="checkbox-inline">
          <input type="checkbox" id="frenchpress" name="frenchpress" value="French Press"> French Press
        </label>
        <label class="checkbox-inline">
          <input type="checkbox" id="chemex" name="chemex" value="Chemex"> Chemex
        </label>
        <label class="checkbox-inline">
          <input type="checkbox" id="aeropress" name="aeropress" value="AeroPress"> AeroPress
        </label>
        <label class="checkbox-inline">
          <input type="checkbox" id="turkish" name="turkish" value="Turkish"> Turkish
        </label>
        <label class="checkbox-inline">
          <input type="checkbox" id="pourover" name="pourover" value="Pour Over"> Pour Over
        </label>
        <label class="checkbox-inline">
          <input type="checkbox" id="coldbrew" name="coldbrew" value="Cold Brew"> Cold Brew
        </label>
        </div>
        <div class="form-group">
        <label class="white-text" for="blend_name">BLEND NAME:</label>
        <input type="text" class="form-control" id="blend_name" name="blend_name" placeholder="Enter Blend Name" />
        </div>
         <div class="form-group">
        <label class="white-text" for="blend_desc">BLEND DESCRIPTION:</label>
        <input type="text" class="form-control" id="blend_desc" name="blend_desc" placeholder="Enter Blend Description" />
        </div>
        <div class="form-group">
        <label class="white-text" for="blend_name2">BLEND NAME:</label>
        <input type="text" class="form-control" id="blend_name2" name="blend_name2" placeholder="Enter Blend Name" />
        </div>
         <div class="form-group">
        <label class="white-text" for="blend_desc2">BLEND DESCRIPTION:</label>
        <input type="text" class="form-control" id="blend_desc2" name="blend_desc2" placeholder="Enter Blend Description" />
        </div>
        <div class="form-group">
        <label class="white-text" for="blend_name3">BLEND NAME:</label>
        <input type="text" class="form-control" id="blend_name3" name="blend_name3" placeholder="Enter Blend Name" />
        </div>
         <div class="form-group">
        <label class="white-text" for="blend_desc3">BLEND DESCRIPTION:</label>
        <input type="text" class="form-control" id="blend_desc3" name="blend_desc3" placeholder="Enter Blend Description" />
        </div>
        <div class="form-group">
        <label class="white-text" for="blend_name4">BLEND NAME:</label>
        <input type="text" class="form-control" id="blend_name4" name="blend_name4" placeholder="Enter Blend Name" />
        </div>
         <div class="form-group">
        <label class="white-text" for="blend_desc4">BLEND DESCRIPTION:</label>
        <input type="text" class="form-control" id="blend_desc4" name="blend_desc4" placeholder="Enter Blend Description" />
        </div>
        <button type="submit" class="my-btn">Next</button>
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