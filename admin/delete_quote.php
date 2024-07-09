<?php
include "../conn.php";
session_start();
include "func.php";
wa_auth();
  
  $id = "";
  if(isset($_GET["id"])){
    $id = $_GET["id"];
  }



  $sql = "DELETE FROM placequote WHERE id=$id";
  $result = mysqli_query($conn, $sql);

  if (mysqli_query($conn, $sql)) {
    // echo "Record deleted successfully";
    echo "<script>alert('delete successfully');
     window.location.href ='quoterecords.php'</script>";
    mysqli_close($conn);
    // header('Location: https://localhost/arraysystemslimited/admin/quoterecords.php');
  } else {
    echo "Error deleting record: " . mysqli_error($conn);
  }


?>