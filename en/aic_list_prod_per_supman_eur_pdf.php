<?php 
session_start();
require_once('../Connections/cibproto.php'); ?>
<?php
require_once ("utilang.php");
$pEcow = $_POST['pEcow'];
$pCate = $_POST['pCate'] ;
$pProd = $_POST['pProd'] ;
$pProv = $_POST['pProv'] ;
$pMini = $_POST['pMini'] ;
$pMaxi = $_POST['pMaxi'] ;
$pCure = $_POST['pCure'] ;
$pDsta = $_POST['pDsta'] ;
$pDend = $_POST['pDend'] ;


// 60 ou plus
$maxRows_ReSupplier = 200;
$pageNum_ReSupplier = 0;
if (isset($_GET['pageNum_ReSupplier'])) {
  $pageNum_ReSupplier = $_GET['pageNum_ReSupplier'];
}
$startRow_ReSupplier = $pageNum_ReSupplier * $maxRows_ReSupplier;

mysqli_select_db($database_cibproto, $cibproto);
// Table name 
$table_name = "tbuying_view_07";

$query_ReSupplier = "SELECT tbuying_rowid, tecowas_id, tecowas_desc, 
tcateg_id, tcateg_desc, tproduct_id, tproduct_desc, tproduct_brand_name, 
tconcent_id, tconcent_desc, tdosage_id, tdosage_desc, tpack_id, tpack_desc, 
price_per_pack, price_per_pack_dol, price_per_pack_eur, pack_size, leadtime, 
ttransport_id, ttransport_desc, tbuying_present_id, tpresent_desc, tinco_id, 
tinco_desc, DATE_FORMAT(tbuying_dbid,'%d-%m-%Y') tbuying_dbid, tcur_id, tcur_desc, tcur_symb, exr, tsrcfund_id, 
tsrcfund_desc, tprov_id, tprov_desc, tprov_coun_id, tprov_coun_desc, ttype_prov_id, 
ttype_prov_desc, tmanu_id, tmanu_desc, tmanu_coun_id, tmanu_coun_desc, tbuying_uv, 
tsmalunit_id, tsmalunit_desc, tbuying_us, tbuying_ppu, tbuying_ppu_cur, 
tbuying_ppu_dol, tbuying_ppu_eur, tbuying_tcost, tbuying_qu, tbuying_status, tbuying_remark
FROM $view_table_name_en
Where (tecowas_id like '%$pEcow' or '$pEcow' = '*')
AND  (tcateg_id like '%$pCate' or '$pCate' = '*')
AND (tproduct_id like '%$pProd' or '$pProd' = '*') 
AND (tbuying_ppu between '$pMini' and '$pMaxi' or ('$pMini' is NULL and '$pMaxi' is NULL))
AND (tbuying_dbid >= STR_TO_DATE('$pDsta','%d/%m/%Y') 
	and (tbuying_dbid <= STR_TO_DATE('$pDend','%d/%m/%Y')
	))and tbuying_status='1'
 order by tproduct_desc, tprov_desc ";
                        
$query_limit_ReSupplier = sprintf("%s LIMIT %d, %d", $query_ReSupplier, $startRow_ReSupplier, $maxRows_ReSupplier);
$ReSupplier = mysqli_query($query_limit_ReSupplier, $cibproto) or die(mysqli_error());
$row_ReSupplier = mysqli_fetch_assoc($ReSupplier);

