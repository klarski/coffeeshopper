<?php
$user="root";
$pass="root";
$dbh = new PDO('mysql:host=localhost;dbname=coffeeshopper;port=8889', $user, $pass);

$id=$_GET['id'];
$stmt=$dbh->prepare("UPDATE shops SET statusId = 1  WHERE shopId in (:id) ");
$stmt->bindParam(':id', $id);
$stmt->execute();
header('Location: admindash.php');
die();
?>