<?php
//session_start();

 require_once ("utilang_en.php");
?>
<html>
<head>
<title>Data Validation Sub-Menu - manage_form_val.php</title>
<link rel="stylesheet" href="../en/styles.css" type="text/css">
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
.Style14 {color: #990000}
.Style17 {color: #FFFFFF; font-family: Arial, Helvetica, sans-serif; }
.Style24 {color: #FFFF66}


.Style52 {
	color: #666666;
	font-style: italic;
	font-size: 9px;
}
.Style54 {font-size: 14px;}
.Style60 {color: #D3D3D3}
.Style71 {color: #0000FF}
.Style73 {color: #006600;}
.Style108 {color: #990000; font-weight: bold;}
.Style109 {font-weight: bold}
.Style94 {font-weight: bold; font-size: 18px; color: #990000; }
.Style110 {font-family: Verdana, Arial, Helvetica, sans-serif}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></head>

<center>

<body alink="#006699" class="sb">

<div id="Layer4" style="position:absolute; left:22px; top:79px; width:164px; height:17px; z-index:4; background-color: #CCCC99; layer-background-color: #CCCC99; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 10px; border: 1px none #000000;">
  <div align="center"><a href="../en/index.php" class="Style1"><span class="Style14">English</span></a> | <a href="../fr/index.php" class="Style1"><span class="Style14">French</span></a> | <span class="Style56 Style81"><a href="" class="Style1"><span class="Style52">Portuguese</span></a></span> </div>
</div>
<center>

<!--||| Tableau du début avec des graphiques pour la navigation principale, les graphiques par thème doivent être remplacés par vos propres graphiques de thème modifiés par un programme graphique. N'y insérez aucun espace ou passage à la ligne manuel. |||-->

  <div id="Layer4" style="position:absolute; left:22px; top:79px; width:164px; height:17px; z-index:4; background-color: #CCCC99; layer-background-color: #CCCC99; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 10px; border: 1px none #000000;"> 
  <div align="center"><a href="../en/index.php" class="Style1"><span class="Style14">English</span></a> |<a href="../fr/index.php" class="Style14"> </a><a href="../fr/index.php" class="Style1"><span class="Style14">French</span></a>|<a href="" class="Style1"><span class="Style52"> Portuguese</span></a>  </div> 
</div> 
<center> 
  <!--||| Tableau du début avec des graphiques pour la navigation principale, les graphiques par thème doivent être remplacés par vos propres graphiques de thème modifiés par un programme graphique. N'y insérez aucun espace ou passage à la ligne manuel. |||--> 
  <table width="576" border="1" cellpadding="0" cellspacing="0"> 
    <tr> 
      <td width="572"> <div id="Layer1" style="position:absolute; left:1100px; top:3px; width:162px; height:72px; z-index:1"><img name="carteooas" src="../images/carteooas.png" width="162" height="71" alt=""></div> 
        <div id="Layer2" style="position:absolute; left:29px; top:0px; width:81px; height:69px; z-index:2; background-color: #000099; layer-background-color: #000099; border: 1px none #000000;"><img name="logooaas" src="../images/logoooas.jpg" width="90" height="80" alt=""> </div></td> 
    </tr> 
  <tr> 
      <td bgcolor="#FFFFD6"> <div align="center"><span class="Style8"> <span class="Style1"><span class="Style109">C</span><span class="Style3">OORDINATED </span><span class="Style94"><strong>I</strong></span><span class="Style3">NFORMED</span> <strong>B</strong><span class="Style3">UYING SYSTEM WEBSITE</span></span></span></div></td> 
    </tr>
    <tr> 
	
      <td> <p><span class="sub"><img src="../images/med_1.jpg" alt="tApplication Access" name="espacereserve" width="119" height="48" align="middle"><img src="../images/blisters.jpg" width="118" height="48" align="middle"><img src="../images/med_1.jpg" alt="tApplication Access" name="espacereserve" width="109" height="44" align="middle"><img src="../images/blisters.jpg" width="111" height="46" align="middle"><img src="../images/med_1.jpg" alt="tApplication Access" name="espacereserve" width="113" height="48" align="middle"></span></p></td> 
    </tr> 
    <tr> 
      <td bgcolor="#FFFFD6"> <div align="center"><span class="Style8"><a href="index.php" class="Style6"> <span class="Style47"> <a href="index.php" class="Style6"><a href="index.php" class="Style78"></a><a href="index.php" class="Style6"></a><a href="index.php" class="Style6"><span class="Style73">Home Page</span> </a><span class="Style13 Style73">| </span><a href="pickareport.php" class="Style6"><span class="Style13 Style73"> Reports</span></a> </span></div></td> 
    </tr> 
    <tr> 
      <td bgcolor="#FFFFD6"><p align="center"><a href="access.php" class="Style10"><span class="Style12 Style3 Style14"><span class="Style94">APPLICATION ACCESS</span></span></a></p></td> 
    </tr> 
  </table>
    	<?php 
      $today = date ("  M ,D j,Y  H:i:s");
      echo " $today ";
    ?>
  </div>

<div id="main">
<div class="Style17" id="col11"> 
    <h2 align="center" class="Style13 Style62 Style14">Data Validation </h2>
    <div id="Layer6" style="position:absolute; left:241px; top:230px; width:200px; height:20px; z-index:6; background-color: #CCCCCC; layer-background-color: #CCCCCC; border: 1px none #000000;">
      <div align="center" class="Style3 Style22"><strong><a href="t_search_param_buying_control_val.php" class="Style5"><span
  class="Style3"><strong>Data control</strong></span></a> </strong></div>
    </div>
    <h2 class="Style13 Style24 Style50">&nbsp;</h2>
    <div id="Layer6" style="position:absolute; left:24px; top:177px; width:104px; height:17px; z-index:6; background-color: #CCCCCC; layer-background-color: #CCCCCC; border: 1px none #000000;">
      <div align="center" class="Style3 Style22"><strong><a href="affiche_maincib.php" class="Style5"><span
  class="Style22"><strong>Back to Menu</strong></span></a> </strong></div>
    </div>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <div id="Layer6" style="position:absolute; left:243px; top:280px; width:200px; height:21px; z-index:6; background-color: #CCCCCC; layer-background-color: #CCCCCC; border: 1px none #000000;">
      <div align="center" class="Style3 Style22"><strong><a href="aic_form_buying_validate.php" class="Style5"><span
  class="Style3"><strong>Data validation</strong></span></a></strong></div>
    </div>
    <p>&nbsp;</p>
    <p class="Style13 Style24 Style50">&nbsp;</p>
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
      <p align="left"><font color="#000000" size="2">CIB user's manual</font> <span class="Style64"><span class="Style54"><font color="#0000FF" size="-1"><a href="../doc/cibulletinfr.pdf"><font color="#000000"><font color="#0000FF"> 
        </font></font></a></font><font color="#FF0000"><a href="../doc/cibusermanualeng.pdf"><img src="../images/pdf.png" width="27" height="32"></a></font></span></span> 
      </p>
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
    </div>
</div> 
</center>


<center>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p><span class="Style65">&nbsp;<br>
      </span><span class="Style60"><span class="sub Style60">WAHO 2008 - CIB WEBSITE - PILOT PHASE - F. NEZZI</span></span>
      <!--||| Fin du pied de page |||-->
</p>
</center>
</body>
</html>

