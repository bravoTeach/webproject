<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Place Vector</title>
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
                <div><a href="order.php"><button class="btn btn-primary">Place Order</button></a></div>
                <div><a href="cus_order_records.php?id=<?php echo $_SESSION['id'] ;?>"><button class="btn btn-primary">Order Records</button></a></div>
                <div><a href="place_vector.php"><button class="btn btn-primary active">Place Vector</button></a></div>
                <div><a href="cus_vector_records.php?id=<?php echo $_SESSION['id'] ;?>"><button class="btn btn-primary">Vector Records</button></a></div>
                <div><a href="invoice.php?id=<?php echo $_SESSION['id'] ;?>"><button class="btn btn-primary">Invoice</button></a></div>
                <div><a href="cus_profile.php?id=<?php echo $_SESSION['id'] ;?>"><button class="btn btn-primary">My Profile</button></a></div>
                <div><a href="CheckOut.php"><button class="btn btn-primary">Pay Now</button></a></div>
                <div><a href="logout_cus.php"><button class="btn btn-primary">Logout</button></a></div>

                </div>  
        </div>
        <div class="col-lg-8">
            <div class="row">
            <form action="place_vector.php" method="POST" enctype="multipart/form-data">
  <!-- Name input -->
  <div class="form-outline ">
  <tr>
        <td height="35" class="form_left_text"> Vector Name / PO: </td>
        <td height="25" colspan="2" class="form">
          <input name="name" class="user-passbox4" id="name" size="51" required>
          <span class="green">*</span></td>
      </tr></div>
      <br>

  <!-- Email input -->
  <div class="form-outline ">
  
  <label for="required">Required Format:</label>
<select name="required" >
	<option value="">Select</option>
	<option value="cdr">cdr</option>
	<option value="ai">ai</option>
	<option value="eps">eps</option>
	<option value="Others">Others</option>

