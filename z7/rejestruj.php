<?php
 $login=$_POST['login'];
 $pass=$_POST['pass'];
 $passMatch=$_POST['passmatch'];
 if($pass!==$passMatch){
     $blad = "Hasła nie pasują!";
      header('Location: http://lukhol.net.pl/z6/rejestracja.php');
exit; 
 }
 $dbhost="lukhol.net.pl"; $dbuser="28844266_chmura"; $dbpassword="adm123IN!"; $dbname="28844266_chmura";
$link = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
// $link = mysqli_connect(localhost, nazwa_usera,hasło_usera, baza_usera); // połączenie z BD – wpisać swoje parametry !!!
 if(!$link) { echo"Błąd: ". mysqli_connect_errno()." ".mysqli_connect_error(); } // obsługa błędu połączenia z BD
 mysqli_query($link, "SET NAMES 'utf8'"); // ustawienie polskich znaków


mysqli_query($link, "insert into users (`login`,`haslo`) values('$login','$pass')");

     header('Location: http://lukhol.net.pl/z7/index.php');
  exit;   
?>