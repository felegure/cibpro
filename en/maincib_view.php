
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
.Style22 {font-weight: bold; font-size: 14px; color: #990000; }
.Style24 {color: #FFFF66}
.Style14 {color: #990000}
.Style53 {color: #666666;
	font-style: italic;
	font-size: 9px;
}
.Style1 {color: #993300}
.Style99 {color: #990000; font-weight: bold;}
.Style101 {font-weight: bold; font-size: 18px; color: #990000; }
-->
</style>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></head>

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
    <h2 align="left" class="Style13 Style71"><span class="Style64">Welcome to the CIB</span> <span class="Style64">System</span></h2>
    <h2 align="left" class="Style23"><span class="Style64">You have been successfully identified by the CIB system with the right to view the data</span>!</h2>
  
      <div align="left">
        <div align="left">
          <p align="left" class="Style23"><strong><a href="pickareport_cons.php"><span class="Style99">Reports</span></a> :</strong></p>
        </div>
        
      <p align="left" class="Style23 Style64"><font color="#003333">The following 
        reports are available:</font></p>
        <ul>
          <li>
            <div align="left" class="Style23"><a href="pickareport_cons.php"><strong><span class="Style99">Prices</span></strong></a>: <span class="Style64">list of Product group by the <strong>lowest value</strong> per <strong>unit price</strong> and group by <strong>Inco term</strong>. </span></div>
          </li>
        </ul>
        
      <p align="left" class="Style23 Style64">T<font color="#003333">he user will 
        be able to enter <strong>parameters</strong> to query the system.</font></p>
        <ul>
          <li>
            <div align="left"><strong class="Style23"><a href="pickareport_cons.php"><span class="Style99">Suppliers and M</span><span class="Style71"><span class="Style99">anufacturers</span></span></a></strong>: <span class="Style23">L<span class="Style64">List of products supplied -/- manufactured by a </span></span></div>
          </li>
          <li>
            <div align="left"><span class="Style23"><span class="Style64">company during a period of time.</span></span></div>
          </li>
        </ul>
        <ul>
          <li><strong class="Style23"><a href="pickareport_cons.php"><span class="Style99">Suppliers and M</span><span class="Style71"><span class="Style99">anufacturers</span></span></a></strong><span class="Style23">L<span class="Style64">: List of contacts and details.</span></span></li>
        </ul>
        <p align="left" class="Style23 Style64">&nbsp;</p>
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
 <p align="left"> <font color="#000000" size="2">CIB user's manual</font> <span class="Style64"><span class="Style54"><font color="#0000FF" size="-1"><a href="../doc/cibulletinfr.pdf"><font color="#000000"><font color="#0000FF"> 
    </font></font></a></font><font color="#FF0000"><a href="../doc/cibusermanualeng.pdf"><img src="../images/pdf.png" width="27" height="32"></a></font></span></span> .</span></span></p>
      
    <p align="left" class="Style70"><img src="../images/cibwkaccragrpf.jpg" width="401" height="290"> 
    <p align="left" class="Style70"><span class="Style54"><font color="#0000FF" size="-1">CIB 
      technical workshop Accra-Ghana from 30 january to 1 february 2012</font></span> 
    <p align="left" class="Style70"> <font size="-1"><span class="Style64"><span class="Style64"><span class="Style54"><a href="../doc/cibreportwkaccra2012eng.pdf"><font size="-2"><font color="#333333">dow<font color="#000033">nload 
      the</font> report</font></font></a></span></span></span><font color="#0000FF"> 
      </font></font> <font color="#0000FF" size="-1"><span class="Style64"><span class="Style64"><span class="Style54"><a href="../doc/cibreportwkaccra2012eng.pdf"><img src="../images/pdf.png" width="27" height="32"></a></span></span></span> 
      </font> 
    <p align="left" class="Style64 Style54">&nbsp;</p>
    <p align="left">&nbsp;</p>
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
    <p align="center">&nbsp;<br>
    <span class="Style60"><span class="sub Style60">WAHO 2008 - CIB WEBSITE - PILOT PHASE - F. NEZZI</span></span>    
  <p align="center" class="Style21"><br>
    <br>
    &nbsp;<br>
    <!--||| Fin du pied de page |||-->
  </p>
</div>
<center></center>
</body>
</html>

