/**
 * Preguntas
 */

let txtNumberQuestions = document.querySelector('#txt-number-questions');
let txtQuestionsSelect = document.querySelector('#txt-questions-select');
let btnGenerateRandom = document.querySelector('#btn-generate-random');
let divResult = document.querySelector('#div-result');
let divResult2 = document.querySelector('#div-result2');


// document.addEventListener('readystatechange', (e) => {
//     let objJson = {
//         button: 'generate-question'
//     }; 
//     let params = {
//         headers: {"Content-Type": "application/json; charset=utf-8"},
//         body: JSON.stringify(objJson),
//         method: 'POST'
//     };
//     fetch(arrayLinks[4], params)
//         .then(data => {return data.json()})
//         .then(response => {
//             let arrayQuestion = Array.from(response.arrayQuestion);
//             // divResult.innerHTML = response.arrayQuestion;
//             arrayQuestion.forEach((value, index) => {
//                 console.log(value)
                
//             });
//         })
//         .catch(err => {
//             divResult.innerHTML = "Hay problemas con la petición";
//         });
// });


txtNumberQuestions.addEventListener('change', () => {
    $validateElementEmpty(txtNumberQuestions);
});


txtQuestionsSelect.addEventListener('change', () => {
    $validateElementEmpty(txtQuestionsSelect);
});


btnGenerateRandom.addEventListener('click', () => {
    // console.log(0)
    let objJson = {
        numberQuestions: txtNumberQuestions.value, 
        questionSelect: txtQuestionsSelect.value,
        button: 'generate-random'
    }; 
    let params = {
        headers: {"Content-Type": "application/json; charset=utf-8"},
        body: JSON.stringify(objJson),
        method: 'POST'
    };
    fetch(arrayLinks[4], params)
        .then(data => {return data.json()})
        .then(response => {

            
            let objQuestion = response.arrayQuestion;

            console.log(objQuestion)
            console.log(Object.keys(objQuestion))
            console.log(Object.values(objQuestion))

            divResult2.innerHTML = response.randomNumber;

        })
        .catch(err => {
            divResult2.innerHTML = "Hay problemas con la petición: " + err;
        });

});