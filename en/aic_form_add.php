<?php require_once('../Connections/cibproto.php'); ?>
<?php
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO tbuying (tbuying_ec_id, tbuying_product_id, tbuying_uv, tbuying_concent_id, tbuying_categ_id, tbuying_dosage_id, tbuying_smalunit_id, tbuying_us, tbuying_pack_id, tbuying_ppu, tbuying_tcost, tbuying_qu, tbuying_present_id, tbuying_inco_id, tbuying_dbid, tbuying_cur_id, tbuying_exr, tbuying_srcfund_id, tbuying_prov_id, tbuying_type_prov_id, tbuying_country_id, tbuying_transport_id, tbuying_date, tbuying_auth, tbuying_dmod, tbuying_remark, tbuying_status) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['tbuying_ec_id'], "text"),
                       GetSQLValueString($_POST['tbuying_product_id'], "text"),
                       GetSQLValueString($_POST['tbuying_uv'], "text"),
                       GetSQLValueString($_POST['tbuying_concent_id'], "text"),
                       GetSQLValueString($_POST['tbuying_categ_id'], "text"),
                       GetSQLValueString($_POST['tbuying_dosage_id'], "text"),
                       GetSQLValueString($_POST['tbuying_smalunit_id'], "int"),
                       GetSQLValueString($_POST['tbuying_us'], "text"),
                       GetSQLValueString($_POST['tbuying_pack_id'], "int"),
                       GetSQLValueString($_POST['tbuying_ppu'], "text"),
                       GetSQLValueString($_POST['tbuying_tcost'], "text"),
                       GetSQLValueString($_POST['tbuying_qu'], "text"),
                       GetSQLValueString($_POST['tbuying_present_id'], "int"),
                       GetSQLValueString($_POST['tbuying_inco_id'], "text"),
                       GetSQLValueString($_POST['tbuying_dbid'], "date"),
                       GetSQLValueString($_POST['tbuying_cur_id'], "text"),
                       GetSQLValueString($_POST['tbuying_exr'], "double"),
                       GetSQLValueString($_POST['tbuying_srcfund_id'], "text"),
                       GetSQLValueString($_POST['tbuying_prov_id'], "int"),
                       GetSQLValueString($_POST['tbuying_type_prov_id'], "text"),
                       GetSQLValueString($_POST['tbuying_country_id'], "text"),
                       GetSQLValueString($_POST['tbuying_transport_id'], "text"),
                       GetSQLValueString($_POST['tbuying_date'], "date"),
                       GetSQLValueString($_POST['tbuying_auth'], "text"),
                       GetSQLValueString($_POST['tbuying_dmod'], "date"),
                       GetSQLValueString($_POST['tbuying_remark'], "text"),
                       GetSQLValueString($_POST['tbuying_status'], "text"));

  mysqli_select_db($database_cibproto, $cibproto);
  $Result1 = mysqli_query($insertSQL, $cibproto) or die(mysqli_error());

  $insertGoTo = "cib.htm";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysqli_select_db($database_cibproto, $cibproto);
$query_Re_tbuying = "SELECT * FROM tbuying";
$Re_tbuying = mysqli_query($query_Re_tbuying, $cibproto) or die(mysqli_error());
$row_Re_tbuying = mysqli_fetch_assoc($Re_tbuying);
$totalRows_Re_tbuying = mysqli_num_rows($Re_tbuying);

mysqli_select_db($database_cibproto, $cibproto);
$query_Re_product = "SELECT tproduct_id, tproduct_desc FROM tproduct";
$Re_product = mysqli_query($query_Re_product, $cibproto) or die(mysqli_error());
$row_Re_product = mysqli_fetch_assoc($Re_product);
$totalRows_Re_product = mysqli_num_rows($Re_product);

mysqli_select_db($database_cibproto, $cibproto);
$query_Re_concent = "SELECT tconcent_id, tconcent_desc FROM tconcentration WHERE tconcent_status = '1'";
$Re_concent = mysqli_query($query_Re_concent, $cibproto) or die(mysqli_error());
$row_Re_concent = mysqli_fetch_assoc($Re_concent);
$totalRows_Re_concent = mysqli_num_rows($Re_concent);

