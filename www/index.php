<?php
$title_str="FB2 Конструктор";
$logo_text = $title_str;
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
</br>
</br>
<form id="form1" action="fb2.php" method="post">
<input style="display:none;" type="text" name="razdel_count" value="<?php echo $_POST['razdel_count'];?>" />
<div class="row">
	<div class="input-field col s3">
		<input value="" id="avtor" type="text" class="validate" name="avtor">
		<label class="active" for="avtor">Автор</label>
    </div>
    <div class="input-field col s9">
		<input value="" id="book_title" type="text" class="validate" name="book_title">
		<label class="active" for="book_title">Название книги</label>
    </div>
	
</div>
<div class="row">

	<select class="browser-default col s6"name='genre'>
		<option value="" disabled selected>Жанр</option>
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
    <select class="browser-default col s6"name='lang'>
      <option value="" disabled selected>Язык</option>
      <option value="ru">Русский</option>
      <option value="ua">Украинский</option>
      <option value="en">Английский</option>
      <option value="de">Немецкий</option>
    </select>
</div>

<div class="row">
    <select id ='cathegory' class="browser-default col s6" name='cathegory'>
      <option value="" disabled selected>Категория</option>
      <option value="Гет">Гет</option>
      <option value="Джен">Джен</option>
      <option value="Слэш">Слэш</option>
      <option value="Фемслэш">Фемслэш</option>
    </select>
    <select class="browser-default col s6" name='reiting'>
      <option value="" disabled selected>Рейтинг</option>
      <option value="R">R</option>
      <option value="PG-13">PG-13</option>
      <option value="NC-17">NC-17</option>
      <option value="General">General</option>
      <option value=""disabled> * * * </option>
    </select>
</div>
<div class="row">
    <select class="browser-default col s6" name='razmer'>
      <option value="" disabled selected>Размер</option>
      <option value="Мини">Мини (до 50кб текста)</option>
      <option value="Миди">Миди (от 50кб до 200кб текста)</option>
      <option value="Макси">Макси (от 200кб текста)</option>
    </select>
    <select class="browser-default col s6" name='status'>
      <option value="" disabled selected>Статус</option>
      <option value="Закончен">Закончен</option>
      <option value="В процессе">В процессе</option>
      <option value="Заморожен">Заморожен</option>
    </select>
</div>
<div class="row">
<div class="input-field">
	<textarea id="sammary" class="materialize-textarea" length="500" name="sammary"></textarea>
	<label for="sammary">Саммари</label>
</div>
</div>		
<div class="row">
    <div class="input-field">
		<input value="" id="pairing" type="text" class="validate" name="pairing">
		<label class="active" for="pairing">Пейринг</label>
    </div>
</div>
<div class="row">
    <div class="input-field">
		<textarea id="thanks" class="materialize-textarea" length="500" name="thanks"></textarea>
		<label for="thanks">Благодарности</label>
    </div>
</div>
<div id="parentId">
		<div class="row">
			<div class="input-field">
				<input value="" id="name_razdel_0" type="text" class="validate" name="name_razdel[]">
				<label class="active" for="razdel_0">Название раздела №0</label>
			</div>
		</div>
		<div class="row">
			<div class="input-field ">
				<textarea id="soderzhanie_razdela_0" class="materialize-textarea" name="soderzhanie_razdela[]"></textarea>
				<label for="soderzhanie_razdela_0">Содержание раздела №0</label>
			</div>
		</div>
</div>
<button class="btn btn-large waves-effect waves-light green accent-3" type="submit" name="action">Построить FB2</button><a class="btn-floating btn-large waves-effect waves-light right red accent-4" onclick="return addField()"><i class="material-icons">add</i></a>
</form>
<script>
var countOfFields = 1; // Текущее число полей
var curFieldNameId = 0; // Уникальное значение для атрибута name
var maxFieldLimit = 3; // Максимальное число возможных полей
function deleteField(a) {
  if (countOfFields > 1)
  {
 // Получаем доступ к ДИВу, содержащему поле
 var contDiv = a.parentNode;
 // Удаляем этот ДИВ из DOM-дерева
 contDiv.parentNode.removeChild(contDiv);
 // Уменьшаем значение текущего числа полей
 countOfFields--;
 }
 // Возвращаем false, чтобы не было перехода по сслыке
 return false;
}
function addField() {
 // Проверяем, не достигло ли число полей максимума
 /*
 if (countOfFields >= maxFieldLimit) {
 alert("Число полей достигло своего максимума = " + maxFieldLimit);
 return false;
 }
 */
 // Увеличиваем текущее значение числа полей
 countOfFields++;
 // Увеличиваем ID
 curFieldNameId++;
 // Создаем элемент ДИВ
 var div = document.createElement("div");
 // Добавляем HTML-контент с пом. свойства innerHTML
 div.innerHTML = "<div class=\"row\"><div class=\"input-field\"><input value=\"\" id=\"name_razdel_" + curFieldNameId + "\" type=\"text\" class=\"validate\" name=\"name_razdel[]\"><label class=\"active\" for=\"razdel_" + curFieldNameId + "\">Название раздела №" + curFieldNameId + "</label></div></div><div class=\"row\"><div class=\"input-field\"><textarea id=\"soderzhanie_razdela_" + curFieldNameId + "\" class=\"materialize-textarea\" name=\"soderzhanie_razdela[]\"></textarea><label for=\"soderzhanie_razdela_" + curFieldNameId + "\">Содержание раздела №" + curFieldNameId + "</label></div></div>";
 // Добавляем новый узел в конец списка полей
 document.getElementById("parentId").appendChild(div);
 // Возвращаем false, чтобы не было перехода по сслыке
 return false;
}
</script>
</div>
</main>
<?php
require_once 'blocks/foot.php';
?>