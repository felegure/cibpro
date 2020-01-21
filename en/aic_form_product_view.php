<?php session_start(); 
require_once('../Connections/cibproto.php');

$currentPage = $_SERVER["PHP_SELF"];

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
  $insertSQL = sprintf("INSERT INTO tproduct (tproduct_id, tproduct_desc, tproduct_strength, tproduct_concent, tproduct_cat, tproduct_status, tproduct_remark) VALUES (%s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['tproduct_id'], "text"),
                       GetSQLValueString($_POST['tproduct_desc'], "text"),
                       GetSQLValueString($_POST['tproduct_strength'], "text"),
                       GetSQLValueString($_POST['tproduct_concent'], "text"),
                       GetSQLValueString($_POST['tproduct_cat'], "text"),
                       GetSQLValueString($_POST['tproduct_status'], "text"),
                       GetSQLValueString($_POST['tproduct_remark'], "text"));

  mysqli_select_db($database_cibproto, $cibproto);
  $Result1 = mysqli_query($insertSQL, $cibproto) or die(mysqli_error());

  $insertGoTo = "/pickaform.htm";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

$maxRows_Re_product = 100;
$pageNum_Re_product = 0;
if (isset($_GET['pageNum_Re_product'])) {
  $pageNum_Re_product = $_GET['pageNum_Re_product'];
}
$startRow_Re_product = $pageNum_Re_product * $maxRows_Re_product;

mysqli_select_db($database_cibproto, $cibproto);
$query_Re_product = "SELECT * FROM tproduct_en";
$query_limit_Re_product = sprintf("%s LIMIT %d, %d", $query_Re_product, $startRow_Re_product, $maxRows_Re_product);
$Re_product = mysqli_query($query_limit_Re_product, $cibproto) or die(mysqli_error());
$row_Re_product = mysqli_fetch_assoc($Re_product);

if (isset($_GET['totalRows_Re_product'])) {
  $totalRows_Re_product = $_GET['totalRows_Re_product'];
} else {
  $all_Re_product = mysqli_query($query_Re_product);
  $totalRows_Re_product = mysqli_num_rows($all_Re_product);
}
$totalPages_Re_product = ceil($totalRows_Re_product/$maxRows_Re_product)-1;

$queryString_Re_product = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Re_product") == false && 
        stristr($param, "totalRows_Re_product") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Re_product = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Re_product = sprintf("&totalRows_Re_product=%d%s", $totalRows_Re_product, $queryString_Re_product);

$queryString_Re_product = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Re_product") == false && 
        stristr($param, "totalRows_Re_product") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Re_product = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Re_product = sprintf("&totalRows_Re_product=%d%s", $totalRows_Re_product, $queryString_Re_product);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>List of List of Products</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.Style1 {font-size: 24px}
.Style6 {
	font-size: 12px;
	color: #009900;
}
.Style7 {
	font-size: 12px;
	color: #33FF00;
	font-weight: bold;
}
.Style13 {color: #003366}
.Style14 {
	color: #000066;
	font-size: 12px;
}
.Style17 {font-size: 12px}
-->
</style>
</head>

<body>
<p align="center" class="Style1">&nbsp;</p>
<table width="963" border="1" cellspacing="2" cellpadding="2">
  <tr>
    <th width="126" scope="row"><div align="center"><span class="Style1"><a href="pickaform.php" title="Retour" class="Style7 Style6 "><span class="Style13"><span class="Style14">Back</span></span></a></span></div></th>
    <td width="571"><div align="center" class="Style1">List of Products </div></td>
    <td width="138"><div align="center" class="Style17">username:<?php
				echo "{$_SESSION['username']}";
	?></div></td>
    <td width="92"><div align="center" class="Style17">Date : <?php 
      $today = date ("  M ,D j,Y  H:i:s");
      echo " $today "; ?></div></td>
  </tr>
</table>
<p align="center" class="Style1">
<div align="center">
  <table border="0" width="50%" align="center">
  <tr>
    <td width="23%" align="center">
      <?php if ($pageNum_Re_product > 0) { // Show if not first page ?>
      <a href="<?php printf("%s?pageNum_Re_product=%d%s", $currentPage, 0, $queryString_Re_product); ?>"><img src="../images/First.gif" border=0></a>
      <?php } // Show if not first page ?>
    </td>
    <td width="31%" align="center">
      <?php if ($pageNum_Re_product > 0) { // Show if not first page ?>
      <a href="<?php printf("%s?pageNum_Re_product=%d%s", $currentPage, max(0, $pageNum_Re_product - 1), $queryString_Re_product); ?>"><img src="../images/Previous.gif" border=0></a>
      <?php } // Show if not first page ?>
    </td>
    <td width="23%" align="center">
      <?php if ($pageNum_Re_product < $totalPages_Re_product) { // Show if not last page ?>
      <a href="<?php printf("%s?pageNum_Re_product=%d%s", $currentPage, min($totalPages_Re_product, $pageNum_Re_product + 1), $queryString_Re_product); ?>"><img src="../images/Next.gif" border=0></a>
      <?php } // Show if not last page ?>
    </td>
    <td width="23%" align="center">
      <?php if ($pageNum_Re_product < $totalPages_Re_product) { // Show if not last page ?>
      <a href="<?php printf("%s?pageNum_Re_product=%d%s", $currentPage, $totalPages_Re_product, $queryString_Re_product); ?>"><img src="../images/Last.gif" border=0></a>
      <?php } // Show if not last page ?>
    </td>
  </tr>
</table>
</p>
</div>
<div align="center">
  <table border="10">
    <tr>
      <td width="161">Code du produit</td>
      <td width="178">Description</td>
      <td width="197">Force</td>
      <td width="197">Concentration</td>
      <td width="168">Cat&eacute;gorie</td>
      <td width="184">Status (0=inactif, 1=actif) </td>
      <td width="193">Remarque</td>
    </tr>
    <?php do { ?>
    <tr>
      <td><?php echo $row_Re_product['tproduct_id']; ?></td>
      <td><?php echo $row_Re_product['tproduct_desc']; ?></td>
      <td><?php echo $row_Re_product['tproduct_strength']; ?></td>
      <td><?php echo $row_Re_product['tproduct_concent']; ?></td>
      <td><?php echo $row_Re_product['tproduct_cat']; ?></td>
      <td><?php echo $row_Re_product['tproduct_status']; ?></td>
      <td><?php echo $row_Re_product['tproduct_remark']; ?></td>
    </tr>
    <?php } while ($row_Re_product = mysqli_fetch_assoc($Re_product)); ?>
  </table>
</div>
<p>&nbsp;</p>
<p align="center">&nbsp;</p>

<p>&nbsp;</p>
</body>
</html>
<?php
mysqli_free_result($Re_product);
?>
