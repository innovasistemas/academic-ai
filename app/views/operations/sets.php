                <div class="container">
                    <div class="content-tab">
                        <h3 class="h3 text-success">Conjuntos</h3>
                        <div class="container border border-success">
                            <form id="frm-sets">
                                <div class="row">
                                    <div class="col-xs-2 col-md-4 col-sm-4 form-group">
                                        <label for="lst-set">Conjunto</label>
                                        <select name="lst-set" id="lst-set" class="form-select select">
                                            <option value="-">Seleccione...</option>
                                            <option value="U">Universal U</option>
                                            <option value="A">Conjunto A</option>
                                            <option value="B">Conjunto B</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-2 col-md-4 col-sm-4 form-group">
                                        <label for="txt-element">Elemento</label>
                                        <input type="search" name="txt-element" id="txt-element" maxlength="10" class="form-control select" placeholder="Ej: e">
                                    </div>
                                    <div class="col-xs-2 col-md-3 col-sm-4 form-group">
                                        <br>
                                        <input type="button" id="btn-add-element" class="btn btn-outline-success fw-bold" value=" + " data-bs-toggle="tooltip" data-bs-placement="bottom" title="Agregar">
                                        <input type="button" id="btn-remove-element" class="btn btn-outline-secondary fw-bold" value=" - " data-bs-toggle="tooltip" data-bs-placement="bottom" title="Quitar">
                                    </div>
                                </div>

                                <hr>

                                <div class="row">
                                    <div class="col-xs-2 col-md-4 col-sm-4 form-group">
                                        <label for="lst-operators-sets">Operaciones</label>
                                        <select name="lst-operators-sets" id="lst-operators-sets" class="form-select select">
                                            <option value="union">Unión</option>
                                            <option value="interseccion">Intersección</option>
                                            <option value="diferencia">Diferencia</option>
                                            <option value="diferencia simetrica">Diferencia simétrica</option>
                                            <option value="complemento">Complemento</option>
                                            <option value="potencia">Potencia</option>
                                            <option value="producto cartesiano">Producto cartesiano</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-2 col-md-4 col-sm-4 form-group">
                                        <br>
                                        <input type="button" id="btn-operators-sets" class="btn btn-outline-success" value="Ejecutar">
                                        <input type="reset" id="btn-reset" class="btn btn-secondary" value="Restablecer" title="Restablecer">
                                    </div>
                                </div>
                            </form>
                            <div id="div-sets" class="text-secondary" style="font-size: 1.2em;"></div>
                            <div id="div-operation" class="text-success" style="font-size: 1.2em;"></div>
                            <br>
                        </div>
                    </div>
                </div>