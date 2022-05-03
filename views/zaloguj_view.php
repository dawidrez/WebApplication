
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
Logowanie
</header>
<div id="topbar">
Dzięki zalogowaniu się otrzyamsz dodatkowe opcje na naszej stronie!</div>
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
<div class="optionL"><a href="galeria.php"> Galeria zdjęć</a></div>
	</nav>
<div id="content">
<div id="formularz">
<article>
		<form  method="post">
		Login:<br>
		<input type="text" name="login" ><br>
		Hasło:<br>
		<input type="password" name="haslo" ><br>
		
		<input type="submit" value="Zaloguj">
		</form>
		</article>
		<a href="zarejestruj.php">Zarejestruj się</a><br/>
		<?php
		
		if(isset($_SESSION['blad']))
		{	echo '<div id="blad">';
	echo  $_SESSION['blad'];
	echo '</div>';
		unset($_SESSION['blad']);
		}
		
		if(isset($_SESSION['udana_rejestracja']))
		{	echo '<div id="gratulacje">'; echo  $_SESSION['udana_rejestracja'];
		unset($_SESSION['udana_rejestracja']);
			echo '</div>';}
		?>
	
        <a href="galeria.php">Wróć do galerii.</a>
</div>
</div>
<footer>
Dawid Rezmer nr 184250 &copy; Wszelkie prawa zastrzeżone.
</footer>
</div>
</body>
</html>