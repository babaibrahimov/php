<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Search Area with PHP and Ajax</title>
</head>
<body>
    <div class="search-area">
        <label for="search">Search Data:</label>
        <input type="text" name="search" placeholder="Search" id="search">
    </div>
    <hr>
    <?php
    
    include 'connect.php';
    $smt=$conn->prepare("SELECT * FROM tb_search");
    $smt->execute();
    $result=$smt->get_result();
    ?>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Surname</th>
                <th>E-mail</th>
                <th>Country</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row=$result->fetch_assoc()){?>
            <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['firstname']; ?></td>
                <td><?= $row['surname']; ?></td>
                <td><?= $row['email']; ?></td>
                <td><?= $row['country']; ?></td>
            </tr>
            <?php }?>
        </tbody>
    </table>
    <script src="./script.js"></script>
</body>
</html>