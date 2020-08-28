<?php

$con = mysqli_connect("localhost", "root", "","taskbook");
mysqli_set_charset($con, "utf8");

$mail = trim($_POST['mail']);
$tasktext = $_POST['tasktext'];
if ($_SESSION['name'] != null){
    $name = $_SESSION['name'];
    $querySearch = "SELECT id FROM users WHERE name='$name'";
    $resultSearch = mysqli_query($con,$querySearch);
    $row = mysqli_fetch_array($resultSearch);
    $userId = $row['id'];
}
else{
    $userId = null;
}

if($userId == null){
    $queryAdd = "INSERT INTO tasks SET text='$tasktext'";
}else{
    $queryAdd = "INSERT INTO tasks SET text='$tasktext', id_user = '$userId'";
}
mysqli_query($con,$queryAdd);
echo "$tasktext, $userId";
//header('Location: main.php'); exit;

?>