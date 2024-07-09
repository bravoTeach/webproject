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
    <title>Place Quote</title>
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
                <div><a href="place_quote.php"><button class="btn btn-primary active ">Place Quote</button></a></div>
                <div><a href="cus_quote_records.php?id=<?php echo $_SESSION['id'] ;?>"><button class="btn btn-primary">Quote Records</button></a></div>
                <div><a href="order.php"><button class="btn btn-primary">Place Order</button></a></div>
                <div><a href="cus_order_records.php?id=<?php echo $_SESSION['id'] ;?>"><button class="btn btn-primary">Order Records</button></a></div>
                <div><a href="place_vector.php"><button class="btn btn-primary ">Place Vector</button></a></div>
                <div><a href="cus_vector_records.php?id=<?php echo $_SESSION['id'] ;?>"><button class="btn btn-primary">Vector Records</button></a></div>
                <div><a href="invoice.php?id=<?php echo $_SESSION['id'] ;?>"><button class="btn btn-primary">Invoice</button></a></div>
                <div><a href="cus_profile.php?id=<?php echo $_SESSION['id'] ;?>"><button class="btn btn-primary">My Profile</button></a></div>
                <div><a href="CheckOut.php"><button class="btn btn-primary">Pay Now</button></a></div>
                <div><a href="logout_cus.php"><button class="btn btn-primary">Logout</button></a></div>

                </div>  
        </div>
        <div class="col-lg-8">
            <div class="row">
            <form action="place_quote.php" method="POST" enctype="multipart/form-data">
  <!-- Name input -->
  <div class="form-outline ">
  <tr>
        <td height="35" class="form_left_text"> Quote Name / PO: </td>
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
	<option value="100">100</option>
	<option value="cnd">cnd</option>
	<option value="dsb">dsb</option>
    <option value="dst">dst</option>
	<option value="dsz">dsz</option>
	<option value="emb">emb</option>
    <option value="exp">exp</option>
	<option value="jef">jef</option>
	<option value="ksm">ksm</option>
    <option value="pes">pes</option>
	<option value="pof">pof</option>
	<option value="tap">tap</option>
    <option value="xxx">xxx</option>
	<option value="pxf">pxf</option>
	<option value="HUS">HUS</option>
	<option value="Others">Others</option>

</select><span class="green">*</span>
      </div>
      <br>

   <!-- Email input -->
   <div class="form-outline ">
  <tr>
        <td height="35" class="form_left_text"> Height: </td>
        <td height="25" colspan="2" class="form">
          <input name="height" class="user-passbox4" id="height" size="40" >
          <span class="green"></span></td>
      </tr></div>
      <br>

   <!-- Email input -->
   <div class="form-outline ">
  <tr>
        <td height="35" class="form_left_text"> Width: </td>
        <td height="25" colspan="2" class="form">
          <input name="width" class="user-passbox4" id="width" size="51" >
          <span class="green"></span></td>
      </tr></div>
      <br>
  <!-- Email input -->
  <div class="form-outline ">

  <label for="fabric">Fabric:</label>
<select name="fabric" >
	<option value="">Select</option>
	<option value="pique">pique</option>
	<option value="single jersey">single jersey</option>
	<option value="cotton">cotton woven</option>
    <option value="denim">denim</option>
	<option value="silk">silk</option>
	<option value="polyester">polyester</option>
    <option value="twill">twill</option>
	<option value="flannel">flannel</option>
	<option value="fleece">fleece</option>
    <option value="towel">towel</option>
	<option value="leather">leather</option>
	<option value="felt">felt</option>
    <option value="canvas">canvas</option>
	<option value="nylon">nylon</option>
	<option value="wool">wool</option>
	<option value="velvet">velvet</option>
    <option value="chenille">chenille</option>
	<option value="milliskin">milliskin</option>
	<option value="blanket">blanket</option>    

</select><span class="green">*</span>
      </div>
      <br>
        <!-- Email input -->
  <div class="form-outline ">
    <label for="placement">Placement:</label>
<select name="placement" >
	<option value="">Select</option>
	<option value="apron">apron</option>
	<option value="applique">applique</option>
	<option value="visor">visor</option>
    <option value="cap">cap</option>
	<option value="cap/visor">cap/visor</option>
	<option value="cap side">cap side</option>
    <option value="cap back">cap back</option>
	<option value="l.chest/cap">l.chest/cap</option>
	<option value="left chest">left chest</option>
    <option value="center chest">center chest</option>
	<option value="pocket">pocket</option>
	<option value="gloves">gloves</option>
    <option value="wrist band">wrist band</option>
	<option value="jacket back">jacket back</option>
	<option value="sleeve">sleeve</option>
	<option value="towel">towel</option>
    <option value="patches">patches</option>
	<option value="bags">bags</option>
	<option value="seat cover">seat cover</option>

