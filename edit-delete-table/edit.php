<?php
	include('connection.php');
	$id=$_GET['id'];
	$query=mysqli_query($conn,"select * from `tb_users` where id='$id'");
	$row=mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html>
<head>
<title>Edit</title>
</head>
<body>
	<h2>Edit</h2>
	<form method="POST" action="update.php?id=<?php echo $id; ?>">
		<label>Username:</label><input type="text" value="<?php echo $row['username']; ?>" name="username">
		<label>Firstname:</label><input type="text" value="<?php echo $row['firstname']; ?>" name="firstname">
		<label>Lastname:</label><input type="text" value="<?php echo $row['lastname']; ?>" name="lastname">
		<input type="submit" name="submit">
		<a href="index.php">Back</a>
	</form>
</body>
</html>