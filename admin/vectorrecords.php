<?php
session_start();
include "func.php";
wa_auth();
?>
<!DOCTYPE html>
<html>
<head>
<title>Vector Records</title>
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
    background-color: transparent;
        }

        .ex1 {
  background-color: white;
  overflow: scroll;
}
.urgent{
    background-color: red;
}
</style>
</head>
<!-- <a href="index.php"><button class="w3-button w3-dark-grey">Back <i class="fa fa-arrow-left"></i></button>
</a> -->
<?php
include "nav.php";
?>

<!-- <section>
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
            <div class="col-lg-4"><img src="../images/logo-white.png" alt=""></div>
            <div class="col-lg-4"></div>
            <div class="col-lg-1"></div>

            <div class="col-lg-3 header"> <a href="">My Account</a> | <a href="changepass.php?id=<?php echo $_SESSION['id'] ;?>">Change Password</a></div>
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
                    <h4>Welcome Eric Asman , every thing looks good!</h4>
                </div>
                <div class="col-lg-2"></div>

            </div>
        </div>
    </section>
 
<br>
 
<div class="content">

<section class="midcontent">
        <div class="container">
            <div class="row">
        <div class="col-lg-3 ">
<div class="d-grid gap-2 col-7 mx-auto butn" >
            <div><a href="index.php"><button class="btn btn-primary " >Home</button></a></div>
                <div><a href="place_quote.php"><button class="btn btn-primary">Place Quote</button></a></div>
                <div><a href="quoterecords.php"><button class="btn btn-primary active">Quote Records</button></a></div>
                <div><a href="order.php"><button class="btn btn-primary">Place Order</button></a></div>
                <div><a href="orderrecords.php "><button class="btn btn-primary ">Order Records</button></a></div>
                <div><a href=""><button class="btn btn-primary">Place Vector</button></a></div>
                <div><a href=""><button class="btn btn-primary">Vector Records</button></a></div>
                <div><a href=""><button class="btn btn-primary">Invoice</button></a></div>
                <div><a href=""><button class="btn btn-primary">My Profile</button></a></div>
                <div><a href="customer.php"><button class="btn btn-primary">Customers</button></a></div>

                <div><a href="logout.php"><button class="btn btn-primary">Logout</button></a></div>

                </div>  

        </div>
        <div class="col-lg-8">
            <div class="row"> -->
    
        <?php
include "../conn.php";
// $release = "release";

$sql = "SELECT * FROM placevector WHERE status = 'release'";
$result = mysqli_query($conn, $sql);
// -------------------------------
// $sql2="SELECT * FROM placevector WHERE status = '$release' ORDER BY date DESC ";


if ($result2=mysqli_query($conn,$sql))
  {

  $inquiry=mysqli_num_rows($result2);
  

  mysqli_free_result($result2);
  }

?>
<div>
<h4>Total Release Vectors:  <?php echo $inquiry;  ?> </h4>




</div>

<?php

// -------------------------------




if (mysqli_num_rows($result) > 0) {
    // output data of each row
    ?>
    <!--<br><br>-->
    <div class="ex1">
    <table id="jibran" class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white dl_btn">
        <thead>
    <tr>
            <th>VECTOR ID</th>
            <th>Name</th>
            <th>Company Name</th>
            <!--<th>Color</th>-->
            <!--<th>Instruction</th>-->
            <th>Image</th>
            <th>Image</th>
            <th>Urgent</th>
            <th>Date</th>
            <!--<th>Email</th>-->
            <th>Status</th>
            <th>Edit</th>

            <th>DELETE</th>
            <!-- <th>DETAIL</th> -->
            <!--<th>RELEASE</th>-->
            <th>PDF</th>



</tr>
</thead>

<?php
echo "<tbody>";
while($row = mysqli_fetch_assoc($result)) {
    $imageURL = '../upload/'.$row["image"];
    $imageURL1 = '../upload/'.$row["image1"];

    
    ?>
 <tr>


<td> VE: 1<?php echo $row["id"];?></td>
<!-- <td>    <img src="<?php echo $imageURL; ?>" alt="" height="50px" width="50px"/></td> -->

<td><?php echo $row["name"];?></td>
<?php
$email = $row["email"];
$sql1 = "SELECT company FROM signup WHERE email = '$email'";
  $result1 = mysqli_query($conn, $sql1);

  // Check if the query returned any results
  if (mysqli_num_rows($result1) > 0) {
    // Loop through the results and get the ID
    while ($row1 = mysqli_fetch_assoc($result1)) {
      $id = $row1["company"];
      // Do something with the ID, such as displaying it in the HTML
      echo "<td>$id</td>";
    }
  } else {
    // No results found for the specified email
    echo "<td>N/A</td>";
  }
?>
<!--<td><?php echo $row["required"];?></td>-->
<!--<td><?php echo $row["color"];?></td>-->
<!--<td><?php echo $row["ins"];?></td>-->
<td>  <a href="download_vector1.php?id=<?= $row["id"];?>">  <img src="<?php echo $imageURL; ?>" alt="" height="50px" width="50px"/></a></td>


<td> <a href="download_vector2.php?id=<?= $row["id"];?>">    <img src="<?php echo $imageURL1; ?>" alt="" height="50px" width="50px"/></a></td>

<!-- <td><?php echo $row["urgent"];?></td> -->
<?php
if ($row["urgent"] == "order is urgent") {
        echo "<td class='urgent'>" . $row["urgent"] . "</td>";
      } else {
        echo "<td>" . $row["urgent"] . "</td>";
      }
?>
<td><?php echo $row["date"];?></td>
<!--<td><?php echo $row["email"];?></td>-->
<td><?php echo $row["status"];?></td>
<!--<td><?php echo $row["edit"];?></td>-->
  <?php
    if ($row["edit"] == "0") {
      echo "<td>" . "No revision" . "</td>";
    } elseif ($row["edit"] == "1") {
      echo "<td>" . "R1" . "</td>";
    } else {
      echo "<td>" . "R2" . "</td>";
    }
  ?>





<td><a href="delete_vector.php?id=<?= $row["id"];?>"style="background-color:blue;">DELETE</a></td>
<!-- <td><a href="quotedetail.php?id=<?= $row["id"];?>">DETAIL</a></td> -->
<!--<td><a href="release_vector.php?id=<?= $row["id"];?>">RELEASE</a></td>-->
<td><a href="pdf_vector.php?id=<?= $row["id"];?>"style="background-color:blue;">PDF</a></td>



</tr>
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
