// Componentes calculadora numérica
let txtExpCalcNum = document.querySelector('#txt-expression-calc-numeric')
let txtResCalcNum = document.querySelector('#txt-result-calc-numeric')
let btnSin = document.querySelector('#btn-sin');
let btnCos = document.querySelector('#btn-cos');
let btnTan = document.querySelector('#btn-tan');
let btnPi = document.querySelector('#btn-pi');
let btnE = document.querySelector('#btn-e');
let btnFact = document.querySelector('#btn-factorial');
let btnAbs = document.querySelector('#btn-abs');
let btnInv = document.querySelector('#btn-inv');
let btnPrime = document.querySelector('#btn-prime');
let btnSum = document.querySelector('#btn-sum');
let btnRound = document.querySelector('#btn-round');
let btnPerfect = document.querySelector('#btn-perfect');
let btnCeil = document.querySelector('#btn-ceil');
let btnFloor = document.querySelector('#btn-floor');

let $expResult = '';


btnSin.addEventListener('click', () => {
    calculateOperation(btnSin.dataset.value, 'trigonometry-operation');
});

btnCos.addEventListener('click', () => {
    calculateOperation(btnCos.dataset.value, 'trigonometry-operation');
});

btnTan.addEventListener('click', () => {
    calculateOperation(btnTan.dataset.value, 'trigonometry-operation');
});

btnPi.addEventListener('click', () => {
    calculateOperation(btnPi.dataset.value, 'trigonometry-operation');
});

btnE.addEventListener('click', () => {
    calculateOperation(btnE.value, 'trigonometry-operation');
});

btnFact.addEventListener('click', () => {
    calculateOperation(btnFact.dataset.value, 'integer-operation');
});

btnAbs.addEventListener('click', () => {
    calculateOperation(btnAbs.dataset.value, 'integer-operation');
});

btnInv.addEventListener('click', () => {
    calculateOperation(btnInv.dataset.value, 'integer-operation');
});

btnPrime.addEventListener('click', () => {
    calculateOperation(btnPrime.dataset.value, 'integer-operation');
});

btnSum.addEventListener('click', () => {
    calculateOperation(btnSum.dataset.value, 'integer-operation');
});

btnRound.addEventListener('click', () => {
    calculateOperation(btnRound.dataset.value, 'integer-operation');
});

btnPerfect.addEventListener('click', () => {
    calculateOperation(btnPerfect.dataset.value, 'integer-operation');
});

btnCeil.addEventListener('click', () => {
    calculateOperation(btnCeil.dataset.value, 'integer-operation');
});

btnFloor.addEventListener('click', () => {
    calculateOperation(btnFloor.dataset.value, 'integer-operation');
});


