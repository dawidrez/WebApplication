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




<div id="topbar">

Tutaj możesz przeglądać przeróżne zdjęcia użytkoników! Dodaj swoje i baw się razem z nami!!</div>



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
<div id="opt">
<?php
if(!isset($_SESSION['zalogowany']))
echo'<a href="zaloguj.php">Zaloguj się</a>';

else
{echo'<a href="wyloguj.php">Wyloguj się</a>';
}

?>

<br/>

<a href="add.php">Dodaj zdjęcie!</a><br/>
<a href="wybrane.php">Zobacz wybrane zdjecia!</a><br/>
</div>
<?php

if(isset($_SESSION['wstawienie']))
		echo '<div id="gratulacje">'.$_SESSION['wstawienie'].'</div>';
		unset($_SESSION['wstawienie']);
		?>

<form  method="post" action="sesja.php">
<?php if(count($images)){
	echo'<table><tr><td>Zdjęcie</td><td>Tytul</td><td>Autor</td><td>Wybrane</td><td>Status</td></tr>';
foreach ($images as $image){
	 $sciezka = $image['path'];
        $autor = $image['autor'];
        $tytul = $image['tytul'];
		$priv=$image['prywatnosc'];
		$id=$image['_id'];
		$sciezka_min= $image['path_min'];
        echo "<tr><td><a href='$sciezka'><img src='$sciezka_min'/></a></td>";
        echo "<td>$tytul"."  "."</td>";
		echo "<td>$autor</td>";
		if(isset($_SESSION["$sciezka"])&& $_SESSION["$sciezka"]==1)
		echo "<td><input type='checkbox' checked='checked' name='$id'/></td>";
	    else
echo "<td><input type='checkbox' name='$id'/></td>";
if( $priv==1)
	echo '<td> Prywatne</td></tr>';
else
	echo '<td> Publiczne</td></tr>';
}
      echo '</table><br/><input type="submit" value="Zatwierdź wszystkie zaznaczone"/><br/>';
		
} 
else
	echo "Na stronie nie ma obecnie żadnych zdjęć<br/>"?>

	<?php 
	
    if(isset($_SESSION['strona'])&&$_SESSION['strona']>1)
	echo '<a href="poprzednia.php">Poprzednia strona</a><br/>';
if(isset($_SESSION['next'])&&$_SESSION['next']==1)
	echo '<a href="next.php">Następna strona</a><br/>';
if(isset($_SESSION['dodanie']))
{echo $_SESSION['dodanie'];
    unset($_SESSION['dodanie']);
	}
	
  ?>
</form>
</div>
<footer>
Dawid Rezmer nr 184250 &copy; Wszelkie prawa zastrzeżone.
</footer>
</div>
</body>
</html>