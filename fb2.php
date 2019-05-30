<?php
    $first_name = htmlspecialchars($_POST['first_name']);
    $book_title = htmlspecialchars($_POST['book_title']);
    
    //genre - массив жанров
    
    $lang = htmlspecialchars($_POST['lang']);
    $cathegory = htmlspecialchars($_POST['cathegory']);
    $status = htmlspecialchars($_POST['status']);
    $annotation = htmlspecialchars($_POST['annotation']);
    
    $charters_title = $_POST['charter_title'];
    $charters_contents = $_POST['charter_contents'];

    $program = "FB2CONST Online by Irishmann v.0.0.1 Beta";

    $fb2 = new domDocument("1.0", "utf-8"); // Создаём XML-документ версии 1.0 с кодировкой utf-8
    $fb2->formatOutput = true; //форматируем вывод
    $root = $fb2->createElement("FictionBook"); // Создаём корневой элемент
    
    $xmlns='http://www.gribuser.ru/xml/fictionbook/2.0';
    $xmlns_xlink = 'http://www.w3.org/1999/xlink';
    $xmlns_l = 'http://www.w3.org/1999/xlink';
    $root -> setAttribute("xmlns", $xmlns);
    $root -> setAttribute("xmlns:xlink", $xmlns_xlink);
    $root -> setAttribute("xmlns:l", $xmlns_l);


    $fb2->appendChild($root);
    
    $description = $fb2->createElement("description");
    $title_info = $fb2->createElement("title-info");
    $description->appendChild($title_info);
    foreach($_POST['genre'] as $value){
        $genre = $fb2->createElement("genre", htmlspecialchars($value));
        $title_info->appendChild($genre);
        $genres[] = htmlspecialchars($value);
    }
    unset($value);
    
    $author = $fb2->createElement("author");
    $first_name_dom  = $fb2->createElement("first-name", $first_name);
    $author->appendChild($first_name_dom);
    $title_info->appendChild($author);
    
    $book_title_dom = $fb2->createElement("book-title", $book_title);
    $title_info->appendChild($book_title_dom);
    
    
    $annotation_dom = $fb2->createElement("annotation");
    $annotation = explode("\r\n", $annotation);
    foreach ($annotation as $value){
        if($value == ''){
            $empty_line = $fb2->createElement("empty-line");
            $annotation_dom->appendChild($empty_line);
        }
        else{
            $pa = $fb2->createElement("p", $value);
            $annotation_dom->appendChild($pa);
        }
    }
    unset($value);
    $title_info->appendChild($annotation_dom);
    
    
    
    
    $lang_dom = $fb2->createElement("lang", $lang);
    $title_info->appendChild($lang_dom);
    
    
    
    $document_info = $fb2->createElement("document-info");
    $description->appendChild($document_info);


    $author = $fb2->createElement("author");
    $first_name_dom  = $fb2->createElement("first-name", "FB2CONST");
    $author->appendChild($first_name_dom);
    $document_info->appendChild($author);

    $prog = $fb2->createElement("program-used", $program);
    $document_info->appendChild($prog);
    $id = $fb2->createElement("id", md5($book_title));
    $document_info->appendChild($prog);
    
    $date = $fb2->createElement("date", date('d.m.Y'));  
    $date -> setAttribute("value", date('Y-m-d'));
    $document_info->appendChild($date);
    $root->appendChild($description);
    
    $body = $fb2->createElement("body");
    //title для body
    $title = $fb2->createElement("title");
    $p = $fb2->createElement("p", $first_name. ' - ' . $book_title);
    $title->appendChild($p);
    $body->appendChild($title);
    
    //первая секция
