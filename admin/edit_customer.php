<?php
session_start();
include "func.php";
// wa_auth();
include "../conn.php";

if(count($_POST) > 0)
{

  $id = $_POST['id'];
  $name = $_POST['name'];
  $company = $_POST['company'];
  $asi = $_POST['asi'];
  $type = $_POST['type'];
  $phone = $_POST['phone'];
  $phone2 = $_POST['phone2'];
  $cell = $_POST['cell'];
  $fax = $_POST['fax'];
  $email = $_POST['email'];
  $email2 = $_POST['email2'];
  $email3 = $_POST['email3'];
  $email4 = $_POST['email4'];
  $address = $_POST['address'];
  $city = $_POST['city'];
  $state = $_POST['state'];
  $zip = $_POST['zip'];
  $country = $_POST['country'];
  $user = $_POST['user'];
  $pass = $_POST['pass'];
  $ref = $_POST['ref'];

$sql = "UPDATE signup 
    SET 
      `name`='$name',
      `company`='$company',
      `asi`='$asi',
      `type`='$type',
      
      `phone`='$phone',
      `phone2`='$phone2',
      `cell`='$cell',
      `fax`='$fax',
      `email`='$email',
      `email2`='$email2',
      `email3`='$email3',
      `email4`='$email4',
      `address`='$address',
      `city`='$city',
      `state`='$state',
      `zip`='$zip',
      `country`='$country',
      `user`='$user',
      `pass`='$pass',
      `ref`='$ref'

      



    WHERE id=$id";


  if (mysqli_query($conn, $sql)) {
    $is_insert = true;
    // $msg = "Record Updated successfully";
    echo "<script>alert('updated successfully');
    window.location.href ='customer.php'</script>";


  } else {
    $is_insert = false;
    $msg = "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}

if(isset($_GET['id']) AND intval($_GET['id']) > 0){
  $id = $_GET['id'];

  $sql = "SELECT * FROM signup WHERE id=$id";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {

     while($row = mysqli_fetch_assoc($result)) {
      $id = $row['id'];
      $name = $row['name'];
      $company = $row['company'];
      $asi = $row['asi'];
      $type = $row['type'];
      $phone = $row['phone'];
      $phone2 = $row['phone2'];
      $cell = $row['cell'];
      $fax = $row['fax'];
      $email = $row['email'];
      $email2 = $row['email2'];
      $email3 = $row['email3'];
      $email4 = $row['email4'];
      $address = $row['address'];
      $city = $row['city'];
      $state = $row['state'];
      $zip = $row['zip'];
      $country = $row['country'];
      $user = $row['user'];
      $pass = $row['pass'];
      $ref = $row['ref'];
      
     
     
      
    }
  } else {
    header('Location: https://localhost/arraysystemslimited/admin/customer.php?type=error&msg='.urlencode("Invalid User found"));
  }
}
else{
  header('Location: http://localhost/arraysystemslimited/admin/customer.php?type=error&msg='.urlencode("Invalid User found"));
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
</style>
</head>
<body class="w3-light-grey">



    <div class="container">
  
    <?php 
    if(count($_POST) > 0)
    {
      if($is_insert == true)
      {
        echo '<div class="alert alert-success">'.$msg.'<strong>Success!</strong> </div>';
      }
      else{
        echo '<div class="alert alert-danger">'.$msg.'<strong>Error!</strong> </div>';
      }
    }
    ?>

    <form action="" method="POST" enctype="multipart/form-data">
  <!-- Name input -->
  <div class="form-outline ">
  <tr>
        <td height="35" class="form_left_text"> Contact Name: </td>
        <td height="25" colspan="2" class="form">
          <input name="name" class="user-passbox4" value='<?=$name?>'id="txtDesignName" size="51" >
          <span class="green">*</span></td>
      </tr></div>
      <br>

  <!-- Email input -->
  
  <div class="form-outline ">
  <tr>

    
        <td height="35" class="form_left_text "> ID: </td>
        <td height="25" colspan="2" class="form">
          <input name="id" class="user-passbox4"value='<?=$id?>' id="txtDesignName" size="49" >
          <span class="green">*</span></td>
      </tr></div>
      <br>

  <div class="form-outline ">
  <tr>

    
        <td height="35" class="form_left_text"> Company Name: </td>
        <td height="25" colspan="2" class="form">
          <input name="company" class="user-passbox4"value='<?=$company?>' id="txtDesignName" size="49" >
          <span class="green">*</span></td>
      </tr></div>
      <br>

   <!-- Email input -->
   <div class="form-outline ">
  <tr>
        <td height="35" class="form_left_text"> ASI Number: </td>
        <td height="25" colspan="2" class="form">
          <input name="asi" class="user-passbox4"value='<?=$asi?>'id="txtDesignName" size="53" >
          <span class="green">*</span></td>
      </tr></div>
      <br>

   <!-- Email input -->
   <div class="form-outline ">
  <tr>
        <td height="35" class="form_left_text"> Company Type: </td>
        <td height="25" colspan="2" class="form">
          <input name="type" class="user-passbox4" value='<?=$type?>'id="txtDesignName" size="50" >
          <span class="green">*</span></td>
        
      </tr></div>
      <br>

   <!-- Email input -->
   <div class="form-outline ">
  <tr>
        <td height="35" class="form_left_text"> Phone: </td>
        <td height="25" colspan="2" class="form">
          <input name="phone" class="user-passbox4"value='<?=$phone?>' id="txtDesignName" size="58" >
          <span class="green">*</span></td>
      </tr></div>
      <br>
<!-- Email input -->
<div class="form-outline ">
  <tr>
        <td height="35" class="form_left_text"> Phone2: </td>
        <td height="25" colspan="2" class="form">
          <input name="phone2" class="user-passbox4"value='<?=$phone2?>' id="txtDesignName" size="57" >
          <span class="green">*</span></td>
      </tr></div>
      <br>
      <!-- Email input -->
   <div class="form-outline ">
  <tr>
        <td height="35" class="form_left_text"> Cell: </td>
        <td height="25" colspan="2" class="form">
          <input name="cell" class="user-passbox4" value='<?=$cell?>'id="txtDesignName" size="61" >
          <span class="green">*</span></td>
      </tr></div>
      <br>
   <!-- Email input -->
   <div class="form-outline ">
  <tr>
        <td height="35" class="form_left_text"> Fax: </td>
        <td height="25" colspan="2" class="form">
          <input name="fax" class="user-passbox4" value='<?=$fax?>'id="txtDesignName" size="61" >
          <span class="green">*</span></td>
      </tr></div>
      <br>


 <!-- Email input -->
 <div class="form-outline ">
  <tr>
        <td height="35" class="form_left_text"> Email Address: </td>
        <td height="25" colspan="2" class="form">
          <input name="email" class="user-passbox4" value='<?=$email?>'id="txtDesignName" size="51" >
          <span class="green">*</span></td>
      </tr></div>
      <br>
 <!-- Email input -->
 <div class="form-outline ">
  <tr>
        <td height="35" class="form_left_text"> Email Address2: </td>
        <td height="25" colspan="2" class="form">
          <input name="email2" class="user-passbox4" value='<?=$email2?>'id="txtDesignName" size="50" >
          <span class="green">*</span></td>
      </tr></div>
      <br>
 <!-- Email input -->
 <div class="form-outline ">
  <tr>
        <td height="35" class="form_left_text"> Email Address3: </td>
        <td height="25" colspan="2" class="form">
          <input name="email3" class="user-passbox4" value='<?=$email3?>'id="txtDesignName" size="50" >
          <span class="green">*</span></td>
      </tr></div>
      <br>
 <!-- Email input -->
 <div class="form-outline ">
  <tr>
        <td height="35" class="form_left_text"> Email Address4: </td>
        <td height="25" colspan="2" class="form">
          <input name="email4" class="user-passbox4" value='<?=$email4?>'id="txtDesignName" size="50" >
          <span class="green">*</span></td>
      </tr></div>
      <br>
 <!-- Email input -->
 <div class="form-outline ">
  <tr>
        <td height="35" class="form_left_text"> Address: </td>
        <td height="25" colspan="2" class="form">
          <input name="address" class="user-passbox4" value='<?=$address?>'id="txtDesignName" size="57" >
          <span class="green">*</span></td>
      </tr></div>
      <br>
 <!-- Email input -->
 <div class="form-outline ">
  <tr>
        <td height="35" class="form_left_text"> City: </td>
        <td height="25" colspan="2" class="form">
          <input name="city" class="user-passbox4" value='<?=$city?>'id="txtDesignName" size="61" >
          <span class="green">*</span></td>
      </tr></div>
      <br>
 <!-- Email input -->
 <div class="form-outline ">
  <tr>
        <td height="35" class="form_left_text"> State: </td>
        <td height="25" colspan="2" class="form">
          <input name="state" class="user-passbox4"value='<?=$state?>' id="txtDesignName" size="60" >
          <span class="green">*</span></td>
      </tr></div>
      <br>
 <!-- Email input -->
 <div class="form-outline ">
  <tr>
        <td height="35" class="form_left_text"> Zip Code: </td>
        <td height="25" colspan="2" class="form">
          <input name="zip" class="user-passbox4"value='<?=$zip?>' id="txtDesignName" size="56" >
          <span class="green">*</span></td>
      </tr></div>
      <br>
    <!-- Email input -->
    <div class="form-outline ">
  <tr>
        <td height="35" class="form_left_text"> Country: </td>
        <td height="25" colspan="2" class="form">
          <input name="country" class="user-passbox4" value='<?=$country?>'id="txtDesignName" size="57" >
          <span class="green">*</span></td>
        
      </tr></div>
      <br>
  <!-- Email input -->
  <div class="form-outline ">
  <tr>
        <td height="35" class="form_left_text"> User ID: </td>
        <td height="25" colspan="2" class="form">
          <input name="user" class="user-passbox4" value='<?=$user?>'id="txtDesignName" size="57" >
          <span class="green">*</span></td>
      </tr></div>
      <br>
 <!-- Email input -->
   <div class="form-outline ">
  <tr>
        <td height="35" class="form_left_text"> Password: </td>
        <td height="25" colspan="2" class="form">
          <input name="pass" class="user-passbox4"value='<?=$pass?>' id="txtDesignName" size="55" >
          <span class="green">*</span></td>
      </tr></div>
      <br>
      <!-- Email input -->
     <div class="form-outline">
    <tr>
        <td height="35" class="form_left_text"> Reference: </td>
        <td height="25" colspan="2" class="form">
            <select name="ref" class="user-passbox4" id="txtDesignName">
                <?php
                // Connect to the MySQL database
              
                $sql = "SELECT id, name FROM sales_signup";
                $result = $conn->query($sql);

                // Generate options for the dropdown
                while ($row = $result->fetch_assoc()) {
                    $selected = ($row['name'] == $ref) ? "selected" : "";
                    echo "<option value='" . $row['name'] . "' $selected>" . $row['name'] . "</option>";
                }

                // Close the database connection
                $conn->close();
                ?>
            </select>
            <span class="green">*</span>
        </td>
    </tr>
</div>
      <br>

  <!-- -------------- -->

  <button type="submit" name="submit"class="btn btn-primary" value="upload">upload</button>

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