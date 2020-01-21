
<html>
<head>
<title>maincib_ins.php</title>
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
.Style14 {color: #990000}
.Style17 {color: #FFFFFF; font-family: Arial, Helvetica, sans-serif; }
.Style21 {color: #FFFFFF; font-family: Arial, Helvetica, sans-serif; font-size: 14px; }
.Style22 {font-weight: bold; font-size: 14px; color: #990000; }
.Style23 {font-size: 14px; color: #FFFFFF;}
.Style24 {color: #FFFF66}
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
.Style64 {color: #000033}
.Style71 {color: #0000FF}
.Style73 {color: #006600;}
.Style99 {color: #990000; font-weight: bold;}
.Style101 {font-weight: bold}
.Style105 {color: #006600; font-family: Verdana, Arial, Helvetica, sans-serif; }
</style>


<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></head>

<center>

<body alink="#006699" class="sb">
<?php 
      require 'entete_ins.php' ;
   
    ?>

  <div align="right" class="Style48">
    	<?php 
      $today = date ("  M ,D j,Y  H:i:s");
      echo " $today ";
    ?>
  </div>
<div id="main">
<div class="Style17" id="col11"> 
    <h2 align="left" class="Style64">Welcome to the CIB System</h2>
    <h2 align="left" class="Style23"><span class="Style64">You have been successfully identified by the CIB system with the right to</span> <span class="Style64">insert </span><span class="Style64">data!</span></h2>
    <p align="left" class="Style65">According to your level of authorisation, you will : </p>
    <ul class="Style21">
      <div align="left"> 
        <p class="Style65">&#150;&nbsp;Insert data in the system </p>
        <p class="Style64"><span class="Style51 Style21"><strong><a href="manage_form_ins.php" class="Style71 Style80"><span class="Style14">Data input </span></a></strong></span>: Enter Procurement data in the database </p>
        <p class="Style64">&#150;&nbsp;List the pending documents ( these documents are waiting for the Validation process)</p>
        <p class="Style64">Data control : list of the documents waiting for the Validation process</p>
        <p class="Style64">&#150;&nbsp;Modify data </p>
        <p class="Style64">Data modification: Entered data  can be recalled and be modified before the Validation process.</p>
        <p class="Style64">&#150;&nbsp;Delete data </p>
        <p class="Style64">Data deletion : Delete all the selected data.</p>
        <p class="Style64">General Policies :</p>
      </div>
    </ul>
    <div align="left">
      <ul class="Style21">
        <li>
          <div align="left" class="Style64"> No country can submit data or modify data from another country.</div>
        </li>
        <li>
          <div align="left" class="Style64"> All country users can query or retrieve reports from the database.</div>
        </li>
        <li class="Style64">The system administrator (CIB manager) assigns user names/default passwords and group memberships per country. </li>
      </ul>
      <div align="left">
        <p align="left" class="Style51 Style21"><strong><strong><a href="pickareport.php" class="Style80"><span class="Style14">Reports</span></a></strong> :</strong></p>
      </div>
      <p align="left" class="Style65">The following reports are available:</p>
      <ul>
        <li> 
          <div align="left" class="Style23"><a href="pickareport.php"><strong><span class="Style14">Prices</span></strong></a><span class="Style71">: 
            </span><span class="Style64">list of Product group by the <strong>lowest 
            value</strong> per unit price</span> 
            <div align="left"><strong class="Style23"><a href="pickareport.php" class="Style71"><span class="Style14">Suppliers</span> 
              <span class="Style14">and</span> <span class="Style14">Manufacturers</span></a></strong><span class="Style64">: 
              List of products supplied -/- manufactured by a company during a 
              period of time.</span></div>
          </div>
        </li>
        <li> 
          <div align="left" class="Style23"> 
            <div align="left"></div>
          </div>
        </li>
      </ul>
    </div>
    <div align="left">
<p align="left" class="Style51 Style21">&nbsp;</p>
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
    <font color="#000000" size="2">CIB user's manual</font> <span class="Style64"><span class="Style54"><font color="#0000FF" size="-1"><a href="../doc/cibulletinfr.pdf"><font color="#000000"><font color="#0000FF"> 
    </font></font></a></font><font color="#FF0000"><a href="../doc/cibusermanualeng.pdf"><img src="../images/pdf.png" width="27" height="32"></a></font></span></span> 
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
<center>
  <p>&nbsp;<br>
    <br>
  &nbsp;<br>
  &nbsp;<br>
  <span class="Style60"><span class="sub Style60">WAHO 2008 - CIB WEBSITE - PILOT PHASE - F. NEZZI</span></span>
</center>
</body>
</html>

