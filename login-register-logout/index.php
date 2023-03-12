<?php

require 'connection.php';
    if(!empty($_SESSION["id"])){
        $id = $_SESSION["id"];
        $result = mysqli_query($conn, "SELECT * FROM tb_users WHERE id = $id");
        $row = mysqli_fetch_assoc($result);
    }else {
        header("Location: login.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- STYLE  -->
    <link rel="stylesheet" href="./assets/style.css">
    <!-- ICON -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">
</head>
<body>
    <div class="wrapper">
        <h3>Welcome <?php echo $row["name"]; ?></h3>
        <a href="logout.php">Logout</a>

    </div>
</body>
</html>