<?php

$con = mysqli_connect("localhost", "root", "","taskbook");
mysqli_set_charset($con, "utf8");

$name = $_POST['name'];
$password = $_POST['password']; 

$query = "SELECT name FROM users WHERE name='$name' and password='$password'";

$result = mysqli_query($con,$query);

while ($row = mysqli_fetch_array($result)) {

    if(isset($row['name'])){
        session_start();
        $_SESSION['auth'] = "ok";
        $_SESSION['name'] = $_POST['name'];
        header('Location: main.php'); exit;
    }
    else{
        echo "Ошибка ввода данных, вернитесь обратно";
    }
}
?>
