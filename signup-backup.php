<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';
// session_start();

include "conn.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer SignUp</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/styling.css">
    <style>
    .form{
            border: 1px solid grey;
            background-color: transparent;
  border-radius: 10px;
  box-shadow: 5px 10px #888888;
  padding-left: 80px;
        }
        .midcontent{
            padding-left: 130px;
        }
        .midcontent h1{
            padding-left: 230px;
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
    font-weight: 400;

        }
        .sep{
            height: 20px;
            background-color: #F1F1F1;
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

            <div class="col-lg-3 header"> <a href="login_cus.php">Already have account! Click HereLogin</a></div>
        </div>
    </div>
    </section>
    <br>
    <br>
<div class="">
    <!--<div class="container sep"></div>-->
</div>
    <section class="midcontent">
        <div class="container">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    
                </div>
                <div class="col-lg-2"></div>

            </div>
        </div>
    </section>
 
<br>
    <section class="midcontent">
        <div class="container">
            <div class="row">
        <div class="col-lg-2 ">
        </div>

        <div class="col-lg-8">
            <div class="row">
            <form action="signup.php" method="POST" class="form" enctype="multipart/form-data">
                <h1 class="text-danger">SIGN UP</h1>
                <br>
  <!-- Name input -->
  <div class="form-outline ">
  <tr>
        <td height="35" class="form_left_text text-danger"> Contact Name: </td>
        <td height="25" colspan="2" class="form">
          <input name="name" class="user-passbox4" id="txtDesignName" size="51" required>
          <span class="green">*</span></td>
      </tr></div>
      <br>

  <!-- Email input -->
  <div class="form-outline ">
  <tr>
        <td height="35" class="form_left_text text-danger"> Company Name: </td>
        <td height="25" colspan="2" class="form">
          <input name="company" class="user-passbox4" id="txtDesignName" size="49" >
          <span class="green"></span></td>
      </tr></div>
      <br>

   <!-- Email input -->
   <!-- <div class="form-outline ">
  <tr>
        <td height="35" class="form_left_text text-danger"> ASI Number: </td>
        <td height="25" colspan="2" class="form">
          <input name="asi" class="user-passbox4" id="txtDesignName" size="53" >
          <span class="green"></span></td>
      </tr></div>
      <br> -->

   <!-- Email input -->
   <!-- <div class="form-outline ">
  <tr>
        <td height="35" class="form_left_text text-danger"> Company Type: </td>
        <td height="25" colspan="2" class="form">
          <input name="type" class="user-passbox4" id="txtDesignName" size="50" >
          <span class="green"></span></td>
        
      </tr></div>
      <br> -->

   <!-- Email input -->
   <div class="form-outline ">
  <tr>
        <td height="35" class="form_left_text text-danger"> Phone: </td>
        <td height="25" colspan="2" class="form">
          <input name="phone" class="user-passbox4" id="txtDesignName" size="58" required>
          <span class="green">*</span></td>
      </tr></div>
      <br>
<!-- Email input -->
<!-- <div class="form-outline ">
  <tr>
        <td height="35" class="form_left_text text-danger"> Phone2: </td>
        <td height="25" colspan="2" class="form">
          <input name="phone2" class="user-passbox4" id="txtDesignName" size="57" >
          <span class="green"></span></td>
      </tr></div>
      <br> -->
      <!-- Email input -->
   <!-- <div class="form-outline ">
  <tr>
        <td height="35" class="form_left_text text-danger" > Cell: </td>
        <td height="25" colspan="2" class="form">
          <input name="cell" class="user-passbox4" id="txtDesignName" size="61" >
          <span class="green"></span></td>
      </tr></div>
      <br> -->
   <!-- Email input -->
   <!-- <div class="form-outline ">
  <tr>
        <td height="35" class="form_left_text text-danger"> Fax: </td>
        <td height="25" colspan="2" class="form">
          <input name="fax" class="user-passbox4" id="txtDesignName" size="61" >
          <span class="green"></span></td>
      </tr></div>
      <br> -->


 <!-- Email input -->
 <div class="form-outline ">
  <tr>
        <td height="35" class="form_left_text text-danger"> Email Address: </td>
        <td height="25" colspan="2" class="form">
          <input name="email" class="user-passbox4" id="txtDesignName" size="51" required>
          <span class="green">*</span></td>
      </tr></div>
      <br>
 <!-- Email input -->
 <!-- <div class="form-outline ">
  <tr>
        <td height="35" class="form_left_text text-danger"> Email Address2: </td>
        <td height="25" colspan="2" class="form">
          <input name="email2" class="user-passbox4" id="txtDesignName" size="50" >
          <span class="green"></span></td>
      </tr></div>
      <br> -->
 <!-- Email input -->
 <!-- <div class="form-outline ">
  <tr>
        <td height="35" class="form_left_text text-danger"> Email Address3: </td>
        <td height="25" colspan="2" class="form">
          <input name="email3" class="user-passbox4" id="txtDesignName" size="50" >
          <span class="green"></span></td>
      </tr></div>
      <br> -->
 <!-- Email input -->
 <!-- <div class="form-outline ">
  <tr>
        <td height="35" class="form_left_text text-danger"> Email Address4: </td>
        <td height="25" colspan="2" class="form">
          <input name="email4" class="user-passbox4" id="txtDesignName" size="50" >
          <span class="green"></span></td>
      </tr></div>
      <br> -->
 <!-- Email input -->
 <!-- <div class="form-outline ">
  <tr>
        <td height="35" class="form_left_text text-danger"> Address: </td>
        <td height="25" colspan="2" class="form">
          <input name="address" class="user-passbox4" id="txtDesignName" size="57" >
          <span class="green"></span></td>
      </tr></div>
      <br> -->
 <!-- Email input -->
 <!-- <div class="form-outline ">
  <tr>
        <td height="35" class="form_left_text text-danger"> City: </td>
        <td height="25" colspan="2" class="form">
          <input name="city" class="user-passbox4" id="txtDesignName" size="61" >
          <span class="green"></span></td>
      </tr></div>
      <br> -->
 <!-- Email input -->
 <!-- <div class="form-outline ">
  <tr>
        <td height="35" class="form_left_text text-danger"> State: </td>
        <td height="25" colspan="2" class="form">
          <input name="state" class="user-passbox4" id="txtDesignName" size="60" >
          <span class="green"></span></td>
      </tr></div>
      <br> -->
 <!-- Email input -->
 <!-- <div class="form-outline ">
  <tr>
        <td height="35" class="form_left_text text-danger"> Zip Code: </td>
        <td height="25" colspan="2" class="form">
          <input name="zip" class="user-passbox4" id="txtDesignName" size="56" >
          <span class="green"></span></td>
      </tr></div>
      <br> -->
    <!-- Email input -->
    <!-- <div class="form-outline ">
  <tr>
        <td height="35" class="form_left_text text-danger"> Country: </td>
        <td height="25" colspan="2" class="form">
          <input name="country" value="United States" class="user-passbox4" id="txtDesignName" size="57" >
          <span class="green"></span></td>
        
      </tr></div>
      <br> -->
  <!-- Email input -->
  <div class="form-outline ">
  <tr>
        <td height="35" class="form_left_text text-danger"> User ID: </td>
        <td height="25" colspan="2" class="form">
          <input name="user" class="user-passbox4" id="txtDesignName" size="57" required>
          <span class="green">*</span></td>
      </tr></div>
      <br>
 <!-- Email input -->
   <div class="form-outline ">
  <tr>
        <td height="35" class="form_left_text text-danger"> Password: </td>
        <td height="25" colspan="2" class="form">
          <input name="pass" class="user-passbox4" id="txtDesignName" size="55" required>
          <span class="green">*</span></td>
      </tr></div>
      <br>
      <!-- Email input -->
      <div class="form-outline ">
  <tr>
        <td height="35" class="form_left_text text-danger"> Reference: </td>
        <td height="25" colspan="2" class="form">
          <input name="ref" class="user-passbox4" id="txtDesignName" size="55" >
          <span class="green"></span></td>
         
      </tr></div>
      <br>

  <!-- -------------- -->

  <button type="submit" name="submit"class="btn btn-danger" value="upload">Sign Up</button>
  <br><br>

</form>
<?php
if (empty($_POST['name']) && empty($_POST['phone'])  && empty($_POST['email']) && empty($_POST['user']) && empty($_POST['pass'])) {
    //echo 'Please correct the fields';
    return false;
  }
  else{
  $name = $_POST['name'];
  $company = $_POST['company'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $user = $_POST['user'];
  $pass = $_POST['pass'];
  $ref = $_POST['ref'];
  


$sqli="select * from signup where (user='$user' or email='$email');";

      $res=mysqli_query($conn,$sqli);

      if (mysqli_num_rows($res) > 0) {
        
        $row = mysqli_fetch_assoc($res);
        if($email==isset($row['email']))
        {
            	echo "<script>alert('Email already exists');
    </script>";
        }
		if($user==isset($row['user']))
		{
			echo "<script>alert('User already exists');
    </script>";
		}
		}
else{
	
$sql = "INSERT INTO signup (name,company,phone,email,user,pass,ref)
VALUES('$name','$company','$phone','$email','$user','$pass','$ref')";


//     $subject = "Thanks for Registration at Selectdigitizing.com";
    
//     $mail = new PHPMailer(true);
//         $mail->isSMTP();
//         $mail->Host = 'smtp.gmail.com';
//         $mail->SMTPAuth = true;
//         $mail->Username = 'selectdigitizing@gmail.com';
//         $mail->Password = 'eevpqxnnpbcbrqbo';
//         $mail->SMTPSecure = "ssl";
//         $mail->Port = '465';
//         $mail->isHTML(true);
        
        




//         $mail->setFrom('selectdigitizing@gmail.com','Select Digitizing');
//         $mail->addAddress($email,$name);
//         $mail->addAddress('selectdigitizing@gmail.com');

//         $mail->Subject = 'Thanks for Registration at Selectdigitizing.com';
//     //   $mail->Body = "Thank you for registering with Select Digitizing.";
//       $mail->Body = "<p>Dear ".$name."</p>
//       <p>Thank you for registering with Select Digitizing. Our goal is to keep you thrilled with our quality, services, and prices.</p>
//     <p>User Name: ".$user."</p>
//     <p>Password: ".$pass."</p>
//     <p>Company Name: ".$company."</p>
//     <p>Please feel free to contact us if we can be of any assistance. We look forward to serving your digitizing/vector needs.</p>
//     <p>Best Regards,<br>Team Select Digitizing<br>Tel: (915) 266-4883<br>Email: selectdigitizing@gmail.com<br>order@selectdigitizing.com<br>URL: www.selectdigitizing.com</p>";

// // Send the email

//   $mail->send();



if(mysqli_query($conn,$sql)){
    
    echo "<script>alert('SignUp Successful');
     window.location.href ='login_cus.php'</script>";
    echo "<meta http-equiv='refresh' content='0'>";

echo "<br>";

    
    
}
else{
    echo"ERROR:".$sql."<br>".mysqli_error($conn);

}
}

}




  ?>
        <div class="col-lg-2"></div>

        </div>
        </div>
    </section>
    <br>
<div class="">
    <div class="container sep"></div>
</div>
    
</body>
</html> 