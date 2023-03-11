<?php require 'connection.php';?>
<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Display</title>
<!-- STYLE  -->
<link rel="stylesheet" href="./default.css">
<!-- ICON -->
<link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">
<body>

<div class="wrapper">
    <?php
    $i = 1;
    $rows = mysqli_query($conn, "SELECT * FROM tb_upload_image ORDER BY id DESC");
    ?>

    <?php foreach($rows as $row) : ?>
    
    <img src="img/<?php echo$row['image']; ?>" alt="image">

    <?php endforeach; ?>
</div>

</body>
</html>