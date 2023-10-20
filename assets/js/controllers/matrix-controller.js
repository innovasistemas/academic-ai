/**
 * Álgebra linal
 */

// Matrices
let divResultMatrix = document.querySelector('#div-result-matrix');
let txtRowsA = document.querySelector('#txt-rowsA');
let txtColsA = document.querySelector('#txt-colsA');
let txtRowsB = document.querySelector('#txt-rowsB');
let txtColsB = document.querySelector('#txt-colsB');
let txtScalar = document.querySelector('#txt-scalar');
let btnExecuteMatrix = document.querySelector('#btn-execute-matrix');

// Determinantes
let divResultDeterminant = document.querySelector('#div-result-determinant');


txtRowsA.addEventListener('change', () => {
    $validateElementEmpty(txtRowsA);
    txtRowsA.value = objNumeric.trunc(txtRowsA.value); 
});


txtColsA.addEventListener('change', () => {
    $validateElementEmpty(txtColsA);
    txtColsA.value = objNumeric.trunc(txtColsA.value); 
});


txtRowsB.addEventListener('change', () => {
    $validateElementEmpty(txtRowsB);
    txtRowsB.value = objNumeric.trunc(txtRowsB.value); 
});


txtColsB.addEventListener('change', () => {
    $validateElementEmpty(txtColsB);
    txtColsB.value = objNumeric.trunc(txtColsB.value); 
});


btnExecuteMatrix.addEventListener('click', () => {
    let objJson = {
        m: txtRowsA.value,
        n: txtColsA.value,
        p: txtRowsB.value,
        q: txtColsB.value,
        scalar: txtScalar.value,
        button: 'matrix-operation'
    }; 
    let params = {
        headers: {"Content-Type": "application/json; charset=utf-8"},
        body: JSON.stringify(objJson),
        method: 'POST'
    };
    fetch(arrayLinks[2], params)
        .then(data => {return data.json()})
        .then(response => {
            divResultMatrix.innerHTML = `
                <hr>
                <h3 class="text-danger">Resultados operaciones</h3>

                <div class="row">
                    <div class="col">
                        <span class="text-primary-" style="font-size: 1em; font-family-: Consolas;">
                            A<sub>${txtRowsA.value}×${txtColsA.value}</sub> = [a<sub>ij</sub>]
                        </span>
                        ${response.matrixA}
                    </div>
                    <div class="col">
                        <span class="text-primary-" style="font-size: 1em; font-family: Consolas;">
                            B<sub>${txtRowsB.value}×${txtColsB.value}</sub> = [b<sub>ij</sub>]
                        </span>
                        ${response.matrixB}
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <span class="text-primary-" style="font-size: 1em; font-family: Consolas;">
                            (A + B)<sub>${txtRowsA.value}×${txtColsA.value}</sub> = C<sub>ij</sub>
                        </span>
                        ${response.matrixSum}
                    </div>

                    <div class="col">
                        <span class="text-primary-" style="font-size: 1em; font-family: Consolas;">
                            cA<sub>${txtRowsA.value}×${txtColsA.value}</sub> = ${objJson.scalar}A<sub>ij</sub>
                        </span>
                        ${response.scalar}
                    </div>
                    <div class="col">
                        <span class="text-primary-" style="font-size: 1em; font-family: Consolas;">
                            C<sub>${txtRowsA.value}×${txtColsB.value}</sub> 
                            = 
                            A<sub>${txtRowsA.value}×${txtColsA.value}</sub> 
                            × 
                            B<sub>${txtRowsB.value}×${txtColsB.value}</sub>
                            <br>
                            C<sub>ij</sub> = ⅀<sup>${txtColsA.value}</sup><sub>k=1</sub>(A<sub>ik</sub>xB<sub>kj</sub>)
                        </span>
                        ${response.matrixProduct}
                    </div>
                    <div class="col">
                        <span class="text-primary-" style="font-size: 1em; font-family: Consolas;">
                            (A<sub>${txtRowsA.value}×${txtColsA.value}</sub>)<sup>T</sup> 
                            = 
                            A<sub>${txtColsA.value}×${txtRowsA.value}</sub>
                            <br>
                            A<sup>T</sup><sub>ij</sub> = A<sub>ji</sub>
                        </span>
                        ${response.transposed}
                    </div>
                </div>

                <hr>
                <h3 class="text-danger">Áreas de matrices</h3>

                <div class="row">
                    <div class="col">
                        <span class="text-primary-" style="font-size: 1em;">
                            Diagonal principal A<sub>${txtColsA.value}</sub> 
                            = [a<sub>ii</sub>]
                            <br>
                            Diagonal secundaria A<sub>${txtColsA.value}</sub> 
                            = [a<sub>i, n-i-1</sub>]
                        </span>
                        ${response.diagonals}
                    </div>
                    <div class="col">
                        <span class="text-primary-" style="font-size: 1em;">
                            Triangular Superior A<sub>${txtColsA.value}</sub> 
                            = 
                        </span>
                        ${response.upperTriangular}
                    </div>
                    <div class="col">
                        <span class="text-primary-" style="font-size: 1em;">
                            Triángulo Superior A<sub>${txtColsA.value}</sub> 
                            = 
                        </span>
                        ${response.upperTriangle}
                    </div>
                </div>
            `;

            divResultDeterminant.innerHTML = `
                <div class="row">
                    <div class="col">
                        <span class="text-primary-" style="font-size: 1em;">
                            Det(A<sub>${txtRowsA.value}×${txtColsA.value}</sub>) 
                            = 
                            |A<sub>${txtRowsA.value}×${txtColsA.value}</sub>| =
                            ${response.determinant}
                        </span>
                    </div>
                </div>
            `;
         })
        .catch(err => {
            divResultNumerics.innerHTML = "Hay problemas con la petición";
        });
});


// btnExecuteDeterminant.addEventListener('click', () => {
//     let objJson = {
//         m: txtRowsA.value,
//         n: txtColsA.value,
//         button: 'determinant-operation'
//     }; 
//     let params = {
//         headers: {"Content-Type": "application/json; charset=utf-8"},
//         body: JSON.stringify(objJson),
//         method: 'POST'
//     };
//     fetch(arrayLinks[2], params)
//         .then(data => {return data.json()})
//         .then(response => {
//             divResultDeterminant.innerHTML = `
//                 <div class="container-grid">
//                     <div>
//                         <span class="text-primary-" style="font-size: 1em;">
//                             Det(A<sub>2×2)</sub> = |A<sub>2×2</sub>| =
//                             ${response.determinant2x2}
//                         </span>
//                     </div>
                    
//                 </div>
//             `;
//          })
//         .catch(err => {
//             divResultNumerics.innerHTML = "Hay problemas con la petición";
//         });
// });
