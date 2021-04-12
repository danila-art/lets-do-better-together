<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../css/main-style.css">
    <link rel="shortcut icon" href="../logo/logo.png">
    <link rel="stylesheet" href="../css/fontAndMedia.css">
    <link rel="stylesheet" href="../css/block-registr-autorization.css">
    <link rel="stylesheet" href="../css/style-user.css">
    <link rel="stylesheet" href="../css/module-aplication.css">
    <link rel="stylesheet" href="../css/admin-style.css">
</head>

<body>
    <section class="form-complete-cansel" id="formBody">
        <div class="form-complete-cansel__complete" id="formComplete">
            <div class="form-complete-cansel__h1">
                <h1>Принять заявку</h1>
            </div>
            <div class="form-complete-cansel__h2">
                <h2>Загрузите изображение выполненной заявки</h2>
            </div>
            <form action="../php/adminQueryComplete.php" method="POST" onsubmit="return checkImage()" enctype="multipart/form-data">
                <input type="hidden" name="id_aplication" id="inValueIdAplicationComplete" value="">
                <input type="file" name="aplication_img_after" id="inputFile">
                <h4 class="file-error" id="fileError"></h4>
                <div class="form-complete-cansel__complete-flex">
                    <div class="form-complete-cansel__complete-button">
                        <input type="submit" value="Принять заявку">
                    </div>
                    <div class="form-complete-cansel__cansel-button" id="closeButtonComplete">
                        <h2>Отмена</h2>
                    </div>
                </div>
            </form>
        </div>
        <div class="form-complete-cansel__cansel" id="formCansel">
            <div class="form-complete-cansel__h1">
                <h1>Отклонить заявку</h1>
            </div>
            <div class="form-complete-cansel__cansel-flex">
                <div class="form-complete-cansel__cansel-form">
                    <form action="../php/adminQueryCansel.php" method="POST" onsubmit="">
                        <input type="hidden" name="id_aplication" id="inValueIdAplicationCansel" value="">
                        <input type="submit" value="Да, отклонить">
                    </form>
                </div>
                <div class="form-complete-cansel__cansel-button" id="closeButtonCansel">
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
                    <h3><a href="#">Подать заявку</a></h3>
                    <h3><a href="#">Просмотреть заявки</a></h3>
                    <h3><a href="../index.php">О нас</a></h3>
                    <h3><a href="#">Контакты</a></h3>
                </div>
                <?php
                if ($_COOKIE['loginUser'] == 'admin') {
                    echo "<div class=\"header__user-auth\">
                            <img src=\"../img/icons/admin.png\" alt=\"errorUpImage\">
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
                <img src="../img/icons/admin.png" alt="errorUpImage">
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
    <section class="out-aplication">
        <div class="out-aplication__h1">
            <h1>Вывод заявок пользователей</h1>
        </div>
        <div class="out-aplication__main">
            <div class="section-main-article__flex">
                <div class="my-aplication__flex">
                    <?php
                    require_once '../php/connection.php';
                    $linkToDataBase = mysqli_connect($host, $user, $password, $database);
                    $aplicationUser = $linkToDataBase->query("SELECT * FROM `aplication`");
                    if (mysqli_num_rows($aplicationUser) == 0) {
                        echo "<h1 style =\"color: red; text-align: center;\">Странно, но заявок от пользователей не приходило</h1>";
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
                            $id_aplication = $resultAplication['id'];
                            $flex_button = '';
                            //if staus 0 = Ожидает модерации
                            //if staus 1 = Заявка принята
                            //if staus 2 = Заявка отклонена
                            if ($resultAplication['status'] == 0) {
                                $flex_button = "<div class = \"block-aplication__flex-button\">
                                                    <div class = \"block-aplication__button-complete adminBtnComplete\" >
                                                        <h2>Принять</h2>
                                                    </div>
                                                    <input type=\"hidden\" value=\"{$id_aplication}\">
                                                    <div class = \"block-aplication__button-cansel adminBtnCansel\" >
                                                        <h2>Отклонить</h2>
                                                    </div>
                                                    <input type=\"hidden\" value=\"{$id_aplication}\">
                                                </div>";
                            } else if ($resultAplication['status'] == 2) {
                                $flex_button = '';
                            } else if ($resultAplication['status'] == 1) {
                                $flex_button = '';
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
                                </div>
                                $flex_button
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
        </div>
    </section>
    <script>
        const cookieToPhp = '<?php echo $_COOKIE['loginUser'] ?>'
        if (cookieToPhp == '') {
            window.location.href = '../index.php'
        }
    </script>
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
        // Кнопки на блоке заявки
        const adminBtnComplete = document.querySelectorAll('.adminBtnComplete');
        const adminBtnCansel = document.querySelectorAll('.adminBtnCansel');
        adminBtnComplete.forEach((element) => {
            element.addEventListener('click', () => {
                formBody.style.display = 'block';
                formComplete.style.display = 'block';
                const idAplication = element.nextElementSibling.value;
                document.getElementById('inValueIdAplicationComplete').value = idAplication;
            });
        });
        adminBtnCansel.forEach((element) => {
            element.addEventListener('click', () => {
                formBody.style.display = 'block';
                formCansel.style.display = 'block';
                const idAplication = element.nextElementSibling.value;
                document.getElementById('inValueIdAplicationCansel').value = idAplication;
            });
        })
        //блоки формы после нажатия кнопок
        const formBody = document.getElementById('formBody');
        const formComplete = document.getElementById('formComplete');
        const formCansel = document.getElementById('formCansel');
        const closeButtonComplete = document.getElementById('closeButtonComplete');
        const closeButtonCansel = document.getElementById('closeButtonCansel');
        closeButtonComplete.addEventListener('click', () => {
            formBody.style.display = 'none';
            formComplete.style.display = 'none';
        });
        closeButtonCansel.addEventListener('click', () => {
            formBody.style.display = 'none';
            formCansel.style.display = 'none';
        });

        function checkImage() {
            const imageInput = document.getElementById('inputFile');
            const imageFile = document.getElementById('inputFile').files[0];
            if (imageInput.value == '') {
                document.getElementById('fileError').innerHTML = 'Поле пусто';
                return false;
            } else if (imageFile.type == 'image/jpeg' || imageFile.type == 'image/png') {
                document.getElementById('fileError').innerHTML = '';
                return true;
            } else {
                document.getElementById('fileError').innerHTML = 'Тип файла не приемлем'
                return false;
            }

        }
    </script>
</body>

</html>