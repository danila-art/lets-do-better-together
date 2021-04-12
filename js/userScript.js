// user -> confirm delete aplication
let formDelete = document.querySelectorAll('.formDelete');
formDelete.forEach((element) => {
    element.addEventListener('submit', (formEvent) => {
        formEvent.preventDefault();
        console.dir(formEvent);
        const confirmBlock = document.getElementById('confirmBlock');
        if (getComputedStyle(confirmBlock).display == 'none') {
            confirmBlock.style.display = 'block';
        }
        const confirmButtonYes = document.getElementById('confirmButtonYes');
        const confirmButtonNo = document.getElementById('confirmButtonNo');
        confirmButtonYes.addEventListener('click', () => {
            confirmBlock.style.display = 'none';
            element.submit();
        })
        confirmButtonNo.addEventListener('click', () => {
            confirmBlock.style.display = 'none';
            return false;
        })
    })
});
     // console.log('Событие произошло');
    // return false;