<?php
include "func.php";
wa_auth();
?>
<!DOCTYPE html>
<html>
<head>
<title>document</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
.content{
    padding-left:300px;
    padding-top:100px;
}
.content form{
    padding-left:100px;
    padding-right:100px;
}
</style>
</head>
<?php

?>
<div class="content">
<a href="user.php"><button class="w3-button w3-dark-grey">View Users<i class="fa fa-arrow-right"></i></button>
</a>
<form action="user.php" method="POST">
<h4>Add User</h4>

  <div class="mb-3">
    <label for="inputname" class="form-label">Userid</label>
    <input type="text" class="form-control" id="userid" name="userid" >
  </div>
 
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="text" class="form-control" id="pass" name="pass">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>

</form>





<?php
include "../conn.php";
// echo "Connected Successfully";
if (empty($_POST['userid']) && empty($_POST['pass'])) {
  //echo 'Please correct the fields';
  return false;
}
else{
$userid = $_POST['userid'];
$pass = $_POST['pass'];

$sql = "INSERT INTO admin (userid,pass)
VALUES('$userid','$pass')";





if(mysqli_query($conn,$sql)){
    echo"New record created";
echo "<br>";

    
    
}
else{
    echo"ERROR:".$sql."<br>".mysqli_error($conn);

}
}






?>

</div>



</body>
</html>