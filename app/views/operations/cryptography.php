                <div class="container">
                    <div class="content-tab">
                        <h3 class="h3 text-dark">Criptografía</h3>
                        <hr>
                        <h4 class="h4 text-dark">Cifrado elemental</h4>
                        <div class="container">
                            <form id="frm-encrypt">
                                <div class="row">
                                    <div class="col-xs-2 col-md-4 col-sm-4 form-group">
                                        <label for="lst-type-encryption">Tipo encriptación</label>
                                        <select name="lst-type-encryption" id="lst-type-encryption" class="form-select select">
                                            <option value="-">Seleccione...</option>
                                            <option value="hash1">Ocultar-hash-trasponer</option>
                                            <option value="trasposicion">Trasposición</option>
                                            <!-- <option value="fibonacci">Fibonacci</option>
                                            <option value="primo">Número primo</option>
                                            <option value="perfecto">Número perfecto</option> -->
                                        </select>
                                    </div>
                                    <div class="col-xs-2 col-md-4 col-sm-4 form-group">
                                        <label for="txt-string">Texto a encriptar</label>
                                        <input type="text" id="txt-string" name="txt-string" class="form-control" value="">    
                                        <!-- <input type="number" id="txt-number-integer" name="txt-number-integer" class="form-control select" value="0">     -->
                                    </div>
                                    <div class="col-xs-2 col-md-4 col-sm-4 form-group">
                                        <br>
                                        <input type="button" id="btn-encrypt" class="btn btn-primary" value="Encriptar">
                                    </div>
                                </div>
                            </form>
                            <div id="div-result-cryptography"></div>
                        </div>
                        
                        <hr>

                        <!-- <h4 class="h4 text-warning">Trigonometría y cálculo</h4>
                        <div class="container">
                            <form id="frm-trigonometry">
                                <div class="row">
                                    <div class="col-xs-2 col-md-4 col-sm-4 form-group">
                                        <label for="lst-trigonometry-operation">Operación</label>
                                        <select name="lst-trigonometry-operation" id="lst-trigonometry-operation" class="form-select select">
                                            <option value="-">Seleccione...</option>
                                            <option value="pi">pi (&pi;)</option>
                                            <option value="e">e</option>
                                            <option value="angulo">Grados a radianes</option>
                                            <option value="angulorad">Radianes a grados</option>
                                            <option value="seno">Seno</option>
                                            <option value="coseno">Coseno</option>
                                            <option value="tangente">Tangente</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-2 col-md-4 col-sm-4 form-group">
                                        <label for="txt-number-real">Número</label>
                                        <input type="number" id="txt-number-real" name="txt-number-real" class="form-control select" value="0">    
                                    </div>
                                    <div class="col-xs-2 col-md-4 col-sm-4 form-group">
                                        <br>
                                        <input type="button" id="btn-trigonometry-operation" class="btn btn-outline-warning" value="Calcular">
                                    </div>
                                </div>
                            </form>
                            <div id="div-result-trigonometry"></div>
                        </div> -->
                    </div>
                </div>