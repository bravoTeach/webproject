<?php
include "conn.php";
session_start();
include "func_cus.php";
wa_auth();
  


if(isset($_GET['id']) AND intval($_GET['id']) > 0){
    $id = $_GET['id'];
    
    $sql1 = "SELECT * FROM release_order WHERE orderid=$id";
    $result1 = mysqli_query($conn, $sql1);
    if (mysqli_num_rows($result1) > 0) {
  
       while($row1 = mysqli_fetch_assoc($result1)) {
        $image = $row1["image1"];
        $id1 = $row1["id"];
        $price = $row1["price"];
        $stich = $row1["stich"];
           $date = $row1["rec_date"];
       }}

  
    $sql = "SELECT * FROM placeorder WHERE id=$id";

    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
  
       while($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $name = $row['name'];
        $required = $row['required'];
        $height = $row['height'];
        $width = $row['width'];
        $fabric = $row['fabric'];
        $placement = $row['placement'];
        $color = $row['color'];
        $ins = $row['ins'];
        $imageURL = $row["image"];
      $imageURL1 = $row["image1"];
      $date = $row['date'];
      $status = $row['status'];
     

       
        
      }
    } else {
    //   header('Location: http://localhost/crydigi/cus_order_details.php?type=error&msg='.urlencode("Invalid User found"));
    }
  }
  else{
    // header('Location: http://localhost/crydigi/cus_order_details.php?type=error&msg='.urlencode("Invalid User found"));
  }



    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Records</title>
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
        .edit a{
            text-decoration: none;
    color: white;
    border: 5px solid blue;
    background-color: blue;
    padding-left: 10px;
    padding-right: 10px;
    border-radius: 10px;
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
            <div><a href="index.php"><button class="btn btn-primary " >Home</button></a></div>
                <div><a href="place_quote.php"><button class="btn btn-primary">Place Quote</button></a></div>
                <div><a href="cus_quote_records.php?id=<?php echo $_SESSION['id'] ;?>"><button class="btn btn-primary ">Quote Records</button></a></div>
                <div><a href="order.php"><button class="btn btn-primary">Place Order</button></a></div>
                <div><a href="cus_order_records.php?id=<?php echo $_SESSION['id'] ;?>"><button class="btn btn-primary active">Order Records</button></a></div>
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
                
            <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white dl_btn">
                <h1>Order Details</h1>
                <div class="edit">
    <a href="edit_order.php?id=<?= $id;?>">Edit</a>
    <br><br>
        </div>
    <tr>
            <th>Status</th>
            <td><?php echo $status; ?></td>
    </tr>
    <tr>

            <th>Number</th>
<td><?php echo ("OR-1".$id); ?></td>
</tr>

<tr>


            <th>Design Name/ PO</th>
<td><?php echo $name; ?></td>
</tr>

<tr>


            <th>Number of colors</th>
<td><?php echo $color; ?></td>
</tr>

<tr>


            <th>Fabric</th>
<td><?php echo $fabric; ?></td>

</tr>

<tr>


            <th>Height</th>
<td><?php echo $height; ?></td>
</tr>

<tr>


            <th>Widht</th>
<td><?php echo $width; ?></td>
</tr>

<tr>


            <th>Additional Instructions</th>
<td><?php echo $ins; ?></td>
</tr>
<tr>

            <th>Price:</th>
 <td><?php echo "$".$price; ?></td> 
</tr>
<tr>

            <th>Stich:</th>
 <td><?php echo $stich; ?></td> 
</tr><tr>

            <th>Receiving Date:</th>
 <td><?php echo $date; ?></td> 
</tr>
<tr>


            <th>File1:</th>
            <td><a href="download_order1.php?id=<?= $id;?>"><?php echo $imageURL; ?></a> </td>
    <!--<img src="<?php echo $imageURL; ?>" alt="" height="50px" width="50px"/>-->
</tr>

<!--<tr>-->


<!--            <th>File2:</th>-->
<!--                <td>    <img src="<?php echo $imageURL1; ?>" alt="" height="50px" width="50px"/></td>-->
<!--</tr>-->


</table>
<table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white dl_btn">
                <h1>Download Files</h1>
    
<?php


if(isset($_GET['id']) AND intval($_GET['id']) > 0){
    $id = $_GET['id'];

    $sql1 = "SELECT * FROM release_order WHERE orderid=$id";
    $result1 = mysqli_query($conn, $sql1);
    if (mysqli_num_rows($result1) > 0) {
  
       while($row1 = mysqli_fetch_assoc($result1)) {
        $image = $row1["image1"];
        $id1 = $row1["id"];
        $price = $row1["price"];
        $stich = $row1["stich"];
        $date = $row1["rec_date"];
        

        // $image = 'upload/'."image1";
        $img1 = "upload/$image";
        ?>
        <tr>
        
        <td>
            <!--<img src="<?php echo $img1; ?>" alt="" height="50px" width="50px"/>-->
            <?php
        // echo "<a href='$img1'>View Image!.</a>   :   ";
        // echo $id1; 
        ?>
        <a href="download.php?id=<?= $row1["id"];?>"><?php echo $image; ?></a> 
        </td>
       </tr>
       
        
<?php
        echo "<br>"; 

        // echo"-----------------";
       }}
    }
       ?>
       
</table>

    </div>
    </div>
    </body>
</html>
