        <footer class="page-footer blue darken-3">
            <div class="container">
                <div class="row">
                    <div class="col s12">
                        <h5 class="white-text">FB2CONST by Irishmann</h5>
                        <p class="grey-text text-lighten-4"></p>
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="container">
                    
                    © <?= date("Y") ?> Irishmann
                    <div class="grey-text text-lighten-4 right">v.0.0.2 Beta</div>
                </div>
            </div>
        </footer>
        <!--JavaScript at end of body for optimized loading-->
        <script type="text/javascript" src="js/jquery-3.4.0.min.js"></script>
        <script type="text/javascript" src="js/materialize.min.js"></script>
        <script type="text/javascript">
        $(document).ready(function(){
            $('.sidenav').sidenav();
            $('select').formSelect();
            $('textarea').characterCounter();
        });
                
        <?= $script ?>
        </script>
    </body>
</html>
