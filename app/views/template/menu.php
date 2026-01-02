    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background: #2a5d84 !important;">
        <div id="app-menu" class="container-fluid">
            <a class="navbar-brand text-white" href="index.php" title="Academic AI" data-bs-toggle="tooltip" data-bs-placement="bottom">
                <img :src="iconPage" v-bind:alt="alternateText" :height="height" :width="width" />
                {{titlePage}}
            </a>
            <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 active-option">
                    <li class="nav-item">
                        <a class="nav-link text-white active" aria-current="page" href="mathematical-applications.php" title="Aplicaciones" data-bs-toggle="tooltip" data-bs-placement="bottom">Aplicaciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="questions.php" title="Preguntas" data-bs-toggle="tooltip" data-bs-placement="bottom">Preguntas</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link text-white dropdown-toggle" href="academic.php" id="navbarDropdown1" role="button" data-bs-toggle="dropdown" aria-expanded="false" title="Académico">
                            Académico
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="documents.php" title="Documentos" data-bs-toggle="tooltip" data-bs-placement="bottom">Documentos</a></li>
                            <li><a class="dropdown-item" href="examples.php" title="Ejemplos" data-bs-toggle="tooltip" data-bs-placement="bottom">Ejemplos</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link text-white dropdown-toggle" href="help.php" id="navbarDropdown2" role="button" data-bs-toggle="dropdown" aria-expanded="false" title="Ayuda">
                            Ayuda
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="documentation.php" title="Documentación" data-bs-toggle="tooltip" data-bs-placement="bottom">Documentación</a></li>
                            <li><a class="dropdown-item" href="about.php" title="Acerca de" data-bs-toggle="tooltip" data-bs-placement="bottom">Acerca de</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-1" type="search" placeholder="Buscar" aria-label="Search">
                    <button class="btn btn-outline-info" type="submit" title="Buscar" data-bs-toggle="tooltip" data-bs-placement="bottom">Buscar</button>
                </form>
                &nbsp;
                <a class="text-white" href="#">Es</a>
                &nbsp;
                <a class="text-white" href="../Classes/Translation.php">En</a>
            </div>
        </div>
    </nav>

    <script>
        var app = new Vue({
            el: '#app-menu',
            data: {
                titlePage: titlePage,
                iconPage: iconPage,
                alternateText: titlePage,
                height: '40',
                width: '40'
            }
        })
    </script>
