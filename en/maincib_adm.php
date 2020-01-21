
<html>
<head>
<title>Data Administration Welcome Page - maincib_adm.php</title>
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
<!--
.Style24 {color: #FFFF66}
.Style51 {color: #BCCBDE}
.Style14 {color: #990000}
.Style52 {font-size: 14px}
.Style53 {	color: #666666;
	font-style: italic;
	font-size: 9px;
}
.Style78 {font-size: 14px; font-weight: bold;}
.Style79 {font-size: 18px}
.Style1 {color: #993300}
.Style99 {color: #990000; font-weight: bold;}
.Style80 {font-weight: bold}
-->
</style>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></head>

<center>

<body alink="#006699" class="sb">

<div id="Layer4" style="position:absolute; left:22px; top:79px; width:164px; height:17px; z-index:4; background-color: #CCCC99; layer-background-color: #CCCC99; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 10px; border: 1px none #000000;">
  <div align="center"><a href="../en/index.php" class="Style1"><span class="Style14">English</span></a> 
    |<a href="../fr/index.php" class="Style14"> </a><a href="../fr/index.php" class="Style1"><span class="Style14">French</span></a> 
    |<a href="../por/index.php" class="Style1"><span class="Style14"> </span></a><a href="" class="Style1"><span class="Style53">Portugese</span></a> 
  </div>
</div>
<div id="Layer1" style="position:absolute; left:212px; top:4px; width:577px; height:11px; z-index:1; background-color: #FFFFD6; layer-background-color: #FFFFD6; border: 1px none #000000;">
  <div align="center" class="Style1"><span class="Style14"><strong>C</strong></span><span class="Style3">OORDINATED </span> <span class="Style99">I</span><span class="Style3">NFORMED <span class="Style14"><strong>B</strong></span>UYING SYSTEM WEBSITE</span></div>
</div>
<center>

<!--||| Tableau du début avec des graphiques pour la navigation principale, les graphiques par thème doivent être remplacés par vos propres graphiques de thème modifiés par un programme graphique. N'y insérez aucun espace ou passage à la ligne manuel. |||-->

  <table width="563" border="1" cellpadding="0" cellspacing="1">
  <tr>
        <td width="563">
        <div id="Layer1" style="position:absolute; left:1100px; top:3px; width:162px; height:72px; z-index:1"><img name="carteooas" src="../images/carteooas.png" width="162" height="71" alt=""></div>
        <div id="Layer2" style="position:absolute; left:27px; top:0px; width:81px; height:69px; z-index:2; background-color: #000099; layer-background-color: #000099; border: 1px none #000000;"><img name="logooaas" src="../images/logoooas.jpg" width="90" height="80" alt=""> </div>
		</td>
  </tr>
  <tr>
        <td>
    	<p><img src="../images/med_1.jpg" alt="tApplication Access" name="espacereserve" width="119" height="48" align="middle"><span class="sub"><img src="blisters.jpg" width="118" height="48" align="middle"><img src="../images/med_1.jpg" alt="tApplication Access" name="espacereserve" width="109" height="44" align="middle"><img src="blisters.jpg" width="111" height="46" align="middle"><img src="../images/med_1.jpg" alt="tApplication Access" name="espacereserve" width="113" height="48" align="middle"></span></p>   	  </td>
  </tr>  
  
  <tr>
        <td bgcolor="#FFFFD6"> <div align="center"><span class="Style8"><a href="index.php" class="Style6"> <span class="Style73"> Home page</span> </a><span class="Style13 Style7 Style73">| </span><a href="pickareport.php" class="Style6">
     	  <span class="Style73">Reports </span></a><span class="Style13 Style7 Style73">|</span><a href="pickaform.php"><span class="Style6"> <span class="Style73">Consultation</span></span> </a> 
      <span class="Style13 Style7 Style73">|</span>   <a href="pickadmin.php"><span class="Style6"><span class="Style24"><span class="Style64">Administration</span></span> </span></a><span class="Style13 Style7 Style51"></span></span></div></td>
  </tr>
  <tr>
<td bgcolor="#FFFFD6"><p align="center" class="Style22"><a href="access.php" class="Style10"><span class="Style12 Style3 Style14 Style79"><span class="Style12 Style3 Style14">APPLICATION ACCESS</span></span></a></p>  </td>
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
    <h2 align="left" class="Style64">Welcome to the CIB System</h2>
    <h2 align="left" class="Style23"><span class="Style64">You have been successfully identified by the CIB system with the</span> <span class="Style64">&quot;ADMINISTRATOR&quot; rigths!</span></h2>
    <center class="Style22">
      <div align="left">
        <div align="left">
          <p align="left" class="Style71 Style71 Style14"><strong><a href="pickareport.php"><span class="Style14">Reports</span></a> :</strong></p>
        </div>
        <p align="left" class="Style23 Style64">The following reports are available:</p>
        <div align="left"> 
          <div align="left" class="Style66"> Basic objects management
            <div align="left">
              <ul>
                <li> <a href="pickareport.php" class="Style71 Style71"><strong><span class="Style71"><span class="Style14">Prices</span> <span class="Style14">:</span> </span></strong></a><span class="Style64">list of products group by the lowest value per unit price per </span></li>
              </ul>
            </div> 
            </div>
        </div>
        <p align="left" class="Style23  Style64">The user will be able to enter parameters to query the system.</p>
        <div align="left">
          <div align="left" class="Style66">
          <div align="left">
                <ul>
                  <li> <span class="Style64"><span class="Style23 Style62 Style64"><strong class="Style23"><a href="pickareport.php"><span class="Style71 Style14">Suppliers 
                    and Manufacturers</span></a></strong>: <span class="Style23 Style64">List 
                    of products supplied -/- manufactured by a company during 
                    a period of time.</span></span></span></li>
                  <li><a href="pickareport.php" class="Style71 Style71"><strong><span class="Style71"><span class="Style14">Suppliers 
                    and Manufacturers</span> : </span></strong></a><span class="Style64"><span class="Style23 Style62 Style64"> 
                    List of contacts and details.</span></span></li>
                </ul>
                </div>
          </div>
        </div>
        </div>
    </center>
    <center class="Style22">
      <p align="left" class="Style23"><strong><a href="pickadmin.php"><span class="Style71 Style14">Administration:</span></a></strong>: </p>
      <ul class="Style23 Style64">
        <li>
          <div align="left"> Basic objects management </div>
        </li>
      </ul>
      </center>
    <div align="left">
      <ul class="Style21 Style64"><li class="Style78">
      <div align="left" class="Style52"> The system Administrator (CIB manager) assigns user names/default passwords and group memberships per country </div>
        </li>
        </ul>
      <p align="left" class="Style21 Style64">&nbsp;</p>
    </div>
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
        
  <p>       
  <p>       
  <p><span class="Style60"><span class="sub Style60">WAHO 2008 - CIB WEBSITE - PILOT PHASE - F. NEZZI</span></span><br> 
         <!--||| Fin du pied de page |||-->
</center>
</body>
</html>

