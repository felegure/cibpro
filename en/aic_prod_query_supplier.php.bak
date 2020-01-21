<?php
$maxRows_ReSupplier = 500;
$pageNum_ReSupplier = 0;
if (isset($_GET['pageNum_ReSupplier'])) {
  $pageNum_ReSupplier = $_GET['pageNum_ReSupplier'];
}
$startRow_ReSupplier = $pageNum_ReSupplier * $maxRows_ReSupplier;

mysqli_select_db($database_cibproto, $cibproto);
// echo " aic_prod_query_supplier.php pForm_name=$pForm_Name <BR>";

$query_ReSupplier = "
SELECT tproduct_desc,tpresent_desc, tprov_desc, tprov_coun_desc, tmanu_desc, tmanu_coun_desc,tbuying_pack_size,
{$tbuying_price_per_pack},tbuying_qty_pack, {$tbuying_tcost}, tinco_desc,{$tbuying_ppu}, tbuying_qu,
DATE_FORMAT(tbuying_dbid,'%d-%m-%Y') tbuying_dbid ,tecowas_desc,ttransport_desc, tbuying_lead_time, tbuying_remark
  from $view_table_name where (tbuying_status='1') ";
$query_ReSupplier.= $param_country.$param_prod.$param_cat.$param_prov;
$query_ReSupplier.= " AND ({$tbuying_ppu} between '$pMini' and '$pMaxi' or ('$pMini' is NULL and '$pMaxi' is NULL))
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
    echo "<script language='JavaScript'>alert('Não há dados !' )</script>"; 
	// require_once ("t_search_supman_eur.php");
	require_once ($pForm_Name);
	exit;
  }
}
$totalPages_ReSupplier = ceil($totalRows_ReSupplier/$maxRows_ReSupplier)-1;
?>