</select><span class="green">*</span>
      </div>
      <br>
   <!-- Email input -->
   <div class="form-outline ">
  <tr>
        <td height="35" class="form_left_text"> Number of colors: </td>
        <td height="25" colspan="2" class="form">
          <input name="color" class="user-passbox4" id="color" size="52" >
          

          <span class="green"></span></td>
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
<input type="hidden" value="<?php echo $ref1 ;?>" name="user" >
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
if (empty($_POST['name']) && empty($_POST['required']) && empty($_POST['fabric']) && empty($_POST['placement'])) {

    return false;
   }
  
  else{




    if(isset($_POST["submit"])){
   
        
        $user = $_POST['user']; 
        $email1 = $_POST['email']; 
        $status = $_POST['status']; 
    $name3 = $_POST['name'];
    $required = $_POST['required'];
    $height = $_POST['height'];
    $width = $_POST['width'];
    $fabric = $_POST['fabric'];
    $placement = $_POST['placement'];
    $ins = $_POST['ins'];
    $color = $_POST['color'];
    $urgent = $_POST['urgent'];
        $name_cus = $_POST['name_cus'];


        $image1 = $_FILES["file"]["name"];
        $image2 = $_FILES["file1"]["name"];
        
        // Target directory to save files
        $targetDir = "upload/";
        $targetFile1 = $targetDir . basename($image1);
        $targetFile2 = $targetDir . basename($image2);
        $uploadOk = 1;
        $imageFileType1 = strtolower(pathinfo($targetFile1, PATHINFO_EXTENSION));
        $imageFileType2 = strtolower(pathinfo($targetFile2, PATHINFO_EXTENSION));
        
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
        
        if ($uploadOk) {
            if ($image2Inserted) {
                $sql = "INSERT INTO placequote (name, required, height, width, fabric, placement, color, ins, image, image1, urgent, user, email, status) VALUES ('$name3', '$required', '$height', '$width', '$fabric', '$placement', '$color', '$ins', '$image1', '$image2', '$urgent', '$user', '$email1', '$status')";
                if (mysqli_query($conn, $sql)) {
        
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
                $mail->SMTPSecure = "ssl";
                $mail->Port = '465';
                $mail->isHTML(true);
        
        
                $mail->setFrom('jibranahmed1752@gmail.com','JIbran Ahmed');
                $mail->addAddress($email1);
                $mail->addAddress('jibranahmed1752@gmail.com');
        
                $mail->Subject = 'Thanks for quote request (QuoteId# QU-1'.$last_id.')('.$name3.')  ';
             
                $mail->Body = "<p>Dear ".$_SESSION['name_cus']."</p>
              <p>Thank you for your design quote. Your quote files will be emailed to you within 12-24 hours. You can also download your files from 'Quote Section' at www..com</p>
            
            <p>Best Regards,<br>Team <br>Tel: (915) 266-4883<br>Email: jibranahmed1752@gmail.com<br>order@s.com<br>URL: www.com</p>";
                $mail->addAttachment($img1);
                $mail->addAttachment($img2);
                
                $mail->send();
                echo "<script>alert('Quote Placed')</script>";
                echo "<meta http-equiv='refresh' content='0'>";
                 } else {
                echo "Error inserting data into database.";
            }
                
              
             
            } else {
                $sql = "INSERT INTO placequote (name,required,height,width,fabric,placement,color,ins,image,urgent,user,email,status) VALUES ('$name3','$required','$height','$width','$fabric','$placement','$color','$ins','$image1','$urgent','$user','$email1','$status')";
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
                $mail->SMTPSecure = "ssl";
                $mail->Port = '465';
                $mail->isHTML(true);


                $mail->setFrom('jibranahmed1752@gmail.com','jibran Ahmed');
                $mail->addAddress($email1);
                $mail->addAddress('jibranahmed1752@gmail.com');

      $mail->Subject = 'Thanks for quote request (QuoteId# QU-1'.$last_id.')('.$name3.')  ';
     
        $mail->Body = "<p>Dear ".$_SESSION['name_cus']."</p>
      <p>Thank you for your design quote. Your quote files will be emailed to you within 12-24 hours. You can also download your files from 'Quote Section' at .com</p>
    
    <p>Best Regards,<br>Team <br>Tel: (915) 266-4883<br>Email: jibranahmed1752@gmail.com<br>.com</p>";
    // $mail->addAttachment($img2);
    $mail->addAttachment($img1);
        
        $mail->send();
        echo "<script>alert('Quote Placed')</script>";
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