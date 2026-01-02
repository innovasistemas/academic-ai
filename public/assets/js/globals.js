// Cancelar evento submit
document.addEventListener('submit', (event) => {
    event.preventDefault();
});


// Efecto para el menú
activateMenu(window.location.href.substring(window.location.href.lastIndexOf('/') + 1));

function activateMenu(page)
{
    if (page !== '') {
        const arrayList = document.querySelectorAll('ul.active-option li a'); 
        arrayList.forEach((element) => {
            if (element.href.indexOf(page, 0) >= 0) {
                element.classList.add('active', 'bg-dark');
            }
        });
    } 
}


// Validación global de inputs
function $validateElementEmpty(element)
{
    element.value = element.value.trim();
    element.value = element.value.length > 0 ? element.value : 0;
}


// Activar los tooltips
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
});

