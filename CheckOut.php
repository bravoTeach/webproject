<?php
include "conn.php";
include_once 'include/config.php';
include_once 'include/TwoCheckoutApi.php';
require_once("include/lib/Twocheckout.php");

session_start();
include "func_cus.php";
wa_auth();

$title = "TITLE";


?>
<!-- container --> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" type="image/ico" href="images/favicon.ico">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" />
  <!-- Custom fonts for this template -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.2/css/all.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css" />
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://www.2checkout.com/checkout/purchase?sid=your-seller-id&mode=2CO&li_0_name=test&li_0_price=1.00&demo=Y
">
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
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
	form{
		padding-top: 30px;
		padding-bottom: 30px;


	}
	h4{
		color: red;
	}
    .class{
		border: 2px solid grey;
        padding-top: 50px;
		border-radius: 8px;
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
                    <h3>Welcome <?php echo $_SESSION['cus_name']?> , every thing looks good!</h3>
                </div>
                <div class="col-lg-2"></div>

            </div>
        </div>
    </section>
 
<br>
<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-4"></div>
		
			<div class="col-lg-4 class">
<h4>Enter amount you want to pay:</h4>
  <form action='https://www.2checkout.com/checkout/purchase' method='post' target="_blank">
<!-- <input type='hidden' name='sid' value='253800487474' />
<input type='hidden' name='production' value='' />
<input type='hidden' name='' value='amount' />
<input type='' name='' value='' />
<input type='hidden' name='demo' value='Y' />
<input name='submit'class="btn-danger" type='submit' value='PAYNOW' />
</form> -->


<!-- <form id="my-form" action="process_payment.php" method="post"> -->
  <input type="hidden" name="sid" value="253800487474">
  <input type="hidden" name="mode" value="2CO">
  <input type="hidden" name="li_0_name" value="Digitizing in vector services:">
  <input type="" name="li_0_price" value="">
  <input type="hidden" name="li_0_quantity" value="1">
  <input type="hidden" name="currency_code" value="USD">
  <input type="hidden" name="x_receipt_link_url" value="localhost/arraysystemslimited/index.php">
<input name='submit'class="btn-danger" type='submit' value='PAYNOW' />

  </form>
</div>
<div class="col-lg-4"></div>

</div>
</div>
  </section>
  <script src="https://www.2checkout.com/checkout/api/2co.min.js"></script>
</body>
</html>

<?php include("include/footer.php"); ?>
