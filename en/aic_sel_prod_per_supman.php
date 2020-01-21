<?php

$maxRows_ReSupplier = 200;
$pageNum_ReSupplier = 0;
if (isset($_GET['pageNum_ReSupplier'])) {
  $pageNum_ReSupplier = $_GET['pageNum_ReSupplier'];
}
$startRow_ReSupplier = $pageNum_ReSupplier * $maxRows_ReSupplier;

mysqli_select_db($database_cibproto, $cibproto);

$query_ReSupplier = "
SELECT tecowas_desc, tproduct_id,tproduct_desc, tproduct_brand_name, tpresent_desc,
 tbuying_ppu_eur, tbuying_ppu_dol, tbuying_pack_size, tbuying_price_per_pack,tbuying_price_per_pack_dol,tbuying_price_per_pack_eur,
  tbuying_lead_time,tsmalunit_desc, tpack_desc,tsrcfund_desc, tprov_coun_desc, tmanu_desc, tmanu_coun_desc, 
 tbuying_tcost, tbuying_tcost_dol,tbuying_tcost_eur , tbuying_qty_pack, tprov_desc, tcur_desc, tcur_symb, tbuying_remark,
ttype_prov_desc,tinco_desc,ttransport_desc, DATE_FORMAT(tbuying_dbid,'%d-%m-%Y') 
tbuying_dbid  from   $view_table_name  
where (tbuying_status='1') ";
$query_ReSupplier.= $param_country.$param_prod.$param_cat.$param_prov;
$query_ReSupplier.= " AND (tbuying_ppu between '$pMini' and '$pMaxi' or ('$pMini' is NULL and '$pMaxi' is NULL))
AND (tbuying_dbid >= STR_TO_DATE('$pDsta','%d-%m-%Y') and (tbuying_dbid <= STR_TO_DATE('$pDend','%d-%m-%Y')))
		 ORDER BY tproduct_desc, tprov_desc";

// echo " XXXXXXXXXX query_reSupplier=$query_ReSupplier<BR>";
$query_limit_ReSupplier = sprintf("%s LIMIT %d, %d", $query_ReSupplier, $startRow_ReSupplier, $maxRows_ReSupplier);
$ReSupplier = mysqli_query($query_limit_ReSupplier, $cibproto) or die(mysqli_error());
$row_ReSupplier = mysqli_fetch_assoc($ReSupplier);

if (isset($_GET['totalRows_ReSupplier'])) {
  $totalRows_ReSupplier = $_GET['totalRows_ReSupplier'];
} else {
  $all_ReSupplier = mysqli_query($query_ReSupplier);
  $totalRows_ReSupplier = mysqli_num_rows($all_ReSupplier);
   if ($totalRows_ReSupplier==0) {
    echo "<script language='JavaScript'>alert('No rows found !!')</script>"; 
  	// echo "XXXXX Nombre total de ROWS=$totalRows_ReSupplier<BR>"; 
	require_once("$previous_menu");
	exit;
  }
}
$totalPages_ReSupplier = ceil($totalRows_ReSupplier/$maxRows_ReSupplier)-1;
?>


