<?php
	$id=$_GET['id'];
	include('connection.php');
	mysqli_query($conn,"delete from `tb_users` where id='$id'");
	header('location:index.php');
?>