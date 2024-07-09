<?php
session_start();
ob_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $start_date = $_POST["start_date"];
    $end_date = $_POST["end_date"];
    $type = $_POST["type"];

require_once('../tcpdf/tcpdf.php');

// Get customer information
// include "../conn.php";
// session_start();

if (!empty($type)) {
  include "../conn.php";
$sales =  $_SESSION['salesuser'];
  // Prepare the SQL query
  $sql = "SELECT * FROM $type 
  WHERE rec_date BETWEEN '$start_date' AND '$end_date' 
  AND user = '$sales'
  GROUP BY orderid";


  $sales = $_SESSION['salesuser'];
$result = mysqli_query($conn, $sql);
// $customer_info = "";
// if (mysqli_num_rows($result) > 0) {  
//   while($row = mysqli_fetch_assoc($result)) {
//     $customer_info .= "<p>Name: ".$row["name"]."</p>";
//     $customer_info .= "<p>ID:    ".$row["id"]."</p>";
//     $customer_info .= "<p>Email:   ".$row["email"]."</p>";
//     $customer_info .= "<p>user: ".$row["user"]."</p>";
//   }
// }

// Get order information
// $data = json_decode($_GET["data"], true);

// Generate PDF
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Select Digitizing');
$pdf->SetTitle('Report');
$pdf->SetSubject('Report');
$pdf->SetKeywords('Report, PDF, TCPDF');
$pdf->AddPage();

// Set some styling
$pdf->SetFont('helvetica', '', 12);
$pdf->SetMargins(15, 15, 15);
$pdf->SetHeaderMargin(0);
$pdf->SetFooterMargin(0);

// Add customer information
$pdf->writeHTML("<h3 style='display: inline-block; margin: 0;'>Sales Person: </h3><span style='display: inline-block; margin: 0;'>".$sales."</span>");
$pdf->writeHTML("<h3 style='display: inline-block; margin: 0;'>Start Date: </h3><span style='display: inline-block; margin: 0;'>".$start_date."</span>");
$pdf->writeHTML("<h3 style='display: inline-block; margin: 0;'>End Date: </h3><span style='display: inline-block; margin: 0;'>".$end_date."</span>");

$pdf->writeHTML("<h3 style='display: inline-block; margin: 0;'>Order Type: </h3><span style='display: inline-block; margin: 0;'>".$type."</span>");



// Add order information
// ... Your previous code ...

// Add order information
$html = '<h3>Sales Report</h3><table style="border-collapse: collapse; width: 100%;">
<thead style="background-color: #ddd; font-weight: bold;">
  <tr>
    <td style="border: 1px solid #ccc; padding: 5px;">S.No.</td>
    <td style="border: 1px solid #ccc; padding: 5px;">Order ID</td>
    <td style="border: 1px solid #ccc; padding: 5px;">Design Name</td>
    <td style="border: 1px solid #ccc; padding: 5px;">Amount in USD</td>
  </tr>
</thead>
<tbody>';

$totalAmount = 0; // Variable to store the total amount

foreach ($result as $key => $row) {
  $serialNumber = $key + 1; // Calculate the serial number

  $html .= '<tr>
    <td style="border: 1px solid #ccc; padding: 5px;">'.$serialNumber.'</td>
    <td style="border: 1px solid #ccc; padding: 5px;">'."1".$row["orderid"].'</td>
    <td style="border: 1px solid #ccc; padding: 5px;">'.$row["ordername"].'</td>
    <td style="border: 1px solid #ccc; padding: 5px;">'.$row["price"].'</td>
  </tr>';

  // Calculate the total amount
  $totalAmount += $row["price"];
}

$html .= '</tbody></table>';

// Add the total amount to the PDF content
$html .= '<p style="text-align: right;">Total Amount: $'.$totalAmount.'</p>';

$pdf->writeHTML($html, true, false, true, false, '');

// ... Your previous code ...


$pdf->Output('sales_report.pdf', 'I');
ob_end_flush(); 
mysqli_close($conn);
}
}


include "../conn.php";
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
      .report h1{
        text-align: center;
      }
      .report form{
        /* border: 5px solid grey; */
      }
      .btnnnn input{
        background-color: red;
        color: white;



      }
      .btnnnn{
        text-align: right;
      }
      
    </style>
</head>
<?php
include "nav.php";
include "../conn.php";
session_start();

$sales = $_SESSION['salesuser'];
// echo $sales;

$sql="SELECT * FROM placeorder
WHERE user = '$sales'
AND status = 'in process'";

$sql1="SELECT * FROM placequote
WHERE user = '$sales'
AND status = 'in process'";

$sql2="SELECT * FROM placevector
WHERE user = '$sales'
AND status = 'in process'";




if ($result=mysqli_query($conn,$sql))
  {

  $order=mysqli_num_rows($result);
  

  mysqli_free_result($result);
  }


if ($result1=mysqli_query($conn,$sql1))
  {

  $quote=mysqli_num_rows($result1);
  
  
  
  mysqli_free_result($result1);
  }


if ($result2=mysqli_query($conn,$sql2))
  {
      $vector=mysqli_num_rows($result2);
  
 
  mysqli_free_result($result2);
  }

mysqli_close($conn);
?>
<br><br><br>
<!-- <h1>Sales Panel</h1> -->
<div class="boxes">
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
      <a href="logout.php">
      <div class="w3-container w3-orange w3-text-white w3-padding-16">
        <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
        <div class="w3-right">
          <!-- <h3><?php echo $user;  ?></h3> -->
        </div>
        <div class="w3-clear"></div>
        <h4>Logout</h4>
      </div>
    </div>
    </a>
  </div>
  </div>
<?php

?>

<!-- HTML form with the report button -->
<div class="report">
<h1>Generate Report from here</h1>
<div class="container">
  <div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-4">
    <form action="index.php" method="POST">
    <h4>Select Date Range</h4>
        <label for="start_date">Start Date:</label>
        <select name="start_date" id="start_date">
            <?php
            // Generate dropdown options for start date
            for ($date = strtotime('2023-01-01'); $date <= strtotime('2023-12-31'); $date += 86400) {
                $option = date('Y-m-d', $date);
                echo "<option value='$option'>$option</option>";
            }
            ?>
        </select>

        <br><br>

        <label for="end_date">End Date:</label>
        <select name="end_date" id="end_date">
            <?php
            // Generate dropdown options for end date
            for ($date = strtotime('2023-01-01'); $date <= strtotime('2023-12-31'); $date += 86400) {
                $option = date('Y-m-d', $date);
                echo "<option value='$option'>$option</option>";
            }
            ?>
        </select>

        <br><br>
        <!-- <br><br> -->

    <label for="type">Type:</label>
    <select name="type" id="type">
        <option value="release_order">Order</option>
        <option value="release_vector">Vector</option>
        <option value="release_quote">Quote</option>
    </select>

    <br><br>
<div class="btnnnn">
        <input type="submit" value="Generate Report" target="_blank">
        </div>
    </form>
    </div>
    </div>
    <div class="col-lg-5"></div>
  </div>
</div>
</body>
</html>