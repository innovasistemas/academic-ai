                <div class="content-tab">
                    <h2 class="text-danger">Álgebra lineal</h2>
                    <hr>
                    <h3 class="text-danger">Matrices</h3>
                    <form id="frm-matrix">
                        <div class="content">
                            <div class="row">
                                <div class="col">   
                                    <ul>
                                        <li>Operaciones: suma de matrices, producto por un escalar, producto de matrices, matriz transpuesta</li>
                                        <li>Áreas para matrices cuadradas: diagonales principal y secundaria, triangular superior, triángulo arriba</li>
                                        <li>Determinantes de orden 1, 2 y 3</li>
                                        <li>Sistemas de ecuaciones</li>
                                    </ul>
                                </div>
                            </div>
    
                            <div class="row">
                                <div class="col-1">
                                    <label for="txt-scalar" class="fw-bold">Escalar c</label>
                                </div>
                                <div class="col-2">
                                    <br>
                                    <input type="number" id="txt-scalar" name="txt-scalar" class="input" value="1" min="-1000" max="1000">    
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-1">
                                    <label for="" class="fw-bold">Matriz A</label>                                    
                                </div>
                                <div class="col-2">
                                    <label for="txt-rowsA">Filas</label>
                                    <input type="number" id="txt-rowsA" name="txt-rowsA" class="input" value="1" min="1" max="100">    
                                </div>
                                <div class="col-2">
                                    <label for="txt-colsA">Columnas</label>
                                    <input type="number" id="txt-colsA" name="txt-colsA" class="input" value="1" min="1" max="100">    
                                </div>
                            </div> 

                            <div class="row">
                                <div class="col-1">
                                    <label for="" class="fw-bold">Matriz B</label> 
                                </div>
                                <div class="col-2">
                                    <label for="txt-rowsB">Filas</label>
                                    <input type="number" id="txt-rowsB" name="txt-rowsB" class="input" value="1" min="1" max="100">    
                                </div>
                                <div class="col-2">
                                    <label for="txt-colsB">Columnas</label>
                                    <input type="number" id="txt-colsB" name="txt-colsB" class="input" value="1" min="1" max="100">    
                                </div>
                            </div>
                        
                        <div class="row">
                            <div class="col">
                                <br>
                                <input type="button" id="btn-execute-matrix" class="btn btn-outline-danger" value="Ejecutar">
                            </div>
                        </div>

                        <div>&nbsp;</div>

                        </div>
                        
                        <div id="div-result-matrix"></div>

                        <hr>
        
                        <h3 class="text-danger">Determinantes</h3>
                        <div id="div-result-determinant"></div>

                        <hr>

                        <h3 class="text-danger">Sistemas de ecuaciones</h3>
                        <div id="div-result-ecuation"></div>
                    </form>

                </div>