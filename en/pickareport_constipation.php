<?php
session_start();
// echo "pickareport.php   VALEUR DE ACCESS: {$_SESSION['Access']}";
// echo "pickareport.php var de session COUNTRY: {$_SESSION['COUNTRY']}";
// echo "pickareport.php   var de session STATCOUNTRY: {$_SESSION['STATUS']}";
//echo "pickareport.php var de session user_name: {$_SESSION['username']}";
 require_once ("utilang.php");
?>
<html>
<head>
<title>Data Report Page Sub-Menu - Pickareport.php</title>
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

.Style7 {color: #FFFF00}
.Style13 {color: #FFFF66; font-weight: bold; }
.Style14 {color: #990000}
.Style17 {color: #FFFFFF; font-family: Arial, Helvetica, sans-serif; }
.Style22 {font-weight: bold; font-size: 14px; color: #990000; }
.Style24 {color: #FFFF66}
.Style40 {color: #0000CC; font-family: Arial, Helvetica, sans-serif; }
.Style48 {
	font-family: Arial, Helvetica, sans-serif;
	color: #CCCC99;
	font-size: 18px;
}


.Style52 {
	color: #666666;
	font-style: italic;
	font-size: 9px;
}
.Style64 {color: #000033}
.Style66 {color: #000000}
.Style69 {color: #0000FF; font-weight: bold; }
.Style71 {color: #0000FF}
.Style73 {color: #006600;}
.Style99 {color: #990000; font-weight: bold;}
.Style100 {font-size: 18px}
.Style101 {color: #003366; font-weight: bold; }
.Style103 {font-family: Arial, Helvetica, sans-serif}
.Style104 {font-weight: bold; font-size: 18px; color: #990000; }
.Style105 {color: #FFFFFF}
-->
</style>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></head>

<center>

<body alink="#006699" class="sb">

<div id="Layer1" style="position:absolute; left:212px; top:4px; width:577px; height:11px; z-index:1; background-color: #FFFFD6; layer-background-color: #FFFFD6; border: 1px none #000000;">
  <div align="center" class="Style1"><span class="Style14"><strong>C</strong></span><span class="Style3">OORDINATED </span> <span class="Style99">I</span><span class="Style3">NFORMED <span class="Style14"><strong>B</strong></span>UYING SYSTEM WEBSITE</span></div>
</div>
<div id="Layer4" style="position:absolute; left:23px; top:79px; width:164px; height:17px; z-index:4; background-color: #CCCC99; layer-background-color: #CCCC99; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 10px; border: 1px none #000000;">
  <div align="center"><a href="../en/index.php" class="Style1"><span class="Style14">English</span></a> |<a href="../fr/index.php" class="Style14"> </a><a href="../fr/index.php" class="Style1"><span class="Style14">French</span></a> | <a href="" class="Style1"><span class="Style52">Portuguese</span></a><a href="../por/index.php" class="Style1"></a> </div>
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
    <td><img src="../images/med_1.jpg" alt="tApplication Access" name="espacereserve" width="119" height="48" align="middle"><span class="sub"><img src="blisters.jpg" width="118" height="48" align="middle"><img src="../images/med_1.jpg" alt="tApplication Access" name="espacereserve" width="109" height="44" align="middle"><img src="blisters.jpg" width="111" height="46" align="middle"><img src="../images/med_1.jpg" alt="tApplication Access" name="espacereserve" width="113" height="48" align="middle"></span></td>
  </tr>
  <tr>
        
  </tr>  
  <tr>
        <td bgcolor="#FFFFD6"> <div align="center"><span class="Style8"><a href="index.php" class="Style6"> <span class="Style73"> Home page</span> </a><span class="Style8"><span class="Style73">| </span><a href="pickareport_cons.php" class="Style6"><span class="Style64">Reports </span></a></span><span class="Style8"><span class="Style8"> 
 	      </span></span></div></td>
  </tr>
  <tr>
<td bgcolor="#FFFFD6"><p align="center"><a href="access.php" class="Style10"><span class="Style12 Style3 Style14"><span class="Style104">APPLICATION ACCESS</span></span></a> </p>  </td>
</tr>
  </table>
<div align="right" class="Style48">
    	<?php 
      $today = date ("  M ,D j,Y  H:i:s");
      echo " $today ";
    ?>
  </div>
<div class="Style100" id="main">
<div class="Style17" id="col11"> 
    <h2 align="center" class="Style13"><span class="Style64">Reports (available)</span> </h2>
    <div id="Layer6" style="position:absolute; left:24px; top:177px; width:104px; height:17px; z-index:6; background-color: #CCCCCC; layer-background-color: #CCCCCC; border: 1px none #000000;">
      <div align="center" class="Style101"><strong><a href="affiche_maincib.php" class="Style5"><span
  class="Style99"><strong>Back to Menu</strong></span></a> </strong></div>
    </div>
    <div id="Layer6" style="position:absolute; left:175px; top:186px; width:375px; height:39px; z-index:6; background-color: #CCCCCC; layer-background-color: #CCCCCC; border: 1px none #000000;">
      <div align="center" class="Style101">
        <p><strong><span
  class="Style3"><strong> <span class="Style22 Style57  Style71"><span class="Style22 Style59  Style7"><span class="Style3">List of products by suppliers with the lowest price  within a period</span></span></span></strong></span></strong></p>
        </div>
    </div>
    <div id="Layer6" style="position:absolute; left:179px; top:207px; width:25px; height:16px; z-index:6; background-color: #009900; layer-background-color: #009900; border: 1px none #000000;">
       <div align="center" class="Style101"><a href="t_search_price_range_dol_c.php" class="Style3">$</a></div>
     </div>
     <div id="Layer6" style="position:absolute; left:523px; top:208px; width:23px; height:16px; z-index:6; background-color: #2176B5; layer-background-color: #2176B5; border: 1px none #000000;">
      <div align="center" class="Style101"><a href="t_search_price_range_eur_c.php" class="Style55  Style3">&euro;</a></div>
    </div>
     <div id="Layer6" style="position:absolute; left:208px; top:264px; width:25px; height:16px; z-index:6; background-color: #009900; layer-background-color: #009900; border: 1px none #000000;">
       <div align="center" class="Style101"><a href="aic_list_prod_per_supman_dol.php" class="Style3">$</a></div>
     </div>
     <div id="Layer6" style="position:absolute; left:178px; top:266px; width:25px; height:16px; z-index:6; background-color: #009900; layer-background-color: #009900; border: 1px none #000000;">
       <div align="center" class="Style101"><a href="t_search_supman_dol.php" class="Style3">$</a></div>
     </div>
     <div id="Layer6" style="position:absolute; left:175px; top:250px; width:375px; height:37px; z-index:6; background-color: #CCCCCC; layer-background-color: #CCCCCC; border: 1px none #000000;">
      <div align="center" class="Style101"><span class="Style53"><strong><strong><strong><span
  class="Style3"><strong><span class="Style3"><strong><strong>List of products per suppliers and manufacturers per</strong></strong> period </span></strong></span></strong></strong></strong></span></div>
    </div>
    <div id="Layer6" style="position:absolute; left:175px; top:311px; width:375px; height:37px; z-index:6; background-color: #CCCCCC; layer-background-color: #CCCCCC; border: 1px none #000000;">
      <div align="center" class="Style101">
        <div id="Layer6" style="position:absolute; left:3px; top:18px; width:25px; height:16px; z-index:6; background-color: #009900; layer-background-color: #009900; border: 1px none #000000; font-style: italic;">
          <div align="center" class="Style101"><a href="t_search_price_supp_range_dol_c.php" class="Style3">$</a></div>
        </div>
        <span class="Style3"><span
  class="Style3"><strong><span class="Style3"><strong><strong>L</strong></strong></span></strong><span class="Style3">ist of products group by supplier within a period of time</span> </span></span>
        <div id="Layer6" style="position:absolute; left:347px; top:17px; width:25px; height:16px; z-index:6; background-color: #2176B5; layer-background-color: #2176B5; border: 1px none #000000;">
          <div align="center" class="Style101"><a href="t_search_price_supp_range_eur_c.php" class="Style55  Style3">&euro;</a></div>
        </div>
      </div>
    </div>
    <div id="Layer6" style="position:absolute; left:178px; top:266px; width:25px; height:16px; z-index:6; background-color: #009900; layer-background-color: #009900; border: 1px none #000000;">
      <div align="center" class="Style101"><a href="t_search_supman_dol_c.php" class="Style3">$</a></div>
    </div>
    <div id="Layer6" style="position:absolute; left:520px; top:267px; width:25px; height:18px; z-index:6; background-color: #2176B5; layer-background-color: #2176B5; border: 1px none #000000;">
      <div align="center" class="Style101"><a href="t_search_supman_eur_c.php" class="Style55  Style3">&euro;</a></div>
    </div>
    <div id="Layer7" style="position:absolute; left:175px; top:369px; width:375px; height:25px; z-index:6; background-color: #CCCCCC; layer-background-color: #CCCCCC; border: 1px none #000000;">
      <div align="center" class="Style101"><strong><strong><a href="aic_list_supplier_summary_c.php"><strong><strong><strong><strong><strong><strong><span class="Style3">List</span> <span class="Style3">of</span> <span class="Style3">suppliers</span> <span class="Style3">with</span> <span class="Style3">contacts</span></strong></strong></strong></strong></strong></strong></a></strong></strong></div>
    </div>
    <div id="Layer7" style="position:absolute; left:175px; top:415px; width:375px; height:25px; z-index:6; background-color: #CCCCCC; layer-background-color: #CCCCCC; border: 1px none #000000;">
      <div align="center" class="Style3"><span class="Style101"><strong><strong><a href="aic_list_manuf_summary_c.php"><span class="Style3"><strong><strong><strong><strong><strong><strong>List of manufacturers with contacts</strong></strong></strong></strong></strong></strong></span></a></strong></strong></span></div>
    </div>
    <p class="Style103">&nbsp;</p>
    </div> 
  <div class="Style17" id="col1">
    <body onLoad="defil()" onUnload="clearTimeout(tempo2)" bgcolor="#0069B3">
<FORM NAME="defil" class="Style24">
  <p align="left"><img src="../images/cibjuin2009.JPG" width="219" height="180" align="middle"></p>
  <p align="left" class="Style70">
  <p class="Style71"><span class="Style54 Style64"><span class="Style64 Style54">Visit of the Pharmacie de Sant&eacute; Publique (Central store) in Abidjan - C&ocirc;te d'Ivoire during the CIB focal points focal points from June 18th to 20th, 2009. <strong>14</strong> countries attended this important meeting.</span></span></p>
  <p align="left"><span class="Style54 Style64"><img src="../images/cib01.JPG" width="219" height="180"></span></p>
  <p align="left" class="Style54 Style64">August 04-22, 2008, the CIB Manager visited 5 pilot countries ( <a href="../doc/rpmissiongb0808.doc" class="Style99"> <span class="Style14">Guinea</span> <span class="Style14">Bissau</span> </a> , <a href="../doc/rpmissionga0808.doc" class="Style14 Style101"><span class="Style14">The</span> <span class="Style14">Gambia</span></a>, <a href="../doc/rpmissionbf0808.doc" class="Style14"> <span class="Style99">Burkina Faso</span></a>, <a href="../doc/rpmissionni0808.doc"> <span class="Style99">Nigeria</span></a> and <a href="../doc/rpmissionse0808.doc"><span class="Style14"><strong>Senegal</strong></span></a> to present and explain the use of the Website for the pilot phase. </p>
  <p align="left" class="Style54 Style64">September 24-28, 2007, Training CIB Workshop, Bobo-Dioulasso (Burkina Faso)</p>
  <p align="left" class="Style54"><span class="Style54 Style64">Updated list of <a href="../doc/CIBFocalPoints.doc" class="Style67"><strong><span class="Style14">appointed</span> <span class="Style14">CIB</span> <span class="Style14">focal</span> <span class="Style14">points</span></strong></a></span></p>
  <p align="left" class="Style65"><span class="Style54 Style64">We are excited to offer you the opportunity to view and query data from the CIB system. You will use an Excel spreadsheet to enter data; later you will be able to enter the data directly on the website.</span></p>
  <p>
    <SCRIPT LANGUAGE="JavaScript">
document.write('<INPUT TYPE="text" NAME="defilbox" SIZE=' + size + '>');
  </SCRIPT>
  </p>
</FORM>
    <p align="left"><img src="../images/cibjuin2009.JPG" width="219" height="180" align="middle"></p>
    <p align="left" class="Style70">
    <p class="Style71"><span class="Style54 Style64"><span class="Style64 Style54">Visit of the Pharmacie de Sant&eacute; Publique (Central store) in Abidjan - C&ocirc;te d'Ivoire during the CIB focal points focal points from June 18th to 20th, 2009. <strong>14</strong> countries attended this important meeting.</span></span></p>
    <p align="left"><span class="Style54 Style64"><img src="../images/cib01.JPG" width="219" height="180"></span></p>
    <p align="left" class="Style54 Style64">August 04-22, 2008, the CIB Manager visited 5 pilot countries ( <a href="../doc/rpmissiongb0808.doc" class="Style99"> <span class="Style14">Guinea</span> <span class="Style14">Bissau</span> </a> , <a href="../doc/rpmissionga0808.doc" class="Style14 Style101"><span class="Style14">The</span> <span class="Style14">Gambia</span></a>, <a href="../doc/rpmissionbf0808.doc" class="Style14"> <span class="Style99">Burkina Faso</span></a>, <a href="../doc/rpmissionni0808.doc"> <span class="Style99">Nigeria</span></a> and <a href="../doc/rpmissionse0808.doc"><span class="Style14"><strong>Senegal</strong></span></a> to present and explain the use of the Website for the pilot phase. </p>
    <p align="left" class="Style54 Style64">September 24-28, 2007, Training CIB Workshop, Bobo-Dioulasso (Burkina Faso)</p>
    <p align="left" class="Style54"><span class="Style54 Style64">Updated list of <a href="../doc/CIBFocalPoints.doc" class="Style67"><strong><span class="Style14">appointed</span> <span class="Style14">CIB</span> <span class="Style14">focal</span> <span class="Style14">points</span></strong></a></span></p>
    <p align="left" class="Style65"><span class="Style54 Style64">We are excited to offer you the opportunity to view and query data from the CIB system. You will use an Excel spreadsheet to enter data; later you will be able to enter the data directly on the website.</span></p>
  </div> 
</div> 
<center class="Style104">
  <div align="left">
    <p align="left" class="Style105">&nbsp; </p>
  </div>

  <p align="left" class="Style105">&nbsp;</p>
  </center>
<div align="left" class="Style100">
  <p align="left" class="Style17">&nbsp;</p>
</div>
</center>


<center class="Style100">
  <p>&nbsp;<br>
    <br>
    
    
  <p>&nbsp;<br>
    <span class="Style60"><span class="sub  Style60">WAHO 2008 - CIB WEBSITE - PILOT PHASE - F. NEZZI</span></span>
    <!--||| Fin du pied de page |||-->
  <p>&nbsp;</p>
</center>
</body>
</html>

