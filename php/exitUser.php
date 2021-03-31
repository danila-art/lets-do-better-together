<?php
if (isset($_COOKIE['loginUser'])){
	setcookie("loginUser", '', time()-1000000, '/');
	header('Location: ../');
}else{
	echo 'Ошибка';
}
