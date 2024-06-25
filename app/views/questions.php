<?php include "template/header.php" ?>

        <?php include "template/menu.php" ?>
               
        <div class="hero">
            <div class="col-12">
                <hr>
                <h1 class="h1">
                    <img src="../../public/assets/images/question.png" height="40" width="40" alt="Academic AI" />
                    Preguntas 
                    <small>(Responde y aprende)</small>
                </h1>
                <hr>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="h2">Bienvenido a la sección de preguntas</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <p>
                        Responda, solucione pruebas cortas y deje que el sistema seleccione las preguntas por usted
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <h3 class="h3">Comience</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <p>
                        Aprenda resolviendo ejercicios en distintas áreas del
                        conocimiento. Solo seleccione la temática de interés.
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <h3 class="h3">Contribuya</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <p>
                        Comparta lo aprendido con la comunidad para 
                        que otros aprendan de sus conocimientos.
                    </p>
                </div>
            </div>

            <!-- Tabs -->
            <div class="row">
                <div class="col-12">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Preguntas aleatorias</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="test-tab" data-bs-toggle="tab" data-bs-target="#test" type="button" role="tab" aria-controls="test" aria-selected="false">Preguntas seleccionadas</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Banco de preguntas</button>
                    </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <form action="">
                                <div class="row">&nbsp;</div>

                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="h5">Autenticación</h5>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-2 col-md-4 col-sm-4 form-group">
                                        <input type="hidden" name="txt-user-id" id="txt-user-id" value="">
                                        <label for="txt-user">Usuario (documento)</label>
                                        <input type="search" name="txt-user" id="txt-user" class="form-control select" maxlength="20">
                                    </div>
                                    <div class="col-xs-2 col-md-4 col-sm-4 form-group">
                                        <br>
                                        <button id="btn-search-user" class="btn btn-primary" title="Buscar el usuario y refresca los resultados de preguntas seleccionadas">Buscar y refrescar</button>
                                        <input id="btn-reset" type="reset" class="btn btn-secondary" value="Restablecer">
                                    </div>
                                    <div class="col-xs-2 col-md-4 col-sm-4 form-group">
                                        <br>
                                        <div class="bg-dark text-white" style="font-size: 1.1em;">
                                            <span id="span-result-search"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">&nbsp;</div>
                                <hr>

                                <div id="div-data-question" class="d-none">
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="h5">Asignatura/tema/actividad</h5>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xs-2 col-md-4 col-sm-4 form-group">
                                            <label for="cbo-subject">Asignatura</label>
                                            <select name="cbo-subject" id="cbo-subject" class="form-select select"></select>
                                        </div>
                                        <div class="col-xs-2 col-md-4 col-sm-4 form-group">
                                            <label for="cbo-theme">Tema</label>
                                            <select name="cbo-theme" id="cbo-theme" class="form-select select"></select>
                                        </div>
                                        <div class="col-xs-2 col-md-4 col-sm-4 form-group">
                                            <label for="cbo-activity">Actividad</label>
                                            <select name="cbo-activity" id="cbo-activity" class="form-select select"></select>
                                        </div>
                                    </div>
                                    
                                    <div class="row">&nbsp;</div>
                                    <hr>

                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="h5">Preguntas</h5>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xs-2 col-md-4 col-sm-4 form-group">
                                            <label for="txt-number-questions">Total preguntas</label>
                                            <input type="number" id="txt-number-questions" name="txt-number-questions" class="form-control select" value="20" min="1" readonly="">    
                                        </div>
                                        <div class="col-xs-2 col-md-4 col-sm-4 form-group">
                                            <label for="txt-questions-select">Preguntas a seleccionar</label>
                                            <input type="number" id="txt-questions-select" name="txt-questions-select" class="form-control select" value="2" min="1">    
                                        </div>
                                        <div class="col-xs-2 col-md-4 col-sm-4 form-group">
                                            <br>
                                            <button id="btn-generate-random" class="btn btn-primary">Generar</button>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xs-12 col-md-8 col-sm-14 form-group">
                                            <br>
                                            <div class="bg-dark text-white fw-bold" id="div-result2"></div>
                                        </div>
                                    </div>

                                    <hr>
                                    
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="h5">Enviar información</h5>
                                            <button id="btn-save" class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#modal-confirm" data-bs-backdrop="false">Guardar</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                                <div class="col-12" id="div-result"></div>
                            </div>
                        </div>
                        
                        <div class="tab-pane fade" id="test" role="tabpanel" aria-labelledby="test-tab">
                            <div id="questions-selected-content">
                                <br>
                                <p>
                                    Aún no se ha autenticado o no tiene preguntas seleccionadas
                                </p>
                            </div>
                        </div>
                        
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab"></div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Modal -->
        <div class="row">
            <div class="col-3">&nbsp;</div>
            <div class="col-3">
                <!-- Modal begin -->
                <div class="modal fade" id="modal-confirm" tabindex="-1" role="dialog" aria-labelledby="modal-confirmTitle" aria-hidden="true">>
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Información del sistema</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p id="p-modal-body"></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" id="btn-modal-save" disabled="">Guardar</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php include "template/footer.php" ?>

        <script src="../../public/assets/js/controllers/questions-controller.js"></script>
