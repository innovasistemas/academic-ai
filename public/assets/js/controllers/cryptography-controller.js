/**
 * Criptografía
 */

let divResultCryptography = document.querySelector('#div-result-cryptography');
let lstTypeEncription = document.querySelector('#lst-type-encryption');
let txtPlainText = document.querySelector('#txt-plain-text');
let txtKeyEncrypt = document.querySelector('#txt-key-encrypt');
let txtKeyDecrypt = document.querySelector('#txt-key-decrypt');
let txtCodedText = document.querySelector('#txt-coded-text');
let btnEncrypt = document.querySelector('#btn-encrypt');
let btnDecrypt = document.querySelector('#btn-decrypt');


btnEncrypt.addEventListener('click', () => {
    let objJson = {
        plainText: txtPlainText.value, 
        keyEncrypt: txtKeyEncrypt.value, 
        operation: lstTypeEncription.value,
        button: 'encrypt'
    }; 
    let params = {
        headers: {"Content-Type": "application/json; charset=utf-8"},
        body: JSON.stringify(objJson),
        method: 'POST'
    };
    fetch(arrayLinks[5], params)
        .then(data => {return data.json()})
        .then(response => {
            divResultCryptography.innerHTML = response.resultExpression;
        })
        .catch(err => {
            divResultCryptography.innerHTML = "Hay problemas con la petición";
        });
});


btnDecrypt.addEventListener('click', () => {
    let objJson = {
        codedText: txtCodedText.value, 
        keyDecrypt: txtKeyDecrypt.value,
        operation: lstTypeEncription.value,
        button: 'decrypt'
    }; 
    let params = {
        headers: {"Content-Type": "application/json; charset=utf-8"},
        body: JSON.stringify(objJson),
        method: 'POST'
    };
    fetch(arrayLinks[5], params)
        .then(data => {return data.json()})
        .then(response => {
            divResultCryptography.innerHTML = response.resultExpression;
        })
        .catch(err => {
            divResultCryptography.innerHTML = "Hay problemas con la petición";
        });
});


