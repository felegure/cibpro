<?php require_once('../Connections/cibproto.php'); ?>
<?php 
//session_start();
/*
echo "aic_form_buying_validate.php   VALEUR DE ACCESS: {$_SESSION['Access']}<BR>";
 echo "aic_form_buying_validate_20.php var de session COUNTRY: {$_SESSION['COUNTRY']}<BR>";
 echo "aic_form_buying_validate_20.php   var de session STATUSCOUNTRY: {$_SESSION['STATUS']}<BR>";
echo "aic_form_buying_validate_20.php var de session user_name: {$_SESSION['username']}<BR>";
*/
$currentPage = $_SERVER["PHP_SELF"];
require_once ("utilang.php");
$maxRows_Re_buying_view = 10;
$pageNum_Re_buying_view = 0;
if (isset($_GET['pageNum_Re_buying_view'])) {
  $pageNum_Re_buying_view = $_GET['pageNum_Re_buying_view'];
}
$startRow_Re_buying_view = $pageNum_Re_buying_view * $maxRows_Re_buying_view;
/*

mysqli_select_db($database_cibproto, $cibproto);
$query_Re_buying_view = "SELECT * FROM $view_table_name WHERE $view_table_name.tecowas_id = '{$_SESSION['COUNTRY']}'
and $view_table_name.tbuying_status = '2' order by tcateg_desc" ;
$Re_buying_view = mysqli_query($query_Re_buying_view, $cibproto) or die(mysqli_error());
$row_Re_buying_view = mysqli_fetch_assoc($Re_buying_view);
$totalRows_Re_buying_view = mysqli_num_rows($Re_buying_view);
*/
$maxRows_Re_buying_view_2 = 10;
$pageNum_Re_buying_view_2 = 0;
if (isset($_GET['pageNum_Re_buying_view_2'])) {
  $pageNum_Re_buying_view_2 = $_GET['pageNum_Re_buying_view_2'];
}
$startRow_Re_buying_view_2 = $pageNum_Re_buying_view_2 * $maxRows_Re_buying_view_2;

mysqli_select_db($database_cibproto, $cibproto);
$query_Re_buying_view_2 = "SELECT tbuying_rowid, tecowas_id, tecowas_desc, 
tcateg_id, tcateg_desc, tproduct_id, tproduct_desc, tproduct_brand_name, 
tconcent_id, tconcent_desc, tdosage_id, tdosage_desc, tpack_id, tpack_desc, 
price_per_pack, price_per_pack_dol, price_per_pack_eur, pack_size, leadtime, 
ttransport_id, ttransport_desc, tbuying_present_id, tpresent_desc, tinco_id, 
tinco_desc, DATE_FORMAT(tbuying_dbid,'%d-%m-%Y') tbuying_dbid, tcur_id, tcur_desc, tcur_symb, exr, tsrcfund_id, 
tsrcfund_desc, tprov_id, tprov_desc, tprov_coun_id, tprov_coun_desc, ttype_prov_id, 
ttype_prov_desc, tmanu_id, tmanu_desc, tmanu_coun_id, tmanu_coun_desc, tbuying_uv, 
tsmalunit_id, tsmalunit_desc, tbuying_us, tbuying_ppu, tbuying_ppu_cur, 
tbuying_ppu_dol, tbuying_ppu_eur, tbuying_tcost, tbuying_qu, tbuying_status, tbuying_remark
FROM $view_table_name_en WHERE tecowas_id = '{$_SESSION['COUNTRY']}'
and tbuying_status = '2'";
$query_limit_Re_buying_view_2 = sprintf("%s LIMIT %d, %d", $query_Re_buying_view_2, $startRow_Re_buying_view_2, $maxRows_Re_buying_view_2);
$Re_buying_view_2 = mysqli_query($query_limit_Re_buying_view_2, $cibproto) or die(mysqli_error());
$row_Re_buying_view_2 = mysqli_fetch_assoc($Re_buying_view_2);

if (isset($_GET['totalRows_Re_buying_view_2'])) {
  $totalRows_Re_buying_view_2 = $_GET['totalRows_Re_buying_view_2'];
} else {
  $all_Re_buying_view_2 = mysqli_query($query_Re_buying_view_2);
  $totalRows_Re_buying_view_2 = mysqli_num_rows($all_Re_buying_view_2);
}
$totalPages_Re_buying_view_2 = ceil($totalRows_Re_buying_view_2/$maxRows_Re_buying_view_2)-1;

$queryString_Re_buying_view_2 = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Re_buying_view_2") == false && 
        stristr($param, "totalRows_Re_buying_view_2") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Re_buying_view_2 = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Re_buying_view_2 = sprintf("&totalRows_Re_buying_view_2=%d%s", $totalRows_Re_buying_view_2, $queryString_Re_buying_view_2);

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Validation</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.Style1 {font-size: 9px}
.Style25 {
	font-size: 12px;
	color: #000066;
}
.Style100 {
	font-size: 18px;
	color: #0000FF;
	font-weight: bold;
}
.Style30 {font-size: 12px}
.Style101 {font-size: 9}
.Style102 {font-size: 14px}



-->
</style>
</head>

<body>
<blockquote>&nbsp; <a href="manage_form_val.php" title="Retour" class="Style9 Style19">Back</a></blockquote>

