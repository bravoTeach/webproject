<?php
include "conn.php";
session_start();
ob_start();

if (isset($_GET['download'])) {
    require_once('tcpdf/tcpdf.php');

    // Get customer information
    include "conn.php";
    // session_start();
    $email = $_SESSION['cus_email'];

    $sql = "SELECT * FROM signup WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $customer_info = "";
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $customer_info .= "<p>Company: " . $row["company"] . "</p>";
            $customer_info .= "<p>Name: " . $row["name"] . "</p>";
            $customer_info .= "<p>Email: " . $row["email"] . "</p>";
            $customer_info .= "<p>Address: " . $row["address"] . "</p>";
        }
    }

    // Get order information
    $id = $_GET["id1"];
    $totalAmount = $_GET["totalAmount"];
    $sql = "SELECT * FROM invoice_detail WHERE invoice_id=$id";
    $result = mysqli_query($conn, $sql);

    // Generate PDF
    $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Your Company');
    $pdf->SetTitle('Invoice');
    $pdf->SetSubject('Invoice');
    $pdf->SetKeywords('Invoice, PDF, TCPDF');
    $pdf->AddPage();

    // Set some styling
    $pdf->SetFont('helvetica', '', 12);
    $pdf->SetMargins(15, 15, 15);
    $pdf->SetHeaderMargin(0);
    $pdf->SetFooterMargin(0);

    // Add logo to the top left
    $logo = 'images/Logo-03.png'; // Replace with the path to your logo image
    $pdf->Image($logo, 10, 10, 30); // Adjust the coordinates and size as needed

    // Add customer information below the logo
    $pdf->SetY(40); // Adjust the Y-coordinate to position the customer information below the logo
    $pdf->writeHTML("<h3>Customer Information</h3>" . $customer_info, true, false, true, false, '');

    // Add order information
    $html = '<h3>Order Information</h3><table style="border-collapse: collapse; width: 100%;">
    <thead style="background-color: #ddd; font-weight: bold;">
      <tr>
        <td style="border: 1px solid #ccc; padding: 5px;">Order ID</td>
        <td style="border: 1px solid #ccc; padding: 5px;">Design Name</td>
        <td style="border: 1px solid #ccc; padding: 5px;">Status</td>
        <td style="border: 1px solid #ccc; padding: 5px;">Release Date</td>
        <td style="border: 1px solid #ccc; padding: 5px;">Amount</td>
      </tr>
    </thead>
    <tbody>';
    
    while ($row = mysqli_fetch_assoc($result)) {
        $html .= '<tr>
          <td style="border: 1px solid #ccc; padding: 5px;">' . $row["order_id"] . '</td>
          <td style="border: 1px solid #ccc; padding: 5px;">' . $row["order_name"] . '</td>
          <td style="border: 1px solid #ccc; padding: 5px;">Payable</td>
          <td style="border: 1px solid #ccc; padding: 5px;">' . $row["order_date"] . '</td>
          <td style="border: 1px solid #ccc; padding: 5px;">$' . $row["order_price"] . '</td>
        </tr>';
    }

    $html .= '<tr>
        <td colspan="4" style="border: 1px solid #ccc; padding: 5px; text-align: right;">Total Amount:</td>
        <td style="border: 1px solid #ccc; padding: 5px;">$' . $totalAmount . '</td>
    </tr></tbody></table>';
    $pdf->writeHTML($html, true, false, true, false, '');

    $pdf->Output('invoice.pdf', 'I');
    ob_end_flush();
    mysqli_close($conn);
}
?>
<?php

// session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/styling.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/styling.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-lg-6"><img src="images/Logo-03.png" alt="" height="100px" width="200px"></div>
      <div class="col-lg-3"></div>
      <div class="col-lg-3"><h1>INVOICE</h1></div>



    </div>
    <div class="row">
      <div class="col-lg-6">
        <h3>Customer Information</h3>
        <?php
        
        if(isset($_GET['id']) AND intval($_GET['id']) > 0){
            $id = $_GET['id'];
        
          
            $sql = "SELECT * FROM invoice_detail WHERE invoice_id=$id";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {  
          while($row = mysqli_fetch_assoc($result)) {

            $ids = $row['id'];
            $orderid = $row['order_id'];
            $ordername = $row['order_name'];
            $orderdate = $row['order_date'];
            $orderprice = $row['order_price'];
            $invoiceid = $row['invoice_id'];
            $totalamount = $row['total_amount'];
            $email = $row['cus_email'];



            

        }
      }
    }
    $sql1 = "SELECT * FROM signup WHERE email='$email'";

