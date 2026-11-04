<?php include "template/header.php" ?>

        <?php include "template/menu.php" ?>
        
        <div id="app" class="hero">
            <div class="col-12">
                <hr>
                <h1 class="h1">
                    <img :src="iconPage" v-bind:alt="alternateText" :height="height" :width="width" class="rounded" />
                    <span v-text="titlePage"></span> 
                </h1> 
                <hr>
            </div>
        </div>
        
        <div id="app-container" class="container">
            <div class="row">
                <div class="col">
                    <label for="cbo-orientation" class="fw-bold">Orientación</label>
                    <select name="cbo-orientation" id="cbo-orientation" class="form-select select">
                        <option value="vertical" selected="selected">Vertical</option>
                        <option value="horizontal">Horizontal</option>
                    </select>
                </div>
                <div class="col">
                    <label for="nbr-proportion" class="fw-bold">Proporción</label>
                    <input type="number" name="nbr-proportion" id="nbr-proportion" class="form-control" value="1" min="1">
                </div>
                <div class="col">
                    <label for="color-flag" class="fw-bold">Color</label>
                    <br>
                    <input type="color" id="color-flag" class="form-control form-control-color" value="#ffffff">
                </div>
                <div class="col">
                    <input type="button" id="btn-reset" class="btn btn-secondary" value="Restablecer">
                </div>
            </div>
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col">
                    <div id="div-flag" class="border border-secondary rounded"></div>
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
                titlePage: 'Dibuja tu bandera',
                iconPage: `${routeAssets}/images/flag.png`,
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

    <script src="../../public/assets/js/controllers/flag-controller.js"></script>
