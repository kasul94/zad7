<?php 
session_start(); 

?>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="UTF-8">
    <title>Hołub</title>   
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" 
crossorigin="anonymous">
<link type="text/css" rel="stylesheet" href="/css/style.css">
</head>

<body>
<?
    include("templateNav.php");
?>
<div class="container">

<?php 
$user=$_SESSION['username'];
print "<div class=\"row\"><h4>Witaj  ".$user."</h4></div>";
print "<div class=\"row\"><h4 style=\"color:red;\">Ostatnia proba blednego logowania  ". $_SESSION['lastFail']."</h4></div>";
$files1 = scandir("/".$user);
//echo $files1[4];

?>
<div class="row">
 <form action="odbierz.php" method="POST"
 ENCTYPE="multipart/form-data">
 <input type="file" name="plik"/>
 <input type="submit" value="Wyślij plik"/>
 </form>
</div>
<div class="row">
<p>Twoje Pliki:</p></br>
<?php
for($i=2;$i<count($files1);$i++){
    echo $files1[$i]."</br>";}?>
    </div></div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

   
</body>

</html>