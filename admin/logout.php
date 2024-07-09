<?php   
// session_name('admin_session');
session_start(); //to ensure you are using same session
      
      unset($_SESSION["admin_name"]);
      unset($_SESSION["email"]);
      unset($_SESSION["id"]);
      
//session_destroy(); //destroy the session
header('Location: https://localhost/arraysystemslimited/admin/login.php');

exit();
?>