<?php
session_start();

 
require_once ("utilang.php");
?>
<html>
<head>
<title>Data Consultation Page Sub-Menu - Pickaform.php</title>
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
.Style13 {color: #FFFF00; font-weight: bold; }
.Style14 {color: #990000}
.Style17 {color: #FFFFFF; font-family: Arial, Helvetica, sans-serif; }
.Style19 {
	color: #ECE9D8;
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
}
.Style21 {color: #FFFFFF; font-family: Arial, Helvetica, sans-serif; font-size: 14px; }
.Style22 {font-weight: bold; font-size: 14px; color: #990000; }
.Style23 {font-size: 14px; color: #FFFFFF;}
.Style24 {color: #FFFF66}
.Style25 {color: #990000}
.Style28 {color: #0000CC}
.Style39 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
.Style40 {color: #0000CC; font-family: Arial, Helvetica, sans-serif; }
.Style46 {font-family: Verdana, Arial, Helvetica, sans-serif; font-weight: bold; color: #CCCCCC; }
.Style47 {font-family: Verdana, Arial, Helvetica, sans-serif; font-weight: bold; color: #0000FF; }
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
.Style60 {color: #D3D3D3}
.Style62 {color: #EBE9ED}
.Style63 {font-size: 14px; font-family: Arial, Helvetica, sans-serif;}
.Style64 {color: #000033}
.Style65 {font-size: 14px; color: #000033; }
.Style66 {color: #000000}
.Style67 {color: #0000FF}
.Style69 {color: #0000FF; font-weight: bold; }
.Style70 {font-size: 14px; font-family: Arial, Helvetica, sans-serif; color: #000033; }
.Style71 {color: #0000FF}
.Style72 {font-family: Verdana, Arial, Helvetica, sans-serif; font-weight: bold; color: #E3E9F1; }
.Style73 {color: #006600;}
.Style77 {font-size: 14px; color: #0000FF; }
.Style78 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-weight: bold;
}
.Style80 {color: #FFFFD6}
.Style81 {color: #666666}
-->
</style>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></head>

<center>

<body alink="#006699" class="sb">

<?php 
      require 'entete_rep.php' ;
   
    ?>
  <div align="right" class="Style48">
    	<?php 
      $today = date ("  M ,D j,Y  H:i:s");
      echo " $today ";
    ?>
  </div>
<div id="main">
<div class="Style17" id="col11"> 
    <h2 align="center" class="Style13 Style71 Style71"><span class="Style71">Consultation</span></h2>
    <div id="Layer6" style="position:absolute; left:388px; top:362px; width:200px; height:20px; z-index:6; background-color: #CCCCCC; layer-background-color: #CCCCCC; border: 1px none #000000;">
      <div align="center" class="Style3 Style22"><strong><a href="aic_form_manufacturer_view.php" class="Style5"><span
  class="Style3"><strong>Manufacturers list</strong></span></a> </strong></div>
    </div>
    <div id="Layer6" style="position:absolute; left:130px; top:209px; width:200px; height:20px; z-index:6; background-color: #CCCCCC; layer-background-color: #CCCCCC; border: 1px none #000000;">
      <div align="center" class="Style3 Style22"><strong><a href="aic_form_categ_view.php" class="Style5"><span
  class="Style3"><strong>Category list</strong></span></a> </strong></div>
    </div>
    <div id="Layer6" style="position:absolute; left:388px; top:285px; width:200px; height:20px; z-index:6; background-color: #CCCCCC; layer-background-color: #CCCCCC; border: 1px none #000000;">
      <div align="center" class="Style3 Style22"><strong><a href="aic_form_provider_view.php" class="Style5"><span
  class="Style3"><strong>Suppliers list </strong></span></a></strong>        </div>
    </div>
    <div id="Layer6" style="position:absolute; left:388px; top:247px; width:200px; height:20px; z-index:6; background-color: #CCCCCC; layer-background-color: #CCCCCC; border: 1px none #000000;">
      <div align="center" class="Style3 Style22"><strong><a href="aic_form_srcfund_view.php" class="Style5"><span
  class="Style3"><strong>Source of funding list </strong></span></a></strong> </div>
    </div>
    <div id="Layer6" style="position:absolute; left:388px; top:209px; width:200px; height:20px; z-index:6; background-color: #CCCCCC; layer-background-color: #CCCCCC; border: 1px none #000000;">
      <div align="center" class="Style3 Style22"><strong><a href="aic_form_cur_view.php" class="Style5"><span
  class="Style3"><strong>Currency list </strong></span></a></strong> </div>
    </div>
    <h2 class="Style13 Style24 Style50">&nbsp;</h2>
    <div id="Layer6" style="position:absolute; left:24px; top:177px; width:104px; height:17px; z-index:6; background-color: #CCCCCC; layer-background-color: #CCCCCC; border: 1px none #000000;">
      <div align="center" class="Style3 Style22"><strong><a href="affiche_maincib.php" class="Style5"><span
  class="Style22"><strong>Back to Menu</strong></span></a> </strong></div>
    </div>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <div id="Layer6" style="position:absolute; left:388px; top:403px; width:200px; height:20px; z-index:6; background-color: #CCCCCC; layer-background-color: #CCCCCC; border: 1px none #000000;">
      <div align="center" class="Style3 Style22"><strong><a href="aic_form_country_view.php" class="Style5"><span
  class="Style3"><strong>Country list</strong></span></a></strong></div>
    </div>
    <p>&nbsp;</p>
    <div id="Layer6" style="position:absolute; left:130px; top:285px; width:200px; height:20px; z-index:6; background-color: #CCCCCC; layer-background-color: #CCCCCC; border: 1px none #000000;">
      <div align="center" class="Style3 Style22"><strong><a href="aic_form_dosage_view.php" class="Style5"><span
  class="Style3"><strong>Dosage form list</strong></span></a> </strong></div>
    </div>
    <div id="Layer6" style="position:absolute; left:130px; top:247px; width:200px; height:20px; z-index:6; background-color: #CCCCCC; layer-background-color: #CCCCCC; border: 1px none #000000;">
      <div align="center" class="Style3 Style22"><strong><a href="aic_form_product_view.php" class="Style5"><span
  class="Style3"><strong>Product list</strong></span></a> </strong></div>
    </div>
    <div id="Layer6" style="position:absolute; left:130px; top:326px; width:200px; height:20px; z-index:6; background-color: #CCCCCC; layer-background-color: #CCCCCC; border: 1px none #000000;">
      <div align="center" class="Style3 Style22"><strong><a href="aic_form_concent_view.php" class="Style5"><span
  class="Style3"><strong>Concentration list</strong></span></a> </strong></div>
    </div>
    <div id="Layer6" style="position:absolute; left:388px; top:326px; width:200px; height:20px; z-index:6; background-color: #CCCCCC; layer-background-color: #CCCCCC; border: 1px none #000000;">
      <div align="center" class="Style3 Style22"><strong><a href="aic_form_transport_view.php" class="Style5"><span
  class="Style3"><strong>Transport list </strong></span></a></strong> </div>
    </div>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <div id="Layer6" style="position:absolute; left:130px; top:362px; width:200px; height:20px; z-index:6; background-color: #CCCCCC; layer-background-color: #CCCCCC; border: 1px none #000000;">
      <div align="center" class="Style3 Style22"><strong><a href="aic_form_present_view.php" class="Style5"><span
  class="Style3"><strong>Presentation list</strong></span></a> </strong></div>
    </div>
    <div id="Layer6" style="position:absolute; left:130px; top:403px; width:200px; height:20px; z-index:6; background-color: #CCCCCC; layer-background-color: #CCCCCC; border: 1px none #000000;">
      <div align="center" class="Style3 Style22"><strong><a href="aic_form_pack_view.php" class="Style5"><span
  class="Style3"><strong>Packaging list</strong></span></a> </strong></div>
    </div>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <div id="Layer6" style="position:absolute; left:130px; top:446px; width:200px; height:20px; z-index:6; background-color: #CCCCCC; layer-background-color: #CCCCCC; border: 1px none #000000;">
      <div align="center" class="Style3 Style22"><strong><a href="aic_form_smunit_view.php" class="Style5"><span
  class="Style3"><strong>Smallest unit list</strong></span></a> </strong></div>
    </div>
    <p>&nbsp;</p>
    <div id="Layer6" style="position:absolute; left:130px; top:487px; width:200px; height:20px; z-index:6; background-color: #CCCCCC; layer-background-color: #CCCCCC; border: 1px none #000000;">
      <div align="center" class="Style3 Style22"><strong><a href="aic_form_tinco_view.php" class="Style5"><span
  class="Style3"><strong>Inco Term list</strong></span></a> </strong></div>
    </div>
    <p>&nbsp;</p>
    <p class="Style13 Style24 Style50">&nbsp;</p>
    <div id="Layer6" style="position:absolute; left:388px; top:446px; width:200px; height:20px; z-index:6; background-color: #CCCCCC; layer-background-color: #CCCCCC; border: 1px none #000000;">
      <div align="center" class="Style3 Style22"><strong><a href="aic_form_ecowas_view.php" class="Style5"><span
  class="Style3"><strong>Ecowas countries list</strong></span></a> </strong></div>
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
<span class="Style8"><a href="index.php" class="Style6"></a></span>

 <p align="left"> <img src="../images/cibmars_3.JPG" width="219" height="180" align="middle"></p> 
	  <p align="left" class="Style70">
	  <p class="Style71"><span class="Style54 Style64">From March 18-20th, 2009 was held the CIB focal points workshop in Bobo-Dioulasso. All the <strong>15</strong> countries attended this important event.</p>

    <p align="left"><span class="sub"><img src="../images/cib01.JPG" width="219" height="180"></span></p>
    <p align="center" class="Style54 Style64">August 04-22, 2008, the CIB Manager visited 5 pilot countries (<span class="Style54"><a href="../doc/rpmissiongb0808.doc"><span class="Style66"><span class="Style71"><strong>Guinea Bissau</strong></span></span></a></span>, <span class="Style54"><a href="../doc/rpmissionga0808.doc"><span class="Style66"><span class="Style71"><strong>The Gambia</strong></span></span></a></span>, <a href="../doc/rpmissionbf0808.doc"> <span class="Style69">Burkina-Faso</span></a>, <a href="../doc/rpmissionni0808.doc" class="Style71"><span class="Style69">Nigeria</span></a> and <a href="../doc/rpmissionse0808.doc"><span class="Style71"><strong>Senegal</strong></span></a>) to present and explain the use of the Website for the pilot phase. </p>
    <p align="center" class="Style54 Style64">September 24-28, 2007, Training CIB Workshop, Bobo-Dioulasso (Burkina Faso).</p>
    <p align="center" class="Style54"><span class="Style64">Updated list of </span><span class="Style69"><a href="../doc/CIBFocalPoints.doc" class="Style71"></a><a href="../doc/CIBFocalPoints.doc" class="Style40"><span class="Style71"><strong>appointed CIB focal points</strong></span></a></span></p>
    <p align="center" class="Style65">We are excited to offer you the opportunity to view and query data from the CIB system. You will use an Excel spreadsheet to enter data; later you will be able to enter the data directly on the website.</p>
    <p align="center" class="Style23 Style59 Style54">&nbsp;</p>
    </div>
</div> 
<div align="left">
  <p align="center" class="Style21">&nbsp;</p>
  <p align="center"><span class="Style60"><span class="sub Style60">	WAHO 2008 - CIB WEBSITE - PILOT PHASE - F. NEZZI</span></span>
      <!--||| Fin du pied de page |||-->
  <p align="center" class="Style21">&nbsp;  </p>
  <p align="center" class="Style21">&nbsp;</p>
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

