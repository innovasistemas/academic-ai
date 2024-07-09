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
                <h3 class="h3 text-danger">Operaciones con matrices</h3>
                <div class="row">
                    <div class="col-xs-3 col-md-6 col-sm-3">
                        <h5>Matriz A</h5>
                        <span class="" style="font-size: 1.2em; font-family: Consolas;">
                            A<sub>${txtRowsA.value}×${txtColsA.value}</sub> = [a<sub>ij</sub>]
                        </span>
                        <div class="table-responsive">
                            ${response.matrixA}
                        </div>
                    </div>
                    <div class="col-xs-3 col-md-6 col-sm-3">
                        <h5>Matriz B</h5>
                        <span class="" style="font-size: 1.2em; font-family: Consolas;">
                            B<sub>${txtRowsB.value}×${txtColsB.value}</sub> = [b<sub>ij</sub>]
                        </span>
                        <div class="table-responsive">
                            ${response.matrixB}
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-xs-6 col-md-6 col-sm-6">
                        <h5>Suma de matrices: A + B</h5>
                        <span class="" style="font-size: 1.2em; font-family: Consolas;">
                            (A + B)<sub>${txtRowsA.value}×${txtColsA.value}</sub> = C<sub>ij</sub>
                        </span>
                        <div class="table-responsive">
                            ${response.matrixSum}
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-6 col-sm-6">
                        <h5>Producto escalar en matrices: cA</h5>
                        <span class="" style="font-size: 1.2em; font-family: Consolas;">
                            cA<sub>${txtRowsA.value}×${txtColsA.value}</sub> = ${objJson.scalar}A<sub>ij</sub>
                        </span>
                        <div class="table-responsive">
                            ${response.scalar}
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-xs-6 col-md-6 col-sm-6">
                        <h5>Producto de matrices: A x B</h5>
                        <span class="" style="font-size: 1.2em; font-family: Consolas;">
                            C<sub>${txtRowsA.value}×${txtColsB.value}</sub> 
                            = 
                            A<sub>${txtRowsA.value}×${txtColsA.value}</sub> 
                            × 
                            B<sub>${txtRowsB.value}×${txtColsB.value}</sub>
                            <br>
                            C<sub>ij</sub> = ⅀<sup>${txtColsA.value}</sup><sub>k=1</sub>(A<sub>ik</sub>xB<sub>kj</sub>)
                        </span>
                        <div class="table-responsive">
                            ${response.matrixProduct}
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-6 col-sm-6">
                        <h5>Matriz transpuesta: A<sup>T</sup></h5>
                        <span class="" style="font-size: 1.2em; font-family: Consolas;">
                            (A<sub>${txtRowsA.value}×${txtColsA.value}</sub>)<sup>T</sup> 
                            = 
                            A<sub>${txtColsA.value}×${txtRowsA.value}</sub>
                            <br>
                            A<sup>T</sup><sub>ij</sub> = A<sub>ji</sub>
                        </span>
                        <div class="table-responsive">
                            ${response.transposed}
                        </div>
                    </div>
                </div>

                <hr>
                <h3 class="h3 text-danger">Áreas de matrices</h3>

                <div class="row">
                    <div class="col-xs-2 col-md-4 col-sm-4">
                        <h5>Diagonales</h5>
                        <span class="" style="font-size: 1.2em;">
                            Ppal: A<sub>${txtColsA.value}</sub> 
                            = [a<sub>ii</sub>] 
                            | 
                            Sec: A<sub>${txtColsA.value}</sub> 
                            = [a<sub>i, n-i-1</sub>]
                        </span>
                        <div class="table-responsive">
                            ${response.diagonals}
                        </div>
                    </div>
                    <div class="col-xs-4 col-md-4 col-sm-4">
                        <h5>Triangulares</h5>
                        <span class="" style="font-size: 1.2em;">
                            Triangular Superior A<sub>${txtColsA.value}</sub> 
                            = 
                        </span>
                        <div class="table-responsive">
                            ${response.upperTriangular}
                        </div>
                    </div>
                    <div class="col-xs-4 col-md-4 col-sm-4">
                        <h5>Triángulos</h5>
                        <span class="" style="font-size: 1.2em;">
                            Triángulo Superior A<sub>${txtColsA.value}</sub> 
                            = 
                        </span>
                        <div class="table-responsive">
                            ${response.upperTriangle}
                        </div>
                    </div>
                </div>
            `;

            divResultDeterminant.innerHTML = `
                <div class="row">
                    <div class="col-xs-4 col-md-4 col-sm-4">
                        <span class="" style="font-size: 1.2em;">
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
//                         <span class="" style="font-size: 1em;">
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
