<?php include "template/header.php" ?>

        <?php include "template/menu.php" ?>
        
        <div id="app" class="hero">
            <div class="col-12">
                <hr>
                <h1 class="h1">
                    <img :src="iconPage" v-bind:alt="alternateText" :height="height" :width="width" class="rounded" />
                    {{titlePage}} 
                </h1> 
                <hr>
            </div>
        </div>
        
        <div id="app-container" class="container">
            <div class="m-4">
                <div class="row">
                    <div class="col-4">
                        <img :src="logoU" v-bind:alt="alternateText" :height="height" :width="width" class-="w-50">
                    </div>
                    <div class="col-5">
                        <h2 class="text-center text-success">{{subTitle}}</h2>
                        <h6 class="text-center"><small>{{teacher}}</small></h6>
                        <h4 class="text-center text-primary">{{legend}}</h4>
                    </div>
                    <div class="col-3">
                        <h4 class="text-center">Autor</h4>
                        <h6 class="text-center">{{author}}</h6>
                    </div>
                </div>
                <div class="row">&nbsp;</div>
                <div>
                    <h6 class="text-center">
                        Concéntrate, escoge tu deporte formativo favorito que tienen inscripción permanente y gana premios 
                        acertando más parejas
                    </h6>
                </div>
                <hr>
                <div class="row">
                    <div class="col">
                        <label for="" class="h4">Total deportes: </label>
                        <label for="" class="h4 text-primary fw-bold" id="lbl-total"></label>
                    </div>
                    <div class="col">
                        <button id="btn-show-alls" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#div-modal">
                            Ver deportes
                        </button>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col">
                        <label for="" class="h4">Intentos: </label>
                        <label for="" class="h4 text-danger fw-bold" id="lbl-attempt">0</label> 
                    </div>    
                    <div class="col">
                        <label for="" class="h4">Aciertos: </label>
                        <label for="" class="h4 text-success fw-bold" id="lbl-guess">0</label> 
                    </div>    
                </div>
                <hr>
                <div id="div-cards"></div>
            </div>
        
            <div id="div-modal" class="modal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Deportes formativos</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>
                            <img :src="alls" class="w-100" alt="alls">
                        </p>
                    </div>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include "modals/modal-confirm.php" ?> 

    <?php include "template/footer.php" ?>

    <script>
        var app = new Vue({
            el: '#app',
            data: {
                titlePage: 'Concéntrese',
                iconPage: `${routeAssets}/images/memory.png`,
                alternateText: titlePage,
                height: '40',
                width: '40'
            }
        });

        app = new Vue({
            el: '#app-container',
            data: {
                subTitle: 'Vivamos la Universidad',
                teacher: '(LEIDY JOHANA QUINTERO MARTÍNEZ)',
                author: author,
                legend: 'Concéntrese con Bienestar Universitario',
                logoU: `${routeAssets}/images/images-memory/logo.png`,
                alls: `${routeAssets}/images/images-memory/alls.png`,
                alternateText: 'UdeA',
                height: '70',
                width: '150'
            }
        });
    </script>

    <script src="../../public/assets/js/controllers/memory-controller.js"></script>
