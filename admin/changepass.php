<?php
session_start();
include "func.php";
// wa_auth();
include "../conn.php";


if(isset($_GET['id']) AND intval($_GET['id']) > 0){
    $id = $_GET['id'];
  
    $sql = "SELECT * FROM admin WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
  
       while($row = mysqli_fetch_assoc($result)) {
        $userid = $row['userid'];
        $pass1 = $row['pass'];
  
        
        
       
       
        
      }
    } else {
      header('Location: https://localhost/arraysystemslimited/admin/changepass.php?type=error&msg='.urlencode("Invalid User found"));
    }
  }
  else{
    header('Location: http://localhost/arraysystemslimited/admin/changepass.php?type=error&msg='.urlencode("Invalid User found"));
  }

 
if(count($_POST) > 0)
{

//   $userid = $_POST['userid'];
  $pass = $_POST['pass'];
  $oldpass = $_POST['oldpass'];

if ($oldpass == $pass1) {
    


$sql = "UPDATE admin 
    SET 
      
      `pass`='$pass' 

      



    WHERE id=$id";


  if (mysqli_query($conn, $sql)) {
    $is_insert = true;
    // $msg = "Record Updated successfully";
    echo "<script>alert('Password changed successfully')</script>";
    


  } else {
    $is_insert = false;
    $msg = "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}
else {
    echo "<script>alert('You Enter wrong password')</script>";
    
}
}

?>


<!DOCTYPE html>
<html>
<head>
<title>User Management</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
.form{
    border: 3px solid grey;
    padding-left: 30px;
}
</style>

</head>
<body class="w3-light-grey">



    <div class="container">
        <br><br>
        <div>
    <a href="index.php"><button class="w3-button w3-dark-grey">Back<i class="fa fa-arrow-left"></i></button>
</a>
</div>
    <br><br><br>

    <form action="" method="POST" enctype="multipart/form-data">
    <div class="form">    
    <br><br>
        
    <div class="form-outline ">
  <tr>
        <td height="35" class="form_left_text"> Old Password: </td>
        <td height="25" colspan="2" class="form">
          <input name="oldpass" class="user-passbox4" value=''id="oldpass" size="51" required>
          <span class="green">*</span></td>
      </tr></div>
      <br>
 
  <!-- <div class="form-outline ">
  <tr>
        <td height="35" class="form_left_text"> User ID: </td>
        <td height="25" colspan="2" class="form">
          <input name="userid" class="user-passbox4" value=''id="userid" size="51" required>
          <span class="green">*</span></td>
      </tr></div>
      <br> -->

 
  
  <div class="form-outline ">
  <tr>

    
        <td height="35" class="form_left_text "> New Password: </td>
        <td height="25" colspan="2" class="form">
          <input name="pass" class="user-passbox4"value='' id="pass" size="49" required>
          <span class="green">*</span></td>
      </tr></div>
      <br>

  <button type="submit" name="submit"class="btn btn-primary" value="upload">upload</button>
<br><br>
</div>
</form>

  </div>
    
  </div>
  </div>

  
</div>

<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
    overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = 'block';
    overlayBg.style.display = "block";
  }
}

// Close the sidebar with the close button
function w3_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
}
</script>

</body>
</html>