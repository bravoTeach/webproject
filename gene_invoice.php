<?php
// include "func_cus.php";
// wa_auth();
session_start();
$Last_id = " ";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
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
            <div><a href="index.php"><button class="btn btn-primary active" >Home</button></a></div>
                <div><a href="place_quote.php"><button class="btn btn-primary">Place Quote</button></a></div>
                <div><a href="cus_quote_records.php?id=<?php echo $_SESSION['id'] ;?>"><button class="btn btn-primary">Quote Records</button></a></div>
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
        <div class="col-lg-8 invoice">
            <h1>INVOICES</h1>
            <div class="row inv">
            <div class="col-lg-4"> <a href="gene_invoice.php"><h3>Generate Invoice</h3></a></div>
                <div class="col-lg-4"><a href="paid_invoice.php"><h3>Paid Invoice</h3></a></div>
                <div class="col-lg-4"><a href="payable.php"><h3>Payable Invoice</h3></a></div>
            

    </div>
    <div class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
        <div class="border border-dark">Total amount: $<span id="totalAmount">0.00</span></div>

<button onclick="generateInvoice()">Generate Invoice</button>
    
        </div>

    </div>
    <div class="row">
        <?php

    // if(isset($_GET['id']) AND intval($_GET['id']) > 0){
        //   $id = $_GET['id'];
        //   echo $id;

          $email = $_SESSION['cus_email'];
        //   echo $email;
          $sql = "SELECT DISTINCT orderid,ordername,price,rec_date FROM release_order WHERE email = '$email' AND status = 'remaining'";
          $sql1 = "SELECT DISTINCT orderid,ordername,price,rec_date FROM release_vector WHERE email = '$email' AND status = 'remaining'";
          $sql2 = "SELECT DISTINCT orderid,ordername,price,rec_date FROM release_quote WHERE email = '$email' AND status = 'remaining'";
          
          $result = mysqli_query($conn, $sql);
          $result1 = mysqli_query($conn, $sql1);
          $result2 = mysqli_query($conn, $sql2);
          if (mysqli_num_rows($result) > 0 || mysqli_num_rows($result1) > 0 || mysqli_num_rows($result2) > 0) {
       
        // output data of each row
        ?>
        <br><br>
        <div class="ex1">
        
        <table id="" class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white dl_btn">
            <thead>
        <tr>
                <th>Order ID</th>
                <th>Design Name</th>
                <th>Date</th>
                <th>Paid</th>
                <th>Payable</th>
                <th>Select</th>
            </tr>
            </thead>
    
    <?php
     echo "<tbody>";
    while($row = mysqli_fetch_assoc($result)) {
        ?>
     <tr>
    
    

    <td>OR:1<?php echo $row["orderid"];?></td>
    <td><?php echo $row["ordername"];?></td>
    <td><?php echo $row["rec_date"];?></td>
    <td><?php echo "-";?></td>
    <!-- <td><?php echo $row["price"];
     $price = $row['price'];
    ?></td> -->
    <td class="price"><?php echo $row["price"];?></td>
    <!-- <td><?php echo "s";?></td> -->
    <!-- <td><input type="checkbox" class="selectRow"></td>
 -->
 <td><input type="checkbox" class="selectRow" name="selected_orders[]" value="<?php echo $row['orderid']; ?>" onclick="sendOrderID(this);">



   
    </tr>
    <?php
    }

    while($row1 = mysqli_fetch_assoc($result1)) {
        ?>
     <tr>
    
    

    <td>VE:1<?php echo $row1["orderid"];?></td>
    <td><?php echo $row1["ordername"];?></td>
    <td><?php echo $row1["date"];?></td>
    <td><?php echo "-";?></td>
    <!-- <td><?php echo $row1["price"];
     $price = $row1['price'];
    ?></td> -->
    <td class="price"><?php echo $row1["price"];?></td>
    <!-- <td><?php echo "s";?></td> -->
    <!-- <td><input type="checkbox" class="selectRow"></td>
 -->
 <td><input type="checkbox" class="selectRow" name="selected_orders[]" value="<?php echo $row1['orderid']; ?>" onclick="sendVectorID(this);">



   
    </tr>
    <?php
    }
    // while($row2 = mysqli_fetch_assoc($result2)) {
        ?>
 
    <?php
    // }
     echo "</tbody>";
    

    ?>
    </table>
<?php
}

