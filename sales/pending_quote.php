<?php
session_start();
include "func.php";
wa_auth();
?>
<!DOCTYPE html>
<html>
<head>
<title>Pending Quotes</title>
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

<br><br>

    
        <?php
include "../conn.php";
$user = "SELECT user FROM signup WHERE ref = '{$_SESSION['salesuser']}'";
$userss = mysqli_query($conn, $user);
$sales = $_SESSION['salesuser'];
if (mysqli_num_rows($userss) > 0) {
    $ordersQuery = "SELECT * FROM placequote WHERE user = '$sales' AND status = 'in process' AND edit = 0";
    $ordersResult = mysqli_query($conn, $ordersQuery);

    if (mysqli_num_rows($ordersResult) > 0) {
        ?>
        <br><br>
        <div class="ex1">
        <table id="jibran" class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white dl_btn">
            <thead>
                <tr>
                    <th>ORDER ID</th>
                    <th>Name</th>
                    <th>Customer id</th>
                    <th>Required</th>
                    <th>Height</th>
                    <th>Width</th>
                    <th>Fabric</th>
                    <th>Placement</th>
                    <th>Color</th>
                    <th>Instruction</th>
                    <th>Image</th>
                    <th>Image</th>
                    <th>Urgent</th>
                    <th>Date</th>
                    <th>Email</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row2 = mysqli_fetch_assoc($ordersResult)) {
                    $imageURL = '../upload/' . $row2["image"];
                    $imageURL1 = '../upload/' . $row2["image1"];
                    ?>
                    <tr>
                        <td>OR:<?php echo "1".$row2["id"]; ?></td>
                        <td><?php echo $row2["name"]; ?></td>
                        <?php
                        $email = $row2["email"];
                        $sql1 = "SELECT id FROM signup WHERE email = '$email'";
                        $result1 = mysqli_query($conn, $sql1);
    
                        if (mysqli_num_rows($result1) > 0) {
                            while ($row1 = mysqli_fetch_assoc($result1)) {
                                $id = $row1["id"];
                                echo "<td>$id</td>";
                            }
                        } else {
                            echo "<td>N/A</td>";
                        }
                        ?>
                        <td><?php echo $row2["required"]; ?></td>
                        <td><?php echo $row2["height"]; ?></td>
                        <td><?php echo $row2["width"]; ?></td>
                        <td><?php echo $row2["fabric"]; ?></td>
                        <td><?php echo $row2["placement"]; ?></td>
                        <td><?php echo $row2["color"]; ?></td>
                        <td><?php echo $row2["ins"]; ?></td>
                        <td><img src="<?php echo $imageURL; ?>" alt="" height="50px" width="50px"/></td>
                        <td><img src="<?php echo $imageURL1; ?>" alt="" height="50px" width="50px"/></td>
                        <?php
                        if ($row2["urgent"] == "order is urgent") {
                            echo "<td class='urgent'>" . $row2["urgent"] . "</td>";
                        } else {
                            echo "<td>" . $row2["urgent"] . "</td>";
                        }
                        ?>
                        <td><?php echo $row2["date"]; ?></td>
                        <td><?php echo $row2["email"]; ?></td>
                        <td><?php echo $row2["status"]; ?></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
        </div>
        <?php
    } else {
        echo "0 results";
    }
} else {
    echo "0 results";
}
?>
</div>
</div>

        <div class="col-lg-1"></div>
        </div>
        </div>
        </div>
    </section>
    <br>
<div class="">
    <!-- <div class="container sep"></div> -->
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
