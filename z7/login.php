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
<style>
form p span {
margin-left: 20px;
float:right;
}.row {
padding: 20px;
}
</style>
</head>

<body>
<?
    include("templateNav.php");
?>
<div class="container">
<div class="row">
<div class="col-md-4">
<a href="/z7/login.php">logowanie</a></br>
<a href="/z7/rejestracja.php">rejestracja</a></br>
<a href="/z7/index.php">home</a></br>

Formularz logowania
<form method="post" action="weryfikuj.php">
<p>Login: <span><input id="login" type="text" name="user" placeholder="login" maxlength="20" size="20"></input></span></p>
<p>Hasło<span><input id="pass" type="password" name="pass" placeholder="hasło" maxlength="20" size="20"></input></span></p>
<input class="btn btn-primary" type="submit" value="Send"></input>
</form>
</div></div><?php
print "<div class=\"row\"><h5>Nieudane próby logowania:  ". $_SESSION['proby']."</h5></div>";
?>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>

