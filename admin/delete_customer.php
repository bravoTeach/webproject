<?php
include "../conn.php";
session_start();
include "func.php";
wa_auth();
  
  $id = "";
  if(isset($_GET["id"])){
    $id = $_GET["id"];
  }



  $sql = "DELETE FROM signup WHERE id=$id";
  $result = mysqli_query($conn, $sql);

  if (mysqli_query($conn, $sql)) {
   echo "<script>alert('delete successfully');
     window.location.href ='customer.php'</script>";
    mysqli_close($conn);
    header('Location: https://localhost/arraysystemslimited/admin/customer.php');
  } else {
    echo "Error deleting record: " . mysqli_error($conn);
  }


?>