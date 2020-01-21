<?php
mysqli_select_db($database_cibproto, $cibproto);
$query_Regroupsup = "SELECT tbuying_rowid, tecowas_id, tecowas_desc, 
 tproduct_id, tproduct_desc, tproduct_brand_name, tpack_id, tpack_desc, 
tbuying_price_per_pack, tbuying_price_per_pack_dol, tbuying_price_per_pack_eur, tbuying_pack_size,
tbuying_lead_time, ttransport_id, ttransport_desc, tpresent_desc, tinco_id, 
tinco_desc, DATE_FORMAT(tbuying_dbid,'%d-%m-%Y') tbuying_dbid, tcur_id, tcur_desc, tcur_symb, exr, 
tsrcfund_id, tsrcfund_desc, tprov_id, tprov_desc, tprov_coun_id, tprov_coun_desc, ttype_prov_id, 
ttype_prov_desc, tmanu_id, tmanu_desc, tmanu_coun_id , tmanu_coun_desc, 
tsmalunit_id, tsmalunit_desc, tbuying_ppu, 
tbuying_ppu_dol, tbuying_ppu_eur, tbuying_tcost, tbuying_tcost_dol, tbuying_tcost_eur, tbuying_qty_pack, tbuying_remark,tbuying_status
FROM $view_table_name where tbuying_status='1'";
$query_Regroupsup.= $param_country.$param_prod.$param_prov;
 //echo "XXXX query_regroupsup=$query_Regroupsup<BR>";
$query_Regroupsup.= " AND (tbuying_ppu between '$pMini' and '$pMaxi' or ('$pMini' is NULL and '$pMaxi' is NULL))
       AND (tbuying_dbid >= STR_TO_DATE('$pDsta','%d-%m-%Y') and (tbuying_dbid <= STR_TO_DATE('$pDend','%d-%m-%Y')))
	  	 group by tprov_desc
		 ORDER BY tprov_desc";
		 		 
		 // echo "XXXX GROUP  query_regroupsup=$query_Regroupsup<BR>"; 
		 
$Regroupsup = mysqli_query($query_Regroupsup, $cibproto) or die(mysqli_error());
$row_Regroupsup = mysqli_fetch_assoc($Regroupsup);
$totalRows_Regroupsup = mysqli_num_rows($Regroupsup);

if ($totalRows_Regroupsup ==0) {
    echo "<script language='JavaScript'>alert(' No rows found !!')</script>"; 
	require_once ("$previous_menu");
	exit;
  }

mysqli_select_db($database_cibproto, $cibproto);
$query_Redetsup = "SELECT tbuying_rowid, tecowas_id, tecowas_desc, 
 tproduct_id, tproduct_desc, tproduct_brand_name, 
tpack_id, tpack_desc, tbuying_price_per_pack, tbuying_price_per_pack_dol, tbuying_price_per_pack_eur,
tbuying_pack_size,tbuying_lead_time, 
ttransport_id, ttransport_desc, tpresent_desc, tinco_id, 
tinco_desc, DATE_FORMAT(tbuying_dbid,'%d-%m-%Y') tbuying_dbid, tcur_id, tcur_desc, tcur_symb, exr, 
tsrcfund_id, 
tsrcfund_desc, tprov_id, tprov_desc, tprov_coun_id, tprov_coun_desc, ttype_prov_id, 
ttype_prov_desc, tmanu_id, tmanu_desc, tmanu_coun_id, 
tsmalunit_id, tsmalunit_desc, tbuying_ppu, tbuying_ppu_dol, tbuying_ppu_eur, tbuying_tcost, 
tbuying_tcost_dol,tbuying_tcost_eur,tbuying_qty_pack,
tbuying_remark,  tbuying_status
FROM $view_tsupview 
where tbuying_status = '1'";

$query_Redetsup.= $param_country.$param_prod.$param_prov;
// echo "XXXXXXXXXquery_Redetsup=$query_Redetsup<Br>";
$query_Redetsup.= " AND (tbuying_ppu between '$pMini' and '$pMaxi' or ('$pMini' is NULL and '$pMaxi' is NULL))
      AND (tbuying_dbid >= STR_TO_DATE('$pDsta','%d-%m-%Y') and (tbuying_dbid <= STR_TO_DATE('$pDend','%d-%m-%Y')))
  		order by tprov_desc";
		
		// echo "XXXXXXXXX DETAIL query_Redetsup=$query_Redetsup<Br>";
		
$Redetsup = mysqli_query($query_Redetsup, $cibproto) or die(mysqli_error());
$row_Redetsup = mysqli_fetch_assoc($Redetsup);
$totalRows_Redetsup = mysqli_num_rows($Redetsup);
?>

<?php
$currentPage = $_SERVER["PHP_SELF"];

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
?>
