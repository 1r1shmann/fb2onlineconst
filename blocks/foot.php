        <footer class="page-footer blue darken-3">
            <div class="container">
                <div class="row">
                    <div class="col l6 s12">
                        <h5 class="white-text">Footer Content</h5>
                        <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
                    </div>
                    <div class="col l4 offset-l2 s12">
                        <h5 class="white-text">Links</h5>
                        <ul>
                            <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                            <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                            <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                            <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="container">
                    © 2019 Copyright Text
                    <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
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
        
        <?= $script ?>
        </script>
    </body>
</html>