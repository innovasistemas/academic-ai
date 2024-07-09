                    
                <div class="container">
                    <div class="content-tab">
                        <h3 class="h3 text-primary">Lógica</h3>
                        <hr>
                        <h4 class="h4 text-primary">Lógica proposicional y de circuitos</h4>
                        <br>
                        <div class="container border border-info">
                            <form id="frm-logic">
                                <div class="row">
                                    <div class="col-xs-2 col-md-3 col-sm-4 form-group">
                                        <label for="lst-symbol-propositions">Notación / Lógica</label>
                                        <select name="lst-symbol-propositions" id="lst-symbol-propositions" class="form-select select">
                                            <option value="lm">Proposicional</option>
                                            <option value="lc">Circuitos</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-2 col-md-3 col-sm-4 form-group">
                                        <br>
                                        <input type="reset" id="btn-reset" class="btn btn-secondary value="Restablecer">
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
                                            <option value="if">Condicional</option>
                                            <option value="if2">Bicondicional/XNOR</option>
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
                        
                        <hr>

                        <h4 class="h4 text-primary">Calculadora lógica</h4>
                        <div class="container border border-info">
                            <form id="frm-calculator">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="table-responsive">
                                            <table id="table-calc" class="table table-bordered text-center">
                                                <tr>
                                                    <td colspan="2">
                                                        <input type="search" id="txt-expression-calc" name="txt-expression-calc" class="form-control" readonly-="readonly" maxlength="100" placeholder="Exp.">
                                                    </td>
                                                    <td colspan="2">
                                                        <input type="search" id="txt-result-calc" name="txt-result-calc" class="form-control" readonly-="readonly" maxlength="100" placeholder="Res.">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <div class="form-check">
                                                            <small>
                                                                <input type="radio" class="form-check-input" id="opt-symbol-lm" name="opt-symbol" value="lm" checked="checked">
                                                                <label for="opt-symbol-lc" class="form-check-label">Lóg. Prop.</label>
                                                            </small>
                                                        </div>
                                                    </td>
                                                    <td colspan="2">
                                                        <div class="form-check">
                                                            <small>
                                                                <input type="radio" class="form-check-input" id="opt-symbol-lc" name="opt-symbol" value="lc">
                                                                <label for="opt-symbol-lc" class="form-check-label">Lóg. Circ.</label>
                                                            </small>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <small>
                                                            Constantes
                                                        </small>
                                                    </td>
                                                    <td colspan="2">
                                                        <small>
                                                            <label for="" id="lbl-constant">v, f</label>
                                                        </small>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="button" id="btn-ac" class="text-danger btn-calc" value="ac">
                                                    </td>
                                                    <td>
                                                        <input type="button" id="btn-del" class="text-danger btn-calc" value="×">
                                                    </td>
                                                    <td>
                                                        <input type="button" id="btn-back" class="text-danger btn-calc" value="←">
                                                    </td>
                                                    <td>
                                                        <input type="button" id="btn-equal" class="text-success btn-calc" value="=">
                                                    </td>
                                                </tr>
                                                <tr id="tr-vars">
                                                    <td>
                                                        <input type="button" id="btn-w" class="text-primary btn-calc" value="p" data-type="variable">
                                                    </td>
                                                    <td>
                                                        <input type="button" id="btn-x" class="text-primary btn-calc" value="q" data-type="variable">
                                                    </td>
                                                    <td>
                                                        <input type="button" id="btn-y" class="text-primary btn-calc" value="r" data-type="variable">
                                                    </td>
                                                    <td>
                                                        <input type="button" id="btn-z" class="text-primary btn-calc" value="s" data-type="variable">
                                                    </td>
                                                </tr>
                                                <tr id="tr-operators1">
                                                    <td>
                                                        <input type="button" id="btn-not" class="btn-calc" value="┐" data-type="operator">
                                                    </td>
                                                    <td>
                                                        <input type="button" id="btn-and" class="btn-calc" value="∧" data-type="operator">
                                                    </td>
                                                    <td>
                                                        <input type="button" id="btn-or" class="btn-calc" value="∨" data-type="operator">
                                                    </td>
                                                    <td>
                                                        <input type="button" id="btn-xor" class="btn-calc" value="⊕" data-type="operator">
                                                    </td>
                                                </tr>
                                                <tr id="tr-operators2">
                                                    <td>
                                                        <input type="button" id="btn-if" class="btn-calc" value="→" data-type="operator">
                                                    </td>
                                                    <td>
                                                        <input type="button" id="btn-if2" class="btn-calc" value="↔" data-type="operator">
                                                    </td>
                                                    <td>
                                                        <input type="button" id="btn-" class="btn-calc" value="(" data-type="bracket1">
                                                    </td>
                                                    <td>
                                                        <input type="button" id="btn-" class="btn-calc" value=")" data-type="bracket2">
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