<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='./assets/style.css'>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">

</head>
<body>
    <div class="wrapper">
        <form action="login.php" method="post">
            <h2>Login Form</h2>
                <?php if(isset($_GET['error'])) { ?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
                    <?php } ?>
                <div class="user-box">
                    <i class="ri-user-3-line"></i>
                    <input type="text" name="username" placeholder="Username">
                </div>
                <div class="password-box">
                    <i class="ri-lock-line"></i>
                    <input type="password" name="password" placeholder="Password">
                </div>
                <button type="submit">Login</button>
            </form>
    </div>
</body>
</html>