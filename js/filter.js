// 0 - Показать все
// 1 - Ремонт дорог
// 2 - Ремонт детской площадки
// 3 - Ремонт канализации
// 4 - Ремонт помещений
// 5 - Другое
const formFilter = document.getElementById('formFilter'); // форма с select
const blockAplicationFilter = document.querySelectorAll('.block-aplication');
formFilter.addEventListener('submit', (Event) => {
    Event.preventDefault();
    const filterCategory = document.getElementById('filter__category');
    if (filterCategory.value == 'Фильтр по категориям') {
        console.log('Укажите категорию');
    } else {
        blockAplicationFilter.forEach((element) => {
            if (filterCategory.value == 'Показать все') {
                element.style, display = 'block';
                console.log('Показать все заявки');
            } else if (element.querySelector('.category_for_filter').innerText == filterCategory.value) {
                console.log('категории совпали');
                element.style.display = 'block';
            } else {
                console.log(filterCategory.value);
                console.log('категории не совпали');
                element.style.display = 'none';
            }
        });
    }
});