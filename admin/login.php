<?php

$errormsg = '';
if(isset($_POST) && count($_POST) > 0){
//   session_name('admin_session');
  session_start();

  include "../conn.php";

  $email = $_POST['userid'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM admin WHERE userid = '".$email."' AND pass = '".$password."'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)){
      $_SESSION['admin_name'] = $row['userid'];
      $_SESSION['email'] = $row['pass'];
      $_SESSION['id'] = $row['id'];
      header('Location: http://localhost/arraysystemslimited/admin');
    }
  }
  else{
    $errormsg = 'user id or password is incorrect';
  }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<style type="text/css">

body {
  margin: 0;
  padding: 0;
  background-color: white;
  height: 100vh;
}
#login .container #login-row #login-column #login-box {
  margin-top: 40px;
  max-width: 600px;
  height: 320px;
  border: 1px solid grey;
  background-color: transparent;
  border-radius: 10px;
  box-shadow: 5px 10px #888888;
}
#login .container #login-row #login-column #login-box #login-form {
  padding: 20px;
}
#login .container #login-row #login-column #login-box #login-form #register-link {
  margin-top: -85px;
}
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
</style>
<!------ Include the above in your HEAD tag ---------->

<body>
<section>
    <div class="container">
        <div class="row">
<div class="col-lg-1"></div>
            <!-- <div class="col-lg-10"><img src="images/logobar_top.jpg" alt=""></div> -->
<div class="col-lg-1"></div>

            </div>
    </section>
    <section class="midcontent">
      <div class="row">
            <div class="col-lg-4"><img src="../images/Logo-03.png" alt="" height="100px" width="200px"></div>
            <div class="col-lg-4"></div>
            <div class="col-lg-1"></div>
    </div>
    </section>
    <div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div action='login.php' method='POST' id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">

                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center text-danger"> Admin Login</h3>

                            <?php if(!empty($errormsg)){
                              echo '<div class="alert alert-danger">'.$errormsg.'</div>';
                            }
                            ?>

                            <div class="form-group">
                                <label for="username" class="text-danger">User Id:</label><br>
                                <input type="text" name="userid" id="userid" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-danger">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">	
                                <input type="submit" name="submit" class="btn btn-danger btn-lg" value="submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>