mysqli_select_db($database_cibproto, $cibproto);
$query_Re_product_search = "SELECT tproduct_cat FROM tproduct WHERE tproduct_cat = 'tbuying_categ_id'";
$Re_product_search = mysqli_query($query_Re_product_search, $cibproto) or die(mysqli_error());
$row_Re_product_search = mysqli_fetch_assoc($Re_product_search);
$totalRows_Re_product_search = mysqli_num_rows($Re_product_search);

mysqli_select_db($database_cibproto, $cibproto);
$query_Re_category = "SELECT tcateg_id, tcateg_desc, tcateg_status FROM tcategory WHERE tcateg_status = '1'";
$Re_category = mysqli_query($query_Re_category, $cibproto) or die(mysqli_error());
$row_Re_category = mysqli_fetch_assoc($Re_category);
$totalRows_Re_category = mysqli_num_rows($Re_category);

mysqli_select_db($database_cibproto, $cibproto);
$query_Re_prod_categ = "SELECT tcateg_id FROM tcategory where tcateg_status = 1";
$Re_prod_categ = mysqli_query($query_Re_prod_categ, $cibproto) or die(mysqli_error());
$row_Re_prod_categ = mysqli_fetch_assoc($Re_prod_categ);
$totalRows_Re_prod_categ = mysqli_num_rows($Re_prod_categ);

$colname_Re_dosage = "1";
if (isset($_GET['1'])) {
  $colname_Re_dosage = (get_magic_quotes_gpc()) ? $_GET['1'] : addslashes($_GET['1']);
}
mysqli_select_db($database_cibproto, $cibproto);
$query_Re_dosage = sprintf("SELECT tdosage_id, tdosage_desc FROM tdosage WHERE tdosage_status = '%s'", $colname_Re_dosage);
$Re_dosage = mysqli_query($query_Re_dosage, $cibproto) or die(mysqli_error());
$row_Re_dosage = mysqli_fetch_assoc($Re_dosage);
$totalRows_Re_dosage = mysqli_num_rows($Re_dosage);

$colname_Re_smalunit = "1";
if (isset($_GET['1'])) {
  $colname_Re_smalunit = (get_magic_quotes_gpc()) ? $_GET['1'] : addslashes($_GET['1']);
}
mysqli_select_db($database_cibproto, $cibproto);
$query_Re_smalunit = sprintf("SELECT tsmalunit_id, tsmalunit_desc FROM tsmalunit WHERE tsmalunit_status = '%s'", $colname_Re_smalunit);
$Re_smalunit = mysqli_query($query_Re_smalunit, $cibproto) or die(mysqli_error());
$row_Re_smalunit = mysqli_fetch_assoc($Re_smalunit);
$totalRows_Re_smalunit = mysqli_num_rows($Re_smalunit);

$colname_Re_packaging = "1";
if (isset($_GET['1'])) {
  $colname_Re_packaging = (get_magic_quotes_gpc()) ? $_GET['1'] : addslashes($_GET['1']);
}
mysqli_select_db($database_cibproto, $cibproto);
$query_Re_packaging = sprintf("SELECT tpack_id, tpack_desc FROM tpack WHERE tpack_status = '%s'", $colname_Re_packaging);
$Re_packaging = mysqli_query($query_Re_packaging, $cibproto) or die(mysqli_error());
$row_Re_packaging = mysqli_fetch_assoc($Re_packaging);
$totalRows_Re_packaging = mysqli_num_rows($Re_packaging);

$colname_Re_present = "1";
if (isset($_GET['1s'])) {
  $colname_Re_present = (get_magic_quotes_gpc()) ? $_GET['1s'] : addslashes($_GET['1s']);
}
mysqli_select_db($database_cibproto, $cibproto);
$query_Re_present = sprintf("SELECT tpresent_id, tpresent_desc FROM tpresent WHERE tpresent_status = '%s'", $colname_Re_present);
$Re_present = mysqli_query($query_Re_present, $cibproto) or die(mysqli_error());
$row_Re_present = mysqli_fetch_assoc($Re_present);
$totalRows_Re_present = mysqli_num_rows($Re_present);

