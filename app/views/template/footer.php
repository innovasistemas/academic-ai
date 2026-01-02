        <footer id="app-footer" class="py-4 bg-dark text-white-50">
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
                    <div class="col-xs-2 col-md-4 col-sm-4">
                        <small class="text-right">Copyleft &#x1F12F; {{year}} - Innovasistemas</small>
                    </div>
                </div>
            </div>
        </footer>
        
        <script src="../../public/assets/js/globals.js"></script>

        <script>
            var app = new Vue({
                el: '#app-footer',
                data: {
                    year: year,
                }
            })
        </script>

    </body>
</html>