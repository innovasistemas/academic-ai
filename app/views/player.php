<?php include "template/header.php" ?>

        <?php include "template/menu.php" ?>
        
        <div id="app" class="hero">
            <div class="col-12">
                <hr>
                <h1 class="h1">
                    <img :src="iconPage" v-bind:alt="alternateText" :height="height" :width="width" class="rounded"/>
                    <span v-text="titlePage"></span>
                </h1> 
                <hr>
            </div>
        </div>
        
        <div id="app-container" class="container">
            <div class="row">
                <div class="col-3">
                    <h4 class="text-center bg-light border rounded">Canciones</h4>
                    <p class="text-center">
                        <button class="btn btn-dark" id="btn-previous" title="Anterior"><i class="bi bi-rewind-fill"></i></button>
                        <button class="btn btn-dark" id="btn-play-pause" title="Reproductir/Pausar"><i class="bi bi-play-fill"></i></button>
                        <button class="btn btn-dark" id="btn-next" title="Siguiente"><i class="bi bi-fast-forward-fill"></i></button>
                    </p>
                    <div id="div-list" class="bg-light border rounded" style="height: 200px; min-height: 150px; overflow: auto;"></div>
                    <div id="div-records" class="bg-light border rounded"></div>
                </div>
                <div class="col-6" style-="height: 200px !important; max-height: 200px;">
                    <audio id="audio-player" controls>
                        El navegador no soporta el elemento de audio.
                    </audio>    
                </div>
                <div class="col-3">

                </div>
            </div>
            <div class="row">&nbsp;</div>
        </div>

        <?php include "modals/modal-confirm.php" ?> 

    <?php include "template/footer.php" ?>

    <script>
        var app = new Vue({
            el: '#app',
            data: {
                titlePage: 'Reproductor de música',
                iconPage: `${routeAssets}/images/player.png`,
                alternateText: titlePage,
                height: '40',
                width: '40'
            }
        });

        app = new Vue({
            el: '#app-container',
            data: {
                
            }
        });
    </script>

    <script src="../../public/assets/js/controllers/player-controller.js"></script>
