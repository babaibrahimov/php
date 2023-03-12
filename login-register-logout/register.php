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
        // echo "<script> alert('Username or Email has already taken'); </script>";
        header("Location: register.php?Username has already taken");
        exit();
    }
    else {
        if($password == $confirmpassword){
            $query =  "INSERT into tb_users VALUES ('', '$name', '$username', '$email', '$password')";
            mysqli_query($conn, $query);
            echo "<script>alert('Success');</script>";
        } 
        else {
            echo "<script> alert('Password Doesn't Match!'); </script>";
            header("Location: register.php?Password doesn't match");
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
    <link rel="stylesheet" href="./style.css">
    <!-- ICON -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">
</head>
<body>
    <h2>Registration</h2>
    <form action="" method="post" autocomplete="off">
        <input type="text" name="name" id="name" placeholder="Full Name">
        <input type="text" name="username" id="username" placeholder="Username">
        <input type="email" name="email" id="email" placeholder="E-mail">
        <input type="password" name="password" id="password" placeholder="Password">
        <input type="password" name="confirmpassword" id="confirmpassword" placeholder="Confirm Passsword">

        <button type="submit" name="submit">Register</button>
    </form>

    <p>Already have an account? <a href="login.php">Login</a></p>
</body>
</html>