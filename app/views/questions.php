<?php include "template/header.php" ?>

        <?php include "template/menu.php" ?>


        
               
        <div id="wrapper">
            <div class="hero">
                <div class="row">
                    <div class="large-12 columns">
                        <h1>
                            <img src="../../assets/images/question.png" style="width: 50px; height: 50px;" />
                            Preguntas 
                            <small>(Responde y aprende)</small>
                        </h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="large-12 columns">
                    <h2>Bienvenido a la sección de preguntas</h2>
                </div>
            </div>
            <div class="row">
                <div class="large-12 columns">
                    <p>
                        Responda, solucione pruebas cortas y deje que el sistema seleccione las preguntas por usted
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="large-12 columns">
                    <h3>Comience</h3>
                </div>
            </div>
            <div class="row">
                <div class="large-12 columns">
                    <p>
                        Aprenda resolviendo ejercicios en distintas áreas del
                        conocimiento. Solo seleccione la temática de interés.
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="large-12 columns">
                    <h3>Contribuya</h3>
                </div>
            </div>
            <div class="row">
                <div class="large-12 columns">
                    <p>
                        Comparta lo aprendido con la comunidad para 
                        que otros aprendan de sus conocimientos.
                    </p>
                </div>
            </div>


            <div class="row">
                <div class="col">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Preguntas aleatorias</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="test-tab" data-bs-toggle="tab" data-bs-target="#test" type="button" role="tab" aria-controls="test" aria-selected="false">Pruebas</button>
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
                                    <div class="col-3">
                                        <h5>Autenticación</h5>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-3">
                                        <input type="hidden" name="txt-user-id" id="txt-user-id">
                                        <label for="txt-user">Usuario (código)</label>
                                        <input type="search" name="txt-user" id="txt-user" maxlength="6">
                                    </div>
                                    <div class="col-3">
                                        <br>
                                        <button id="btn-search-user" class="btn btn-primary">Buscar</button>
                                    </div>
                                    <div class="col-3">
                                        <span id="span-result-search" class="text-success"></span>
                                    </div>
                                </div>

                                <div class="row">&nbsp;</div>

                                <div id="div-data-question" class="d-none">
                                    <div class="row">
                                        <div class="col-3">
                                            <h5>Seleccionar asignatura</h5>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-3">
                                            <label for="cbo-subject">Asignaturas</label>
                                            <select name="cbo-subject" id="cbo-subject" class="select"></select>
                                        </div>
                                        <div class="col-3">
                                        </div>
                                        <div class="col-3">
                                        </div>
                                    </div>
                                    
                                    <div class="row">&nbsp;</div>

                                    <div class="row">
                                        <div class="col-3">
                                            <h5>Seleccionar preguntas</h5>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-3">
                                            <label for="txt-number-questions">Total preguntas</label>
                                            <input type="number" id="txt-number-questions" name="txt-number-questions" class="input" value="20" min="1" readonly="">    
                                        </div>
                                        <div class="col-3">
                                            <label for="txt-questions-select">Preguntas a seleccionar</label>
                                            <input type="number" id="txt-questions-select" name="txt-questions-select" class="input" value="2" min="1" readonly="">    
                                        </div>
                                        <div class="col-3">
                                            <br>
                                            <button id="btn-generate-random" class="btn btn-primary">Generar</button>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-3">
                                            <div class="bg-dark text-white fw-bold" id="div-result2"></div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">&nbsp;</div>
                                    
                                    <div class="row">
                                        <div class="col-3">
                                            <h5>Enviar información</h5>
                                            <button id="btn-save" class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modal-confirm" data-bs-backdrop="false">Guardar</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                                <div class="col" id="div-result"></div>
                            </div>
                        </div>
                        
                        <div class="tab-pane fade" id="test" role="tabpanel" aria-labelledby="test-tab">
                            <div id="questions-selected-content"></div>
                        </div>
                        
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab"></div>
                    </div>
                </div>
            </div>
        </div>  
        
        <div class="row">
            <div class="col-3">&nbsp;</div>
            <div class="col-3">
                <!-- Modal -->
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

        <script src="../../assets/js/controllers/questions-controller.js"></script>