<table border="0" width="50%" align="center">
  <tr>
    <td width="23%" align="center">
      <?php if ($pageNum_Re_buying_view_2 > 0) { // Show if not first page ?>
      <a href="<?php printf("%s?pageNum_Re_buying_view_2=%d%s", $currentPage, 0, $queryString_Re_buying_view_2); ?>"><img src="First.gif" border=0></a>
      <?php } // Show if not first page ?>
    </td>
    <td width="31%" align="center">
      <?php if ($pageNum_Re_buying_view_2 > 0) { // Show if not first page ?>
      <a href="<?php printf("%s?pageNum_Re_buying_view_2=%d%s", $currentPage, max(0, $pageNum_Re_buying_view_2 - 1), $queryString_Re_buying_view_2); ?>"><img src="Previous.gif" border=0></a>
      <?php } // Show if not first page ?>
    </td>
    <td width="23%" align="center">
      <?php if ($pageNum_Re_buying_view_2 < $totalPages_Re_buying_view_2) { // Show if not last page ?>
      <a href="<?php printf("%s?pageNum_Re_buying_view_2=%d%s", $currentPage, min($totalPages_Re_buying_view_2, $pageNum_Re_buying_view_2 + 1), $queryString_Re_buying_view_2); ?>"><img src="Next.gif" border=0></a>
      <?php } // Show if not last page ?>
    </td>
    <td width="23%" align="center">
      <?php if ($pageNum_Re_buying_view_2 < $totalPages_Re_buying_view_2) { // Show if not last page ?>
      <a href="<?php printf("%s?pageNum_Re_buying_view_2=%d%s", $currentPage, $totalPages_Re_buying_view_2, $queryString_Re_buying_view_2); ?>"><img src="Last.gif" border=0></a>
      <?php } // Show if not last page ?>
    </td>
  </tr>
</table>
</p>
<table width="1000" border="1">
  <tr>
    <th width="100" nowrap scope="row"><span class="Style30">Date of Bid</span></th>
    <td width="185" class="Style1"><div align="center" class="Style30">Product</div></td>
    <td width="50" class="Style1"><div align="center" class="Style30">Unit price</div></td>

    <td width="180" class="Style1"><div align="center" class="Style30">Smalest unit </div></td>
    <td width="162" class="Style1"><div align="center" class="Style30">Packaging</div></td>
    <td width="177" class="Style1"><div align="center"><span class="Style30">Presentation</span></div></td>

    <td width="164" class="Style1"><div align="center" class="Style30">Quantity</div></td>
    <td width="181" class="Style1"><div align="center" class="Style30">Total cost</div></td>
    <td width="163" class="Style1"><div align="center"><span class="Style102">Incoterm</span></div></td>
    <td width="175" class="Style1"><div align="center" class="Style30">Supplier</div></td>
    <td width="200" class="Style1"><div align="center" class="Style30">Manufacturer</div></td>
    <td width="80" class="Style1"><div align="center" class="Style30">Transportation</div></td>
    <td width="80" class="Style1"><div align="center" class="Style30">Lead time (weeks) </div></td>

  </tr>
   <?php do { ?>
  <tr>
    <td width="100" nowrap class="Style25"><div align="center"><span class="Style25"><?php echo $row_Re_buying_view_2['tbuying_dbid']; ?></span></div></td>
    <td width="185" bgcolor="#CCCCCC" class="Style25"><div align="center"><?php echo $row_Re_buying_view_2['tproduct_desc']." ".$row_Re_buying_view_2['tconcent_desc']." ".$row_Re_buying_view_2['tdosage_desc']; ?></div></td>
    <td width="60" bgcolor="#CCCCCC" class="Style25"><div align="center"><?php echo $row_Re_buying_view_2['tbuying_ppu'].$row_Re_buying_view_2['tcur_id']; ?></div></td>
    <td nowrap bgcolor="#CCCCCC" class="Style25"><div align="center"><?php echo $row_Re_buying_view_2['tsmalunit_desc']; ?></div></td>
    <td bgcolor="#CCCCCC" class="Style25"><div align="center"><span class="Style30"><?php echo $row_Re_buying_view_2['tpack_desc']; ?></span></div></td>
    <td bgcolor="#CCCCCC" class="Style25"><div align="center"><?php echo $row_Re_buying_view_2['tpresent_desc']; ?></div></td>
    <td bgcolor="#CCCCCC" class="Style25"><div align="center"><?php echo $row_Re_buying_view_2['tbuying_qu']; ?></div></td>
    <td bgcolor="#CCCCCC" class="Style25"><div align="center"><?php echo $row_Re_buying_view_2['tbuying_tcost'].$row_Re_buying_view_2['tcur_id']; ?></div></td>
    <td bgcolor="#CCCCCC" class="Style25"><div align="center"><?php echo $row_Re_buying_view_2['tinco_desc']; ?></div></td>
    <td bgcolor="#CCCCCC" class="Style25"><div align="center"><?php echo $row_Re_buying_view_2['tprov_desc']."<BR> ".$row_Re_buying_view_2['tprov_coun_desc']; ?></div></td>
    <td bgcolor="#CCCCCC" class="Style25"><div align="center"><?php echo $row_Re_buying_view_2['tmanu_desc']." ".$row_Re_buying_view_2['tmanu_coun_desc']; ?></div></td>
    <td bgcolor="#CCCCCC" class="Style25"><div align="center"><?php echo $row_Re_buying_view_2['ttransport_desc']; ?></div></td>
    <td bgcolor="#CCCCCC" class="Style25"><div align="center"><?php echo $row_Re_buying_view_2['leadtime']; ?></div></td>

  
  </tr>
   <?php } while ($row_Re_buying_view_2 = mysqli_fetch_assoc($Re_buying_view_2)); ?>
</table>
<form name="form1" method="post" action="validate_buying.php">
  <div align="center">
    <input name="Submit" type="submit" class="Style100" value="VALIDATION">
  </div>
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
<?php

mysqli_free_result($Re_buying_view_2);

?>
