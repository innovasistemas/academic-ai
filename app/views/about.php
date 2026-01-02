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
                <div class="col-12 table-responsive">
                    <table class="table table-hover table-light">
                        <tr>
                            <th>Temática</th>
                            <td>Académico - investigación</td>
                        </tr>
                        <tr>
                            <th>Áreas</th>
                            <td>Informática - Matemáticas - Ciencias naturales - Ingeniería</td>
                        </tr>
                        <tr>
                            <th>Tipo de software</th>
                            <td>Página / aplicación web</td>
                        </tr>
                        <tr>
                            <th>Desarrollado en</th>
                            <td>PHP - Javascript - C# - CSS Bootstrap - HTML5</td>
                        </tr>
                        <tr>
                            <th>Framework</th>
                            <td>Academic-AI</td>
                        </tr>
                        <tr>
                            <th>Servidor web</th>
                            <td>Apache - ASP.NET</td>
                        </tr>
                        <tr>
                            <th>Base de datos</th>
                            <td>MySQL / MariaDB</td>
                        </tr>
                        <tr>
                            <th>Entorno desarrollo</th>
                            <td>Windows / Linux / Laragon</td>
                        </tr>
                        <tr>
                            <th>Host</th>
                            <td>http://localhost/ - http://localhost:5259/</td>
                        </tr>
                        <tr>
                            <th>Dominio web - webservices</th>
                            <td>http://localhost/academic-ai - http://localhost:5259/</td>
                        </tr>
                        <tr>
                            <th>Licencia</th>
                            <td><a href="https://www.gnu.org/licenses/gpl-3.0.txt" target="_blank">GPL (v3)</a></td>
                        </tr>
                        <tr>
                            <th>Versión</th>
                            <td>1.0</td>
                        </tr>
                        <tr>
                            <th>Iconos</th>
                            <td><a href="https://www.flaticon.es" target="_blank">Flaticon</a></td>
                        </tr>
                        <tr>
                            <th>Desarrollado por</th>
                            <td class="text-info">Jaime Montoya</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

    <?php include "template/footer.php" ?>

    <script>
        var app = new Vue({
            el: '#app',
            data: {
                titlePage: 'Acerca de',
                iconPage: iconPage,
                alternateText: titlePage,
                height: '40',
                width: '40'
            }
        })
    </script>
