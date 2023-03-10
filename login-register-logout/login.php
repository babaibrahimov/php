<?php

require 'connection.php';

if(isset($_POST["submit"])){
    $usernamemail = $_POST["usernamemail"];
    $password = $_POST["password"];
    $result =  mysqli_query($conn, "SELECT * FROM tb_users WHERE username = '$usernamemail' or email = '$usernamemail'");
    $row = mysqli_fetch_assoc($result);
    
    if(mysqli_num_rows($result) === 1){
        if($row['username'] === $usernamemail && $row['password'] === $password){
            $_SESSION["login"] = true;
            $_SESSION["username"] = $username;
            $_SESSION["password"] = $password;
            $_SESSION["id"] = $row["id"];
            header("Location: index.php");
        }
        elseif($row['username'] === $usernamemail || $row['password'] !== $password)
        {
        header('Location: login.php?error=Wrong Password');
        exit();  
        }
        } else {
            header('Location: login.php?error=No such account exists');
            exit();
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
    <link rel="stylesheet" href="./assets/login.css">
    <!-- ICON -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">
</head>
<body>
    <div class="wrapper">
        <h1>Login</h1>
        <?php if(isset($_GET['error'])) { ?>
        <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <form action="" method="post" autocomplete="off">
            <input type="text" name="usernamemail" id="usernamemail" placeholder="Username" required value="">
            <input type="password" name="password" id="password" placeholder="Password" required value="">
    
            <button type="submit" name="submit">Login</button>
        </form>
        
        <p class="link">Don't have an account? <a href="register.php">Register</a></p>
    </div>

</body>
</html>