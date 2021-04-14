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
    <link rel="stylesheet" href="../css/module-aplication.css">
</head>

<body>
    <section class="module__aplication" id="moduleAplication">
        <div class="aplication" id="moduleAplicationBlock">
            <div class="aplication__close-icon" onclick="closeModule(this)">
                <img src="../img/icons/cancel.png" alt="errorUpImage">
            </div>
            <div class="aplication__form">
                <h1>Создание заявки</h1>
                <form action="../php/add-aplication.php" method="POST" enctype="multipart/form-data" onsubmit="return aplicationCheck()">
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
    <section class="confirm-block" id="confirmBlock">
        <div class="confirm-block__content">
            <h1>Подтверждение удаления</h1>
            <h2>Вы уверены что хотите удалить заявку?</h2>
            <div class="confirm-block__flex">
                <div class="confirm-block__confirm" id="confirmButtonYes">
                    <h2>Да, удалить</h2>
                </div>
                <div class="confirm-block__cansel" id="confirmButtonNo">
                    <h2>Отмена</h2>
                </div>
            </div>
        </div>
    </section>
    <header class="header__user-page">
        <div class="header__nav">
            <div class="header__flex container">
                <div class="header__logo">
                    <img src="../logo/logo.png" alt="errorUpImage">
                </div>
                <div class="header__flex header__flex-nav">
                    <h3><a href="../index.php">Главная</a></h3>
                    <h3><a href="#" id="buttonOpenModuleAplication">Подать заявку</a></h3>
                    <h3><a href="#">Просмотреть заявки</a></h3>
                    <h3><a href="../index.php">О нас</a></h3>
                    <h3><a href="#">Контакты</a></h3>
                </div>
                <?php
                if (empty($_COOKIE['loginUser'])) {
                    echo "<div class=\"header__user\" id=\"userBlock\">
                       <img src=\"../img/icons/user.png\" alt=\"errorUpImage\">
                        <h3>Войти</h3>
                    </div>";
                } else if (!empty($_COOKIE['loginUser']) && $_COOKIE['loginUser'] == 'admin') {
                    echo "<div class=\"header__user-auth\">
                         <a href=\"../page/admin.php\"><img src=\"../img/icons/admin.png\" alt=\"errorUpImage\"></a>
                        <h2>{$_COOKIE['loginUser']}</h2>
                        <h4><a href='../php/exitUser.php'>Выйти</a></h4>
                    </div>";
                } else if (!empty($_COOKIE['loginUser'])) {
                    echo "<div class=\"header__user-auth\">
                     <a href=\"../page/user.php\"><img src=\"../img/icons/user-auth.png\" alt=\"errorUpImage\"></a>
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
                    $id_user = '';
                    require_once '../php/connection.php';
                    $linkToDataBase = mysqli_connect($host, $user, $password, $database);
                    $resultUser = $linkToDataBase->query("SELECT * FROM `user` WHERE `login` = '$login'");
                    $row_count = mysqli_num_rows($resultUser);
                    if ($row_count === 1) {
                        while ($userData = mysqli_fetch_assoc($resultUser)) {
                            $id_user = $userData['id'];
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
    <section class="my-aplication">
        <div class="my-aplication__h1">
            <h1>Мои заявки</h1>
        </div>
        <div class="my-aplication__flex">
            <?php
            $aplicationUser = $linkToDataBase->query("SELECT * FROM `aplication` WHERE `id_user` = '$id_user'");
            if (mysqli_num_rows($aplicationUser) == 0) {
            } else {
                while ($resultAplication = mysqli_fetch_assoc($aplicationUser)) {
                    $statusAplication = '';
                    if ($resultAplication['status'] == 0) {
                        $statusAplication = '<h3 style="color: orange">Ожидает модерацию</h3>';
                    } else if ($resultAplication['status'] == 1) {
                        $statusAplication = '<h3 style="color: green">Заявка принята</h3>';
                    } else if ($resultAplication['status'] == 2) {
                        $statusAplication = '<h3 style="color: red">Заявка отклонена</h3>';
                    }
                    $form_delete = '';
                    if ($resultAplication['status'] == 0) {
                        $form_delete = "<form action=\"../php/delete-aplication.php\" method=\"POST\" class=\"formDelete\">
                                            <input type=\"hidden\" name=\"id_aplication\" value=\"{$resultAplication['id']}\">
                                            <input class =\"block-aplication__delete-button\" type=\"submit\" value=\"Удалить\">
                                        </form>";
                    }
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
                                <div class=\"block-aplication__status\">
                                    <h3>Статус:</h3>
                                    <h4>{$statusAplication}</h4>
                                    $form_delete
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
    </section>
    <script src="../js/script.js"></script>
    <script src="../js/userScript.js"></script>
    <script>
        const cookieToPhp = '<?php echo $_COOKIE['loginUser'] ?>'
        if (cookieToPhp == '') {
            window.location.href = '../index.php'
        }
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