                <div class="container">
                    <div class="content-tab">
                        <h3 class="h3 text-danger">Álgebra lineal</h3>
                        <hr>
                        <div class="container">
                            <form id="frm-matrix">
        
                                <div class="row">
                                    <div class="col-xs-2 col-md-2 col-sm-4 form-group">
                                        <label for="txt-scalar" class="fw-bold">Escalar c</label>
                                        <input type="number" id="txt-scalar" name="txt-scalar" class="form-control select" value="1" min="-1000" max="1000">    
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-2 col-md-2 col-sm-4 form-group">
                                        <label for="" class="fw-bold">Matriz A</label>                                    
                                    </div>
                                    <div class="col-xs-2 col-md-2 col-sm-4 form-group">
                                        &nbsp;                                    
                                    </div>
                                    <div class="col-xs-2 col-md-2 col-sm-4 form-group">
                                        <label for="" class="fw-bold">Matriz B</label>                                    
                                    </div>
                                </div> 
                                <div class="row">
                                    <div class="col-xs-2 col-md-2 col-sm-4 form-group">
                                        <label for="txt-rowsA">Filas</label>
                                        <input type="number" id="txt-rowsA" name="txt-rowsA" class="form-control select" value="1" min="1" max="100">    
                                    </div>
                                    <div class="col-xs-2 col-md-2 col-sm-4 form-group">
                                        <label for="txt-colsA">Columnas</label>
                                        <input type="number" id="txt-colsA" name="txt-colsA" class="form-control select" value="1" min="1" max="100">    
                                    </div>
                                    <div class="col-xs-2 col-md-2 col-sm-4 form-group">
                                        <label for="txt-rowsB">Filas</label>
                                        <input type="number" id="txt-rowsB" name="txt-rowsB" class="form-control select" value="1" min="1" max="100">    
                                    </div>
                                    <div class="col-xs-2 col-md-2 col-sm-4 form-group">
                                        <label for="txt-colsB">Columnas</label>
                                        <input type="number" id="txt-colsB" name="txt-colsB" class="form-control select" value="1" min="1" max="100">    
                                    </div>

                                </div> 
                                <div class="row">
                                </div> 

                                <div class="row">
                                    <div class="col-xs-2 col-md-4 col-sm-4 form-group">
                                        <br>
                                        <input type="button" id="btn-execute-matrix" class="btn btn-outline-danger" value="Ejecutar">
                                        <input type="reset" id="btn-reset" class="btn btn-secondary" value="Restablecer">
                                    </div>
                                </div>
                                
                            </form>

                            <div id="div-result-matrix"></div>

                        </div>
                        <hr>
        
                        <h4 class="h4 text-danger">Determinantes</h4>
                        <div id="div-result-determinant"></div>

                        <hr>

                        <h4 class="h4 text-danger">Sistemas de ecuaciones</h4>
                        <div id="div-result-ecuation"></div>
                    </div>
                </div>