document.querySelectorAll('#table-calc-numeric input[type=button]').forEach ((element) => {
    let charPrev;
    switch (element.getAttribute('data-value')) {
        case 'ac':
            element.addEventListener('click', () => {
                txtExpCalcNum.value = '';
                txtResCalcNum.value = '';
                // txtResultCalcPrefix.value = '';
                // txtResultCalcPostfix.value = '';
                $expResult = '';
                // arrayStackBrackets = [];
            });
            break;
        case '←':
            element.addEventListener('click', () => {
                // if (txtExpCalcNum.value.substring(txtExpCalcNum.value.length - 1, txtExpCalcNum.value.length) === ')') {
                //     $changeTextCalc(objArray.stack(arrayStackBrackets, '('));
                // } else if (txtExpCalcNum.value.substring(txtExpCalcNum.value.length - 1, txtExpCalcNum.value.length) === '(') {
                //     $changeTextCalc(objArray.unStack(arrayStackBrackets));
                // }
                txtExpCalcNum.value = txtExpCalcNum.value.substring(0, txtExpCalcNum.value.length - 1);
                $expResult = $expResult.substring(0, $expResult.length - 1);
            });
            break;
        // case '×':
        //     break;
        // case '=':
        //     element.addEventListener('click', () => {
        //         if (txtExpressionCalc.value.length > 0) {
        //             let objJson = {
        //                 n: 0, 
        //                 expression: txtExpressionCalc.value, 
        //                 expression2: $expression, 
        //                 symbol: optSymbolLM.checked ? optSymbolLM.value : optSymbolLC.value,
        //                 button: 'equal'
        //             }; 
        //             let params = {
        //                 headers: {"Content-Type": "application/json; charset=utf-8"},
        //                 body: JSON.stringify(objJson),
        //                 method: 'POST'
        //             };
        //             fetch(arrayLinks[0], params)
        //                 .then(data => {return data.json()})
        //                 .then(response => {
        //                     txtResultCalcPostfix.value = response.resultExpressionPostfix;
        //                 })
        //                 .catch(err => {
        //                     txtResultCalcPostfix.value = "Hay problemas con la petición";
        //                 });
        //         }
        //     });

        //     break;
        // default:
        //     element.addEventListener('click', () => {
        //         if (txtExpressionCalc.value.length > 0) {
        //             charPrev = txtExpressionCalc.value.substring(txtExpressionCalc.value.length - 1, txtExpressionCalc.value.length);
        //             if (element.value === '┐' || element.value === '−') {
        //                 if (objTypeButton[charPrev] === 'operator' || charPrev === '(') {
        //                     txtExpressionCalc.value += element.value;
        //                     $expression += element.getAttribute('data-value');
        //                 }
        //             } else if (element.value === '(') {
        //                 if (objTypeButton[charPrev] === 'operator' || charPrev === '(') {
        //                     $changeTextCalc(objArray.stack(arrayStackBrackets, element.value))
        //                     txtExpressionCalc.value += element.value;
        //                     $expression += element.getAttribute('data-value');
        //                 } 
        //             } else if (element.value === ')') {
        //                 if (arrayStackBrackets.length > 0) {
        //                     if (objTypeButton[charPrev] === 'variable' || charPrev === ')') {
        //                         $changeTextCalc(objArray.unStack(arrayStackBrackets))
        //                         txtExpressionCalc.value += element.value;
        //                         $expression += element.getAttribute('data-value');
        //                     }
        //                 }
        //             } else if (objTypeButton[element.value] !== objTypeButton[charPrev]) {
        //                 switch (charPrev) {
        //                     case ')':
        //                         if (objTypeButton[element.value] !== 'variable') {
        //                             txtExpressionCalc.value += element.value;
        //                             $expression += element.getAttribute('data-value');
        //                         }
        //                         break;
        //                     case '(':
        //                         if (objTypeButton[element.value] !== 'operator') {
        //                             txtExpressionCalc.value += element.value;
        //                             $expression += element.getAttribute('data-value');
        //                         } 
        //                         break;
        //                     default:
        //                         txtExpressionCalc.value += element.value;
        //                         $expression += element.getAttribute('data-value');
        //                 }
        //             }
        //         } else if (element.value === '┐' || element.value === '−' || element.value === '(' || objTypeButton[element.value] === 'variable') {
        //             txtExpressionCalc.value = element.value;
        //             $expression += element.getAttribute('data-value');
        //         }
        //     });
    }

    element.addEventListener('click', () => {
        switch (element.getAttribute('data-type')) {

            case 'variable':
            case 'operator':
            case 'bracket':
            case 'dot':
                txtExpCalcNum.value += element.dataset.value;
                $expression += element.getAttribute('data-value');
        }
    });
});

document.querySelectorAll('#table-calc-numeric input[type=button]').forEach ((element) => {
    
});


function calculateOperation(operation, button)
{
    let objJson = {
        number: txtExpCalcNum.value, 
        operation: operation,
        button: button
    }; 
    let params = {
        headers: {"Content-Type": "application/json; charset=utf-8"},
        body: JSON.stringify(objJson),
        method: 'POST'
    };
    fetch(arrayLinks[1], params)
        .then(data => {return data.json()})
        .then(response => {
            txtResCalcNum.value = response.stringOutput;
        })
        .catch(err => {
            txtResCalcNum.value = "Hay problemas con la petición";
        }); 
}