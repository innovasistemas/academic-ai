<?php include "template/header.php" ?>

        <?php include "template/menu.php" ?>
        
        <div class="wrapper">
            <div class="hero">
                <div class="row">
                    <div class="large-12 columns">
                        <h1>
                            <img src="../../assets/images/maths.png" style="width: 50px; height: 50px;" />
                            Aplicaciones Matemáticas
                        </h1> 
                        <!-- <h1 class="text-secondary">Aplicaciones Matemáticas</h1> -->
                    </div>
                </div>
            </div>
            
            <div class="link-tabs">
                <ul class="menu-tab">
                    <li>
                        <a href="#!" class="link-tab" data-tab="0">Sistemas numéricos</a>
                    </li>
                    <li>
                        <a href="#!" class="link-tab" data-tab="1">Lógica y circuitos</a>
                    </li>
                    <li>
                        <a href="#!" class="link-tab" data-tab="2">Conjuntos</a>
                    </li>
                    <li>
                        <a href="#!" class="link-tab" data-tab="3">Análisis numérico</a>
                    </li>
                    <li>
                        <a href="#!" class="link-tab" data-tab="4">Álgebra lineal</a>
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
            </div>
        </div>

    <?php include "template/footer.php" ?>

        <script src="../../assets/js/models/arrays-model.js"></script>
        <script src="../../assets/js/models/numerics-model.js"></script>
        <script src="../../assets/js/models/sets-model.js"></script>
        
        <script src="../../assets/js/controllers/numerics-controller.js"></script>
        <script src="../../assets/js/controllers/logic-controller.js"></script>
        <script src="../../assets/js/controllers/sets-controllers.js"></script>
        <script src="../../assets/js/controllers/matrix-controller.js"></script> 

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