if (isset($_GET['totalRows_ReSupplier'])) {
  $totalRows_ReSupplier = $_GET['totalRows_ReSupplier'];
} else {
  $all_ReSupplier = mysqli_query($query_ReSupplier);
  $totalRows_ReSupplier = mysqli_num_rows($all_ReSupplier);
}
$totalPages_ReSupplier = ceil($totalRows_ReSupplier/$maxRows_ReSupplier)-1;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Report List of product per supplier per manufacturer - aic_list_prod_per_supman.php</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.Style6 {color: #000066}
.Style7 {font-size: 24px}
.Style9 {font-size: 12px}
.Style13 {
	font-style: italic;
	font-size: 12px;
	color: #333366;
	font-weight: bold;
}
.Style13 {color: #FFFF00; font-weight: bold; }
.Style25 {
	font-size: 12px;
	color: #000066;
}
.Style1 {font-size: 24px}


.Style30 {font-size: 12px}
.Style31 {
	color: #003366;
	font-size: 12px;
}
.Style49 {color: #000000}
.Style50 {font-family: Verdana, Arial, Helvetica, sans-serif}
.Style52 {
	font-size: 24px;
	color: #000000;
	font-weight: bold;
}
.Style54 {font-size: 14px}
.Style55 {font-size: 16px}
.Style84 {font-size: 24px}
.Style85 {
	font-size: 12px;
	color: #000066;
}
-->
</style>
</head>

<body>

<p align="center">
  <span class="Style84"><strong><strong>
  <?php
				echo "$Suppliers_e_s_m";
	?>
</strong></strong>
  
<?php
				echo " from {$pDsta}  to {$pDend} ";
	?></span></p>
<p align="left"><a href="t_search_supman_eur.php" title="Retour" class="Style5 Style6">Back</a></p>
<table width=100%"  border="1" cellspacing="1" cellpadding="1">
    <caption>&nbsp;
    </caption>
  <tr>
    <th width="6%" scope="col">S/N</th>
    <th width="5%" scope="col"><span class="Style5">Product</span></th>
  
    <th width="5%" nowrap scope="col"><span class="Style5">Supplier</span></th>
    <th width="5%" nowrap scope="col"><span class="Style5">Manufacturer</span></th>
    <th width="5%" nowrap scope="col"><span class="Style5">Pack size </span></th>
    <th width="5%" nowrap scope="col"><span class="Style5">Price per pack</span></th>

    <th width="5%" nowrap scope="col"><span class="Style5">Unit price (</span>
&euro; <span class="Style5">) </span></th>

    <th width="5%" scope="col"><span class="Style5">Qty of unit </span></th>
    <th width="5%" nowrap scope="col"><span class="Style5">Inco term </span></th>
   
    <th width="7%" scope="col"><span class="Style5">Supplied to</span></th>
    <th width="7%" nowrap scope="col"><span class="Style5">Date of bid(dd-mm-yyyy)</span></th>
    <th width="7%" scope="col"><span class="Style5">Lead time(weeks)</span></th>
      
  </tr>
  <?php $cpt=1; 
  do { ?>
  <tr>
    <td height="23"><div align="center" class="Style5"><strong><strong><?php echo $cpt; ?></strong> </strong></div></td>
    <td><div align="center" class="Style5"><?php echo $row_ReSupplier['tproduct_desc']." ".$row_ReSupplier['tconcent_desc']." ".$row_ReSupplier['tdosage_desc']; ?></div></td>
   
    <td><div align="center"><span class="Style5"><?php echo $row_ReSupplier['tprov_desc']."<BR>".$row_ReSupplier['tprov_coun_desc'] ; ?></span></div></td>
    <td><div align="center"><span class="Style5"><?php echo $row_ReSupplier['tmanu_desc']."<BR>".$row_ReSupplier['tmanu_coun_desc']; ?></span></div></td>
    <td><div align="center" class="Style5"><?php echo $row_ReSupplier['pack_size']; ?></div></td>

    <td class="Style5"><div align="center"><?php echo $row_ReSupplier['price_per_pack_eur']."€"; ?></div></td>
   
    <td><div align="center"><span class="Style5"><?php echo $row_ReSupplier['tbuying_ppu_eur']."€"; ?></span></div></td>
 
    <td><div align="center"><span class="Style5"><?php echo $row_ReSupplier['tbuying_qu']; ?></span></div></td>
    <td><div align="center" class="Style5"><?php echo $row_ReSupplier['tinco_desc']; ?></div></td>
   
    <td><div align="center" class="Style5"><?php echo $row_ReSupplier['tecowas_desc']; ?></div></td>
    <td><div align="center"><span class="Style5"><?php echo $row_ReSupplier['tbuying_dbid']; ?></span></div></td>
    <td nowrap><div align="center"><span class="Style5"><?php echo $row_ReSupplier['leadtime']; ?></span></div></td>

  </tr>
  <?php  $cpt=$cpt+1; 
  } while ($row_ReSupplier = mysqli_fetch_assoc($ReSupplier)); ?>
</table>
<p>&nbsp;</p>
</body>
</html>
<?php
mysqli_free_result($ReSupplier);
?>
