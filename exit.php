<?php 
session_start();
$_SESSION['auth'] = 'no';
header("Location: main.php");

?>