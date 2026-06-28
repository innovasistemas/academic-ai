let x = 0;
let y = 0;

const clrColor = document.querySelector('#color-flag');
const divFlag = document.querySelector('#div-flag');
const cboOrientation = document.querySelector('#cbo-orientation');
const nbrProportion = document.querySelector('#nbr-proportion');
const btnReset = document.querySelector('#btn-reset');
const fragment = document.createDocumentFragment();
const svg = document.createElementNS('http://www.w3.org/2000/svg', 'svg');

fragment.appendChild(svg);
divFlag.appendChild(fragment);

svg.setAttribute('id', 'svg-flag'); 
svg.setAttribute('width', '150'); 
svg.setAttribute('height', '100'); 
svg.setAttribute('preserveAspectRatio', 'none');

clrColor.addEventListener('change', () => {
    const rect = document.createElementNS('http://www.w3.org/2000/svg', 'rect');
    let width = 0;
    let height = 0;
    if (cboOrientation.value == 'vertical') {
        width = parseInt(nbrProportion.value);
        height = 2;
        x += width;
        svg.setAttribute('viewBox', `0 0 ${x} ${height}`);
        rect.setAttribute('x', x - width);
        rect.setAttribute('y', 0);
    } else {
        width =  7;
        height = parseInt(nbrProportion.value);
        y += height;
        svg.setAttribute('viewBox', `0 0 ${width} ${y}`);
        rect.setAttribute('x', 0);
        rect.setAttribute('y', y - height);
    } 
    rect.setAttribute('width', width);
    rect.setAttribute('height', height);
    rect.setAttribute('fill', clrColor.value);
    svg.appendChild(rect);
});

btnReset.addEventListener('click', () => {
    cboOrientation.value = Array.from(cboOrientation.options).find(opt => opt.defaultSelected).value; 
    nbrProportion.value = nbrProportion.defaultValue; 
    clrColor.value = clrColor.defaultValue;
    svg.replaceChildren();
    x = 0;
    y = 0;
});
