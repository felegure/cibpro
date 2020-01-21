<?php require_once('../Connections/cibproto.php'); ?>
<?php 
session_start();
$currentPage = $_SERVER["PHP_SELF"];
require_once ("utilang_fr.php");
/*
if (isset($_POST['pCate'])) $pCate = $_POST['pCate'] ;
else $pCate='*';
if (isset($_POST['pProd'])) $pProd = $_POST['pProd'] ;
else $pProd = '*';

if (isset($_POST['pProv'])) $pProv = $_POST['pProv'] ;
else $pProv = '*';

$pMini = $_POST['pMini'] ;
$pMaxi = $_POST['pMaxi'] ;
$pCure = $_POST['pCure'] ;
$pDsta = $_POST['pDsta'] ;
$pDend = $_POST['pDend'] ;

$nbre_element1=count($pCate);

$nbre_element2=sizeof($pCate);

$i=0;
$param_cat="";
if ( $pCate[0]!='*')
{
  for ($i=0; $i<sizeof($pCate); $i++) {
	   if ($i==0)
		$param_cat.= " AND ( tcateg_id like ";
		else $param_cat.= " OR tcateg_id like ";
		
		$param_cat.= "'";
		$param_cat.= "%$pCate[$i]";
		$param_cat.= "' ";
		if ($i==1 || $i == sizeof($pCate)) $param_cat.= ")";   
	}
}
else  $param_cat="";
// echo " A la fin de la boucle i=$i <BR>";
if ($i==1 ) $param_cat.= ")";

	$param_prod="";

if ($pProd[0]!='*') {
	for ($i=0; $i<sizeof($pProd); $i++) {
//	echo "XXXXXXX i=$i $pProd[$i] <BR>";

	 if ($i==0){
		$param_prod.= " AND ( tproduct_id like ";
	//	echo "XXXXXXX i=$i et AND <BR>";
		}
		
		else { $param_prod.= " OR tproduct_id like ";
	//	echo "XXXXXXX i=$i et OR <BR>";

		}
		$param_prod.= "'";
		$param_prod.= "%$pProd[$i]";
		$param_prod.= "' ";
		if ($i == sizeof($pProd) - 1) $param_prod.= ")";
	}
//	echo "XXX param_prod=$param_prod i=$i<BR>"; 
}
else $param_prod=""; 
//if ($i==1 ) $param_prod.= ")";
// echo "XXX apres la boucle param_prod=$param_prod i=$i<BR>";

$param_prov="";
if ($pProv[0] !='*') {

	for ($i=0; $i<sizeof($pProv); $i++) {
	if ($i==0) 
	$param_prov.= " AND ( tprov_id like ";
	else $param_prov.= " OR tprov_id like ";
	$param_prov.= "'";
	$param_prov.= "%$pProv[$i]";
	$param_prov.= "' ";
	if ($i == sizeof($pProv) - 1) $param_prov.= ")";
	}
	
// echo "XXX param_prov=$param_prov et i=$i<BR>"; 
}
else $param_prov="";
*/
//if ($param_prov =='*') $param_prov="";
// Gestion des parametres reussis pour la combinaison des parametres
// A recopier dans tous les ecrans de selection t_search et les reports aussi
// si cest Ok alors continuer
//
// Semble OK

// 
// echo "Date debut=$pDsta  Date Fin=$pDend <BR>";

$editFormAction = $_SERVER['PHP_SELF'];

if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}


$maxRows_Re_buying_view = 60;
$pageNum_Re_buying_view = 0;
if (isset($_GET['pageNum_Re_buying_view'])) {
  $pageNum_Re_buying_view = $_GET['pageNum_Re_buying_view'];
}
$startRow_Re_buying_view = $pageNum_Re_buying_view * $maxRows_Re_buying_view;

$maxRows_Re_buying_view_2 = 60;
$pageNum_Re_buying_view_2 = 0;
if (isset($_GET['pageNum_Re_buying_view_2'])) {
  $pageNum_Re_buying_view_2 = $_GET['pageNum_Re_buying_view_2'];
}
$startRow_Re_buying_view_2 = $pageNum_Re_buying_view_2 * $maxRows_Re_buying_view_2;



