<?php
$maxRows_RePriceLow = 50; 
$pageNum_RePriceLow = 0;
mysqli_select_db($database_cibproto, $cibproto);
if (isset($_GET['pageNum_RePriceLow'])) {
  $pageNum_RePriceLow = $_GET['pageNum_RePriceLow'];
}
$startRow_RePriceLow = $pageNum_RePriceLow * $maxRows_RePriceLow;
$colname_RePriceLow = "1";
if (isset($_GET['tbuying_dbid'])) {
  $colname_RePriceLow = (get_magic_quotes_gpc()) ? $_GET['tbuying_dbid'] : addslashes($_GET['tbuying_dbid']);
}
if (!mysqli_select_db($database_cibproto, $cibproto))
{ 
echo "Desolé accès a la base" . $database_cibproto . " impossible \n";
exit;
}

if ( $pCure =='EUR') {
$PPU = "tbuying_ppu_eur";
$TCUR_SYMB = "€";
$ppp="tbuying_price_per_pack_eur";
$ppu="tbuying_ppu_eur";
$tcost="tbuying_tcost_eur";
}
else 
{
$PPU = "tbuying_ppu_dol";
$TCUR_SYMB = "$";
$ppp="tbuying_price_per_pack_dol";
$ppu="tbuying_ppu_dol";
$tcost="tbuying_tcost_dol";
}
/*
$queryString_RePriceLow = sprintf("%s" ,
"SELECT tproduct_desc, tpresent_desc, tprov_desc, tprov_coun_desc, tmanu_desc, tmanu_coun_desc,tbuying_pack_size,
tbuying_qty_pack,tbuying_price_per_pack_dol, tbuying_tcost_dol,  tinco_desc,min({$PPU}) tbuying_ppu_dol,
DATE_FORMAT(tbuying_dbid,'%d-%m-%Y') tbuying_dbid ,tecowas_desc,tbuying_lead_time, tbuying_remark
 from $view_table_name where tbuying_status='1' ");
 */
 $queryString_RePriceLow = sprintf("%s" ,
"SELECT tproduct_desc, tpresent_desc, tprov_desc, tprov_coun_desc, tmanu_desc, tmanu_coun_desc,tbuying_pack_size,
tbuying_qty_pack,{$ppp}, {$tcost},  tinco_desc,min({$PPU}) {$ppu},
DATE_FORMAT(tbuying_dbid,'%d-%m-%Y') tbuying_dbid ,tecowas_desc,tbuying_lead_time, tbuying_remark
 from $view_table_name where tbuying_status='1' ");
 
// $queryString_RePriceLow.= $param_country.$param_prod.$param_prov;
$queryString_RePriceLow.= $param_country.$param_cat.$param_prod.$param_prov;
$queryString_RePriceLow.= " AND (tbuying_ppu between '$pMini' and '$pMaxi' or ('$pMini' is NULL and '$pMaxi' is NULL))
AND (tbuying_dbid >= STR_TO_DATE('$pDsta','%d-%m-%Y') 
	and (tbuying_dbid <= STR_TO_DATE('$pDend','%d-%m-%Y')))
	GROUP BY tproduct_id 
	 ORDER BY tproduct_id, {$PPU}, tbuying_dbid ASC";
//	echo "XXqueryString_RePriceLow= $queryString_RePriceLow <BR>";
$query_limit_RePriceLow = sprintf("%s LIMIT %d, %d", $queryString_RePriceLow, $startRow_RePriceLow, $maxRows_RePriceLow);

set_time_limit (0);
$RePriceLow = mysqli_query($query_limit_RePriceLow, $cibproto) or die(mysqli_error());

$row_RePriceLow = mysqli_fetch_assoc($RePriceLow);

if (isset($_GET['totalRows_RePriceLow'])) {
  $totalRows_RePriceLow = $_GET['totalRows_RePriceLow'];
} else {
  $all_RePriceLow = mysqli_query($queryString_RePriceLow);
  $totalRows_RePriceLow = mysqli_num_rows($all_RePriceLow);
  if ($totalRows_RePriceLow==0) { 
	 echo "<script language='JavaScript'>alert('Pas d\'\enregistrement !!')</script>"; 
	require_once ("$previous_menu");
	exit;
  }
$totalPages_RePriceLow = ceil($totalRows_RePriceLow/$maxRows_RePriceLow)-1;
}
?>

