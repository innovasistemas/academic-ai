<!DOCTYPE html>
<html lang="es">
    <head>
        <title id="app-title">{{titlePage}}</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Investigación: ciencia y tecnología">
        <meta http-equiv="refresh" content="">
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

        <link id="app-favicon" type="image/png" rel="shortcut icon" :href="iconPage" />

        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link type="text/css" rel="stylesheet" href="../../public/assets/css/customize.css" />

        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    </head>

    <body>

        <script>
            let titlePage = 'Academic AI';
            let iconPage = '../../public/favicon.png';

            var app = new Vue({
                el: '#app-title',
                data: {
                    titlePage: titlePage,
                }
            });

            var app = new Vue({
                el: '#app-favicon',
                data: {
                    iconPage: iconPage,
                    alternateText: titlePage,
                    height: '40',
                    width: '40'
                }
            })
        </script>