mysqli_select_db($cibproto, $database_cibproto);
$query_Re_buying_view_2 = "SELECT checker,tbuying_rowid, tecowas_id, tecowas_desc, 
tproduct_id, tproduct_desc, tproduct_brand_name, 
tpack_id, tpack_desc, 
tbuying_price_per_pack, tbuying_price_per_pack_dol, tbuying_price_per_pack_eur, tbuying_pack_size,
tbuying_lead_time, 
ttransport_id, ttransport_desc, tpresent_id, tpresent_desc, tinco_id, 
tinco_desc, DATE_FORMAT(tbuying_dbid,'%d-%m-%Y') tbuying_dbid, tcur_id, tcur_desc, tcur_symb, exr, tsrcfund_id, 
tsrcfund_desc, tprov_id, tprov_desc, tprov_coun_id, tprov_coun_desc, ttype_prov_id, 
ttype_prov_desc, tmanu_id, tmanu_desc, tmanu_coun_id, tmanu_coun_desc, 
tsmalunit_id, tsmalunit_desc, tbuying_ppu, 
tbuying_ppu_dol, tbuying_ppu_eur, tbuying_tcost, tbuying_qty_pack, tbuying_pack_size, tbuying_lead_time,
tbuying_remark,tbuying_status
FROM $view_table_name 
WHERE tecowas_id = '{$_SESSION['COUNTRY']}'
and tbuying_status ='2'";
/*
$query_Re_buying_view_2.= $param_cat.$param_prod.$param_prov;
$query_Re_buying_view_2.= " AND (tbuying_ppu between '$pMini' and '$pMaxi' or ('$pMini' is NULL and '$pMaxi' is NULL))
AND (tbuying_dbid >= STR_TO_DATE('$pDsta','%d-%m-%Y') 
	and (tbuying_dbid <= STR_TO_DATE('$pDend','%d-%m-%Y') ) )
	ORDER By DATE_FORMAT(tbuying_dbid,'%d-%m-%Y') desc, tproduct_cat, tproduct_desc ";
*/

 // echo " XXXXXXXXXXXXXle query=$query_Re_buying_view_2 <BR>";
$query_limit_Re_buying_view_2 = sprintf("%s LIMIT %d, %d", $query_Re_buying_view_2, $startRow_Re_buying_view_2, $maxRows_Re_buying_view_2);
$Re_buying_view_2 = mysqli_query($cibproto, $query_limit_Re_buying_view_2) or die(mysqli_error($cibproto));
$row_Re_buying_view_2 = mysqli_fetch_assoc($Re_buying_view_2);

