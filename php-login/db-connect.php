<?php

$sname = "localhost";
$uname = "root";
$password = "";

$db_mame = "database_db";

$connect = mysqli_connect($sname, $uname, $password, $db_mame);

if(!$connect){
    echo "connection failed";
}

?>