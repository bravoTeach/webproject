<?php
include "../conn.php";
session_start();
include "func.php";
wa_auth();
  
  $id = "";
  if(isset($_GET["id"])){
    $id = $_GET["id"];
  }



  $sql = "DELETE FROM placevector WHERE id=$id";
  $result = mysqli_query($conn, $sql);

  if (mysqli_query($conn, $sql)) {
    // echo "Record deleted successfully";
     echo "<script>alert('delete successfully');
     window.location.href ='vectorrecords.php'</script>";
    
    // header('Location:https://localhost/arraysystemslimited/admin/vectorrecords.php');
    
    mysqli_close($conn);
  } else {
    echo "Error deleting record: " . mysqli_error($conn);
  }


?>