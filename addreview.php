<?php
$user="root";
$pass="root";
$dbh = new PDO('mysql:host=localhost;dbname=coffeeshopper;port=8889', $user, $pass);

$id=$_GET['id'];
$shopId=$id;
$username=$_GET['username'];

// session_start(); 


if ($_SERVER['REQUEST_METHOD']=='POST') {
  if(isset($_POST)){
  $stmt = $dbh->prepare('SELECT userId FROM users WHERE username=:username;');
  $stmt->bindParam(':username',$username);
  $stmt->execute();
  $result = $stmt->fetchall(PDO::FETCH_ASSOC);
      foreach  ($result as $row) {
        $uid=$row['userId'];
    } 
  }
  $shopId=$_POST['shopId'];
  $userId=$uid;
  $review=$_POST['review'];
  $atmos_rating=$_POST['atmos_rating'];
  $taste_rating=$_POST['taste_rating'];
  $review_date=date('Y-m-d');;
  $stmt=$dbh->prepare('INSERT INTO reviews(shopId, userId, review, atmos_rating, taste_rating, review_date) values(:shopId, :userId, :review, :atmos_rating, :taste_rating, :review_date);');
  $stmt->bindParam(':shopId',$shopId);
  $stmt->bindParam(':userId',$userId);
  $stmt->bindParam(':review',$review);
  $stmt->bindParam(':atmos_rating',$atmos_rating);
  $stmt->bindParam(':taste_rating',$taste_rating);
  $stmt->bindParam(':review_date',$review_date);
  $stmt->execute();
  header('Location:reviewthanks.php');
}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Bootstrap -->
    <link href='http://fonts.googleapis.com/css?family=Josefin+Sans:400,600,700' rel='stylesheet' type='text/css'>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">

    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>

    <!-- Add fancyBox -->
    <link rel="stylesheet" href="fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
    <script type="text/javascript" src="fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>

    <!-- Optionally add helpers - button, thumbnail and/or media -->
    <link rel="stylesheet" href="fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
    <script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
    <script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>

    <link rel="stylesheet" href="/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container popup">

<?php
  echo '<h2>WRITE A REVIEW:</h2>';
  echo '<form action="addreview.php?id='.$id.'&username='.$username.'" method="POST" enctype="multipart/form-data">';
  echo '<div class="form-group">';
  echo '<label>ATMOSPHERE:</label>';
  echo '<select class="form-control" id="atmos_rating" name="atmos_rating" required>';
  echo '<option value="5" >5 Stars</option>';
  echo '<option value="4" >4 Stars</option>';
  echo '<option value="3" >3 Stars</option>';
  echo '<option value="2" >2 Stars</option>';
  echo '<option value="1" >1 Stars</option></select>';
  echo '</div>';
  echo '<div class="form-group">';
  echo '<label>TASTE:</label>';
  echo '<select class="form-control" id="taste_rating" name="taste_rating" required>';
  echo '<option value="5" >5 Stars</option>';
  echo '<option value="4" >4 Stars</option>';
  echo '<option value="3" >3 Stars</option>';
  echo '<option value="2" >2 Stars</option>';
  echo '<option value="1" >1 Stars</option></select>';
  echo '</div>';
  echo '<div class="from-group">';
  echo '<label>WRITE REVIEW:</label>';
  echo '<textarea class="form-control" name="review" id="review">Enter text here...</textarea>';
  echo '<div>';
  echo '<input name="shopId" id="shopId" type="text" value="'.$id.'"hidden>';
  echo '<input class="my-btn popup-btn" type="submit" value="Submit Review" name="submit">';
  echo '</form>';
?>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>