<?php
//session_start();

$maxRows_ReSupplier = 500;
$pageNum_ReSupplier = 0;
if (isset($_GET['pageNum_ReSupplier'])) {
  $pageNum_ReSupplier = $_GET['pageNum_ReSupplier'];
}
$startRow_ReSupplier = $pageNum_ReSupplier * $maxRows_ReSupplier;

mysqli_select_db($database_cibproto, $cibproto);

// Pas de selection de devise mais ce sera affiché dans la devise saisie a la creation de l'enregistrement 
// cette partie va donc etre modifiée
/*
if ( $pCure =='EUR') {
$TCUR_SYMB = "€";
$CUR="€";
$tbuying_price_per_pack="tbuying_price_per_pack_eur";
$tbuying_tcost="tbuying_tcost_eur";
$tbuying_ppu="tbuying_ppu_eur";
}
else 
{
$TCUR_SYMB = "$";
$CUR='$';
$tbuying_price_per_pack="tbuying_price_per_pack_dol";
$tbuying_tcost="tbuying_tcost_dol";
$tbuying_ppu="tbuying_ppu_dol";
}

*/
// //   FROM $tqual_view_langue 
$query_ReSupplier = "
SELECT tnotqual_id,tbuying_rowid,tnotqual_lot,tnotqual_date,tnotqual_status,tnotqual_remark,tnotqual_alert,
tnotqual_auth,tnotqual_dmod,tmotifqual_desc,tecowas_desc,
tproduct_cat,tpack_desc,tcur_desc,tsrcfund_desc,ttype_prov_desc,tsmalunit_desc,
tproduct_desc,tpresent_desc, tprov_desc, tprov_coun_desc, tmanu_desc, tmanu_coun_desc,
tbuying_pack_size,tbuying_price_per_pack,tbuying_qty_pack, tbuying_tcost, 
tinco_desc,tbuying_ppu, tbuying_qu,DATE_FORMAT(tbuying_dbid,'%d-%m-%Y') tbuying_dbid ,
tecowas_desc,ttransport_desc, tbuying_lead_time, tbuying_remark
 from $view_tqual where (tnotqual_status='1') ";

 $query_ReSupplier.= $param_country.$param_prod.$param_cat.$param_prov.$param_manu;

$query_ReSupplier.= " AND (tnotqual_date >= STR_TO_DATE('$pDsta','%d-%m-%Y') and (tnotqual_date <= STR_TO_DATE('$pDend','%d-%m-%Y')))
		 ORDER BY tecowas_desc, tmotifqual_desc"; 
 
// echo "query_ReSupplier=$query_ReSupplier <BR>";                      
$query_limit_ReSupplier = sprintf("%s LIMIT %d, %d", $query_ReSupplier, $startRow_ReSupplier, $maxRows_ReSupplier);
$ReSupplier = mysqli_query($query_limit_ReSupplier, $cibproto) or die(mysqli_error());
$row_ReSupplier = mysqli_fetch_assoc($ReSupplier);



if (isset($_GET['totalRows_ReSupplier'])) {
  $totalRows_ReSupplier = $_GET['totalRows_ReSupplier'];
} else {
  $all_ReSupplier = mysqli_query($query_ReSupplier);
  $totalRows_ReSupplier = mysqli_num_rows($all_ReSupplier);
   if ($totalRows_ReSupplier==0) {
    echo "<script language='JavaScript'>alert('No records found !' )</script>"; 
	// require_once ("../en/t_search_supman_eur.php");
	require_once ($pForm_Name);
	exit;
  }
}
$totalPages_ReSupplier = ceil($totalRows_ReSupplier/$maxRows_ReSupplier)-1;
?>