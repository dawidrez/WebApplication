<!Doctype html>
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
<div class="optionL"> <div class="active"><a href="galeria.php"> Galeria zdjęć</a></div></div>
	
</nav>


 
<div id="content">
<form  method="post" action="usun.php">

<?php if(count($obrazki))
{echo "<table><tr><td>Zdjęcie</td><td>Tytul</td><td>Autor</td></tr>";
 foreach ($obrazki as $image){
	 $sciezka = $image['path'];
        $autor = $image['autor'];
        $tytul = $image['tytul'];
		$id=$image['_id'];
		 $sciezka_min= $image['path_min'];
        echo "<tr><td><a href='$sciezka'><img src='$sciezka_min'/></a></td>";
        echo "<td>$tytul</td>";
        echo "<td>$autor</td>";
		echo "<td><input type='checkbox'  name='$id'/></td></tr>";
		
    }
	echo '</table><input type="submit" value="Usuń wszystkie zaznaczone"/><br/>';
}
else
echo "Nie wybrano żadnych obrazków"	?>

	
	
	
		</form>
		<a href="galeria.php">Wróć do galerii.</a>
</div>
<footer>
Dawid Rezmer nr 184250 &copy; Wszelkie prawa zastrzeżone.
</footer>
</div>
</body>
</html>