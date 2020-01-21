<?php

maxRows_RePriceLow = 60; // 60
$pageNum_RePriceLow = 0;
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
}
else 
{
$PPU = "tbuying_ppu_dol";
$TCUR_SYMB = "$";
}
/*
echo " XXXXXXXXXXXXXXXXXXXPPU=$PPU <BR>";
echo " XXXXXXXXXXXXXXXXXXXXXXXcontenu PPU={$PPU} <BR>";
*/

$queryString_RePriceLow = sprintf("%s" ,
"SELECT tecowas_desc, tproduct_id,tproduct_desc, tproduct_brand_name, tpresent_desc,
 min({$PPU}) tbuying_ppu_dol, tbuying_pack_size, tbuying_price_per_pack,tbuying_price_per_pack_dol,tbuying_price_per_pack_eur,
  tbuying_lead_time,tsmalunit_desc, tpack_desc,tsrcfund_desc, tprov_coun_desc, 
 tbuying_tcost, tbuying_qu, tprov_desc, tcur_desc, tcur_symb,
ttype_prov_desc,tinco_desc,ttransport_desc, DATE_FORMAT(tbuying_dbid,'%d-%m-%Y') tbuying_dbid
from $view_table_name_en
where tbuying_status='1' ");

$queryString_RePriceLow.= $param_country.$param_prod.$param_prov;
$queryString_RePriceLow.= " AND (tbuying_ppu between '$pMini' and '$pMaxi' or ('$pMini' is NULL and '$pMaxi' is NULL))
AND (tbuying_dbid >= STR_TO_DATE('$pDsta','%d-%m-%Y') 
	and (tbuying_dbid <= STR_TO_DATE('$pDend','%d-%m-%Y')))
	GROUP BY tproduct_id 
	 ORDER BY tproduct_id, {$PPU}, tbuying_dbid ASC";


//echo " XXXXXXXXXXXXX final query_RepriceLow=$queryString_RePriceLow<BR>";


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
	 echo "<script language='JavaScript'>alert('No rows found !!')</script>"; 
	require_once ("$previous_menu");
	exit;
  }
}
?>