$colname_Re_currency = "1";
if (isset($_GET['1'])) {
  $colname_Re_currency = (get_magic_quotes_gpc()) ? $_GET['1'] : addslashes($_GET['1']);
}
mysqli_select_db($database_cibproto, $cibproto);
$query_Re_currency = sprintf("SELECT tcur_id, tcur_desc FROM tcur WHERE tcur_status = '%s'", $colname_Re_currency);
$Re_currency = mysqli_query($query_Re_currency, $cibproto) or die(mysqli_error());
$row_Re_currency = mysqli_fetch_assoc($Re_currency);
$totalRows_Re_currency = mysqli_num_rows($Re_currency);

$colname_Re_srcfund = "1";
if (isset($_GET['1'])) {
  $colname_Re_srcfund = (get_magic_quotes_gpc()) ? $_GET['1'] : addslashes($_GET['1']);
}
mysqli_select_db($database_cibproto, $cibproto);
$query_Re_srcfund = sprintf("SELECT tsrcfund_id, tsrcfund_desc FROM tsrcfund WHERE tsrcfund_status = '%s'", $colname_Re_srcfund);
$Re_srcfund = mysqli_query($query_Re_srcfund, $cibproto) or die(mysqli_error());
$row_Re_srcfund = mysqli_fetch_assoc($Re_srcfund);
$totalRows_Re_srcfund = mysqli_num_rows($Re_srcfund);

$colname_Re_provider = "1";
if (isset($_GET['1'])) {
  $colname_Re_provider = (get_magic_quotes_gpc()) ? $_GET['1'] : addslashes($_GET['1']);
}
mysqli_select_db($database_cibproto, $cibproto);
$query_Re_provider = sprintf("SELECT tprov_id, tprov_coun_id, tprov_desc FROM tprovider WHERE tprov_status = '%s'", $colname_Re_provider);
$Re_provider = mysqli_query($query_Re_provider, $cibproto) or die(mysqli_error());
$row_Re_provider = mysqli_fetch_assoc($Re_provider);
$totalRows_Re_provider = mysqli_num_rows($Re_provider);

$colname_Re_ttype_prov = "1";
if (isset($_GET['1'])) {
  $colname_Re_ttype_prov = (get_magic_quotes_gpc()) ? $_GET['1'] : addslashes($_GET['1']);
}
mysqli_select_db($database_cibproto, $cibproto);
$query_Re_ttype_prov = sprintf("SELECT ttype_prov_id, ttype_prov_desc FROM ttypeprov WHERE ttype_prov_status = '%s' ORDER BY ttype_prov_desc ASC", $colname_Re_ttype_prov);
$Re_ttype_prov = mysqli_query($query_Re_ttype_prov, $cibproto) or die(mysqli_error());
$row_Re_ttype_prov = mysqli_fetch_assoc($Re_ttype_prov);
$totalRows_Re_ttype_prov = mysqli_num_rows($Re_ttype_prov);

$colname_Re_country = "1";
if (isset($_GET['1'])) {
  $colname_Re_country = (get_magic_quotes_gpc()) ? $_GET['1'] : addslashes($_GET['1']);
}
mysqli_select_db($database_cibproto, $cibproto);
$query_Re_country = sprintf("SELECT tcountry_id, tcountry_desc FROM tcountry WHERE tcountry_status = '%s' ORDER BY tcountry_desc ASC", $colname_Re_country);
$Re_country = mysqli_query($query_Re_country, $cibproto) or die(mysqli_error());
$row_Re_country = mysqli_fetch_assoc($Re_country);
$totalRows_Re_country = mysqli_num_rows($Re_country);

$colname_Re_transport = "1";
if (isset($_GET['1'])) {
  $colname_Re_transport = (get_magic_quotes_gpc()) ? $_GET['1'] : addslashes($_GET['1']);
}
mysqli_select_db($database_cibproto, $cibproto);
$query_Re_transport = sprintf("SELECT ttransport_id, ttransport_desc FROM ttransport WHERE ttransport_status = '%s'", $colname_Re_transport);
$Re_transport = mysqli_query($query_Re_transport, $cibproto) or die(mysqli_error());
$row_Re_transport = mysqli_fetch_assoc($Re_transport);
$totalRows_Re_transport = mysqli_num_rows($Re_transport);

