const moduleAutoRegistr = document.getElementById('moduleAutoRegistr');
const blockModuleRegistrInput = document.getElementById('moduleRegistr');
const blockModuleAutorization = document.getElementById('moduleAutorization');
const moduleRegistrInput = document.getElementById('moduleRegistr').querySelectorAll('input');
const moduleAutorization = document.getElementById('moduleAutorization').querySelectorAll('input');
const userBlock = document.getElementById('userBlock');
userBlock.addEventListener('click', () => {
    if (getComputedStyle(moduleAutoRegistr).display == 'none') { //если php куки разработы вставить в условие get_cookie('') != null
        moduleAutoRegistr.style.display = 'block';
        blockModuleAutorization.style.display = 'block';
    }
});

//Перенаправление на модуль регистрация
const registrLink = document.getElementById('registrLink');
registrLink.addEventListener('click', () => {
    blockModuleRegistrInput.style.display = 'block';
    blockModuleAutorization.style.display = 'none';
})
// Перенаправление на модуль авторизация
const autorizationLink = document.getElementById('autorizationLink');
const openAutorization = document.getElementById('openAutorization');
autorizationLink.addEventListener('click', () => {
    blockModuleRegistrInput.style.display = 'none';
    blockModuleAutorization.style.display = 'block';
})
openAutorization.addEventListener('click', () => {
    sectionError.style.display = 'none';
    errorAplication.style.display = 'none';
    moduleAutoRegistr.style.display = 'block';
    blockModuleAutorization.style.display = 'block';
})
//Закрытие окна регистрации и авторизации и модуля заявки и модуля error
function closeModule(element) {
    if (getComputedStyle(moduleAplication).display == 'block') {
        moduleAplication.style.display = 'none';
    }
    if (getComputedStyle(sectionError).display == 'block') {
        sectionError.style.display = 'none';
    }
    moduleAutoRegistr.style.display = 'none';
    element.parentNode.style.display = 'none'
}
//Отлавливание ошибок
function AutorizationCheck() {
    let errorAuto = [];
    moduleAutorization.forEach((key) => {
        if (key.value == '') {
            key.nextElementSibling.innerHTML = 'Поле пусто';
            errorAuto.push(false);
            key.addEventListener('keydown', () => {
                key.nextElementSibling.innerHTML = '';
            })
        }
    });
    if (/[a-z]/i.test(moduleAutorization[0].value) === false && moduleAutorization[0].value != '') {
        moduleAutorization[0].nextElementSibling.innerHTML = 'Только латинскими буквами';
        errorAuto.push(false)
    }
    if (errorAuto.length === 0) {
        return true;
    } else {
        return false;
    }
}

function registrCheck() {
    let errorReg = [];
    moduleRegistrInput.forEach((key) => {
        if (key.value == '') {
            key.nextElementSibling.innerHTML = 'Поле пусто'
            errorReg.push(false)
            key.addEventListener('keydown', () => {
                key.nextElementSibling.innerHTML = '';
            })
        }
    });
    if (/[а-я]/i.test(moduleRegistrInput[0].value) == false && moduleRegistrInput[0].value != '') {
        moduleRegistrInput[0].nextElementSibling.innerHTML = 'Только кириллические буквы';
        errorReg.push(false);
    } if (/[a-z]/i.test(moduleRegistrInput[1].value) == false && moduleRegistrInput[1].value != '') {
        moduleRegistrInput[1].nextElementSibling.innerHTML = 'Только латинские буквы';
        errorReg.push(false);
    }
    //if (moduleRegistrInput[2].value && moduleRegistrInput[2].value != '') {} //Email
    //if (moduleRegistrInput[3].value && moduleRegistrInput[3].value != '') {} // password
    if (moduleRegistrInput[3].value !== moduleRegistrInput[4].value && moduleRegistrInput[4].value != '') {
        moduleRegistrInput[4].nextElementSibling.innerHTML = 'Пароли не совпадают';
        errorReg.push(false);
    }
    if (errorReg.length === 0) {
        console.log('Все ок!');
        return true;
    } else {
        return false;
    }
    console.log(errorReg);
}
function aplicationCheck() {
    let errorFalse = [];
    const aplication__name = document.getElementById('aplication__name');
    const aplication__description = document.getElementById('aplication__description');
    const aplication__category = document.getElementById('aplication__category');
    const aplication__img_before = document.getElementById('aplication__img_before');
    const aplication__img_beforeFile = aplication__img_before.files[0];
    console.log(aplication__img_beforeFile);
    if (aplication__name.value == '') {
        aplication__name.nextElementSibling.innerHTML = 'Поле пусто';
        errorFalse.push('Поле aplication__name пусто');
    } else {
        aplication__name.nextElementSibling.innerHTML = '';
    }
    if (aplication__description.value == '') {
        aplication__description.nextElementSibling.innerHTML = 'Поле пусто';
        errorFalse.push('Поле aplication__description пусто');
    } else {
        aplication__description.nextElementSibling.innerHTML = '';
    }
    if (aplication__category.value == 'Выбрать категорию') {
        aplication__category.nextElementSibling.innerHTML = 'Категория не выбрана';
        errorFalse.push('Категория не выбрана');
    } else {
        aplication__category.nextElementSibling.innerHTML = '';
    }
    if (aplication__img_before.value == '') {
        aplication__img_before.nextElementSibling.innerHTML = 'Изображение не выбрано';
        errorFalse.push('Изображение не выбрано');
    } else if (aplication__img_beforeFile.type == 'image/jpeg' || aplication__img_beforeFile.type == 'image/png' || aplication__img_beforeFile.type == 'image/jpg') {
        aplication__img_before.nextElementSibling.innerHTML = '';
    } else {
        errorFalse.push('Тип файла не является png или jpeg');
        aplication__img_before.nextElementSibling.innerHTML = 'Тип файла не является png или jpeg';
    }
    if (errorFalse.length == 0) {
        return true;
    } else {
        return false;
    }

}