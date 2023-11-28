                <div class="content-tab">
                    <h3 class="h3 text-warning">Análisis numérico</h3>
                    <hr>
                    <h4 class="h4 text-warning">Números enteros</h4>
                    <form id="frm-numeric">
                        <div class="row">
                            <div class="col">
                                <label for="lst-integer-operation">Operación</label>
                                <select name="lst-integer-operation" id="lst-integer-operation" class="select">
                                    <option value="-">Seleccione</option>
                                    <option value="par">Par/impar</option>
                                    <option value="factorial">Factorial</option>
                                    <option value="fibonacci">Fibonacci</option>
                                    <option value="primo">Número primo</option>
                                    <option value="perfecto">Número perfecto</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="txt-number-integer">Número</label>
                                <input type="number" id="txt-number-integer" name="txt-number-integer" class="input" value="0">    
                            </div>
                            <div class="col">
                                <br>
                                <input type="button" id="btn-integer-operation" class="btn btn-warning" value="Calcular">
                            </div>
                        </div>
                    </form>

                    <div id="div-result-integers"></div>
                    
                    <hr>

                    <h4 class="h4 text-warning">Trigonometría y cálculo</h4>
                    <form id="frm-trigonometry">
                        <div class="row">
                            <div class="col">
                                <label for="lst-trigonometry-operation">Operación</label>
                                <select name="lst-trigonometry-operation" id="lst-trigonometry-operation" class="select">
                                    <option value="-">Seleccione</option>
                                    <option value="pi">pi (&pi;)</option>
                                    <option value="e">e</option>
                                    <option value="angulo">Grados a radianes</option>
                                    <option value="angulorad">Radianes a grados</option>
                                    <option value="seno">Seno</option>
                                    <option value="coseno">Coseno</option>
                                    <option value="tangente">Tangente</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="txt-number-real">Número</label>
                                <input type="number" id="txt-number-real" name="txt-number-real" class="input" value="0">    
                            </div>
                            <div class="col">
                                <br>
                                <input type="button" id="btn-trigonometry-operation" class="btn btn-outline-warning" value="Calcular">
                            </div>
                        </div>
                    </form>
                    <div id="div-result-trigonometry"></div>
                </div>