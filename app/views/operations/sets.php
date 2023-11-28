                <div class="content-tab">
                    <h3 class="h3 text-success">Conjuntos</h3>
                    <form id="frm-sets">
                        <div class="container">
                            <div class="row">
                                <div class="col-3">
                                    <label for="lst-set">Conjunto</label>
                                    <select name="lst-set" id="lst-set" class="select">
                                        <option value="-">Seleccione</option>
                                        <option value="U">Universal U</option>
                                        <option value="A">Conjunto A</option>
                                        <option value="B">Conjunto B</option>
                                    </select>
                                </div>
                                <div class="col-2">
                                    <label for="txt-element">Elemento</label>
                                    <input type="search" name="txt-element" id="txt-element" maxlength="10" class="input" placeholder="Ej: e">
                                </div>
                                <div class="col-3">
                                    <br>
                                    <input type="button" id="btn-add-element" class="btn btn-success fw-bold" value=" + " title="Agregar">
                                    <input type="button" id="btn-remove-element" class="btn btn-outline-secondary fw-bold" value=" - " title="Quitar">
                                </div>
                            </div>

                            <div>&nbsp;</div>

                            <div class="row">
                                <div class="col-5">
                                    <label for="lst-operators-sets">Operaciones</label>
                                    <select name="lst-operators-sets" id="lst-operators-sets" class="select">
                                        <option value="union">Unión</option>
                                        <option value="interseccion">Intersección</option>
                                        <option value="diferencia">Diferencia</option>
                                        <option value="diferencia simetrica">Diferencia simétrica</option>
                                        <option value="complemento">Complemento</option>
                                        <option value="potencia">Potencia</option>
                                        <option value="producto cartesiano">Producto cartesiano</option>
                                    </select>
                                </div>
                                <div class="col-2">
                                    <br>
                                    <input type="button" id="btn-operators-sets" class="btn btn-outline-success" value="Ejecutar">
                                </div>
                            </div>

                            <div>&nbsp;</div>
                            <div>&nbsp;</div>
                        </div>
                    </form>
                    <div id="div-sets" class="text-secondary" style="font-size: 2em;"></div>
                    <div id="div-operation" class="text-success" style="font-size: 2em;"></div>
                </div>