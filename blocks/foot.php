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
                    <div class="grey-text text-lighten-4 right">v.0.0.1 Beta</div>
                </div>
            </div>
            <div id="scrollup" style="display: block; opacity: 1;">
                <i class="Small material-icons black-text">keyboard_arrow_up</i>
                <span class="hide-on-small-only hide-on-med-only" style="
                margin: 0px 5px 0 6px;
                display: block;
                float: right;
                color: #252525;
                font-weight: bold;
                ">Вверх</span>
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
        
        window.onload = function() { 
            var scrollUp = document.getElementById('scrollup');
            scrollUp.onmouseover = function() {
                scrollUp.style.opacity=0.3;
                scrollUp.style.filter  = 'alpha(opacity=30)';
            };
            scrollUp.onmouseout = function() {
                scrollUp.style.opacity = 0.5;
                scrollUp.style.filter  = 'alpha(opacity=50)';
            };
            scrollUp.onclick = function() {
                window.scrollTo(0,0);
            };
            window.onscroll = function () {
                if ( window.pageYOffset > 0 ) {
                    scrollUp.style.display = 'block';
                } else {
                    scrollUp.style.display = 'none';
                }
            };
        };
        
        $(document).ready(function () {
            $("div").last().remove();
        });
        
        <?= $script ?>
        </script>
    </body>
</html>