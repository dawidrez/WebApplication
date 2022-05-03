<?php
require_once 'bussiness.php';
require_once 'controller_utils.php';

function galeria(&$model)
{
	
 if(isset($_SESSION['login']))
	{  $priv=1;
$login=$_SESSION['login'];
$priv_photos=get_number_priv_images($login);
	}
   else
   { $login=0;
	$priv=0;
	$priv_photos=0;
   }
  $public_photos=get_number_public_images();
   if(isset($_SESSION['strona']))
	  $strona=$_SESSION['strona'];
  else
	 $_SESSION['strona']=$strona=1;
     $Page=4;
     $images = get_images($strona,$Page,$priv,$login);
     $model['images'] = $images;
	 $number_of_photos=$priv_photos+$public_photos;
  if( $number_of_photos>$strona*$Page)
     $_SESSION['next']=1;
  else 
	$_SESSION['next']=0;
  return 'galeria_view';
}
function add(&$model)
{
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
       $poprawny_plik=true;
       $image=$_FILES['image'];
       if (is_uploaded_file($image['tmp_name'])) {
			$finfo = finfo_open(FILEINFO_MIME_TYPE);
			$file_name = $image['tmp_name'];
			$typ = finfo_file($finfo, $file_name);
			if ($typ === 'image/jpeg'||$typ === 'image/png') {
			    $poprawny_plik=true;
			}
			else
				{$_SESSION['e_plik']='<span>Akceptujemy jedynie pliki png oraz jpg!!</span>';
				$poprawny_plik=false;
				}
			if($image['size']>1048576)
				{	$_SESSION['e_rozmiar']='<span>Przesłane zdjecie ma za duży rozmiar!!</span>';
				$poprawny_plik=false;
				}
			if($poprawny_plik==true)
				{if(isset($_POST['zdjecie'])&&$_POST['zdjecie']=="prywatne")
					{$prywatnosc=1;
					$login=$_SESSION['login'];
				    }
				else
					{$prywatnosc=0;
					$login=0;
					}
				$upload_dir = 'upload/';
				$file_name1 = basename($image['name']);
				$file_name=uniqid().$file_name1;
				$file_name_min="min_".$file_name;
				$file_name_water="water_".$file_name;
				$target = $upload_dir . $file_name;
				$target_min=$upload_dir . $file_name_min;
				$target_water=$upload_dir . $file_name_water;
				$tmp_path = $image['tmp_name'];
				if($typ === 'image/jpeg')
					{$img=imagecreatefromjpeg($tmp_path);
					}
				else
					{$img=imagecreatefrompng($tmp_path);
					}
				$width  = imagesx($img);
				$height = imagesy($img);
				if(!empty($_POST['znak']))
					{$znak=$_POST['znak'];
					$textcolor = imagecolorallocate($img, 0, 0,0);
					$background = imagecolorallocate($img, 255, 255,255);
					$width_mini = 200;
					$height_mini =125;
					$stamp=imagecreatetruecolor(160,30);
				   imagefilledrectangle($stamp, 0, 0, 159, 29, $background);
					$img_mini = imagecreatetruecolor($width_mini, $height_mini);
					imagestring ($stamp,10, 10 ,10,$znak, $textcolor);
					imagecopyresampled($img_mini, $img, 0, 0, 0, 0, $width_mini , $height_mini, $width  , $height);
					imagejpeg($img_mini,$target_min);
					if(imagecopymerge($img, $stamp, 5,5, 0, 0, imagesx($stamp), imagesy($stamp),70))
					   imagejpeg($img,$target_water);
					else
					   $_SESSION['e_water']="Nadanie watermarka nie poszlo zgodnie z planem!!";
					imagedestroy($img);
					imagedestroy($stamp);
					imagedestroy($img_mini);
					if(move_uploaded_file($tmp_path,$target))
					  {	$_SESSION['wstawienie']="Zdjecie zostało dodane!!";
									  $image = [
					   'path_min' => "upload/".$file_name_min,
					   'path' => "upload/".$file_name_water,
						'tytul' => $_POST['tytul'],
					   'autor' => $_POST['autor'],
						'prywatnosc'=>$prywatnosc,
						'login'=>$login
						 ];

						if (save_image( $image)) {
							
						return 'redirect:galeria';
						 }}
     
					else
					   $_SESSION['wstawienie']="Upload nie powiodl się!!";
					  }
				
			    else
				{
					$_SESSION['znak']="Należy uzupełnić pole znak wodny!";
					return "redirect:add.php";
		        }
				}	  
			else
			{header('Location:add.php');
				 exit;
			}
	   }	
		else
		{	$_SESSION['e_zdjecie']='<span>Nie wybrano pliku!!</span>';
		header('Location:add.php');
		exit;
				} 
				
    
}
else
return 'add_view';}
function zaloguj(&$model)
{
	
if((isset($_SESSION['zalogowany'])))
{header('Location:galeria.php');
exit;
}

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!empty($_POST['login']) &&!empty($_POST['haslo']))
			{$login=$_POST['login'];
			 $haslo=$_POST['haslo'];
			 $user=uzytkownik($login);
			 $_SESSION['login']=$user['haslo'];
			 if ($user !== null && password_verify($haslo,$user['haslo']))
				 {
				session_regenerate_id();
				$_SESSION['login']=$user['login'];
			    $_SESSION['zalogowany']=true;
			   return 'redirect:galeria';
				 }
			else
			{$_SESSION['blad']='<span>Nieprawidlowy login lub haslo</span>';
			header('Location:zaloguj.php');
			exit;
			}
        }else
		{
			$_SESSION['blad']='<span>Nieprawidlowy login lub haslo</span>';
		header('Location:zaloguj.php');
		exit;
		}
	}
	return 'zaloguj_view';
}   
 function zarejestruj()
 {
	if(!isset($_SESSION['zalogowany']))
	{  if ($_SERVER['REQUEST_METHOD'] === 'POST')
			{$udana_walidacja=true;
			$login=$_POST['login'];
			$user=uzytkownik($login);
			if($user === null)
				{if(strlen($login)<3||strlen($login)>20)
				{	$udana_walidacja=false;
					$_SESSION['e_nick']='Login powinien zawierać od 3 do 20 znaków!.<br/>';
				}
				$email=$_POST['email'];
				$emailB=filter_var($email,FILTER_SANITIZE_EMAIL);
				if((filter_var($emailB,FILTER_VALIDATE_EMAIL)==false||($emailB!=$email)))
				{   $udana_walidacja=false;
					$_SESSION['e_email']='Wpisz poprawny adres e-mail!.<br/>';
				}
				$user=uzytkownik2($email);
				if($user === null)
					{$haslo=$_POST['haslo'];
					if(strlen($haslo)<8)
					{	$udana_walidacja=false;
						$_SESSION['e_haslo']='Za krotkie haslo!.<br/>';
					}
					$haslo2=$_POST['haslo2'];
					if($haslo2!=$haslo)
					{	$udana_walidacja=false;
						$_SESSION['e_haslo']='"2 haslo musi być identyczne!".<br/>';
					}	
					$haslohash=password_hash($haslo,PASSWORD_DEFAULT);
				    if($udana_walidacja==false)
					{	header('Location:zarejestruj.php');
					exit;
					}
					else
					{	$_SESSION["udana_rejestracja"]="Brawo, rejestracja przebiegła prawidlowo";
						 $user = [
						'login' => $login,
						'email' => $email,
						'haslo' => $haslohash
					    ];
				   save_uzytkownik($user);
				
							header('Location:zaloguj.php');
							exit;
					}
					}
			else{$_SESSION['e_zajete']="Podany login lub email jest juz zajety.";
			header('Location:zarejestruj.php');
			exit;
			}
			}
			
		else
			{$_SESSION['e_zajete']="Podany login lub email jest juz zajety.";
			header('Location:zarejestruj.php');
			exit;
			}
	}
	 return 'zarejestruj_view';
	}
    else
	  header('Location:galeria.php');
	
  }
 function wyloguj()
 { if(isset($_SESSION['zalogowany']))
		{
		 session_destroy();
	    }
   return 'redirect:galeria';
 }
 function next1()
 {
	 $_SESSION['strona']= $_SESSION['strona']+1;
	 return 'redirect:galeria';
 }
 function poprzednia()
 {
	 $_SESSION['strona']= $_SESSION['strona']-1;
      return 'redirect:galeria';
 }
 function sesja()
 {  if(isset($_SESSION['login']))
	{  $priv=1;
$login=$_SESSION['login'];
	}
   else
   { $login=0;
	$priv=0;
   }
   if(isset($_SESSION['strona']))
	  $strona=$_SESSION['strona'];
   else
	  $_SESSION['strona']=$strona=1;
   $Page=4;
   $priv=$_SESSION['priv'];
   $images = get_images($strona,$Page,$priv,$login);
   foreach ($images as $image){
		$sciezka=$image['path'];
		$id=$image['_id'];
		if(isset($_POST["$id"]))
		{
   $_SESSION["$sciezka"]=1;}
		else
			
			$_SESSION["$sciezka"]=0;
		}
	  return 'redirect:galeria.php';
   
 }
 function wybrane(&$model){
	  if(isset($_SESSION['login']))
	{ $login=$_SESSION['login'];
  $priv_photos=get_number_priv_images($login);
	}
   else
   { 
	$priv_photos=0;
   }
  $public_photos=get_number_public_images();
	  $ilosc=$priv_photos+$public_photos;
	$images=get_all_images();
    $obrazki=[];
	$j=0;
	for($i=0;$i<$ilosc;$i++)
	{   $image=$images[$i];
	    $sciezka=$image['path'];
		if(isset($_SESSION[$sciezka])&&$_SESSION[$sciezka]==1)
			{$obrazki[$j]=$image;
			$j++;
			}
    }
    $model['obrazki']=$obrazki;
    return 'wybrane_view';
 }
  function usun1(&$model)
 {$images=get_all_images();
  foreach($images as $image)
	 {
	 $sciezka=$image['path'];
	  $id=$image['_id'];
	    if(isset($_POST["$id"]))
		{$_SESSION[$sciezka]=0;
	   
		}
	 }
	return 'redirect:wybrane.php';
	  }
     
	 
	 