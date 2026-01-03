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
                button: 'list-program',
                element: '',
            }; 
            let params = {
                headers: {"Content-Type": "application/json; charset=utf-8"},
                body: JSON.stringify(objJson),
                method: 'POST'
            };

            fetch(arrayLinks[3], params)
                .then(data => {return data.json()})
                .then(response => {
                    listExamples(response);
                })
                .catch(err => {
                    divResultFiles.innerHTML = "Hay problemas con la petición";
                });

            
            function listExamples(response, dir = '', titleTable = 'Lenguajes de programación')
            {
                let arrayFiles = response.listFiles.split(',')
                arrayFiles.pop();
                let icon;
                let ctd = 0;
                let table = `<table class="table table-hover table-white table-bordered">`;
                table += `<thead>`;
                table += `<tr><th colspan="5">${titleTable}</th></tr><tr>`;
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
                    if (objJson.element === '') {
                        table += `
                            <td>
                                <a href="#!" onclick="listPrograms(\'${element}\')" class="hover">
                                    <img src="${routeAssets}/images/${icon}" height="35" width="35" alt="${element}" />
                                    ${element}
                                </a>
                            </td>
                        `;
                    } else {
                        table += `
                            <td>
                                <a href="${routeAssets}/examples/${dir}/${element}" target="_blank" class="hover">
                                    <img src="${routeAssets}/images/${icon}" height="35" width="35" alt="${element}" />
                                    ${element}
                                </a>
                            </td>
                        `;
                    }
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
            }


            function listPrograms(dir)
            {
                objJson['element'] = dir;
                params.body = JSON.stringify(objJson);
                fetch(arrayLinks[3], params)
                    .then(data => {return data.json()})
                    .then(response => {
                        let titleTable = `
                            <a href="#!" onclick="listFolders()" class="text-primary" title="Regresar" style="font-size: 2.5em; text-decoration: none;">
                                &#8592;
                            </a>
                            Programas en ${dir}
                        `;
                        listExamples(response, dir, titleTable);
                    })
                    .catch(err => {
                        divResultFiles.innerHTML = "Hay problemas con la petición";
                    });
            }


            function listFolders()
            {
                objJson['element'] = '';
                params.body = JSON.stringify(objJson);
                fetch(arrayLinks[3], params)
                    .then(data => {return data.json()})
                    .then(response => {
                        listExamples(response);
                    })
                    .catch(err => {
                        divResultFiles.innerHTML = "Hay problemas con la petición";
                    });
            }
        </script>