//    $section = $fb2->createElement("section");
//    $body->appendChild($section);
//    $title = $fb2->createElement("title");
//    $p = $fb2->createElement("p", $book_title);
//    $title->appendChild($p);
//    $section->appendChild($title);
//    
//    $p = $fb2->createElement("p", "Автор: " . $first_name);
//    $section->appendChild($p);
//    $p = $fb2->createElement("p", "Категория: " . $cathegory);
//    $section->appendChild($p);
//    $p = $fb2->createElement("p", "Жанры: " . implode(", ", $genres));
//    $section->appendChild($p);
//    $p = $fb2->createElement("p", "Статус: " . $status);
//    $section->appendChild($p);
//    
//    foreach ($annotation as $value){
//        if($value == ''){
//            $empty_line = $fb2->createElement("empty-line");
//            $section->appendChild($empty_line);
//        }
//        else{
//            $p = $fb2->createElement("p", $value);
//            $section->appendChild($p);
//        }
//    }
//    unset($value);
//    
//    $p = $fb2->createElement("p", "Файл собран c помощью " . $program . " - http://" . $_SERVER['HTTP_HOST'] . "/");
//    $section->appendChild($p);
    
    //главы
    foreach ($charters_title as $i => $charter_title){
        $section = $fb2->createElement("section");
        $title = $fb2->createElement("title");
        $p = $fb2->createElement("p", htmlspecialchars($charter_title));
        $title->appendChild($p);
        $section->appendChild($title);
        
        $contents = htmlspecialchars($charters_contents[$i]);
        $contents = explode("\r\n", $contents);
        foreach ($contents as $paragraph){
            if($paragraph == ''){
                $empty_line = $fb2->createElement("empty-line");
                $section->appendChild($empty_line);
            }
            else{
                $p = $fb2->createElement("p", $paragraph);
                $section->appendChild($p);
            }
        }
        $body->appendChild($section);
    }
    
    
    
    //самый последний раздел
    $section = $fb2->createElement("section");
    $p = $fb2->createElement("p", Конец);
    $title = $fb2->createElement("title");
    $title->appendChild($p);
    $section->appendChild($title);
    $p = $fb2->createElement("p", "Файл собран c помощью " . $program . " - http://" . $_SERVER['HTTP_HOST'] . "/");
    $section->appendChild($p);

    $copyright = '© 2016 Irishmann';
    $p = $fb2->createElement("p", $copyright);
    $section->appendChild($p);
    $body->appendChild($section);
    
    
    
    
    $root->appendChild($body);
    
    $translit = array(   
        'а' => 'a',   'б' => 'b',   'в' => 'v',  
        'г' => 'g',   'д' => 'd',   'е' => 'e',  
        'ё' => 'yo',   'ж' => 'zh',  'з' => 'z',  
        'и' => 'i',   'й' => 'j',   'к' => 'k',  
        'л' => 'l',   'м' => 'm',   'н' => 'n',  
        'о' => 'o',   'п' => 'p',   'р' => 'r',  
        'с' => 's',   'т' => 't',   'у' => 'u',  
        'ф' => 'f',   'х' => 'x',   'ц' => 'c',  
        'ч' => 'ch',  'ш' => 'sh',  'щ' => 'shh',  
        'ь' => '',  'ы' => 'y',   'ъ' => '',  
        'э' => 'e',   'ю' => 'yu',  'я' => 'ya',         

        'А' => 'A',   ' ' => '_',   'Б' => 'B',   'В' => 'V',  
        'Г' => 'G',   'Д' => 'D',   'Е' => 'E',  
        'Ё' => 'YO',   'Ж' => 'Zh',  'З' => 'Z',  
        'И' => 'I',   'Й' => 'J',   'К' => 'K',  
        'Л' => 'L',   'М' => 'M',   'Н' => 'N',
        'О' => 'O',   'П' => 'P',   'Р' => 'R',
        'С' => 'S',   'Т' => 'T',   'У' => 'U',
        'Ф' => 'F',   'Х' => 'X',   'Ц' => 'C', 
        'Ч' => 'CH',  'Ш' => 'SH',  'Щ' => 'SHH',  
        'Ь' => '',  'Ы' => 'Y',   'Ъ' => '',
        'Э' => 'E',   'Ю' => 'YU',  'Я' => 'YA',
    );
    $bitle = strtr($book_title, $translit); // транслитерация
    $aor = strtr($avtor, $translit); // транслитерация
  
    $ttle = $time."_".$aor."_".$bitle.".fb2";
    $fb2->save("files/".$ttle);
    $download_link = "files/".$ttle;
    $str_title = "Скачать FB2";
    require_once 'blocks/head.php';
    require_once 'blocks/navbar.php';
?>
        <main>
            <div class="container">
                <div class="row">
                    <div class="col l9 m9 s12">
                        <ul class="collection with-header">
                            <li class="collection-header"><h4><?= $book_title ?></h4></li>
                            <li class="collection-item">Автор: <?= $first_name ?></li>
                            <li class="collection-item">Жанры: <?= implode(', ', $genres) ?></li>
                            <li class="collection-item">Категория: <?= $cathegory ?></li>
                            <li class="collection-item">Статус: <?= $status ?></li>
                        </ul>
                    </div>
                    <div class="col l3 m3 s12">
                        <div class="collection">
                            <a download href="<?= $download_link ?>" class="collection-item red darken-3 white-text">Скачать FB2</a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
<?php
$script = '
        //
';
    require_once 'blocks/foot.php';
?>