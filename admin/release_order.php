<?php
$mailBody = "";

include "../conn.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';
session_start();
include "func.php";
wa_auth();
// error_reporting();


$id = "";
if(isset($_GET["id"])){
  $id = $_GET["id"];
}
$sql2 = "SELECT * FROM placeorder where id = '$id'";
$result2 = mysqli_query($conn,$sql2);

if (mysqli_num_rows($result2) > 0) {
  // output data of each row

while($row = mysqli_fetch_assoc($result2)) {
$email= $row["email"];
$name = $row['name'];
$required = $row['required'];
$height = $row['height'];
$width = $row['width'];
$fabric = $row['fabric'];
$placement = $row['placement'];
$color = $row['color'];
$ins = $row['ins'];
$user = $row['user'];



// echo $email;
}}
else {
  // echo "0 results";
}


$sql4 = "SELECT * FROM signup where email = '$email'";
$result4 = mysqli_query($conn,$sql4);

if (mysqli_num_rows($result4) > 0) {
  // output data of each row

while($row = mysqli_fetch_assoc($result4)) {
$cus_name1= $row["name"];
}}
else{
    

}



?>

<?php
include "../conn.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Release Order</title>
</head>
<body>
  <form action="release_order.php" method="POST" enctype="multipart/form-data">
  <div class="mb-3">
 Attachment 1:
 <br>
 Upload Multiple Images from Here
 <br>
 Maximum Size Limit 5MB
    <input type="file" name="images[]" multiple required>
  </div>
<br>

  <label for="">Total Amount:</label>
  <input type="text" name="price">
  <br>
  <label for="">Total Stiches:</label>
  <input type="text" name="stich">
  <input type="hidden" name="orderid" value='<?=$id?>'>
  <input type="hidden" name="email" value='<?=$email?>'>
  <input type="hidden" name="name1" value='<?=$name?>'>
  <input type="hidden" name="required" value='<?=$required?>'>
  <input type="hidden" name="height" value='<?=$height?>'>
  <input type="hidden" name="width" value='<?=$width?>'>
  <input type="hidden" name="color" value='<?=$color?>'>
  <input type="hidden" name="ins" value='<?=$ins?>'>
  <input type="hidden" name="fabric" value='<?=$fabric?>'>
  <input type="hidden" name="user" value='<?=$user?>'>
  <input type="hidden" name="placement" value='<?=$placement?>'>
  <input type="hidden" name="cusname" value='<?=$cus_name1?>'>
  <input type="hidden" name="id" value='<?=$id?>'>



  <br><br>
  <button type="submit" name="submit" value="upload">upload</button>

  


  </form>
  <?php

