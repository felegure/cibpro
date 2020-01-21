<?php
//Function Connexion : connexion to Mysql
function connexion ($pName, $pPassword, $pBase, $pServer)
{
connexion = mysqli_pconnect($pServer, $pName, $pPassword);
if (!connexion)
{
   echo "Sorry, Connexion to $pServer failed\n";
   exit;
 }
 
 if(!mysqli_select_db($pBase, $connexion));
 {
   echo "Sorry, Acces to $pBase denied\n";
   echo "<B>MySQL Error Message :<B>" . mysqli_error($connexion);
   exit;
 }
 return $connexion;
 }
 

?>
