<?php
// session_start();
// echo "pickareport.php   VALEUR DE ACCESS: {$_SESSION['Access']}";
// echo "pickareport.php var de session COUNTRY: {$_SESSION['COUNTRY']}";
// echo "pickareport.php   var de session STATCOUNTRY: {$_SESSION['STATUS']}";
//echo "pickareport.php var de session user_name: {$_SESSION['username']}";
 require_once ("utilang_en.php");
?>
<html>
<head>
<title>manage_form_ins.php</title>
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
<STYLE TYPE="text/css">
BODY {
	scrollbar-face-color: #0069B3;
	scrollbar-shadow-color: #000000;
	scrollbar-highlight-color: #FFFFFF;
	scrollbar-3dlight-color: #000000;
	scrollbar-darkshadow-color: #000000;
	scrollbar-track-color: #0069B3;
	scrollbar-arrow-color: #FFCC00;
	background-color: #666666;
}</STYLE>
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
.Style1 {color: #993300}
.Style3 {color: #003366}
.Style6 {	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-weight: bold;
	color: #00FF00;
}
.Style13 {color: #FFFF00; font-weight: bold; }
.Style14 {color: #990000}
.Style17 {color: #FFFFFF; font-family: Arial, Helvetica, sans-serif; }
.Style21 {color: #FFFFFF; font-family: Arial, Helvetica, sans-serif; font-size: 14px; }
.Style22 {font-weight: bold; font-size: 14px; color: #990000; }
.Style23 {font-size: 14px; color: #FFFFFF;}
.Style24 {color: #FFFF66}
.Style48 {
	font-family: Arial, Helvetica, sans-serif;
	color: #CCCC99;
	font-size: 12px;
}


.Style52 {
	color: #666666;
	font-style: italic;
	font-size: 9px;
}
.Style54 {font-size: 14px;}
.Style56 {
	font-size: 16px;
	color: #0000FF;
}
.Style64 {color: #000033}
.Style65 {font-size: 14px; color: #000033; }
.Style71 {color: #0000FF}
.Style73 {color: #006600;}
.Style78 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-weight: bold;
}
.Style81 {color: #666666}
.Style108 {color: #990000; font-weight: bold;}
.Style109 {font-weight: bold}
.Style106 {	font-size: 18px;
	color: #990000;
	font-weight: bold;
}
-->
</style>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></head>

<center>

<body alink="#006699" class="sb">

<div id="Layer1" style="position:absolute; left:212px; top:4px; width:577px; height:11px; z-index:1; background-color: #FFFFD6; layer-background-color: #FFFFD6; border: 1px none #000000;">
  <div align="center" class="Style1"><span class="Style14"><strong>C</strong></span><span class="Style3">OORDINATED </span> <span class="Style108">I</span><span class="Style3">NFORMED <span class="Style14"><strong>B</strong></span>UYING SYSTEM WEBSITE</span></div>
</div>
<div id="Layer4" style="position:absolute; left:22px; top:79px; width:164px; height:17px; z-index:4; background-color: #CCCC99; layer-background-color: #CCCC99; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 10px; border: 1px none #000000;">
  <div align="center"><a href="../en/index.php" class="Style1"><span class="Style14">English</span></a> | <a href="../fr/index.php" class="Style1"><span class="Style14">French</span></a> | <span class="Style56 Style81"><a href="" class="Style1"><span class="Style52">Portuguese</span></a></span> </div>
</div>
<center>

<!--||| Tableau du début avec des graphiques pour la navigation principale, les graphiques par thème doivent être remplacés par vos propres graphiques de thème modifiés par un programme graphique. N'y insérez aucun espace ou passage à la ligne manuel. |||-->

  <table width="575" border="1" cellpadding="0" cellspacing="0">
  <tr>
        <td width="571">
        <div id="Layer1" style="position:absolute; left:816px; top:3px; width:162px; height:72px; z-index:1"><img name="carteooas" src="../images/carteooas.jpg" width="162" height="71" alt=""></div>
        <div id="Layer2" style="position:absolute; left:27px; top:0px; width:81px; height:69px; z-index:2; background-color: #000099; layer-background-color: #000099; border: 1px none #000000;"><img name="logooaas" src="../images/logoooas.jpg" width="90" height="80" alt=""> </div>
		</td>
  </tr>
  <tr>
        <td>
    	<p><img src="../images/med_1.jpg" alt="tApplication Access" name="espacereserve" width="119" height="48" align="middle"><span class="sub"><img src="blisters.jpg" width="118" height="48" align="middle"><img src="../images/med_1.jpg" alt="tApplication Access" name="espacereserve" width="109" height="44" align="middle"><img src="blisters.jpg" width="111" height="46" align="middle"><img src="../images/med_1.jpg" alt="tApplication Access" name="espacereserve" width="113" height="48" align="middle"></span></p>   	  </td>
  </tr>  
  <tr>
        <td bgcolor="#FFFFD6"> <div align="center"><span class="Style8"><a href="index.php" class="Style6"> <span class="Style73"> Home page</span> </a><span class="Style73">| </span><a href="pickareport.php" class="Style6">
     	  <span class="Style73">Reports </span></a><span class="Style73">|</span><a href="pickaform.php"><span class="Style73 Style78"> Consultation</span> </a> 
	 	  <span class="Style31 Style73"></span> </span>
      </div></td>
  </tr>
  <tr>
    <tr>
<td bgcolor="#FFFFD6"><p align="center"><a href="access.php" class="Style10"><span class="Style12 Style3 Style14"><span class="Style107"><a href="access.php" class="Style10"><span class="Style12 Style14"><span class="Style106">A</span><span class="Style108">PPLICATION ACCESS</span></span></a>  </p>  </td>
</tr>
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
    <h2 align="center" class="Style64">Data Input</h2>
    <div id="Layer6" style="position:absolute; left:241px; top:281px; width:200px; height:20px; z-index:6; background-color: #CCCCCC; layer-background-color: #CCCCCC; border: 1px none #000000;">
      <div align="center" class="Style3 Style22"><strong><a href="t_search_param_buying_control_ins.php" class="Style5"><span
  class="Style3"><strong>Data control</strong></span></a> </strong></div>
    </div>
    <div id="Layer6" style="position:absolute; left:241px; top:233px; width:200px; height:20px; z-index:6; background-color: #CCCCCC; layer-background-color: #CCCCCC; border: 1px none #000000;">
      <div align="center" class="Style3 Style22"><strong><a href="t_search_param_buying_categ_control_ins.php" class="Style5"><span
  class="Style3"><strong>Data input </strong></span></a></strong></div>
    </div>
    <h2 class="Style13 Style24 Style50">&nbsp;</h2>
    <div id="Layer6" style="position:absolute; left:24px; top:177px; width:48px; height:17px; z-index:6; background-color: #CCCCCC; layer-background-color: #CCCCCC; border: 1px none #000000;">
      <div align="center" class="Style3 Style22"><strong><a href="affiche_maincib.php" class="Style5"><span
  class="Style22"><strong>Back</strong></span></a> </strong></div>
    </div>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <div id="Layer6" style="position:absolute; left:241px; top:328px; width:200px; height:20px; z-index:6; background-color: #CCCCCC; layer-background-color: #CCCCCC; border: 1px none #000000;">
      <div align="center" class="Style3 Style22"><strong><a href="aic_form_buying_update.php" class="Style5"><span
  class="Style3"><strong>Data modification</strong></span></a> </strong></div>
    </div>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <div id="Layer6" style="position:absolute; left:242px; top:376px; width:200px; height:20px; z-index:6; background-color: #CCCCCC; layer-background-color: #CCCCCC; border: 1px none #000000;">
      <div align="center" class="Style3 Style22"><strong><a href="aic_form_buying_delete.php" class="Style5"><span
  class="Style3"><strong>Data deletion</strong></span></a> </strong></div>
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
 <p align="left"> <img src="../images/cibjuin2009.JPG" width="219" height="180" align="middle"></p> 
    <p align="left" class="Style70">
    <p class="Style71"><span class="Style54 Style64"><span class="Style64 Style54">Visit of the Pharmacie de Sant&eacute; Publique (Central store) in Abidjan - C&ocirc;te d'Ivoire during the CIB focal points focal points from June 18th to 20th, 2009. <strong>14</strong> countries attended this important meeting.</span></span></p>
    <p align="left"><span class="Style54 Style64"><img src="../images/cib01.JPG" width="219" height="180"></span></p>
    <p align="left" class="Style54 Style64">August 04-22, 2008, the CIB Manager visited 5 pilot countries ( <a href="../doc/rpmissiongb0808.doc" class="Style108"> <span class="Style14">Guinea</span> <span class="Style14">Bissau</span> </a> , <a href="../doc/rpmissionga0808.doc" class="Style14 Style101 Style109"><span class="Style14">The</span> <span class="Style14">Gambia</span></a>, <a href="../doc/rpmissionbf0808.doc" class="Style14"> <span class="Style108">Burkina Faso</span></a>, <a href="../doc/rpmissionni0808.doc"> <span class="Style108">Nigeria</span></a> and <a href="../doc/rpmissionse0808.doc"><span class="Style14"><strong>Senegal</strong></span></a> to present and explain the use of the Website for the pilot phase. </p>
    <p align="left" class="Style54 Style64">September 24-28, 2007, Training CIB Workshop, Bobo-Dioulasso (Burkina Faso)</p>
    <p align="left" class="Style54"><span class="Style54 Style64">Updated list of <a href="../doc/CIBFocalPoints.doc" class="Style67"><strong><span class="Style14">appointed</span> <span class="Style14">CIB</span> <span class="Style14">focal</span> <span class="Style14">points</span></strong></a></span></p>
    <p align="left" class="Style65"><span class="Style54 Style64">We are excited to offer you the opportunity to view and query data from the CIB system. You will use an Excel spreadsheet to enter data; later you will be able to enter the data directly on the website.</span></p>
    <p align="left"></p>
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
    <p align="center"><span class="Style60"><span class="sub Style60">WAHO 2008 - CIB WEBSITE - PILOT PHASE - F. NEZZI</span></span>     
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

