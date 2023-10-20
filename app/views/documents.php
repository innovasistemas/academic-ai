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
                    let table = "<table><tr><th>Documento</th></tr>";
                    arrayFiles.forEach((element) => {
                        table += `
                            <tr>
                                <td>
                                    <a href="../../assets/docs/${element}" target="_blank">
                                        <img src="../../assets/images/pdf-icon.png" style="width: 15px; height: 25px;" />
                                        ${element}
                                    </a>
                                </td>
                            </tr>`;
                    });
                    table += "</table>";
                    divResultFiles.innerHTML = table;
                })
                .catch(err => {
                    divResultFiles.innerHTML = "Hay problemas con la petición";
                });
        </script>
        
    
