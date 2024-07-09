<?php
include "conn.php";
session_start();

  
  $id = "";
  if(isset($_GET["id"])){
    $id = $_GET["id"];
  }



  $sql = "DELETE FROM invoice WHERE id=$id";
  $result = mysqli_query($conn, $sql);

  if (mysqli_query($conn, $sql)) {
    // echo "Record deleted successfully";
    echo "<script>alert('delete successfully');
     window.location.href ='payable.php'</script>";
    mysqli_close($conn);
    // header('Location: https://dashboard.selectdigitizing.com/admin/quoterecords.php');
  } else {
    echo "Error deleting record: " . mysqli_error($conn);
  }


?>