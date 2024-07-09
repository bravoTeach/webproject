<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Vector</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/styling.css">
    <style>
        .midcontent{
            padding-left: 130px;
        }
        .midcontent h4{
            padding-left: 130px;
        }
        .butn a button{
            width: 100%;
            border-top-color: #28597a;
    background: #28597a;
    color: #ccc;
        }
        .imgname{
            padding-left: 20px;

        }
        .imgname a{
            text-decoration: none;
    color: #000000;

            
        }
        .header a{
            text-decoration: none;
    color: #000000;
    font-weight: 700;

        }
        .sep{
            height: 20px;
            background-color: #F1F1F1;
        }
    </style>
</head>
<body>
    <?php

include "conn.php";

if(isset($_GET['id']) AND intval($_GET['id']) > 0){
    $id = $_GET['id'];
  
    $sql = "SELECT * FROM placevector WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
  
       while($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $name = $row['name'];
        $required = $row['required'];
        // $height = $row['height'];
        // $width = $row['width'];
        // $fabric = $row['fabric'];
        // $placement = $row['placement'];
        $color = $row['color'];
        $ins = $row['ins'];
        $edit1 = $row['edit'];
        $email = $row['email'];
        // $user = $row['user'];

  
        
       
       
        
      }
    } else {
      // header('Location: https://https://dashboard.selectdigitizing.com/cus_order_records.php');
    }
  }
  else{
  //   header('Location: https://https://dashboard.selectdigitizing.com/cus_order_records.php');
  }
  if (empty($edit1)){
      $editf = 1;
  
  }
  else{
  $editf = $edit1+1;
  }

    ?>
    <section>
    <div class="container">
        <div class="row">
<div class="col-lg-1"></div>
            <!-- <div class="col-lg-10"><img src="images/logobar_top.jpg" alt=""></div> -->
<div class="col-lg-1"></div>

            </div>
    </section>
    <section class="midcontent">

    
   

<br><br>
        
        <div class="row">
            <div class="col-lg-4"><img src="images/Logo-03.png" alt="" height="100px" width="200px"></div>
            <div class="col-lg-4"></div>
            <div class="col-lg-1"></div>

            <div class="col-lg-3 header"> <a href="">My Account</a> | <a href="logout_cus.php">Logout</a></div>
        </div>
    </div>
    </section>
    <br>
    <br>
<div class="">
    <div class="container sep"></div>
</div>
    <section class="midcontent">
        <div class="container">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <h4>Welcome <?php echo $_SESSION['cus_name'] ?> , every thing looks good!</h4>
                </div>
                <div class="col-lg-2"></div>

            </div>
        </div>
    </section>
 
<br>
    <section class="midcontent">
        <div class="container">
            <div class="row">
        <div class="col-lg-3 ">
        <div class="d-grid gap-2 col-7 mx-auto butn" >
        <div><a href="index.php"><button class="btn btn-primary " >Home</button></a></div>
                <div><a href="place_quote.php"><button class="btn btn-primary ">Place Quote</button></a></div>
                <div><a href="cus_quote_records.php?id=<?php echo $_SESSION['id'] ;?>"><button class="btn btn-primary">Quote Records</button></a></div>
                <div><a href="order.php"><button class="btn btn-primary ">Place Order</button></a></div>
                <div><a href="cus_order_records.php?id=<?php echo $_SESSION['id'] ;?>"><button class="btn btn-primary">Order Records</button></a></div>
                <div><a href="place_vector.php"><button class="btn btn-primary">Place Vector</button></a></div>
                <div><a href="cus_vector_records.php?id=<?php echo $_SESSION['id'] ;?>"><button class="btn btn-primary">Vector Records</button></a></div>
                <div><a href="invoice.php?id=<?php echo $_SESSION['id'] ;?>"><button class="btn btn-primary">Invoice</button></a></div>
                <div><a href="cus_profile.php?id=<?php echo $_SESSION['id'] ;?>"><button class="btn btn-primary">My Profile</button></a></div>
                <div><a href="CheckOut.php"><button class="btn btn-primary">Pay Now</button></a></div>
                <div><a href="logout_cus.php"><button class="btn btn-primary">Logout</button></a></div>


                </div>  
        </div>
        <div class="col-lg-8">
            <div class="row">
            <form action="edit_vector.php" method="POST" enctype="multipart/form-data">
  <!-- Name input -->
  <div class="form-outline ">
  <tr>
        <td height="35" class="form_left_text"> Order Name / PO: </td>
        <td height="35" class="form_left_text"> <?php echo $name;?> </td>
  <input type="hidden" name="name" class="user-passbox4" value="<?php echo "(VE: 1".$id.")".$name;?>" id="name" size="51" >


        <!-- <td height="25" colspan="2" class="form">
          <input name="name" class="user-passbox4" id="name" size="51" required>
          <span class="green">*</span></td> -->
      </tr></div>
      <br>

  <!-- Email input -->
  <div class="form-outline ">
  
  <label for="required">Required Format:</label>
  <label for="required"><?php echo $required;?>:</label>
  <input type="hidden" name="required" class="user-passbox4" value="<?php echo $required;?>" id="required" size="51" >



      </div>
      <br>

   <!-- Email input -->
   <!-- <div class="form-outline ">
  <tr>
        <td height="35" class="form_left_text"> Height: </td>
        <td height="25" colspan="2" class="form">
          <input name="height" class="user-passbox4" value="<?php echo $height;?>" id="height" size="40" >
          <span class="green"></span></td>
      </tr></div>
      <br> -->

   <!-- Email input -->
   <!-- <div class="form-outline ">
  <tr>
        <td height="35" class="form_left_text"> Width: </td>
        <td height="25" colspan="2" class="form">
          <input name="width" class="user-passbox4" value="<?php echo $width;?>" id="width" size="51" >
          <span class="green"></span></td>
      </tr></div>
      <br> -->
  <!-- Email input -->
  <!-- <div class="form-outline ">

  <label for="fabric">Fabric:</label>
  <label for="fabric"><?php echo $fabric;?></label>
