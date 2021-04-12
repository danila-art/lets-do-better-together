<?php
$id_aplication = $_POST['id_aplication'];
// echo $id_aplication;
require_once 'connection.php';
$linkToDataBase = mysqli_connect($host, $user, $password, $database);
$select = $linkToDataBase->query("SELECT * FROM `aplication` WHERE `id` = '$id_aplication'");
$select_count = mysqli_num_rows($select);
if($select_count == 1){
    $linkToDataBase->query("DELETE FROM `aplication` WHERE `id` = '$id_aplication'");
    $linkToDataBase->close();
    header('Location: ../page/user.php');
}else{
    //Вывод ошибки;
    echo 'произошла какая-то ошибка';
}
?> 