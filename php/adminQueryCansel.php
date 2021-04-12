<?php
require_once 'connection.php';
$linkToDataBase = mysqli_connect($host, $user, $password, $database);
$id_aplication = $_POST['id_aplication'];
$linkToDataBase->query("UPDATE `aplication` SET `status` = '2' WHERE `id` = '$id_aplication'");
$linkToDataBase->close();
header('Location: ../page/admin.php');
?>