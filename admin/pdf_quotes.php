<?php
include "../conn.php";
require_once __DIR__ . '/vendor/autoload.php';

if(isset($_GET['id']) AND intval($_GET['id']) > 0){
    $id = $_GET["id"];

    $sql = "SELECT * FROM placequote where id = $id";

    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {

        while($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $name = $row['name'];
            $required = $row['required'];
            $height = $row['height'];
            $width = $row['width'];
            $fabric  = $row['fabric'];
            $placement = $row['placement'];
            $color = $row['color'];
            $ins = $row['ins'];
            $email = $row['email'];

            $sql1 = "SELECT id FROM signup where email = '$email'";
            $result1 = mysqli_query($conn, $sql1);

            if (mysqli_num_rows($result1) > 0) {
                while($row = mysqli_fetch_assoc($result1)) {
                    $cus_id = $row['id'];
                }
            }

            $mpdf = new \Mpdf\Mpdf();
            $data = "";
            $data .= "<h1>Quote Detail</h1>";
            $data .= "<table border='1'>";
            $data .= "<tr><th>Quote ID</th><td>QU-1$id</td></tr>";
            $data .= "<tr><th>Customer ID</th><td>$cus_id</td></tr>";
            $data .= "<tr><th>Name</th><td>$name</td></tr>";
            $data .= "<tr><th>Required</th><td>$required</td></tr>";
            $data .= "<tr><th>Height</th><td>$height</td></tr>";
            $data .= "<tr><th>Width</th><td>$width</td></tr>";
            $data .= "<tr><th>Placement</th><td>$placement</td></tr>";
            $data .= "<tr><th>Fabric</th><td>$fabric</td></tr>";
            $data .= "<tr><th>Color</th><td>$color</td></tr>";
            $data .= "<tr><th>Instructions</th><td>$ins</td></tr>";
            $data .= "</table>";

            $mpdf->WriteHtml($data);
            $mpdf->output("myfile.pdf","I");
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="POST">
        <input type="text" name="name" placeholder="enter your name">
        <input type="text" name="email" placeholder="enter your email">
        <button type="submit">submit</button>
    </form>
</body>
</html>
<?php
header('Location: https://localhost/arraysystemslimited/admin/index.php');
?>