$result1 = mysqli_query($conn, $sql1);

if (mysqli_num_rows($result1) > 0) {  
    while($row1 = mysqli_fetch_assoc($result1)) {
     echo "Company: ".$row1["company"]."<br>"."<br>";
     echo "Name:    ".$row1["name"]."<br>"."<br>";
     echo "Email:   ".$row1["email"]."<br>"."<br>";
     echo "Address: ".$row1["address"]."<br>"."<br>";
  }}
        ?>
        <h3>Order Information</h3>
      </div>
      <div class="col-lg-6">
        <?php


      
?>

    </div>
    </div>
  </div>
  
<?php


?>
<div class="container">
  <div class="row">
    <div class="col-lg-12">




<table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white dl_btn">
  <thead>
    <tr>
      <th>Order ID</th>
      <th>Design Name</th>
      <th>Status</th>

      <th>Release Date</th>
      <th>Amount</th>
    </tr>
  </thead>
  <tbody>
    <?php
  if(isset($_GET['id']) AND intval($_GET['id']) > 0){
            $id1 = $_GET['id'];
        
          
            $sql = "SELECT * FROM invoice_detail WHERE invoice_id=$id1";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {  
          while($row = mysqli_fetch_assoc($result)) {

            $ids = $row['id'];
            $orderid = $row['order_id'];
            $ordername = $row['order_name'];
            $orderdate = $row['order_date'];
            $orderprice = $row['order_price'];
            $invoiceid = $row['invoice_id'];
            $totalamount = $row['total_amount'];
            $email = $row['cus_email'];



            

        
    ?>

      <tr>
        <td><?php echo $row["order_id"]; ?></td>
        <td><?php echo $row["order_name"]; ?></td>
        <td><?php echo "Payable" ?></td>
        <td><?php echo $row["order_date"]; ?></td>
        <td><?php echo "$".$row["order_price"]; ?></td>
      </tr>


<?php
        }
      }
    }
    
    ?>
  </tbody>
</table>
</div>
  </div>
  <br>
  <div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-3"></div>
    <div class="col-lg-3"></div>
    <div class="col-lg-3"><p>Total amount: $<?php echo $totalamount; ?></p>
  
  
  
    <form action='https://www.2checkout.com/checkout/purchase' method='post' target='_blank'>
        <input type="hidden" name="sid" value="253800487474">
        <input type="hidden" name="mode" value="2CO">
        <input type="hidden" name="li_0_name" value="Digitizing & Vector Services:">
        <input type="hidden" name="li_0_price" value='<?=$totalamount?>'>
        <input type="hidden" name="li_0_quantity" value="1">
        <input type="hidden" name="currency_code" value="USD">
        <input type="hidden" name="x_receipt_link_url" value="https://localhost/arraysystemslimited/index.php">
        <input name='submit' class="btn-danger" type='submit' value='PAYNOW' />
    </form>
    <script src="https://www.2checkout.com/checkout/api/2co.min.js"></script>
</div>
<div class="col-lg-4"></div>

</div>
</div>
  </section>
  <!--<script src="https://www.2checkout.com/checkout/api/2co.min.js"></script>-->
  </div>


  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-2"></div> 
    <div class="col-lg-2"></div> 
    <div class="col-lg-2"></div> 
    <div class="col-lg-2"></div> 
    <div class="col-lg-2"><form action="detail_invoice.php" method="get" target='_blank'>
  <input type="hidden" name="totalAmount" value='<?php echo $totalamount; ?>'>
  <input type="hidden" name="id1" value='<?php echo $id1; ?>'>
  <input type="hidden" name="email" value='<?php echo $email; ?>'>


  <button type="submit" name="download">Download Invoice</button>
</form></div> 

  </div>
</div>

</body>
</html>