</select><span class="green">*</span>
      </div>
      <br>


  <div class="form-outline ">
  <label class="form-label" for="form4Example3">Additional Instruction:</label>

    <textarea class="form-control" id="ins" name=" ins" rows="4"></textarea>
        <br>
    <label class="form-label" for="form4Example3"><mark>Please use (inch) for measurement instead of (')</mark></label>

  </div>
  <br>
  <input type="hidden" value="<?php echo $_SESSION['cus_email'] ;?>" name="email" >
    <?php
  $ref="select ref from signup where email = '{$_SESSION['cus_email']}'";
$result = mysqli_query($conn, $ref);

// Check if the query was successful and fetch the 'ref' value
if ($result && $row = mysqli_fetch_assoc($result)) {
    $ref1 = $row['ref'];
    // You can use the $ref variable as needed in your code
    // echo "Reference: " . $ref;
} else {
    // Handle the case where no matching record was found or an error occurred
    // echo "Reference not found or an error occurred.";
}
  ?>
<input type="hidden" value="<?php echo $ref1;?>" name="user" >
<input type="hidden" value="<?php echo $_SESSION['name_cus'] ;?>" name="name_cus" >
<input type="hidden" value="in process" name="status" >

<Label><h4>Maximum image size 5MB</h4></Label>
  <div class="mb-3">
 Attachment 1:
    <input type="file" name="file" required>
  </div>
  
  <div class="mb-3">
  Attachment 2:
    <input type="file" name="file1" >
  </div>
  <div >
  <input type="checkbox" name="urgent" value="order is urgent">
  
              Let us know if your Order is super urgent!</div>

  <button type="submit" name="submit"class="btn btn-primary" value="upload">upload</button>

</form>
<?php
if (empty($_POST['name']) && empty($_POST['required'])) {
    //echo 'Please correct the fields';
    return false;
   }
  
  else{
    


// $mail = new PHPMailer(true);
// $alert = '';


    

if(isset($_POST["submit"])){
   
        
    $name2 = $_POST['name'];
    $required = $_POST['required'];
    $ins = $_POST['ins'];
    $color = $_POST['color'];
    $user = $_POST['user']; 
    $email1 = $_POST['email']; 
    $status = $_POST['status']; 
    $urgent = $_POST['urgent'];
    $name_cus = $_POST['name_cus'];

        $image1 = $_FILES["file"]["name"];
        $image2 = $_FILES["file1"]["name"];
    
        // Target directory to save files
        $targetDir = "upload/";
        $targetFile1 = $targetDir . basename($image1);
        $targetFile2 = $targetDir . basename($image2);
        $uploadOk = 1;
        $imageFileType1 = strtolower(pathinfo($targetFile1,PATHINFO_EXTENSION));
        $imageFileType2 = strtolower(pathinfo($targetFile2,PATHINFO_EXTENSION));
    
        
        if (!empty($image1)) {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile1)) {
                $image1Inserted = true;
            } else {
                echo "Error uploading image1.";
            }
        } else {
            echo "Please select an image for image1.";
            $uploadOk = 0;
        }
        
        if (!empty($image2)) {
            if (move_uploaded_file($_FILES["file1"]["tmp_name"], $targetFile2)) {
                $image2Inserted = true;
            } else {
                echo "Error uploading image2.";
            }
        } else {
            $image2Inserted = false;
        }
        
        if($uploadOk){
            if($image2Inserted){
                $sql = "INSERT INTO placevector (name,required,color,ins,image,image1,urgent,user,email,status) VALUES ('$name2','$required','$color','$ins','$image1','$image2','$urgent','$user','$email1','$status')";
              
              
                 if(mysqli_query($conn, $sql)){
                
                 $last_id = mysqli_insert_id($conn);
                

           
                
                // echo "<meta http-equiv='refresh' content='0'>";
                $img1 = "upload/$image1";
                $img2 = "upload/$image2";
                $attachmentName = basename($image1);
                $attachmentName1 = basename($image2);
                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'jibranahmed1752@gmail.com';
                $mail->Password = 'owbkskfafhxfglal';
                $mail->SMTPSecure = "tls";
                $mail->Port = '587';
                $mail->isHTML(true);
        
        
                $mail->setFrom('jibranahmed1752@gmail.com','Jibran Ahmed');
                $mail->addAddress($email1);
                $mail->addAddress('jibranahmed1752@gmail.com');
        
                $mail->Subject = 'Thanks for Placing Vector Order at jibranahmed1752@gmail.com  (VectorId# V-1'.$last_id.')('.$name2.') ';
        $mail->Body = "<p>Dear ".$_SESSION['name_cus']."</p>
      <p>Thank you for your vector order. Your order files will be emailed to you within 12-24 hours.</p>       
      <p>You can also download your files from 'Vector Section' at www.com</p>
    
    <p>Best Regards,<br>Team <br>Tel: (915) 266-4883<br>Email: jibranahmed1752@gmail.com<br>ordercom<br>URL: www..com</p>";
    
                $mail->addAttachment($img1);
                $mail->addAttachment($img2);
                
                $mail->send();
                echo "<script>alert('Vector Placed')</script>";
                echo "<meta http-equiv='refresh' content='0'>";
                 } else {
                echo "Error inserting data into database.";
            }
                
              
             
            } else {
                $sql = "INSERT INTO placevector (name,required,color,ins,image,urgent,user,email,status) VALUES ('$name2','$required','$color','$ins','$image1','$urgent','$user','$email1','$status')";
              
                if(mysqli_query($conn, $sql)){
                
                 $last_id = mysqli_insert_id($conn);
                
                // echo "<meta http-equiv='refresh' content='0'>";
                $img1 = "upload/$image1";
                $img2 = "upload/$image2";
                $attachmentName = basename($image1);
                $attachmentName1 = basename($image2); 
                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'jibranahmed1752@gmail.com';
                $mail->Password = 'owbkskfafhxfglal';
                $mail->SMTPSecure = "tls";
                $mail->Port = '587';
                $mail->isHTML(true);


                $mail->setFrom('jibranahmed1752@gmail.com','JIbran Ahmed');
                $mail->addAddress($email1);
                $mail->addAddress('jibranahmed1752@gmail.com');

                $mail->Subject = 'Thanks for Placing Vector Order at   (VectorId# V-1'.$last_id.')('.$name2.') ';
                $mail->Body = "<p>Dear ".$_SESSION['name_cus']."</p>
              <p>Thank you for your vector order. Your order files will be emailed to you within 12-24 hours.</p>       
              <p>You can also download your files from 'Vector Section' at ww.com</p>
            
            <p>Best Regards,<br>Team <br>Tel: (915) 266-4883<br>Email: jibranahmed1752@gmail.com<br>order@.com<br>URL: www..com</p>";
            
    // $mail->addAttachment($img2);
    $mail->addAttachment($img1);
        
        $mail->send();
        echo "<script>alert('Vector Placed')</script>";
        echo "<meta http-equiv='refresh' content='0'>";
        } else {
                echo "Error inserting data into database.";
            }

              
            }
           
        }
    }
    
 
    mysqli_close($conn);
  }
  
  

  

?>
        <div class="col-lg-1"></div>

        </div>
        </div>
    </section>
    
    
</body>
</html> 