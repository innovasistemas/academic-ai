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
                                            <option value="hash1">Sustitución sencilla</option>
                                            <option value="trasposicion">Clave criptográfica</option>
                                        </select>
                                    </div>
                                </div>

                                <hr>

                                <div class="row">
                                    <div class="col-xs-2 col-md-4 col-sm-4 form-group">
                                        <label for="txt-plain-text">Texto plano</label>
                                        <input type="text" id="txt-plain-text" name="txt-plain-text" class="form-control" value="">    
                                    </div>
                                    <div class="col-xs-2 col-md-4 col-sm-4 form-group">
                                        <br>
                                        <input type="button" id="btn-encrypt" class="btn btn-primary" value="Encriptar">
                                    </div>
                                </div>

                                <hr>

                                <div class="row">
                                    <div class="col-xs-2 col-md-4 col-sm-4 form-group">
                                        <label for="txt-coded-text">Texto cifrado</label>
                                        <input type="text" id="txt-coded-text" name="txt-coded-text" class="form-control" value="">    
                                    </div>
                                    <div class="col-xs-2 col-md-4 col-sm-4 form-group">
                                        <br>
                                        <input type="button" id="btn-decrypt" class="btn btn-info" value="Desencriptar">
                                    </div>
                                </div>
                            </form>
                            <hr>
                            <div id="div-result-cryptography"></div>
                        </div>
                        

                    </div>
                </div>