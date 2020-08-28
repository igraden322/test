<?php

$con = mysqli_connect("localhost", "root", "","taskbook");
mysqli_set_charset($con, "utf8");

$mail = trim($_POST['mail']);
$name = trim($_POST['name']);
$password = trim($_POST['password']);

$query = "SELECT name FROM users WHERE name='$name'";

$result = mysqli_query($con,$query);

if(mysqli_fetch_array($result) == null){
    $queryAdd = "INSERT INTO users SET name='$name', mail='$mail', password='$password'";
    mysqli_query($con,$queryAdd);
    header('Location: main.php'); exit;
}else{
    echo "Пользователь с таким именем уже существует";
}


?>