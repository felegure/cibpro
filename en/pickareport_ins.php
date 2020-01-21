<?php
session_start();
/*
echo "pickareport_ins.php   VALEUR DE ACCESS: {$_SESSION['Access']}";
echo "pickareport_ins.php var de session COUNTRY: {$_SESSION['COUNTRY']}";
echo "pickareport_ins.php   var de session STATCOUNTRY: {$_SESSION['STATUS']}";
echo "pickareport_ins.php var de session user_name: {$_SESSION['username']}";
*/

?>
<html>
<head>
<title>Report list</title>
<link rel="stylesheet" href="styles.css" type="text/css">
<meta name="description"     content="Faites ici en une ou deux lignes, la description de ce fichier.">
<meta name="keywords"        content="keywords; 1, keywords; 2, etc...">
<meta name="author"         content="Felicien NEZZI,  WAHO 2007">
<meta name="Funtion"   content="CIB MANAGER, fnezzi@wahooas.org">
<meta name="Date"        content="2007-03-31T08:00+00:00">
<!-- date et heure exemple: 31/03/2007, 08:00 heures, +0 heure. par rapport à Greenwich -->
<meta name="DC.Language"    content="en">
<!-- fr = fran&ccedil;ais -->
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
//-->
</script>
<style type="text/css">
<!--
.Style1 {color: #993300}
.Style3 {color: #003366}
.Style4 {
	color: #006600;
	font-weight: bold;
}
.Style5 {color: #CCCCCC}
.Style8 {
	color: #003366;
	font-weight: bold;
}
.Style10 {color: #993300; font-weight: bold; }
.Style19 {
	font-size: 24px;
	color: #993300;
	font-weight: bold;
}
.Style21 {
	color: #003366;
	font-size: 24px;
	font-weight: bold;
}
.Style22 {font-size: 24px}
-->
</style>
</head>

</div>
<center>

<body bgcolor="#336699" alink="#006699" class="sb">
<div id="Layer3" style="position:absolute; left:23px; top:125px; width:101px; height:23px; z-index:3; font-family: Verdana, Arial, Helvetica, sans-serif; color: #FFFF00;"><a href="Affiche_maincib.php">Back to Menu</a></div>
<center>

<div id="Layer3" style="position:absolute; left:330px; top:100px; width:310px; height:50px; z-index:3; background-color: #CCCCCC; layer-background-color: #CCCCCC; border: 1px none #000000;">
  <p align="center" class="Style3"><a href="viewlPriceLow_ins.php" class="Style5"><span class="Style21">Lowest Price (List)</span></a></p>
</div>
</div>
<div id="Layer6" style="position:absolute; left:330px; top:180px; width:310px; height:50px; z-index:6; background-color: #CCCCCC; layer-background-color: #CCCCCC; border: 1px none #000000;">
  <div align="center" class="Style3 Style22"><strong><a href="t_search_price_range_2_ins.php" class="Style5"><span
  class="Style3"><strong>Lowest Price per Period</strong></span></a> </div>
</div>
<div id="Layer8" style="position:absolute; left:330px; top:260px; width:310px; height:50px; z-index:8; background-color: #CCCCCC; layer-background-color: #CCCCCC; border: 1px none #000000;">
  <p align="center" class="Style4"><a href="viewlSupplier_ins.php" class="Style5"><span class="Style3"><span class="Style8 Style22">Supplier's list</span></a></p>
</div>
<div id="Layer9" style="position:absolute; left:329px; top:340px; width:310px; height:50px; z-index:9; background-color: #CCCCCC; layer-background-color: #CCCCCC; border: 1px none #000000;">
  <p align="center" class="Style4"><a href="viewlManufacturer_ins.php" class="Style5"><span class="Style3"><span class="Style3 Style22"><strong>Manufacturer's list</strong></span></a></p>
</div>
<p>&nbsp;</p>

<center>

<!--||| Tableau du début avec des graphiques pour la navigation principale, les graphiques par thème doivent être remplacés par vos propres graphiques de thème modifiés par un programme graphique. N'y insérez aucun espace ou passage à la ligne manuel. |||-->


<table width="563" border="0" cellpadding="0" cellspacing="0">
	<tr>
      <td width="563">
        <div id="Layer1" style="position:absolute; left:812px; top:2px; width:163px; height:72px; z-index:1"><img name="carteooas" src="../images/carteooas.jpg" width="162" height="71" alt=""></div>
        <div id="Layer2" style="position:absolute; left:27px; top:2px; width:80px; height:69px; z-index:2"><img name="logooaas" src="../images/logoooas.jpg" width="80" height="80" alt=""> </div></td>
    </tr>
	<tr>
<td>



<!--||| Fin du tableau de navigation principale |||-->



<!--||| Début du tableau de sous-navigation |||-->

<!--||| Fin du tableau de sous-navigation |||-->
<!--||| Début du tableau avec contenu |||-->
<table bgcolor="#CCCC99" border="0" cellspacing="0" cellpadding="0">
<tr>
<!--||| Début de la colonne de texte gauche |||-->
<td width="755" height="541" valign="top">
<table width="575" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
      <!--||| Le premier point montre la page actuelle et n'a donc aucun lien. Les liens de subdivision = le sous-menu est à  adapter ici. |||-->
    </td>
  </tr>
</table>
<div id="Layer1" style="position:absolute; left:209px; top:2px; width:575px; height:11px; z-index:1; background-color: #CCCCCC; layer-background-color: #CCCCCC; border: 1px none #000000;">
  <div align="center" class="Style1"><strong>C</strong><span class="Style3">OORDINATED </span> <strong>I</strong><span class="Style3">NFORMED<span class="Style10"> B</span>UYING SYSTEM WEBSITE - PROTOTYPE </span></div>
</div>
<div align="center"><span class="Style19"> Reports</span>
</div>
<p align="center">
<span class="text">
<!--||| Insérer ici le titre et le texte N°1 désirés |||-->
<b>
<div align="center"></div>
</b></span>
<p class="text">&nbsp;</p>
<p class="text">&nbsp;</p>
<p class="text">&nbsp;</p>
<p class="text">&nbsp;</p>
<p class="text"> <br></p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p><span class="text">          </span>  </p></td>
<!--||| Fin  de la colonne de texte gauche |||-->
</tr>
</table>

<!--||| Fin du tableau avec contenu |||-->



<!--||| Début du pied de page, insérer ici votre adresse électonique exacte et votre nom. |||-->

<div align="center">
  <p><br>
	  </p>
  <p><span class="sub">WAHO 2007 - CIB WEBSITE - PROTOTYPE - F. NEZZI </span><br>

        <br>
      &nbsp;<br>

      <!--||| Fin du pied de page |||-->
      </p>
  </div>
</body>
</html>