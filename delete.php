<?php

$con = mysqli_connect("localhost", "root", "","taskbook");
mysqli_set_charset($con, "utf8");

$id = $_POST['id'];

$query = "DELETE FROM tasks WHERE id='$id'";

mysqli_query($con,$query);

header("Location: main.php"); exit;