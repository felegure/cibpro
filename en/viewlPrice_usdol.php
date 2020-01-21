<?php 
session_start();
require_once('../Connections/cibproto.php'); ?>
<?php
$currentPage = $_SERVER["PHP_SELF"];
require_once ("utilang.php");
/*
$CUR_VAL = $_SESSION['TCURVAL'];

echo "XXXXXXXXXXCUR_VAL=$CUR_VAL <BR>";
*/
$maxRows_RePriceLow = 50;
$pageNum_RePriceLow = 0;
if (isset($_GET['pageNum_RePriceLow'])) {
  $pageNum_RePriceLow = $_GET['pageNum_RePriceLow'];
}
$startRow_RePriceLow = $pageNum_RePriceLow * $maxRows_RePriceLow;

$colname_RePriceLow = "1";
if (isset($_GET['tbuying_dbid'])) {
  $colname_RePriceLow = (get_magic_quotes_gpc()) ? $_GET['tbuying_dbid'] : addslashes($_GET['tbuying_dbid']);
}
mysqli_select_db($database_cibproto, $cibproto);

$query_RePriceLow = "SELECT tecowas_desc, tproduct_id,tproduct_desc, tbuying_uv, tconcent_desc, tdosage_desc, tpresent_desc, 
tbuying_ppu_dol, tsmalunit_desc, tpack_desc, tsrcfund_desc, tprov_coun_desc, tbuying_tcost, tbuying_qu, 
tprov_desc, tcur_desc, tcur_symb, ttype_prov_desc,tinco_desc,ttransport_desc, tbuying_dbid
from $view_table_name_en
ORDER BY tproduct_desc ,  tbuying_ppu_dol ";
/*
$query_RePriceLow = "SELECT tecowas_desc, tproduct_id,tproduct_desc, tbuying_uv, tconcent_desc, tdosage_desc, tpresent_desc, tbuying_ppu ,
tsmalunit_desc, tpack_desc, tbuying_ppu,
tsrcfund_desc, tprov_coun_desc, tbuying_tcost, tbuying_qu, tprov_desc, tcur_desc, tcur_symb,
ttype_prov_desc,tinco_desc,ttransport_desc, tbuying_dbid
from $view_table_name
ORDER BY tproduct_desc, tecowas_desc, tbuying_dbid ASC";

*/
$query_limit_RePriceLow = sprintf("%s LIMIT %d, %d", $query_RePriceLow, $startRow_RePriceLow, $maxRows_RePriceLow);
$RePriceLow = mysqli_query($query_limit_RePriceLow, $cibproto) or die(mysqli_error());
$row_RePriceLow = mysqli_fetch_assoc($RePriceLow);

