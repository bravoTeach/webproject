<?php

include "../conn.php";
session_start();
include "func.php";
wa_auth();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/styling.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
      .w3-quarter a{
        text-decoration: none;
    /* color: #000000;
    font-weight: 700;
    padding: 10px 30px; */

      }
    </style>
</head>
<?php
include "nav.php";


$sql="SELECT * FROM placeorder WHERE status = 'in process'";
$sql1="SELECT * FROM placequote WHERE status = 'in process'";
$sql2="SELECT * FROM placevector WHERE status = 'in process'";
$sql4="SELECT * FROM signup";



if ($result=mysqli_query($conn,$sql))
  {

  $order=mysqli_num_rows($result);
  

  mysqli_free_result($result);
  }


if ($result=mysqli_query($conn,$sql1))
  {

  $quote=mysqli_num_rows($result);
  
  
  
  mysqli_free_result($result);
  }


if ($result=mysqli_query($conn,$sql2))
  {
      $vector=mysqli_num_rows($result);
  
 
  mysqli_free_result($result);
  }
  if ($result=mysqli_query($conn,$sql4))
  {
      $user=mysqli_num_rows($result);
  
 
  mysqli_free_result($result);
  }
mysqli_close($conn);
?>
<br><br><br>
<div class="w3-row-padding w3-margin-bottom">
    <div class="w3-quarter">
      <a href="pending_orders.php">
      <div class="w3-container w3-red w3-padding-16">
        <div class="w3-left"><i class="fa fa-comment w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $order;  ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Total Pending Orders</h4>
      </div>
      </a>
    </div>
    <div class="w3-quarter">
      <a href="pending_quote.php">
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"><i class="fa fa-eye w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $quote;  ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Total Pending Quote</h4>
      </div>
      </a>
    </div>
    <div class="w3-quarter">
      <a href="pending_vector.php">
      <div class="w3-container w3-teal w3-padding-16">
        <div class="w3-left"><i class="fa fa-share-alt w3-xxxlarge"></i></div>
        <div class="w3-right">
        <h3><?php echo $vector;  ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Total Pending Vector</h4>
      </div>
      </a>
    </div>
    <div class="w3-quarter">
      <a href="customer.php">
      <div class="w3-container w3-orange w3-text-white w3-padding-16">
        <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $user;  ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Users</h4>
      </div>
    </div>
    </a>
  </div>
<!-- <body>
    <section>
    <div class="container">
        <div class="row">
<div class="col-lg-1"></div>
            <div class="col-lg-10"><img src="../images/logobar_top.jpg" alt=""></div>
<div class="col-lg-1"></div>

            </div>
    </section>
    <section class="midcontent">

    
   

<br><br>
        
        <div class="row">
        <div class="col-lg-4"><img src="../images/logo-03.png" alt="" height="100px" width="200px"></div>

            <div class="col-lg-4"></div>
            <div class="col-lg-1"></div>

            <div class="col-lg-3 header"> <a href="">My Account</a> | <a href="changepass.php?id=<?php echo $_SESSION['id'] ;?>">Change Password</a></div>
        </div>
    </div>
    </section>
    
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
            <div><a href="index.php"><button class="btn btn-primary active" >Home</button></a></div>
                <div><a href="place_quote.php"><button class="btn btn-primary">Place Quote</button></a></div>
                <div><a href="quoterecords.php"><button class="btn btn-primary">Quote Records</button></a></div>
                <div><a href=""><button class="btn btn-primary">Place Order</button></a></div>
                <div><a href="orderrecords.php"><button class="btn btn-primary">Order Records</button></a></div>
                <div><a href=""><button class="btn btn-primary">Place Vector</button></a></div>
                <div><a href="vectorrecord.php"><button class="btn btn-primary">Vector Records</button></a></div>
                <div><a href=""><button class="btn btn-primary">Invoice</button></a></div>
                <div><a href=""><button class="btn btn-primary">My Profile</button></a></div>
                <div><a href="customer.php"><button class="btn btn-primary">Customers</button></a></div>

                <div><a href="logout.php"><button class="btn btn-primary">Logout</button></a></div>

                </div>  

        </div>
        <div class="col-lg-8">
            <div class="row">
                <div class="col-lg-4"><a href=""><img src="../images/SendQuote.png" alt=""></a>
                <div class="imgname"> <a href=""> Place Quote</a></div></div>

                

                <div class="col-lg-4"><a href=""><img src="../images/DigitizingOrder.png" alt=""></a>
                <div class="imgname"> <a href=""> Place Order</a></div></div>

                <div class="col-lg-4"> <a href=""><img src="../images/VectorOrder.png" alt=""></a>
                <div class="imgname"> <a href=""> Place Vector</a></div></div>


            </div>
            <br>
            <div class="row">
                <div class="col-lg-4"><a href=""><img src="../images/QuoteRecords.png" alt=""></a>
                <div class="imgname"> <a href=""> Quote Records</a></div></div>
                <div class="col-lg-4"><a href=""><img src="../images/DigitizingRecords.png" alt=""></a>
                <div class="imgname"> <a href=""> Order Records</a></div></div>
                
                <div class="col-lg-4"> <a href=""><img src="../images/VectorRecords.png" alt=""></a>
                <div class="imgname"> <a href=""> Vector Records</a></div></div>


            </div>
           

            <br>
            <div class="row">
                <div class="col-lg-4"><a href=""><img src="../images/Invoices.png" alt=""></a>
                <div class="imgname"> <a href=""> Invoices</a></div></div>

                <div class="col-lg-4"><a href=""><img src="../images/MyProfile.png" alt=""></a>
                <div class="imgname"> <a href=""> My Profile</a></div></div>

                <div class="col-lg-4"> <a href="logout.php"><img src="../images/Logout.png" alt=""></a>
                <div class="imgname"> <a href="logout.php"> Logout</a></div></div>
                

            </div>
        

        </div>
        <div class="col-lg-1"></div>

        </div>
        </div>
    </section>
    <br>
<div class="">
    <div class="container sep"></div>
</div> -->
    
</body>
</html>