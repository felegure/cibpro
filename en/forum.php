
<html>
<head>
<title>Project.php</title>
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
<!--
.Style13 {color: #FFFF00; font-weight: bold; }
.Style14 {color: #990000}
.Style22 {font-weight: bold; font-size: 14px; color: #990000; }
.Style24 {color: #FFFF66}
.Style52 {
	color: #666666;
	font-style: italic;
	font-size: 9px;
}
.Style66 {color: #0000FF}
.Style1 {color: #993300}
.Style79 {color: #FF0000}
.Style94 {font-weight: bold; font-size: 18px; color: #990000; }
.Style99 {color: #990000; font-weight: bold;}
.Style100 {font-weight: bold}
.Style101 {color: #990033}
.Style102 {font-family: Verdana, Arial, Helvetica, sans-serif}
.Style103 {color: #003300}
-->
</style>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<center>

<body alink="#006699" class="sb">

<div id="Layer4" style="position:absolute; left:22px; top:79px; width:164px; height:17px; z-index:4; background-color: #CCCC99; layer-background-color: #CCCC99; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 10px; border: 1px none #000000;"> 
  <div align="center"><a href="../en/index.php" class="Style1"><span class="Style14">English</span></a> |<a href="../fr/index.php" class="Style14"> </a><a href="../fr/index.php" class="Style1"><span class="Style14">French</span></a>|<a href="" class="Style1"><span class="Style52"> Portuguese</span></a> </div> 
</div> 
<center> 
  <!--||| Tableau du début avec des graphiques pour la navigation principale, les graphiques par thème doivent être remplacés par vos propres graphiques de thème modifiés par un programme graphique. N'y insérez aucun espace ou passage à la ligne manuel. |||--> 
  <table width="576" border="1" cellpadding="0" cellspacing="0"> 
    <tr> 
      <td width="572"> <div id="Layer1" style="position:absolute; left:958px; top:3px; width:162px; height:72px; z-index:1"><img name="carteooas" src="../images/carteooas.png" width="162" height="71" alt=""></div> 
        <div id="Layer2" style="position:absolute; left:29px; top:0px; width:81px; height:69px; z-index:2;"><img name="logooaas" src="../images/logooas.png" width="90" height="80" alt=""> 
        </div></td> 
    </tr> 
  <tr> 
      <td bgcolor="#FFFFD6"> <div align="center"><span class="Style8"> <span class="Style1"><span class="Style94">C</span><span class="Style3">OORDINATED </span><span class="Style94"><strong>I</strong></span><span class="Style3">NFORMED </span><strong class="Style94">B</strong><span class="Style3">UYING SYSTEM WEBSITE </span></span></span></div></td> 
    </tr>
    <tr> 
	
      <td> <p><span class="sub"><img src="../images/med_1.jpg" alt="tApplication Access" name="espacereserve" width="119" height="48" align="middle"><img src="../images/blisters.jpg" width="118" height="48" align="middle"><img src="../images/med_1.jpg" alt="tApplication Access" name="espacereserve" width="109" height="44" align="middle"><img src="../images/blisters.jpg" width="111" height="46" align="middle"><img src="../images/med_1.jpg" alt="tApplication Access" name="espacereserve" width="113" height="48" align="middle"></span></p></td> 
    </tr> 
    <tr> 
      <td bgcolor="#FFFFD6"> <div align="center" class="Style8"><a href="index.php" class="Style6"> <span class="Style47"> <a href="index.php" class="Style6"><span class="Style47 Style73">Home Page</span> </a><span class="Style13 Style73  Style103">| </span><a href="project.php" class="Style6"><span class="Style47 Style103"> The  Project </span></a><span class="Style13 Style73  Style103">| </span><span class="Style90"><a href="partners.php"><span class="Style13 Style73 Style73 Style102"><span class="Style13 Style73  Style73"><span class="Style103">Partners</span> </span></span></a><span class="Style13 Style73  Style103">|</span><span class="Style13 Style73"> <a href="./forum.php"><span class="Style73 Style102">Forum</span></a></span></span></div></td> 
    </tr> 
    <tr> 
      <td bgcolor="#FFFFD6"><p align="center"><a href="access.php" class="Style10"><span class="Style12 Style3 Style14"><span class="Style94"><strong>APPLICATION ACCESS</strong></span></span></a> </p></td> 
    </tr> 
  </table></center>
<div align="right" class="Style48">
    	<?php 
      $today = date ("  M ,D j,Y  H:i:s");
      echo " $today ";
    ?>
</div><div id="main">
<div class="Style17" id="col11"> 
    <h2 align="left" class="Style13 Style71"><span class="Style64">Forum </span> </h2>
    <p align="justify" class="Style66"><span class="Style64">Welcome to the Coordinated Informed Buying System Forum!</span><span class="Style66"><br>
        </span><span class="Style70"><br>
  Please send your messages in this Forum.<br>
      You are invited to reply to any message. If you need more information on 
      the use of this Forum, please free to send an electronic mail to <a href="../ecrire/contactez.htm"><span class="Style79"><span class="Style14">fnezzi@yahoo.com, 
      fnezzi@wahooas.org</span></span></a></span></p>
    <p align="justify" class="Style64"><a href="./forum/theme.php" class="Style66">	<span class="Style64 Style14">Acces the Forum !</span></a></p>
    <p align="justify" class="Style66"><span class="Style70"> </span></p>
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
      <p class="Style66"><span class="Style54 Style64"><span class="Style64 Style54">Visit of the Pharmacie de Sant&eacute; Publique (Central store) in Abidjan - C&ocirc;te d'Ivoire during the CIB focal points focal points from June 18th to 20th, 2009. <strong>14</strong> countries attended this important meeting.</span></span></p>
      <p align="left"><span class="Style54 Style64"><img src="../images/cib01.JPG" width="219" height="180"></span></p>
      <p align="left" class="Style54 Style64">August 04-22, 2008, the CIB Manager visited 5 pilot countries ( <a href="../doc/rpmissiongb0808.doc" class="Style99"> <span class="Style14">Guinea</span> <span class="Style14">Bissau</span> </a> , <a href="../doc/rpmissionga0808.doc" class="Style14 Style101 Style100"><span class="Style14">The</span> <span class="Style14">Gambia</span></a>, <a href="../doc/rpmissionbf0808.doc" class="Style14"> <span class="Style99">Burkina Faso</span></a>, <a href="../doc/rpmissionni0808.doc"> <span class="Style99">Nigeria</span></a> and <a href="../doc/rpmissionse0808.doc"><span class="Style14"><strong>Senegal</strong></span></a> ) to present and explain the use of the Website for the pilot phase. </p>
      <p align="left" class="Style54 Style64">September 24-28, 2007, Training CIB Workshop, Bobo-Dioulasso (Burkina Faso)</p>
      <p align="left" class="Style54"><span class="Style54 Style64">Updated list of <a href="../doc/CIBFocalPoints.doc" class="Style67"><strong><span class="Style14">appointed</span> <span class="Style14">CIB</span> <span class="Style14">focal</span> <span class="Style14">points</span></strong></a></span></p>
      <p align="left" class="Style65"><span class="Style54 Style64">We are excited to offer you the opportunity to view and query data from the CIB system. You will use an Excel spreadsheet to enter data; later you will be able to enter the data directly on the website.</span></p>
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
    <br>
  &nbsp;<br>
  <p>     
  <p>     
  <p>     
  <p>     
  <p>     
  <p>     
  <p>     
  <p>     
  <p>     
  <p>     
  <p>     
  <p>     
  <p>     
  <p>     
  <p>     
  <p>     
  <p>     
  <p>     
  <p>     
  <p>     
  <p>     
  <p>     
  <p>     
  <p>     
  <p>     
  <p>     
  <p>     
  <p>     
  <p>     
  <p>     
  <p>     
  <p>     
  <p>     
  <p>     
  <p>     
  <p>     
  <p>     
  <p>     
  <p>     
  <p>     
  <p>     
  <p>     
  <p>     
  <p>     
  <p>     
  <p>     
  <p>     
  <p>     
  <p>     
  <p>     
  <p>     
  <p>     
  <p>     
  <p>     
  <p>     
  <p>     
  <p>     
  <p>     
  <p>     
  <p><span class="Style60"><span class="sub Style60">WAHO 2008 - CIB WEBSITE - 
    F. NEZZI</span> 
      </span><br>   
 
                                                 
</center>
</body>
</html>

