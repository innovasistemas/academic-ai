                <div class="container">
                    <div class="content-tab">
                        <h3 class="h3 text-dark">Simulaciones</h3>
                        <hr>
                        <div class="container">
                            <form id="frm-simulation">
                                <div class="row">
                                    <h4>Sistema de unidades</h4>
                                    <div class="col-xs-2 col-md-4 col-sm-4 form-group">
                                        <input type="radio" id="opt-si" name="opt-units" class="form-check-input" value="1" checked="">    
                                        <label class="form-check-label" for="opt-si">Sistema Internacional (SI - MKS)</label>
                                    </div>
                                    <div class="col-xs-2 col-md-4 col-sm-4 form-group">
                                        <input type="radio" id="opt-gauss" name="opt-units" class="form-check-input" value="2">    
                                        <label class="form-check-label" for="opt-gauss">Sistema Gaussiano (CGS)</label>
                                    </div>
                                    <div class="col-xs-2 col-md-4 col-sm-4 form-group">
                                        <input type="radio" id="opt-eng" name="opt-units" class="form-check-input" value="3">    
                                        <label class="form-check-label" for="opt-eng">Sistema Inglés (FPS)</label>
                                    </div>
                                </div>

                                <hr>

                                <div class="row">
                                    <h4>Constantes</h4>
                                    <div class="col-2">
                                        <label for="nbr-gravity">Gravedad g (<em>m/s<sup>2</sup></em>)</label>
                                        <input type="number" id="nbr-gravity" name="nbr-gravity" class="form-control" value="9.8" readonly="">    
                                    </div>
                                    <div class="col-2">
                                        <label for="nbr-gravitation">Gravit. G (<em>Nm<sup>2</sup>/kg<sup>2</sup></em>)</label>
                                        <input type="number" id="nbr-gravitation" name="nbr-gravitation" class="form-control" value="6.672E-11" readonly="">    
                                    </div>
                                    <div class="col-2">
                                        <label for="nbr-ligh">Velocidad luz c (<em>m/s</em>)</label>
                                        <input type="number" id="nbr-ligh" name="nbr-ligh" class="form-control" value="299792458" readonly="">
                                    </div>
                                    <div class="col-2">
                                        <label for="nbr-charge">Carga element. e (<em>C</em>)</label>
                                        <input type="number" id="nbr-charge" name="nbr-charge" class="form-control" value="1.602E-19" readonly="">
                                    </div>
                                    <div class="col-2">
                                        <label for="nbr-plank">Const. Plank h (<em>Js</em>)</label>
                                        <input type="number" id="nbr-plank" name="nbr-plank" class="form-control" value="6.626E-34" readonly="">
                                    </div>
                                </div>

                                <hr>

                                <div class="row">
                                    <div class="col-xs-2 col-md-4 col-sm-4 form-group">
                                        <h4>Simulación</h4>
                                        <label for="cbo-type-simulation">Tipo simulación</label>
                                        <select name="cbo-type-simulation" id="cbo-type-simulation" class="form-select select">
                                            <option value="-">Seleccione...</option>
                                            <option value="cl">Caída libre</option>
                                            <option value="mru">Movimiento Rectilíneo Uniforme</option>
                                            <option value="mrua">Movimiento Rectilíneo Uniforme Acelerado</option>
                                            <option value="caos">Caos</option>
                                        </select>
                                    </div>
                                </div>

                                <hr>

                                <div class="row">
                                    <h4>Variables</h4>
                                    <div class="col-2">
                                        <label for="nbr-time">Tiempo t (<em>s</em>)</label>
                                        <input type="number" id="nbr-time" name="nbr-time" class="form-control" value="0" min="0">    
                                    </div>
                                    <div class="col-2">
                                        <label for="nbr-initial-position">Posic. inicial x<sub>0</sub> (<em>m</em>)</label>
                                        <input type="number" id="nbr-initial-position" name="nbr-initial-position" class="form-control" value="0">    
                                    </div>
                                    <div class="col-2">
                                        <label for="nbr-initial-velocity">Veloc. inicial v<sub>0</sub> (<em>m/s</em>)</label>
                                        <input type="number" id="nbr-initial-velocity" name="nbr-initial-velocity" class="form-control" value="0">    
                                    </div>
                                    <div class="col-2">
                                        <label for="nbr-acceleration">Aceleración a (<em>m/s<sup>2</sup></em>)</label>
                                        <input type="number" id="nbr-acceleration" name="nbr-acceleration" class="form-control" value="0">    
                                    </div>
                                </div>
                                
                                <hr>
                                
                                <div class="row">
                                    <div class="col-xs-2 col-md-4 col-sm-4 form-group">
                                        <br>
                                        <input type="button" id="btn-simulate" class="btn btn-primary" value="Simular">
                                    </div>
                                </div>
                            </form>

                            <hr>
                            
                            <div id="div-result-simulations"></div>
                        </div>
                    </div>
                </div>