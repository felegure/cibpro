<?php 
session_start();
require_once('../Connections/cibproto.php'); 
error_reporting(E_ALL);
$rowid= $_GET['rowid'];
$buying=$_GET['hab'];
$usercountry=$_SESSION['username'];

$currentPage = $_SERVER["PHP_SELF"];
$message3="Wrong date format";
require_once ("utilang_en.php");
mysqli_select_db($cibproto, $database_cibproto); 
// mysqli_nom_rows(results) retourne le nombre de resultats du Query
///


$editFormAction = $_SERVER['PHP_SELF'];
//$ok=$_POST["tbuying_ok"];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}
 if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form2")) {
// if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "aic_form_input")) {
   
 $ok=$_POST["tbuying_ok"];
$val=$_POST["tbuying_val"];
// echo "Main ok=$ok , val=$val<BR>";  
//if ($ok ==1)
// {
//$retour=ControleFields($_POST,$ok);
  //echo " retourX=$retour <BR>";

  // if (ControleFields($_POST,$ok))
   //{
  //  echo " If ControleFields  <BR>";
  	$buying=$_POST;

	require_once("selectedcurrency.php");
	$message = "";
	
	$sw=0;
    //echo "val ===$val <CR>";
  if ($val!= 0)
     {
     
    $varowid = GetSQLValueString($buying['tbuying_rowid'],"int");
  	$actionSQL = "DELETE FROM $tbuying_table WHERE tbuying_rowid=$varowid and 
	tbuying_status = '2'";
	// echo "valeur de $actionSQL=$actionSQL <BR> varowid=$varowid <BR>";

    $Result1 = mysqli_query($cibproto, $actionSQL) or die(mysqli_error($cibproto));
	// echo " $msg_upd <BR>";    
  	// echo "$message3 XXX sw=$sw<BR>"; 
	  echo " $msg_del <BR>";  
    }
	// else echo "$msg_no_upd <BR>";
  $insertGoTo = "manage_form_ins.php";
 
   if (isset($_SERVER['QUERY_STRING'])) {
  //require_once ("t_search_param_buying_update.php");
   require_once ("aic_form_buying_delete_form.php");
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
   $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
 }
 
$maxRows_Re_tbuying = 1;
$pageNum_Re_tbuying = 0;
if (isset($_GET['pageNum_Re_tbuying'])) {
  $pageNum_Re_tbuying = $_GET['pageNum_Re_tbuying'];
}
$startRow_Re_tbuying = $pageNum_Re_tbuying * $maxRows_Re_tbuying;

$query_Re_product = "SELECT * FROM $product WHERE tproduct_status = '1' order by tproduct_desc";
$Re_product = mysqli_query($cibproto, $query_Re_product) or die(mysqli_error($cibproto));
$row_Re_product = mysqli_fetch_assoc($Re_product);
$totalRows_Re_product = mysqli_num_rows($Re_product);

$query_Re_manuf = "SELECT * FROM tmanufacturer WHERE tmanufacturer.tmanu_status='1' order by tmanu_desc";
$Re_manuf = mysqli_query($cibproto, $query_Re_manuf) or die(mysqli_error($cibproto));
$row_Re_manuf = mysqli_fetch_assoc($Re_manuf);
$totalRows_Re_manuf = mysqli_num_rows($Re_manuf);


mysqli_select_db($cibproto, $database_cibproto);
$query_Re_concent = "SELECT * FROM $concentration where tconcent_status = '1' ORDER BY tconcent_desc ASC";
$Re_concent = mysqli_query($cibproto, $query_Re_concent) or die(mysqli_error($cibproto));
$row_Re_concent = mysqli_fetch_assoc($Re_concent);
$totalRows_Re_concent = mysqli_num_rows($Re_concent);

$colname_Re_smalunit = "1";
if (isset($_GET['1'])) {
  $colname_Re_smalunit = (get_magic_quotes_gpc()) ? $_GET['1'] : addslashes($_GET['1']);
}

$query_Re_smalunit = sprintf("SELECT tsmalunit_id, tsmalunit_desc FROM $smalunit WHERE tsmalunit_status = '%s' order by tsmalunit_desc", $colname_Re_smalunit);
$Re_smalunit = mysqli_query($cibproto, $query_Re_smalunit) or die(mysqli_error($cibproto));
$row_Re_smalunit = mysqli_fetch_assoc($Re_smalunit);
$totalRows_Re_smalunit = mysqli_num_rows($Re_smalunit);


$query_Re_packaging = "SELECT tpack_id, tpack_desc FROM $pack WHERE tpack_status = '1' order by tpack_desc";
$Re_packaging = mysqli_query($cibproto, $query_Re_packaging) or die(mysqli_error($cibproto));
$row_Re_packaging = mysqli_fetch_assoc($Re_packaging);
$totalRows_Re_packaging = mysqli_num_rows($Re_packaging);


