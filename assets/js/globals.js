
const arrayLinks = [
    '../middlewares/binary.php', 
    '../middlewares/numerical-systems.php',
    '../middlewares/algebra.php',
    '../middlewares/files.php',
    '../middlewares/questions.php'
];

let arraySlider = [
    '../assets/images/banner_header11.jpg',
    '../assets/images/banner_header2.jpg',
    '../assets/images/banner_header3.jpg'
];


document.addEventListener('submit', (event) => {
    event.preventDefault();
});


activateMenu(window.location.href.substring(window.location.href.lastIndexOf('/') + 1));

function activateMenu(page)
{
    const $listMenu = document.querySelector('ul.right').getElementsByTagName('li'); 
    const arrayList = Array.from($listMenu);
    arrayList.forEach((element) => {
        if (element.innerHTML.indexOf(page, 0) >= 0) {
            element.setAttribute('class', 'active');
        } else {
            element.setAttribute('class', '');
        }
    });
}


function $validateElementEmpty(element)
{
    element.value = element.value.trim();
    element.value = element.value.length > 0 ? element.value : 0;
}



