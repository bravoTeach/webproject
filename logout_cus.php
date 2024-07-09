<?php   
// session_name('cus_session');
session_start(); //to ensure you are using same session

      
      unset($_SESSION["cus_name"]);
      unset($_SESSION["pass"]);
      unset($_SESSION["id"]);
      unset($_SESSION["cus_email"]);

//session_destroy(); //destroy the session
header('Location: https://localhost/arraysystemslimited/login_cus.php');

exit();
?>