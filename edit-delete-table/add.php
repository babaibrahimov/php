<?php
	include('connection.php');
 
	$username=$_POST['username'];
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
 
	mysqli_query($conn,"insert into `tb_users` (username,firstname,lastname) values ('$username','$firstname','$lastname')");
	header('location:index.php');
 
?>