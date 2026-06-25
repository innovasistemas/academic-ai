let attempt = 0;
let guess = 0;

const myModal = document.getElementById('div-modal')
const myInput = document.getElementById('btn-show-alls')

myModal.addEventListener('shown.bs.modal', () => {
    myInput.focus()
})

requestJson('cards1');

    function requestJson(level)
    {
         fetch(`${routeAssets}/json/${level}.json`)
            .then(response => {
                if (!response.ok) {
                    throw new Error("Error al cargar el archivo");
                }
                return response.json(); // Convierte el JSON a un objeto JS
            })
            .then(data => {
                duplicateArray(data, level);
                paintBoard(data, level);
            })
            .catch(error => console.error("Hubo un error:", error));
    }


    function reset(data)
    {
        data.forEach ((element, index) => {
            element.state = 0;
        });
    }

    function duplicateArray(data, level)
    {
        data.forEach ((element, index) => {
            data.push(element);
        });
    }

    function paintBoard(data, level)
    {
        const dataSerialized = JSON.stringify(data).replace(/"/g, '&quot;');
        let sel1 = '';
        let sel2 = '';
        let sel3 = '';
        switch (level) {
            case 'cards1':
                sel1 = 'selected';
                break; 
            case 'cards2':
                sel2 = 'selected';
                break; 
            case 'cards3':
                sel3 = 'selected';
                break; 
        }

        let cards = '<div class="row gx-2-">';
        cards += '<div class="col">';
        cards += `<button class="btn btn-lg btn-primary" onclick="shuffle('${dataSerialized}', '${level}')">Barajar</button>`;
        cards += '</div>';
        cards += '<div class="col">';
        cards += `
                <label for="lst-integer-operation">Nivel</label>
                <select name="cbo-level-memory" id="cbo-level-memory" class="form-select select" onchange="changeLevel()">
                    <option value="cards1" ${sel1}>Fácil</option>
                    <option value="cards2" ${sel2}>Intermedio</option>
                    <option value="cards3" ${sel3}>Difícil</option>
                </select>
            `;
        cards += '</div>';
        cards += '</div>';
        cards += '<div class="row">&nbsp;</div>';
        cards += '<div class="row gx-2">';
        data.forEach ((element, index) => {
            if (element.state == 0) {
                cards += `
                    <div class="col my-1">
                        <div class="card" style="width: 15rem; height: 15rem;">
                            <img class="card-img-top w-25" src="${routeAssets}/images/images-memory/question.png" alt="Card image cap" title="Adivina quien soy">
                            <div class="card-body">
                                <h5 class="card-title">&nbsp</h5>
                                <p class="card-text">&nbsp</p>
                                <a href="#" class="btn btn-sm btn-primary" onclick="stateCard(event, '${dataSerialized}', ${index}, '${level}')">Mostrar deporte</a>
                            </div>
                        </div>
                    </div>
                `;
            } else if (element.state == 1) {
                cards += `
                    <div class="col my-1">
                        <div class="card" style="width: 15rem; height: 15rem;">
                            <img class="card-img-top" src="${routeAssets}/images/images-memory/${element.img}" alt="Card image cap" title="${element.title}: ${element.text}">
                            <div class="card-body">
                                <h5 class="card-title">${element.title.substring(0, 18)}</h5>
                                <p class="card-text">${element.text.substring(0, 50)}...</p>
                                <a href="#" class="btn btn-sm btn-warning" onclick="stateCard(event, '${dataSerialized}', ${index}, '${level}')">Ocultar deporte</a>
                            </div>
                        </div>
                    </div>
                `;
            } else {
                cards += `
                    <div class="col my-1">
                        <div class="card bg-success text-white" style="width: 15rem; height: 15rem;">
                            <img class="card-img-top" src="${routeAssets}/images/images-memory/${element.img}" alt="Card image cap" title="${element.title}: ${element.text}">
                            <div class="card-body">
                                <h5 class="card-title">${element.title.substring(0, 18)}</h5>
                                <p class="card-text">${element.text.substring(0, 50)}...</p>
                                <a href="#" class="btn btn-sm btn-info" onclick="success(event)">¡Acertada!</a>
                            </div>
                        </div>
                    </div>
                `;
            }
        });
        cards += "</div>";
        
        document.getElementById('lbl-attempt').innerHTML = attempt;
        document.getElementById('lbl-guess').innerHTML = guess;
        document.getElementById('lbl-total').innerHTML = data.length / 2;
        document.getElementById('div-cards').innerHTML = cards;
    }

    function shuffle(dataSerial, level)
    {
        const data = JSON.parse(dataSerial);
        attempt = 0;
        guess = 0;
        reset(data);
        data.sort(() => Math.random() - 0.5);
        paintBoard(data, level);
    }

    function success(event) 
    {
        event.preventDefault();
    }

    function changeLevel()
    {
        requestJson(document.querySelector('#cbo-level-memory').value);
    }

    function stateCard(event, dataSerial, index, level)
    {
        event.preventDefault();
        const data = JSON.parse(dataSerial);
        if (!checkPairing(data, data[index], index)) {
            let countOpen = findOpen(data);
            if (countOpen == 2) {
                attempt++;
                data.forEach ((element, index) => {
                    if (element.state == 1) {
                        element.state = 0;
                    }
                });
            } else if (data[index].state == 0) {
                data[index].state = 1;
            } else if (data[index].state == 1) {
                data[index].state = 0;
            } 
        } else {
            attempt++;
            guess++;
            if (guess == data.length / 2) {
                document.querySelector('#p-modal-body').innerHTML = `
                    <h2 class="text-primary text-center h2">
                        ¡Felicidades, has ganado el juego!
                    </h2>
                    <p class="text-center">
                        <img src="${routeAssets}/images/images-memory/winner.png" class="w-25">
                    </p>
                `;
                let modalObj =  new bootstrap.Modal(document.querySelector('#modal-confirm'));
                modalObj.show();
            }
        }
        paintBoard(data, level);
    }

    function findOpen(data)
    {
        let countOpen = 0;
        data.forEach ((element, index) => {
            if (element.state == 1) {
                if (!checkPairing(data, element, index)) {
                    countOpen++;
                }
            }
        });
        return countOpen;
    }

    function checkPairing(data, el, idx)
    {
        let sw = false;
        data.forEach ((element, index) => {
            if (element.state == 1 && element.title == el.title && index != idx) {
                element.state = 2;
                data[idx].state = 2;
                sw = true;
            }
        });
        return sw;
    }