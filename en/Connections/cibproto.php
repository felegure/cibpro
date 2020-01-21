<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_cibproto = "localhost";
$database_cibproto = "cibbase";
$username_cibproto = "root";
$password_cibproto = "";
$cibproto = mysqli_connect($hostname_cibproto, $username_cibproto, $password_cibproto) or trigger_error(mysqli_error(),E_USER_ERROR); 
//$cibproto = mysqli_connect($hostname_cibproto, $username_cibproto, $password_cibproto) or trigger_error(mysqli_error(),E_USER_ERROR); 
/*
  $cn = mysqli_connect('localhost','root','','cursisten')or die("Probleem verbinding!");
        $sql = "INSERT INTO cursist (voornaam,familienaam,leeftijd) VALUES ('".$this->voornaam."', '".$this->familienaam."', '".$this->leeftijd."');";
        $query = mysqli_query($cn, $sql) or die("Probleem database");
		
		*/
?>