$colname_Re_tincoterm = "1";
if (isset($_GET['1'])) {
  $colname_Re_tincoterm = (get_magic_quotes_gpc()) ? $_GET['1'] : addslashes($_GET['1']);
}
mysqli_select_db($database_cibproto, $cibproto);
$query_Re_tincoterm = sprintf("SELECT tinco_id, tinco_desc FROM tincoterm WHERE tinco_status = '%s'", $colname_Re_tincoterm);
$Re_tincoterm = mysqli_query($query_Re_tincoterm, $cibproto) or die(mysqli_error());
$row_Re_tincoterm = mysqli_fetch_assoc($Re_tincoterm);
$totalRows_Re_tincoterm = mysqli_num_rows($Re_tincoterm);

$colname_Re_ecowas = "1";
if (isset($_GET['1'])) {
  $colname_Re_ecowas = (get_magic_quotes_gpc()) ? $_GET['1'] : addslashes($_GET['1']);
}
mysqli_select_db($database_cibproto, $cibproto);
$query_Re_ecowas = sprintf("SELECT tecowas_id, tecowas_desc FROM tecowas WHERE tecowas_status = '%s'", $colname_Re_ecowas);
$Re_ecowas = mysqli_query($query_Re_ecowas, $cibproto) or die(mysqli_error());
$row_Re_ecowas = mysqli_fetch_assoc($Re_ecowas);
$totalRows_Re_ecowas = mysqli_num_rows($Re_ecowas);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Saisie AIC</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<form method="post" name="form1" action="<?php echo $editFormAction; ?>">
  <table align="center">
    <tr valign="baseline">
      <td width="140" align="right" nowrap>Country/Pays:</td>
      <td width="291">        <select name="tbuying_tecowas_id">
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Product:</td>
      <td>        <select name="tbuying_product_id">
          <?php
do {  
?>
          <option value="<?php echo $row_Re_product['tproduct_id']?>"><?php echo $row_Re_product['tproduct_desc']?></option>
          <?php
} while ($row_Re_product = mysqli_fetch_assoc($Re_product));
  $rows = mysqli_num_rows($Re_product);
  if($rows > 0) {
      mysqli_data_seek($Re_product, 0);
	  $row_Re_product = mysqli_fetch_assoc($Re_product);
  }
?>
        </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Value/valeur:</td>
      <td><input type="num" name="tbuying_uv" size="32">
      </td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Concentration:</td>
      <td><select name="tbuying_concent_id">
        <?php
do {  
?>
        <option value="<?php echo $row_Re_concent['tconcent_id']?>"<?php if (!(strcmp($row_Re_concent['tconcent_id'], $row_Re_tbuying['tbuying_status']))) {echo "SELECTED";} ?>><?php echo $row_Re_concent['tconcent_desc']?></option>
        <?php
} while ($row_Re_concent = mysqli_fetch_assoc($Re_concent));
  $rows = mysqli_num_rows($Re_concent);
  if($rows > 0) {
      mysqli_data_seek($Re_concent, 0);
	  $row_Re_concent = mysqli_fetch_assoc($Re_concent);
  }
?>
                        </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Tbuying_categ_id:</td>
      <td>        <select name="tbuying_categ_id">
        <?php
do {  
?>
        <option value="<?php echo $row_Re_category['tcateg_id']?>"<?php if (!(strcmp($row_Re_category['tcateg_id'], $row_Re_tbuying['tbuying_product_id']))) {echo "SELECTED";} ?>><?php echo $row_Re_category['tcateg_id']?></option>
        <?php
} while ($row_Re_category = mysqli_fetch_assoc($Re_category));
  $rows = mysqli_num_rows($Re_category);
  if($rows > 0) {
      mysqli_data_seek($Re_category, 0);
	  $row_Re_category = mysqli_fetch_assoc($Re_category);
  }
?>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Tbuying_dosage_id:</td>
      <td>        <select name="tbuying_tdosage_id">
        <?php
