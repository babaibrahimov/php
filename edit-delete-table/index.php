<!DOCTYPE html>
<html>
<head>
<title>Index</title> 
<link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
	<div class="form">
		<form method="POST" action="add.php">
			<label>Username:</label><input type="text" name="username" required>
			<label>Firstname:</label><input type="text" name="firstname" required>
			<label>Lastname:</label><input type="text" name="lastname" required>
			<input type="submit" name="add">
		</form>
	</div>
	<div class="table">
		<table border="1">
			<thead>
				<th>Username</th>
				<th>Firstname</th>
				<th>Lastname</th>
				<th>Edit/Delete</th>
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
								<a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
								<a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
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