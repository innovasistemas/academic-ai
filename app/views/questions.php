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
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Pruebas</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Banco de preguntas</button>
                    </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <form action="">
                                <div class="row">&nbsp;</div>
                                <div class="row">
                                    <div class="col-3">
                                        <label for="txt-number-questions">Total preguntas</label>
                                        <input type="number" id="txt-number-questions" name="txt-number-questions" class="input" value="1" min="1">    
                                    </div>
                                    <div class="col-3">
                                        <label for="txt-questions-select">Preguntas a seleccionar</label>
                                        <input type="number" id="txt-questions-select" name="txt-questions-select" class="input" value="1" min="1">    
                                    </div>
                                    <div class="col-3">
                                        <br>
                                        <button id="btn-generate-random" class="btn btn-primary">Generar</button>
                                    </div>
                                </div>

                            </form>
                            <div class="row">
                                <div class="col" id="div-result"></div>
                            </div>
                            <div class="row">
                                <div class="col" id="div-result2"></div>
                            </div>
                        </div>
                        
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">b</div>
                        
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">c</div>
                    </div>
                </div>
            </div>
        </div>    

    <?php include "template/footer.php" ?>

        <script src="../../assets/js/controllers/questions-controller.js"></script>
