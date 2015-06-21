<?php
$user="root";
$pass="root";
$dbh = new PDO('mysql:host=localhost;dbname=coffeeshopper;port=8889', $user, $pass);
include('times.php');

session_start(); 

$name=$_GET['name'];
$stmt=$dbh->prepare('SELECT shopId FROM shops WHERE shop_name= :name');
  $stmt->bindParam(':name',$name);
  $stmt->execute();
  $result = $stmt->fetchall(PDO::FETCH_ASSOC);
  foreach  ($result as $row) {
  $id=$row['shopId'];
};



if ($_SERVER['REQUEST_METHOD']=='POST') {

  $stmt=$dbh->prepare('SELECT shopId FROM shops WHERE shop_name= :name');
  $stmt->bindParam(':name',$name);
  $stmt->execute();
  $result = $stmt->fetchall(PDO::FETCH_ASSOC);
  foreach  ($result as $row) {
  $id=$row['shopId'];
  

  if(isset($_POST['monday']) && $_POST['monday'] == 'MONDAY'){  
  $monday=$_POST['monday'];
  $monday_open=$_POST['monday_open'];
  $monday_close=$_POST['monday_close'];
  $shopId=$id;
  $stmt=$dbh->prepare('INSERT INTO shop_hours(day_of_week, time_open, time_closed, shopId) values(:day_of_week, :time_open, :time_closed, :shopId);');
  $stmt->bindParam(':day_of_week',$monday);
  $stmt->bindParam(':time_open',$monday_open);
  $stmt->bindParam(':time_closed',$monday_close);
  $stmt->bindParam(':shopId',$shopId);
  $stmt->execute();
  };

  if(isset($_POST['tuesday']) && $_POST['tuesday'] == 'TUESDAY'){
  $tuesday=$_POST['tuesday'];
  $tuesday_open=$_POST['tuesday_open'];
  $tuesday_close=$_POST['tuesday_close'];
  $shopId=$id;
  $stmt=$dbh->prepare('INSERT INTO shop_hours(day_of_week, time_open, time_closed, shopId) values(:day_of_week, :time_open, :time_closed, :shopId);');
  $stmt->bindParam(':day_of_week',$tuesday);
  $stmt->bindParam(':time_open',$tuesday_open);
  $stmt->bindParam(':time_closed',$tuesday_close);
  $stmt->bindParam(':shopId',$shopId);
  $stmt->execute();
  };

  if(isset($_POST['wednesday']) && $_POST['wednesday'] == 'WEDNESDAY'){
  $wednesday=$_POST['wednesday'];
  $wednesday_open=$_POST['wednesday_open'];
  $wednesday_close=$_POST['wednesday_close'];
  $shopId=$id;
  $stmt=$dbh->prepare('INSERT INTO shop_hours(day_of_week, time_open, time_closed, shopId) values(:day_of_week, :time_open, :time_closed, :shopId);');
  $stmt->bindParam(':day_of_week',$wednesday);
  $stmt->bindParam(':time_open',$wednesday_open);
  $stmt->bindParam(':time_closed',$wednesday_close);
  $stmt->bindParam(':shopId',$shopId);
  $stmt->execute();
  };

  if(isset($_POST['thursday']) && $_POST['thursday'] == 'THURSDAY'){
  $thursday=$_POST['thursday'];
  $thursday_open=$_POST['thursday_open'];
  $thursday_close=$_POST['thursday_close'];
  $shopId=$id;
  $stmt=$dbh->prepare('INSERT INTO shop_hours(day_of_week, time_open, time_closed, shopId) values(:day_of_week, :time_open, :time_closed, :shopId);');
  $stmt->bindParam(':day_of_week',$thursday);
  $stmt->bindParam(':time_open',$thursday_open);
  $stmt->bindParam(':time_closed',$thursday_close);
  $stmt->bindParam(':shopId',$shopId);
  $stmt->execute();
  };

  if(isset($_POST['friday']) && $_POST['friday'] == 'FRIDAY'){
  $friday=$_POST['friday'];
  $friday_open=$_POST['friday_open'];
  $friday_close=$_POST['friday_close'];
  $shopId=$id;
  $stmt=$dbh->prepare('INSERT INTO shop_hours(day_of_week, time_open, time_closed, shopId) values(:day_of_week, :time_open, :time_closed, :shopId);');
  $stmt->bindParam(':day_of_week',$friday);
  $stmt->bindParam(':time_open',$friday_open);
  $stmt->bindParam(':time_closed',$friday_close);
  $stmt->bindParam(':shopId',$shopId);
  $stmt->execute();
  };

  if(isset($_POST['saturday']) && $_POST['saturday'] == 'SATURDAY'){
  $saturday=$_POST['saturday'];
  $saturday_open=$_POST['saturday_open'];
  $saturday_close=$_POST['saturday_close'];
  $shopId=$id;
  $stmt=$dbh->prepare('INSERT INTO shop_hours(day_of_week, time_open, time_closed, shopId) values(:day_of_week, :time_open, :time_closed, :shopId);');
  $stmt->bindParam(':day_of_week',$saturday);
  $stmt->bindParam(':time_open',$saturday_open);
  $stmt->bindParam(':time_closed',$saturday_close);
  $stmt->bindParam(':shopId',$shopId);
  $stmt->execute();
  };

  if(isset($_POST['sunday']) && $_POST['sunday'] == 'SUNDAY'){
  $sunday=$_POST['sunday'];
  $sunday_open=$_POST['sunday_open'];
  $sunday_close=$_POST['sunday_close'];
  $shopId=$id;
  $stmt=$dbh->prepare('INSERT INTO shop_hours(day_of_week, time_open, time_closed, shopId) values(:day_of_week, :time_open, :time_closed, :shopId);');
  $stmt->bindParam(':day_of_week',$sunday);
  $stmt->bindParam(':time_open',$sunday_open);
  $stmt->bindParam(':time_closed',$sunday_close);
  $stmt->bindParam(':shopId',$shopId);
  $stmt->execute();
  };
  header('Location:addshop3.php?id='.$id);
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

  <div class="purple" id="login">
    <div class="container">
      <h1 class="white-text">ADD A SHOP</h1>

      <?php
      echo '<form action="addshop2.php?id='.$id.'&name='.$name.'" method="POST">'
      ?>
        <div class="white-text">
          <label class="white-text" for="hours">HOURS:</label></br>

          <div class="form-inline hours">
            <label class="checkbox-inline">
            <input type="checkbox" id="monday" name="monday" value="MONDAY"> MONDAY
            </label>
            <select class="form-control" id="monday_open" name="monday_open" required/>
              <?php echo $openTimes; ?>
            </select>
            <select class="form-control" id="monday_close" name="monday_close" required/>
              <?php echo $closeTimes; ?>
            </select>
          </div>

          <div class="form-inline hours">
            <label class="checkbox-inline">
            <input type="checkbox" id="tuesday" name="tuesday" value="TUESDAY"> TUESDAY
            </label>
            <select class="form-control" id="tuesday_open" name="tuesday_open"  required/>
              <?php echo $openTimes; ?>
            </select>
            <select class="form-control"  id="tuesday_close" name="tuesday_close"required/>
              <?php echo $closeTimes; ?>
            </select>
          </div>

          <div class="form-inline hours">
            <label class="checkbox-inline">
            <input type="checkbox" id="wednesday" name="wednesday" value="WEDNESDAY"> WEDNESDAY
            </label>
            <select class="form-control"  id="wednesday_open" name="wednesday_open"  required/>
              <?php echo $openTimes; ?>
            </select>
            <select class="form-control" id="wednesday_close" name="wednesday_close" required/>
              <?php echo $closeTimes; ?>
            </select>
          </div>

          <div class="form-inline">
            <label class="checkbox-inline">
            <input type="checkbox" id="thursday" name="thursday" value="THURSDAY"> THURSDAY
            </label>
            <select class="form-control"  id="thursday_open" name="thursday_open"  required/>
              <?php echo $openTimes; ?>
            </select>
            <select class="form-control"  id="thursday_close" name="thursday_close" required/>
              <?php echo $closeTimes; ?>
            </select>
          </div>

          <div class="form-inline hours">
            <label class="checkbox-inline">
            <input type="checkbox" id="friday" name="friday" value="FRIDAY"> FRIDAY
            </label>
            <select class="form-control"  id="friday_open" name="friday_open"  required/>
              <?php echo $openTimes; ?>
            </select>
            <select class="form-control" id="friday_close" name="friday_close" required/>
              <?php echo $closeTimes; ?>
            </select>
          </div>

          <div class="form-inline hours">
            <label class="checkbox-inline">
            <input type="checkbox" id="saturday" name="saturday" value="SATURDAY"> SATURDAY
            </label>
            <select class="form-control"  id="saturday_open" name="saturday_open"  required/>
              <?php echo $openTimes; ?>
            </select>
            <select class="form-control"  id="saturday_close" name="saturday_close" required/>
              <?php echo $closeTimes; ?>
            </select>
          </div>

          <div class="form-inline hours">
            <label class="checkbox-inline">
            <input type="checkbox" id="sunday" name="sunday" value="SUNDAY"> SUNDAY
            </label>
            <select class="form-control"  id="sunday_open" name="sunday_open" required/>
              <?php echo $openTimes; ?>
            </select>
            <select class="form-control"  id="sunday_close" name="sunday_close" required/>
              <?php echo $closeTimes; ?>
            </select>
          </div>

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
      <button class="col-md-2 my-btn" onClick="window.location.href='admin.html'">ADMIN LOGIN</button>
      </div> 
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>