<?php
session_start();
include "func_cus.php";
wa_auth();
                

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/styling.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



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
            <div><a href="index.php"><button class="btn btn-primary active" >Home</button></a></div>
                <div><a href="place_quote.php"><button class="btn btn-primary">Place Quote</button></a></div>
                <div><a href="cus_quote_records.php?id=<?php echo $_SESSION['id'] ;?>"><button class="btn btn-primary">Quote Records</button></a></div>
                <div><a href="order.php"><button class="btn btn-primary">Place Order</button></a></div>
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


   
                <div class="col-lg-4"><a href="place_quote.php"><img src="images/SendQuote.png" alt=""></a>
                <div class="imgname"> <a href="place_quote.php"> Place Quote</a></div></div>

                

                <div class="col-lg-4"><a href="order.php"><img src="images/DigitizingOrder.png" alt=""></a>
                <div class="imgname"> <a href="order.php"> Place Order</a></div></div>

                <div class="col-lg-4"> <a href="place_vector.php"><img src="images/VectorOrder.png" alt=""></a>
                <div class="imgname"> <a href="place_vector.php"> Place Vector</a></div></div>


            </div>
            <br>
            <div class="row">
                <div class="col-lg-4"><a href="cus_quote_records.php?id=<?php echo $_SESSION['id'] ;?>"><img src="images/QuoteRecords.png" alt=""></a>
                
                <div class="imgname"> <a href="cus_quote_records.php?id=<?php echo $_SESSION['id'] ;?>"> Quote Records</a></div></div>

                <div class="col-lg-4"><a href="cus_order_records.php?id=<?php echo $_SESSION['id'] ;?>"><img src="images/DigitizingRecords.png" alt=""></a>

                <div class="imgname"> <a href="cus_order_records.php?id=<?php echo $_SESSION['id'] ;?>"> Order Records</a></div></div>
                
                <div class="col-lg-4"> <a href="cus_vector_records.php?id=<?php echo $_SESSION['id'] ;?>"><img src="images/VectorRecords.png" alt=""></a>
                <div class="imgname"> <a href="cus_vector_records.php?id=<?php echo $_SESSION['id'] ;?>"> Vector Records</a></div></div>


            </div>
           

            <br>
            <div class="row">
                <div class="col-lg-4"><a href="invoice.php?id=<?php echo $_SESSION['id'] ;?>"><img src="images/Invoices.png" alt=""></a>
                <div class="imgname"> <a href="invoice.php?id=<?php echo $_SESSION['id'] ;?>"> Invoices</a></div></div>

                <div class="col-lg-4"><a href="cus_profile.php?id=<?php echo $_SESSION['id'] ;?>"><img src="images/MyProfile.png" alt=""></a>
                <div class="imgname"> <a href="cus_profile.php?id=<?php echo $_SESSION['id'] ;?>"> My Profile</a></div></div>

                <div class="col-lg-4"> <a href="logout_cus.php"><img src="images/Logout.png" alt=""></a>
                <div class="imgname"> <a href="logout_cus.php"> Logout</a></div></div>
                

            </div>
        

        </div>
        <div class="col-lg-1"></div>

        </div>
        </div>
    </section>
    <br>
<div class="">
    <div class="container sep"></div>
</div>
    
</body>
</html>