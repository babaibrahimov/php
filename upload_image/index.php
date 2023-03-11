<?php
require 'connection.php';
    if(isset($_POST['submit'])){
        $name = $_POST["name"];
        $about = $_POST["about"];
        if($_FILES["image"]["error"] === 4 ){
            header("Location: index.php?error=Input areas can't be empty!");
            exit();
        } else {
            $fileName = $_FILES['image']['name'];
            $fileSize = $_FILES['image']['size'];
            $tmpName = $_FILES['image']['tmp_name'];

            $validImageExtension = ["jpg", "jpeg", "png"];
            $imageExtension = explode('.', $fileName);
            $imageExtension = strtolower(end($imageExtension));
            if(!in_array($imageExtension, $validImageExtension)){
            header("Location: index.php?error=Error, only '.jpg', '.jpeg', '.png' extension files");
            exit();
            // } elseif($fileSize > 100000){
            //     echo "
            //     <script>
            //         alert('Error, file size too large');
            //     </script>";
            } else {
                $newImageName = uniqid();
                $newImageName .= '.'.$imageExtension;

                move_uploaded_file($tmpName, 'img/'. $newImageName);
                $query = "INSERT into tb_upload_image VALUES('', '$name', '$about', '$newImageName')";

                mysqli_query($conn, $query);
                header("Location: index.php?success=File Upload Success");
                exit();
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Home Page</title>
<!-- STYLE  -->
<link rel="stylesheet" href="./style.css">
<!-- ICON -->
<link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">
<body>
    <form action="" method="post" autocomplete="off" enctype="multipart/form-data">
        <?php if(isset($_GET['success'])) { ?>
        <p class="success"><?php echo $_GET['success']; ?></p>
        <?php } ?>
        <?php if(isset($_GET['error'])) { ?>
        <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <input type="text" name="name" placeholder="Name" required>
        <input type="text" name="about" placeholder="about" required>
        <input type="file" name="image" placeholder="image" accept=".jpg, .jpeg, .png" required>
        <button type="submit" name="submit">Submit</button>
    </form>

    <a href="display.php">Go to Display</a>
</body>
</html>