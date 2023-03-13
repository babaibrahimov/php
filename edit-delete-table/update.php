<?php
	include('connection.php');
	$id=$_GET['id'];
 
	$username=$_POST['username'];
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
 
	mysqli_query($conn,"update `tb_users` set username='$username', firstname='$firstname', lastname='$lastname' where id='$id'");
	header('location:index.php');
?>