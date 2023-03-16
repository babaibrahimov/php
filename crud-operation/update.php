<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<style>
    input
    {
        margin: 10px;
    }
</style>
</head>
<body>
        <?php

            include 'config.php';
            $id = $_GET['id'];
            $Record = mysqli_query($con,"SELECT * FROM `tb_crud` WHERE Id = $id");
            $data = mysqli_fetch_array($Record);

        ?>
        <center>
            <div class="main">
                <form action="update1.php" method="POST" enctype="multipart/form-data" >
                    <label for="">Name:</label>
                    <input type="text" value="<?php echo $data['name'] ?>" name="name"><br>
                    <label for="">Price :</label>
                    <input type="text" value="<?php echo $data['price'] ?>" name="price" id=""><br>
                    <label for="">Image:</label>
                    <td><input type="file" name="image" value="<?php echo $data['image'] ?>"><img src="<?php echo $data['image'] ?>"  width = '200px'  height = '70px' alt=""> </td><br>
                        <input type="hidden" name="id"  value="<?php echo $data['id'] ?>">
                    <button type="submit" name="update" class = 'btn btn-danger m-2'>Update</button>

                </form>
            </div>
        </center>


       

    </body>    
</html>