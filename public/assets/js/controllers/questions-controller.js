/**
 * Preguntas
 */

let txtNumberQuestions = document.querySelector('#txt-number-questions');
let txtQuestionsSelect = document.querySelector('#txt-questions-select');
let txtUser = document.querySelector('#txt-user');
let txtUserId = document.querySelector('#txt-user-id');
let btnSearchUser = document.querySelector('#btn-search-user');
let btnSave = document.querySelector('#btn-save');
let btnModalSave = document.querySelector('#btn-modal-save');
let btnGenerateRandom = document.querySelector('#btn-generate-random');
let spanResult = document.querySelector('#span-result-search');
let cboSubject = document.querySelector('#cbo-subject');
let cboTheme = document.querySelector('#cbo-theme');
let cboActivity = document.querySelector('#cbo-activity');
let divResult = document.querySelector('#div-result');
let divResult2 = document.querySelector('#div-result2');
let divQuestionsSelectedContent = document.querySelector('#questions-selected-content');
let divDataQuestion = document.querySelector('#div-data-question');
let modal = document.querySelector('#modal-confirm');
let pModalBody = document.querySelector('#p-modal-body');


txtNumberQuestions.addEventListener('change', () => {
    $validateElementEmpty(txtNumberQuestions);
});


txtQuestionsSelect.addEventListener('change', () => {
    $validateElementEmpty(txtQuestionsSelect);
});


onload = (event) => {
    let objJson = {
        identity: 'subject', 
        button: 'list-subject'
    }; 
    let params = {
        headers: {"Content-Type": "application/json; charset=utf-8"},
        body: JSON.stringify(objJson),
        method: 'POST'
    };

    fetch(arrayLinks[4], params)
        .then(data => {return data.json()})
        .then(response => {
            let optionSelect = "<option value='-1'>Seleccione...</option>";
            if (response.found !== 0) {
                response.arraySubject.forEach((element) => {
                    optionSelect += `<option value="${element.id}">${element.description}</option>`;
                });
            }
            cboSubject.innerHTML = optionSelect;
            
            optionSelect = "<option value='-1'>Seleccione...</option>";
            if (response.foundTheme !== 0) {
                response.arrayTheme.forEach((element) => {
                    optionSelect += `<option value="${element.id}">${element.description}</option>`;
                });
            }
            cboTheme.innerHTML = optionSelect;

            optionSelect = "<option value='-1'>Seleccione...</option>";
            // if (response.foundTheme !== 0) {
            //     response.arrayTheme.forEach((element) => {
            //         optionSelect += `<option value="${element.id}">${element.description}</option>`;
            //     });
            // }
            cboActivity.innerHTML = optionSelect;
        })
        .catch(err => {
            divResult2.innerHTML = "Hay problemas con la petición: " + err;
        });
};


btnSearchUser.addEventListener('click', () => {
    let objJson = {
        code: txtUser.value,
        identity: 'user', 
        button: 'search-user'
    }; 
    let params = {
        headers: {"Content-Type": "application/json; charset=utf-8"},
        body: JSON.stringify(objJson),
        method: 'POST'
    };

    fetch(arrayLinks[4], params)
        .then(data => {return data.json()})
        .then(response => {
            if (response.found !== 0) {
                spanResult.textContent = 'Hola, ' + response.arrayUser[0].firstName + ' ' +
                    response.arrayUser[0].lastName;
                txtUserId.value = response.arrayUser[0].id;
                divDataQuestion.classList.remove('d-none');
                divDataQuestion.classList.add('d-block');
                searchQuestionSelected();
            } else {
                spanResult.textContent = response.message;
                divDataQuestion.classList.remove('d-block');
                divDataQuestion.classList.add('d-none');
                divQuestionsSelectedContent.innerHTML = `<br><p class="text-success">${response.message}</p>`;
            }
        })
        .catch(err => {
            divResult2.innerHTML = "Hay problemas con la petición: " + err;
        });
});


btnSave.addEventListener('click', () => {
    if (validateData()) {
        pModalBody.innerHTML = '¿Está seguro de guardar esta información?';
    }
});


