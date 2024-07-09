<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        a{
            text-decoration: none;
    color: white;
        }
        button{
            background-color: blue;
            padding: 10px;
            border-color: transparent;
            border-radius: 10px;
        }
        
    </style>
</head>
<body>
    <form action="CheckOut.php" method="post">
    <h1>Enter Amount:</h1>
    <input type="text" name="amount" >
    <br><br><br>
    <button type="submit" name="submit"class="btn btn-primary" value="upload">proceed to payment</button>

    </form>
    <?php

    
    ?>
    
</body>
</html>