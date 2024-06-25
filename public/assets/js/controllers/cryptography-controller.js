/**
 * Criptografía
 */

let divResultCryptography = document.querySelector('#div-result-cryptography');
let lstTypeEncription = document.querySelector('#lst-type-encryption');
let txtString = document.querySelector('#txt-string');
let btnEncrypt = document.querySelector('#btn-encrypt');


btnEncrypt.addEventListener('click', () => {
    let objJson = {
        string: txtString.value, 
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