btnModalSave.addEventListener('click', () => {
    if (validateData()) {
        let objJson = {
            identity: 'question_selected',
            userId: txtUserId.value,
            subjectId: cboSubject.value, 
            themeId: cboTheme.value, 
            questions: divResult2.innerHTML,
            button: 'search-question-selected'
        }; 
        let params = {
            headers: {"Content-Type": "application/json; charset=utf-8"},
            body: JSON.stringify(objJson),
            method: 'POST'
        };

        fetch(arrayLinks[4], params)
            .then(data => {return data.json()})
            .then(response => {
                let classText;
                if (parseInt(response.found) === 0) {
                    saveQuestionsSelected();
                } else {
                    classText ='text-danger';
                    pModalBody.innerHTML = `<span class="${classText}">${response.message}</span>`;
                }
            })
            .catch(err => {
                divResult2.innerHTML = "Hay problemas con la petición: " + err;
            });
    }
});


function searchQuestionSelected()
{
    let objJson = {
        userId: txtUserId.value,
        button: 'question_selected-user'
    }; 
    let params = {
        headers: {"Content-Type": "application/json; charset=utf-8"},
        body: JSON.stringify(objJson),
        method: 'POST'
    };
    fetch(arrayLinks[4], params)
        .then(data => {return data.json()})
        .then(response => {
            if (response.found !== 0) {
                let table = '<br><div class="table-responsive">';
                table += '<table class="table table-hover table-bordered- border-secondary-">';
                table += '<thead>';
                table += '<tr>';
                table += '<th>Asignatura</th>';
                table += '<th>Tema</th>';
                table += '<th>Preguntas</th>';
                table += '</tr>';
                table += '</thead>';
                table += '</tbody>';
                response.arrayQuestionSelected.forEach((element) => {
                    table += '<tr>';
                    table += `<td>${element.subject}</td>`;
                    table += `<td>${element.theme}</td>`;
                    table += `<td>${element.questions}</td>`;
                    table += '</tr>';
                });
                table += '</tbody>';
                table += '</table>';
                table += '</div>';
                divQuestionsSelectedContent.innerHTML = table;
            } else {
                divQuestionsSelectedContent.innerHTML = `<br><p class="text-success">${response.message}</p>`;
            }
        })
        .catch(err => {
            divResult2.innerHTML = "Hay problemas con la petición: " + err;
        });
}


function saveQuestionsSelected()
{
    let objJson = {
        identity: 'question_selected',
        userId: txtUserId.value,
        subjectId: cboSubject.value, 
        themeId: cboTheme.value, 
        questions: divResult2.innerHTML,
        button: 'insert-question-selected'
    }; 
    let params = {
        headers: {"Content-Type": "application/json; charset=utf-8"},
        body: JSON.stringify(objJson),
        method: 'POST'
    };
    fetch(arrayLinks[4], params)
        .then(data => {return data.json()})
        .then(response => {
            let classText;
            if (response.error === 0) {
                classText ='text-success';
                btnModalSave.setAttribute('disabled', 'disabled');
            } else {
                classText ='text-danger';
            }
            pModalBody.innerHTML = `<span class="${classText}">${response.message}</span>`;
        })
        .catch(err => {
            divResult2.innerHTML = "Hay problemas con la petición: " + err;
        });
}


btnGenerateRandom.addEventListener('click', () => {
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
            divResult2.innerHTML = response.randomNumber;
        })
        .catch(err => {
            divResult2.innerHTML = "Hay problemas con la petición: " + err;
        });
});


function validateData()
{
    let sw = false;
    if (parseInt(cboSubject.value) !== -1) {
        if (parseInt(cboTheme.value) !== -1) {
            if (divResult2.innerHTML !== '') {
                btnModalSave.removeAttribute('disabled');
                sw = true;
            } else {
                pModalBody.innerHTML = '<span class="text-danger">Genere las preguntas</span>';
                btnModalSave.setAttribute('disabled', 'disabled');
            }
        } else {
            pModalBody.innerHTML = '<span class="text-danger">Seleccione un tema</span>';
            btnModalSave.setAttribute('disabled', 'disabled');
        }   
    } else {
        pModalBody.innerHTML = '<span class="text-danger">Seleccione una asignatura</span>';
        btnModalSave.setAttribute('disabled', 'disabled');
    }
    return sw;
}
