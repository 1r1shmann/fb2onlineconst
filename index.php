<?php
    $str_title = "Главная";
    require_once 'blocks/head.php';
    require_once 'blocks/navbar.php';
?>
        <main>
            <div class="container">
                <form id="mainform" action="fb2.php" method="post">
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
                                </optgroup>
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
                                </optgroup>
                                <optgroup label="Проза">
                                    <option value="prose_classic">Классическая проза</option>
                                    <option value="prose_history">Историческая проза</option>
                                    <option value="prose_contemporary">Современная проза</option>
                                    <option value="prose_counter">Контркультура</option>
                                    <option value="prose_rus_classic">Русская классическая проза</option>
                                    <option value="prose_su_classics">Советская классическая проза</option>
                                </optgroup>
                                <optgroup label="Любовные романы">
                                    <option value="love_contemporary">Современные любовные романы</option>
                                    <option value="love_history">Исторические любовные романы</option>
                                    <option value="love_detective">Остросюжетные любовные романы</option>
                                    <option value="love_short">Короткие любовные романы</option>
                                    <option value="love_erotica">Эротика</option>
                                </optgroup>
                                <optgroup label="Приключения">
                                    <option value="adv_western">Вестерн</option>
                                    <option value="adv_history">Исторические приключения</option>
                                    <option value="adv_indian">Приключения про индейцев</option>
                                    <option value="adv_maritime">Морские приключения</option>
                                    <option value="adv_geo">Путешествия и география</option>
                                    <option value="adv_animal">Природа и животные</option>
                                    <option value="adventure">Прочие приключения</option>
                                </optgroup>
                                <optgroup label="Детское">
                                    <option value="child_tale">Сказка</option>
                                    <option value="child_verse">Детские стихи</option>
                                    <option value="child_prose">Детскиая проза</option>
                                    <option value="child_sf">Детская фантастика</option>
                                    <option value="child_det">Детские остросюжетные</option>
                                    <option value="child_adv">Детские приключения</option>
                                    <option value="child_education">Детская образовательная литература</option>
                                    <option value="children">Прочая детская литература</option>
                                </optgroup>
                                <optgroup label="Поэзия, Драматургия">
                                    <option value="poetry">Поэзия</option>
                                    <option value="dramaturgy">Драматургия</option>
                                </optgroup>
                                <optgroup label="Старинное">
                                    <option value="antique_ant">Античная литература</option>
                                    <option value="antique_european">Европейская старинная литература</option>
                                    <option value="antique_russian">Древнерусская литература</option>
                                    <option value="antique_east">Древневосточная литература</option>
                                    <option value="antique_myths">Мифы. Легенды. Эпос</option>
                                    <option value="antique">Прочая старинная литература</option>
                                </optgroup>
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
                                </optgroup>
                                <optgroup label="Компьютеры и Интернет">
                                    <option value="comp_www">Интернет</option>
                                    <option value="comp_programming">Программирование</option>
                                    <option value="comp_hard">Компьютерное "железо" (аппаратное обеспечение)</option>
                                    <option value="comp_soft">Программы</option>
                                    <option value="comp_db">Базы данных</option>
                                    <option value="comp_osnet">ОС и Сети</option>
                                    <option value="computers">Прочая околокомпьтерная литература</option>
                                </optgroup>
                                <optgroup label="Справочная литература">
                                    <option value="ref_encyc">Энциклопедии</option>
                                    <option value="ref_dict">Словари</option>
                                    <option value="ref_ref">Справочники</option>
                                    <option value="ref_guide">Руководства</option>
                                    <option value="reference">Прочая справочная литература</option>
                                </optgroup>
                                <optgroup label="Документальная литература">
                                    <option value="nonf_biography">Биографии и Мемуары</option>
                                    <option value="nonf_publicism">Публицистика</option>
                                    <option value="nonf_criticism">Критика</option>
                                    <option value="design">Искусство и Дизайн</option>
                                    <option value="nonfiction">Прочая документальная литература</option>
                                </optgroup>
                                <optgroup label="Религия и духовность">
                                    <option value="religion_rel">Религия</option>
                                    <option value="religion_esoterics">Эзотерика</option>
                                    <option value="religion_self">Самосовершенствование</option>
                                    <option value="religion">Прочая религионая литература</option>
                                </optgroup>
                                <optgroup label="Юмор">
                                    <option value="humor_anecdote">Анекдоты</option>
                                    <option value="humor_prose">Юмористическая проза</option>
                                    <option value="humor_verse">Юмористические стихи</option>
                                    <option value="humor">Прочий юмор</option>
                                </optgroup>
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
                            </optgroup>
                            </select>
                        </div>
                        <div class="input-field col l3 m6 s12">
                            <select name='lang'>
                                <option value="" disabled selected>Язык *</option>
                                <option value="ru">Русский</option>
                                <option value="en">Английский</option>
                                <option value="ab">Абхазский</option>
                                <option value="av">Аварский</option>
                                <option value="ae">Авестийский</option>
                                <option value="az">Азербайджанский</option>
                                <option value="ay">Аймара</option>
                                <option value="ak">Акан</option>
                                <option value="sq">Албанский</option>
                                <option value="am">Амхарский</option>
                                <option value="ar">Арабский</option>
                                <option value="hy">Армянский</option>
                                <option value="as">Ассамский</option>
                                <option value="aa">Афарский</option>
                                <option value="af">Африкаанс</option>
                                <option value="bm">Бамбара</option>
                                <option value="eu">Баскский</option>
                                <option value="ba">Башкирский</option>
                                <option value="be">Белорусский</option>
                                <option value="bn">Бенгальский</option>
                                <option value="my">Бирманский</option>
                                <option value="bi">Бислама</option>
                                <option value="bg">Болгарский</option>
                                <option value="bs">Боснийский</option>
                                <option value="br">Бретонский</option>
                                <option value="cy">Валлийский</option>
                                <option value="hu">Венгерский</option>
                                <option value="ve">Венда</option>
                                <option value="vo">Волапюк</option>
                                <option value="wo">Волоф</option>
                                <option value="vi">Вьетнамский</option>
                                <option value="gl">Галисийский</option>
                                <option value="lg">Ганда</option>
                                <option value="hz">Гереро</option>
                                <option value="kl">Гренландский</option>
                                <option value="el">Греческий</option>
                                <option value="ka">Грузинский</option>
                                <option value="gn">Гуарани</option>
                                <option value="gu">Гуджарати</option>
                                <option value="gd">Гэльский</option>
                                <option value="da">Датский</option>
                                <option value="dz">Дзонг-кэ</option>
                                <option value="dv">Дивехи</option>
                                <option value="zu">Зулу</option>
                                <option value="he">Иврит</option>
                                <option value="ig">Игбо</option>
                                <option value="yi">Идиш</option>
                                <option value="id">Индонезийский</option>
                                <option value="ia">Интерлингва</option>
                                <option value="ie">Интерлингве</option>
                                <option value="iu">Инуктитут</option>
                                <option value="ik">Инупиак</option>
                                <option value="yo">Йоруба</option>
                                <option value="ga">Ирландский</option>
                                <option value="is">Исландский</option>
                                <option value="es">Испанский</option>
                                <option value="it">Итальянский</option>
                                <option value="kk">Казахский</option>
                                <option value="kn">Каннада</option>
                                <option value="kr">Канури</option>
                                <option value="ca">Каталанский</option>
                                <option value="ks">Кашмири</option>
                                <option value="qu">Кечуа</option>
                                <option value="ki">Кикуйю</option>
                                <option value="kj">Киньяма</option>
                                <option value="ky">Киргизский</option>
                                <option value="zh">Китайский</option>
                                <option value="kv">Коми</option>
                                <option value="kg">Конго</option>
                                <option value="ko">Корейский</option>
                                <option value="kw">Корнский</option>
                                <option value="co">Корсиканский</option>
                                <option value="xh">Коса</option>
                                <option value="ku">Курдский</option>
                                <option value="km">Кхмерский</option>
                                <option value="lo">Лаосский</option>
                                <option value="la">Латинский</option>
                                <option value="lv">Латышский</option>
                                <option value="ln">Лингала</option>
                                <option value="lt">Литовский</option>
                                <option value="lu">Луба-катанга</option>
                                <option value="lb">Люксембургский</option>
                                <option value="mk">Македонский</option>
                                <option value="mg">Малагасийский</option>
                                <option value="ms">Малайский</option>
                                <option value="ml">Малаялам</option>
                                <option value="mt">Мальтийский</option>
                                <option value="mi">Маори</option>
                                <option value="mr">Маратхи</option>
                                <option value="mh">Маршалльский</option>
                                <option value="me">Мерянский</option>
                                <option value="mn">Монгольский</option>
                                <option value="gv">Мэнский</option>
                                <option value="nv">Навахо</option>
                                <option value="na">Науру</option>
                                <option value="nd">Ндебеле северный</option>
                                <option value="nr">Ндебеле южный</option>
                                <option value="ng">Ндунга</option>
                                <option value="de">Немецкий</option>
                                <option value="ne">Непальский</option>
                                <option value="nl">Нидерландский</option>
                                <option value="no">Норвежский</option>
                                <option value="ny">Ньянджа</option>
                                <option value="nn">Нюнорск</option>
                                <option value="oj">Оджибве</option>
                                <option value="oc">Окситанский</option>
                                <option value="or">Ория</option>
                                <option value="om">Оромо</option>
                                <option value="os">Осетинский</option>
                                <option value="pi">Пали</option>
                                <option value="pa">Пенджабский</option>
                                <option value="fa">Персидский</option>
                                <option value="pl">Польский</option>
                                <option value="pt">Португальский</option>
                                <option value="ps">Пушту</option>
                                <option value="rm">Ретороманский</option>
                                <option value="rw">Руанда</option>
                                <option value="ro">Румынский</option>
                                <option value="rn">Рунди</option>
                                <option value="sm">Самоанский</option>
                                <option value="sg">Санго</option>
                                <option value="sa">Санскрит</option>
                                <option value="sc">Сардинский</option>
                                <option value="ss">Свази</option>
                                <option value="sr">Сербский</option>
                                <option value="si">Сингальский</option>
                                <option value="sd">Синдхи</option>
                                <option value="sk">Словацкий</option>
                                <option value="sl">Словенский</option>
                                <option value="so">Сомали</option>
                                <option value="st">Сото южный</option>
                                <option value="sw">Суахили</option>
                                <option value="su">Сунданский</option>
                                <option value="tl">Тагальский</option>
                                <option value="tg">Таджикский</option>
                                <option value="th">Тайский</option>
                                <option value="ty">Таитянский</option>
                                <option value="ta">Тамильский</option>
                                <option value="tt">Татарский</option>
                                <option value="tw">Тви</option>
                                <option value="te">Телугу</option>
                                <option value="bo">Тибетский</option>
                                <option value="ti">Тигринья</option>
                                <option value="to">Тонганский</option>
                                <option value="tn">Тсвана</option>
                                <option value="ts">Тсонга</option>
                                <option value="tr">Турецкий</option>
                                <option value="tk">Туркменский</option>
                                <option value="uz">Узбекский</option>
                                <option value="ug">Уйгурский</option>
                                <option value="uk">Украинский</option>
                                <option value="ur">Урду</option>
                                <option value="fo">Фарерский</option>
                                <option value="fj">Фиджи</option>
                                <option value="fl">Филиппинский</option>
                                <option value="fi">Финский (Suomi)</option>
                                <option value="fr">Французский</option>
                                <option value="fy">Фризский</option>
                                <option value="ff">Фулах</option>
                                <option value="ha">Хауса</option>
                                <option value="hi">Хинди</option>
                                <option value="ho">Хиримоту</option>
                                <option value="hr">Хорватский</option>
                                <option value="cu">Церковнославянский</option>
                                <option value="ch">Чаморро</option>
                                <option value="ce">Чеченский</option>
                                <option value="cs">Чешский</option>
                                <option value="za">Чжуанский</option>
                                <option value="cv">Чувашский</option>
                                <option value="sv">Шведский</option>
                                <option value="sn">Шона</option>
                                <option value="ee">Эве</option>
                                <option value="eo">Эсперанто</option>
                                <option value="et">Эстонский</option>
                                <option value="jv">Яванский</option>
                                <option value="ja">Японский</option>
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
                        <div class="file-field input-field col l3 m6 s12">
                            <div class="btn blue darken-3">
                                <span>Обложка</span>
                                <input type="hidden" id="coverpage" name="coverpage">
                                <input type="file" id="cover_image" name="cover_image" accept=".png, .jpg, .jpeg, .gif">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="JPEG, PNG, GIF">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea id="annotation" class="materialize-textarea" data-length="1000" name="annotation"></textarea>
                            <label for="annotation">Аннотация *</label>
                        </div>
                    </div>
                    <div id="chapters">
                        <div class="card-panel">
                            <div class="row">
                                <div class="col s12">
                                    <div class="input-field">
                                        <input type="number" class="validate" id="chapters_count" value="" min="1">
                                        <label for="chapters_count">Кол-во разделов * **</label>
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
                var count = $("#chapters_count").val();
                count = (count == "") ? 1: count;
                count = Math.max(1, parseInt(count, 10) || 1);
                $("#chapters").html("");
                $("#build_actions").remove();
                var i = 1;
                while(i <= count){

                $("#chapters").append(\'<div data-id=\"\'+i+\'\" class=\"row\">\n\
                    <div class=\"input-field col s12\">\n\
                    <input value=\"\" id=\"chapter_title_\'+i+\'\" type=\"text\" class=\"validate\" name=\"chapter_title[]\">\n\
                    <label for=\"chapter_title_\'+i+\'\">Название раздела №\'+i+\' *</label>\n\
                    </div>\n\
                    <div class=\"input-field col s12\">\n\
                    <textarea id=\"chapter_contents_\'+i+\'\" class=\"materialize-textarea\" name=\"chapter_contents[]\"></textarea>\n\
                    <label for=\"chapter_contents_\'+i+\'\">Содержание раздела №\'+i+\' *</label>\n\
                    </div>\n\
                    </div>\n\
                \');
                i++;
            };
            $("#chapters").after("<div id=\"build_actions\">\n\
                <button class=\"btn btn-large waves-effect waves-light blue darken-3\" type=\"submit\" name=\"action\">Построить FB2</button>\n\
                <a href=\"#\" class=\"btn-floating btn-large waves-effect waves-light right red accent-4\" id=\"add_chapter\">\n\
                <i class=\"material-icons\">add</i>\n\
                </a>\n\
            </div>");
        });
        
        $(document).on("click", "#add_chapter", function(event){
            event.preventDefault();
            var last_id = $("#chapters").children().last().data("id");
            last_id++;
            $("#chapters").append(\'<div data-id=\"\'+last_id+\'\" class=\"row\">\n\
                <div class=\"input-field col s12\">\n\
                <input value=\"\" id=\"chapter_title_\'+last_id+\'\" type=\"text\" class=\"validate\" name=\"chapter_title[]\">\n\
                <label for=\"chapter_title_\'+last_id+\'\">Название раздела №\'+last_id+\' *</label>\n\
                </div>\n\
                <div class=\"input-field col s12\">\n\
                <textarea id=\"chapter_contents_\'+last_id+\'\" class=\"materialize-textarea\" name=\"chapter_contents[]\"></textarea>\n\
                <label for=\"chapter_contents_\'+last_id+\'\">Содержание раздела №\'+last_id+\' *</label>\n\
                </div>\n\
                </div>\n\
            \');
        });
        $(document).on(\'change\', \'#cover_image\', function(){
            if(this.files[0].size > (2 * 1024 * 1024)){
                alert(\'Размер загружаемого файла больше 2 мегабайт!\');
                $(\'#coverpage\').val(\'\');
            } else {
                let reader = new FileReader();
                reader.addEventListener("loadend", function(result) {
                    $(\'#coverpage\').val(result.target.result);
                }, false);
                reader.readAsDataURL(this.files[0]);
            }
    });
';
    require_once 'blocks/foot.php';
?>
