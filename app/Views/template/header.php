<!DOCTYPE html>
<html lang="es">
    <head>
        <title id="app-title" v-text="titlePage"></title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Investigación: ciencia y tecnología">
        <meta http-equiv="refresh" content="">
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

        <link id="app-favicon" type="image/png" rel="shortcut icon" :href="iconPage" />

        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" integrity="sha384-tViUnnbYAV00FLIhhi3v/dWt3Jxw4gZQcNoSCxCIFNJVCx7/D55/wXsrNIRANwdD" crossorigin="anonymous">
        <link type="text/css" rel="stylesheet" href="../../public/assets/css/customize.css" />
        
        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <script src="../../public/assets/js/vars.js"></script>

        <script>
            var app = new Vue({
                el: '#app-title',
                data: {
                    titlePage: titlePage,
                }
            });

            app = new Vue({
                el: '#app-favicon',
                data: {
                    iconPage: iconPage,
                    alternateText: titlePage,
                    height: '40',
                    width: '40'
                }
            });
        </script>
    </head>

    <body>

        