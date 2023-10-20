/**
 * Conjuntos
 */

let lstSet = document.querySelector('#lst-set');
let lstOperators = document.querySelector('#lst-operators-sets');
let txtElement = document.querySelector('#txt-element');
let btnCreateSet = document.querySelector('#btn-create-set');
let btnAddElement = document.querySelector('#btn-add-element');
let btnRemoveElement = document.querySelector('#btn-remove-element');
let btnOperators = document.querySelector('#btn-operators-sets');
let divSets = document.querySelector('#div-sets');
let divOperation = document.querySelector('#div-operation');


txtElement.addEventListener('change', () => {
    $validateElementEmpty(txtElement);
});


btnAddElement.addEventListener('click', () => {
    $validateElementEmpty(txtElement);
    switch (lstSet.value) {
        case 'A':
            if (objArray.findElement(objSet.arrayA, txtElement.value) === -1) {
                objArray.stack(objSet.arrayA, txtElement.value);
            }
            break;
            case 'B':
            if (objArray.findElement(objSet.arrayB, txtElement.value) === -1) {
                objArray.stack(objSet.arrayB, txtElement.value);
            }
            break;
        case 'U':
            if (objArray.findElement(objSet.arrayU, txtElement.value) === -1) {
                objArray.stack(objSet.arrayU, txtElement.value);
            }
            break;
    }
    divSets.innerHTML = objSet.showSet('U', objSet.arrayU) + "; "; 
    divSets.innerHTML += objSet.showSet('A', objSet.arrayA) + "; "; 
    divSets.innerHTML += objSet.showSet('B', objSet.arrayB); 
});


btnRemoveElement.addEventListener('click', () => {
    let position;
    switch (lstSet.value) {
        case 'A':
            position = objArray.findElement(objSet.arrayA, txtElement.value);
            if (position > -1) {
                objArray.removeElement(objSet.arrayA, position);
            }
            break;
        case 'B':
            position = objArray.findElement(objSet.arrayB, txtElement.value);
            if (position > -1) {
                objArray.removeElement(objSet.arrayB, position);
            }
            break;
        case 'U':
            position = objArray.findElement(objSet.arrayU, txtElement.value);
            if (position > -1) {
                objArray.removeElement(objSet.arrayU, position);
            }
            break;
    }
    divSets.innerHTML = objSet.showSet('U', objSet.arrayU) + "; "; 
    divSets.innerHTML += objSet.showSet('A', objSet.arrayA) + "; "; 
    divSets.innerHTML += objSet.showSet('B', objSet.arrayB); 
});


btnOperators.addEventListener('click', () => {
    let arrayResult = [];
    let arrayCurrent = [];
    switch (lstOperators.value) {
        case 'union':
            arrayResult = objSet.union(objSet.arrayA, objSet.arrayB);
            divOperation.innerHTML = objSet.showSet('A &#8746; B', arrayResult);
            break;
        case 'interseccion':
            arrayResult = objSet.intersection(objSet.arrayA, objSet.arrayB);
            divOperation.innerHTML = objSet.showSet('A &#8745; B', arrayResult);
            break;
        case 'diferencia':
            arrayResult = objSet.minus(objSet.arrayA, objSet.arrayB);
            divOperation.innerHTML = objSet.showSet('A &#8722; B', arrayResult);
            break;
        case 'diferencia simetrica':
            let arrayUnion1 = objSet.union(objSet.arrayA, objSet.arrayB);
            let arrayIntersection1 = objSet.intersection(objSet.arrayA, objSet.arrayB);
            arrayResult = objSet.minus(arrayUnion1, arrayIntersection1);
            divOperation.innerHTML = objSet.showSet('A &#8710; B', arrayResult);
            break;
        case 'complemento':
            switch (lstSet.value) {
                case 'A':
                    arrayCurrent = objSet.arrayA.slice();
                    break;
                case 'B':
                    arrayCurrent = objSet.arrayB.slice();
                    break;
                case 'U':
                    arrayCurrent = objSet.arrayU.slice();
                    break;
            }
            arrayResult = objSet.minus(objSet.arrayU, arrayCurrent);
            divOperation.innerHTML = objSet.showSet(`${lstSet.value}'`, arrayResult);
            break;
        case 'potencia':
            switch (lstSet.value) {
                case 'A':
                    arrayCurrent = objSet.arrayA.slice();
                    break;
                case 'B':
                    arrayCurrent = objSet.arrayB.slice();
                    break;
                case 'U':
                    arrayCurrent = objSet.arrayU.slice();
                    break;
            }
            arrayResult = objSet.powerSet(arrayCurrent);
            divOperation.innerHTML = objSet.showSet(`P(${lstSet.value})`, arrayResult);
            break;
        case 'producto cartesiano':
            arrayResult = objSet.cartesianProduct(objSet.arrayA, objSet.arrayB);
            divOperation.innerHTML = objSet.showSet('A &times; B', arrayResult);
            break;
    }
});

