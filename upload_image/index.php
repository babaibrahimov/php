<?php
require 'connection.php';
    if(isset($_POST['submit'])){
        $name = $_POST["name"];
        $about = $_POST["about"];
        if($_FILES["image"]["error"] === 4 ){
            echo "
            <script>
                alert('Error');
            </script>";
        } else {
            $fileName = $_FILES['image']['name'];
            $fileSize = $_FILES['image']['size'];
            $tmpName = $_FILES['image']['tmp_name'];

            $validImageExtension = ["jpg", "jpeg", "png"];
            $imageExtension = explode('.', $fileName);
            $imageExtension = strtolower(end($imageExtension));
            if(!in_array($imageExtension, $validImageExtension)){
                echo "
                <script>
                    alert('Error, imageExtension');
                </script>";
            } elseif($fileSize > 100000){
                echo "
                <script>
                    alert('Error, file size too large');
                </script>";
            } else {
                $newImageName = uniqid();
                $newImageName .= '.'.$imageExtension;

                move_uploaded_file($tmpName, 'img/'. $newImageName);
                $query = "INSERT into tb_upload_image VALUES('', '$name', '$newImageName', '$about')";

                mysqli_query($conn, $query);
                echo "
                <script>
                    alert('Successful');
                    document.location.href = 'display.php';
                </script>";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Dafault HTML 5</title>
<!-- STYLE  -->
<link rel="stylesheet" href="./default.css">
<!-- ICON -->
<link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">
<body>
  
    <form action="" method="post" autocomplete="off" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Name">
        <input type="text" name="about" placeholder="about">
        <input type="file" name="image" placeholder="image" accept=".jpg, .jpeg, .png">
        <button type="submit" name="submit">Submit</button>
    </form>

</body>
</html>