<input type="hidden" value="<?php echo $fabric;?>" name="fabric" >


      </div>
      <br> -->
        <!-- Email input -->
  <!-- <div class="form-outline ">
    <label for="placement">Placement:</label>
  <label for="fabric"><?php echo $placement;?></label>
<input type="hidden" value="<?php echo $placement;?>" name="placement" >


      </div>
      <br> -->
   <!-- Email input -->
   <div class="form-outline ">
  <tr>
        <td height="35" class="form_left_text"> Number of colors: </td>
        <td height="35" class="form_left_text"> <?php echo  $color;?> </td>
<input type="hidden" value="<?php echo $color;?>" name="color" >


       
      </tr></div>
      <br>

     <!-- Message input -->
  <div class="form-outline ">
  <label class="form-label" for="form4Example3">Additional Instruction:</label>

    <textarea class="form-control" id="ins" name=" ins" rows="4" ></textarea>
     <br>
    <label class="form-label" for="form4Example3"><mark>Please use (inch) for measurement instead of (')</mark></label>

  </div>
  <br>

<input type="hidden" value="<?php echo $_SESSION['cus_email'] ;?>" name="email" >
<input type="hidden" value="<?php echo $_SESSION['cus_name'] ;?>" name="user" >
<input type="hidden" value="<?php echo $_SESSION['name_cus'] ;?>" name="name_cus" >
<input type="hidden" value="<?php echo $id ;?>" name="idd" >
<input type="hidden" value="in process" name="status" >

<Label><h4>Maximum image size 5MB</h4></Label>


  <div class="mb-3">
Attachment 1:
    <input type="file" name="file" >
  </div>
<!--   
  <div class="mb-3">
  Attachment 2:
    <input type="file" name="file1" >
  </div>
  <div >
  <input type="checkbox" name="urgent" value="order is urgent">
  
              Let us know if your Order is super urgent!</div> -->

  <button type="submit" name="submit"class="btn btn-primary" value="upload">upload</button>


</form>
<?php
if (empty($_POST['ins'])) {

    return false;
   }
  
  else{




    if(isset($_POST["submit"])){
   
        
       
    $name1 = $_POST['name'];
    $required1 = $_POST['required'];
    // $height1 = $_POST['height'];
    // $width1 = $_POST['width'];
    // $fabric1 = $_POST['fabric'];
    // $placement1 = $_POST['placement'];
    $ins1 = $_POST['ins'];
    $color1 = $_POST['color'];
    $user1 = $_POST['user']; 
    $email1 = $_POST['email']; 
    $status1 = $_POST['status'];
    $idd = $_POST['idd'];
        $name_cus = $_POST['name_cus']; 


    // $urgent = $_POST['urgent'];

        $image1 = $_FILES["file"]["name"];
        // $image2 = $_FILES["file1"]["name"];
    
        // Target directory to save files
        $targetDir = "upload/";
        $targetFile1 = $targetDir . basename($image1);
        // $targetFile2 = $targetDir . basename($image2);
        $uploadOk = 1;
        $imageFileType1 = strtolower(pathinfo($targetFile1,PATHINFO_EXTENSION));
        // $imageFileType2 = strtolower(pathinfo($targetFile2,PATHINFO_EXTENSION));
    
        if(!empty($image1)){
        if(!empty($image1)){
        
            $allowedTypes = array('jpg', 'jpeg', 'png', 'gif', 'pdf', 'docx', 'txt', 'cdr', 'ai', 'eps');
            if(in_array($imageFileType1, $allowedTypes)){
              
                if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile1)){
                    $image1Inserted = true;
                } else {
                    echo "Error uploading image1.";
                }
            } else {
                echo "Invalid file type for image1. Allowed file types are jpg, jpeg, and png.";
                $uploadOk = 0;
            }
        } else {
            echo "Please select an image for image1.";
            $uploadOk = 0;
        }
    



                $sql = "INSERT INTO placevector (name,required,color,ins,image,user,email,status) VALUES ('$name1','$required1','$color1','$ins1','$image1','$user1','$email1','$status1')";
                if(mysqli_query($conn, $sql)){
                
                 $last_id = mysqli_insert_id($conn);
                   $update = "UPDATE placevector SET edit = '$editf' WHERE id = '$idd'";
  if (mysqli_query($conn, $update)) {
    $is_insert = true;
  }
                
                // echo "<meta http-equiv='refresh' content='0'>";
                $img1 = "upload/$image1";
                // $img2 = "upload/$image2";
                $attachmentName = basename($image1);
                // $attachmentName1 = basename($image2); 
                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'jibranahmed1752@gmail.com';
                $mail->Password = 'owbkskfafhxfglal';
                $mail->SMTPSecure = "ssl";
                $mail->Port = '465';
                $mail->isHTML(true);


                $mail->setFrom('jibranahmed1752@gmail.com','Jibran Ahmed');
                $mail->addAddress($email1);
                $mail->addAddress('jibranahmed1752@gmail.com');

        $mail->Subject = "Revision Requested (VectorID# V-1$last_id)($name1) ";
                // $mail->Subject = 'Thanks for Placing Order at Selectdigitizing.com (OrderID# OR-1'.$last_id.')('.$name1.') ';
               $mail->Body = "<p>Dear ".$name_cus."</p>
       <p>Your edit has been placed, Your revision will be ready in next 4-6 hours time.</p>
    <p>Best Regards</p>";

            
           
    // $mail->addAttachment($img2);
    $mail->addAttachment($img1);
        
        $mail->send();
        echo "<script>alert('Revision Placed')</script>";
        echo "<meta http-equiv='refresh' content='0; URL=cus_vector_records.php'>";

        } else {
                echo "Error inserting data into database.";
            }

              
            }
            else{
              $sql = "INSERT INTO placevector (name,required,color,ins,user,email,status) VALUES ('$name1','$required1','$color1','$ins1','$user1','$email1','$status1')";
                if(mysqli_query($conn, $sql)){
                
                 $last_id = mysqli_insert_id($conn);
                   $update = "UPDATE placevector SET edit = '$editf' WHERE id = '$idd'";
  if (mysqli_query($conn, $update)) {
    $is_insert = true;
  }
                
                // echo "<meta http-equiv='refresh' content='0'>";
                // $img1 = "upload/$image1";
                // $img2 = "upload/$image2";
                // $attachmentName = basename($image1);
                // $attachmentName1 = basename($image2); 
                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'jibranahmed1752@gmail.com';
                $mail->Password = 'owbkskfafhxfglal';
                $mail->SMTPSecure = "ssl";
                $mail->Port = '465';
                $mail->isHTML(true);


                $mail->setFrom('jibranahmed1752@gmail.com','jibran Ahmed');
                $mail->addAddress($email1);
                $mail->addAddress('jibranahmed1752@gmail.com');

        $mail->Subject = "Revision Requested (VectorID# V-1$last_id)($name1) ";
                // $mail->Subject = 'Thom (OrderID# OR-1'.$last_id.')('.$name1.') ';
               $mail->Body = "<p>Dear ".$name_cus."</p>
       <p>Your edit has been placed, Your revision will be ready in next 4-6 hours time.</p>
    <p>Best Regards,<br>Tel: (915) 266-4883<br>Email: jibranahmed1752@gmail.com<br>.com<br>URL: www..com</p>";

            
           
    // $mail->addAttachment($img2);
    // $mail->addAttachment($img1);
        
        $mail->send();
        echo "<script>alert('Revision Placed')</script>";
        echo "<meta http-equiv='refresh' content='0; URL=cus_vector_records.php'>";

        } else {
                echo "Error inserting data into database.";
            }
            }
           
        }
    
    
      }
    mysqli_close($conn);
  
  
  

  

?>
        <div class="col-lg-1"></div>

        </div>
        </div>
    </section>
    
    
</body>
</html> 