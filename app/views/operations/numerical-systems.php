                <div class="content-tab">
                    <h2 class="text-info">Sistemas numéricos</h2>
                    <hr>
                    <h3 class="text-info">Sistemas numéricos computacionales</h3>
                    <form id="frm-numeric-systems">
                        <div class="container">
                            <div class="row">
                                <div class="col-3">
                                    <label for="lst-initial-base">Base inicial</label>
                                    <select name="lst-initial-base" id="lst-initial-base" class="select">
                                        <option value="-">Seleccione</option>
                                        <option value="2">Base 2</option>
                                        <option value="8">Base 8</option>
                                        <option value="10">Base 10</option>
                                        <option value="16">Base 16</option>
                                    </select>
                                </div>
                                <div class="col-3">
                                    <label for="txt-number-base">Número</label>
                                    <input type="search" id="txt-number-base" name="txt-number-base" class="input" value="0" maxlength="20" data-bs-toggle="modal" data-bs-target="#exampleModal">    
                                </div>
                                <div class="col-3">
                                    <label for="lst-end-base">Base final</label>
                                    <select name="lst-end-base" id="lst-end-base" class="select">
                                        <option value="-">Seleccione</option>
                                        <option value="2">Base 2</option>
                                        <option value="8">Base 8</option>
                                        <option value="10">Base 10</option>
                                        <option value="16">Base 16</option>
                                    </select>
                                </div>
                                <div class="col-3">
                                    <br>
                                    <input type="button" id="btn-convert-base" class="btn btn-info" value="Convertir">
                                    
                                </div>
                            </div> 
                        </div>

                        <div id="div-result-numerics" class="row"></div>

                        <hr>

                        <div class="row">
                            <div class="col">
                                <input type="button" id="btn-conversion-table" class="btn btn-outline-info" value="Tabla conversiones">
                            </div>
                        </div>
                        
                        <div class="row">&nbsp;</div>
                        
                        <div id="div-conversion-table" class="row"></div>

                        <hr>

                        <h3 class="text-info">Otras conversiones</h3>
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <label for="lst-type-conversion">Tipo conversión</label>
                                    <select name="lst-type-conversion" id="lst-type-conversion" class="select">
                                        <option value="-">Seleccione</option>
                                        <option value="romano">Romano</option>
                                        <option value="letras">Letras</option>
                                    </select>
                                </div>   
                                <div class="col">
                                    <label for="txt-number-roman">Número natural</label>
                                    <input type="number" id="txt-number-roman" name="txt-number-roman" class="input" value="1" min="0">    
                                </div>
                                <div class="col">
                                    <br>
                                    <input type="button" id="btn-conversion-number" class="btn btn-outline-info" value="Convertir">
                                </div>
                            </div>    
                        </div>

                        <div class="row">
                            <div class="col">
                                <div id="div-other-conversion"></div>
                            </div>
                        </div>
                    </form>
                </div>

                