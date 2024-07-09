<?php
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
                <div><a href="cus_quote_records.php?id=<?php echo $_SESSION['id'] ;?>"><button class="btn btn-primary active">Quote Records</button></a></div>
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

 <?php
        

        if(isset($_GET['id']) AND intval($_GET['id']) > 0){
            // echo "hiiiii";
          $id = $_GET['id'];
          $sql1 = "SELECT email FROM signup WHERE id = $id";
    $result1 = mysqli_query($conn, $sql1);

    if (mysqli_num_rows($result1) > 0) {

 while($row1 = mysqli_fetch_assoc($result1)) {
  $email = $row1["email"];

}
}
$email = $_SESSION['cus_email'];

    // $sql = "SELECT * FROM placequote WHERE email = '$email'AND order_status = 'quote' ORDER BY id DESC";
    $sql = "SELECT * FROM placequote WHERE email = '$email' ORDER BY id DESC";

    $result = mysqli_query($conn, $sql);


    if (mysqli_num_rows($result) > 0) {
      
        // output data of each row
        ?>
        <br><br>
        <div class="ex1">
        <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white dl_btn" id = "jibran">
            <thead>
        <tr>
            
                <th>Quote ID</th>
                <th>Name</th>
                <!--<th>Required</th>-->
                <!--<th>Height</th>-->
                <!--<th>Width</th>-->
                <!--<th>Fabric</th>-->
                <!--<th>Placement</th>-->

                <!--<th>Instruction</th>-->

                <!--<th>Color</th>-->

                <!--<th>Image</th>-->
                <th>Image</th>
                <th>Date</th>
                <th>Status</th>
                <!--<th>Edit</th>-->
                <th>Detail</th>




    
            </tr>
            </thead>
    
    <?php
    echo "<tbody>";
    while($row = mysqli_fetch_assoc($result)) {
      $imageURL = 'upload/'.$row["image"];
      $imageURL1 = 'upload/'.$row["image1"];
        ?>
     <tr>
    
     <td>QU:1<?php echo $row["id"];?></td>

    <td><?php echo $row["name"];?></td>
    <!--<td><?php echo $row["required"];?></td>-->
    <!--<td><?php echo $row["height"];?></td>-->
    <!--<td><?php echo $row["width"];?></td>-->
    <!--<td><?php echo $row["fabric"];?></td>-->
    <!--<td><?php echo $row["placement"];?></td>-->
    <!--<td><?php echo $row["ins"];?></td>-->

    <!--<td><?php echo $row["color"];?></td>-->
    <td>    <img src="<?php echo $imageURL; ?>" alt="" height="50px" width="50px"/></td>

<!--<td>    <img src="<?php echo $imageURL1; ?>" alt="" height="50px" width="50px"/></td>-->
    <td><?php echo $row["date"];?></td>
    <td><?php echo $row["status"];?></td>
    <!--<td><a href="edit_quote.php?id=<?= $row["id"];?>">Edit</a></td>-->
    <td><a href="detail_quote.php?id=<?= $row["id"];?>">Detail</a></td>




   
    </tr>
    <?php
    echo "</tbody>";
    }
    ?>
    </table>
    
    <?php
    }
    else {
             echo "0 results";
        }
      
    ?>






        
    </table>
    

    </div>
   
                
        </div>
        </div>
    </section>
   
   
<script src = "admin/jquery/jquery-3.6.4.js"></script>
<script src="admin/DataTables/DataTables-1.13.4/js/jquery.dataTables.min.js"></script>
<script src="admin/DataTables/DataTables-1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script>
$(document).ready(function(){
    $("#jibran").dataTable();
});
</script> 
</body>
</html>











<?php
        }
?>



