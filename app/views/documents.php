<?php include "template/header.php" ?>

        <?php include "template/menu.php" ?>
        
        <div class="hero">
            <div class="col-12">
                <hr>
                <h1 class="h1">
                    <img src="../../public/assets/images/pdf-icon.png" height="40" width="40" alt="Academic AI" />
                    Documentos
                </h1> 
                <hr>
            </div>
        </div>

        <div class="row container">
            <div class="col-12">
                <p>
                    Los siguientes documentos están disponibles para su descarga. Corresponden a las notas 
                    de clase que tratan distintas temáticas: Programación, matemáticas e ingeniería de 
                    software, entre otros.
                </p>

                <div class="row">
                    <div class="col-1">&nbsp;</div>
                    <div id="div-result-files" class="col-10 table-responsive"></div>
                    <div class="col-1">&nbsp;</div>
                </div>
            </div>
        </div>

        <br>
        <br>


        <?php include "template/footer.php" ?>
        
        <script>
            let ctd = 0;
            let divResultFiles = document.querySelector('#div-result-files');
            let objJson = {
                button: 'list'
            }; 
            let params = {
                headers: {"Content-Type": "application/json; charset=utf-8"},
                body: JSON.stringify(objJson),
                method: 'POST'
            };
            fetch(arrayLinks[3], params)
                .then(data => {return data.json()})
                .then(response => {
                    // Pendiente implementar
                    // window.location = `temp/${response.view}`;
                    let arrayFiles = response.listFiles.split(',')
                    arrayFiles.pop();
                    let table = `<table class="table table-hover table-white table-bordered">`;
                    table += `<thead>`;
                    table += `<tr><th colspan="5">Documentos</th></tr><tr>`;
                    table += `</thead>`;
                    table += `<tbody>`;
                    arrayFiles.forEach((element) => {
                        if (ctd > 2 ) {
                            ctd = 0;
                            table += `</tr>`;
                            table += `<tr>`;
                        } 
                        table += `
                            <td>
                                <a href="../../public/assets/docs/${element}" target="_blank">
                                    <img src="../../public/assets/images/pdf-icon.png" height="25" width="15" alt="${element}" />
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
        
    