do {  
?>
        <option value="<?php echo $row_Re_dosage['tdosage_id']?>"><?php echo $row_Re_dosage['tdosage_desc']?></option>
        <?php
} while ($row_Re_dosage = mysqli_fetch_assoc($Re_dosage));
  $rows = mysqli_num_rows($Re_dosage);
  if($rows > 0) {
      mysqli_data_seek($Re_dosage, 0);
	  $row_Re_dosage = mysqli_fetch_assoc($Re_dosage);
  }
?>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Tbuying_smalunit_id:</td>
      <td>        <select name="tbuying_smalunit">
        <?php
do {  
?>
        <option value="<?php echo $row_Re_smalunit['tsmalunit_id']?>"><?php echo $row_Re_smalunit['tsmalunit_desc']?></option>
        <?php
} while ($row_Re_smalunit = mysqli_fetch_assoc($Re_smalunit));
  $rows = mysqli_num_rows($Re_smalunit);
  if($rows > 0) {
      mysqli_data_seek($Re_smalunit, 0);
	  $row_Re_smalunit = mysqli_fetch_assoc($Re_smalunit);
  }
?>
            </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Tbuying_us:</td>
      <td><input type="text" name="tbuying_us" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Tbuying_pack_id:</td>
      <td>        <select name="tbuying_pack_id">
        <?php
do {  
?>
        <option value="<?php echo $row_Re_packaging['tpack_id']?>"><?php echo $row_Re_packaging['tpack_desc']?></option>
        <?php
} while ($row_Re_packaging = mysqli_fetch_assoc($Re_packaging));
  $rows = mysqli_num_rows($Re_packaging);
  if($rows > 0) {
      mysqli_data_seek($Re_packaging, 0);
	  $row_Re_packaging = mysqli_fetch_assoc($Re_packaging);
  }
?>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Tbuying_ppu:</td>
      <td><input type="text" name="tbuying_ppu" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Tbuying_tcost:</td>
      <td><input type="text" name="tbuying_tcost" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Tbuying_qu:</td>
      <td><input type="text" name="tbuying_qu" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Tbuying_present_id:</td>
      <td>        <select name="tbuying_present_id">
        <?php
do {  
?>
        <option value="<?php echo $row_Re_present['tpresent_id']?>"><?php echo $row_Re_present['tpresent_desc']?></option>
        <?php
} while ($row_Re_present = mysqli_fetch_assoc($Re_present));
  $rows = mysqli_num_rows($Re_present);
  if($rows > 0) {
      mysqli_data_seek($Re_present, 0);
	  $row_Re_present = mysqli_fetch_assoc($Re_present);
  }
?>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Tbuying_inco_id:</td>
      <td>        <select name="Tbuying_inco_id">
        <?php
do {  
?>
        <option value="<?php echo $row_Re_tincoterm['tinco_id']?>"><?php echo $row_Re_tincoterm['tinco_desc']?></option>
        <?php
} while ($row_Re_tincoterm = mysqli_fetch_assoc($Re_tincoterm));
  $rows = mysqli_num_rows($Re_tincoterm);
  if($rows > 0) {
      mysqli_data_seek($Re_tincoterm, 0);
	  $row_Re_tincoterm = mysqli_fetch_assoc($Re_tincoterm);
  }
?>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Tbuying_dbid:</td>
      <td><input type="text" name="tbuying_dbid" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Tbuying_cur_id:</td>
      <td>        <select name="Tbuying_cur_id">
        <?php
do {  
?>
        <option value="<?php echo $row_Re_currency['tcur_id']?>"><?php echo $row_Re_currency['tcur_desc']?></option>
        <?php
} while ($row_Re_currency = mysqli_fetch_assoc($Re_currency));
  $rows = mysqli_num_rows($Re_currency);
  if($rows > 0) {
      mysqli_data_seek($Re_currency, 0);
	  $row_Re_currency = mysqli_fetch_assoc($Re_currency);
  }
?>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Tbuying_exr:</td>
      <td><input type="text" name="tbuying_exr" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Tbuying_srcfund_id:</td>
      <td>        <select name="Tbuying_srcfund_id">
        <?php
