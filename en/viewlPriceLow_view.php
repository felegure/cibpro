<?php require_once('Connections/conproto.php'); ?>
<?php
$currentPage = $_SERVER["PHP_SELF"];

$maxRows_RePriceLow = 50;
$pageNum_RePriceLow = 0;
if (isset($_GET['pageNum_RePriceLow'])) {
  $pageNum_RePriceLow = $_GET['pageNum_RePriceLow'];
}
$startRow_RePriceLow = $pageNum_RePriceLow * $maxRows_RePriceLow;

mysqli_select_db($database_conproto, $conproto);
$query_RePriceLow = "SELECT * FROM tbuying_view";
$query_limit_RePriceLow = sprintf("%s LIMIT %d, %d", $query_RePriceLow, $startRow_RePriceLow, $maxRows_RePriceLow);
$RePriceLow = mysqli_query($query_limit_RePriceLow, $conproto) or die(mysqli_error());
$row_RePriceLow = mysqli_fetch_assoc($RePriceLow);

if (isset($_GET['totalRows_RePriceLow'])) {
  $totalRows_RePriceLow = $_GET['totalRows_RePriceLow'];
} else {
  $all_RePriceLow = mysqli_query($query_RePriceLow);
  $totalRows_RePriceLow = mysqli_num_rows($all_RePriceLow);
}
$totalPages_RePriceLow = ceil($totalRows_RePriceLow/$maxRows_RePriceLow)-1;

$queryString_RePriceLow = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_RePriceLow") == false && 
        stristr($param, "totalRows_RePriceLow") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_RePriceLow = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_RePriceLow = sprintf("&totalRows_RePriceLow=%d%s", $totalRows_RePriceLow, $queryString_RePriceLow);

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
mysqli_select_db($database_conproto, $conproto);
$query_RePriceLow = "SELECT tecowas_desc, tproduct_id,tproduct_desc, tbuying_uv, tconcent_desc, tdosage_desc, tpresent_desc,min( tbuying_ppu ) ,  tsmalunit_desc, tpack_desc, tbuying_ppu,
tsrcfund_desc, tcountry_desc, tbuying_tcost, tbuying_qu, tprov_desc, tcur_desc, ttype_prov_desc,tinco_desc,tbuying_transport_id, tbuying_dbid
from tbuying_view
GROUP BY tproduct_id
ORDER BY tproduct_desc, tbuying_dbid ASC";

$query_limit_RePriceLow = sprintf("%s LIMIT %d, %d", $query_RePriceLow, $startRow_RePriceLow, $maxRows_RePriceLow);
$RePriceLow = mysqli_query($query_limit_RePriceLow, $conproto) or die(mysqli_error());
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
<title>Price Report </title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
.Style1 {font-family: Verdana, Arial, Helvetica, sans-serif}
.Style9 {font-size: 12px}
.Style13 {
	font-style: italic;
	font-size: 12px;
	color: #333366;
	font-weight: bold;
}
.Style16 {font-size: 14}
.Style18 {
	font-size: 12px;
	color: #000066;
	font-style: italic;
}
.Style19 {color: #000066}
.Style8 {font-size: 24px}
</style>
</head>

<body>
  <a href="pickareport_view.htm" title="Retour" class="Style9 Style19">Back</a>
 <div align="center"></div>
<table width="100%"  border="1" cellspacing="2" cellpadding="2" summary="Lowest Price per period">
  <caption class="Style1">
  <span class="Style8"><strong>Lowest Price Per Product</strong></span>  <span class="Style18">
  </span>
  <span class="Style8">
  <?
$today = date (" m/j/Y");
echo " - date : ". $today." ";
?>
  </span>
  </caption>
  
  <tr>
    <th width="5%" nowrap scope="col"><span class="Style9">Ecowas country </span></th>
    <th width="7%" nowrap scope="col"><span class="Style9">Product</span></th>
    <th width="2%" scope="col"><span class="Style9">Unit of value </span></th>
    <th width="2%" scope="col"><span class="Style9">Concentration</span></th>
    <th width="5%" scope="col"><span class="Style9">Dosage Form </span></th>
    <th width="3%" scope="col"><span class="Style9">Smalest Unit </span></th>
    <th width="5%" scope="col"><span class="Style9">Packaging</span></th>
    <th width="5%" scope="col"><span class="Style9">Presentation</span></th>
    <th width="2%" scope="col"><span class="Style9">Lowest (Price per Unit) </span></th>
    <th width="5%" nowrap scope="col"><span class="Style9">Total Cost </span></th>
    <th width="5%" nowrap scope="col"><span class="Style9">Currency</span></th>
    <th width="12%" nowrap scope="col"><span class="Style9">Qty of Unit </span></th>
    <th width="5%" scope="col"><span class="Style9">Inco Term </span></th>
    <th width="6%" scope="col"><span class="Style9">Provider</span></th>
    <th width="5%" scope="col"><span class="Style9">Type of Supplier </span></th>
    <th width="5%" scope="col"><span class="Style9">Country</span></th>
  </tr>
  <?php do { ?>
  <tr>
    <td><div align="center"><span class="Style9"><?php echo $row_RePriceLow['tecowas_desc']; ?></span></div></td>
    <td><div align="center"><span class="Style9"><?php echo $row_RePriceLow['tproduct_desc']; ?></span></div></td>
    <td><div align="right"><span class="Style9"><?php echo $row_RePriceLow['tbuying_uv']; ?></span></div></td>
    <td><div align="left"><span class="Style9"><?php echo $row_RePriceLow['tconcent_desc']; ?></span></div></td>
    <td><div align="center"><span class="Style9"><?php echo $row_RePriceLow['tdosage_desc']; ?></span></div></td>
    <td><div align="center"><span class="Style9"><?php echo $row_RePriceLow['tsmalunit_desc']; ?></span></div></td>
    <td><div align="center"><span class="Style9"><?php echo $row_RePriceLow['tpack_desc']; ?></span></div></td>
    <td class="Style9"><?php echo $row_RePriceLow['tpresent_desc']; ?></td>
    <td class="Style13"><div align="center" class="Style16"><?php echo $row_RePriceLow['tbuying_ppu']; ?></div></td>
    <td><div align="center"><span class="Style9"><?php echo $row_RePriceLow['tbuying_tcost']; ?></span></div></td>
    <td><span class="Style9"><?php echo $row_RePriceLow['tcur_desc']; ?></span></td>
    <td><div align="center"><span class="Style9"><?php echo $row_RePriceLow['tbuying_qu']; ?></span></div></td>
    <td><div align="center"><span class="Style9"><?php echo $row_RePriceLow['tinco_desc']; ?></span></div></td>
    <td><div align="center"><span class="Style9"><?php echo $row_RePriceLow['tprov_desc']; ?></span></div></td>
    <td><div align="center"><span class="Style9"><?php echo $row_RePriceLow['ttype_prov_desc']; ?></span></div></td>
    <td><div align="center"><span class="Style9"><?php echo $row_RePriceLow['tcountry_desc']; ?></span></div></td>
  </tr>
  <?php } while ($row_RePriceLow = mysqli_fetch_assoc($RePriceLow)); ?>
</table>


</body>
</html>
<?php
mysqli_free_result($RePriceLow);
?>
