<?php include "template/header.php" ?>

        <?php include "template/menu.php" ?>
        
        <div class="wrapper">
            <div class="hero">
                <div class="row">
                    <div class="large-12 columns">
                        <h1>
                            <img src="../../assets/images/pdf-icon.png" style="width: 50px; height: 50px;" />
                            Documentos
                        </h1> 
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="large-12- columns">
                    <p>
                        Los siguientes documentos están disponibles para su descarga. Corresponden a las notas 
                        de clase que tratan distintas temáticas: Programación, matemáticas e ingeniería de 
                        software, entre otros.
                    </p>

                    <div class="row">
                        <div class="col-1">&nbsp;</div>
                        <div id="div-result-files" class="col-10"></div>
                        <div class="col-1">&nbsp;</div>
                    </div>
                </div>
            </div>
        </div>

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
                    let arrayFiles = response.listFiles.split(',')
                    arrayFiles.pop();
                    let table = "<table style='width: 100%;'><tr><th>Documento</th></tr><tr>";
                    arrayFiles.forEach((element) => {
                        if (ctd > 2 ) {
                            ctd = 0;
                            table += `</tr>`;
                            table += `<tr>`;
                        } 
                        table += `
                            <td>
                                <a href="../../assets/docs/${element}" target="_blank">
                                    <img src="../../assets/images/pdf-icon.png" style="width: 15px; height: 25px;" />
                                    ${element}
                                </a>
                            </td>
                        `;
                        ctd++;
                    });
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
        
    
