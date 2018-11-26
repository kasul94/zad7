<?php
 $user=$_POST['user']; // login z formularza
 $pass=$_POST['pass']; // hasło z formularza
 session_start();
  $date = new DateTime();
$czas= $date->format('Y-m-d H:i:s');
if($_SESSION['czas']>$date){
#$interval =  date_diff($date, $_SESSION['czas']);
#if($interval<0){
     header('Location: http://lukhol.net.pl/z7/login.php');
 exit;
#    }
    
    }

$_SESSION['username'] = $_POST['user'];
 $dbhost="lukhol.net.pl"; $dbuser="28844266_chmura"; $dbpassword="adm123IN!"; $dbname="28844266_chmura";
$link = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
// $link = mysqli_connect(localhost, nazwa_usera,hasło_usera, baza_usera); // połączenie z BD – wpisać swoje parametry !!!
 if(!$link) { echo"Błąd: ". mysqli_connect_errno()." ".mysqli_connect_error(); } // obsługa błędu połączenia z BD
 mysqli_query($link, "SET NAMES 'utf8'"); // ustawienie polskich znaków
 $queryy="SELECT * FROM `users` WHERE login='$user'";
 $result = mysqli_query($link, $queryy); // pobranie z BD wiersza, w którym login=login z formularza
 $rekord = mysqli_fetch_array($result); // wiersza z BD, struktura zmiennej jak w BD
 if(!$rekord) //Jeśli brak, to nie ma użytkownika o podanym loginie
{
    
 $_SESSION['proby']=$_SESSION['proby']+1;
 if($_SESSION['proby']>=3){
     $_SESSION['proby']=0;
     $date->modify('+1 minutes');
     $_SESSION['czas']=$date;
 
 }
 mysqli_close($link); // zamknięcie połączenia z BD
 header('Location: http://lukhol.net.pl/z7/login.php');
 exit;
 }
else
 { // Jeśli $rekord istnieje
 if($rekord['haslo']==$pass) // czy hasło zgadza się z BD
 {
   $_SESSION['proby']=0;
$idu=$rekord['idu'];
 $queryy="SELECT * FROM `logi` WHERE `idu`='$idu' and `logowanie`=0 order by datagodzina desc";
  $result = mysqli_query($link, $queryy); // pobranie z BD wiersza, w którym login=login z formularza
 $rekord = mysqli_fetch_array($result); // wiersza z BD, struktura zmiennej jak w BD
  $_SESSION['lastFail'] = $rekord['datagodzina'];
setcookie("logged",$user);
 $query1="insert into `logi` (`datagodzina`,`idu`,`logowanie`) values('$czas','$idu',true) ;";
# echo $query1;
 mysqli_query($link, $query1); 
 header('Location: http://lukhol.net.pl/z7/postLog.php');
 exit;
 }
 else
 {$idu=$rekord['idu'];
 $_SESSION['proby']=$_SESSION['proby']+1;
 if($_SESSION['proby']>=3){
     $_SESSION['proby']=0;
     $date->modify('+1 minutes');
     $_SESSION['czas']=$date;
 
 }
     $query1="insert into `logi` (`datagodzina`,`idu`,`logowanie`) values('$czas','$idu',false) ;";
     mysqli_query($link, $query1);
 mysqli_close($link);
  header('Location: http://lukhol.net.pl/z7/login.php');
 exit;
 }
}
?>