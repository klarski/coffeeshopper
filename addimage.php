<?php
$user="root";
$pass="root";
$dbh = new PDO('mysql:host=localhost;dbname=coffeeshopper;port=8889', $user, $pass);

$id=$_GET['id'];
$shopId=$id;
// $name=$_GET['name'];

$uploadDir = 'uploads/';

if ($_SERVER['REQUEST_METHOD']=='POST') {
  setImg();
  $shopId=$_POST['shopId'];
  $imgUrl=$_FILES['userfile']['name'];
  $filePath = $uploadDir.$imgUrl;
  $stmt=$dbh->prepare('INSERT INTO shop_images(shopId, image_file) values(:shopId, :image_file);');
  $stmt->bindParam(':shopId',$shopId);
  $stmt->bindParam(':image_file',$filePath);
  $stmt->execute();
  echo "Thank you";
}

function setImg(){
      $type = str_replace("image/", ".", $_FILES['userfile']['type']);

      if ($type == ".jpeg" || $type == ".png") {
        $setimg = "uploads/";
        $imgName = $_FILES['userfile']['name'];
        $tmp= $_FILES['userfile']['tmp_name'];
        $img = $setimg.$imgName;
        move_uploaded_file($tmp, $img);
        return $img;
         }else{
        echo "<h1>Nope</h1>";
        // $img = "img/fail.jpg";
        // return $img;
      }
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

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

<?php
echo '<form action="addimage.php" method="POST" enctype="multipart/form-data">';
echo '<h3>Select image to upload:</h3>';
echo '<input name="userfile" id="userfile" type="file">';
echo '<input name="shopId" id="shopId" type="text" value="'.$id.'"hidden>';
echo '<input class="my-btn" type="submit" value="Upload Image" name="submit">';
echo '</form>';
?>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>