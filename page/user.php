<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Сделаем лучше вместе!</title>
    <link rel="stylesheet" href="../css/main-style.css">
    <link rel="shortcut icon" href="../logo/logo.png">
    <link rel="stylesheet" href="../css/fontAndMedia.css">
    <link rel="stylesheet" href="../css/block-registr-autorization.css">
    <link rel="stylesheet" href="../css/style-user.css">
</head>

<body>
    <header class="header">
        <div class="header__nav">
            <div class="header__flex container">
                <div class="header__logo">
                    <img src="../logo/logo.png" alt="errorUpImage">
                </div>
                <div class="header__flex header__flex-nav">
                    <h3><a href="../index.php">Главная</a></h3>
                    <h3><a href="#">Подать заявку</a></h3>
                    <h3><a href="#">Просмотреть заявки</a></h3>
                    <h3><a href="../index.php">О нас</a></h3>
                    <h3><a href="#">Контакты</a></h3>
                </div>
                <?php
                if ($_COOKIE['loginUser']) {
                    echo "<div class=\"header__user-auth\">
                            <img src=\"../img/icons/user-auth.png\" alt=\"errorUpImage\">
                            <h2>{$_COOKIE['loginUser']}</h2>
                            <h4><a href='../php/exitUser.php'>Выйти</a></h4>
                        </div>";
                }
                ?>
            </div>
        </div>
    </header>
    <section class="user__account-section">
        <div class="user__flex">
            <div class="user__img">
                <img src="../img/icons/user.png" alt="errorUpImage">
            </div>
            <div class="user__data">
                <div class="user__data-container">
                    <div class="user__h2-center">
                        <h2>Информация о пользователе</h2>
                    </div>
                    <?php
                    $login = $_COOKIE['loginUser'];
                    require_once '../php/connection.php';
                    $linkToDataBase = mysqli_connect($host, $user, $password, $database);
                    $resultUser = $linkToDataBase->query("SELECT * FROM `user` WHERE `login` = '$login'");
                    $row_count = mysqli_num_rows($resultUser);
                    echo $row_count;
                    if($row_count === 1){
                        while ($userData = mysqli_fetch_assoc($resultUser)) {
                            echo "    <div class=\"user__data-inner\">
                                    <div class=\"user__login\">
                                        <h2>Login:</h2>
                                        <h3>{$userData['login']}</h3>
                                    </div>
                                    <div class=\"user__FIO\">
                                        <h2>ФИО:</h2>
                                        <h3>{$userData['fio']}</h3>
                                    </div>
                                    <div class=\"user__email\">
                                        <h2>Email:</h2>
                                        <h3>{$userData['email']}</h3>
                                    </div>
                                </div>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <script>
        const cookieToPhp = '<?php echo $_COOKIE['loginUser'] ?>'
        if (cookieToPhp == '') {
            window.location.href = '../index.php'
        }
    </script>

</body>

</html>