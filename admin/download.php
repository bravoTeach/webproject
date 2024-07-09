<?php
include "../conn.php";

$id = $_GET['id'];
$stmt = mysqli_query($conn, "SELECT image, image1 FROM placeorder WHERE id=$id");
$count = mysqli_num_rows($stmt);

if ($count == 1) {
    $row = mysqli_fetch_array($stmt);
    $image = $row['image'];
    $image2 = $row['image1'];

    if ($image2) { // Check if the second image exists
        $file1 = '../upload/' . $image;
        $file2 = '../upload/' . $image2;

        if (headers_sent()) {
            echo 'HTTP header already sent';
        } else {
            ob_end_clean();
            header("Content-Type: application/image");
            header("Content-Disposition: attachment; filename=\"".basename($file1)."\"");
            readfile($file1);
            header("Content-Type: application/image");
            header("Content-Disposition: attachment; filename=\"".basename($file2)."\"");
            readfile($file2);
            exit;
        }
    } else { // If only one image exists, serve it as before
        $file = '../upload/' . $image;

        if (headers_sent()) {
            echo 'HTTP header already sent';
        } else {
            ob_end_clean();
            header("Content-Type: application/image");
            header("Content-Disposition: attachment; filename=\"".basename($file)."\"");
            readfile($file);
            exit;  
        }
    }
} else {
    echo 'File not found '; 
} 
?>
