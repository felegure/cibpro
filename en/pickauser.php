<?php
session_start();

 require_once ("utilang.php");
?>
<html>
<head>
<title>Data Admimistration User Page Sub-Menu - Pickauser.php</title>
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
.Style13 {color: #FFFF00; font-weight: bold; }
.Style14 {color: #990000}
.Style22 {font-weight: bold; font-size: 14px; color: #990000; }
.Style24 {color: #FFFF66}
.Style39 {font-family: Arial, Helvetica, sans-serif}
.Style50 {font-size: 18px}
.Style5 {color: #CCCCCC}
.Style52 {color: #00FF00}
.Style1 {color: #993300}
.Style53 {color: #666666;
	font-style: italic;
	font-size: 9px;
}
.Style54 {font-size: 12px}
-->
</style>
</head>

<center>

<body bgcolor="#336699" alink="#006699" class="sb">

<div id="Layer1" style="position:absolute; left:212px; top:4px; width:577px; height:11px; z-index:1; background-color: #CCCCCC; layer-background-color: #CCCCCC; border: 1px none #000000;">
  <div align="center" class="Style1"><strong>C</strong><span class="Style3">OORDINATED </span> <strong>I</strong><span class="Style3"><span class="Style3">NFORMED</span> <span class="Style1"><strong>B</strong><span class="Style3">UYING SYSTEM WEBSITE </span><span class="Style3"> - PILOT PHASE</span></div>
</div>
<div id="Layer4" style="position:absolute; left:22px; top:79px; width:164px; height:17px; z-index:4; background-color: #CCCC99; layer-background-color: #CCCC99; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 10px; border: 1px none #000000;">
  <div align="center"><a href="../en/index.php" class="Style1"><span class="Style14">English</span></a> |<a href="../fr/index.php" class="Style14"> </a><a href="../fr/index.php" class="Style1"><span class="Style14">French</span></a> |<a href="" class="Style1"><span class="Style53">Portuguese</span></a></div>
</div>
<center>

<!--||| Tableau du d�but avec des graphiques pour la navigation principale, les graphiques par th�me doivent �tre remplac�s par vos propres graphiques de th�me modifi�s par un programme graphique. N'y ins�rez aucun espace ou passage � la ligne manuel. |||-->

  <table width="576" border="1" cellpadding="0" cellspacing="0">
  <tr>
        <td width="572">
        <div id="Layer1" style="position:absolute; left:816px; top:3px; width:162px; height:72px; z-index:1"><img name="carteooas" src="../images/carteooas.jpg" width="162" height="71" alt=""></div>
        <div id="Layer2" style="position:absolute; left:29px; top:0px; width:81px; height:69px; z-index:2; background-color: #000099; layer-background-color: #000099; border: 1px none #000000;"><img name="logooaas" src="../images/logoooas.jpg" width="80" height="80" alt=""> </div>
		</td>
  </tr>
  <tr>
        <td>
    	<p><img src="../images/med_1.jpg" alt="tApplication Access" name="espacereserve" width="119" height="48" align="middle"><span class="sub"><img src="../images/blisters.jpg" width="118" height="48" align="middle"><img src="../images/med_1.jpg" alt="tApplication Access" name="espacereserve" width="109" height="44" align="middle"><img src="../images/blisters.jpg" width="111" height="46" align="middle"><img src="../images/med_1.jpg" alt="tApplication Access" name="espacereserve" width="113" height="48" align="middle"></span></p>   	  </td>
  </tr>  
  <tr>
        <td> <div align="center"><span class="Style8"><a href="index.php" class="Style6"> <span class="Style6"> Home page</span> </a><span class="Style13 Style52">|</span><a href="partners.php"><span class="Style6 Style52"></span></a><a href="project.php" class="Style6">
     	  <span class="Style6">The Project </span></a><span class="Style13 Style52">|</span><a href="partners.php"><span class="Style6 Style52"> Partners </span> </a><span class="Style8"> <span class="Style13 Style52">|</span><a href="partners.php"><span class="Style6 Style52"></span></a><a href="pickareport.php" class="Style6">
     	  <span class="Style6 Style52">Reports </span></a><span class="Style13 Style52">|</span><a href="partners.php"><span class="Style6 Style52"></span></a><a href="pickaform.php"><span class="Style6"> Consultation</span> </a> 
	 	  </span></span></div></td>
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
    <h2 align="center" class="Style13 Style24">Administration - user management </h2>
    <div id="Layer6" style="position:absolute; left:230px; top:229px; width:200px; height:20px; z-index:6; background-color: #CCCCCC; layer-background-color: #CCCCCC; border: 1px none #000000;">
      <div align="center" class="Style3 Style22"><strong><a href="aic_form_user_add.php" class="Style5"><span
  class="Style3"><strong>Add a new USER</strong></span></a></strong></div>
    </div>
    <div id="Layer6" style="position:absolute; left:233px; top:312px; width:200px; height:20px; z-index:6; background-color: #CCCCCC; layer-background-color: #CCCCCC; border: 1px none #000000;">
      <div align="center" class="Style3 Style22"><strong><a href="aic_form_typuser_add.php" class="Style5"><span
  class="Style3"><strong>Add a TYPE of user</strong></span></a></strong></div>
    </div>
    <div id="Layer6" style="position:absolute; left:232px; top:269px; width:200px; height:20px; z-index:6; background-color: #CCCCCC; layer-background-color: #CCCCCC; border: 1px none #000000;">
      <div align="center" class="Style3 Style22"><strong><a href="aic_form_user_mod.php" class="Style5"><span
  class="Style3"><strong>Modify a USER </strong></span></a></strong></div>
    </div>
    <h2 class="Style13 Style24 Style50">&nbsp;</h2>
    <div id="Layer6" style="position:absolute; left:24px; top:177px; width:48px; height:17px; z-index:6; background-color: #CCCCCC; layer-background-color: #CCCCCC; border: 1px none #000000;">
      <div align="center" class="Style3 Style22"><strong><a href="affiche_maincib.php" class="Style5"><span
  class="Style22"><strong>Back</strong></span></a> </strong></div>
    </div>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <div id="Layer6" style="position:absolute; left:234px; top:360px; width:200px; height:20px; z-index:6; background-color: #CCCCCC; layer-background-color: #CCCCCC; border: 1px none #000000;">
      <div align="center" class="Style3 Style22"><strong><a href="aic_form_typuser_mod.php" class="Style5"><span
  class="Style3"><strong>Modify a TYPE of user</strong></span></a></strong></div>
    </div>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <div id="Layer6" style="position:absolute; left:234px; top:411px; width:200px; height:20px; z-index:6; background-color: #CCCCCC; layer-background-color: #CCCCCC; border: 1px none #000000;">
      <div align="center" class="Style3 Style22"><strong><a href="aic_form_user_access_add.php" class="Style5"><span
  class="Style3"><strong>Create an acces for a user</strong></span></a></strong></div>
    </div>
    <p>&nbsp;</p>
    <div id="Layer6" style="position:absolute; left:234px; top:455px; width:200px; height:20px; z-index:6; background-color: #CCCCCC; layer-background-color: #CCCCCC; border: 1px none #000000;">
      <div align="center" class="Style3 Style22"><strong><a href="aic_form_user_access_mod.php" class="Style5"><span
  class="Style3"><strong>Modify a user access</strong></span></a></strong></div>
    </div>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
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
 <p align="left"> <img src="../images/cibmars_3.JPG" width="219" height="180" align="middle"></p> 
	  <p align="left" class="Style70">
	  <p class="Style71"><span class="Style54 Style64">From March 18-20th, 2009 was held the CIB focal points workshop in Bobo-Dioulasso. All the <strong>15</strong> countries attended this important event.</p>

    <p align="left" class="sub"><img src="../images/cib01.JPG" width="219" height="180"></p>
    <p align="center" class="Style23 Style59 Style54">September 24-28, 2007, Training CIB Workshop, Bobo-Dioulasso (Burkina Faso)</p>
    <p align="center" class="Style23 Style59 Style54">Using the <a href="../doc/TemplateCIB_English.xls">Excel template</a>, four countries (Senegal, Guinee Bissau, Nigeria and Togo) submitted data for the CIB prototype. </p>
    <p align="center" class="Style23 Style59 Style54"> Updated list of <a href="../doc/CIBFocalPoints.doc"> appointed CIB focal points</a></p>
    <p align="center" class="Style23 Style59 Style54">We are excited to offer you the opportunity to view and query data from the CIB system. You will use an Excel spreadsheet to enter data; later you will be able to enter the data directly on the website.</p>
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
  &nbsp;<br>
  <span class="sub">WAHO 2007 - CIB WEBSITE PROTOTYPE - F. NEZZI </span>
  <!--||| Fin du pied de page |||-->
</center>
</body>
</html>

