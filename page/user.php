<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Сделаем лучше вместе!</title>
    <link rel="stylesheet" href="../css/main-style.css">
    <link rel="shortcut icon" href="../logo/logo.png">
    <link rel="stylesheet" href="../css/fontAndMedia.css">
    <link rel="stylesheet" href="../css/block-registr-autorization.css">
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
    <script>
        const cookieToPhp = '<?php echo $_COOKIE['loginUser']?>'
        if(cookieToPhp == ''){
            window.location.href = '../index.php'
        }
    </script>
</body>

</html>