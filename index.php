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

    <div class="jumbotron">
      <div class="container">
        <div class="col-md-6">
          <h1>COFFEESHOPPER</h1>
          <h3>Check out coffee shops in your city now.</h3>
        </div>
        <div class="col-md-5 col-md-offset-1">
          <form name="jump">
            <div class="form-group">
              <select name="menu" class="form-control">
                <option value="#" selected>SELECT A CITY</option>
                <option value="atlanta.html">Atlanta</option>
                <option value="newyork.html">New York</option>
                <option value="sanfran.html">San Francisco</option>
              </select>
            </div>
            <button type="button" onClick="location=document.jump.menu.options[document.jump.menu.selectedIndex].value;" class="my-btn btn-block">SEARCH</button>
            </form>
        </div>
      </div>
    </div>

    <div id="cta-info" class="row">
        <div class="col-md-4 cta-box cta-out">
          <div class="container-fluid">
            <img width="150" src="images/home1.png"/>
            <p>Leave your own reviews and read what others have to say.<p>
          </div>
        </div>

        <div class="col-md-4 cta-box cta-in">
          <div class="container-fluid">
            <img width="150" src="images/home2.png"/>
            <p>Find your favorite coffee shops or explore new ones in you city.</p>
          </div>
        </div>

        <div class="col-md-4 cta-box cta-out">
          <div class="container-fluid">
            <img width="150" src="images/home3.png"/>
            <p>Add new shops and update details about shops.</p>
          </div>
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
      <button class="col-md-2 my-btn" onClick="window.location.href='admin.html'">ADMIN LOGIN</button>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>