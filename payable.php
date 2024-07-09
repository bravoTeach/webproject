<?php

session_start();
include "func_cus.php";
wa_auth();
$Last_id = " ";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payable Invoice</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/styling.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/styling.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
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
        .inv a{
            text-decoration: none;
    color: #000000;
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
        .invoice h1{
            text-align: center;
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
                    <!-- <h4>Welcome <?php echo $_SESSION['cus_name'] ?> , every thing looks good!</h4> -->
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
                <div><a href="cus_quote_records.php?id=<?php echo $_SESSION['id'] ;?>"><button class="btn btn-primary">Quote Records</button></a></div>
                <div><a href="order.php"><button class="btn btn-primary">Place Order</button></a></div>
                <div><a href="cus_order_records.php?id=<?php echo $_SESSION['id'] ;?>"><button class="btn btn-primary">Order Records</button></a></div>
                <div><a href="place_vector.php"><button class="btn btn-primary">Place Vector</button></a></div>
                <div><a href="cus_vector_records.php?id=<?php echo $_SESSION['id'] ;?>"><button class="btn btn-primary">Vector Records</button></a></div>
                <div><a href="invoice.php?id=<?php echo $_SESSION['id'] ;?>"><button class="btn btn-primary active">Invoice</button></a></div>
                <div><a href="cus_profile.php?id=<?php echo $_SESSION['id'] ;?>"><button class="btn btn-primary">My Profile</button></a></div>
                <div><a href="CheckOut.php"><button class="btn btn-primary">Pay Now</button></a></div>
                <div><a href="logout_cus.php"><button class="btn btn-primary">Logout</button></a></div>

                </div>  
        </div>
        <div class="col-lg-8 invoice">
            <h1>INVOICES</h1>
            <div class="row inv">
                <div class="col-lg-4"> <a href="gene_invoice.php"><h3>Generate Invoice</h3></a></div>
                <div class="col-lg-4"><a href="paid_invoice.php"><h3>Paid Invoice</h3></a></div>
                <div class="col-lg-4"><a href="payable.php"><h3>Payable Invoice</h3></a></div>

            

    </div>
    <div class="row">
        <?php
        $email = $_SESSION['cus_email'];
        $sql = "SELECT * FROM invoice WHERE email = '$email' AND status = 'remaining'";
        $result = mysqli_query($conn, $sql);
 if (mysqli_num_rows($result) > 0) {
    
    ?>
    <br><br>
    <div class="ex1">
    
    <table id="" class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white dl_btn">
        <thead>
    <tr>
            <th>Invoice ID</th>
            <th>Total Amount</th>
            <th>Status</th>
            <th>Detail</th>

            <th>PAYNOW</th>
        </tr>
        </thead>

<?php
 echo "<tbody>";
while($row = mysqli_fetch_assoc($result)) {
    ?>
 <tr>



<td><?php echo "SD-0".$row["id"];?></td>
<td><?php echo $row["total_amount"];?></td>
<td><?php echo $row["status"];?></td>
<!--<td><a href="delete_invoice.php?id=<?= $row["id"];?>">DELETE</a></td>-->
<td><a href="detail_invoice.php?id=<?= $row["id"];?>">Detail</a></td>

<td>
    <?php $amount = $row["total_amount"]; ?>
    <form action='https://www.2checkout.com/checkout/purchase' method='post' target='_blank'>
        <input type="hidden" name="sid" value="253800487474">
        <input type="hidden" name="mode" value="2CO">
        <input type="hidden" name="li_0_name" value="Digitizing & Vector Services:">
        <input type="hidden" name="li_0_price" value='<?=$amount?>'>
        <input type="hidden" name="li_0_quantity" value="1">
        <input type="hidden" name="currency_code" value="USD">
        <input type="hidden" name="x_receipt_link_url" value="https://localhost/arraysystemslimited/index.php">
        <input name='submit' class="btn-danger" type='submit' value='PAYNOW' />
    </form>
    <script src="https://www.2checkout.com/checkout/api/2co.min.js"></script>
</td>




</tr>
<?php
 echo "</tbody>";
}

?>
</table>
<?php
}

?>

    </div>
    </div>
    </body>
</html>
