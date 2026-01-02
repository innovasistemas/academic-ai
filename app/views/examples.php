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
                        <div class="col-1">&nbsp;</div>
                        <div id="div-result-files" class="col-10 table-responsive"></div>
                        <div class="col-1">&nbsp;</div>
                    </div>
                </div>
            </div>
        </div>

        <?php include "template/footer.php" ?>

        <script>
            var app = new Vue({
                el: '#app',
                data: {
                    titlePage: 'Ejemplos',
                    iconPage: `${routeAssets}/images/programming-icon.png`,
                    alternateText: titlePage,
                    height: '40',
                    width: '40'
                }
            });
       
            let divResultFiles = document.querySelector('#div-result-files');
            let objJson = {
                button: 'list-program'
            }; 
            let params = {
                headers: {"Content-Type": "application/json; charset=utf-8"},
                body: JSON.stringify(objJson),
                method: 'POST'
            };
            fetch(arrayLinks[3], params)
                .then(data => {return data.json()})
                .then(response => {
                    let arrayFiles = response.listFiles.split(',')
                    arrayFiles.pop();
                    let icon;
                    let ctd = 0;
                    let table = `<table class="table table-hover table-white table-bordered">`;
                    table += `<thead>`;
                    table += `<tr><th colspan="5">Programas</th></tr><tr>`;
                    table += `</thead>`;
                    table += `<tbody>`;
                    arrayFiles.forEach((element) => {
                        if (element.indexOf(".py", 0) > -1) {
                            icon = 'python-icon.png';
                        } else if (element.indexOf( ".cpp", 0) > -1) {
                            icon = 'c-icon.png';
                        } else if (element.indexOf( ".psc", 0) > -1) {
                            icon = 'pseint-icon.png';
                        } else if (element.indexOf( ".php", 0) > -1) {
                            icon = 'php-icon.png';
                        } else {
                            icon = 'folder-icon.png';
                        }
                        
                        if (ctd > 4 ) {
                            ctd = 0;
                            table += `</tr>`;
                            table += `<tr>`;
                        } 
                        table += `
                            <td>
                                <a href="../../public/assets/examples/${element}" target="_blank">
                                    <img src="../../public/assets/images/${icon}" height="35" width="35" alt="${element}" />
                                    ${element}
                                </a>
                            </td>
                        `;
                        ctd++;
                    });
                    table += "</tbody>";
                    table += "<tfoot>";
                    table += "</tfoot>";
                    table += "<caption>";
                    table += `Total archivos: ${arrayFiles.length}`;
                    table += "</caption>";
                    table += "</table>";
                    divResultFiles.innerHTML = table;
                })
                .catch(err => {
                    divResultFiles.innerHTML = "Hay problemas con la petición";
                });
        </script>
        
    
