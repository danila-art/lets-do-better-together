<?php
//echo "Куки-".$_COOKIE['userLogin'];
?>

<!doctype html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Сделаем лучше вместе!</title>
    <link rel="stylesheet" href="css/main-style.css">
    <link rel="shortcut icon" href="logo/logo.png">
    <link rel="stylesheet" href="css/block-registr-autorization.css">
    <link rel="stylesheet" href="css/module-aplication.css">
    <link media="screen" rel="stylesheet" href="css/fontAndMedia.css">
</head>

<body>
    <section class="error" id="sectionError">
        <div class="error__aplication" id="errorAplication">
            <div class="block__close-icon" onclick="closeModule(this)">
                <img src="img/icons/cancel.png" alt="errorUpImage">
            </div>
            <div class="error__aplication-h1">
                <h1>Просим прощения, но подать заявку могут только авторизированные пользователи.</h1>
            </div>
            <div class="error__aplication-button" id="openAutorization">
                <h3>Авторизироваться</h3>
            </div>
        </div>
    </section>
    <section class="module__aplication" id="moduleAplication">
        <div class="aplication" id="moduleAplicationBlock">
            <div class="aplication__close-icon" onclick="closeModule(this)">
                <img src="img/icons/cancel.png" alt="errorUpImage">
            </div>
            <div class="aplication__form">
                <h1>Создание заявки</h1>
                <form action="php/add-aplication.php" method="POST" enctype="multipart/form-data" onsubmit="return aplicationCheck()">
                    <div class="aplication__name">
                        <h2>Название заявки</h2>
                        <input type="text" name="aplication__name" id="aplication__name">
                        <h4></h4>
                    </div>
                    <div class="aplication__description">
                        <h2>Описание</h2>
                        <input type="text" name="aplication__description" id="aplication__description">
                        <h4></h4>
                    </div>
                    <div class="aplication__category">
                        <h2>Выберите категорию</h2>
                        <select name="aplication__category" id="aplication__category">
                            <option selected disabled>Выбрать категорию</option>
                            <option value="Ремонт дорог">Ремонт дорог</option>
                            <option value="Ремонт детской площадки">Ремонт детской площадки</option>
                            <option value="Ремонт канализации">Ремонт канализации</option>
                            <option value="Ремонт помещений">Ремонт помещений</option>
                            <option value="Другое">Другое</option>
                        </select>
                        <h4></h4>
                    </div>
                    <div class="aplication__img_before">
                        <h2>Загрузите изображение</h2>
                        <input type="file" name="aplication__img_before" id="aplication__img_before">
                        <h4></h4>
                    </div>
                    <div class="aplication__submit">
                        <h2></h2>
                        <input type="submit" value="Отправить">
                        <h4></h4>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <section class="block__registr-autorization" id="moduleAutoRegistr">
        <div class="block__autorization" id="moduleAutorization">
            <div class="block__close-icon" onclick="closeModule(this)">
                <img src="img/icons/cancel.png" alt="errorUpImage">
            </div>
            <form action="php/autorization_user.php" method="POST" onsubmit="return AutorizationCheck()">
                <div class="block__inner">
                    <h2>Авторизация</h2>
                    <div class="block__registr-input-box">
                        <h3>Логин</h3>
                        <input type="text" name="login">
                        <h4></h4>
                    </div>
                    <div class="block__registr-input-box">
                        <h3>Пароль</h3>
                        <input type="password" name="password">
                        <h4></h4>
                    </div>
                    <div class="block__autorization-submit-box">
                        <input type="submit" value="Авторизироваться">
                    </div>
                    <div class="block__link">
                        <h3>Если вы еще не зарегистрированы</h3>
                        <h3 id="registrLink">Зарегистрируйтесь</h3>
                    </div>
                </div>
            </form>
        </div>
        <div class="block__registr" id="moduleRegistr">
            <div class="block__close-icon" onclick="closeModule(this)">
                <img src="img/icons/cancel.png" alt="errorUpImage">
            </div>
            <form action="php/registr_user.php" method="POST" onsubmit="return registrCheck();">
                <div class="block__inner">
                    <h2>Регистарция</h2>
                    <div class="block__registr-input-box">
                        <h3>Введите ФИО</h3>
                        <input type="text" name="FIO">
                        <h4></h4>
                    </div>
                    <div class="block__registr-input-box">
                        <h3>Придумайте логин</h3>
                        <input type="text" name="login">
                        <h4></h4>
                    </div>
                    <div class="block__registr-input-box">
                        <h3>Введите email</h3>
                        <input type="email" name="email">
                        <h4></h4>
                    </div>
                    <div class="block__registr-input-box">
                        <h3>Придумайте пароль</h3>
                        <input type="password" name="password">
                        <h4></h4>
                    </div>
                    <div class="block__registr-input-box">
                        <h3>Повторите пароль</h3>
                        <input type="password" name="password">
                        <h4></h4>
                    </div>
                </div>
                <div class="block__registr-input-box-check">
                    <div class="block__registr-input-box-check-flex">
                        <input type="checkbox" checked>
                        <h3>Я принимаю условия политики и конфедициальности</h3>
                    </div>
                    <h4></h4>
                </div>
                <div class="block__registr-submit-box">
                    <input type="submit" value="Зарегистрироваться">
                </div>
                <div class="block__link">
                    <h3>Если уже зарегистрированы</h3>
                    <h3 id="autorizationLink">Войдите</h3>
                </div>
            </form>
        </div>
    </section>
    <header class="header">
        <div class="header__nav">
            <div class="header__flex container">
                <div class="header__logo">
                    <img src="logo/logo.png" alt="errorUpImage">
                </div>
                <div class="header__flex header__flex-nav">
                    <h3><a href="index.php">Главная</a></h3>
                    <h3><a href="#" id="buttonOpenModuleAplication">Подать заявку</a></h3>
                    <h3><a href="#">Просмотреть заявки</a></h3>
                    <h3><a href="#about">О нас</a></h3>
                    <h3><a href="#">Контакты</a></h3>
                </div>
                <?php
                if (empty($_COOKIE['loginUser'])) {
                    echo "<div class=\"header__user\" id=\"userBlock\">
                       <img src=\"img/icons/user.png\" alt=\"errorUpImage\">
                        <h3>Войти</h3>
                    </div>";
                } else if (!empty($_COOKIE['loginUser']) && $_COOKIE['loginUser'] == 'admin') {
                    echo "<div class=\"header__user-auth\">
                         <a href=\"page/admin.php\"><img src=\"img/icons/admin.png\" alt=\"errorUpImage\"></a>
                        <h2>{$_COOKIE['loginUser']}</h2>
                        <h4><a href='php/exitUser.php'>Выйти</a></h4>
                    </div>";
                } else if (!empty($_COOKIE['loginUser'])) {
                    echo "<div class=\"header__user-auth\">
                     <a href=\"page/user.php\"><img src=\"img/icons/user-auth.png\" alt=\"errorUpImage\"></a>
                    <h2>{$_COOKIE['loginUser']}</h2>
                    <h4><a href='php/exitUser.php'>Выйти</a></h4>
                </div>";
                }
                ?>
            </div>
        </div>
    </header>
    <section class="about" id="about">
        <div class="container">
            <div class="about__h1">
                <h1>О нас</h1>
            </div>
            <div class="about__flex">
                <div class="about__box">
                    <h2>10 лет с вами</h2>
                    <h3>На протяжении 10 лет мы помогаем жителям улучшить их проживание и сделать жизнь комфортнее.</h3>
                </div>
                <div class="about__box">
                    <h2>Мы развиваемся</h2>
                    <h3>Наш проект прогрессирует и совершенствуется каждый день, добавляя все новый функционал и делая
                        удобнее для вас.</h3>
                </div>
                <div class="about__box">
                    <h2>Лучшие сотрудники</h2>
                    <h3>Наши сотрудники с большим опытом работы, в течении 5 минут просматривают заявки и передают их
                        управлению по данному типу работ.</h3>
                </div>
            </div>
        </div>
    </section>
    <section class="section-main-article">
        <div class="section-main-article__h1">
            <h1>Последние 4 решеные проблемы</h1>
        </div>
        <div class="section-main-article__flex">
            <div class="my-aplication__flex">
                <?php
                require_once 'php/connection.php';
                $linkToDataBase = mysqli_connect($host, $user, $password, $database);
                $aplicationUser = $linkToDataBase->query("SELECT * FROM `aplication` WHERE `status` = '1' LIMIT 4");
                if (mysqli_num_rows($aplicationUser) == 0) {
                    echo "<h1 style =\"color: red; text-align: center;\">Пока не было решенных заявок</h1>";
                } else {
                    while ($resultAplication = mysqli_fetch_assoc($aplicationUser)) {
                        $image_name = $resultAplication['img-before-name'];
                        $image_content = base64_encode($resultAplication['img-before-tmp']);
                        $second_image = '';
                        if ($resultAplication['status'] == 1) {
                            $image_after_name = $resultAplication['img-after-name'];
                            $image_after_content = base64_encode($resultAplication['img-after-tmp']);
                            $second_image = "<img src=\"data:image/jpeg;base64, $image_after_content\" alt=\"errorUpImage\" class = \"block__inner-img\">";
                        }
                        // echo "<img src =\"data:image/jpeg;base64,$image_content\" alt = 'errorUpImage'>";
                        echo "<div class=\"block-aplication\">
                            <div class=\"block-aplication__inner-content\">
                                <div class=\"block-aplication__h1\">
                                    <h1>{$resultAplication['name']}</h1>
                                 </div>
                                <div class=\"block-aplication__img\">
                                    <img src=\"data:image/jpeg;base64, $image_content\" alt=\"errorUpImage\" class = \"block__inner-img\">
                                    $second_image
                                </div>
                                <div class=\"block-aplication__description\">
                                    <h2>Описание:</h2>
                                    <h3>{$resultAplication['description']}</h3>
                                </div>
                                <div class=\"block-aplication__flex-category-date\">
                                    <div class=\"block-aplication__category\">{$resultAplication['category']}</div>
                                    <div class=\"block-aplication__date\">{$resultAplication['date']}</div>
                                </div>
                            </div>
                        </div>";
                    }
                }

                ?>
            </div>
        </div>
    </section>
    <script src="js/script.js"></script>
    <script>
        // script img collection
        const blockAplication = document.querySelectorAll('.block-aplication');
        blockAplication.forEach((element) => {
            let blockImg = element.querySelectorAll('.block__inner-img');
            if (blockImg.length == 2) {
                blockImg[1].style.display = 'none';
                blockImg[0].addEventListener('mouseover', () => {
                    blockImg[0].style.display = 'none';
                    blockImg[1].style.display = 'block';
                })
                blockImg[1].addEventListener('mouseout', () => {
                    blockImg[1].style.display = 'none';
                    blockImg[0].style.display = 'block';
                })
            }
        });
        //Кнопка открытия модуля подачи заявки
        const sectionError = document.getElementById('sectionError');
        const buttonOpenModuleAplication = document.getElementById('buttonOpenModuleAplication');
        const errorAplication = document.getElementById('errorAplication');
        const moduleAplication = document.getElementById('moduleAplication');
        const moduleAplicationBlock = document.getElementById('moduleAplicationBlock');
        buttonOpenModuleAplication.addEventListener('click', () => {
            let valueCookie = '<?php echo $_COOKIE['loginUser'] ?>';
            if (valueCookie == '') {
                sectionError.style.display = 'block';
                errorAplication.style.display = 'block';
            } else {
                moduleAplication.style.display = 'block';
                moduleAplicationBlock.style.display = 'block';
            }
        });
    </script>
</body>

</html>