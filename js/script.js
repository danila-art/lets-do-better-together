function get_cookie(cookie_name) {
    var results = document.cookie.match('(^|;) ?' + cookie_name + '=([^;]*)(;|$)');
    if (results)
        return (unescape(results[2]));
    else
        return null;
}
const moduleRegistrInput = document.getElementById('moduleRegistr').querySelectorAll('input');
const userBlock = document.getElementById('userBlock');
userBlock.addEventListener('click', () => {
    if (get_cookie('') != null) {


    } else {

    }
})
//Отлавливание ошибок
let errorReg = [];
function registrCheck() {
    moduleRegistrInput.forEach((key)=>{
        if (key.value == ''){
            key.nextElementSibling.innerHTML = 'Поле пусто'
            errorReg.push(false)
            key.addEventListener('keydown', ()=>{
                key.nextElementSibling.innerHTML = '';
            })
        }else if (/[а-я]/i.test(moduleRegistrInput[0].value) == false && moduleRegistrInput[0].value != '') {
            moduleRegistrInput[0].nextElementSibling.innerHTML = 'Только кириллические буквы';
        }else if (/[a-z]/i.test(moduleRegistrInput[1].value) == false && moduleRegistrInput[1].value != '') {
            moduleRegistrInput[1].nextElementSibling.innerHTML = 'Только латинские буквы';
        }
        //else if (moduleRegistrInput[2].value && moduleRegistrInput[2].value != '') {} //Email
        //else if (moduleRegistrInput[3].value && moduleRegistrInput[3].value != '') {} // password
        else if (moduleRegistrInput[3].value !== moduleRegistrInput[4].value && moduleRegistrInput[4].value != '') {
            moduleRegistrInput[4].nextElementSibling.innerHTML = 'Пароли не совпадают';
        }
    });

}
