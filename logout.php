<?php
 session_start();
 header('Location:login.php');

  echo "Logout Successfully ";
  session_destroy();   // function that Destroys Session 

?>
