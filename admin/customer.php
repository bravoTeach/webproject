<?php
session_start();
include "func.php";
wa_auth();
?>
<!DOCTYPE html>
<html>
<head>
<title>View Users</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="DataTables/DataTables-1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="DataTables/DataTables-1.13.4/css/dataTables.bootstrap5.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}

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
        tr td a{
            text-decoration: none;
    color: white;
    font-weight: 700;  
    border: 5px solid transparent;
    padding: 2px;
    border-radius: 5px;
    background-color: blue;
        }

</style>
</head>


<!-- <section>
    <div class="container">
        <div class="row"> -->
<!-- <div class="col-lg-1"></div> -->
            <!-- <div class="col-lg-10"><img src="../images/logobar_top.jpg" alt=""></div> -->
<!-- <div class="col-lg-1"></div> -->

            <!-- </div>
    </section>
    <section class="midcontent">

    
   

<br><br> -->
        
        <!-- <div class="row"> -->
            <!-- <div class="col-lg-4"><img src="../images/logo-white.png" alt=""></div> -->
            <!-- <div class="col-lg-4"></div>
            <div class="col-lg-1"></div> -->

            <!-- <div class="col-lg-3 header"> <a href="">My Account</a> | <a href="changepass.php?id=<?php echo $_SESSION['id'] ;?>">Change Password</a></div> -->
        <!-- </div>
    </div>
    </section> -->
    <!-- <br>
    <br> -->
<!-- <div class=""> -->

    <!-- <div class="container sep"></div> -->
<!-- </div>
    <section class="midcontent">
        <div class="container">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <h4>Welcome <?php echo $_SESSION['admin_name']?> , every thing looks good!</h4>
                </div>
                <div class="col-lg-2"></div>

            </div>
        </div>
    </section> -->
 
<!-- <br>
 
<div class="content">

<section class="midcontent"> -->
        <!-- <div class="container"> -->
            <!-- <div class="row"> -->
        <!-- <div class="col-lg-3 ">
<div class="d-grid gap-2 col-7 mx-auto butn" >
            <div><a href="index.php"><button class="btn btn-primary " >Home</button></a></div>
                <div><a href="place_quote.php"><button class="btn btn-primary">Place Quote</button></a></div>
                <div><a href=""><button class="btn btn-primary">Quote Records</button></a></div>
                <div><a href="order.php"><button class="btn btn-primary">Place Order</button></a></div>
                <div><a href="orderrecords.php"><button class="btn btn-primary">Order Records</button></a></div>
                <div><a href=""><button class="btn btn-primary">Place Vector</button></a></div>
                <div><a href=""><button class="btn btn-primary">Vector Records</button></a></div>
                <div><a href=""><button class="btn btn-primary">Invoice</button></a></div>
                <div><a href=""><button class="btn btn-primary">My Profile</button></a></div>
                <div><a href="customer.php"><button class="btn btn-primary active">Customers</button></a></div>

                <div><a href="logout.php"><button class="btn btn-primary">Logout</button></a></div>

                </div>   -->

        <!-- </div> -->
        <!-- <div class="col-lg-12">
            <div class="row"> -->
    
        <?php
include "../conn.php";

$sql = "SELECT * FROM signup";
$result = mysqli_query($conn, $sql);
// -------------------------------
$sql2="SELECT * FROM signup";


if ($result2=mysqli_query($conn,$sql2))
  {

  $inquiry=mysqli_num_rows($result2);
  

  mysqli_free_result($result2);
  }

?>
<div>
    <?php
      include "nav.php";
    ?>
    <!--<br><br>-->
<h4>Total Customers:  <?php echo $inquiry;  ?> </h4>




</div>

<?php

// -------------------------------




if (mysqli_num_rows($result) > 0) {
    // output data of each row
    ?>
    <!--<br><br>-->
    <table id="jibran"  class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white dl_btn">
        <thead>
    <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>CONTACT</th>
            <th>COMPANY</th>
            <th>EMAIL</th>
            <!--<th>DELETE</th>-->
            <!--<th>EDIT</th>-->
            <th>DETAIL</th>

</tr>
</thead>

<?php
echo "<tbody>";
while($row = mysqli_fetch_assoc($result)) {
    ?>
 <tr>


<td><?php echo $row["id"];?></td>
<td><?php echo $row["name"];?></td>
<td><?php echo $row["phone"];?></td>
<td><?php echo $row["company"];?></td>
<td><?php echo $row["email"];?></td>
<!--<td><a href="delete_customer.php?id=<?= $row["id"];?>">Delete</a></td>-->
<!--<td><a href="edit_customer.php?id=<?= $row["id"];?>">Edit</a></td>-->
<td><a href="cus_profile.php?id=<?= $row["id"] ?>" target="_blank">Detail</a></td>

</tr>
</thead>
<?php
}
echo "</tbody>";

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
        
        <div class="col-lg-1"></div>

        </div>
        </div>
    </section>
    <br>
<div class="">
    <div class="container sep"></div>
</div>
<script src = "jquery/jquery-3.6.4.js"></script>
<script src="DataTables/DataTables-1.13.4/js/jquery.dataTables.min.js"></script>
<script src="DataTables/DataTables-1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script>
$(document).ready(function(){
    $("#jibran").dataTable();
});
</script>
</body>
</html>
