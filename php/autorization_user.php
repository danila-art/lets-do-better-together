<?php
$host = 'localhost'; // адрес сервера
$database = 'lets-do-better-together'; // имя базы данных
$user = 'root'; // имя пользователя
$password = 'root'; // пароль
$linkToDataBase = mysqli_connect($host, $user, $password, $database);
$login = $_POST['login'];
$password = $_POST['password'];
$password = md5($password);
$result = $linkToDataBase->query("SELECT * FROM `user` WHERE '$login' = `login`");
$row_count = mysqli_num_rows($result);
$login_user = '';
$rank_user = '';
if ($row_count === 1) {
	while ($out_user = mysqli_fetch_assoc($result)) {
		$login_user = $out_user['login'];
		$rank_user = $out_user['rank'];
	}
	if ($rank_user == 'user') {
		setcookie("loginUser", $login_user, time() + 3600, '/');
		header('Location: ../page/user.php');
	}else if($rank_user == 'admin'){
		setcookie("loginUser", $login_user, time() + 3600, '/');
		header('Location: ../page/admin.php');
	}
}else{
	echo "Пользователь не найден!"; //Доработать вывод
}
$linkToDataBase->close();
