<?php include "../../Config/Config.php" ?>
<?php include "../template/header.php" ?>

<link type="image/png" rel="shortcut icon" href="../../../favicon.png" />
<link type="text/css" rel="stylesheet" href="../../../assets/css/customize.css" />

    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background: #2a5d84 !important;">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="<?= $config['url']['name'] ?>" title="<?= $config['global']['title'] ?>">
                <img src="../../../favicon.png" height="40" width="40" alt="<?= $config['global']['title'] ?>" />
                <?= $config['global']['title'] ?>
            </a>
            <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
        
    <div class="hero">
        <div class="col-12">
            <hr>
            <h1 class="h1 text-center">
                <img src="../../../assets/images/404.png" height="40" width="40" alt="Error 404" />
                Error 404
            </h1> 
            <hr>
        </div>
    </div>

    <div class="container">
        <div class="row text-center">
            <div class="col-12">
                <br>
                <h2 class="h2 text-danger">Error 404 - Página no encontrada</h2>
                <br>
                <img src="../../../assets/images/404.png" height="140" width="140" alt="Error 404 - Página no encontrada" />
                <br>
                <br>
                <p style="font-size: 1.2em">
                    Lo sentimos, la página solicitada no existe.
                    <br>
                    Puede regresar al inicio con el siguiente botón o desde el logo 
                    principal. Revise que la URL en la barra de direcciones sea correcta.
                    Si el problema persiste, comuníquese con nosotros.
                </p>
            </div>
            <div class="col-12">
                <br>
                <a class="btn btn-primary" href="<?= $config['url']['name'] ?>" title="<?= $config['global']['title'] ?>">
                    Regresar
                </a>
            </div>
        </div>
    </div>

    <br>
    <br>
    <br>

    <?php include "../template/footer.php" ?>
