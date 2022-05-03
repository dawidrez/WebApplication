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
Rejestracja
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
<div class="optionL"><a href="galeria.php"> Galeria zdjęć</a></div>
	
</nav>

<div id="content">
<div id="formularz">
<article>
		<form  method="post">
		Login:<br>
		<input type="text" name="login" ><br>
		<?php 
		if(isset($_SESSION['e_nick']))
		{	echo '<div id="blad">'.$_SESSION['e_nick'].'</div>';
		unset ($_SESSION['e_nick']);
		}
		?>
		E-mail:<br>
		<input type="text" name="email" ><br>
		<?php 
		if(isset($_SESSION['e_email']))
		{	echo'<div id="blad">'.$_SESSION['e_email'].'</div>';
		unset ($_SESSION['e_email']);
		}
		?>
		Hasło:<br>
		<input type="password" name="haslo" ><br>
		Powtórz hasło:<br>
		<input type="password" name="haslo2" ><br>
		<?php 
		if(isset($_SESSION['e_haslo']))
		{	echo '<div id="blad">'.$_SESSION['e_haslo'].'</div>';
		unset ($_SESSION['e_haslo']);
		}
		if(isset($_SESSION['e_zajete']))
		{	echo '<div id="blad">'.$_SESSION['e_zajete'].'</div>';
		unset ($_SESSION['e_zajete']);
		}
		?>
		
			<input type="submit" value="Utwórz konto">
		</form>
		</article>
		
</div>
<a href="zaloguj.php">Powrót do logowania</a>
</div></div>
<footer>
Dawid Rezmer nr 184250 &copy; Wszelkie prawa zastrzeżone.
</footer>
</div>
</body>
</html>