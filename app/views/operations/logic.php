                <div class="content-tab">
                    <h3 class="h3 text-primary">Lógica</h3>
                    <hr>
                    <h4 class="h4 text-primary">Lógica proposicional y de circuitos</h4>
                    <br>
                    <form id="frm-logic">
                        <div class="container">
                            <div class="row">
                                <div class="col-3">
                                    <label for="lst-symbol-propositions">Simbología</label>
                                    <select name="lst-symbol-propositions" id="lst-symbol-propositions" class="select">
                                        <option value="lm">Lógica Matemática</option>
                                        <option value="lc">Lógica de Circuitos</option>
                                    </select>
                                </div>
                                <div class="col-3">
                                    <br>
                                    <input type="reset" id="btn-reset" class="btn btn-outline-primary" value="Restablecer">
                                </div>
                            </div>
                                
                            <div>&nbsp;</div>
                            
                            <div class="row">
                                <div class="col-3">
                                    <label for="txt-number-propositions">Número variables</label>
                                    <input type="number" id="txt-number-propositions" name="txt-number-propositions" class="input" value="1" min="1" max="8">
                                </div>
                                <div class="col-3">
                                    <br>
                                    <input type="button" id="btn-true-table" class="btn btn-primary" value="Tabla de verdad">
                                </div>
                            </div>
                            <div>&nbsp;</div>
            
                            <div class="row">
                                <div class="col-3">
                                    <label for="lst-logic-operators">Conectivos</label>
                                    <select name="lst-logic-operators" id="lst-logic-operators" class="select">
                                        <option value="not">Negación</option>
                                        <option value="and">Conjunción</option>
                                        <option value="or">Disyunción</option>
                                        <option value="xor">Disyunción exclusiva</option>
                                        <option value="if">Condicional</option>
                                        <option value="if2">Bicondicional</option>
                                    </select>
                                </div>
                                <div class="col-3">
                                    <br>
                                    <input type="button" id="btn-logic-operators" class="btn btn-outline-primary" value="Tabla conectivo">
                                </div>
                            </div>
                            <div>&nbsp;</div>
                        </div>
                    </form>

                    <div class="row">
                        <div id="div-result" class="col"></div>
                        <div id="div-result2" class="col"></div>
                    </div>
                    
                    <hr>

                    <h4 class="h4 text-primary">Calculadora lógica</h4>
                    
                    <form id="frm-calculator">
                        <div class="row">
                            <div class="col">&nbsp;</div>
                            <div class="col">
                                <div class="border-primary div-logic-calc">
                                    <table id="table-calc" class="table-calc">
                                        <tr>
                                            <td colspan="4">
                                                <input type="search" id="txt-expression-calc" name="txt-expression-calc" class="text-calc" readonly-="readonly" maxlength="100">
                                                <input type="search" id="txt-result-calc" name="txt-result-calc" class="text-calc" readonly-="readonly" maxlength="100">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <small>
                                                    <label for="opt-symbol-lc">LM</label>
                                                    <input type="radio" class="input-check" id="opt-symbol-lm" name="opt-symbol" value="lm" checked="checked">
                                                </small>
                                            </td>
                                            <td colspan="2">
                                                <small>
                                                    <label for="opt-symbol-lc">LC</label>
                                                    <input type="radio" class="input-check" id="opt-symbol-lc" name="opt-symbol" value="lc">
                                                </small>
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
                                                    <label for="" id="lbl-constant" class="text-italic text-bold">v, f</label>
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
                            <div class="col">&nbsp;</div>
                        </div>
                    </form>
                </div>