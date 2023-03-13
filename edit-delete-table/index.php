<!DOCTYPE html>
<html>
<head>
<title>Index</title>
</head>
<body>
	<div>
		<form method="POST" action="add.php">
			<label>Username:</label><input type="text" name="username">
			<label>Firstname:</label><input type="text" name="firstname">
			<label>Lastname:</label><input type="text" name="lastname">
			<input type="submit" name="add">
		</form>
	</div>
	<br>
	<div>
		<table border="1">
			<thead>
				<th>Username</th>
				<th>Firstname</th>
				<th>Lastname</th>
				<th></th>
			</thead>
			<tbody>
				<?php
					include('connection.php');
					$query=mysqli_query($conn, "select * from `tb_users`");
					while($row=mysqli_fetch_array($query)){
						?>
						<tr>
							<td><?php echo $row['username']; ?></td>
							<td><?php echo $row['firstname']; ?></td>
							<td><?php echo $row['lastname']; ?></td>
							<td>
								<a href="edit.php?id=<?php echo $row['userid']; ?>">Edit</a>
								<a href="delete.php?id=<?php echo $row['userid']; ?>">Delete</a>
							</td>
						</tr>
						<?php
					}
				?>
			</tbody>
		</table>
	</div>
</body>
</html>