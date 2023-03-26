<?php
// include db connection
include 'connect.php';

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $link = $_POST['link'];
    // insert data

    mysqli_query($conn,"INSERT INTO `tb_lists`( `name`, `link`) VALUES ('$name','$link')");
    header("location:index.php?success=Success!");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List</title>
    <link rel="stylesheet" href="./assets/style.css">
    <!-- ICON -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="wrapper">
        <div class="adding-area">
            <form action="" method="post" autocomplete="off" enctype="multipart/form-data">
                <input type="text" placeholder="Name here" name="name" required>
                <input type="text" placeholder="Link here" name="link" required>
                <button type="submit" name="submit">Add</button>
            </form>
        </div>
        <div class="output-area">
            <div class="boxes">
                <?php
                $rows = mysqli_query($conn, "SELECT * FROM tb_lists ORDER BY id DESC");
                ?>
                <?php foreach($rows as $row) : ?>
                    <div class="box">
                        <a href="<?php echo$row['link']; ?>" target="_blank"><?php echo$row['name']; ?></a>
                    </div>
                <?php endforeach; ?>    
            </div>
        </div>
    </div>
</body>
</html>