<?php
session_start();
include "func.php";
wa_auth();
include "../conn.php";


if(isset($_GET['id']) AND intval($_GET['id']) > 0){
  $id = $_GET['id'];

  $sql = "UPDATE invoice 
        SET 
          `status`='paid',
          `date`=CURDATE()
        WHERE id = $id";

  $result = mysqli_query($conn, $sql);
  if($result){
echo "<script>alert('Invoice Verified')</script>";
echo "<meta http-equiv='refresh' content='0; url=invoice_verification.php'>";

    
  }
  else{
echo "<script>alert('Error while verifying the image!')</script>";


  }


}