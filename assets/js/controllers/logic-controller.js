/**
 * Logica matemática y lógica de circuitos
 */

let frmFormData = document.querySelector('#frm-form-data');
let divResult = document.querySelector('#div-result');
let divResult2 = document.querySelector('#div-result2');
let divLogicCalc = document.querySelector('#div-logic-calc');
let lstSymbolPropositions = document.querySelector('#lst-symbol-propositions');
let lstLogicOperators = document.querySelector('#lst-logic-operators');
let txtNumberPropositions = document.querySelector('#txt-number-propositions');
let optSymbolLM = document.querySelector('#opt-symbol-lm');
let optSymbolLC = document.querySelector('#opt-symbol-lc');
let btnTrueTable = document.querySelector('#btn-true-table');
let btnLogicOperators = document.querySelector('#btn-logic-operators');

// Componentes calculadora lógica
let txtExpressionCalc = document.querySelector('#txt-expression-calc');
let txtResultCalc = document.querySelector('#txt-result-calc');
let lblConstant = document.querySelector('#lbl-constant');
let btnNot = document.querySelector('#btn-not');
let btnAnd = document.querySelector('#btn-and');
let btnOr = document.querySelector('#btn-or');
let btnXor = document.querySelector('#btn-xor');
let btnIf = document.querySelector('#btn-if');
let btnIf2 = document.querySelector('#btn-if2');
let btnAC = document.querySelector('#btn-ac');
let btnW = document.querySelector('#btn-w');
let btnX = document.querySelector('#btn-x');
let btnY = document.querySelector('#btn-y');
let btnZ = document.querySelector('#btn-z');

const objTypeButton = {
    p: 'variable',
    q: 'variable',
    r: 'variable',
    s: 'variable',
    A: 'variable',
    B: 'variable',
    C: 'variable',
    D: 'variable',
    '┐': 'operator',
    '∧': 'operator',
    '∨': 'operator',
    '⊕': 'operator',
    '→': 'operator',
    '↔': 'operator',
    '−': 'operator',
    '×': 'operator',
    '+': 'operator',
    '(': 'bracket1',
    ')': 'bracket2',
};
let arrayStackBrackets = [];


optSymbolLM.addEventListener('change', () => {
    $changeButtonsCalc(optSymbolLM.value);
});


optSymbolLC.addEventListener('change', () => {
    $changeButtonsCalc(optSymbolLC.value);
});


// txtExpressionCalc.addEventListener('change', () => {
//     $changeTextCalc();
// });


txtNumberPropositions.addEventListener('change', () => {
    $validateElementEmpty(txtNumberPropositions);
    txtNumberPropositions.value = objNumeric.trunc(txtNumberPropositions.value); 
});


document.querySelectorAll('#table-calc input[type=button]').forEach ((element) => {
    let charPrev;
    switch (element.value) {
        case 'ac':
            element.addEventListener('click', () => {
                txtExpressionCalc.value = '';
                arrayStackBrackets = [];
            });
            break;
        case '←':
            element.addEventListener('click', () => {
                if (txtExpressionCalc.value.substring(txtExpressionCalc.value.length - 1, txtExpressionCalc.value.length) === ')') {
                    $changeTextCalc(objArray.stack(arrayStackBrackets, '('));
                } else if (txtExpressionCalc.value.substring(txtExpressionCalc.value.length - 1, txtExpressionCalc.value.length) === '(') {
                    $changeTextCalc(objArray.unStack(arrayStackBrackets));
                }
                txtExpressionCalc.value = txtExpressionCalc.value.substring(0, txtExpressionCalc.value.length - 1);

            });
            break;
        case '×':
        case '=':
            element.addEventListener('click', () => {
                let objJson = {
                    expression: txtResultCalc.value, 
                    symbol: optSymbolLM.checked ? optSymbolLM.value : optSymbolLC.value,
                    button: 'equal'
                }; 
                let params = {
                    headers: {"Content-Type": "application/json; charset=utf-8"},
                    body: JSON.stringify(objJson),
                    method: 'POST'
                };
                fetch(arrayLinks[0], params)
                    .then(data => {return data.json()})
                    .then(response => {
                        txtResultCalc.value = response.resultExpression;
                    })
                    .catch(err => {
                        txtResultCalc.value = "Hay problemas con la petición";
                    });
                });
            break;
        default:
            element.addEventListener('click', () => {
                if (txtExpressionCalc.value.length > 0) {
                    charPrev = txtExpressionCalc.value.substring(txtExpressionCalc.value.length - 1, txtExpressionCalc.value.length);
                    if (element.value === '┐' || element.value === '−') {
                        if (objTypeButton[charPrev] === 'operator' || charPrev === '(') {
                            txtExpressionCalc.value += element.value;
                        }
                    } else if (element.value === '(') {
                        if (objTypeButton[charPrev] === 'operator' || charPrev === '(') {
                            $changeTextCalc(objArray.stack(arrayStackBrackets, element.value))
                            txtExpressionCalc.value += element.value;
                        } 
                    } else if (element.value === ')') {
                        if (arrayStackBrackets.length > 0) {
                            if (objTypeButton[charPrev] === 'variable' || charPrev === ')') {
                                $changeTextCalc(objArray.unStack(arrayStackBrackets))
                                txtExpressionCalc.value += element.value;
                            }
                        }
                    } else if (objTypeButton[element.value] !== objTypeButton[charPrev]) {
                        switch (charPrev) {
                            case ')':
                                if (objTypeButton[element.value] !== 'variable') {
                                    txtExpressionCalc.value += element.value;
                                }
                                break;
                            case '(':
                                if (objTypeButton[element.value] !== 'operator') {
                                    txtExpressionCalc.value += element.value;
                                } 
                                break;
                            default:
                                txtExpressionCalc.value += element.value;
                        }
                    }
                } else if (element.value === '┐' || element.value === '−' || element.value === '(' || objTypeButton[element.value] === 'variable') {
                    txtExpressionCalc.value = element.value;
                }
            });
    }
});


