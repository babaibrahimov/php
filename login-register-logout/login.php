<?php

require 'connection.php';

if(isset($_POST["submit"])){
    $usernamemail = $_POST["usernamemail"];
    $password = $_POST["password"];
    $result =  mysqli_query($conn, "SELECT * FROM tb_users WHERE username = '$usernamemail' or email = '$usernamemail'");
    $row = mysqli_fetch_assoc($result);

    if(mysqli_num_rows($result) > 0){
        if($password = $row["password"]){
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            header("Location: index.php");
        }
    } else {
        echo "<script>alert('Wrong Password');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- STYLE  -->
    <link rel="stylesheet" href="./login.css">
    <!-- ICON -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">
</head>
<body>
    <h2>Login</h2>
    <form action="" method="post" autocomplete="off">
        <input type="text" name="usernamemail" id="usernamemail" placeholder="Username or E-mail" required value="">
        <input type="password" name="password" id="password" placeholder="Password" required value="">

        <button type="submit" name="submit">Login</button>
    </form>

    <p>Don't have an account? <a href="register.php">Register</a></p>
</body>
</html>