?>

    </div>
        </div>


<script>
    var totalAmount = 0;
    var selectedOrders = [];
    var selectedOrders1 = [];
    // var selectedOrders2 = [];

    function sendOrderID(checkbox) {
        if (checkbox.checked) {
            selectedOrders.push(checkbox.value);
        } else {
            var index = selectedOrders.indexOf(checkbox.value);
            if (index !== -1) {
                selectedOrders.splice(index, 1);
            }
        }
    }

    function sendVectorID(checkbox) {
        if (checkbox.checked) {
            selectedOrders1.push(checkbox.value);
        } else {
            var index = selectedOrders1.indexOf(checkbox.value);
            if (index !== -1) {
                selectedOrders1.splice(index, 1);
            }
        }
    }

    // function sendQuoteID(checkbox) {
    //     if (checkbox.checked) {
    //         selectedOrders2.push(checkbox.value);
    //     } else {
    //         var index = selectedOrders2.indexOf(checkbox.value);
    //         if (index !== -1) {
    //             selectedOrders2.splice(index, 1);
    //         }
    //     }
    // }

    function generateInvoice() {
        // Update status
        if (selectedOrders.length > 0 || selectedOrders1.length > 0) {
           
            var url = "update_status.php?selected_orders1=" + encodeURIComponent(selectedOrders.join(","));
            var url1 = "update_status1.php?selected_orders=" + encodeURIComponent(selectedOrders1.join(","));
        
        // var url2 = "update_status2.php?selected_orders=" + encodeURIComponent(selectedOrders2.join(","));

        // Call an API to update the status in the database
            Promise.all([
                fetch(url1),
               fetch(url)
        
                //   fetch(url2)
    ])

    .then(responses => {
                    if (responses.every(response => response.ok)) {
                        // Status updated successfully, generate invoice
                        var selectedRows = document.querySelectorAll("table tbody tr td input[type=checkbox]:checked");
                        if (selectedRows.length == 0) {
                            alert("Please select at least one row to generate the invoice.");
                            return;
                        }
                        totalAmount = 0; // reset total amount
                        var data = [];
                        for (var i = 0; i < selectedRows.length; i++) {
                            var row = selectedRows[i].parentNode.parentNode;
                            var cells = row.getElementsByTagName("td");
                            var rowData = {
                                orderID: cells[0].textContent.trim(),
                                orderName: cells[1].textContent.trim(),
                                date: cells[2].textContent.trim(),
                                price: cells[4].textContent.trim()
                            };
                            totalAmount += parseFloat(rowData.price);
                            data.push(rowData);
                        }
                        // window.location.href = "generate_invoice.php?totalAmount=" + totalAmount + "&data=" + JSON.stringify(data);
                        window.open("generate_invoice.php?totalAmount=" + totalAmount + "&data=" + JSON.stringify(data), "_blank");

                    } else {
                        // Error occurred while updating status
                        console.error("Error occurred while updating status:");
//   console.log(responses);
  alert("Error occurred while updating status. Please try again later.");
                    }
                })
                .catch(error => {
                    console.error("Error occurred while updating status: " + error.message);
                    alert("Error occurred while updating status. Please try again later.");
                });
        } else {
            alert("Please select at least one row to update the status.");
        }
    }




    // add event listener to all checkboxes with class 'selectRow'
    var checkboxes = document.querySelectorAll('.selectRow');
    for (var i = 0; i < checkboxes.length; i++) {
        checkboxes[i].addEventListener('click', function() {
            // get the row of the clicked checkbox
            var row = this.closest('tr');

            // get the price from the row and convert to number
            var price = Number(row.querySelector('.price').textContent);

            // add or subtract the price based on the checkbox status
            if (this.checked) {
                totalAmount += price;
            } else {
                totalAmount -= price;
            }

            // update the total amount element with the new value
            document.querySelector('#totalAmount').textContent = totalAmount.toFixed(2);

            // update the selected orders array
            sendOrderID(this);
            sendVectorID(this);
            // sendQuoteID(this);

        });
    }
</script>

</body>
</html>