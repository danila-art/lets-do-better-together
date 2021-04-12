<?php
require_once 'connection.php';
$linkToDataBase = mysqli_connect($host, $user, $password, $database) or die('Ошибка' . mysqli_error($link));
$FIO = $_POST['FIO'];
$login = $_POST['login'];
$email = $_POST['email'];
$password = $_POST['password'];
$password = md5($password);
$rank = 'user';
//echo $FIO."<br>". $login."<br>". $email."<br>". $password."<br>".$rank;
$result = $linkToDataBase->query("SELECT * FROM `user` WHERE '$login' = `login` and '$email' = `email`");
$row_count = mysqli_num_rows($result);
if ($row_count === 0){
	$linkToDataBase->query("INSERT INTO `user` (`fio`, `login`, `email`, `password`, `rank`) VALUES ('$FIO', '$login', '$email', '$password', '$rank')");
	$linkToDataBase->close();
	header('Location: ../');
}else{
	echo 'Пользователь с таким логином и паролем уже существует';
	//Продумать вывод информации об ошибки с уже сущетвующим пользователем.
}