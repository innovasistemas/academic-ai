                <div class="container">
                    <div class="content-tab">
                        <h3 class="h3 text-info">Sistemas numéricos</h3>
                        <hr>
                        <h4 class="h4 text-info">Sistemas numéricos computacionales</h4>
                        <form id="frm-numeric-systems">
                            <div class="row">
                                <div class="col-xs-2 col-md-3 col-sm-4 form-group">
                                    <label for="lst-initial-base">Base inicial</label>
                                    <select name="lst-initial-base" id="lst-initial-base" class="form-select select">
                                        <option value="-">Seleccione...</option>
                                        <option value="2">Base 2</option>
                                        <option value="8">Base 8</option>
                                        <option value="10">Base 10</option>
                                        <option value="16">Base 16</option>
                                    </select>
                                </div>
                                <div class="col-xs-2 col-md-2 col-sm-4 form-group">
                                    <label for="txt-number-base">Número</label>
                                    <input type="search" id="txt-number-base" name="txt-number-base" class="form-control select" value="0" maxlength="20" data-bs-toggle="modal" data-bs-target="#exampleModal">    
                                </div>
                                <div class="col-xs-2 col-md-3 col-sm-4 form-group">
                                    <label for="lst-end-base">Base final</label>
                                    <select name="lst-end-base" id="lst-end-base" class="form-select select">
                                        <option value="-">Seleccione...</option>
                                        <option value="2">Base 2</option>
                                        <option value="8">Base 8</option>
                                        <option value="10">Base 10</option>
                                        <option value="16">Base 16</option>
                                    </select>
                                </div>
                                <div class="col-xs-4 col-md-4 col-sm-4 form-group">
                                    <br>
                                    <input type="button" id="btn-convert-base" class="btn btn-info" value="Convertir">
                                    <input type="reset" id="btnReset" name="btnReset" class="btn btn-secondary" value="Restablecer">    
                                </div>
                            </div> 
                            <br>
                            <div id="div-result-numerics" class="row"></div>

                            <hr>

                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <input type="button" id="btn-conversion-table" class="btn btn-outline-info" value="Tabla conversiones">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">&nbsp;</div>
                            
                            <div id="div-conversion-table" class="row container"></div>

                            <hr>

                            <h4 class="h4 text-info">Otras conversiones</h4>
                            <div class="container-">
                                <div class="row">
                                    <div class="col-xs-2 col-md-3 col-sm-4 form-group"">
                                        <label for="lst-conversion-type">Tipo conversión</label>
                                        <select name="lst-conversion-type" id="lst-conversion-type" class="form-select select">
                                            <option value="-">Seleccione...</option>
                                            <option value="romano">Romano</option>
                                            <option value="letras">Letras</option>
                                            <option value="devuelta">Devuelta</option>
                                        </select>
                                    </div>   
                                    <div class="col-xs-2 col-md-2 col-sm-4 form-group"">
                                        <label for="nbr-letter-roman">Número natural</label>
                                        <input type="number" id="nbr-letter-roman" name="nbr-letter-roman" class="form-control select" value="1" min="0">    
                                    </div>
                                    <div class="col-xs-2 col-md-2 col-sm-4 form-group">
                                        <br>
                                        <input type="button" id="btn-conversion-number" class="btn btn-outline-info" value="Convertir">
                                    </div>
                                </div>    
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <br>
                                    <div id="div-other-conversion"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                