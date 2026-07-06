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
                    <h5 class="text-center h5 bg-info border border-light rounded-3">Canciones</h5>
                    <div id="div-list" class="bg-light border rounded-3" style="height: 250px; min-height: 150px; overflow: auto;"></div>
                    <div id="div-records" class="bg-light border rounded-3">
                        <small class="text-secondary">
                            Canción: <span id="small-records" class="text-info"></span>
                        </small>
                    </div>
                    
                </div>
                <div class="col-6">
                    <p>&nbsp;</p>
                    <div class="card align-items-center shadow-sm p-3">
                        <audio id="audio-player" controls class="w-100">
                            El navegador no soporta el elemento de audio.
                        </audio>
                    </div>
                    <br>
                    <p class="text-center shadow-sm">
                        <button class="btn btn-sm btn-info rounded-circle" id="btn-previous" title="Anterior"><i class="bi bi-rewind-fill"></i></button>
                        <button class="btn btn-sm btn-info rounded-circle" id="btn-play-pause" title="Reproductir/Pausar"><i class="bi bi-play-fill"></i></button>
                        <button class="btn btn-sm btn-info rounded-circle" id="btn-next" title="Siguiente"><i class="bi bi-fast-forward-fill"></i></button>
                        <button class="btn btn-sm btn-dark" id="btn-repeat" title="Repetir"><i class="bi bi-repeat"></i></button>
                        <button class="btn btn-sm btn-dark" id="btn-shuffle" title="Aleatorio"><i class="bi bi-shuffle"></i></button>
                        <button class="btn btn-sm btn-dark" id="btn-volume" title="Escuchar/Silenciar"><i class="bi bi-volume-down-fill"></i></button>
                    </p>
                    <p class="text-center">
                        <input type="range" id="rng-volume" class="form-range" min="0" max="1" step="0.1" value="1" title="Volumen">
                    </p>
                </div>
                <div class="col-3">
                    <div id="div-information" class="bg-light border rounded-3 w-25-" style="width: 200px;">
                        <h6 class="h6 text-center bg-info border border-light rounded-3 w-50-">Información</h6>
                        <small>Canción N°:</small> <small id="inf-song" class="text-info"></small>
                        <br>
                        <small>Título:</small> <small id="inf-title" class="text-info"></small>
                        <br>
                        <small>Álbum</small>: <small id="inf-album" class="text-info"></small>
                        <br>
                        <small>Autor:</small> <small id="inf-author" class="text-info"></small>
                        <br>
                        <small>Duración:</small> <small id="inf-duration" class="text-info"></small>
                    </div>
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
