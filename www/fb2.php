
<?php
$genre = $_POST['genre'];
$avtor = $_POST['avtor'];
$book_title = $_POST['book_title'];
$lang = $_POST['lang'];
$cathegory = $_POST['cathegory'];
$reiting = $_POST['reiting'];
$razmer = $_POST['razmer'];
$sammary = $_POST['sammary'];
$pairing = $_POST['pairing'];
$thanks = $_POST['thanks'];
$status = $_POST['status'];

$dom = new domDocument("1.0", "utf-8"); // Создаём XML-документ версии 1.0 с кодировкой utf-8
  $root = $dom->createElement("FictionBook"); // Создаём корневой элемент
  // xmlns="http://www.gribuser.ru/xml/fictionbook/2.0" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:l="http://www.w3.org/1999/xlink"
  $xmlns='http://www.gribuser.ru/xml/fictionbook/2.0';
  $xmlns_xlink = 'http://www.w3.org/1999/xlink';
  $xmlns_l = 'http://www.w3.org/1999/xlink';
  $root -> setAttribute("xmlns", $xmlns);
  $root -> setAttribute("xmlns:xlink", $xmlns_xlink);
  $root -> setAttribute("xmlns:l", $xmlns_l);
  
  
  $dom->appendChild($root);
  $description = $dom->createElement("description");
  $title_info = $dom->createElement("title-info");
  $description->appendChild($title_info);
  $janr = $dom->createElement("genre", $genre);
  $title_info->appendChild($janr);
  $author = $dom->createElement("author");
  $first_name  = $dom->createElement("first-name", $avtor);
  $author->appendChild($first_name);
  $title_info->appendChild($author);
  $booktitle = $dom->createElement("book-title", $book_title);
  $lang = $dom->createElement("lang", $lang);
  $title_info->appendChild($lang);
  $annotation = $dom->createElement("annotation");
  
  $annotation_2 = "Категория: ".$cathegory.", Рейтинг: ".$reiting.", Размер: ".$razmer.", Саммари: ".$sammary;
  $p = $dom->createElement("p", $annotation_2);
  $title_info->appendChild($annotation);
  $annotation->appendChild($p);
  $document_info = $dom->createElement("document-info");
  $description->appendChild($document_info);
  
  $author = $dom->createElement("author");
  $first_name  = $dom->createElement("first-name", $_SERVER['HTTP_HOST']);
  $author->appendChild($first_name);
  $document_info->appendChild($author);
	date_default_timezone_set("UTC"); // Устанавливаем часовой пояс по Гринвичу
	$time = time(); // Вот это значение отправляем в базу
	$offset = 3; // Допустим, у пользователя смещение относительно Гринвича составляет +3 часа(московское время)
	$time += 3 * 3600; // Добавляем 5 часа к времени по Гринвичу
	
	$day = date("d", $time);
	$month = date("m", $time);
	$year = date("Y", $time);
  $data_value = "".$year."-".$month."-".$day."";
  $dddata = "".$day.".".$month.".".$year."";
  $date = $dom->createElement("date", $dddata);  
  $date -> setAttribute("value", $data_value);
  $document_info->appendChild($date);
  $body = $dom->createElement("body");
  $root->appendChild($description);
  $title = $dom->createElement("title");
  $p = $dom->createElement("p", $avtor);
  $title->appendChild($p);
  $p = $dom->createElement("p", $book_title);
  $title->appendChild($p);
  $body->appendChild($title);
  $section = $dom->createElement("section");
  $body->appendChild($section);
  $title = $dom->createElement("title");
  $p = $dom->createElement("p", Аннотация);
  $title->appendChild($p);
  $section->appendChild($title);
  
  $par = 'Пейринг: '.$pairing;
  $p = $dom->createElement("p", $par);
  $section->appendChild($p);
  
  $reit = 'Рейтинг: '.$reiting;
  $p = $dom->createElement("p", $reit);
  $section->appendChild($p);
  
  $ja = 'Жанр: '.$genre;
  $p = $dom->createElement("p", $ja);
  $section->appendChild($p);
  
  $raz = 'Размер: '.$razmer;
  $p = $dom->createElement("p", $raz);
  $section->appendChild($p);
  
  $sta = 'Статус: '.$status;
  $p = $dom->createElement("p", $sta);
  $section->appendChild($p);
  
  $samm = 'Саммари: '.$sammary;
  $p = $dom->createElement("p", $samm);
  $section->appendChild($p);
  
  $thank = 'Благодарности: '.$thanks;
  $p = $dom->createElement("p", $thank);
  $section->appendChild($p);
  
  $cop = 'Файл собран на сайте '.$_SERVER['HTTP_HOST'].' - www.'.$_SERVER['HTTP_HOST'];
  $p = $dom->createElement("p", $cop);
  
  $section->appendChild($p);
  $size = sizeof($_POST['name_razdel']);
  for ($i=0;$i<$size; $i++){
		$section = $dom->createElement("section");
		$p = $dom->createElement("p", $_POST['name_razdel'][$i]);
		$title = $dom->createElement("title");
		$title->appendChild($p);
		$section->appendChild($title);
		$list = $_POST['soderzhanie_razdela'][$i];
		$list = explode("\n", $list);
		
		$lsz = sizeof($list);
		for ($x=0; $x < $lsz; $x++){
		$list[$x] = stripslashes($list[$x]);
		$p = $dom->createElement("p", $list[$x]);
		$section->appendChild($p);
		}
		$body->appendChild($section);
	}
	
	$section = $dom->createElement("section");
	$p = $dom->createElement("p", Конец);
	$title = $dom->createElement("title");
	$title->appendChild($p);
	$section->appendChild($title);
	$end_text = 'Файл собран на FB2-Конструкторе '.$_SERVER['HTTP_HOST'].' - www.'.$_SERVER['HTTP_HOST'];
	$p = $dom->createElement("p", $end_text);
	$section->appendChild($p);
	
	$copyright = '© 2016 Irishmann';
	$p = $dom->createElement("p", $copyright);
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
  
  
  
	$ttle = $time."_".$aor."_".$bitle;
	$dom->save("files/".$ttle.".fb2");
	$download_link = "files/".$ttle.".fb2";
	$title_str="Скачать ".$ttle;
	$logo_text = "Скачать FB2"
?>
<!DOCTYPE html>
<html>
	<head>
    <?php echo "<title>".$title_str." | ".$_SERVER['HTTP_HOST']."</title>"; ?>
	<!--Import Google Icon Font-->
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!--Import materialize.css-->
	<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	</head>
<body>

<nav class="blue darken-3">
	<? require_once 'blocks/menu.php'; ?>
</nav>
<main>
<div class="container">
<br />
<br />
	Скачать FB2-файл Вы можете по ссылке ниже.<br /><br />
	<? 
	echo date("Y-m-d H:i:s", $time)." MSK<br />"; // Выводим время пользователя, согласно его часовому поясу
	?>
	<a class="waves-effect waves-light " download href='<? echo $download_link; ?>'>Скачать <? echo $ttle.".fb2"; ?></a><br/>
	
</div>
</main>
<?php
require_once 'blocks/foot.php';
?>