$query_Re_present = "SELECT tpresent_id, tpresent_desc FROM $present WHERE tpresent_status = '1' order by tpresent_desc";
$Re_present = mysqli_query($cibproto, $query_Re_present) or die(mysqli_error($cibproto));
$row_Re_present = mysqli_fetch_assoc($Re_present);
$totalRows_Re_present = mysqli_num_rows($Re_present);

$query_Re_currency = "SELECT tcur_id, tcur_desc FROM $cur WHERE tcur_status = '1' order by tcur_desc DESC";
$Re_currency = mysqli_query($cibproto, $query_Re_currency) or die(mysqli_error($cibproto));
$row_Re_currency = mysqli_fetch_assoc($Re_currency);
$totalRows_Re_currency = mysqli_num_rows($Re_currency);

mysqli_select_db($cibproto, $database_cibproto);
$query_Re_srcfund = "SELECT tsrcfund_id, tsrcfund_desc FROM $srcfund WHERE tsrcfund_status = '1' order by tsrcfund_desc";
$Re_srcfund = mysqli_query($cibproto,$query_Re_srcfund) or die(mysqli_error($cibproto));
$row_Re_srcfund = mysqli_fetch_assoc($Re_srcfund);
$totalRows_Re_srcfund = mysqli_num_rows($Re_srcfund);

$query_Re_provider = "SELECT tprov_id, tprov_coun_id, tprov_desc FROM tprovider WHERE tprov_status = '1' order by tprov_desc";
$Re_provider = mysqli_query($cibproto,$query_Re_provider) or die(mysqli_error($cibproto));
$row_Re_provider = mysqli_fetch_assoc($Re_provider);
$totalRows_Re_provider = mysqli_num_rows($Re_provider);

$query_Re_ttype_prov = "SELECT ttype_prov_id, ttype_prov_desc FROM $typrov WHERE ttype_prov_status = '1' ORDER BY ttype_prov_desc ASC";
$Re_ttype_prov = mysqli_query($cibproto,$query_Re_ttype_prov) or die(mysqli_error($cibproto));
$row_Re_ttype_prov = mysqli_fetch_assoc($Re_ttype_prov);
$totalRows_Re_ttype_prov = mysqli_num_rows($Re_ttype_prov);

$query_Re_transport = "SELECT ttransport_id, ttransport_desc FROM $transport WHERE ttransport_status = '1' order by ttransport_desc";
$Re_transport = mysqli_query($cibproto,$query_Re_transport) or die(mysqli_error($cibproto));
$row_Re_transport = mysqli_fetch_assoc($Re_transport);
$totalRows_Re_transport = mysqli_num_rows($Re_transport);


$query_Re_tincoterm = "SELECT tinco_id, tinco_desc FROM tincoterm WHERE tinco_status = '1' order by tinco_desc";
$Re_tincoterm = mysqli_query($cibproto,$query_Re_tincoterm) or die(mysqli_error($cibproto));
$row_Re_tincoterm = mysqli_fetch_assoc($Re_tincoterm);
$totalRows_Re_tincoterm = mysqli_num_rows($Re_tincoterm);

$colname_Re_prod = "1";
if (isset($_SESSION['STATCOUNTRY'])) {
  $colname_Re_prod = (get_magic_quotes_gpc()) ? $_SESSION['STATCOUNTRY'] : addslashes($_SESSION['STATCOUNTRY']);
}