if(isset($_POST['submit'])){
$i ;

  for($i = 0; $i < count($_FILES['images']['name']); $i++)
  {
    $image_name=$_FILES['images']['name'][$i];
    $image_tmp_name=$_FILES['images']['tmp_name'][$i];
    $image_type=$_FILES['images']['type'][$i];
    $image_size=$_FILES['images']['size'][$i];
    $folder = "../upload/";
//     if(strtolower($image_type)=="image/jpg"||strtolower($image_type)=="image/jpeg"||strtolower($image_type)=="image/png"||strtolower($image_type)=="image/dst"||strtolower($image_type)=="image/emb"||strtolower($image_type)=="image/cnd"||strtolower($image_type)=="image/dsb"||strtolower($image_type)=="image/dsz"||strtolower($image_type)=="image/emb-6"||strtolower($image_type)=="image/emb-8"||strtolower($image_type)=="image/exp"||strtolower($image_type)=="image/jef"||strtolower($image_type)=="image/ksm"||strtolower($image_type)=="image/pes"||strtolower($image_type)=="image/pof"||strtolower($image_type)=="image/tap"||strtolower($image_type)=="image/xxx"||strtolower($image_type)=="image/ofm"||strtolower($image_type)=="image/pxf"||strtolower($image_type)=="image/hus"||strtolower($image_type)=="image/100")
// {
  if($image_size < 5000000){
    // $folder = $folder.$image_name;
        $folder2 =$image_name;
    $folder1 = $folder.$image_name;
    move_uploaded_file($image_tmp_name,$folder1);
    $orderid = $_POST['orderid']; 
    $email = $_POST['email']; 
    $price = $_POST['price']; 
    $name1 = $_POST['name1']; 
    $required = $_POST['required']; 
    $ins = $_POST['ins']; 
    $width = $_POST['width']; 
    $height = $_POST['height']; 
    $fabric = $_POST['fabric']; 
    $placement = $_POST['placement']; 
    $color = $_POST['color']; 
$cusname = $_POST['cusname'];
$user = $_POST['user'];
$stich = $_POST['stich'];
$id = $_POST['id'];


    $query = "INSERT into release_order (orderid,email,price,image1,stich,ordername,user) VALUES ('$orderid','$email','$price','$folder2','$stich','$name1','$user')";
$run = mysqli_query($conn,$query);
$img1 = "https://localhost/arraysystemslimited/upload/$image_name";
$mailBody .= "<a href='$img1'>For Image Click Here!.</a>   :   ";




$sql1 = "UPDATE placeorder 
    SET 
      `status`='release' 


 WHERE id='$id'";
 $run1 = mysqli_query($conn,$sql1);


//   if (mysqli_query($conn, $sql1)) {
//     $is_insert = true;

    
    

//   } else {
//     $is_insert = false;
//     $msg = "Error: " . $sql . "<br>" . mysqli_error($conn);
//   }
  
  }
  else{
echo "<script>alert('image size')</script>";

  }

  }


  

$mail = new PHPMailer();

// Set up the SMTP server and authentication details
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'jibranahmed1752@gmail.com';
$mail->Password = 'owbkskfafhxfglal';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

// Set up the email details
$mail->setFrom('jibranahmed1752@gmail.com');
$mail->addAddress($email);
$mail->addAddress('jibranahmed1752@gmail.com');
$mail->Subject = "Your Order# OR-1".$orderid."(".$name1.") is Ready";
// $subject = "Your Order#".$orderid." is Ready";
$mail->Body = 'Dear '.$cusname.'<br>'.
'Please find the attached digitizing files. You can also download files or send revisions under Order Records after signing into your account at our website .com


   <h2>Design Order Details:</h2><table style="border-collapse: collapse; width: 50%;"><tr><td style="border: 1px solid black; padding: 3px;">Design Name/PO</td><td style="border: 1px solid black; padding: 5px;">'.$name1.'</td></tr><tr><td style="border: 1px solid black; padding: 5px;">Required Format</td><td style="border: 1px solid black; padding: 5px;">'.$required.'</td></tr><tr><td style="border: 1px solid black; padding: 5px;">Width</td><td style="border: 1px solid black; padding: 5px;">'.$width.'</td></tr><tr><td style="border: 1px solid black; padding: 5px;">Height</td><td style="border: 1px solid black; padding: 5px;">'.$height.'</td></tr><tr><td style="border: 1px solid black; padding: 5px;">Fabric</td><td style="border: 1px solid black; padding: 5px;">'.$fabric.'</td></tr><tr><td style="border: 1px solid black; padding: 5px;">Placement</td><td style="border: 1px solid black; padding: 5px;">'.$placement.'</td></tr><tr><td style="border: 1px solid black; padding: 5px;">No of Colors</td><td style="border: 1px solid black; padding: 5px;">'.$color.'</td></tr><tr><td style="border: 1px solid black; padding: 5px;">Addtional Instructions</td><td style="border: 1px solid black; padding: 5px;">'.$ins.'</td></tr><tr><td style="border: 1px solid black; padding: 5px;">Price (USD)</td><td style="border: 1px solid black; padding: 5px;">'.$price.'</td></tr><tr><td style="border: 1px solid black; padding: 5px;">Stich</td><td style="border: 1px solid black; padding: 5px;">'.$stich.'</td></tr></table>



   Please do contact us if you have further questions and concerns.<br>
    Best Regards,<br>
    Team Array Limited<br>
    Tel: (915) 266-4883<br>
    Email: jibranahmed1752@gmail.com<br>
    URL: www.com';
    $mail->isHTML(true); 

// Loop through each uploaded file and add it as an attachment
if (isset($_FILES['images'])) {
    $files = $_FILES['images'];
    for ($i = 0; $i < count($files['name']); $i++) {
        $tmpName = $files['tmp_name'][$i];
        $name = $files['name'][$i];
        $path = '../upload/' . $name;
        if (!$mail->addAttachment($path, $name)) {
            echo 'Error attaching file: ' . $mail->ErrorInfo;
        }
        // $mail->addAttachment($tmpName, $name);
        // echo 'Error attaching file: ' . $mail->ErrorInfo;
    }
}

// Send the email
if ($mail->send()) {
    // echo 'Email sent successfully';
} else {
    echo 'Error sending email: ' . $mail->ErrorInfo;
}


echo "<meta http-equiv='refresh' content='0'>";


             


             


$get = "SELECT * FROM release_order WHERE orderid = $orderid";
$result3 = mysqli_query($conn,$get);
echo "<script>alert('Order release');
     window.location.href ='pending_orders.php'</script>";



}


?>