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
                <div class="col">
                    
                </div>
                <div class="col">
                </div>
                <div class="col">
                </div>
                <div class="col">
                </div>
            </div>
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col">
                    <div id="div-" class="border border-secondary rounded"></div>
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
                titlePage: 'Triqui',
                iconPage: `${routeAssets}/images/triqui.png`,
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

    <!-- <script src="../../public/assets/js/controllers/flag-controller.js"></script> -->
