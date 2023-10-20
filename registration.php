<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Reg page</title>
</head>
<body>
    <?php
    require 'function.php';

    $register = new Register();

    if(isset($_POST['submit'])){
        $result = $register-> registration($_POST['name'],$_POST['username'],$_POST['email'],$_POST['password'],$_POST['confirmpassword']);

        if($result == 1){
            echo
            "<script> alert('Reg Successful') </script>";
        }
        elseif($result == 10){
            echo
            "<script> alert('username or email has already been taken') </script>";
        }
        elseif($result == 100){
            echo
            "<script> alert('password does not match') </script>";
        }
    }
    ?>
    <div class="container">
    <form action="registration.php" method="post">
        <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="Name:">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="username" placeholder="username:">
        </div>
        <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="email:">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password:">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="confirmpassword" placeholder="confirm Password:">
        </div>
        <div class="form-btn">
            <input type="submit" class="btn btn-primary" value="Register" name="submit">
        </div>
    </form>
    <div>
    <div><p>Already Registered <a href="login.php">Login Here</a></p></div>
  </div>
</div>
    
</body>
</html>