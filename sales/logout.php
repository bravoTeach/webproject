<?php   
// session_name('admin_session');
session_start(); //to ensure you are using same session
      
      unset($_SESSION["salesuser"]);
      unset($_SESSION["salespass"]);
      unset($_SESSION["salesid"]);
      
//session_destroy(); //destroy the session
header('Location: https://dashboard.selectdigitizing.com/sales/login.php');

exit();
?>