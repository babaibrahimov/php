<?php

include 'connect.php';
$output = '';

if(isset($_POST['query'])){
    $search = $_POST['query'];
    $stmt = $conn->prepare("SELECT * FROM tb_search WHERE firstname LIKE CONCAT('%',?,'%') OR surname LIKE CONCAT('%',?,'%') OR country LIKE CONCAT('%',?,'%')");
    $stmt->bind_param("sss",$search,$search,$search);
}else {
    $stmt = $conn->prepare("SELECT * FROM tb_search");
}
$stmt->execute();
$result=$stmt->get_result();

if($result->num_rows>0){
    $output = "
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
    ";
    while($row=$result->fetch_assoc()){
        $output .= "
            <tr>
                <td>".$row['id']."</td>
                <td>".$row['firstname']."</td>
                <td>".$row['surname']."</td>
                <td>".$row['email']."</td>
                <td>".$row['country']."</td>
            </tr>    
        ";
    }
    $output .="</tbody>";
    echo $output;
}else {
    echo "<h3>No Data Found</h3>";
}

?>