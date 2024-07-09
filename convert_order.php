<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';
session_start();
include "func_cus.php";
wa_auth();
include "conn.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quote Records</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/styling.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



    <style>
    .ex1 {
  background-color: lightblue;
  overflow: scroll;
  background-color: white;
}
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
<body >
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
                    <h4>Welcome <?php echo $_SESSION['cus_name']?> , every thing looks good!</h4>
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
                <div><a href="place_quote.php"><button class="btn btn-primary">Place Quote</button></a></div>
                <div><a href="cus_quote_records.php?id=<?php echo $_SESSION['id'] ;?>"><button class="btn btn-primary active">Quote Records</button></a></div>
                <div><a href="order.php"><button class="btn btn-primary">Place Order</button></a></div>
                <div><a href="cus_order_records.php?id=<?php echo $_SESSION['id'] ;?>"><button class="btn btn-primary">Order Records</button></a></div>
                <div><a href="place_vector.php"><button class="btn btn-primary">Place Vector</button></a></div>
                <div><a href="cus_vector_records.php?id=<?php echo $_SESSION['id'] ;?>"><button class="btn btn-primary">Vector Records</button></a></div>
                <div><a href=""><button class="btn btn-primary">Invoice</button></a></div>
                <div><a href="cus_profile.php?id=<?php echo $_SESSION['id'] ;?>"><button class="btn btn-primary">My Profile</button></a></div>
                <div><a href="CheckOut.php"><button class="btn btn-primary">Pay Now</button></a></div>
                <div><a href="logout_cus.php"><button class="btn btn-primary">Logout</button></a></div>

                </div>  

        </div>
        <div class="col-lg-8">
            <div class="row">

 <?php
        

if(isset($_GET['id']) && intval($_GET['id']) > 0){
    $id = $_GET['id'];
    
    $cusemail = $_SESSION['cus_email'];
    $cusname = $_SESSION['cus_name'];
    $status = "in process";

    // Get the data from release_quote table using $id
    $sql1 = "SELECT * FROM release_quote WHERE orderid=$id";
    $result1 = mysqli_query($conn, $sql1);
    if (mysqli_num_rows($result1) > 0) {
        while($row1 = mysqli_fetch_assoc($result1)) {
            $image_rel = $row1["image1"];
            $id1 = $row1["id"];
            $price = $row1["price"];
            $stich = $row1["stich"];
            $date1 = $row1["rec_date"];
        }
    }
    
    // Get the data from placequote table using $id
    $sql = "SELECT * FROM placequote WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $id1 = $row['id'];
            $name = $row['name'];
            $required = $row['required'];
            $height = $row['height'];
            $width = $row['width'];
            $fabric = $row['fabric'];
            $placement = $row['placement'];
            $color = $row['color'];
            $ins = $row['ins'];
            $image1 = $row["image"];
            $image2 = $row["image1"];
            $date = $row['date'];
            // $status = $row['status'];
            $urgent = $row['urgent'];
        }
        
        // Insert the data into the new table "placeorder"

        $sql2 = "INSERT INTO placeorder (name, required, height, width, fabric, placement, color, ins, image, image1, urgent, user, email, status) VALUES ('$name', '$required', '$height', '$width', '$fabric', '$placement', '$color', '$ins', '$image1', '$image2', '$urgent', '$cusname', '$cusemail', 'in process')";
        
        if(mysqli_query($conn, $sql2)){
            $last_id = mysqli_insert_id($conn);
            $update = "UPDATE placequote SET order_status = 'order' WHERE id = $id";
            $run = mysqli_query($conn,$update);

            // Data successfully inserted into the new table
            // send confirmation email
$img1 = "upload/$image1";
$attachmentName = basename($image1);
$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'jibranahmed1752@gmail.com';
$mail->Password = 'owbkskfafhxfglal';
$mail->SMTPSecure = "ssl";
$mail->Port = '465';
$mail->isHTML(true);

$mail->setFrom('jibranahmed1752@gmail.com', ' jibran');
$mail->addAddress($cusemail);
$mail->addAddress('jibranahmed1752@gmail.com');

$mail->Subject = 'Thanks for Placing Order at (QU# 1' . $id . ') OR# 1' . $last_id;
$mail->Body = "<p>Dear " . $cusname . "</p>
<p>Thank you for your order. Your order files will be emailed to you within 12-24 hours. You can also download your files from 'Digitizing Section' at www.com</p>

<p>Best Regards,<br>Team <br>Tel: (915) 266-4883<br>Email: jibranahmed1752@gmail.com<br>order@.com<br>URL: www.com</p>";
$mail->addAttachment($img1);
$mail->send();

// redirect to the order records page
echo "<script>alert('Order Placed')</script>";
echo "<meta http-equiv='refresh' content='0;url=cus_order_records.php'>";

        } else {
            // Error inserting data into the new table
            header('Location: https://localhost/arraysystemslimited/cus_order_details.php?type=error&msg='.urlencode("Error adding data to placeorder table"));
        }
    } else {
        // Invalid user found
        header('Location: https://localhost/arraysystemslimited/cus_order_details.php?type=error&msg='.urlencode("Invalid user found"));
    }
}



       
        ?>
        </div>
        </div>
    </section>
   
    

</body>
</html>













