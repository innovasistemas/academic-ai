                    
                <div id="app2" class="container">
                    <div class="content-tab">
                        <h3 class="h3 text-primary">{{subTitlePage}}</h3>
                        <hr>
                        <h4 class="h4 text-primary">Conectivos y compuertas lógicas</h4>
                        <div class="container border border-info">
                            <form id="frm-logic">
                                <hr>
                                <div class="row">
                                    <div class="col form-group">
                                        <label for="lst-symbol-propositions">Notación lógica</label>
                                        <select name="lst-symbol-propositions" id="lst-symbol-propositions" class="form-select form-select-sm select">
                                            <option value="lm">Proposicional</option>
                                            <option value="lc">Circuitos</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="lst-logic-operators">Conectivos y compuertas</label>
                                        <select name="lst-logic-operators" id="lst-logic-operators" class="form-select form-select-sm select">
                                            <option value="-">Seleccione...</option>
                                            <option value="not">Negación/NOT</option>
                                            <option value="and">Conjunción/AND</option>
                                            <option value="or">Disyunción/OR</option>
                                            <option value="xor">Disyunción exclusiva/XOR</option>
                                            <option value="nand">Neg. conjunción/NAND</option>
                                            <option value="nor">Neg. disyunción/NOR</option>
                                            <option value="if">Condicional</option>
                                            <option value="xnor">Bicondicional/XNOR</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <br>
                                        <input type="button" id="btn-logic-operators" class="btn btn-sm btn-outline-primary" value="Tabla conectivo y compuerta">
                                    </div>
                                    <div class="col">
                                        <img id="img-gate" src="../../public/assets/images/gates/none.png" alt="gate" width="280" height="120">
                                    </div>
                                </div>
                            </form>

                            <br>

                            <div class="row">
                                <div id="div-result2" class="col"></div>
                            </div>
                        </div>
                        
                        <hr class="separator">
                        <hr class="separator">

                        <h4 class="h4 text-primary">Calculadora lógica</h4>
                        <div class="container border border-info">
                            <hr>
                            <!-- <br> -->
                            <form id="frm-calculator">
                                <div class="row">
                                    <div class="col">
                                        <div class="table-responsive">
                                            <table id="table-calc" class="table table-borderless text-center">
                                                <tr>
                                                    <td colspan="2">
                                                        <div class="row">
                                                            <div class="col">
                                                                <input type="search" id="txt-expression-calc" name="txt-expression-calc" class="form-control" readonly="readonly" maxlength="100" placeholder="Exp. lógica">
                                                            </div>
                                                        </div>
                                                        <div class="row">&nbsp;</div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <label for="" id="lbl-p" class="form-check-label fw-bold h5 vars">p</label>&nbsp;
                                                                <label for="opt-var-p1" class="form-check-label v1">v</label>
                                                                <input type="radio" class="form-check-input" id="opt-var-p1" name="opt-var-p" value="1" checked="checked">
                                                                &nbsp;
                                                                <label for="opt-var-p0" class="form-check-label f0">f</label>
                                                                <input type="radio" class="form-check-input" id="opt-var-p0" name="opt-var-p" value="0">
                                                            </div>
                                                            <div class="col">
                                                                <label for="" id="lbl-q" class="form-check-label fw-bold h5 vars">q</label>&nbsp;
                                                                <label for="opt-var-q1" class="form-check-label v1">v</label>
                                                                <input type="radio" class="form-check-input" id="opt-var-q1" name="opt-var-q" value="1" checked="checked">
                                                                &nbsp;
                                                                <label for="opt-var-q0" class="form-check-label f0">f</label>
                                                                <input type="radio" class="form-check-input" id="opt-var-q0" name="opt-var-q" value="0">
                                                            </div>
                                                            <div class="col">
                                                                <label for="" id="lbl-r" class="form-check-label fw-bold h5 vars">r</label>&nbsp;
                                                                <label for="opt-var-r1" class="form-check-label v1">v</label>
                                                                <input type="radio" class="form-check-input" id="opt-var-r1" name="opt-var-r" value="1" checked="checked">
                                                                &nbsp;
                                                                <label for="opt-var-r0" class="form-check-label f0">f</label>
                                                                <input type="radio" class="form-check-input" id="opt-var-r0" name="opt-var-r" value="0">
                                                            </div>
                                                            <div class="col">
                                                                <label for="" id="lbl-s" class="form-check-label fw-bold h5 vars">s</label>&nbsp;
                                                                <label for="opt-var-s1" class="form-check-label v1">v</label>
                                                                <input type="radio" class="form-check-input" id="opt-var-s1" name="opt-var-s" value="1" checked="checked">
                                                                &nbsp;
                                                                <label for="opt-var-s0" class="form-check-label f0">f</label>
                                                                <input type="radio" class="form-check-input" id="opt-var-s0" name="opt-var-s" value="0">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <label for="" id="lbl-t" class="form-check-label fw-bold h5 vars">t</label>&nbsp;
                                                                <label for="opt-var-t1" class="form-check-label v1">v</label>
                                                                <input type="radio" class="form-check-input" id="opt-var-t1" name="opt-var-t" value="1" checked="checked">
                                                                &nbsp;
                                                                <label for="opt-var-t0" class="form-check-label f0">f</label>
                                                                <input type="radio" class="form-check-input" id="opt-var-t0" name="opt-var-t" value="0">
                                                            </div>
                                                            <div class="col">
                                                                <label for="" id="lbl-u" class="form-check-label fw-bold h5 vars">u</label>&nbsp;
                                                                <label for="opt-var-u1" class="form-check-label v1">v</label>
                                                                <input type="radio" class="form-check-input" id="opt-var-u1" name="opt-var-u" value="1" checked="checked">
                                                                &nbsp;
                                                                <label for="opt-var-u0" class="form-check-label f0">f</label>
                                                                <input type="radio" class="form-check-input" id="opt-var-u0" name="opt-var-u" value="0">
                                                            </div>
                                                            <div class="col">
                                                                <label for="" id="lbl-v" class="form-check-label fw-bold h5 vars">v</label>&nbsp;
                                                                <label for="opt-var-v1" class="form-check-label v1">v</label>
                                                                <input type="radio" class="form-check-input" id="opt-var-v1" name="opt-var-v" value="1" checked="checked">
                                                                &nbsp;
                                                                <label for="opt-var-v0" class="form-check-label f0">f</label>
                                                                <input type="radio" class="form-check-input" id="opt-var-v0" name="opt-var-v" value="0">
                                                            </div>
                                                            <div class="col">
                                                                <label for="" id="lbl-w" class="form-check-label fw-bold h5 vars">w</label>&nbsp;
                                                                <label for="opt-var-w1" class="form-check-label v1">v</label>
                                                                <input type="radio" class="form-check-input" id="opt-var-w1" name="opt-var-w" value="1" checked="checked">
                                                                &nbsp;
                                                                <label for="opt-var-w0" class="form-check-label f0">f</label>
                                                                <input type="radio" class="form-check-input" id="opt-var-w0" name="opt-var-w" value="0">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td colspan="2">
                                                        <div class="row">
                                                            <div class="col">
                                                                <input type="search" id="txt-result-calc" name="txt-result-calc" class="form-control" readonly="readonly" maxlength="100" placeholder="Resultado">
                                                            </div>
                                                        </div>
                                                        <div class="row">&nbsp;</div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <input type="search" id="txt-result-prefix" name="txt-result-prefix" class="form-control" readonly="readonly" maxlength="100" placeholder="Exp. prefija">
                                                            </div>
                                                            <div class="col">
                                                                <input type="search" id="txt-result-postfix" name="txt-result-postfix" class="form-control" readonly="readonly" maxlength="100" placeholder="Exp. postfija">
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th colspan="2">
                                                        <label for="">Notación lógica</label>
                                                    </th>
                                                    <td colspan="1">
                                                        <input type="radio" class="form-check-input" id="opt-symbol-lm" name="opt-symbol" value="lm" checked="checked">
                                                        <label for="opt-symbol-lm" class="form-check-label">Lóg. Proposicional</label>
                                                    </td>
                                                    <td colspan="1">
                                                        <input type="radio" class="form-check-input" id="opt-symbol-lc" name="opt-symbol" value="lc">
                                                        <label for="opt-symbol-lc" class="form-check-label">Lóg. Circuitos</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th colspan="2">
                                                        Constantes lógicas
                                                    </th>
                                                    <td colspan="2">
                                                        <label for="" id="lbl-constant" class="text-primary fw-bold">v - f</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="button" id="btn-ac" class="btn btn-danger btn-calc" value="ac" data-value="ac" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Limpiar todo">
                                                    </td>
                                                    <td>
                                                        <input type="button" id="btn-back" class="btn btn-danger btn-calc" value="←" data-value="←" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Retroceso">
                                                    </td>
                                                    <td>
                                                        <input type="button" id="btn-shift" class="btn btn-warning btn-calc" value="shift" data-value="shift" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Cambio">
                                                    </td>
                                                    <td>
                                                        <input type="button" id="btn-equal" class="btn btn-success btn-calc" value="=" data-value="="data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ejecutar">
                                                    </td>
                                                </tr>
                                                <tr class="tr-vars">
                                                    <td>
                                                        <input type="button" id="btn-a" class="btn btn-info btn-calc" value="p" data-value="p" data-type="variable">
                                                    </td>
                                                    <td>
                                                        <input type="button" id="btn-b" class="btn btn-info btn-calc" value="q" data-value="q" data-type="variable">
                                                    </td>
                                                    <td>
                                                        <input type="button" id="btn-c" class="btn btn-info btn-calc" value="r" data-value="r" data-type="variable">
                                                    </td>
                                                    <td>
                                                        <input type="button" id="btn-d" class="btn btn-info btn-calc" value="s" data-value="s" data-type="variable">
                                                    </td>
                                                </tr>
                                                <tr class="tr-vars">
                                                    <td>
                                                        <input type="button" id="btn-e" class="btn btn-info btn-calc" value="t" data-value="t" data-type="variable">
                                                    </td>
                                                    <td>
                                                        <input type="button" id="btn-f" class="btn btn-info btn-calc" value="u" data-value="u" data-type="variable">
                                                    </td>
                                                    <td>
                                                        <input type="button" id="btn-g" class="btn btn-info btn-calc" value="v" data-value="v" data-type="variable">
                                                    </td>
                                                    <td>
                                                        <input type="button" id="btn-h" class="btn btn-info btn-calc" value="w" data-value="w" data-type="variable">
                                                    </td>
                                                </tr>
                                                <tr id="tr-operators1">
                                                    <td>
                                                        <input type="button" id="btn-not" class="btn btn-dark btn-calc" value="┐" data-value="-" data-type="operator" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Negación/NOT">
                                                    </td>
                                                    <td>
                                                        <input type="button" id="btn-and" class="btn btn-dark btn-calc" value="∧" data-value="*" data-type="operator" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Conjunción/AND">
                                                    </td>
                                                    <td>
                                                        <input type="button" id="btn-or" class="btn btn-dark btn-calc" value="∨" data-value="+" data-type="operator" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Disyunción/OR">
                                                    </td>
                                                    <td>
                                                        <input type="button" id="btn-xor" class="btn btn-dark btn-calc" value="⊕" data-value="x" data-type="operator" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Disyunción exclusiva/XOR">
                                                    </td>
                                                </tr>
                                                <tr id="tr-operators2">
                                                    <td>
                                                        <input type="button" id="btn-if" class="btn btn-dark btn-calc" value="→" data-value="/" data-type="operator" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Condicional">
                                                    </td>
                                                    <td>
                                                        <input type="button" id="btn-xnor" class="btn btn-dark btn-calc" value="↔" data-value="^" data-type="operator" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Bicondicional/XNOR">
                                                    </td>
                                                    <td>
                                                        <input type="button" id="btn-b1" class="btn btn-secondary btn-calc" value="(" data-value="(" data-type="bracket"data-bs-toggle="tooltip" data-bs-placement="bottom" title="Paréntesis izquierdo">
                                                    </td>
                                                    <td>
                                                        <input type="button" id="btn-b2" class="btn btn-secondary btn-calc" value=")" data-value=")" data-type="bracket" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Paréntesis derecho">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <hr class="separator">
                            <hr class="separator">

                            <form action="">
                                <div class="row">
                                    <!-- <div class="col form-group">
                                        <br>
                                        <input type="reset" id="btn-reset" class="btn btn-secondary" value="Restablecer">
                                    </div> -->
                                    <div class="col form-group">
                                        <label for="txt-number-propositions">Número variables</label>
                                        <input type="number" id="txt-number-propositions" name="txt-number-propositions" class="form-control form-control-sm select" value="1" min="1" max="8">
                                    </div>
                                    <div class="col form-group">
                                        <br>
                                        <input type="button" id="btn-true-table" class="btn btn-sm btn-outline-primary" value="Tabla de verdad n variables">
                                    </div>
                                </div>
                            </form>

                            <hr>

                            <div class="row">
                                <div id="div-result" class="col"></div>
                            </div>
                            
                        </div>
                    </div>
                </div>

    
    <script>
        var app = new Vue({
            el: '#app2',
            data: {
                subTitlePage: 'Lógica proposicional y de circuitos'
            }
        })
    </script>