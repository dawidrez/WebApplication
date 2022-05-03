
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

Tutaj znajdują się zdjęcia widoczne jedynie dla Ciebie!</div>



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
<?php
echo'<a href="wyloguj.php">Wyloguj się</a>';
?>

<br/>


<?php if(count($images)){
	echo '<form  method="post" action="sesja2.php">';
echo '<table><tr><td>Zdjęcie</td><td>Tytul</td><td>Autor</td></tr>';
foreach ($images as $image){
	 $sciezka = $image['path'];
        $autor = $image['autor'];
        $tytul = $image['tytul'];
		$id=$image['_id'];
		$prywatnosc=$image['prywatnosc'];
	    $login=$image['login'];
		$sciezka_min= $image['path_min'];
        
        echo "<tr><td><a href='$sciezka'><img src='$sciezka_min'/></a></td>";
        echo "<td>$tytul</td>".$_SESSION['login']." ".$image['login'];
		
        echo "<td>$autor</td>";
		if(isset($_SESSION[$sciezka])&&$_SESSION[$sciezka]==1)
		echo "<td><input type='checkbox' checked='checked' name='$id' /></td></tr></table>";
	    else
		echo "<td><input type='checkbox' name='$id'/></td></tr></table>";
	    }
		echo '<input type="submit" value="Zatwierdź wszystkie zaznaczone"/><br/></form>';
		}
		
		
    
else echo "</table>Nie posiadasz żadnych prywatnych obrazków<br/>"	?>
	
	
	
	<a href="galeria.php">Wróć do galerii.</a>
</div>
<footer>
Dawid Rezmer nr 184250 &copy; Wszelkie prawa zastrzeżone.
</footer>
</div>
</body>
</html>