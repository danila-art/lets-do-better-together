<?php
$login_user = $_COOKIE['loginUser'];
$id_user = '';
require_once 'connection.php';
$aplication__name = $_POST['aplication__name'];
$aplication__description = $_POST['aplication__description'];
$aplication__category = $_POST['aplication__category'];
$aplication__img_before_name = $_FILES['aplication__img_before']['name'];
$aplication__img_before_tmp = addslashes(file_get_contents($_FILES['aplication__img_before']['tmp_name']));
$date = date("Y:m:d");
$linkToDataBase = mysqli_connect($host, $user, $password, $database);
$thisUser = $linkToDataBase->query("SELECT * FROM `user` WHERE `login` = '$login_user'");
while($result = mysqli_fetch_assoc($thisUser)){
$id_user = $result['id'];
}
echo $id_user;
$linkToDataBase->query("INSERT INTO `aplication`(`name`, `description`, `category`, `date`, `img-before-name`, `img-before-tmp`, `id_user`) VALUES ('$aplication__name', '$aplication__description', '$aplication__category', '$date', '$aplication__img_before_name','$aplication__img_before_tmp', '$id_user')");
$linkToDataBase->close();
?>