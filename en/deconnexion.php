<?php 
session_start();
echo "deconnexion.php   VALEUR DE ACCESS: {$_SESSION['Access']}";
echo "deconnexion.php  var de session COUNTRY: {$_SESSION['COUNTRY']}";
echo "deconnexion.php    var de session STATUSCOUNTRY: {$_SESSION['STATUS']}";
echo "deconnexion.php  var de session user_name: {$_SESSION['username']}";
$_SESSION['username']="";
echo "deconnexion.php  var de session user_name: {$_SESSION['username']}";
require_once ("index.php");
?>
