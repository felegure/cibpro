
<html>
<head>
<title>maincib_view.php</title>
<link rel="stylesheet" href="styles.css" type="text/css">
<script language="JavaScript" type="text/JavaScript">
// SUite a la demande de James G. enlver la consultation pour les utilisateurs en consultation
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
.Style22 {font-weight: bold; font-size: 14px; color: #990000; }
.Style24 {color: #FFFF66}
.Style31 {color: #00FF00}
.Style14 {color: #990000}
.Style53 {color: #666666;
	font-style: italic;
	font-size: 9px;
}
.Style55 {font-size: 14px}
-->
</style>
</head>

<center>

<body bgcolor="#336699" alink="#006699" class="sb">

<div id="Layer4" style="position:absolute; left:22px; top:79px; width:164px; height:17px; z-index:4; background-color: #CCCC99; layer-background-color: #CCCC99; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 10px; border: 1px none #000000;">
  <div align="center"><a href="../en/index.php" class="Style1"><span class="Style14">English</span></a> |<a href="../fr/index.php" class="Style14"> </a><a href="../fr/index.php" class="Style1"><span class="Style14">French</span></a> |<a href="" class="Style1"><span class="Style53"> Portuguese</span></a> <a href="../por/index.php" class="Style1"></a> </div>
</div>
<div id="Layer1" style="position:absolute; left:212px; top:4px; width:577px; height:11px; z-index:1; background-color: #CCCCCC; layer-background-color: #CCCCCC; border: 1px none #000000;">
  <div align="center" class="Style1"><strong>C</strong><span class="Style3">OORDINATED </span> <strong>I</strong><span class="Style3"><span class="Style3">NFORMED</span> <span class="Style1"><strong>B</strong><span class="Style3">UYING SYSTEM WEBSITE </span><span class="Style3"> - PILOT PHASE</span></div>
</div>
<center>

<!--||| Tableau du début avec des graphiques pour la navigation principale, les graphiques par thème doivent être remplacés par vos propres graphiques de thème modifiés par un programme graphique. N'y insérez aucun espace ou passage à la ligne manuel. |||-->

  <table width="575" border="1" cellpadding="0" cellspacing="0">
  <tr>
        <td width="571">
        <div id="Layer1" style="position:absolute; left:816px; top:3px; width:162px; height:72px; z-index:1"><img name="carteooas" src="../images/carteooas.jpg" width="162" height="71" alt=""></div>
        <div id="Layer2" style="position:absolute; left:27px; top:0px; width:81px; height:69px; z-index:2; background-color: #000099; layer-background-color: #000099; border: 1px none #000000;"><img name="logooaas" src="../images/logoooas.jpg" width="80" height="80" alt=""> </div>
		</td>
  </tr>
  <tr>
        <td>
   	<tr>
        <td><img src="../images/med_1.jpg" alt="tApplication Access" name="espacereserve" width="119" height="48" align="middle"><span class="sub"><img src="blisters.jpg" width="118" height="48" align="middle"><img src="../images/med_1.jpg" alt="tApplication Access" name="espacereserve" width="109" height="44" align="middle"><img src="blisters.jpg" width="111" height="46" align="middle"><img src="../images/med_1.jpg" alt="tApplication Access" name="espacereserve" width="113" height="48" align="middle"></span></td>
  </tr> 
		</td>
  </tr>  
  <tr>
        <td> <div align="center"><span class="Style8"><a href="index.php" class="Style6"> <span class="Style6 Style31"> Home Page</span> </a><span class="Style13 Style7 Style31">| </span><a href="pickareport.php" class="Style6">
     	  <span class="Style6">Reports </span></a> 
	 	  </span>
        </div></td>
  </tr>
  <tr>
    <tr>
<td bgcolor="#CCCC99"><p align="center"><a href="access.php" class="Style10"><span class="Style12 Style3 Style14"><span class="Style22">APPLICATION ACCESS</span></span></a></p>  </td>
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
    <h2 align="left" class="Style13 Style24">Welcome to the CIB System</h2>
    <h2 align="left" class="Style23">You have been successfully identified by the CIB system with the right to <span class="Style7">&quot;VIEW&quot; </span>data!</h2>
  
      <div align="left">
        <div align="left">
          <p align="left" class="Style23"><strong><a href="pickareport.php">Reports</a> :</strong></p>
        </div>
        <p align="left" class="Style23">The following reports are available:</p>
        <ul>
          <li>
            <div align="left" class="Style23"><a href="pickareport.php"><strong>Prices</strong></a>: list of Product group by the <strong>lowest value</strong> per unit price </div>
          </li>
        </ul>
        <p align="left" class="Style23">The user will be able to enter <strong>parameters</strong> to query the system.</p>
        <ul>
          <li>
            <div align="left"><strong class="Style23"><a href="pickareport.php">Suppliers and Manufacturers</a></strong>: <span class="Style23">List of products supplied -/- manufactured by a company during a period of time.</span></div>
          </li>
          <div align="left" class="Style55"></div>
        </ul>
        <p align="left" class="Style23">&nbsp;</p>
      </div>
   
    <div align="left"></div>
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
    <p align="left"><span class="sub"><img src="../images/cib01.JPG" width="219" height="180"></span></p>
    <p align="center" class="Style23">September 24-28, 2007, Training CIB Workshop, Bobo-Dioulasso (Burkina Faso)</p>
    <p align="center" class="Style23">Using the <a href="../doc/TemplateCIB_English.xls">Excel template</a>, four countries (Senegal, Guinee Bissau, Nigeria and Togo) submitted data for the CIB prototype. </p>
    <p align="center" class="Style23"> Updated list of <a href="../doc/CIBFocalPoints.doc"> appointed CIB focal points</a></p>
    <p align="center" class="Style23">We are excited to offer you the opportunity to view and query data from the CIB system. You will use an Excel spreadsheet to enter data; later you will be able to enter the data directly on the website.</p>
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
    <p align="center">&nbsp;<br>
        <span class="sub">WAHO 2007 - CIB WEBSITE PROTOTYPE - F. NEZZI </span>
    <p align="center" class="Style21"><br>
    <br>
  &nbsp;<br>
      
  <!--||| Fin du pied de page |||-->
</p>
</div>
</center>


<center></center>
</body>
</html>

