<?php
session_start();
    $user = $_SESSION['username'];
$max_rozmiar = 10000;
if (is_uploaded_file($_FILES['plik']['tmp_name']))
 {
 if ($_FILES['plik']['size'] > $max_rozmiar) {echo "Przekroczenie rozmiaru $max_rozmiar"; }
 else
 {
 echo 'Odebrano plik: '.$_FILES['plik']['name'].'<br/>';
 echo $_SERVER['DOCUMENT_ROOT']."<br/><br/>";
 echo $_SERVER['DOCUMENT_ROOT'].$_FILES['plik']['name'];
 $sciezka=$_SERVER['DOCUMENT_ROOT'].$user.$_FILES['plik']['name'];
 if (isset($_FILES['plik']['type'])) {echo 'Typ: '.$_FILES['plik']['type'].'<br/>'; }
 if(!is_dir("/".$user)){ mkdir($_SERVER['DOCUMENT_ROOT'].$user, 0700);
 echo "utworzono katalog";
 }
 $plik=str_replace(" ","_", $_FILES['plik']['name']);
 move_uploaded_file($_FILES['plik']['tmp_name'],$_SERVER['DOCUMENT_ROOT'].$user."/".$_FILES['plik']['name']);
 }
 }
 else {echo 'Błąd przy przesyłaniu danych!';}
?>
