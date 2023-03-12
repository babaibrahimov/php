<?php

require 'connection.php';

if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];

    $duplicate = mysqli_query($conn, "SELECT * FROM tb_users WHERE username = '$username'");
    if(mysqli_num_rows($duplicate) > 0){
        header("Location: register.php?error=Username has already taken");
        exit();
    }
    else {
        if($password == $confirmpassword){
            $query =  "INSERT into tb_users VALUES ('', '$name', '$username', '$email', '$password')";
            mysqli_query($conn, $query);
            header("Location: register.php?success=Your account has been successfully created");
            exit();
        } 
        else {
            header("Location: register.php?error=Password doesn't match");
            exit();
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
    <title>Register</title>
    <!-- STYLE  -->
    <link rel="stylesheet" href="./assets/register.css">
    <!-- ICON -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">
</head>
<body>
    <div class="wrapper">
        <h1>Registration</h1>
        <?php if(isset($_GET['success'])) { ?>
        <p class="success"><?php echo $_GET['success']; ?></p>
        <?php } ?>
        <?php if(isset($_GET['error'])) { ?>
        <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <form action="" method="post" autocomplete="off">
            <input type="text" name="name" id="name" placeholder="Full Name">
            <input type="text" name="username" id="username" placeholder="Username">
            <input type="email" name="email" id="email" placeholder="E-mail">
            <input type="password" name="password" id="password" placeholder="Password">
            <input type="password" name="confirmpassword" id="confirmpassword" placeholder="Confirm Passsword">
            
            <button type="submit" name="submit">Register</button>
        </form>
        
        <p class="link">Already have an account? <a href="login.php">Login</a></p>
    </div>
</body>
</html>