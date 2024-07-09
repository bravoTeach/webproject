<?php
session_start();
include "func.php";
wa_auth();
?>
<!DOCTYPE html>
<html>
<head>
<title>Invoice</title>
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
        .ex1 {
  background-color: lightblue;
  overflow: scroll;
  background-color: white;
}
.urgent{
    background-color: red;
}
</style>
</head>
<?php
include "nav.php";
?>
<div class="container">
    <div class="row">
        <div class="col-lg-12"> 
            <h1>Remaining Invoice</h1>
            <?php
include "../conn.php";
        $sql = "SELECT * FROM invoice WHERE status = 'remaining'";
        $result = mysqli_query($conn, $sql);
 if (mysqli_num_rows($result) > 0) {
    
    ?>
    <br><br>
    <div class="ex1">
    
    <table id="jibran" class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white dl_btn">
        <thead>
    <tr>
            <th>Invoice ID</th>
            <th>Total Amount</th>
            <th>Status</th>
            <th>Customer ID</th>
            <th>PAID</th>

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
<?php
$email = $row["email"];

// Use the email to get the ID from the signup table
$sql1 = "SELECT id FROM signup WHERE email = '$email'";
$result1 = mysqli_query($conn, $sql1);

// Check if the query returned any results
if (mysqli_num_rows($result1) > 0) {
  // Loop through the results and get the ID
  while ($row1 = mysqli_fetch_assoc($result1)) {
    $id = $row1["id"];
    // Do something with the ID, such as displaying it in the HTML
    echo "<td>$id</td>";
  }
} else {
  // No results found for the specified email
  echo "<td>N/A</td>";
}
?>

<td><a href="paid.php?id=<?php echo $row["id"];?>">Paid</a></td>


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
    <br><br>
    <div class="row">
        <div class="col-lg-12"> 
            <h1>Paid Invoice</h1>
            <?php
include "../conn.php";
        $sql = "SELECT * FROM invoice WHERE status = 'paid'";
        $result = mysqli_query($conn, $sql);
 if (mysqli_num_rows($result) > 0) {
    
    ?>
    <br><br>
    <div class="ex1">
    
    <table id="jibran" class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white dl_btn">
        <thead>
    <tr>
            <th>Invoice ID</th>
            <th>Total Amount</th>
            <th>Status</th>
            <th>Customer ID</th>
            <th>Delete</th>

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
<?php
$email = $row["email"];

// Use the email to get the ID from the signup table
$sql1 = "SELECT id FROM signup WHERE email = '$email'";
$result1 = mysqli_query($conn, $sql1);

// Check if the query returned any results
if (mysqli_num_rows($result1) > 0) {
  // Loop through the results and get the ID
  while ($row1 = mysqli_fetch_assoc($result1)) {
    $id = $row1["id"];
    // Do something with the ID, such as displaying it in the HTML
    echo "<td>$id</td>";
  }
} else {
  // No results found for the specified email
  echo "<td>N/A</td>";
}
?>

<td><a href="delete_invoice.php?id=<?php echo $row["id"];?>">Delete</a></td>


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
</div>
<br><br>

<script src = "jquery/jquery-3.6.4.js"></script>
<script src="DataTables/DataTables-1.13.4/js/jquery.dataTables.min.js"></script>
<script src="DataTables/DataTables-1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script>
$(document).ready(function(){
    $("#jibran").dataTable();
});
</script></body>
</html>
