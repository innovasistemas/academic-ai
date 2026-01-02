<?php include "template/header.php" ?>

        <?php include "template/menu.php" ?>
        
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

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="h2">Aplicaciones en ciencias</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p>
                                Pruebe diferentes operaciones matemáticas en distintas ramas y sus aplicaciones
                                a otros campos de la ciencia, tal como la informática, la ingeniería, la física y 
                                otras áreas del conocimiento usando las distintas herarmientas que ofrece esta página. 
                                Aquí encontrará:
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <ul>
                                <li>Desarrollos informáticos</li>
                                <li>Aplicaciones de ingeniería</li>
                                <li>Cálculos matemáticos</li>
                                <li>Problemas físicos</li>
                                <li>Y mucho más</li>
                            </ul>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-12">
                            <h2 class="h2">Sección de preguntas <small>(Responde y aprende)</small></h2>
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
                                <h4 class="h4">Comience</h3>
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
                                <h4 class="h4">Contribuya</h3>
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

                        <hr>

                        <div class="row">
                            <div class="col-12">
                                <h2 class="h2">Documentos</h2>
                            </div>
                            <div class="col-12">
                                <p>
                                    Los documentos están disponibles para su descarga. Corresponden a las notas 
                                    de clase que tratan distintas temáticas: Programación, matemáticas e ingeniería de 
                                    software, entre otros.
                                </p>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-12">
                                <h2 class="h2">Ejemplos de programación</h2>
                            </div>
                            <div class="col-12">
                                <p>
                                    Los siguientes códigos están disponibles para su descarga. 
                                    Corresponden a los ejemplos desarrollados en clase y por gusto
                                    en distintos lenguajes de programación:
                                </p>
                                
                                <div class="row">
                                    <div class="col-12">
                                        <ul>
                                            <li>PSeInt (PSeudocódico Intérprete)</li>
                                            <li>PHP</li>
                                            <li>Python</li>
                                            <li>C#</li>
                                            <li>C/C++</li>
                                            <li>Java</li>
                                            <li>Javascript</li>
                                            <li>Kotlin</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-12">
                                <h2 class="h2">Matrices</h2>
                            </div>
                            <div class="col-12">
                                <ul>
                                    <li>Operaciones: suma de matrices, producto por un escalar, producto de matrices, matriz transpuesta</li>
                                    <li>Áreas para matrices cuadradas: diagonales principal y secundaria, triangulares, triángulos</li>
                                    <li>Determinantes</li>
                                    <li>Sistemas de ecuaciones</li>
                                </ul>
                            </div>
                        </div>
                </div>
            </div>
        </div>

    <?php include "template/footer.php" ?>

     <script>
        var app = new Vue({
            el: '#app',
            data: {
                titlePage: 'Documentación',
                iconPage: `${routeAssets}/images/documentation.png`,
                alternateText: titlePage,
                height: '40',
                width: '40'
            }
        })
    </script>
