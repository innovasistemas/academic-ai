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
                                        <label class="form-check-label" for="opt-si">Sistema Internacional</label>
                                    </div>
                                    <div class="col-xs-2 col-md-4 col-sm-4 form-group">
                                        <input type="radio" id="opt-gauss" name="opt-units" class="form-check-input" value="2">    
                                        <label class="form-check-label" for="opt-gauss">Sistema Gaussiano</label>
                                    </div>
                                    <div class="col-xs-2 col-md-4 col-sm-4 form-group">
                                        <input type="radio" id="opt-eng" name="opt-units" class="form-check-input" value="3">    
                                        <label class="form-check-label" for="opt-eng">Sistema Inglés</label>
                                    </div>
                                </div>

                                <hr>

                                <div class="row">
                                    <div class="col-xs-2 col-md-4 col-sm-4 form-group">
                                        <label for="cbo-type-simulation">Tipo simulación</label>
                                        <select name="cbo-type-simulation" id="cbo-type-simulation" class="form-select select">
                                            <option value="-">Seleccione...</option>
                                            <option value="cl">Caída libre</option>
                                            <option value="mru">Movimiento Rectilíneo Uniforme</option>
                                            <option value="mrua">Movimiento Rectilíneo Uniforme Acelerado</option>
                                            <option value="caos">Caos</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-2 col-md-4 col-sm-4 form-group">
                                        <label for="nbr-time">Tiempo t (s)</label>
                                        <input type="number" id="nbr-time" name="nbr-time" class="form-control" value="0" min="0">    
                                    </div>
                                </div>

                                <hr>

                                <div class="row">
                                    <h4>Constantes</h4>
                                    <div class="col-xs-2 col-md-4 col-sm-4 form-group">
                                        <label for="nbr-gravity">Gravedad g</label>
                                        <input type="number" id="nbr-gravity" name="nbr-gravity" class="form-control" value="9.8" readonly="">    
                                    </div>
                                    <div class="col-xs-2 col-md-4 col-sm-4 form-group">
                                        <label for="nbr-ligh">Velocidad de la luz c</label>
                                        <input type="number" id="nbr-ligh" name="nbr-ligh" class="form-control" value="299792458" readonly="">    
                                    </div>
                                </div>

                                <hr>
                                
                                <div class="row">
                                    <h4>Variables</h4>
                                    <div class="col-xs-2 col-md-4 col-sm-4 form-group">
                                        <label for="nbr-initial-position">Posición inicial x0</label>
                                        <input type="number" id="nbr-initial-position" name="nbr-initial-position" class="form-control" value="0">    
                                    </div>
                                    <div class="col-xs-2 col-md-4 col-sm-4 form-group">
                                        <label for="nbr-initial-velocity">Velocidad inicial v0</label>
                                        <input type="number" id="nbr-initial-velocity" name="nbr-initial-velocity" class="form-control" value="0">    
                                    </div>
                                    <div class="col-xs-2 col-md-4 col-sm-4 form-group">
                                        <label for="nbr-acceleration">Aceleración a</label>
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