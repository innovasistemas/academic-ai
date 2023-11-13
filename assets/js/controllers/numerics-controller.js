/**
 * Sistemas numéricos
 */

let divResultNumerics = document.querySelector('#div-result-numerics');
let divConversionTable = document.querySelector('#div-conversion-table');
let divOtherConversion = document.querySelector('#div-other-conversion');
let divResultIntegers = document.querySelector('#div-result-integers');
let divResultTrigonometry = document.querySelector('#div-result-trigonometry');
let lstInitialBase = document.querySelector('#lst-initial-base');
let lstEndBase = document.querySelector('#lst-end-base');
let lstConversionType = document.querySelector('#lst-conversion-type');
let lstIntegerOperation = document.querySelector('#lst-integer-operation');
let lstTrigonometryOperation = document.querySelector('#lst-trigonometry-operation');
let txtNumberBase = document.querySelector('#txt-number-base');
let txtNumberInteger = document.querySelector('#txt-number-integer');
let txtNumberReal = document.querySelector('#txt-number-real');
let nbrLetterRoman = document.querySelector('#nbr-letter-roman');
let btnConvertBase = document.querySelector('#btn-convert-base');
let btnConversionNumber = document.querySelector('#btn-conversion-number');
let btnConversionTable = document.querySelector('#btn-conversion-table');
let btnIntegerOperation = document.querySelector('#btn-integer-operation');
let btnTrigonometryOperation = document.querySelector('#btn-trigonometry-operation');


txtNumberBase.addEventListener('click', () => {
    const modal = document.getElementById('exampleModal');
    modal.show()
});


txtNumberInteger.addEventListener('change', () => {
    $validateElementEmpty(txtNumberInteger);
    txtNumberInteger.value = objNumeric.trunc(txtNumberInteger.value); 
});


txtNumberReal.addEventListener('change', () => {
    $validateElementEmpty(txtNumberReal);
});


txtNumberBase.addEventListener('change', () => {
    $validateElementEmpty(txtNumberBase);
});


btnIntegerOperation.addEventListener('click', () => {
    let objJson = {
        number: txtNumberInteger.value, 
        operation: lstIntegerOperation.value,
        button: 'integer-operation'
    }; 
    let params = {
        headers: {"Content-Type": "application/json; charset=utf-8"},
        body: JSON.stringify(objJson),
        method: 'POST'
    };
    fetch(arrayLinks[1], params)
        .then(data => {return data.json()})
        .then(response => {
            divResultIntegers.innerHTML = response.stringOutput;
        })
        .catch(err => {
            divResultNumerics.innerHTML = "Hay problemas con la petición";
        });
});


btnTrigonometryOperation.addEventListener('click', () => {
    let objJson = {
        number: txtNumberReal.value, 
        operation: lstTrigonometryOperation.value,
        button: 'trigonometry-operation'
    }; 
    let params = {
        headers: {"Content-Type": "application/json; charset=utf-8"},
        body: JSON.stringify(objJson),
        method: 'POST'
    };
    fetch(arrayLinks[1], params)
        .then(data => {return data.json()})
        .then(response => {
            divResultTrigonometry.innerHTML = response.stringOutput;
        })
        .catch(err => {
            divResultNumerics.innerHTML = "Hay problemas con la petición";
        });
});


btnConvertBase.addEventListener('click', () => {
    let objJson = {
        numberBase: txtNumberBase.value, 
        initialBase: lstInitialBase.value,
        endBase: lstEndBase.value,
        button: 'convert-base'
    }; 
    let params = {
        headers: {"Content-Type": "application/json; charset=utf-8"},
        body: JSON.stringify(objJson),
        method: 'POST'
    };
    fetch(arrayLinks[1], params)
        .then(data => {return data.json()})
        .then(response => {
            divResultNumerics.innerHTML = response.stringOutput;
        })
        .catch(err => {
            divResultNumerics.innerHTML = "Hay problemas con la petición";
        });
});


btnConversionNumber.addEventListener('click', () => {
    let objJson = {
        conversionType: lstConversionType.value, 
        number: nbrLetterRoman.value,
        button: 'conversion-number'
    }; 
    let params = {
        headers: {"Content-Type": "application/json; charset=utf-8"},
        body: JSON.stringify(objJson),
        method: 'POST'
    };
    fetch(arrayLinks[1], params)
        .then(data => {return data.json()})
        .then(response => {
            divOtherConversion.innerHTML = response.stringOutput;
        })
        .catch(err => {
            divOtherConversion.innerHTML = "Hay problemas con la petición";
        });
});


btnConversionTable.addEventListener('click', () => {
    let objJson = {
        n: 4, 
        symbol: 'lc',
        button: 'conversion-table',
    }; 
    let params = {
        headers: {"Content-Type": "application/json; charset=utf-8"},
        body: JSON.stringify(objJson),
        method: 'POST'
    };

    fetch(arrayLinks[1], params)
        .then(data => {return data.json()})
        .then(response => {
            divConversionTable.innerHTML = response.tableMatrix;
        })
});