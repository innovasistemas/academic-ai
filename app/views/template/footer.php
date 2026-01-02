        <footer class="py-4 bg-dark text-white-50">
            <div class="container">
                <div class="row">
                    <div class="col-xs-2 col-md-8 col-sm-4">
                        <ul class="list-group list-group-horizontal">
                            <li class="list-group-item">
                                <a href="https://innovasistemas.blogspot.com/" target="_blank">
                                    Blog
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="https://github.com/innovasistemas/" target="_blank">
                                    GitHub
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="https://gitlab.com/innovasistemas/" target="_blank">
                                    GitLab
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="#!">
                                    Politica de privacidad
                                </a>
                            </li> 
                        </ul>
                    </div>
                    <div id="app-year" class="col-xs-2 col-md-4 col-sm-4">
                        <small class="text-right">Copyleft &#x1F12F; {{year}} - Innovasistemas</small>
                    </div>
                </div>

            </div>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        
        <script src="../../public/assets/js/globals.js"></script>

        <script>
            let fullDate = new Date();
            let year = fullDate.getFullYear();
            var app = new Vue({
                el: '#app-year',
                data: {
                    year: year,
                }
            })
        </script>

    </body>
</html>