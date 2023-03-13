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
<link rel="stylesheet" href="./assets/css/edit.css">
</head>
<body>
	<form method="POST" action="update.php?id=<?php echo $id; ?>">
		<h2>Edit</h2>
		<label>Username:</label><input type="text" value="<?php echo $row['username']; ?>" name="username" spellcheck="false">
		<label>Firstname:</label><input type="text" value="<?php echo $row['firstname']; ?>" name="firstname" spellcheck="false">
		<label>Lastname:</label><input type="text" value="<?php echo $row['lastname']; ?>" name="lastname" spellcheck="false">
		<input type="submit" name="submit">
		<a href="index.php" class="back">Back</a>
	</form>
</body>
</html>