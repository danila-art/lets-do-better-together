<?php
require_once 'connection.php';
$linkToDataBase = mysqli_connect($host, $user, $password, $database);
$id_aplication = $_POST['id_aplication'];
$image_after_name = $_FILES['aplication_img_after']['name'];
$image_after_tmp = addslashes(file_get_contents($_FILES['aplication_img_after']['tmp_name']));
$linkToDataBase->query("UPDATE `aplication` SET `img-after-name` = '$image_after_name', `img-after-tmp` = '$image_after_tmp', `status` = '1' WHERE `id` = '$id_aplication' ");
$linkToDataBase->close();
header('Location: ../page/admin.php');
?>