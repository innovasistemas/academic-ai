<?php include "template/header.php" ?>

        <?php include "template/menu.php" ?>
        
        <?php include "template/carousel.php" ?>

            <div id="app" class="hero">
                <div class="col-12">
                    <hr>
                    <h1 class="h1">
                        <img :src="iconPage" v-bind:alt="alternateText" :height="height" :width="width" />
                        {{titlePage}}
                    </h1> 
                    <hr>
                </div>
            </div>

            <div class="container text-center">
                <div class="row">
                    <div class="col-xs-2 col-md-3 col-sm-3">
                        <div class="card">
                            <div class="card-header">
                                &nbsp
                                <a href="mathematical-applications.php" data-bs-toggle="tooltip" data-bs-placement="right" title="Aplicaciones">
                                    <img src="../../public/assets/images/maths.png" alt="aplicaciones matemáticas" height="70" width="70" />
                                </a>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title h5">Aplicaciones</h5>
                                <p class="card-text">
                                    Pruebe diferentes operaciones matemáticas en distintas ramas y sus aplicaciones
                                </p>
                            </div>
                            <div class="card-footer">
                                <a href="mathematical-applications.php" class="btn btn-primary">Ver micrositio</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-xs-2 col-md-3 col-sm-3">
                        <div class="card">
                            <div class="card-header">
                                &nbsp
                                <a href="questions.php" data-bs-toggle="tooltip" data-bs-placement="right" title="Preguntas">
                                    <img src="../../public/assets/images/question.png" alt="preguntas" height="70" width="70" />
                                </a>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title h5">Preguntas</h5>
                                <p class="card-text">
                                    Responda, solucione pruebas cortas y deje que el sistema seleccione las preguntas
                                </p>
                            </div>
                            <div class="card-footer">
                                <a href="questions.php" class="btn btn-primary">Ver micrositio</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-xs-2 col-md-3 col-sm-3">
                        <div class="card">
                            <div class="card-header">
                                &nbsp
                                <a href="documents.php" data-bs-toggle="tooltip" data-bs-placement="right" title="Documentos">
                                    <img src="../../public/assets/images/pdf-icon.png" alt="documentos informática y matemáticas" height="70" width="70" />
                                </a>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title h5">Documentos</h5>
                                <p class="card-text">
                                    Documentos disponibles para su descarga. Corresponden a las notas de clase
                                </p>
                            </div>
                            <div class="card-footer">
                                <a href="documents.php" class="btn btn-primary">Ver micrositio</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-2 col-md-3 col-sm-3">
                        <div class="card">
                            <div class="card-header">
                                &nbsp
                                <a href="examples.php" data-bs-toggle="tooltip" data-bs-placement="right" title="Ejemplos">
                                    <img src="../../public/assets/images/programming-icon.png" alt="ejemplos programación" height="70" width="70" />
                                </a>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title h5">Ejemplos</h5>
                                <p class="card-text">
                                    Los siguientes códigos están disponibles para su descarga, creados en distintos lenguajes
                                </p>
                            </div>
                            <div class="card-footer">
                                <a href="examples.php" class="btn btn-primary">Ver micrositio</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <br>
            <br>

    <?php include "template/footer.php" ?>

        <script>
            var app = new Vue({
                el: '#app',
                data: {
                    titlePage: titlePage,
                    iconPage: iconPage,
                    alternateText: 'Academic AI',
                    height: '40',
                    width: '40'
                }
            })
        </script>
