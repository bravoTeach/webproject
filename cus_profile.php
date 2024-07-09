<?php
session_start();
include "func_cus.php";
wa_auth();
include "conn.php";


if(isset($_GET['id']) AND intval($_GET['id']) > 0){
    $id = $_GET['id'];
  
    $sql = "SELECT * FROM signup WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
  
       while($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $name = $row['name'];
        $company = $row['company'];
        // $asi = $row['asi'];
        // $type = $row['type'];
        $phone = $row['phone'];
        // $phone2 = $row['phone2'];
        // $cell = $row['cell'];
        // $fax = $row['fax'];
        $email = $row['email'];
        // $email2 = $row['email2'];
        // $email3 = $row['email3'];
        // $email4 = $row['email4'];
        // $address = $row['address'];
        // $city = $row['city'];
        // $state = $row['state'];
        // $zip = $row['zip'];
        // $country = $row['country'];
        $user = $row['user'];
        $pass = $row['pass'];
        // $ref = $row['ref'];
        
       
       
        
      }
    } else {
      header('Location: https://localhost/arraysystemslimited/admin/customer.php?type=error&msg='.urlencode("Invalid User found"));
    }
  }
  else{
    header('Location: https://localhost/arraysystemslimited/admin/customer.php?type=error&msg='.urlencode("Invalid User found"));
  }
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
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
                <div><a href="place_quote.php"><button class="btn btn-primary">Place Quote</button></a></div>
                <div><a href="cus_quote_records.php?id=<?php echo $_SESSION['id'] ;?>"><button class="btn btn-primary">Quote Records</button></a></div>
                <div><a href="order.php"><button class="btn btn-primary">Place Order</button></a></div>
                <div><a href="cus_order_records.php?id=<?php echo $_SESSION['id'] ;?>"><button class="btn btn-primary">Order Records</button></a></div>
                <div><a href="place_vector.php"><button class="btn btn-primary">Place Vector</button></a></div>
                <div><a href="cus_vector_records.php?id=<?php echo $_SESSION['id'] ;?>"><button class="btn btn-primary">Vector Records</button></a></div>
                <div><a href="invoice.php?id=<?php echo $_SESSION['id'] ;?>"><button class="btn btn-primary">Invoice</button></a></div>
                <div><a href="cus_profile.php?id=<?php echo $_SESSION['id'] ;?>"><button class="btn btn-primary active">My Profile</button></a></div>
                <div><a href="CheckOut.php"><button class="btn btn-primary">Pay Now</button></a></div>
                <div><a href="logout_cus.php"><button class="btn btn-primary">Logout</button></a></div>

                </div>   

        </div>
        <div class="col-lg-9">
            <div class="row">
            <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white dl_btn">
    <tr>
            <th>ID</th>
            <td><?php echo $id; ?></td>
    </tr>
    <tr>

            <th>NAME</th>
<td><?php echo $name; ?></td>
</tr>

<tr>


            <th>COMPANY</th>
<td><?php echo $company; ?></td>
</tr>

<!--<tr>-->


<!--            <th>ASI</th>-->
<!--<td><?php echo $asi; ?></td>-->
<!--</tr>-->

<!--<tr>-->


<!--            <th>TYPE</th>-->
<!--<td><?php echo $type; ?></td>-->
<!--</tr>-->

<tr>


            <th>PHONE</th>
<td><?php echo $phone; ?></td>
</tr>

<!--<tr>-->


<!--            <th>PHONE2</th>-->
<!--<td><?php echo $phone2; ?></td>-->
<!--</tr>-->

<!--<tr>-->


<!--            <th>CELL</th>-->
<!--<td><?php echo $cell; ?></td>-->
<!--</tr>-->

<!--<tr>-->


<!--            <th>FAX</th>-->
<!--<td><?php echo $fax; ?></td>-->
<!--</tr>-->

<tr>


            <th>EMAIL</th>
<td><?php echo $email; ?></td>
</tr>


<!--<tr>-->

<!--            <th>EMAIL2</th>-->
<!--<td><?php echo $email2; ?></td>-->
<!--</tr>-->

            
<!--<tr>-->

<!--            <th>EMAIL3</th>-->
<!--<td><?php echo $email3; ?></td>-->
<!--</tr>-->

<!--<tr>-->


<!--            <th>EMAIL4</th>-->
<!--<td><?php echo $email4; ?></td>-->
<!--</tr>-->

<!--<tr>-->


<!--            <th>ADDRESS</th>-->
<!--<td><?php echo $address; ?></td>-->
<!--</tr>-->

<!--<tr>-->


<!--            <th>CITY</th>-->
<!--<td><?php echo $city; ?></td>-->
<!--</tr>-->


<!--<tr>-->

<!--            <th>STATE</th>-->
<!--<td><?php echo $state; ?></td>-->
<!--</tr>-->

<!--<tr>-->

<!--            <th>ZIP CODE</th>-->
<!--<td><?php echo $zip; ?></td>-->
<!--</tr>-->

<!--<tr>-->

<!--            <th>COUNTRY</th>-->
<!--<td><?php echo $country; ?></td>-->
<!--</tr>-->

<tr>

            <th>USER</th>
<td><?php echo $user; ?></td>
</tr>

<tr>

            <th>PASSWORD</th>
<td><?php echo $pass; ?></td>
</tr>

<tr>

<!--            <th>REFERENCE</th>-->
<!--<td><?php echo $ref; ?></td>-->



</tr>




</table>

            </div>
        

        </div>
        

        </div>
        </div>
    </section>
    <br>
<div class="">
    <div class="container sep"></div>
</div>
    
</body>
</html>