do {  
?>
        <option value="<?php echo $row_Re_srcfund['tsrcfund_id']?>"><?php echo $row_Re_srcfund['tsrcfund_desc']?></option>
        <?php
} while ($row_Re_srcfund = mysqli_fetch_assoc($Re_srcfund));
  $rows = mysqli_num_rows($Re_srcfund);
  if($rows > 0) {
      mysqli_data_seek($Re_srcfund, 0);
	  $row_Re_srcfund = mysqli_fetch_assoc($Re_srcfund);
  }
?>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Tbuying_prov_id:</td>
      <td>        <select name="Tbuying_prov_id">
        <?php
do {  
?>
        <option value="<?php echo $row_Re_provider['tprov_id']?>"><?php echo $row_Re_provider['tprov_desc']?></option>
        <?php
} while ($row_Re_provider = mysqli_fetch_assoc($Re_provider));
  $rows = mysqli_num_rows($Re_provider);
  if($rows > 0) {
      mysqli_data_seek($Re_provider, 0);
	  $row_Re_provider = mysqli_fetch_assoc($Re_provider);
  }
?>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Tbuying_type_prov_id:</td>
      <td>        <select name="Tbuying_type_prov_id">
        <?php
do {  
?>
        <option value="<?php echo $row_Re_ttype_prov['ttype_prov_id']?>"><?php echo $row_Re_ttype_prov['ttype_prov_desc']?></option>
        <?php
} while ($row_Re_ttype_prov = mysqli_fetch_assoc($Re_ttype_prov));
  $rows = mysqli_num_rows($Re_ttype_prov);
  if($rows > 0) {
      mysqli_data_seek($Re_ttype_prov, 0);
	  $row_Re_ttype_prov = mysqli_fetch_assoc($Re_ttype_prov);
  }
?>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Tbuying_country_id:</td>
      <td>        <select name="Tbuying_country_id">
        <?php
do {  
?>
        <option value="<?php echo $row_Re_country['tcountry_id']?>"><?php echo $row_Re_country['tcountry_desc']?></option>
        <?php
} while ($row_Re_country = mysqli_fetch_assoc($Re_country));
  $rows = mysqli_num_rows($Re_country);
  if($rows > 0) {
      mysqli_data_seek($Re_country, 0);
	  $row_Re_country = mysqli_fetch_assoc($Re_country);
  }
?>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Tbuying_transport_id:</td>
      <td>        <select name="Tbuying_transport_id">
        <?php
do {  
?>
        <option value="<?php echo $row_Re_transport['ttransport_id']?>"><?php echo $row_Re_transport['ttransport_desc']?></option>
        <?php
} while ($row_Re_transport = mysqli_fetch_assoc($Re_transport));
  $rows = mysqli_num_rows($Re_transport);
  if($rows > 0) {
      mysqli_data_seek($Re_transport, 0);
	  $row_Re_transport = mysqli_fetch_assoc($Re_transport);
  }
?>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Tbuying_date:</td>
      <td><input type="text" name="tbuying_date" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Tbuying_auth:</td>
      <td><input type="text" name="tbuying_auth" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Tbuying_dmod:</td>
      <td><input type="text" name="tbuying_dmod" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Tbuying_remark:</td>
      <td><input type="text" name="tbuying_remark" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Tbuying_status:</td>
      <td><input type="text" name="tbuying_status" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td><input type="submit" value="Insérer l'enregistrement"></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1">
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysqli_free_result($Re_tbuying);

mysqli_free_result($Re_product);

mysqli_free_result($Re_concent);

mysqli_free_result($Re_product_search);

mysqli_free_result($Re_category);

mysqli_free_result($Re_prod_categ);

mysqli_free_result($Re_dosage);

mysqli_free_result($Re_smalunit);

mysqli_free_result($Re_packaging);

mysqli_free_result($Re_present);

mysqli_free_result($Re_currency);

mysqli_free_result($Re_srcfund);

mysqli_free_result($Re_provider);

mysqli_free_result($Re_ttype_prov);

mysqli_free_result($Re_country);

mysqli_free_result($Re_transport);

mysqli_free_result($Re_tincoterm);

mysqli_free_result($Re_ecowas);
?>
