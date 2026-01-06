                <div class="container">
                    <div class="content-tab">
                        <h3 class="h3 text-info">Sistemas numéricos</h3>

                        <hr>

                        <h4 class="h4 text-info">Sistemas numéricos computacionales</h4>
                        <div class="container">
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
                                        <input type="button" id="btn-convert-base" class="btn btn-outline-info" value="Convertir">
                                        <input type="reset" id="btnReset" name="btnReset" class="btn btn-secondary" value="Restablecer">    
                                    </div>
                                </div> 
                                <br>
                                <div id="div-result-numerics" class="row"></div>

                                <hr>

                                <h4 class="h4 text-info">Tabla de conversiones</h4>
                                <div class="row">
                                    <div class="col-12">
                                        <input type="button" id="btn-conversion-table" class="btn btn-outline-info" value="Generar">
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





                        <br>
                        <hr class="separator">
                        <hr class="separator">
                        <br>

                        <h4 class="h4 text-info">Calculadora numérica</h4>
                        <div class="container border border-info">
                            <br>
                            <form id="frm-calculator">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="table-responsive">
                                            <table id="table-calc-numeric" class="table table-bordered- text-center">
                                                <tr>
                                                    <td colspan="3">
                                                        <div class="row">
                                                            <div class="col">
                                                                <input type="search" id="txt-expression-calc-numeric" name="txt-expression-calc-numeric" class="form-control" readonly-="readonly" maxlength="100" placeholder="Expresión aritmética">
                                                            </div>
                                                        </div>
                                                        <div class="row">&nbsp;</div>
                                                        <div class="row">
                                                            <!-- <div class="col">
                                                                <label for="" id="lbl-p" class="form-check-label fw-bold vars">p</label>&nbsp;
                                                                <label for="opt-var-p0" class="form-check-label v1">v</label>
                                                                <input type="radio" class="form-check-input" id="opt-var-p0" name="opt-var-p" value="0" checked="checked">
                                                                <label for="opt-var-p1" class="form-check-label f0">f</label>
                                                                <input type="radio" class="form-check-input" id="opt-var-p1" name="opt-var-p" value="1">
                                                            </div>
                                                            <div class="col">
                                                                <label for="" id="lbl-q" class="form-check-label fw-bold vars">q</label>&nbsp;
                                                                <label for="opt-var-q0" class="form-check-label v1">v</label>
                                                                <input type="radio" class="form-check-input" id="opt-var-q0" name="opt-var-q" value="0" checked="checked">
                                                                <label for="opt-var-q1" class="form-check-label f0">f</label>
                                                                <input type="radio" class="form-check-input" id="opt-var-q1" name="opt-var-q" value="1">
                                                            </div>
                                                            <div class="col">
                                                                <label for="" id="lbl-r" class="form-check-label fw-bold vars">r</label>&nbsp;
                                                                <label for="opt-var-r0" class="form-check-label v1">v</label>
                                                                <input type="radio" class="form-check-input" id="opt-var-r0" name="opt-var-r" value="0" checked="checked">
                                                                <label for="opt-var-r1" class="form-check-label f0">f</label>
                                                                <input type="radio" class="form-check-input" id="opt-var-r1" name="opt-var-r" value="1">
                                                            </div>
                                                            <div class="col">
                                                                <label for="" id="lbl-s" class="form-check-label fw-bold vars">s</label>&nbsp;
                                                                <label for="opt-var-s0" class="form-check-label v1">v</label>
                                                                <input type="radio" class="form-check-input" id="opt-var-s0" name="opt-var-s" value="0" checked="checked">
                                                                <label for="opt-var-s1" class="form-check-label f0">f</label>
                                                                <input type="radio" class="form-check-input" id="opt-var-s1" name="opt-var-s" value="1">
                                                            </div> -->
                                                        </div>
                                                    </td>
                                                    <td colspan="3">
                                                        <div class="row">
                                                            <div class="col">
                                                                <input type="search" id="txt-result-calc-numeric" name="txt-result-calc-numeric" class="form-control" readonly="readonly" maxlength="100" placeholder="Resultado">
                                                                <input type="search" id="txt-result-prefix-" name="txt-result-prefix" class="form-control" readonly="readonly" maxlength="100" placeholder="Prefija">
                                                                <input type="search" id="txt-result-postfix-" name="txt-result-postfix" class="form-control" readonly="readonly" maxlength="100" placeholder="Postfija">
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <!-- <input type="radio" class="form-check-input" id="opt-symbol-lm" name="opt-symbol" value="lm" checked="checked">
                                                        <label for="opt-symbol-lm" class="form-check-label">Lóg. Proposicional</label> -->
                                                    </td>
                                                    <td colspan="3">
                                                        <!-- <input type="radio" class="form-check-input" id="opt-symbol-lc" name="opt-symbol" value="lc">
                                                        <label for="opt-symbol-lc" class="form-check-label">Lóg. Circuitos</label> -->
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3">
                                                        <!-- Constantes -->
                                                    </td>
                                                    <td colspan="2">
                                                        <!-- <label for="" id="lbl-constant" class="text-primary">v, f</label> -->
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="button" id="btn-inv" class="btn-calc" value="1/x" data-value="inv" data-type="function">
                                                    </td>
                                                    <td>
                                                        <input type="button" id="btn-prime" class="btn- btn- btn-calc" value="prime" data-value="prime" data-type="function">
                                                    </td>
                                                    <td>
                                                        <input type="button" id="btn-perfect" class="btn- btn- btn-calc" value="perf" data-value="perfect" data-type="function">
                                                    </td>
                                                    <td>
                                                        <input type="button" id="btn-back-calc" class="btn btn-danger btn-calc" value="←" data-value="←">
                                                    </td>
                                                    <td>
                                                        <input type="button" id="btn-ac-calc" class="btn btn-danger btn-calc" value="ac" data-value="ac">
                                                    </td>
                                                    <td>
                                                        <input type="button" id="btn-equal-" class="btn btn-success btn-calc" value="=" data-value="=">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="button" id="btn-pi" class="btn btn-info btn-calc" value="&pi;" data-value="pi" data-type="function">
                                                    </td>
                                                    <td>
                                                        <input type="button" id="btn-sin" class="btn btn-info btn-calc" value="sin" data-value="sin" data-type="function">
                                                    </td>
                                                    <td>
                                                        <input type="button" id="btn-cos" class="btn btn-info btn-calc" value="cos" data-value="cos" data-type="function">
                                                    </td>
                                                    <td>
                                                        <input type="button" id="btn-tan" class="btn btn-info btn-calc" value="tan" data-value="tan" data-type="function">
                                                    </td>
                                                    <td>
                                                        <input type="button" id="btn-back-" class="btn btn-info btn-calc" value="ln" data-value="←">
                                                    </td>
                                                    <td>
                                                        <input type="button" id="btn-equal-" class="btn btn-info btn-calc" value="log" data-value="=">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="button" id="btn-A" class="btn btn-light btn-calc" value="A" data-value="A" data-type="variable">
                                                    </td>
                                                    <td>
                                                        <input type="button" id="btn-sum" class="btn btn-info btn-calc" value="&sum;" data-value="sum" data-type="function">
                                                    </td>
                                                    <td>
                                                        <input type="button" id="btn-factorial" class="btn btn-info btn-calc" value="n!" data-value="factorial" data-type="function">
                                                    </td>
                                                    <td>
                                                        <input type="button" id="btn-e" class="btn btn-info btn-calc" value="e" data-value="e" data-type="function">
                                                    </td>
                                                    <td>
                                                        <input type="button" id="btn-back-" class="btn btn-info btn-calc" value="rand" data-value="←" data-type="function">
                                                    </td>
                                                    <td>
                                                        <input type="button" id="btn-equal-3" class="btn btn-info btn-calc" value="d-r" data-value="d-r" data-type="function">
                                                    </td>
                                                </tr>
                                                <tr id="tr-vars-">
                                                    <td>
                                                        <input type="button" id="btn-B" class="btn btn-light btn-calc" value="B" data-value="B" data-type="variable">
                                                    </td>
                                                    <td>
                                                        <input type="button" id="btn-sum" class="btn btn-dark btn-calc" value="+" data-value="+" data-type="operator">
                                                    </td>
                                                    <td>
                                                        <input type="button" id="btn-min" class="btn btn-dark btn-calc" value="-" data-value="-" data-type="operator">
                                                    </td>
                                                    <td>
                                                        <input type="button" id="btn-mul" class="btn btn-dark btn-calc" value="*" data-value="*" data-type="operator">
                                                    </td>
                                                    <td>
                                                        <input type="button" id="btn-div" class="btn btn-dark btn-calc" value="&#247;" data-value="/" data-type="operator">
                                                    </td>
                                                    <td>
                                                        <input type="button" id="btn-pow" class="btn btn-dark btn-calc" value="^" data-value="^" data-type="operator">
                                                    </td>
                                                </tr>
                                                <tr id="tr-vars-">
                                                    <td>
                                                        <input type="button" id="btn-C" class="btn btn-light btn-calc" value="C" data-value="C" data-type="variable">
                                                    </td>
                                                    <td>
                                                        <input type="button" id="btn-round" class="btn-calc" value="round" data-value="round" data-type="function">
                                                    </td>
                                                    <td>
                                                        <input type="button" id="btn-7" class="btn btn-light btn-calc" value="7" data-value="7" data-type="variable">
                                                    </td>
                                                    <td>
                                                        <input type="button" id="btn-8" class="btn btn-light btn-calc" value="8" data-value="8" data-type="variable">
                                                    </td>
                                                    <td>
                                                        <input type="button" id="btn-8" class="btn btn-light btn-calc" value="9" data-value="9" data-type="variable">
                                                    </td>
                                                    <td>
                                                        <input type="button" id="btn-mod" class="btn btn-dark btn-calc" value="mod" data-value="%" data-type="operator">
                                                    </td>
                                                </tr>
                                                <tr id="tr-operators1-">
                                                    <td>
                                                        <input type="button" id="btn-D" class="btn btn-light btn-calc" value="D" data-value="D" data-type="variable">
                                                    </td>
                                                    <td>
                                                        <input type="button" id="btn-ceil" class="btn-calc" value="&lceil;x&rceil;" data-value="ceil" data-type="function">
                                                    </td>
                                                    <td>
                                                        <input type="button" id="btn-4" class="btn btn-light btn-calc" value="4" data-value="4" data-type="variable">
                                                    </td>
                                                    <td>
                                                        <input type="button" id="btn-5" class="btn btn-light btn-calc" value="5" data-value="5" data-type="variable">
                                                    </td>
                                                    <td>
                                                        <input type="button" id="btn-6" class="btn btn-light btn-calc" value="6" data-value="6" data-type="variable">
                                                    </td>
                                                    <td>
                                                        <input type="button" id="btn-per" class="btn-calc" value="%" data-value="%" data-type="operator">
                                                    </td>
                                                </tr>
                                                <tr id="tr-operators1-">
                                                    <td>
                                                        <input type="button" id="btn-E" class="btn btn-light btn-calc" value="E" data-value="E" data-type="variable">
                                                    </td>
                                                    <td>
                                                        <input type="button" id="btn-floor" class="btn-calc" value="&lfloor;x&rfloor;" data-value="floor" data-type="function">
                                                    </td>
                                                    <td>
                                                        <input type="button" id="btn-1" class="btn btn-light btn-calc" value="1" data-value="1" data-type="variable">
                                                    </td>
                                                    <td>
                                                        <input type="button" id="btn-2" class="btn btn-light btn-calc" value="2" data-value="2" data-type="variable">
                                                    </td>
                                                    <td>
                                                        <input type="button" id="btn-3" class="btn btn-light btn-calc" value="3" data-value="3" data-type="variable">
                                                    </td>
                                                    <td>
                                                        <input type="button" id="btn-dot" class="btn-calc" value="." data-value="." data-type="dot">
                                                    </td>
                                                </tr>
                                                <tr id="tr-operators2-">
                                                    <td>
                                                        <input type="button" id="btn-F" class="btn btn-light btn-calc" value="F" data-value="F" data-type="variable">
                                                    </td>
                                                    <td>
                                                        <input type="button" id="btn-abs" class="btn-calc" value="|x|" data-value="abs" data-type="function">
                                                    </td>
                                                    <td>
                                                        <input type="button" id="btn-if-" class="btn-calc" value="&plusmn;" data-value="&plusmn;" data-type="operator">
                                                    </td>
                                                    <td>
                                                        <input type="button" id="btn-0" class="btn btn-light btn-calc" value="0" data-value="0" data-type="variable">
                                                    </td>
                                                    <td>
                                                        <input type="button" id="btn-br1" class="btn-calc" value="(" data-value="(" data-type="bracket">
                                                    </td>
                                                    <td>
                                                        <input type="button" id="btn-br2" class="btn-calc" value=")" data-value=")" data-type="bracket">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>









                    </div>
                </div>

                