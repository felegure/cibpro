<?php
session_start();

 require_once ("utilang.php");
?>
<html>
<head>
<title>Pickareport.php</title>
<link rel="stylesheet" href="styles.css" type="text/css">
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
<STYLE TYPE="text/css">BODY {scrollbar-face-color: #0069B3; scrollbar-shadow-color: #000000;scrollbar-highlight-color: #FFFFFF;scrollbar-3dlight-color: #000000; scrollbar-darkshadow-color: #000000; scrollbar-track-color: #0069B3; scrollbar-arrow-color: #FFCC00;}</STYLE>
<!-- DEBUT DU SCRIPT -->
<SCRIPT LANGUAGE="JavaScript">
size=20;
x = 3*size;
place = 0;
texte = 'NEWS !';
texteDef = texte;
function defil()
	{
	texteDef = texteDef.substring(1,texteDef.length);
	while(texteDef.length < x)
		{
		texteDef += " - " + texte;
		}
	document.defil.defilbox.value = texteDef;
	tempo2 = setTimeout("defil()", 200)
	}

</script>

<style type="text/css">
<!--

.Style7 {color: #FFFF00}
.Style13 {color: #FFFF00; font-weight: bold; }
.Style14 {color: #990000}
.Style22 {font-weight: bold; font-size: 14px; color: #990000; }
.Style24 {color: #FFFF66}
.Style39 {font-family: Arial, Helvetica, sans-serif}
.Style50 {font-size: 18px}
.Style5 {color: #CCCCCC}
.Style52 {color: #00FF00}
-->
</style>
</head>

<center>

<body bgcolor="#336699" alink="#006699" class="sb">

<div id="Layer1" style="position:absolute; left:210px; top:4px; width:575px; height:11px; z-index:1; background-color: #CCCCCC; layer-background-color: #CCCCCC; border: 1px none #000000;">
  <div align="center" class="Style1"><span class="Style71"><strong>C</strong></span><span class="Style3">OORDINATED </span> <span class="Style71"><strong>I</strong></span><span class="Style3">NFORMED <span class="Style71"><strong>B</strong></span>UYING SYSTEM WEBSITE - PILOT PHASE</span></div>
</div>
<div id="Layer4" style="position:absolute; left:22px; top:79px; width:164px; height:17px; z-index:4; background-color: #CCCC99; layer-background-color: #CCCC99; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 10px; border: 1px none #000000;">
  <div align="center"><a href="../en/index.php" class="Style1"><span class="Style14">English</span></a> |<a href="../fr/index.php" class="Style14"> </a><a href="../fr/index.php" class="Style1"><span class="Style14">Fran&ccedil;ais</span></a> |<a href="../por/index.php" class="Style1"><span class="Style14">Portugese</span></a> </div>
</div>
<center>

<!--||| Tableau du début avec des graphiques pour la navigation principale, les graphiques par thème doivent être remplacés par vos propres graphiques de thème modifiés par un programme graphique. N'y insérez aucun espace ou passage à la ligne manuel. |||-->

  <table width="576" border="1" cellpadding="0" cellspacing="0">
  <tr>
        <td width="572">
        <div id="Layer1" style="position:absolute; left:816px; top:3px; width:162px; height:72px; z-index:1"><img name="carteooas" src="../images/carteooas.jpg" width="162" height="71" alt=""></div>
        <div id="Layer2" style="position:absolute; left:29px; top:0px; width:81px; height:69px; z-index:2; background-color: #000099; layer-background-color: #000099; border: 1px none #000000;"><img name="logooaas" src="../images/logoooas.jpg" width="80" height="80" alt=""> </div>
		</td>
  </tr>
  <tr>
        <td>
    	<p>&nbsp;</p>
    	<p>&nbsp;</p>
		</td>
  </tr>  
  <tr>
        <td> <div align="center"><span class="Style8"><a href="index.php" class="Style6"> <span class="Style6"> Home page</span> </a><span class="Style13 Style7">| </span><a href="project.php" class="Style6">
     	  <span class="Style6">The Project </span></a><span class="Style13 Style7">|</span><a href="partners.php"><span class="Style6 Style52"> Partners </span> </a><span class="Style8"><a href="index.php" class="Style6"> </a><span class="Style13 Style7">| </span><a href="pickareport.php" class="Style6">
     	  <span class="Style6 Style24">Reports </span></a><span class="Style13 Style7">|</span><a href="pickaform.php"><span class="Style6"> Consultation</span> </a> 
	 	  <span class="Style13 Style7">|</span></span> 
	 	  </span></div></td>
  </tr>
  <tr>
<td bgcolor="#CCCC99"><p align="center"><a href="access.php" class="Style10"><span class="Style12 Style3 Style14"><span class="Style22">APPLICATION ACCESS</span></span></a> </p>  </td>
</tr>

  </table>
<div align="right" class="Style48">
    	<?php 
      $today = date ("  M ,D j,Y  H:i:s");
      echo " $today ";
    ?>
  </div>
<div id="main">
<div class="Style17" id="col11"> 
    <h2 align="center" class="Style13 Style24">Reports (available) </h2>
    <div id="Layer6" style="position:absolute; left:230px; top:234px; width:200px; height:20px; z-index:6; background-color: #CCCCCC; layer-background-color: #CCCCCC; border: 1px none #000000;">
      <div align="center" class="Style3 Style22"><strong><a href="t_search_price_range_2.php" class="Style5"><span
  class="Style3"><strong>Price per Period</strong></span></a> </strong></div>
    </div>
    <div id="Layer6" style="position:absolute; left:230px; top:193px; width:200px; height:20px; z-index:6; background-color: #CCCCCC; layer-background-color: #CCCCCC; border: 1px none #000000;">
      <div align="center" class="Style3 Style22"><strong><a href="viewlPriceLow.php" class="Style5"><span
  class="Style3"><strong>Price (List)</strong></span></a> </strong></div>
    </div>
    <h2 class="Style13 Style24 Style50">&nbsp;</h2>
    <div id="Layer6" style="position:absolute; left:24px; top:177px; width:48px; height:17px; z-index:6; background-color: #CCCCCC; layer-background-color: #CCCCCC; border: 1px none #000000;">
      <div align="center" class="Style3 Style22"><strong><a href="Affiche_maincib.php" class="Style5"><span
  class="Style22"><strong>Back</strong></span></a> </strong></div>
    </div>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <div id="Layer6" style="position:absolute; left:230px; top:277px; width:200px; height:20px; z-index:6; background-color: #CCCCCC; layer-background-color: #CCCCCC; border: 1px none #000000;">
      <div align="center" class="Style3 Style22"><strong><a href="viewlSupplier.php" class="Style5"><span
  class="Style3"><strong>Suppliers' list</strong></span></a> </strong></div>
    </div>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p class="Style13 Style24 Style50">&nbsp;</p>
    <div id="Layer6" style="position:absolute; left:230px; top:319px; width:200px; height:20px; z-index:6; background-color: #CCCCCC; layer-background-color: #CCCCCC; border: 1px none #000000;">
      <div align="center" class="Style3 Style22"><strong><a href="viewlManufacturer.php" class="Style5"><span
  class="Style3"><strong>Manufacturer's  list</strong></span></a> </strong></div>
    </div>
    <p class="Style39">&nbsp;</p>
    </div> 
  <div class="Style17" id="col1">
    <body onLoad="defil()" onUnload="clearTimeout(tempo2)" bgcolor="#0069B3">
<FORM NAME="defil" class="Style24">
  <p>
    <SCRIPT LANGUAGE="JavaScript">
document.write('<INPUT TYPE="text" NAME="defilbox" SIZE=' + size + '>');
  </SCRIPT>
  </p>
</FORM>
    <p align="left"><span class="sub"><img src="../images/med_1.jpg" alt="tApplication Access" name="espacereserve" width="119" height="48" align="middle"><img src="blisters.jpg" width="118" height="48" align="middle"></span></p>
    <p align="center" class="Style23">September 24-28, 2007 Training CIB Workshop, Venue Bobo-Dioulasso (Burkina Faso)</p>
    <p align="center" class="Style23">Four countries (Senegal, Guinee Bissau, Nigeria and Togo) have submitted data for the CIB prototype using the <a href="../doc/Template%20CIB_English.xls">excel template</a>. </p>
    <p align="center" class="Style23"> Updated list of <a href="../doc/CIB%20Focal%20Points.doc"> Appointed CIB focal points</a></p>
    <p align="center" class="Style23">We are excited to offer you the opportunity to view, query data from the CIB system. To enter data, you will use use an excel spreadsheet and later you will be able to enter the data directly on the website.</p>
    </div> 
</div> 
<center class="Style22">
  <div align="left">
    <p align="left" class="Style23"><strong> </strong></p>
  </div>
</center>
<center class="Style22">
  <p align="left" class="Style23">&nbsp;</p>
  </center>
<div align="left">
  <p align="left" class="Style21">&nbsp;</p>
    <p align="left" class="Style21">&nbsp;</p>
    <p align="left" class="Style21">&nbsp;</p>
</div>
</center>


<center>
  <p>&nbsp;<br>
    <br>
  &nbsp;<br>
      
  <!--||| Fin du pied de page |||-->
</center>
</body>
</html>