btnTrueTable.addEventListener('click', () => {
    let objJson = {
        n: txtNumberPropositions.value, 
        symbol: lstSymbolPropositions.value,
        button: 'true-table'
    }; 
    let params = {
        headers: {"Content-Type": "application/json; charset=utf-8"},
        body: JSON.stringify(objJson),
        method: 'POST'
    };
    fetch(arrayLinks[0], params)
        .then(data => {return data.json()})
        .then(response => {
            divResult.innerHTML = response.table;
        })
        .catch(err => {
            divResult.innerHTML = "Hay problemas con la petición";
        });
});


btnLogicOperators.addEventListener('click', () => {
    if (lstLogicOperators.value == 'not') {
        txtNumberPropositions.value = 1;
    } else {
        txtNumberPropositions.value = 2;
    }
    let objJson = {
        n: txtNumberPropositions.value, 
        symbol: lstSymbolPropositions.value,
        operator: lstLogicOperators.value,
        button: 'operators'
    }; 
    let params = {
        headers: {"Content-Type": "application/json; charset=utf-8"},
        body: JSON.stringify(objJson),
        method: 'POST'
    };
    fetch(arrayLinks[0], params)
        .then(data => {return data.json()})
        .then(response => {
            divResult.innerHTML = response.table;
            divResult2.innerHTML = response.tableOperator;
        })
        .catch(err => {
            divResult2.innerHTML = "Hay problemas con la petición";
        });
});


function $changeButtonsCalc(symbol)
{
    let objJson = {
        symbol,
        n: 0, 
        button: 'calc-symbol'
    }; 
    let params = {
        headers: {"Content-Type": "application/json; charset=utf-8"},
        body: JSON.stringify(objJson),
        method: 'POST'
    };
    fetch(arrayLinks[0], params)
        .then(data => {return data.json()})
        .then(response => {
            btnNot.value = response.symbols[symbol]['not'];
            btnAnd.value = response.symbols[symbol]['and'];
            btnOr.value = response.symbols[symbol]['or'];
            btnXor.value = response.symbols[symbol]['xor'];
            btnIf.value = response.symbols[symbol]['if'];
            btnIf2.value = response.symbols[symbol]['if2'];
            
            let ascii = parseInt(response.symbols[symbol]['ascii']);
            let char = '';
            let newExpression = '';
            let pos;
            let diffAscii;

            if (optSymbolLM.checked) {
                lblConstant.innerHTML = `${response.symbols[optSymbolLM.value]['on']}, 
                    ${response.symbols[optSymbolLM.value]['off']}`;
            } else {
                lblConstant.innerHTML = `${response.symbols[optSymbolLC.value]['on']}, 
                    ${response.symbols[optSymbolLC.value]['off']}`;
            }

            document.querySelectorAll('#tr-vars input[type=button]').forEach ((element, index) => {
                element.value = String.fromCharCode(ascii + index);
            });
       
            for (let i = 0; i < txtExpressionCalc.value.length; i++) {
                char = txtExpressionCalc.value.substring(i, i + 1);
                if (char === '(' || char === ')') {
                    newExpression += char;
                } else if (optSymbolLM.checked) {
                    pos = objArray.findElement(Object.values(response.symbols[optSymbolLC.value]), char);
                    if (pos >= 0) {
                        newExpression += Object.values(response.symbols[optSymbolLM.value])[pos];
                    } else {
                        diffAscii = char.charCodeAt() - 65;
                        newExpression += String.fromCharCode(ascii + diffAscii);
                    }
                } else {
                    pos = objArray.findElement(Object.values(response.symbols[optSymbolLM.value]), char);
                    if (pos >= 0) {
                        newExpression += Object.values(response.symbols[optSymbolLC.value])[pos];
                    } else {
                        diffAscii = char.charCodeAt() - 112;
                        newExpression += String.fromCharCode(ascii + diffAscii);
                    }
                }
            }
            txtExpressionCalc.value = newExpression;
        })
        .catch(err => {
            divResult.innerHTML = "Hay problemas con la petición";
        });
}


function $changeTextCalc(stateStack = '')
{
    if (stateStack === 'desbordamiento' || stateStack === 'subdesbordamiento') {
        txtExpressionCalc.style.color = '#ffc107';
    } else if (arrayStackBrackets.length > 0) {
        txtExpressionCalc.style.color = '#ffc107';
    } else {
        txtExpressionCalc.style.color = '#444';
    }
}