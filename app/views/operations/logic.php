                    
                <div id="app" class="container">
                    <div class="content-tab">
                        <h3 class="h3 text-primary">{{titlePage}}</h3>
                        <hr>
                        <h4 class="h4 text-primary">Lógica proposicional y de circuitos</h4>
                        <br>
                        <div class="container border border-info">
                            <form id="frm-logic">
                                <div class="row">
                                    <div class="col-xs-2 col-md-3 col-sm-4 form-group">
                                        <label for="lst-symbol-propositions">Notación lógica</label>
                                        <select name="lst-symbol-propositions" id="lst-symbol-propositions" class="form-select select">
                                            <option value="lm">Proposicional</option>
                                            <option value="lc">Circuitos</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-2 col-md-3 col-sm-4 form-group">
                                        <br>
                                        <input type="reset" id="btn-reset" class="btn btn-secondary" value="Restablecer">
                                    </div>
                                </div>
                                    
                                <hr>
                                
                                <div class="row">
                                    <div class="col-xs-2 col-md-3 col-sm-4 form-group">
                                        <label for="txt-number-propositions">Número variables</label>
                                        <input type="number" id="txt-number-propositions" name="txt-number-propositions" class="form-control select" value="1" min="1" max="8">
                                    </div>
                                    <div class="col-xs-2 col-md-3 col-sm-4 form-group">
                                        <br>
                                        <input type="button" id="btn-true-table" class="btn btn-outline-primary" value="Tabla de verdad general">
                                    </div>
                                </div>

                                <hr>
                
                                <div class="row">
                                    <div class="col-xs-2 col-md-3 col-sm-4 form-group">
                                        <label for="lst-logic-operators">Conectivos/Compuertas</label>
                                        <select name="lst-logic-operators" id="lst-logic-operators" class="form-select select">
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
                                    <div class="col-xs-2 col-md-3 col-sm-4 form-group">
                                        <br>
                                        <input type="button" id="btn-logic-operators" class="btn btn-outline-primary" value="Tabla conectivo/compuerta">
                                    </div>
                                </div>
                            </form>

                            <br>

                            <div class="row">
                                <div id="div-result" class="col-6"></div>
                                <div id="div-result2" class="col-6"></div>
                            </div>
                        </div>
                        
                        <br>
                        <hr class="separator">
                        <hr class="separator">
                        <br>

                        <h4 class="h4 text-primary">Calculadora lógica</h4>
                        <div class="container border border-info">
                            <br>
                            <form id="frm-calculator">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="table-responsive">
                                            <table id="table-calc" class="table table-bordered- text-center">
                                                <tr>
                                                    <td colspan="2">
                                                        <div class="row">
                                                            <div class="col">
                                                                <input type="search" id="txt-expression-calc" name="txt-expression-calc" class="form-control" readonly="readonly" maxlength="100" placeholder="Expresión lógica">
                                                            </div>
                                                        </div>
                                                        <div class="row">&nbsp;</div>
                                                        <div class="row">
                                                            <div class="col">
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
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td colspan="2">
                                                        <div class="row">
                                                            <div class="col">
                                                                <input type="search" id="txt-result-calc" name="txt-result-calc" class="form-control" readonly="readonly" maxlength="100" placeholder="Resultado">
                                                                <input type="search" id="txt-result-prefix" name="txt-result-prefix" class="form-control" readonly="readonly" maxlength="100" placeholder="Prefija">
                                                                <input type="search" id="txt-result-postfix" name="txt-result-postfix" class="form-control" readonly="readonly" maxlength="100" placeholder="Postfija">
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <input type="radio" class="form-check-input" id="opt-symbol-lm" name="opt-symbol" value="lm" checked="checked">
                                                        <label for="opt-symbol-lm" class="form-check-label">Lóg. Proposicional</label>
                                                    </td>
                                                    <td colspan="2">
                                                        <input type="radio" class="form-check-input" id="opt-symbol-lc" name="opt-symbol" value="lc">
                                                        <label for="opt-symbol-lc" class="form-check-label">Lóg. Circuitos</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        Constantes
                                                    </td>
                                                    <td colspan="2">
                                                        <label for="" id="lbl-constant" class="text-primary">v, f</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="button" id="btn-ac" class="text-danger btn-calc" value="ac" data-value="ac">
                                                    </td>
                                                    <td>
                                                        <input type="button" id="btn-del" class="text-danger btn-calc" value="×" data-value="×">
                                                    </td>
                                                    <td>
                                                        <input type="button" id="btn-back" class="text-danger btn-calc" value="←" data-value="←">
                                                    </td>
                                                    <td>
                                                        <input type="button" id="btn-equal" class="text-success btn-calc" value="=" data-value="=">
                                                    </td>
                                                </tr>
                                                <tr id="tr-vars">
                                                    <td>
                                                        <input type="button" id="btn-w" class="text-primary btn-calc" value="p" data-value="p" data-type="variable">
                                                    </td>
                                                    <td>
                                                        <input type="button" id="btn-x" class="text-primary btn-calc" value="q" data-value="q" data-type="variable">
                                                    </td>
                                                    <td>
                                                        <input type="button" id="btn-y" class="text-primary btn-calc" value="r" data-value="r" data-type="variable">
                                                    </td>
                                                    <td>
                                                        <input type="button" id="btn-z" class="text-primary btn-calc" value="s" data-value="s" data-type="variable">
                                                    </td>
                                                </tr>
                                                <tr id="tr-operators1">
                                                    <td>
                                                        <input type="button" id="btn-not" class="btn-calc" value="┐" data-value="-" data-type="operator">
                                                    </td>
                                                    <td>
                                                        <input type="button" id="btn-and" class="btn-calc" value="∧" data-value="*" data-type="operator">
                                                    </td>
                                                    <td>
                                                        <input type="button" id="btn-or" class="btn-calc" value="∨" data-value="+" data-type="operator">
                                                    </td>
                                                    <td>
                                                        <input type="button" id="btn-xor" class="btn-calc" value="⊕" data-value="x" data-type="operator">
                                                    </td>
                                                </tr>
                                                <tr id="tr-operators2">
                                                    <td>
                                                        <input type="button" id="btn-if" class="btn-calc" value="→" data-value="/" data-type="operator">
                                                    </td>
                                                    <td>
                                                        <input type="button" id="btn-xnor" class="btn-calc" value="↔" data-value="^" data-type="operator">
                                                    </td>
                                                    <td>
                                                        <input type="button" id="btn-b1" class="btn-calc" value="(" data-value="(" data-type="bracket1">
                                                    </td>
                                                    <td>
                                                        <input type="button" id="btn-b2" class="btn-calc" value=")" data-value=")" data-type="bracket2">
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

    
    <script>
        var app = new Vue({
            el: '#app',
            data: {
                titlePage: 'Lógica'
            }
        })
    </script>