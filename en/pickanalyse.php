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
<title>Pickanalyse.php</title>
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
texte = 'NOUVEAU !';
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
.Style3 {color: #003366}
.Style13 {color: #FFFF00; font-weight: bold; }
.Style17 {color: #FFFFFF; font-family: Arial, Helvetica, sans-serif; }
.Style21 {color: #FFFFFF; font-family: Arial, Helvetica, sans-serif; font-size: 14px; }
.Style22 {font-weight: bold; font-size: 14px; color: #990000; }
.Style23 {font-size: 14px; color: #FFFFFF;}
.Style24 {color: #FFFF66}
.Style25 {color: #990000}
.Style39 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #000033;
}
.Style48 {
	font-family: Arial, Helvetica, sans-serif;
	color: #CCCC99;
	font-size: 12px;
}
.Style70 {font-size: 14px; font-family: Arial, Helvetica, sans-serif; color: #000033; }
.Style71 {color: #0000FF}
.Style97 {color: #990000; font-weight: bold; }
-->
</style>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<center>

<body alink="#006699" class="sb">

<?php 
      require 'entete_rep_cons.php' ;
   
    ?>
  <div align="right" class="Style48">
    	<?php 
      $today = date ("  M ,D j,Y  H:i:s");
      echo " $today ";
    ?>
  </div>
<div id="main">
<div class="Style17" id="col11"> 
    <div id="Layer6" style="position:absolute; left:25px; top:137px; width:119px; height:17px; z-index:6; background-color: #CCCCCC; layer-background-color: #CCCCCC; border: 1px none #000000;">
      <div align="center" class="Style3 Style22"><strong><a href="affiche_maincib.php" class="Style5"><span
  class="Style22"><strong>Back to Menu</strong></span></a></strong></div>
    </div>
    <h2 class="Style64"><strong>Analysis of results extracted from the CIB system 
      (2005-2009)</strong></h2>
    <p align="left" class="Style54 Style64"><font color="#333333">The analysis 
      is for purchased essential medicines by public sector in the ECOWAS regions 
      between 2005 and 2009 for the following categories : <strong>Antimalarial, 
      Antituberculosis, ARVs, Contraceptives, Vaccines and Serum.</strong></font></p>
    <p align="left" class="Style54 Style64"><font color="#333333">&#149;&nbsp; 
      Who are the suppliers in the ECOWAS region? </font></p>
    <p align="left" class="Style54 Style64"><font color="#333333">&#149;&nbsp; 
      Who are the Manufacturers int the ECOWAS region? </font></p>
    <p align="left" class="Style54 Style64"><font color="#333333">&#149;&nbsp; 
      Who are the local Manufacturers? </font></p>
    <p align="left" class="Style54 Style64"><font color="#333333">&#149;&nbsp; 
      Origin of essentials medicines? </font></p>
    <p align="left" class="Style64 Style54"><font color="#333333"><em>&#149;&nbsp; 
      Quantities purchased locally or outside the ECOWAS region</em></font></p>
    <p align="left" class="Style54 Style64"><font color="#333333">&#149;&nbsp; 
      <em>Unit prices</em></font></p>
    <p align="left" class="Style64">Please find the results of this analysis :</p>
    <p align="left" class="Style64"> Comments<span class="Style64"><span class="Style54"><font color="#FF0000"><a href="../doc/wordanalysecibmai2010en.pdf"><img src="../images/pdf.png" width="27" height="23" border="0"></a></font></span></span></p>
    <p align="left" class="Style64"> Graphics<span class="Style64"><span class="Style64"><span class="Style54"><font color="#FF0000"><a href="../doc/excelanalysecibmai2010en.pdf"><img src="../images/pdf.png" width="27" height="23" border="0"></a></font></span></span><span class="Style54"><font color="#FF0000"></font></span></span></p>
    <p align="left" class="Style64">&nbsp;</p>
    <p class="Style64">&nbsp;</p>
    <p class="Style64">&nbsp;</p>
    <p class="Style64">&nbsp;</p>
    <p class="Style64">&nbsp;</p>
    <p class="Style64">&nbsp;</p>
    <p class="Style64">&nbsp;</p>
    <p class="Style64">&nbsp;</p>
    <p class="Style13 Style50 Style64">&nbsp;</p>
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
      <p align="left"> <img src="../images/covercibeng.jpg" width="154" height="220" align="middle"></p>
      <p align="left"><span class="Style64"><span class="Style54"><font color="#0000FF" size="-1"><a href="../doc/cibulletineng.pdf"><font color="#000000"><font color="#0000FF">First 
        CIB Bulletin</font></font></a> </font><font color="#FF0000"><a href="../doc/cibulletineng.pdf"><img src="../images/pdf.png" width="27" height="32"></a></font></span></span></p>
      <p align="left" class="Style70"> 
      <p align="left"><img src="../images/approvwagamars2012.jpg" width="401" height="290" align="middle"> 
      </p>
      <p align="left" class="Style70"><font color="#0000FF" size="-1">Consultative 
        meeting of Procurement System managers (Central purchasing offices) for 
        essential medicines, Ouagadougou-Burkina Faso from 19 to 20 march 2012</font> 
      <p align="left" class="Style70"><font size="-1"><span class="Style64"><span class="Style64"><span class="Style54"><a href="../doc/approrepouaga2012eng.pdf"><font size="-2"> 
        <font color="#333333">download the report </font></font></a></span></span></span></font><font size="-2"> 
        <font size="-1"><span class="Style64"><span class="Style64"><span class="Style54"><a href="../doc/approrepouaga2012eng.pdf"><img src="../images/pdf.png" width="27" height="32" border="0"></a></span></span></span></font></font> 
      <p align="left" class="Style70">&nbsp; 
      <p align="left" class="Style70"><img src="../images/cibwkaccragrpf.jpg" width="401" height="290"> 
      <p align="left" class="Style70"><span class="Style54"><font color="#0000FF" size="-1">CIB 
        technical workshop Accra-Ghana from 30 january to 1 february 2012</font></span> 
      <p align="left" class="Style70"> <font size="-1"><span class="Style64"><span class="Style64"><span class="Style54"><a href="../doc/cibreportwkaccra2012eng.pdf"><font size="-2"><font color="#333333">dow<font color="#000033">nload 
        the</font> report</font></font></a></span></span></span><font color="#0000FF"> 
        </font></font> <font color="#0000FF" size="-1"><span class="Style64"><span class="Style64"><span class="Style54"><a href="../doc/cibreportwkaccra2012eng.pdf"><img src="../images/pdf.png" width="27" height="32"></a></span></span></span> 
        </font> 
      <p align="left" class="Style64 Style54">&nbsp;</p>
      <p align="left">&nbsp;</p>
    </FORM>
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


<center>
  <p>&nbsp;<br>
    <span class="Style60"><span class="sub">WAHO 2008 - COORDINATED INFORMED BUYING WEBSITE - F. NEZZI</span></span> 
    <!--||| Fin du pied de page |||-->
    <!--||| Fin du pied de page |||-->
</center>
</body>
</html>

