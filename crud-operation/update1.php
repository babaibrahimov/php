<?php
include 'config.php';
if(isset($_POST['update'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_FILES['image'];
    $img_loc = $_FILES['image']['tmp_name'];
    $img_name = $_FILES['image']['name'];
    $img_des = "img/".$img_name;
    move_uploaded_file($img_loc,'img/'.$img_name);

    mysqli_query($con,"UPDATE `tb_crud` SET `Name`='$name',`Price`='$price',`Image`='$img_des' WHERE Id = '$id' ");
    header("location:index.php");
}
?>