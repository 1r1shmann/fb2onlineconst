<!DOCTYPE html>
<html>
    <head>
        <title>ТЕСТ</title>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
        <header>
            <nav class="blue darken-3" role="navigation">
                <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo"><img style="responsive-img" src="images/style/logo.png" ></a>
                    <ul class="right hide-on-med-and-down">
                      <li><a href="index.php">На главную</a></li>
                    </ul>

                    <ul id="nav-mobile" class="sidenav">
                      <li><a href="index.php">На главную</a></li>
                    </ul>
                    <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                </div>
            </nav>
        </header>
        <main>
            <div class="container">
            <div class="row">
                <div class="input-field col l4 s12 m6">
                    <input value="" id="author" type="text" class="validate">
                    <label for="author">Автор</label>
                </div>
                <div class="input-field col l8 s12 m6">
                    <input value="" id="first_name2" type="text" class="validate">
                    <label class="active" for="first_name2">Название</label>
                </div>
            </div>
                
                <br>
                <br>
                <div class="input-field col s12">
                    <select>
                        <option value="" disabled selected>Choose your option</option>
                        <option value="1">Option 1</option>
                        <option value="2">Option 2</option>
                        <option value="3">Option 3</option>
                    </select>
                    <label>Materialize Select</label>
                </div>
                <br>
                <br>
            </div>
        </main>
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
        </footer>
        <!--JavaScript at end of body for optimized loading-->
        <script type="text/javascript" src="js/jquery-3.4.0.min.js"></script>
        <script type="text/javascript" src="js/materialize.min.js"></script>
        <script type="text/javascript">
        $(document).ready(function(){
            $('.sidenav').sidenav();
            $('select').formSelect();
        });
        
        </script>
    </body>
</html>