if (isset($_GET['totalRows_Re_buying_view_2'])) {
  $totalRows_Re_buying_view_2 = $_GET['totalRows_Re_buying_view_2'];
} else {
  $all_Re_buying_view_2 = mysqli_query($cibproto, $query_Re_buying_view_2);
  $totalRows_Re_buying_view_2 = mysqli_num_rows($all_Re_buying_view_2);
	if ($totalRows_Re_buying_view_2==0) {
    echo "<script language='JavaScript'>alert('No rows found !')</script>"; 	
	require_once ("manage_form_ins_1.php");
	exit;
    }

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
<title>Deletion</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.Style1 {
	font-size: 18px;
	color: #0000FF;
	font-weight: bold;
}
.Style30 {color: #000000}
.Style72 {color: #000000; font-size: 12px; }
.Style73 {font-size: 12px}
.Style75 {color: #009900; font-size: 12px; }
.Style77 {font-size: 18px; color: #FF0000; font-weight: bold; }
.Style79 {color: #FF0000; font-size: 12px; }
.Style81 {color: #000000; font-size: 12px; font-weight: bold; }
.Style82 {color: #990000}
.Style83 {font-size: 14px; color: #990000; font-weight: bold; }
-->
</style>
</head>

<body>
<table width="963" border="1" cellpadding="2" cellspacing="2">
  <tr>
    <th width="126" scope="row"><div align="center" class="Style73 Style82">&nbsp; <a href="manage_form_ins.php" title="Retour" class="Style83">Back</a></div></th>
    <td width="530"><div align="center" class="Style7 Style49"><span class="Style84"> 
        <span class="Style77"><strong>Deletion Screen</strong></span></span></div></td>
    <td width="145"><div align="center" class="Style72">username : 
            <?php
				echo "{$_SESSION['username']}";
	?>
    </div></td>
    <td width="126"><div align="center" class="Style30 Style73">Date :
            <?php 
      $today = date (" D j, M,Y  H:i:s");
      echo " $today "; ?>
    </div></td>
  </tr>
</table>
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
 <table width="1000" border="1">
  <tr class="Style30">
  <th width="100" nowrap scope="row"><span class="Style79">Delete (Yes) ? </span></th>
   <th width="100" nowrap scope="row"><span class="Style72">Date od Bid opening / Date of reception</span></th>
    <th width="100" nowrap scope="row"><span class="Style72">Product</span></th>
    <td width="185" class="Style1"><div align="center" class="Style30 Style73">Presentation</div></td>
	
    <td width="180" class="Style1"><div align="center" class="Style72"><span class="Style73">Packaging</span></div></td>

    <td width="180" class="Style30"><div align="center" class="Style73"><span class="Style81">Smallest unit</span></div></td>
    <td width="162" class="Style1"><div align="center" class="Style72">Price per pack</div></td>
    <td width="177" class="Style1"><div align="center" class="Style73"><span class="Style30">Quantity</span></div></td>

    <td width="164" class="Style1"><div align="center" class="Style72">Total Cost</div></td>
    <td width="181" class="Style1"><div align="center" class="Style72">Incoterm</div></td>
    <td width="163" class="Style1"><div align="center" class="Style73"><span class="Style30">Suppliers</span></div></td>
    <td width="175" class="Style1"><div align="center" class="Style72">Manufacturers</div></td>
    <td width="200" class="Style1"><div align="center" class="Style72">Transportation Method </div></td>
    <td width="80" class="Style1"><div align="center" class="Style72">Lead Time (days)</div></td>
      <td width="80" class="Style1"><div align="center" class="Style72">Comments</div></td>
  </tr>
   <?php 
   $i=0;
   do { 
   $j = $i%2;
   ?>
  <tr>
    <td width="100" nowrap class="Style25"><div align="center" class="Style75">
     <?php  
	  $country=$_SESSION['COUNTRY'];
	
	  $usercountry=$_SESSION['username'];

	 $rowid = $row_Re_buying_view_2['tbuying_rowid'];

	$titreURL = urlEncode ($rowid);
	// modifie le 19 avril 2011 apres mission au Cap Vert
	echo "<A HREF='aic_form_buying_delete_form.php?rowid=$rowid&hab=$row_Re_buying_view_2'>
			(Delete ?) <A/>";		
	?></div> 
    <td width="185" bgcolor="#CCCCCC" class="Style25"><div align="center" class="Style73"><?php echo $row_Re_buying_view_2['tbuying_dbid']; ?></div></td>
	<td width="185" bgcolor="#CCCCCC" class="Style25"><div align="center" class="Style73"><?php echo $row_Re_buying_view_2['tproduct_desc']; ?></div></td>
   
    <td width="60" bgcolor="#CCCCCC" class="Style25"><div align="center" class="Style73">
      <div align="center" class="Style73"><?php echo $row_Re_buying_view_2['tpresent_desc']; ?></div>
    </div></td>
	
    <td nowrap bgcolor="#CCCCCC" class="Style25"><div align="center" class="Style73"><span class="Style30"><?php echo $row_Re_buying_view_2['tpack_desc']; ?></span></div></td>
    <td bgcolor="#CCCCCC" class="Style25"><div align="center" class="Style73"><?php echo $row_Re_buying_view_2['tsmalunit_desc']; ?></div></td>
    <td bgcolor="#CCCCCC" class="Style25"><div align="center" class="Style73"><span class="Style72"><?php echo $row_Re_buying_view_2['tbuying_price_per_pack'].$row_Re_buying_view_2['tcur_id']; ?></span></div></td>
    <td bgcolor="#CCCCCC" class="Style25"><div align="center" class="Style73"><?php echo $row_Re_buying_view_2['tbuying_qty_pack']; ?></div></td>
    <td bgcolor="#CCCCCC" class="Style25"><div align="center" class="Style73"><?php echo $row_Re_buying_view_2['tbuying_tcost'].$row_Re_buying_view_2['tcur_id']; ?></div></td>
    <td bgcolor="#CCCCCC" class="Style25"><div align="center" class="Style73"><?php echo $row_Re_buying_view_2['tinco_desc']; ?></div></td>
    <td bgcolor="#CCCCCC" class="Style25"><div align="center" class="Style73"><?php echo $row_Re_buying_view_2['tprov_desc']."<BR> ".$row_Re_buying_view_2['tprov_coun_desc']; ?></div></td>
    <td bgcolor="#CCCCCC" class="Style25"><div align="center" class="Style73"><?php echo $row_Re_buying_view_2['tmanu_desc']." ".$row_Re_buying_view_2['tmanu_coun_desc']; ?></div></td>
    <td bgcolor="#CCCCCC" class="Style25"><div align="center" class="Style73"><?php echo $row_Re_buying_view_2['ttransport_desc']; ?></div></td>
    <td bgcolor="#CCCCCC" class="Style25"><div align="center" class="Style73"><?php echo $row_Re_buying_view_2['tbuying_lead_time']; ?></div></td>
	  <td bgcolor="#CCCCCC" class="Style25"><div align="center" class="Style73"><?php echo $row_Re_buying_view_2['tbuying_remark']; ?></div></td>

  
  </tr>
   <?php 
    $Tableau[$i]=$row_Re_buying_view_2['tbuying_rowid'];
	$Tabchecked[$i]=@$_POST['checker'];
	$i= $i + 1;
   } while ($row_Re_buying_view_2 = mysqli_fetch_assoc($Re_buying_view_2)); ?>
</table>

<form name="form1" method="post" action="delete_buying.php">
  <div align="center">
  <a href="#"></a></div>
</form>
<p>&nbsp;</p>
</body>
</html>
<?php

mysqli_free_result($Re_buying_view_2);

// definir une fonction  qui va essayer de afire la validation

function validate_lignes($database_cibproto,$cibproto,$rowid, $country, $tbuying_table)
{
// echo "XXXXXXXXXXXXXXXaic_form_buying_validateNew - validate_ligne validate_maj, rowid=$rowid, pays=$country <BR>";
 $deleteSQL = sprintf("DELETE from $tbuying_table WHERE $tbuying_table.tbuying_rowid=$rowid 
 and $tbuying_table.tbuying_ec_id = '{$country}' and 
$tbuying_table.tbuying_status = '2'");
// echo "aic_form_buying_validate_maj, updateSQL=$updateSQL <BR>";
// mysqli_select_db($database_cibproto, $cibproto);
// $Result= mysqli_query($updateSQL, $cibproto) or die(mysqli_error());

return;
}
?>