$query_Re_prod = sprintf("SELECT * FROM $product 
WHERE tproduct_status = '%s' order by tproduct_desc", $colname_Re_prod);
$Re_prod = mysqli_query($cibproto,$query_Re_prod) or die(mysqli_error($cibproto));
$row_Re_prod = mysqli_fetch_assoc($Re_prod);
$totalRows_Re_prod = mysqli_num_rows($Re_prod);

$query_Re_tempo_tbuying = "SELECT tbuying_rowid, tecowas_id, tecowas_desc, 
tproduct_id, tproduct_desc, tproduct_brand_name, 
tpack_id, tpack_desc, 
tbuying_price_per_pack, tbuying_price_per_pack_dol, tbuying_price_per_pack_eur, tbuying_pack_size,
tbuying_lead_time, tbuying_qu, tbuying_qty_pack,
ttransport_id, ttransport_desc, tpresent_id, tpresent_desc, tinco_id, 
tinco_desc, DATE_FORMAT(tbuying_dbid,'%d-%m-%Y') tbuying_dbid, tcur_id, tcur_desc, tcur_symb, exr, tsrcfund_id, 
tsrcfund_desc, tprov_id, tprov_desc, tprov_coun_id, tprov_coun_desc, ttype_prov_id, 
ttype_prov_desc, tmanu_id, tmanu_desc, tmanu_coun_id, tmanu_coun_desc, 
tsmalunit_id, tsmalunit_desc, tbuying_ppu, tbuying_ppu_dol, tbuying_ppu_eur, 
tbuying_tcost, tbuying_tcost_dol, tbuying_tcost_eur,tbuying_qty_pack, tbuying_pack_size, 
tbuying_lead_time, tbuying_remark, tbuying_status
 FROM $view_table_name WHERE  tbuying_rowid=$rowid and tbuying_status='2'
and tecowas_id='$t_ec_id' ";

$Re_tempo_tbuying = mysqli_query($cibproto,$query_Re_tempo_tbuying) or die(mysqli_error($cibproto));
$row_Re_tempo_tbuying = mysqli_fetch_assoc($Re_tempo_tbuying);
$totalRows_Re_tempo_tbuying = mysqli_num_rows($Re_tempo_tbuying);

$query_Re_manuf = "SELECT * FROM tmanufacturer WHERE tmanu_status='1' order by tmanu_desc";
$Re_manuf = mysqli_query($cibproto, $query_Re_manuf) or die(mysqli_error($cibproto));
$row_Re_manuf = mysqli_fetch_assoc($Re_manuf);
$totalRows_Re_manuf = mysqli_num_rows($Re_manuf);


$query_Re_tinco1 ="SELECT tinco_id, tinco_desc FROM tincoterm WHERE
tinco_status = '1' order by tinco_desc" ; 
$Re_tinco1 = mysqli_query($cibproto,$query_Re_tinco1) or die(mysqli_error($cibproto)); 
$row_Re_tinco1 = mysqli_fetch_assoc($Re_tinco1); 
$totalRows_Re_tinco1 = mysqli_num_rows($Re_tinco1); 

$maxRows_Re_tempo_tbuying = 1; 
$pageNum_Re_tempo_tbuying = 0; 
if (isset($_GET['pageNum_Re_tempo_tbuying'])) { $pageNum_Re_tempo_tbuying = $_GET['pageNum_Re_tempo_tbuying']; 
} 
$startRow_Re_tempo_tbuying = $pageNum_Re_tempo_tbuying * $maxRows_Re_tempo_tbuying; 
mysqli_select_db($cibproto, $database_cibproto); 

$query_limit_Re_tempo_tbuying = sprintf("%s LIMIT %d, %d", $query_Re_tempo_tbuying, $startRow_Re_tempo_tbuying, $maxRows_Re_tempo_tbuying); 
$Re_tempo_tbuying = mysqli_query($cibproto,$query_limit_Re_tempo_tbuying) or die(mysqli_error($cibproto)); 
$row_Re_tempo_tbuying = mysqli_fetch_assoc($Re_tempo_tbuying); 
if (isset($_GET['totalRows_Re_tempo_tbuying'])) { $totalRows_Re_tempo_tbuying = $_GET['totalRows_Re_tempo_tbuying'];
 } 
 else { $all_Re_tempo_tbuying = mysqli_query($cibproto,$query_Re_tempo_tbuying); 
 $totalRows_Re_tempo_tbuying = mysqli_num_rows($all_Re_tempo_tbuying); 
 } 
 $totalPages_Re_tempo_tbuying = ceil($totalRows_Re_tempo_tbuying/$maxRows_Re_tempo_tbuying)-1; 
 $queryString_Re_tempo_tbuying ="";
  if (!empty($_SERVER['QUERY_STRING'])) { 
  $params = explode("&", $_SERVER['QUERY_STRING']); 
  $newParams = array(); 
  foreach ($params as $param) { 
    if (stristr($param,"pageNum_Re_tempo_tbuying") == false&&
	    stristr($param,"totalRows_Re_tempo_tbuying") == false) { 
	   array_push($newParams, $param); 
	}
  } 
  if (count($newParams) != 0) { 
	$queryString_Re_tempo_tbuying ="&". htmlentities(implode("&", $newParams)); 
  }
 }
 $queryString_Re_tempo_tbuying = sprintf("&totalRows_Re_tempo_tbuying=%d%s", $totalRows_Re_tempo_tbuying, $queryString_Re_tempo_tbuying); 
 $queryString_Re_tbuying =""; 
 if (!empty($_SERVER['QUERY_STRING'])) { 
 $params = explode("&", $_SERVER['QUERY_STRING']); $newParams = array();
  foreach ($params as $param) {
   if (stristr($param,"pageNum_Re_tbuying") == false&&stristr($param,"totalRows_Re_tbuying") == false) { 
   array_push($newParams, $param); 
   } 
  } 
  
  }
 
 ?>
 
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Delete tbuying</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.Style1 {
	font-size: 18px;
	color: #0000FF;
	font-weight: bold;
}
.Style6 {
	color: #006600;
	font-size: 9px
}

.Style19 {
	font-size: 15px;
	color: #006600;
	font-weight: bold;
}
.Style190 {
	font-size: 12px;
	color: #006600;
	font-weight: bold;
}
.Style20 {color: #990000}
.Style21 {color: #660099}
.Style22 {color: #990000}
.Style26 {font-size: 12}
.Style29 {color: #990000; font-size: 12; }
.Style30 {color: #000000}
.Style66 {
	font-size: 10px;
	color: #000099;
	font-weight: bold;
}
.Style68 {font-size: 9px
	color: #333333;
	
}
.Style680 {font-size: 8px
	color: #333333;
	
}
.Style19 {	color: #006600;
	font-weight: bold;
}
.Style24 {color: #000066}
.Style69 {color: #000099; font-weight: bold; }
.Style70 {color: #006600}
.Style71 {
	color: #000000;
	font-weight: bold;
}
-->
</style>
</head>

<body>

  <p align="left"><a href="aic_form_buying_delete.php" title="Retour" class="Style22">Back</a>	
  <p align="center"> <span class="Style22">
  <?php
				echo "$Form_title_en_delete";
	?>
  </span></p>
  <p>
<table border="0" width="50%" align="center">
  <tr>
    <td width="23%" align="center">
      <?php if ($pageNum_Re_tempo_tbuying > 0) { // Show if not first page ?>
      <a href="<?php printf("%s?pageNum_Re_tempo_tbuying=%d%s", $currentPage, 0, $queryString_Re_tempo_tbuying); ?>"><img src="First.gif" border=0></a>
      <?php } // Show if not first page ?>
    </td>
    <td width="31%" align="center">
      <?php if ($pageNum_Re_tempo_tbuying > 0) { // Show if not first page ?>
      <a href="<?php printf("%s?pageNum_Re_tempo_tbuying=%d%s", $currentPage, max(0, $pageNum_Re_tempo_tbuying - 1), $queryString_Re_tempo_tbuying); ?>"><img src="Previous.gif" border=0></a>
      <?php } // Show if not first page ?>
    </td>
    <td width="23%" align="center">
      <?php if ($pageNum_Re_tempo_tbuying < $totalPages_Re_tempo_tbuying) { // Show if not last page ?>
      <a href="<?php printf("%s?pageNum_Re_tempo_tbuying=%d%s", $currentPage, min($totalPages_Re_tempo_tbuying, $pageNum_Re_tempo_tbuying + 1), $queryString_Re_tempo_tbuying); ?>"><img src="Next.gif" border=0></a>
      <?php } // Show if not last page ?>
    </td>
    <td width="23%" align="center">
      <?php if ($pageNum_Re_tempo_tbuying < $totalPages_Re_tempo_tbuying) { // Show if not last page ?>
      <a href="<?php printf("%s?pageNum_Re_tempo_tbuying=%d%s", $currentPage, $totalPages_Re_tempo_tbuying, $queryString_Re_tempo_tbuying); ?>"><img src="Last.gif" border=0></a>
      <?php } // Show if not last page ?>
    </td>
  </tr>
</table>
</p>
<form name="aic_form_input" method="post" action="<?php echo $editFormAction; ?>">
  <table width="48" height="10" border="1" align="center" cellpadding="1" cellspacing="1" bgcolor="#ECE9D8" frame="border"> 
    <tr valign="baseline"> 
      <td width="53" align="right" ><div align="center">Product</div></td> 
      <td width="782"><div align="left">
        <input name="tproduct_desc22" type="text" class="Style19" value="<?php echo $row_Re_tempo_tbuying['tproduct_desc']; ?>" size="130" readonly="true">
      </div>
</td> 
    </tr> 
  </table> 

  <table width="917" border="3" cellpadding="1" cellspacing="1" bgcolor="#ECE9D8">
    <tr valign="baseline">
      <td width="144" align="right" ><div align="center" class="Style26 Style20">
          <div align="right"><span class="Style22">Presentation (*)</span></div>
      </div></td>
      <td width="185">
        <div align="left">
          <input name="tpresent_id2" type="text" class="Style68" value="<?php echo $row_Re_tempo_tbuying['tpresent_desc']; ?>" size="10" readonly="true">
          <input name="tpresent_id0" type="hidden" value="<?php echo $row_Re_tempo_tbuying['tpresent_id']; ?>">
      </div></td>
      <td width="170">
        <div align="center">
          <p class="Style29"><span class="Style22">Date of bid opening / Date of reception <span class="Style68"> (DD-MM-YYYY) (*)</span></span></p>
      </div></td>
      <td width="391">
        <input name="tbuying_dbid" type="text" class="Style68" value="<?php echo $row_Re_tempo_tbuying['tbuying_dbid']; ?>" size="15" maxlength="10" readonly="true">        </td>
    </tr>
    <tr valign="baseline">
      <td height="43" align="right" nowrap ><div align="right"><span class="Style22">Smallest unit<span class="Style68">(*)</span></span></div></td>
      <td><div align="left">
          <table width="120" border="1" cellspacing="2" cellpadding="2">
            <tr>
              <th width="40" scope="row"><div align="left">
                  <input name="tsmalunit_desc" type="text" class="Style68" value="<?php echo $row_Re_tempo_tbuying['tsmalunit_desc']; ?>" size="10" readonly="true">
                  <input name="tsmalunit_id0" type="hidden" value="<?php echo $row_Re_tempo_tbuying['tsmalunit_id']; ?>">
              </div></th>
              <td width="60">&nbsp;</td>
            </tr>
          </table>
      </div></td>
      <td><div align="center" class="Style22">
          <div align="center" class="Style22">
            <div align="center">Source of funding<span class="Style68">(*)</span> </div>
          </div>
        </div>
      <td><div align="left">
          <table width="222" border="1" cellspacing="1" cellpadding="1">
            <tr>
              <th width="116" scope="row"><input name="tsrcfund_desc22" type="text" class="Style68" value="<?php echo $row_Re_tempo_tbuying['tsrcfund_desc']; ?>" size="15" readonly="true">
                  <input name="tsrcfund_id0" type="hidden" value="<?php echo $row_Re_tempo_tbuying['tsrcfund_id']; ?>"></th>
              <td width="72">&nbsp;</td>
            </tr>
          </table>
      </div></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap><div align="center" class="Style22">
          <div align="right">
            <div align="center" class="Style22">
              <div align="right">Packaging Type<span class="Style68">(*)</span></div>
            </div>
          </div>
      </div></td>
      <td>
        <div align="left">
          <table width="185" height="41" border="1" cellpadding="1" cellspacing="1">
            <tr>
              <th width="99"  scope="row"><div align="left">
                  <input name="tpack_desc" type="text" class="Style68" value="<?php echo $row_Re_tempo_tbuying['tpack_desc']; ?>" size="10" readonly="true">
                  <input name="tpack_id0" type="hidden" value="<?php echo $row_Re_tempo_tbuying['tpack_id']; ?>">
              </div></th>
              <td width="153">&nbsp;</td>
            </tr>
          </table>
      </div></td>
      <td align="right" nowrap><div align="center"  class="Style22">
          <div align="center">Supplier<span class="Style68">(*)</span></div>
      </div></td>
      <td>
        <div align="left">
          <table width="221" border="1" cellspacing="1" cellpadding="1">
            <tr>
              <th width="150" scope="row"><input name="tprov_desc22" type="text" class="Style68" value="<?php echo $row_Re_tempo_tbuying['tprov_desc']; ?>" size="15" readonly="true">
                  <input name="tprov_id0" type="hidden" value="<?php echo $row_Re_tempo_tbuying['tprov_id']; ?>"></th>
              <td width="96">&nbsp;</td>
            </tr>
          </table>
      </div></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap><div align="center" class="Style22">
          <div align="right">Incoterm<span class="Style68">(*)</span></div>
      </div></td>
      <td><table width="185" border="1" cellspacing="1" cellpadding="1">
          <tr>
            <th width="115" scope="row"><div align="left">
                <input name="tinco_desc22" type="text" class="Style68" value="<?php echo $row_Re_tempo_tbuying['tinco_desc']; ?>" size="10" readonly="true">
                <input name="tinco_id0" type="hidden" value="<?php echo $row_Re_tempo_tbuying['tinco_id']; ?>">
            </div></th>
            <td width="137">&nbsp;</td>
          </tr>
      </table></td>
      <td align="right" nowrap><div align="center" class="Style29">
          <p align="center"><span class="Style22">Type of Supplier<span class="Style68">(*)</span></span></p>
      </div></td>
      <td><div align="justify"> </div>
          <table width="221" border="1" cellspacing="2" cellpadding="2">
            <tr>
              <th width="121" scope="row"><input name="ttype_prov_desc22" type="text" class="Style68" value="<?php echo $row_Re_tempo_tbuying['ttype_prov_desc']; ?>" size="15" readonly="true">
                  <input name="ttype_prov_id0" type="hidden" value="<?php echo $row_Re_tempo_tbuying['ttype_prov_id']; ?>">
              </th>
              <td width="80">&nbsp;              </td>
            </tr>
        </table></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap><div align="center" class="Style22">
          <p align="right">Currency<span class="Style68">(*)</span></p>
          <p>&nbsp;</p>
      </div></td>
      <td>
        <div align="left">
          <table width="122" border="1" cellspacing="1" cellpadding="1">
            <tr>
              <th width="6`80" scope="row"><input name="tcur_desc" type="text" class="Style68" value="<?php echo $row_Re_tempo_tbuying['tcur_desc']; ?>" size="10" readonly="true">
                  <input name="tcur_id0" type="hidden" value="<?php echo $row_Re_tempo_tbuying['tcur_id']; ?>"></th>
              <td width="49"><span class="Style22">
              </span></td>
            </tr>
          </table>
          <span class="Style6"><span class="Style29"><span class="Style22"> </span></span></span></div></td>
      <td align="right" nowrap><div align="center" class="Style29">
          <div align="center"><span class="Style22">Manufacturer<span class="Style68">(*)</span></span></div>
      </div></td>
      <td><div align="left">
          <table width="223" border="1" cellspacing="2" cellpadding="2">
            <tr>
              <th width="125" scope="row"><div align="center">
                  <input name="tmanufacturer2" type="text" class="Style68" value="<?php echo $row_Re_tempo_tbuying['tmanu_desc']; ?>" size="15" readonly="true">
                  <input name="tmanu_id0" type="hidden" value="<?php echo $row_Re_tempo_tbuying['tmanu_id']; ?>">
              </div></th>
              <td width="78">&nbsp;</td>
            </tr>
          </table>
      </div></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap><div align="center" class="Style22">
          <p align="right">Exchange rate<span class="Style68">(*)</span></p>
      </div></td>
      <td>        <div align="left"> <span class="Style6"><span class="Style29"><span class="Style22">
          <input name="exr" type="text" class="Style68" value="<?php echo $row_Re_tempo_tbuying['exr']; ?>" size="10" readonly="true">
      </span></span></span></div></td>
      <td><div align="center"><span class="Style22">Transportation method <span class="Style68">(*)</span></span></div></td>
      <td><div align="left">
          <table width="183" border="1" cellspacing="2" cellpadding="2">
            <tr>
              <th width="121" scope="row"><input name="ttransport_desc2" type="hidden" class="Style6" value="<?php echo $row_Re_transport['ttransport_desc']; ?>">
                  <input name="ttransport_id0" type="text" class="Style68" value="<?php echo $row_Re_tempo_tbuying['ttransport_id']; ?>" size="15"></th>
              <td width="41">&nbsp;              </td>
            </tr>
          </table>
      </div></td>
    </tr>
    <tr valign="baseline">
      <td height="47" align="right" nowrap><div align="center">
          <p align="right" class="Style22">Smallest unit price<span class="Style68">(*)</span></p>
          <p align="right" class="Style22">Quantity (smallest unit)<span class="Style68">(*)</span> </p>
          <p class="Style22">&nbsp;            </p>
      </div></td>
      <td><div align="center" class="Style22">
          <div align="left">
            <table width="181" border="0">
              <tr>
                <td width="175">                <input name="tbuying_ppu" type="text" class="Style68" value="<?php echo $row_Re_tempo_tbuying['tbuying_ppu'] ?>" size="8" 
					readonly="true"></td>
              </tr>
              <tr>
                <td>                <div align="left">
                    <input name="tbuying_qu" type="text" class="Style68"  value="<?php echo $row_Re_tempo_tbuying['tbuying_qu'] ?>" size="8" 
			readonly="true">
  </div></td>
              </tr>
            </table>
          </div>
          <p align="left" class="Style22">          <span class="Style30">          </span><span class="Style30"> </span> <span class="Style21"> </span></p>
      </div></td>
      <td>
        <p align="right" class="Style22"><span class="Style24">Remarks/Comments</span></p>
      <p align="right">&nbsp; </p></td>
      <td><div align="left">
          <p><span class="Style22">
            <input name="tbuying_remark" class="Style68"  value="<?php echo $row_Re_tempo_tbuying['tbuying_remark']; ?>" size="60"  readonly="true">
          </span> </p>
      </div></td>
      <td><div align="left"><span class="Style6"><span class="Style29"><span class="Style22"> </span></span></span> </div></td>
    </tr>
    <tr valign="baseline">
      <td height="47" align="right" nowrap><p class="Style22">Price per pack<span class="Style68">(*)</span></p>
          <p class="Style22"> Quantity<span class="Style68">(*)</span></p>
          <p><span class="Style22">Pack size<span class="Style68">(*)</span></span></p>
          <p><span class="Style22"><span class="Style24">
        </span></span></p></td>
      <td>        <p align="left">
          <input name="tbuying_price_per_pack" type="text" class="Style68" value="<?php echo $row_Re_tempo_tbuying['tbuying_price_per_pack']; ?>" size="10" readonly="true">
          </p>        
      <p align="left">
            <input name="tbuying_qty_pack" type="text" class="Style68" value="<?php echo $row_Re_tempo_tbuying['tbuying_qty_pack']; ?>" size="10" readonly="true">
          </p>        
      <p align="left">
            <input name="tbuying_pack_size" type="text" class="Style68" value="<?php echo $row_Re_tempo_tbuying['tbuying_pack_size']; ?>" size="10" readonly="true">
            <span class="Style22">
            </span></p>        
      </td>
      <td><div align="center" class="Style22">
          <div align="right">
            <p><span class="Style6">.</span></p>
            <p align="right" class="Style22">&nbsp;</p>
            <p align="right"></p>
            <p>&nbsp;</p>
          </div>
      </div></td>
      <td><div align="left">
          <table width="221" border="1" cellspacing="1" cellpadding="1">
            <tr> </tr>
          </table>
          <span class="Style22">
          <input name="Submit" type="submit" class="Style1" onClick='ValidateON()' value="submit" 
>
</span></div></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap><div align="center" class="Style22">
          <div align="center" class="Style22">
            <div align="right"></div>
          </div>
      </div></td>
      <td><div align="left"><span class="Style22">Total cost
            <input name="tbuying_tcost2" type="text" class="Style68" value="<?php echo $row_Re_tempo_tbuying['tbuying_tcost']; ?>" size="10" readonly="true">

      </span> </div></td>
      <td><div align="center" class="Style22">
          <div align="center" class="Style30">
            <div align="right">. </div>
          </div>
      </div></td>
      <td><div align="right"><span class="Style22">. </span> </div></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap><div align="center"><span class="Style21"><span class="Style24">Lead time  (days)</span> 
        </span></div></td>
      <td><div align="left"><span class="Style22">
        <input name="tbuying_lead_time" type="text" class="Style68" value="<?php echo $row_Re_tempo_tbuying['tbuying_lead_time']; ?>" size="10" readonly="true">
      </span>
        </div></td>
      <td><div align="center" class="Style22">
          <div align="right">. </div>
      </div></td>
      <td><div align="right">. </div></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap><div align="center"><span class="Style21">
        <input name="tbuying_rowid" type="hidden" value="<?php echo $row_Re_tempo_tbuying['tbuying_rowid']; ?>">
      </span></div></td>
      <td><div align="left">
        <input name="tbuying_ppu_cur" type="hidden" class="Style6" value="<?php echo $row_Re_tempo_tbuying['tbuying_ppu_cur']; ?>">
        <input name="MM_update" type="hidden" value="form2">
        <input name="tbuying_ppu3" type="hidden" class="Style6" value="<?php echo $row_Re_tempo_tbuying['tbuying_ppu']; ?>">
        <input name="tbuying_ppu20" type="hidden" class="Style6" value="<?php echo $row_Re_tempo_tbuying['tbuying_ppu']; ?>">
        <input name="tbuying_ok" type="hidden" class="Style6" value="0" >
        <input name="ppu1" type="hidden" class="Style6" value="" >
        <input name="ppu2" type="hidden" class="Style6" value="" >
        <input name="ppp1" type="hidden" class="Style6" value="" >
        <input name="ppp2" type="hidden" class="Style6" value="" >
        <input name="qu1" type="hidden" class="Style6" value="" >
        <input name="qu2" type="hidden" class="Style6" value="" >
        <input name="qty1" type="hidden" class="Style6" value="" >
        <input name="qty2" type="hidden" class="Style6" value="" >
        <span class="Style22"><span class="Style6"><span class="Style29"> </span></span></span>
        <input name="tcost1" type="hidden" class="Style6" value="" >
        <input name="tcost22" type="hidden" class="Style6" value="" >
        <input name="pack_size1" type="hidden" class="Style6" value="" >
        <input name="pack_size2" type="hidden" class="Style6" value="" >
        <input name="tbuying_val" type="hidden" class="Style6" value="0" >
          </div></td>
      <td><div align="right"><span class="Style22">
      </span></div></td>
      <td>
        <div align="right">
          <table width="224" border="1" cellpadding="1" cellspacing="1">
            <tr> </tr>
          </table>
          .</div></td>
    </tr>
    <tr valign="baseline">
      
    </tr>
    <caption>&nbsp;
    </caption>
  </table>
</form>
<p>&nbsp;</p>


<SCRIPT language="javascript">
//=======

function CF()
{
  alert ("CF ");	 
}

//=====
function ChoosePrice(radio) {
	// alert ("ChoosePrice xxx");
	document.aic_form_input.tbuying_ok.value=9;
 //    alert("radio.length = "); 
	  for (var i=0; i<radio.length;i++) {
	  // alert("Syst�me = "+radio.length);
         if (radio[i].checked) 
          {  
		//  alert("Syst�me 0 = "+radio[i].value);
			if ( i == 0) 
				{
					document.aic_form_input.tbuying_ok.value=0;
					document.aic_form_input.tbuying_price_per_pack2.disabled=true;
		  			document.aic_form_input.tbuying_qty_pack2.disabled=true;
					
				document.aic_form_input.tbuying_ppu2.disabled=false;
		  		document.aic_form_input.tbuying_qu2.disabled=false;
				}
				else {
				document.aic_form_input.tbuying_ok.value=1;
			    document.aic_form_input.tbuying_ppu2.disabled=true;
		  		document.aic_form_input.tbuying_qu2.disabled=true;
				document.aic_form_input.tbuying_price_per_pack2.disabled=false;
				document.aic_form_input.tbuying_qty_pack2.disabled=false;
			    }
         }
      }
   }
   function CalculateTotalPrice(radio,origine) {
	 alert ("CalculateTotalPrice="+origine);
	alert("Syst�me = "+radio.length);
      for (var i=0; i<radio.length;i++) {
 //alert("Syst�me 0= "+radio[i].value);
         if (radio[i].checked) 
          {  
		 
		//  alert("tbuying_ok = "+document.aic_form_input.tbuying_ok.value);
			if ( i == 0) 
				{
				 document.aic_form_input.tbuying_ok.value=1;
				//alert("Prix plus petite unite X Total Cost PPU2");
				document.aic_form_input.tbuying_qty_pack2.value=document.aic_form_input.tbuying_qu2.value / document.aic_form_input.tbuying_pack_size2.value; 
				//alert ("1");
				document.aic_form_input.tbuying_price_per_pack2.value=document.aic_form_input.tbuying_ppu2.value * document.aic_form_input.tbuying_pack_size2.value;
				//alert ("2");
				document.aic_form_input.tbuying_tcost2.value=document.aic_form_input.tbuying_qty_pack2.value * document.aic_form_input.tbuying_price_per_pack2.value;
			
					 document.aic_form_input.ppp2.value = document.aic_form_input.tbuying_price_per_pack2.value;
					// alert("ppp2");
					 document.aic_form_input.qty2.value = document.aic_form_input.tbuying_qty_pack2.value;
					// alert("ppP2= "+document.aic_form_input.ppp2.value);
					// alert("qty2= "+document.aic_form_input.qty2.value);
										
					 document.aic_form_input.tbuying_price_per_pack2.disabled=true;
		  			 document.aic_form_input.tbuying_qty_pack2.disabled=true;
									
				}
				else {
			//     alert("Syst�me 1 = "+radio[i].value);
			 document.aic_form_input.tbuying_ok.value=2;
				 //alert("Prix PER PACK SIZE per pack size O");
			     document.aic_form_input.tbuying_ppu2.value=document.aic_form_input.tbuying_price_per_pack2.value/document.aic_form_input.tbuying_pack_size2.value;
				  //alert("PPU2="+document.aic_form_input.tbuying_ppu2.value);
				 document.aic_form_input.tbuying_qu2.value=document.aic_form_input.tbuying_pack_size2.value*document.aic_form_input.tbuying_qty_pack2.value;
				 document.aic_form_input.tbuying_tcost2.value=document.aic_form_input.tbuying_qty_pack2.value * document.aic_form_input.tbuying_price_per_pack2.value;
		    //    document.aic_form_input.tbuying_ppu2.value=document.aic_form_input.tbuying_ppp2.value/document.aic_form_input.tbuying_qty_pack2.value;
				 document.aic_form_input.qu2.value=document.aic_form_input.tbuying_pack_size2.value * document.aic_form_input.tbuying_qty_pack2.value;
				 document.aic_form_input.tbuying_ppu2.disabled=true;
				 document.aic_form_input.tbuying_qu2.disabled=true;
			
				 document.aic_form_input.ppp2.value = document.aic_form_input.tbuying_price_per_pack2.value;
				 document.aic_form_input.qty2.value = document.aic_form_input.tbuying_qty_pack2.value;

			 
			   }
         }
   
	  }
   }
function ChooseFocus(Qty) {

      				
				//alert(" ChooseFocus ");
			//	alert(document.aic_form_input.tbuying_qu.value);
			
   }

 function ValidateON()
{
 var m="mon texte"; 
	var confirmation=confirm("Update?"); 
	// alert ("validateOn");
	ok=document.aic_form_input.tbuying_ok.value;
	//alert ("ValidateOn ok="+ok);
	if (confirmation){ 
  //action � faire pour la valeur true 
  	// alert ("then confirmation");
	document.aic_form_input.tbuying_val.value = 1;
	//alert ("111");
  	// alert ("then"+document.aic_form_input.tbuying_val.value);
	}
	else{ 
	// alert ("else confirmation");
	document.input_form_input.tbuying_val = 3;
	// alert ("else"+document.input_form_input.tbuying_val);
    }
}
function ControlFields(champ,nomchamp,ordre, bouton)
{
   alert ("ControlFields ordre="+ordre);
	if(champ=='') // 1
	{
		//alert(nomchamp+' is a Mandatory field !');
		//document.aic_form_input.champnom.focus();
	}
	else if(isNaN(champ)) // 2
	{
	alert(nomchamp+' is a Numeric field !');
	// valeur=document.aic_form_input.tbuying_qu2.value;
	
	//alert('champ='+champ);
	document.aic_form_input.tbuying_ok.value=0;
	//alert('valeur ok='+document.aic_form_input.tbuying_ok.value);
	document.aic_form_input.champ.focus();

	
	}
    else 
	{document.aic_form_input.tbuying_ok.value=1;
	//alert ("avant appel");
	CalculateTotalPrice(bouton,1);
	//alert ("apres appel");
	//alert ("else");
	}
}
</script>

<?php
mysqli_free_result($Re_product);
mysqli_free_result($Re_concent);
mysqli_free_result($Re_smalunit);
mysqli_free_result($Re_packaging);
mysqli_free_result($Re_present);
mysqli_free_result($Re_currency);
mysqli_free_result($Re_srcfund);
mysqli_free_result($Re_provider);
mysqli_free_result($Re_ttype_prov);
mysqli_free_result($Re_transport);
mysqli_free_result($Re_tincoterm);
mysqli_free_result($Re_prod);
mysqli_free_result($Re_tinco1);
mysqli_free_result($Re_tempo_tbuying);
mysqli_free_result($Re_manuf);
?>

<?php
function formater($date,$vers_mysql)
{

// JJ/MM/AAAA => AAAA-MM-JJ
if($vers_mysql)
{

	// echo " FFFFFFFFFFFFF formater date fonction";
	$pattern = "`([0-9]{2})/([0-9]{2})/([0-9]{4})`";
	$replacement = "$3-$2-$1";
 	// echo " THEN XXXXXXXXX";
}

// AAAA-MM-JJ => JJ/MM/AAAA
else
{
	$pattern = "`([0-9]{4})-([0-9]{2})-([0-9]{2})`";
	$replacement = "$3/$2/$1";

}

return preg_replace($pattern, $replacement, $date);
}
 

?>