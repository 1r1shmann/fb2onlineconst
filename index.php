<?php
    $str_title = "Главная";
    require_once 'blocks/head.php';
    require_once 'blocks/navbar.php';
?>
        <main>
            <div class="container">
                <form action="fb2.php" method="post">
                    <div class="row">
                        <div class="input-field col l4 m4 s12">
                            <input value="" id="first_name" type="text" class="validate" name="first_name">
                            <label for="first_name">Автор *</label>
                        </div>
                        <div class="input-field col l8 m8 s12">
                            <input value="" id="book_title" type="text" class="validate" name="book_title">
                            <label for="book_title">Название книги *</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col l3 m6 s12">
                            <select multiple name="genre[]">
                                <option value="" disabled selected>Жанр *</option>
                                <optgroup label="Фантастика (Научная фантастика и Фэнтези)">
                                    <option value="sf_history">Альтернативная история</option>
                                    <option value="sf_action">Боевая фантастика</option>
                                    <option value="sf_epic">Эпическая фантастика</option>
                                    <option value="sf_heroic">Героическая фантастика</option>
                                    <option value="sf_detective">Детективная фантастика</option>
                                    <option value="sf_cyberpunk">Киберпанк</option>
                                    <option value="sf_space">Космическая фантастика</option>
                                    <option value="sf_social">Социально-психологическая фантастика</option>
                                    <option value="sf_horror">Ужасы и Мистика</option>
                                    <option value="sf_humor">Юмористическая фантастика</option>
                                    <option value="sf_fantasy">Фэнтези</option>
                                    <option value="sf">Научная Фантастика</option>
                                <optgroup label="Детективы и Триллеры">
                                    <option value="det_classic">Классический детектив</option>
                                    <option value="det_police">Полицейский детектив</option>
                                    <option value="det_action">Боевик</option>
                                    <option value="det_irony">Иронический детектив</option>
                                    <option value="det_history">Исторический детектив</option>
                                    <option value="det_espionage">Шпионский детектив</option>
                                    <option value="det_crime">Криминальный детектив</option>
                                    <option value="det_political">Политический детектив</option>
                                    <option value="det_maniac">Маньяки</option>
                                    <option value="det_hard">Крутой детектив</option>
                                    <option value="thriller">Триллер</option>
                                    <option value="detective">Детектив</option>
                                <optgroup label="Проза">
                                    <option value="prose_classic">Классическая проза</option>
                                    <option value="prose_history">Историческая проза</option>
                                    <option value="prose_contemporary">Современная проза</option>
                                    <option value="prose_counter">Контркультура</option>
                                    <option value="prose_rus_classic">Русская классическая проза</option>
                                    <option value="prose_su_classics">Советская классическая проза</option>
                                <optgroup label="Любовные романы">
                                    <option value="love_contemporary">Современные любовные романы</option>
                                    <option value="love_history">Исторические любовные романы</option>
                                    <option value="love_detective">Остросюжетные любовные романы</option>
                                    <option value="love_short">Короткие любовные романы</option>
                                    <option value="love_erotica">Эротика</option>
                                <optgroup label="Приключения">
                                    <option value="adv_western">Вестерн</option>
                                    <option value="adv_history">Исторические приключения</option>
                                    <option value="adv_indian">Приключения про индейцев</option>
                                    <option value="adv_maritime">Морские приключения</option>
                                    <option value="adv_geo">Путешествия и география</option>
                                    <option value="adv_animal">Природа и животные</option>
                                    <option value="adventure">Прочие приключения</option>
                                <optgroup label="Детское">
                                    <option value="child_tale">Сказка</option>
                                    <option value="child_verse">Детские стихи</option>
                                    <option value="child_prose">Детскиая проза</option>
                                    <option value="child_sf">Детская фантастика</option>
                                    <option value="child_det">Детские остросюжетные</option>
                                    <option value="child_adv">Детские приключения</option>
                                    <option value="child_education">Детская образовательная литература</option>
                                    <option value="children">Прочая детская литература</option>
                                <optgroup label="Поэзия, Драматургия">
                                    <option value="poetry">Поэзия</option>
                                    <option value="dramaturgy">Драматургия</option>
                                <optgroup label="Старинное">
                                    <option value="antique_ant">Античная литература</option>
                                    <option value="antique_european">Европейская старинная литература</option>
                                    <option value="antique_russian">Древнерусская литература</option>
                                    <option value="antique_east">Древневосточная литература</option>
                                    <option value="antique_myths">Мифы. Легенды. Эпос</option>
                                    <option value="antique">Прочая старинная литература</option>
                                <optgroup label="Наука, Образование">
                                    <option value="sci_history">История</option>
                                    <option value="sci_psychology">Психология</option>
                                    <option value="sci_culture">Культурология</option>
                                    <option value="sci_religion">Религиоведение</option>
                                    <option value="sci_philosophy">Философия</option>
                                    <option value="sci_politics">Политика</option>
                                    <option value="sci_business">Деловая литература</option>
                                    <option value="sci_juris">Юриспруденция</option>
                                    <option value="sci_linguistic">Языкознание</option>
                                    <option value="sci_medicine">Медицина</option>
                                    <option value="sci_phys">Физика</option>
                                    <option value="sci_math">Математика</option>
                                    <option value="sci_chem">Химия</option>
                                    <option value="sci_biology">Биология</option>
                                    <option value="sci_tech">Технические науки</option>
                                    <option value="science">Прочая научная литература</option>
                                <optgroup label="Компьютеры и Интернет">
                                    <option value="comp_www">Интернет</option>
                                    <option value="comp_programming">Программирование</option>
                                    <option value="comp_hard">Компьютерное "железо" (аппаратное обеспечение)</option>
                                    <option value="comp_soft">Программы</option>
                                    <option value="comp_db">Базы данных</option>
                                    <option value="comp_osnet">ОС и Сети</option>
                                    <option value="computers">Прочая околокомпьтерная литература</option>
                                <optgroup label="Справочная литература">
                                    <option value="ref_encyc">Энциклопедии</option>
                                    <option value="ref_dict">Словари</option>
                                    <option value="ref_ref">Справочники</option>
                                    <option value="ref_guide">Руководства</option>
                                    <option value="reference">Прочая справочная литература</option>
                                <optgroup label="Документальная литература">
                                    <option value="nonf_biography">Биографии и Мемуары</option>
                                    <option value="nonf_publicism">Публицистика</option>
                                    <option value="nonf_criticism">Критика</option>
                                    <option value="design">Искусство и Дизайн</option>
                                    <option value="nonfiction">Прочая документальная литература</option>
                                <optgroup label="Религия и духовность">
                                    <option value="religion_rel">Религия</option>
                                    <option value="religion_esoterics">Эзотерика</option>
                                    <option value="religion_self">Самосовершенствование</option>
                                    <option value="religion">Прочая религионая литература</option>
                                <optgroup label="Юмор">
                                    <option value="humor_anecdote">Анекдоты</option>
                                    <option value="humor_prose">Юмористическая проза</option>
                                    <option value="humor_verse">Юмористические стихи</option>
                                    <option value="humor">Прочий юмор</option>
                                <optgroup label="Домоводство (Дом и семья)">
                                    <option value="home_cooking">Кулинария</option>
                                    <option value="home_pets">Домашние животные</option>
                                    <option value="home_crafts">Хобби и ремесла</option>
                                    <option value="home_entertain">Развлечения</option>
                                    <option value="home_health">Здоровье</option>
                                    <option value="home_garden">Сад и огород</option>
                                    <option value="home_diy">Сделай сам</option>
                                    <option value="home_sport">Спорт</option>
                                    <option value="home_sex">Эротика, Секс</option>
                                    <option value="home">Прочиее домоводство</option>
                            </select>
                        </div>
                        <div class="input-field col l3 m6 s12">
                            <select name='lang'>
                                <option value="" disabled selected>Язык *</option>
                                <option value="ru">Русский</option>
                                <option value="ua">Украинский</option>
                                <option value="en">Английский</option>
                                <option value="de">Немецкий</option>
                            </select>
                        </div>
                        <div class="input-field col l3 m6 s12">
                            <select name='cathegory'>
                                <option value="" disabled selected>Категория (RARS) *</option>
                                <option value="0+">0+</option>
                                <option value="6+">6+</option>
                                <option value="12+">12+</option>
                                <option value="16+">16+</option>
                                <option value="18+">18+</option>
                            </select>
                        </div>
                        <div class="input-field col l3 m6 s12">
                            <select name='status'>
                                <option value="" disabled selected>Статус *</option>
                                <option value="Закончен">Закончен</option>
                                <option value="В процессе">В процессе</option>
                                <option value="Заморожен">Заморожен</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea id="annotation" class="materialize-textarea" data-length="1000" name="annotation"></textarea>
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