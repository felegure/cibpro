
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
.Style23 {font-size: 14px; color: #FFFFFF;}
.Style47 {font-family: Verdana, Arial, Helvetica, sans-serif; font-weight: bold; color: #000033; }
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
.Style62 {color: #EBE9ED}
.Style64 {color: #000033}
.Style66 {color: #0000FF}
.Style54 {font-size: 14px}
.Style67 {font-size: 14px; color: #000033; }
.Style73 {color: #006600;}
.Style74 {color: #0000FF; font-family: Arial, Helvetica, sans-serif;}
.Style90 {font-family: Verdana, Arial, Helvetica, sans-serif}
.Style94 {font-weight: bold; font-size: 18px; color: #990000; }
.Style99 {color: #990000; font-weight: bold;}
.Style100 {color: #FFFFFF}
-->
</style>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></head>

<center>

<body alink="#006699" class="sb">

<div id="Layer4" style="position:absolute; left:22px; top:79px; width:174px; height:17px; z-index:4; background-color: #CCCC99; layer-background-color: #CCCC99; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 10px; border: 1px none #000000;"> 
  <div align="center"><a href="../en/index.php" class="Style1"><span class="Style14">English</span></a> |<a href="../fr/index.php" class="Style14"> </a><a href="../fr/index.php" class="Style1"><span class="Style14">French</span></a>|<a href="../por/index.php" class="Style1"><span class="Style14"> Portuguese</span></a> </div> 
</div> 
<center> <!--||| Tableau du début avec des graphiques pour la navigation principale, les graphiques par thème doivent être remplacés par vos propres graphiques de thème modifiés par un programme graphique. N'y insérez aucun espace ou passage à la ligne manuel. |||-->
   
  <table width="576" border="1" cellpadding="0" cellspacing="0"> 
    <tr> 
      <td width="572"> <div id="Layer1" style="position:absolute; left:958px; top:3px; width:162px; height:72px; z-index:1"><img name="carteooas" src="../images/carteooas.png" width="162" height="71" alt=""></div> 
        <div id="Layer2" style="position:absolute; left:29px; top:0px; width:81px; height:69px; z-index:2;"><img name="logooaas" src="../images/logooas.jpg" width="90" height="80" alt=""> 
        </div></td> 
    </tr> 
  <tr> 
      <td bgcolor="#FFFFD6"> <div align="center"><span class="Style8"> <span class="Style1"><span class="Style94">C</span><span class="Style3">OORDINATED </span><span class="Style94"><strong>I</strong></span><span class="Style3">NFORMED </span><strong class="Style94">B</strong><span class="Style3">UYING SYSTEM WEBSITE </span></span></span></div></td> 
    </tr>
    <tr> 
	
      <td> <p><span class="sub"><img src="../images/med_1.jpg" alt="tApplication Access" name="espacereserve" width="119" height="48" align="middle"><img src="../images/blisters.jpg" width="118" height="48" align="middle"><img src="../images/med_1.jpg" alt="tApplication Access" name="espacereserve" width="109" height="44" align="middle"><img src="../images/blisters.jpg" width="111" height="46" align="middle"><img src="../images/med_1.jpg" alt="tApplication Access" name="espacereserve" width="113" height="48" align="middle"></span></p></td> 
    </tr> 
    <tr> 
      <td bgcolor="#FFFFD6"> <div align="center"><span class="Style8"><a href="index.php" class="Style6"> <span class="Style47"> <a href="index.php" class="Style6"> 
          <span class="Style47 Style73">Home Page</span> </a><span class="Style13 Style73">| 
          </span><a href="project.php" class="Style6"><span class="Style47"> The 
          Project </span></a><span class="Style13 Style73">| </span><span class="Style90"><a href="partners.php"><span class="Style13 Style73">Partners</span></a></span></span></div></td> 
    </tr> 
    <tr> 
      <td bgcolor="#FFFFD6"><p align="center"><a href="access.php" class="Style10"><span class="Style12 Style3 Style14"><span class="Style94"><strong>APPLICATION ACCESS</strong></span></span></a> </p></td> 
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
    <h2 align="left" class="Style13 Style24  Style74"><span class="Style64">The  Project</span></h2>
    <p align="left" class="Style67">I. Brief History</p>
      <p align="justify" class="Style67">Why a Coordinated Informed Buying system? 
      </p>
    <p align="justify" class="Style67">&#149;&nbsp;Reproductive health commodity security (RHCS) in the West African Health Organisation has a long and rich history. </p>
    <p align="justify" class="Style67">&#149;&nbsp; In July 2003 at Banjul, The Gambia, a legal document  RHCS was developped and then presented to the ministers of ECOWAS. </p>
    <p align="justify" class="Style67">&#149;&nbsp; In October 2004, a research report  on the feasibility of group purchases in West Africa was developped and then presented to the ministers.</p>
    <p align="justify" class="Style67">&#149;&nbsp; In November 2005 in Dakar, Senegal, an assessment report on the CIB was developped and then presented.</p>
    <p align="justify" class="Style67">&#149;&nbsp; In the subregion, a conceptual document on RHCS strategy was presented.</p>
    <p align="justify" class="Style67">&#149;&nbsp; In July 2006 at Abuja, the RHCS strategy was presented to the ministers; the strategy was adopted. </p>
    <p align="justify" class="Style67">&#149;&nbsp; On October 23–25, 2006, a meeting was held in Accra, Ghana on resource mobilization to execute WAHO's strategic plan for RHCS. </p>
    <p align="left" class="Style67"> - One of the highlighted challenges at the Ghana meeting for the subregion was how to manage the logistics for this strategy.</p>
   	  <p align="justify" class="Style67">- The CIB system is an integral part of this strategy in the subregion.</p>
   	  <p align="justify" class="Style67">&#150;&nbsp;Using the CIB, the personnel responsible for purchasing and supplying of reproductive health commodities will be able to share information with their counterparts in the subregion about the prices of drugs, the suppliers, and the quality , as well as of other related data needed for purchases. </p>
   	  <p align="justify" class="Style67">&#149;&nbsp;The sharing of information will allow : </p>
   	  <p align="justify" class="Style67">&#150; numerous advantages for purchasing systems, </p>
   	  <p align="justify" class="Style67">&#150;&nbsp; harmonization of the regulations, </p>
   	  <p align="justify" class="Style67">&#150;&nbsp; better management of the supply chain, </p>
   	  <p align="justify" class="Style67">&#150;&nbsp; reduction of wastes and losses. </p>
   	  <p align="justify" class="Style67">II. Justification </p>
    <p align="justify" class="Style67">Why a Coordinated Informed Buying System ? While sharing information about the prices of the products and purchases and  the names of the different used suppliers, countries will be able to more efficiently increase the efficiency of their purchases of the essential products of reproductive health and medicines, including antiretrovirals (ARV s ) and other essential products. CIB is only one way to share information. Each of the member countries will need to finance, organize, and execute their purchases. </p>
    <p align="justify" class="Style66"><span class="Style67">III.</span> <span class="Style67">Pathway</span> </p>
    <p align="justify" class="Style67"><strong>2006</strong></p>
    <p align="justify" class="Style67">&#149;&nbsp; Waho hired a CIB manager.&#149;&nbsp; Waho held a technical workshop in November 2006 at WAHO.</p>
    <p align="justify" class="Style67"> <strong>2007 </strong></p>
    <p align="justify" class="Style67">&#149;&nbsp; Waho recommended to the health ministers that they appoint a CIB focal&nbsp;point at the country level. &#149;&nbsp; CIB focal points submitted data to the CIB manager.&#149;&nbsp; Data sent by the countries enriched the database. &#149;&nbsp; The CIB manager , &#150;&nbsp;developed a CIB prototype,</p>
    <p align="justify" class="Style39 Style64"> <span class="Style67">&#150;&nbsp; gave feedback to the countries on the data collected, </span></p>
    <p align="justify" class="Style67">&#150;&nbsp; put data in the database,&#150;&nbsp;planned a technical workshop for the focal points on the use of the system during September–October 2007.</p>
    <p align="justify" class="Style67"><strong>2008 </strong></p>
    <p align="justify" class="Style39 Style64 Style54"> <span class="Style67">&#149;&nbsp; The CIB launched a pilot phase with the selected countries. </span></p>
    <p align="justify" class="Style67">&#149;&nbsp; The pilot phase is evaluated and presented to countries. </p>
    <p align="justify" class="Style67"><strong>2009</strong></p>
    <p align="justify" class="Style67">&#149;&nbsp; The CIB system is available for all the users. </p>
    <p align="justify" class="Style40 Style57 Style64"></p>
</div> 
  <div class="Style17" id="col1">
    <span class="Style47"><body onLoad="defil()" onUnload="clearTimeout(tempo2)" bgcolor="#0069B3">
</span><FORM NAME="defil" class="Style62">
  <p>
    <span class="Style47"><SCRIPT LANGUAGE="JavaScript">
document.write('<INPUT TYPE="text" NAME="defilbox" SIZE=' + size + '>');
  </SCRIPT>
  </span></p>
</FORM>
      <p align="left">&nbsp; </p>
      <p align="middle"><img src="../images/covercibeng.jpg" width="154" height="220" align="middle"></p>
      <p></p>
      <p align="center"><span class="Style64"><span class="Style54"><font color="#0000FF" size="-1"> 
        <a href="../doc/cibulletineng.pdf"><font color="#000000">First</font> 
        <font color="#000000">CIB Bulletin</font></a> </font><font color="#FF0000"><a href="../doc/cibulletineng.pdf"><img src="../images/pdf.png" width="27" height="32"></a></font></span></span></p>
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
      </div> 
</div> 
<center class="Style22">
  <div align="left">
    <p align="left" class="Style23">&nbsp; </p>
  </div>

  <p align="left" class="Style23">&nbsp;</p>
  </center>
<div align="left">
  <p align="left" class="Style21">&nbsp;</p>
</div>
</center>


<center>
  <p><span class="Style47">&nbsp;<br>
    <br>
  &nbsp;<br>
  </span>     
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
  <p><span class="sub Style60">WAHO 
    2008 - CIB WEBSITE - F. NEZZI</span> 

</center>
</body>
</html>

