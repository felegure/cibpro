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
<title>Data Report Page Sub-Menu - Pickareport.php</title>
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
.Style3 {color: #003366}

.Style7 {color: #FFFF00}
.Style13 {color: #FFFF00; font-weight: bold; }
.Style14 {color: #990000}
.Style17 {color: #FFFFFF; font-family: Arial, Helvetica, sans-serif; }
.Style21 {color: #FFFFFF; font-family: Arial, Helvetica, sans-serif; font-size: 14px; }
.Style22 {font-weight: bold; font-size: 14px; color: #990000; }
.Style23 {font-size: 14px; color: #FFFFFF;}
.Style24 {color: #FFFF66}
.Style39 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
.Style48 {
	font-family: Arial, Helvetica, sans-serif;
	color: #CCCC99;
	font-size: 12px;
}
.Style54 {font-size: 14px;}
.Style56 {
	font-size: 16px;
	color: #0000FF;
}
.Style64 {color: #000033}
.Style65 {font-size: 14px; color: #000033; }
.Style71 {color: #0000FF}
.Style108 {color: #990000; font-weight: bold;}
.Style111 {font-weight: bold}
-->
</style>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></head>

<center>

<body alink="#006699" class="sb">

<?php 
      require 'entete_rep.php' ;
   
    ?>
<div align="right" class="Style48">
    	<?php 
      $today = date ("  M ,D j,Y  H:i:s");
      echo " $today ";
    ?>
</div><div id="main">
  <div class="Style17" id="col11">
<div id="Layer6" style="position:absolute; left:24px; top:177px; width:119px; height:17px; z-index:6; background-color: #CCCCCC; layer-background-color: #CCCCCC; border: 1px none #000000;">
      <div align="center" class="Style3 Style22"><strong><a href="affiche_maincib_cons.php" class="Style5"><span
  class="Style22"><strong>Back to Menu</strong></span></a></strong></div>
    </div>
    <div id="Layer6" style="position:absolute; left:175px; top:200px; width:475px; height:px; z-index:6; background-color: #CCCCCC; layer-background-color: #CCCCCC; border: 1px none #000000;"> 
      <div align="center" class="Style3 Style22"> 
        <p><strong><span
  class="Style3"><span class="Style3 Style22 Style56 Style57"><span class="Style3 Style22 Style7 Style59"><span class="Style3">List 
          of Products with the <font color="#FF0000">lowest price</font> <font color="#000066">within 
          a date interval</font></span></span></span></span></strong></p>
      </div>
    </div>
    <div id="Layer6" style="position:absolute; left:177px; top:155px; width:475px; height:38px; z-index:6; background-color: #FFFF33; layer-background-color: #FFFF33; border: 1px none #000000;"> 
      <div align="center" class="Style3 Style22"> 
        <p><strong><span
  class="Style3"><strong> <span class="Style3 Style22 Style56 Style57"><span class="Style3 Style22 Style7 Style59"><span class="Style3"><font size="+2">Reports</font></span></span></span></strong></span></strong></p>
      </div>
    </div>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <h2 class="Style13 Style24 Style50">&nbsp;</h2>
     
    <div id="Layer6" style="position:absolute; left:178px; top:231px; width:25px; height:16px; z-index:6; background-color: #009900; layer-background-color: #009900; border: 1px none #000000;"> 
      <div align="center" class="Style3 Style22"><a href="t_search_price_range_dol.php" class="Style3">$</a></div>
     </div>
     
    <div id="Layer6" style="position:absolute; left:627px; top:230px; width:23px; height:16px; z-index:6; background-color: #2176B5; layer-background-color: #2176B5; border: 1px none #000000;"> 
      <div align="center" class="Style3 Style22"><a href="t_search_price_range_eur_c.php" class="Style3 Style55">&euro;</a></div>
    </div>
     <p>&nbsp;</p>
     
    <div id="Layer7" style="position:absolute; left:175px; top:400px; width:475px; height:25px; z-index:6; background-color: #CCCCCC; layer-background-color: #CCCCCC; border: 1px none #000000;"> 
      <div align="center" class="Style3 Style22"><strong><span
  class="Style3"><strong><a href="aic_list_supplier_summary_c.php"><span class="Style3"><strong><strong><strong><strong><strong><strong><font color="#000066">List 
        of Suppliers with details</font></strong></strong></strong></strong></strong></strong></span></a></strong></span></strong></div>
    </div>
    <p>&nbsp;</p>
    <div id="Layer6" style="position:absolute; left:175px; top:262px; width:475px; height:37px; z-index:6; background-color: #CCCCCC; layer-background-color: #CCCCCC; border: 1px none #000000;"> 
      <div align="center" class="Style3 Style22"><span class="Style53"><strong><strong><strong><span
  class="Style3"><strong><span class="Style3"><strong>List of<strong> <font color="#FF0000">all</font></strong> 
        Products <font color="#000066">supplied within a date inter</font></strong><font color="#000066">val</font></span></strong></span></strong></strong></strong></span></div>
    </div>
	<div id="Layer6" style="position:absolute; left:-25px; top:19px; width:25px; height:16px; z-index:6; background-color: #009900; layer-background-color: #009900; border: 1px none #000000;"> 
          <div align="center" class="Style3 Style22"><a href="t_search_price_supp_range_dol.php" class="Style3">$</a></div>
        </div>
	<div id="Layer6" style="position:absolute; left:175px; top:334px; width:475px; height:37px; z-index:6; background-color: #CCCCCC; layer-background-color: #CCCCCC; border: 1px none #000000;"> 
      <div align="center" class="Style3 Style22"><span class="Style53"><strong><strong><strong><span
  class="Style3"><strong><span class="Style3"><strong><strong>List of Products 
        group by <font color="#FF0000">Suppliers</font> within a date interval</strong></strong></span></strong></span></strong></strong></strong></span> 
        <div id="Layer6" style="position:absolute; left:0px; top:17px; width:25px; height:16px; z-index:6; background-color: #009900; layer-background-color: #009900; border: 1px none #000000;"> 
          <div align="center" class="Style3 Style22"><a href="t_search_price_supp_range_dol_c.php" class="Style3">$</a></div>
        </div>
        <div id="Layer6" style="position:absolute; left:445px; top:17px; width:25px; height:18px; z-index:6; background-color: #2176B5; layer-background-color: #2176B5; border: 1px none #000000;"> 
          <div align="center" class="Style3 Style22"><a href="t_search_price_supp_range_eur_c.php" class="Style3 Style55">&euro;</a></div>
        </div>
      </div>
    </div>
    <div id="Layer7" style="position:absolute; left:175px; top:500px; width:475px; height:25px; z-index:6; background-color: #CCCCCC; layer-background-color: #CCCCCC; border: 1px none #000000;"> 
      <div class="Style3 Style22">
        <div align="center"><strong><span
  class="Style3"><strong><span class="Style3 Style22 Style56"><span class="Style3"><strong><strong><strong><strong><strong><strong><span
  class="Style3"><strong><span
  class="Style3"><strong><span class="Style3 Style22 Style56 Style57"><span class="Style3"><span class="Style3"><a href="t_search_param_buying_categ_control_prod_cons.php"><font color="#000066">List 
          of Products in the Database</font></a></span></span></span></strong></span></strong></span></strong></strong></strong></strong></strong></strong></span></span></strong></span></strong></div>
      </div>
    </div>
    <p>&nbsp;</p>
    <div id="Layer6" style="position:absolute; left:175px; top:33111px; width:475px; height:37px; z-index:6; background-color: #CCCCCC; layer-background-color: #CCCCCC; border: 1px none #000000;">
      <div align="center" class="Style3 Style22">
        <div id="Layer6" style="position:absolute; left:3px; top:18px; width:25px; height:16px; z-index:6; background-color: #009900; layer-background-color: #009900; border: 1px none #000000; font-style: italic;">
          <div align="center" class="Style3  Style22"><a href="t_search_price_supp_range_dol.php" class="Style3">$</a></div>
        </div>
        <span class="Style3"><span
  class="Style3"><strong><font color="#000066"><span class="Style3">Prix des produits 
        par fournisseurs pour une p&eacute;riode donn&eacute;e</span></font></strong> 
        </span></span> 
        <div id="Layer6" style="position:absolute; left:447px; top:17px; width:25px; height:16px; z-index:6; background-color: #2176B5; layer-background-color: #2176B5; border: 1px none #000000;">
          <div align="center" class="Style3 Style22"><a href="t_search_price_supp_range_eur.php" class="Style3 Style55">&euro;</a></div>
        </div>
      </div>
    </div>
530    
    <div id="Layer6" style="position:absolute; left:178px; top:279px; width:25px; height:16px; z-index:6; background-color: #009900; layer-background-color: #009900; border: 1px none #000000;"> 
      <div align="center" class="Style3 Style22"><a href="t_search_supman_dol_c.php" class="Style3">$</a></div>
    </div>
    <div id="Layer6" style="position:absolute; left:625px; top:279px; width:25px; height:18px; z-index:6; background-color: #2176B5; layer-background-color: #2176B5; border: 1px none #000000;"> 
      <div align="center" class="Style3 Style22"><a href="t_search_supman_eur_c.php" class="Style3 Style55">&euro;</a></div>
    </div>
    <div id="Layer7" style="position:absolute; left:175px; top:450px; width:475px; height:25px; z-index:6; background-color: #CCCCCC; layer-background-color: #CCCCCC; border: 1px none #000000;"> 
      <div align="center" class="Style3 Style22"><font color="#000066"><strong><span
  class="Style3"><strong><a href="aic_list_manuf_summary_c.php"><span class="Style3"><strong><strong><strong><strong><strong><strong><font color="#000066">List 
        of Manufacturers with details</font></strong></strong></strong></strong></strong></strong></span></a></strong></span></strong></font></div>
    </div>
    <div id="Layer7" style="position:absolute; left:175px; top: 550px; width:475px; height:25px; z-index:6; background-color: #CCCCCC; layer-background-color: #CCCCCC; border: 1px none #000000;"> 
      <div class="Style3 Style22"> 
        <div align="center"><strong><span
  class="Style3"><strong><span class="Style3 Style22 Style56"><span class="Style3"><strong><strong><strong><strong><strong><strong><span
  class="Style3"><strong><span
  class="Style3"><strong><span class="Style3 Style22 Style56 Style57"><span class="Style3"><span class="Style3"><a href="aic_form_categ_list_c.php"><font color="#000066"> 
          List of Categories</font></a></span></span></span></strong></span></strong></span></strong></strong></strong></strong></strong></strong></span></span></strong></span></strong></div>
      </div>
    </div>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <div id="Layer7" style="position:absolute; left:175px; top:599px; width:475px; height:25px; z-index:6; background-color: #CCCCCC; layer-background-color: #CCCCCC; border: 1px none #000000;"> 
      <div class="Style3 Style22">
        <div align="center"><strong><span
  class="Style3"><strong><span
  class="Style3"><strong><span class="Style3 Style22 Style56 Style57"><span class="Style3"><span class="Style3"><a href="aic_form_srcfund_list_c.php"><font color="#000066">Source 
          of funding</font></a></span></span></span></strong></span></strong></span></strong></div>
      </div>
    </div>
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
    <p align="left"> <font color="#000000" size="2">CIB user's manual</font> <span class="Style64"><span class="Style54"><font color="#0000FF" size="-1"><a href="../doc/cibulletinfr.pdf"><font color="#000000"><font color="#0000FF"> 
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
<center class="Style22"><div align="left"></div>
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
  <span class="Style60"><span class="sub Style60">WAHO 2008 - CIB WEBSITE - PILOT PHASE - F. NEZZI</span></span>  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</center>
</body>
</html>

