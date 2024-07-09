<?php
include "../conn.php";
session_start();
include "func.php";
wa_auth();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales SignUp</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/styling.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
  form{
    border: 3px solid lightgrey;
    border-radius: 10px;
  }      

  
    </style>
</head>
<body>
    <?php
include "nav.php";
    ?>
    <br>
    <br>
    <br>
    <br>
    <section class="midcontent">
        <div class="container">
            <div class="row">
        <div class="col-lg-3 ">
          <h1>Sales Signup</h1>
        </div>
        

        <div class="col-lg-7">
            <div class="row">
            <form action="signup_sales.php" method="POST" class="form" enctype="multipart/form-data">
                <h1 class="text-danger"></h1>
                <br>
  <!-- Name input -->
  <div class="form-outline ">
    <tr>
        <td height="35" class="form_left_text text-danger">Name:</td>
        <td height="25" colspan="2" class="form">
          <input name="name" class="user-passbox4" id="name" size="58" required>
          <span class="green">*</span></td>
    </tr>
  </div>
    <br>
    <div class="form-outline ">
  <tr>
        <td height="35" class="form_left_text text-danger">Email:</td>
        <td height="25" colspan="2" class="form">
          <input name="email" class="user-passbox4" id="email" size="59" required>
          <span class="green">*</span></td>
      </tr></div>
      <br>

      <div class="form-outline ">
  <tr>
        <td height="35" class="form_left_text text-danger">User ID:</td>
        <td height="25" colspan="2" class="form">
          <input name="user" class="user-passbox4" id="user" size="57" required>
          <span class="green">*</span></td>
      </tr></div>
      <br>

   <div class="form-outline ">
  <tr>
        <td height="35" class="form_left_text text-danger"> Contact: </td>
        <td height="25" colspan="2" class="form">
          <input name="contact" class="user-passbox4" id="contact" size="57" required>
          <span class="green">*</span></td>
      </tr></div>
      <br>

   <div class="form-outline ">
  <tr>
        <td height="35" class="form_left_text text-danger"> Password: </td>
        <td height="25" colspan="2" class="form">
          <input name="password" class="user-passbox4" id="password" size="55" required>
          <span class="green">*</span></td>
      </tr></div>
      <br>
<div class="btnn">
  <button type="submit" name="submit"class="btn btn-danger" value="upload">Submit</button>
  </div>
  <br>

</form>
<?php
if (empty($_POST['name']) && empty($_POST['contact'])  && empty($_POST['email']) && empty($_POST['user']) && empty($_POST['password'])) {
    //echo 'Please correct the fields';
    return false;
  }
  else{
  $name = $_POST['name'];
  $contact = $_POST['contact'];
  $email = $_POST['email'];
  $user = $_POST['user'];
  $password = $_POST['password'];

  


$sqli="select * from sales_signup where (user='$user' or email='$email');";

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
	
$sql = "INSERT INTO sales_signup (name,email,user,contact,password)
VALUES('$name','$email','$user','$contact','$password')";


if(mysqli_query($conn,$sql)){
    
    echo "<script>alert('SignUp Successful');
     window.location.href ='signup_sales.php'</script>";
    echo "<meta http-equiv='refresh' content='0'>";

echo "<br>";

    
    
}
else{
    echo"ERROR:".$sql."<br>".mysqli_error($conn);

}
}

}




  ?>
  </div>
  </div>
  
        <div class="col-lg-2"></div>

        </div>
        </div>
</section>    
</body>
</html> 