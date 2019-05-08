<?php
    $str_title = "Главная";
    require_once 'blocks/head.php';
    require_once 'blocks/navbar.php';
?>
        <main>
            <div class="container">
                <form action="#" method="post">
                    <div class="row">
                        <div class="input-field col l4 m4 s12">
                            <input value="" id="first_name" type="text" class="validate" name="first_name">
                            <label for="first_name">Автор *</label>
                        </div>
                        <div class="input-field col l8 m8 s12">
                            <input value="" id="book_name" type="text" class="validate" name="book_name">
                            <label for="book_name">Название книги *</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col l3 m6 s12">
                            <select multiple name="genre[]">
                                <option value="" disabled selected>Жанр *</option>
                                <option value="Action">Action</option>
                                <option value="Adventure">Adventure</option>
                                <option value="Angst">Angst</option>
                                <option value="AU">AU</option>
                                <option value="Comedy">Comedy</option>
                                <option value="Crossover">Crossover</option>
                                <option value="Darkfic">Darkfic</option>
                                <option value="Deathfic">Deathfic</option>
                                <option value="Detective">Detective</option>
                                <option value="Drabble">Drabble</option>
                                <option value="Drama">Drama</option>
                                <option value="Fairy-tale">Fairy-tale</option>
                                <option value="Fantasy">Fantasy</option>
                                <option value="First time">First time</option>
                                <option value="Fluff">Fluff</option>
                                <option value="General">General</option>
                                <option value="History">History</option>
                                <option value="Horror">Horror</option>
                                <option value="Humor">Humor</option>
                                <option value="Hurt/comfort">Hurt/comfort</option>
                                <option value="Missing scene">Missing scene</option>
                                <option value="Mysticism">Mysticism</option>
                                <option value="Parody">Parody</option>
                                <option value="POV">POV</option>
                                <option value="Pre-Slash">Pre-Slash</option>
                                <option value="PWP">PWP</option>
                                <option value="Romance">Romance</option>
                                <option value="Science Fiction">Science Fiction</option>
                                <option value="Sidestory">Sidestory</option>
                                <option value="Songfic">Songfic</option>
                                <option value="Thriller">Thriller</option>
                                <option value="Омегаверс">Омегаверс</option>
                            </select>
                        </div>
                        <div class="input-field col l3 m6 s12">
                            <select multiple name='lang[]'>
                                <option value="" disabled selected>Язык *</option>
                                <option value="ru">Русский</option>
                                <option value="ua">Украинский</option>
                                <option value="en">Английский</option>
                                <option value="de">Немецкий</option>
                            </select>
                        </div>
                        <div class="input-field col l3 m6 s12">
                            <select multiple name='rating[]'>
                                <option value="" disabled selected>Возраст (RARS) *</option>
                                <option value="1">Option 1</option>
                                <option value="2">Option 2</option>
                                <option value="3">Option 3</option>
                            </select>
                        </div>
                        <div class="input-field col l3 m6 s12">
                            <select multiple name='status[]'>
                                <option value="" disabled selected>Статус *</option>
                                <option value="Закончен">Закончен</option>
                                <option value="В процессе">В процессе</option>
                                <option value="Заморожен">Заморожен</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input value="" id="additional" type="text" class="validate" name="additional">
                            <label for="additional">Дополнительные сведения</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea id="annotation" class="materialize-textarea" data-length="500" name="annotation"></textarea>
                            <label for="annotation">Аннотация *</label>
                        </div>
                    </div>
                    <div id="charters">
                        <div class="card-panel">
                            <div class="row">
                                <div class="col s12">
                                    <div class="input-field">
                                        <input type="number" class="validate" id="charters_count" value="">
                                        <label for="charters_count">Кол-во разделов * **</label>
                                    </div>
                                </div>
                                <div class="col s12 center-align">
                                    <button class="btn waves-effect waves-light blue darken-3" id="start">Начать
                                        <i class="material-icons right">play_for_work</i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <p>* Поля обязательные для заполнения.</p>
                            <p>** Включая разделы введение, предисловие, пролог, заключение, эпилог, послесловие и др.</p>
                            <p></p>
                        </div>
                    </div>
                </form>
            </div>
            <script type="text/javascript">
            
            </script>
        </main>
<?php
$script = '
        $(document).on("click", "#start", function(event){
            event.preventDefault();
            var count = $("#charters_count").val();
            count = (count == "") ? 1: count;
            $("#charters").html("");
            var i = 1;
            while(i <= count){

                $("#charters").append(\'<div data-id=\"\'+i+\'\" class=\"row\">\n\
                    <div class=\"input-field col s12\">\n\
                    <input value=\"\" id=\"charter_title_\'+i+\'\" type=\"text\" class=\"validate\" name=\"charter_title[]\">\n\
                    <label for=\"charter_title_\'+i+\'\">Название раздела №\'+i+\' *</label>\n\
                    </div>\n\
                    <div class=\"input-field col s12\">\n\
                    <textarea id=\"charter_contents_\'+i+\'\" class=\"materialize-textarea\" name=\"charter_contents[]\"></textarea>\n\
                    <label for=\"charter_contents_\'+i+\'\">Содержание раздела №\'+i+\' *</label>\n\
                    </div>\n\
                    </div>\n\
                \');
                i++;
            };
            $("#charters").after("<button class=\"btn btn-large waves-effect waves-light blue darken-3\" type=\"submit\" name=\"action\">Построить FB2</button>\n\
                <a href=\"#\" class=\"btn-floating btn-large waves-effect waves-light right red accent-4\" id=\"add_charter\">\n\
                <i class=\"material-icons\">add</i>\n\
                </a>\n\
            ");
        });
        
        $(document).on("click", "#add_charter", function(event){
            event.preventDefault();
            var last_id = $("#charters").children().last().data("id");
            last_id++;
            $("#charters").append(\'<div data-id=\"\'+last_id+\'\" class=\"row\">\n\
                <div class=\"input-field col s12\">\n\
                <input value=\"\" id=\"charter_title_\'+last_id+\'\" type=\"text\" class=\"validate\" name=\"charter_title[]\">\n\
                <label for=\"charter_title_\'+last_id+\'\">Название раздела №\'+last_id+\' *</label>\n\
                </div>\n\
                <div class=\"input-field col s12\">\n\
                <textarea id=\"charter_contents_\'+last_id+\'\" class=\"materialize-textarea\" name=\"charter_contents[]\"></textarea>\n\
                <label for=\"charter_contents_\'+last_id+\'\">Содержание раздела №\'+last_id+\' *</label>\n\
                </div>\n\
                </div>\n\
            \');
        });
';
    require_once 'blocks/foot.php';
?>