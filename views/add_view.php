<!doctype html>
<html>
<head>
<meta charset="UTF-8"/>

 <title>Moje hobby</title>
 	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	
	<meta name="description" content="Świat piwa jest naprawdę fascynujący.Założę si, że nie raz cię zaskoczę"/>
	<meta name="keywords" content="Piwo, najlepsze piwa, piwa kraftowe, radlery, piwa ciemnie, piwa pszeniczne, żywiec, carlsberg, kopania piwowarska"/>
	<link rel="stylesheet" href="static/support.css" type="text/css"/>
	</head>
<body>
<div id="container">	
<header>
Galeria zdjęć

</header>
<nav>
<div class="optionL"><div class="optionT"><a href="index.html">Strona główna</a></div></div>

<div class="optionL"><div class="optionT"><a href="koncerny.html">Wielkie Koncerny</a></div>
<ul>
<li><div class="optionT"><a href="koncerny.html#kompania">Kompania Piwowarska</a></div></li>
<li><div class="optionT"><a href="koncerny.html#zywiec">Grupa Żywiec</a></div></li>
<li><div class="optionT"><a href="koncerny.html#carlsberg">Grupa Carslberg</a></div></li>
</ul>
</div>
<div class="optionL"><div class="optionT"> <a href="krafty.html">Piwa kraftowe</a></div></div>
<div class="optionL"> <div class="active">Galeria zdjęć</div></div>
	
</nav>
<div id="content">
<form  method="post" enctype="multipart/form-data">
<input type="file" name="image" ><br/>
Znak wodny:
<input type="text" name="znak" ><br/>
Tytul:
<input type="text" name="tytul" ><br/>
Autor:
<?php
if(isset($_SESSION['zalogowany'])&&$_SESSION['zalogowany']==true){
echo '<input type="text" value='.$_SESSION['login'].' name="autor" ><br/>';
echo '<input type="radio" name="zdjecie" value="prywatne"/><label for="prywatne">Prywatne</label><br/>';
echo '<input type="radio" name="zdjecie" checked="checked" value="publiczne"/><label for="publiczne">Publiczne</label><br/>';}
else
	echo '<input type="text"  name="autor" ><br/>';

?>
<input type="submit" value="Wyslij"><br/>
		</form>
		<?php
		
		if(isset($_SESSION['e_rozmiar']))
		echo '<div id="blad">'.$_SESSION['e_rozmiar'].'</div>';
		unset($_SESSION['e_rozmiar']);
		if(isset($_SESSION['e_plik']))
		echo '<div id="blad">'.$_SESSION['e_plik'].'</div>';
		unset($_SESSION['e_plik']);
		if(isset($_SESSION['wstawienie']))
	echo '<div id="blad">'.$_SESSION['wstawienie'].'</div>';
		unset($_SESSION['wstawienie']);
		if(isset($_SESSION['znak']))
	echo '<div id="blad">'.$_SESSION['znak'].'</div>';
		unset($_SESSION['znak']);
		if(isset($_SESSION['e_zdjecie']))
	echo '<div id="blad">'.$_SESSION['e_zdjecie'].'</div>';
		unset($_SESSION['e_zdjecie']);
		?>
		<a href="galeria.php">Wróć do galerii.</a>
		</div>
<footer>
Dawid Rezmer nr 184250 &copy; Wszelkie prawa zastrzeżone.
</footer>
</div>
</body>
</html>