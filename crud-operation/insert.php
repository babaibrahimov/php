<?php
// include db connection
include 'config.php';

if(isset($_POST['upload'])){
    $NAME = $_POST['name'];
    $PRICE = $_POST['price'];
    $IMAGE = $_FILES['image'];
    $img_loc = $_FILES['image']['tmp_name'];
    $img_name = $_FILES['image']['name'];
    $img_des = "img/".$img_name;
    move_uploaded_file($img_loc,'img/'.$img_name);

    // insert data

    mysqli_query($con,"INSERT INTO `tb_crud`( `name`, `price`, `image`) VALUES ('$NAME','$PRICE','$img_des')");
    header("location:index.php");

}

?>