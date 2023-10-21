<?php include "template/header.php" ?>

        <?php include "template/menu.php" ?>
        
        <div class="wrapper">
            <div class="hero">
                <div class="row">
                    <div class="large-12 columns">
                        <h1>
                            <img src="../../assets/images/programming-icon.png" style="width: 50px; height: 50px;" />
                            Ejemplos de programación
                        </h1> 
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="large-12- columns">
                    <p>
                        Los siguientes códigos están disponibles para su descarga. 
                        Corresponden a los ejemplos desarrollados en clase y por gusto
                        en distintos lenguajes de programación:
                    </p>
                    
                    <div class="row">
                        <div class="col-1">&nbsp;</div>
                        <div class="col">
                            <ul>
                                <li>PSeInt (lógica de programación)</li>
                                <li>Python</li>
                                <li>PHP</li>
                                <li>Javascript</li>
                                <li>C/C++</li>
                            </ul>
                        </div>
                        <div class="col">&nbsp;</div>
                    </div>

                    <div class="row">
                        <div class="col">&nbsp;</div>
                        <div id="div-result-files" class="col"></div>
                        <div class="col">&nbsp;</div>
                    </div>
                </div>
            </div>
        </div>

        <?php include "template/footer.php" ?>
        
        <script>
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
                    let table = "<table><tr><th>Programa</th></tr><tr>";
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
                                <a href="../../assets/examples/${element}" target="_blank">
                                    <img src="../../assets/images/${icon}" style="width: 35px; height: 35px;" />
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
        
    
