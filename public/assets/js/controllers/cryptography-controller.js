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
    let url, outputHTML;
    switch (lstTypeEncription.value) {
        case "-":
            break;
        case "invertir-texto":
            url = `http://localhost:5259/invertir-texto?plainText=${txtPlainText.value}`;
            outputHTML = "<strong>Codificación inversión de cadena: </strong><br>";
            requestWebServiceNET(url, outputHTML);
            break;
        case "base64":
            url = `http://localhost:5259/base64encode?plainText=${txtPlainText.value}`;
            outputHTML = "<strong>Codificación Base64: </strong><br>";
            requestWebServiceNET(url, outputHTML);
            break;
        case "base-numerica":
            url = `http://localhost:5259/number-base-encode?text=${txtPlainText.value}&baseN=${txtKeyEncrypt.value}`;
            outputHTML = "<strong>Codificación base numérica: </strong><br>";
            requestWebServiceNET(url, outputHTML);
            break;
        default:
            let objJson = {
                plainText: txtPlainText.value, 
                keyEncrypt: txtKeyEncrypt.value, 
                operation: lstTypeEncription.value,
                button: 'encrypt'
            }; 
            url = arrayLinks[5];
            requestWebServicePHP(url, objJson);
    }
});


btnDecrypt.addEventListener('click', () => {
    let url, outputHTML;
    let swServiceC = true;
    switch (lstTypeEncription.value) {
        case "-":
            break;
        case "invertir-texto":
            url = `http://localhost:5259/revertir-texto?codedText=${txtCodedText.value}`;
            outputHTML = "<strong>Decodificación reversión de cadena: </strong><br>";
            requestWebServiceNET(url, outputHTML);
            break;
        case "base64":
            url = `http://localhost:5259/base64decode?textBase64=${txtCodedText.value}`;
            outputHTML = "<strong>Decodificación Base64: </strong><br>";
            requestWebServiceNET(url, outputHTML);
            break;
        case "base-numerica":
            url = `http://localhost:5259/number-base-decode?text=${txtCodedText.value}&baseN=${txtKeyDecrypt.value}`;
            outputHTML = "<strong>Codificación base numérica: </strong><br>";
            requestWebServiceNET(url, outputHTML);
            break;
        default:
            let objJson = {
                codedText: txtCodedText.value, 
                keyDecrypt: txtKeyDecrypt.value,
                operation: lstTypeEncription.value,
                button: 'decrypt'
            };
            url = arrayLinks[5];
            requestWebServicePHP(url, objJson);
    }
});


function requestWebServicePHP(url, objJson)
{
    let params = {
        headers: {"Content-Type": "application/json; charset=utf-8"},
        body: JSON.stringify(objJson),
        method: 'POST'
    };
     
    fetch(url, params)
        .then(response => {return response.json()})
        .then(data => {
            divResultCryptography.innerHTML = data.resultExpression;
        })
        .catch(err => {
            divResultCryptography.innerHTML = "Hay problemas con la petición" + err;
        });
}


function requestWebServiceNET(url, outputHTML)
{
    let params = {
        headers: {
            'Content-Type': 'text/plain; charset=utf-8',
            'Accept': 'text/plain; charset=utf-8',
        },
        mode: 'cors',
        method: 'GET',
    };
    fetch(url, params)
        .then(response => {
            if (!response.ok) {
                throw new Error('Sin respuesta')
            }
            return response
        })
        .then(data => {
            return data.clone().text();
        })
        .then((value) => {
            divResultCryptography.innerHTML = `${outputHTML}${value}`;
        })
        .catch(err => {
            divResultCryptography.innerHTML = "Hay problemas con la petición: " + err;
        });
}
