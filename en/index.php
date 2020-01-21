<?php
session_start();
$pLanguage = "EN";
$_SESSION['$pLanguage'] = $pLanguage;
?>
<html>
<head>
<title>Home Page</title>
<link rel="stylesheet" href="./styles.css" type="text/css">
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
<style type="text/css">
body {
	scrollbar-face-color: #0069B3;
	scrollbar-shadow-color: #000000;
	scrollbar-highlight-color: #FFFFFF;
	scrollbar-3dlight-color: #000000;
	scrollbar-darkshadow-color: #000000;
	scrollbar-track-color: #0069B3;
	scrollbar-arrow-color: #FFCC00;
	background-color: #666666;
}</style>
<!-- DEBUT DU SCRIPT -->
<script language="JavaScript">
size=20;
x = 3*size;
place = 0;
texte = 'NEWS ! CIB Bulletin ';
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
.Style25 {color: #990000}
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
.Style54 {font-size: 14px;}
.Style62 {color: #EBE9ED}
.Style69 {color: #0000FF; font-weight: bold; }
.Style70 {font-size: 14px; font-family: Arial, Helvetica, sans-serif; color: #000033; }
.Style71 {color: #0000FF}
.Style73 {color: #006600;}
.Style90 {font-family: Verdana, Arial, Helvetica, sans-serif}
.Style91 {font-size: 14}
.Style94 {font-weight: bold; font-size: 18px; color: #990000; }
.Style97 {font-weight: bold; font-size: 12px; color: #990000; }
.Style99 {color: #990000; font-weight: bold;}
</style>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></head>

<center>

<body text="#339933" link="#33FF00" vlink="#666666" alink="#666600" class="sb"><body text="#339933" link="#33FF00" vlink="#666666" alink="#666600" class="sb"> 
<?php 
      require 'entete.php' ;
?>
<center>

<div align="right" class="Style48">
    	<?php 
      $today = date ("  M ,D j,Y  H:i:s");
      echo " $today ";
    ?>
  </div>
<div id="main">
  <div class="Style17 Style62" id="col11"> 
      <h2 align="left" class="Style64"><font size="+3">Welcome Page</font></h2>
      <p align="left" class="Style64"><font size="+1">Welcome to the Coordinated 
        Informed Buying (CIB) System WEBSITE ! </font></p>
      <p align="left" class="Style70">The West African Health Organisation (WAHO) 
        is pleased to launch and host the Coordinated Informed Buying system website. 
        This Web page will enable the member states of the Economic Community 
        of West African States (ECOWAS) and partners to share information about 
        purchases and the supply of essential drugs. All women and men need access 
        to good quality medicines, in quantities sufficient for their needs, and 
        at price they can afford. The compilation, the dissemination, and a good 
        utilization of information on this site will ensure that these essential 
        products will be provided to and available for everyone. We welcome your 
        contributions, comments, or suggestions.</p>
       <p class="Style70">CIB Manager </p>
       <p class="Style63"><span class="Style64">West African Health Organisation </span><a href="http://www.wahooas.org" class="Style67"><strong><span class="Style99">(</span></strong></a><span class="Style99">www.wahooas.org)</span></p>
       <p class="Style70">Bobo-Dioulasso (Burkina Faso) </p>
       <p class="Style70">Email adress : <span class="Style99">fnezzi@wahooa</span><span class="Style99">s.org</span> ,<span class="Style99"> fnezzi@yahoo.com </span></p>
       <h2 align="left" class="Style23  Style54">&nbsp;</h2>
      <div align="left" class="Style54"></div>
  </div> 
  <div class="Style17" id="col1">
    <body onLoad="defil()" onUnload="clearTimeout(tempo2)" bgcolor="#0069B3">
    <FORM NAME="defil" class="Style25">
      <p>
         <SCRIPT LANGUAGE="JavaScript">
         document.write('<INPUT TYPE="text" NAME="defilbox" SIZE=' + size + '>');
         </SCRIPT>
      </p>
</FORM>
  <div>
      <img src="../images/covercibeng.jpg" width="154" height="220" align="middle"></p> 
      <p align="center"><span class="Style64"><span class="Style54"><font color="#0000FF" size="-1"> 
        <a href="../doc/cibulletineng.pdf"><font color="#000000"><font color="#0000FF">First 
        CIB Bulletin</font></font></a> </font><font color="#FF0000"><a href="../doc/cibulletineng.pdf"><img src="../images/pdf.png" width="27" height="32"></a></font></span></span></p>
      <p align="left" class="Style70">
      <p align="left"><img src="../images/cib40.jpg" width="401" height="290" align="middle"> 
      </p>
      <p align="left" class="Style70"><font color="#0000FF" size="-1">CIB focal 
        points technical workshop ( Dakar from 24 to 26 september 2012)</font> 
      <p align="left" class="Style70"><font size="-1"><span class="Style64"><span class="Style64"><span class="Style54"><a href="../doc/approrepouaga2012eng.pdf"><font size="-2"> 
        <font color="#333333">download the report </font></font></a></span></span></span></font><font size="-2"> 
        <font size="-1"><span class="Style64"><span class="Style64"><span class="Style54"><a href="../doc/cibreportdkr2012eng.pdf"><img src="../images/pdf.png" width="27" height="32" border="0"></a></span></span></span></font></font> 
      <p align="left" class="Style70">&nbsp; 
      <p align="left" class="Style70"><img src="../images/cibouv0912x.jpg" width="401" height="290"> 
      <p align="left" class="Style70"><span class="Style54"><font color="#0000FF" size="-1">Opening 
        ceremony by Senegal Authorities at the last CIB technical workshop Dakar-Senegal 
        from 24 to 26 september 2012</font></span> 
      <p align="left" class="Style70"> <font size="-1"><span class="Style64"><span class="Style64"><span class="Style54"><a href="../doc/cibreportwkaccra2012eng.pdf"><font size="-2"></font></a></span></span></span></font><font color="#0000FF" size="-1"> 
        </font> 
      <p align="left" class="Style64 Style54">&nbsp;</p>
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
  <p class="Style60">       
  <p class="Style60">       
  <p class="Style60">       
  <p class="Style60">&nbsp;
  <p class="Style60"><span class="Style60"><span class="sub Style60">WAHO 2008 
    - CIB WEBSITE - F. NEZZI</span></span><span class="sub Style60"> </span>
</center>
</body>
</html>

