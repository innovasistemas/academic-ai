/**
 * Criptografía
 */

let divResultSimulations = document.querySelector('#div-result-simulations');
let optUnits = document.getElementsByName('opt-units');
let cboTypeSimulation = document.querySelector('#cbo-type-simulation');
// let nbrGravity = document.querySelector('#nbr-gravity');
let nbrTime = document.querySelector('#nbr-time');
let nbrLigh = document.querySelector('#nbr-ligh');
let nbrInitialPosition = document.querySelector('#nbr-initial-position');
let nbrInitialVelocity = document.querySelector('#nbr-initial-velocity');
let nbrAcceleration = document.querySelector('#nbr-acceleration');
let btnSimulate = document.querySelector('#btn-simulate');



btnSimulate.addEventListener('click', () => {
    let pos = objArray.findElement(optUnits, true, 'checked');
    
    let objJson = {
        initialPosition: nbrInitialPosition.value, 
        initialVelocity: nbrInitialVelocity.value, 
        acceleration: nbrAcceleration.value, 
        unit: optUnits[pos].value,
        time: nbrTime.value,
        operation: cboTypeSimulation.value,
        button: 'simulation'
    }; 
    let params = {
        headers: {"Content-Type": "application/json; charset=utf-8"},
        body: JSON.stringify(objJson),
        method: 'POST'
    };
    fetch(arrayLinks[6], params)
        .then(data => {return data.json()})
        .then(response => {
            divResultSimulations.innerHTML = response.resultExpression;
        })
        .catch(err => {
            divResultSimulations.innerHTML = "Hay problemas con la petición";
        });
});

