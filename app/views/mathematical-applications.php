<?php include "template/header.php" ?>

        <?php include "template/menu.php" ?>
        
        <div class="hero">
            <div class="col-12">
                <hr>
                <h1 class="h1">
                    <img src="../../public/assets/images/maths.png" height="40" width="40" alt="Academic AI" />
                    Aplicaciones
                </h1> 
                <hr>
            </div>
        </div>

        <div class="container">
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
            
            <div class="link-tabs">
                <ul class="menu-tab">
                    <li>
                        <a href="#!" class="link-tab" data-tab="0" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Sistemas numéricos">Sistemas numéricos</a>
                    </li>
                    <li>
                        <a href="#!" class="link-tab" data-tab="1" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Lógica y circuitos">Lógica y circuitos</a>
                    </li>
                    <li>
                        <a href="#!" class="link-tab" data-tab="2" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Conjuntos">Conjuntos</a>
                    </li>
                    <li>
                        <a href="#!" class="link-tab" data-tab="3" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Análisis numérico">Análisis numérico</a>
                    </li>
                    <li>
                        <a href="#!" class="link-tab" data-tab="4" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Álgebra lineal">Álgebra lineal</a>
                    </li>
                    <li>
                        <a href="#!" class="link-tab" data-tab="5" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Criptografía">Criptografía</a>
                    </li>
                    <li>
                        <a href="#!" class="link-tab" data-tab="6" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Simulaciones">Simulaciones</a>
                    </li>
                </ul>
            </div>
        
            <div class="tabs">
                <!-- Sistemas numéricos -->
                <?php include "operations/numerical-systems.php" ?>
                
                <!-- Lógica proposicional y de circuitos -->
                <?php include "operations/logic.php" ?>
                
                <!-- Conjuntos -->
                <?php include "operations/sets.php" ?>
                
                <!-- Análisis numérico -->
                <?php include "operations/numerical-analysis.php" ?>
                
                <!-- Álgebra lineal -->
                <?php include "operations/algebra.php" ?>

                <!-- Criptografía -->
                <?php include "operations/cryptography.php" ?>

                <!-- Simulaciones -->
                <?php include "operations/simulations.php" ?>
            </div>
        </div>

        <br>
        <br>

    <?php include "template/footer.php" ?>

        <script src="../../public/assets/js/models/arrays-model.js"></script>
        <script src="../../public/assets/js/models/numerics-model.js"></script>
        <script src="../../public/assets/js/models/sets-model.js"></script>
        
        <script src="../../public/assets/js/controllers/numerics-controller.js"></script>
        <script src="../../public/assets/js/controllers/logic-controller.js"></script>
        <script src="../../public/assets/js/controllers/sets-controllers.js"></script>
        <script src="../../public/assets/js/controllers/matrix-controller.js"></script> 
        <script src="../../public/assets/js/controllers/cryptography-controller.js"></script> 
        <script src="../../public/assets/js/controllers/simulation-controller.js"></script> 

        <script>
            let objArray = new Arrays();
            let objNumeric = new Numerics();
            let objSet = new Sets();


            /**
             * Scripts para las pestañas (tab)
             */
            let $tagsA = document.querySelectorAll('.link-tab');
            $tagsA.forEach ((element) => {
                element.addEventListener('click', () => {
                    tabOpenClose(element.dataset.tab);
                });
            });
            

            function tabOpenClose(tab)
            {
                let $classTab = document.querySelectorAll('.content-tab');
                $classTab.forEach ((element, index) => {
                    if (index === parseInt(tab)) {
                        element.style.display = 'block';
                        $tagsA[index].style.color = '#0d6efd';
                    } else {
                        element.style.display = 'none';
                        $tagsA[index].style.color = '#444';
                    }
                });
            }

            // ************************************
        </script>

