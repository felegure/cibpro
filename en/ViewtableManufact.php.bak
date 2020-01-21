<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Liste des Fabricants</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<H2> Manufacturers List </H2>
<?php
require ("connect.php");
$connexion = mysqli_pconnect (SERVER, USER, PASSWORD);
if (!$connexion)
{
 echo "The connexion to ".SERVER ." failed\n";
 exit;
 }
 if (!mysqli_select_db(BASE, $connexion))
 {
 echo  "Access to the database " .BASE . " failed\n";
 exit;
 }
 
 $resultat = mysqli_query ("SELECT * FROM tbuying_view", $connexion);
 if ($resultat)
 { 
 echo "<TABLE BORDER=0 CELLSPACING=2 CELLPADDING=2>
 	  <TR CLASS=CG><TH>Country<TH>Product<TH>Th.Category<TH>Strength<TH>Concentration<TH>
	   Dosage Form<TH>Smallest unit<TH>Unit Size<TH>Type of Packaging <TH>
	   Price per Unit<TH>Total Cost<TH>Quantity of Unit<TH>Presentation<TH>Inco Term<TH>
	   Date of Bid<TH>Currency<TH>Transportation<TH>Provider Manuf. Name<TH>Provider Type</TR>\n"; 

	   echo "</TABLE>\n";
	 
  }
  else
  {
	 echo "<B> Error at execution of the request. </B><BR>\n";
	 echo "<B> MYSQL Message : </B> " . mysqli_error($connexion);
  }
 ?>
</body>
</html>