if (isset($_GET['totalRows_RePriceLow'])) {
  $totalRows_RePriceLow = $_GET['totalRows_RePriceLow'];
} else {
  $all_RePriceLow = mysqli_query($query_RePriceLow);
  $totalRows_RePriceLow = mysqli_num_rows($all_RePriceLow);
}
$totalPages_RePriceLow = ceil($totalRows_RePriceLow/$maxRows_RePriceLow)-1;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Price Report Comprehensive list</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
.Style1 {font-family: Verdana, Arial, Helvetica, sans-serif}
.Style6 {color: #000066}
.Style7 {font-size: 24px}
.Style9 {font-size: 12px}
.Style21 {font-size: 12px; color: #333366; }
.Style25 {
	font-size: 12px;
	color: #000066;
}

.Style52 {	font-size: 24px;
	color: #000000;
	font-weight: bold;
}
.Style55 {color: #333366}
</style>
</head>

<body>
<div align="center"></div>
<table width="100%"  border="1" cellspacing="1" cellpadding="1" summary="Lowest Price per period">
  <caption class="Style1">&nbsp;
  </caption>
</table>


<table width="963" border="1" cellpadding="2" cellspacing="2">
  <tr>
    <th width="126" scope="row"><div align="center" class="Style25"><a href="pickareport.php" title="Retour" class="Style7 Style6 "><span class="Style25">Back</span></a></div></th>
    <td width="571"><div align="center" class="Style7 Style49"><span class="Style1"><span class="Style52">Price Per Product</span></span></div></td>
    <td width="138"><div align="center" class="Style9">username:
            <?php
				echo "{$_SESSION['username']}";
	?>
    </div></td>
    <td width="92"><div align="center" class="Style9">Date :
            <?php 
      $today = date ("  M ,D j,Y  H:i:s");
      echo " $today "; ?>
    </div></td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="100%"  border="1" cellspacing="1" cellpadding="1" summary="Lowest Price per period">
  <tr>
    <th width="7%" nowrap class="Style9" scope="col">Ecowas country</th>
    <th width="7%" nowrap scope="col"><div align="center" class="Style9">Product</div></th>
    <th width="2%" class="Style9" scope="col">Strength/Concentration</th>
    <th width="5%" class="Style9" scope="col">Dosage Form </th>
    <th width="3%" class="Style9" scope="col">Smalest Unit </th>
    <th width="5%" class="Style9" scope="col">Packaging</th>
    <th width="5%" class="Style9" scope="col">Presentation</th>
    <th width="5%" nowrap scope="col"><span class="Style9">Price per Unit (US$) </span></th>
    <th width="5%" nowrap scope="col"><div align="center" class="Style9">Total Cost </div></th>
    <th width="12%" nowrap class="Style9" scope="col">Qty of Unit </th>
    <th width="5%" class="Style9" scope="col">Inco Term </th>
    <th width="6%" class="Style9" scope="col">Provider</th>
    <th width="5%" scope="col"><div align="center" class="Style9">Type of Supplier </div></th>
    <th width="5%" class="Style9" scope="col">Country of Supplier </th>
  </tr>
  <?php do { ?>
  <tr>
    <td><div align="center" class="Style9"><?php echo $row_RePriceLow['tecowas_desc']; ?></div></td>
    <td><div align="center" class="Style9"><?php echo $row_RePriceLow['tproduct_desc']; ?></div></td>
    <td><div align="center" class="Style9"><?php echo $row_RePriceLow['tbuying_uv'].$row_RePriceLow['tconcent_desc']; ?></div></td>
   
    <td><div align="center" class="Style9"><?php echo $row_RePriceLow['tdosage_desc']; ?></div></td>
    <td><div align="center" class="Style9"><?php echo $row_RePriceLow['tsmalunit_desc']; ?></div></td>
    <td><div align="center" class="Style9"><?php echo $row_RePriceLow['tpack_desc']; ?></div></td>
    <td> <div align="center" class="Style9"><?php echo $row_RePriceLow['tpresent_desc']; ?></div></td>
	<td><div align="center"><span class="Style21"><?php echo $row_RePriceLow['tbuying_ppu_dol']."$"; ?></span></div></td>
	<td><div align="center" class="Style9"><?php echo $row_RePriceLow['tbuying_tcost']."$"; ?></div></td>
    <td><div align="center" class="Style9"><?php echo $row_RePriceLow['tbuying_qu']; ?></div></td>
    <td><div align="center" class="Style9"><?php echo $row_RePriceLow['tinco_desc']; ?></div></td>
    <td><div align="center" class="Style9"><?php echo $row_RePriceLow['tprov_desc']; ?></div></td>
    <td><div align="center" class="Style9"><?php echo $row_RePriceLow['ttype_prov_desc']; ?></div></td>
    <td><div align="center" class="Style9"><?php echo $row_RePriceLow['tprov_coun_desc']; ?></div></td>
  </tr>
  <?php } while ($row_RePriceLow = mysqli_fetch_assoc($RePriceLow)); ?>
</table>
</body>
</html>
<?php
mysqli_free_result($RePriceLow);
?>
