<?php 
session_start();
require_once('../Connections/cibproto.php'); ?>
<?php
require_once ("utilang_en.php");
// $pEcow = $_POST['pEcow'];
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

// echo "XXXXXXXXXXXXXXpCate0=$pCate[0]";
//echo "XXXXXXXXXXXXXXpCate=1$pCate[1]";
//echo "XXXXXXXXXXXXXXpCate2=$pCate[2]";


// Faire une boucle pour compter le nombre d'enregistrements,
// fabriquer la clause Where en fonction de la clause Where
//


$nbre_element1=count($pCate);

$nbre_element2=sizeof($pCate);
/*
echo "XXXXXX pCate=$pCate<BR>";
echo "XXXXXX nbre_element1=$nbre_element1<BR>";
echo "XXXXXX nbre_element2=$nbre_element2, sizeof($pCate)<BR>";
*/
$i=0;
$param_cat="";
if ( $pCate[0]!='*')
{
  for ($i=0; $i<sizeof($pCate); $i++) {
	   if ($i==0)
		$param_cat.= " AND ( tproduct_cat like ";
		else $param_cat.= " OR tproduct_cat like ";
		
		$param_cat.= "'";
		$param_cat.= "%$pCate[$i]";
		$param_cat.= "' ";
		if ($i==1 || $i == sizeof($pCate)) $param_cat.= ")";
	     
	//}
	 //else $param_cat="";
// echo "XXX param_cat=$param_cat, i=$i, sizeof($pCate)<BR>"; 
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

//if ($param_prov =='*') $param_prov="";
// Gestion des parametres reussis pour la combinaison des parametres
// A recopier dans tous les ecrans de selection t_search et les reports aussi
// si cest Ok alors continuer
//
// Semble OK

// 
// echo "Date debut=$pDsta  Date Fin=$pDend <BR>";
$maxRows_RePriceLow = 50;
$pageNum_RePriceLow = 0;
if (isset($_GET['pageNum_RePriceLow'])) {
  $pageNum_RePriceLow = $_GET['pageNum_RePriceLow'];
}
$startRow_RePriceLow = $pageNum_RePriceLow * $maxRows_RePriceLow;

mysqli_select_db($database_cibproto, $cibproto);

$t_ec_id = $_SESSION['COUNTRY'];
$tbuying_auth = $_SESSION['username'];
$username = $_SESSION['username'];
/*
 echo "VALEUR DE t_ec_d=$t_ec_id<BR>";
echo "username=$tbuying_auth<BR>";
*/

$query_RePriceLow = "SELECT tbuying_rowid, tecowas_id, tecowas_desc, 
tproduct_id, tproduct_desc, tproduct_brand_name, 
tpack_id, tpack_desc, 
tbuying_price_per_pack, tbuying_price_per_pack_dol, tbuying_price_per_pack_eur, tbuying_pack_size,
 tbuying_lead_time, 
ttransport_id, ttransport_desc, tpresent_id, tpresent_desc, tinco_id, 
tinco_desc, DATE_FORMAT(tbuying_dbid,'%d-%m-%Y') tbuying_dbid, tcur_id, tcur_desc, tcur_symb, exr, 
tsrcfund_id, 
tsrcfund_desc, tprov_id, tprov_desc, tprov_coun_id, tprov_coun_desc, ttype_prov_id, 
ttype_prov_desc, tmanu_id, tmanu_desc, tmanu_coun_id,  tmanu_coun_desc,
tsmalunit_id, tsmalunit_desc, tbuying_ppu, tbuying_tcost, tbuying_tcost_dol, tbuying_tcost_eur,
tbuying_ppu_dol, tbuying_ppu_eur, tbuying_tcost, tbuying_qty_pack,tbuying_remark, tbuying_status, tbuying_remark
FROM $view_table_name
WHERE tecowas_id = '$t_ec_id'
and tbuying_status = '2' ";
$query_RePriceLow.= $param_cat.$param_prod.$param_prov;
$query_RePriceLow.= " AND (tbuying_ppu between '$pMini' and '$pMaxi' or ('$pMini' is NULL and '$pMaxi' is NULL))
AND (tbuying_dbid >= STR_TO_DATE('$pDsta','%d-%m-%Y') 
	and (tbuying_dbid <= STR_TO_DATE('$pDend','%d-%m-%Y') ) )
	ORDER By DATE_FORMAT(tbuying_dbid,'%d-%m-%Y') desc, tproduct_cat, tproduct_desc ";

// echo " XXXXXXXXXXXXX final query_RepriceLow=$query_RePriceLow<BR>";
$query_limit_RePriceLow = sprintf("%s LIMIT %d, %d", $query_RePriceLow, $startRow_RePriceLow, $maxRows_RePriceLow);
$RePriceLow = mysqli_query($query_limit_RePriceLow, $cibproto) or die(mysqli_error());
$row_RePriceLow = mysqli_fetch_assoc($RePriceLow);
if (isset($_GET['totalRows_RePriceLow'])) {
  $totalRows_RePriceLow = $_GET['totalRows_RePriceLow'];
  }
 else {
  $all_RePriceLow = mysqli_query($query_RePriceLow);
  $totalRows_RePriceLow = mysqli_num_rows($all_RePriceLow);
  if ($totalRows_RePriceLow==0) {
    echo "<script language='JavaScript'>alert('No rows found !')</script>";
	require_once ("t_search_param_buying_control_ins.php");
	exit;
   }
}
$totalPages_RePriceLow = ceil($totalRows_RePriceLow/$maxRows_RePriceLow)-1;
?>
<Head>
<title>vlbuying_control_ins.php</title>
<link rel="stylesheet" href="styles.css" type="text/css">
<meta name="description"     content="Faites ici en une ou deux lignes, la description de ce fichier.">
<meta name="keywords"        content="keywords; 1, keywords; 2, etc...">
<meta name="author"         content="Felicien NEZZI,  WAHO 2007">
<meta name="Funtion"   content="CIB MANAGER, fnezzi@wahooas.org">
<meta name="Date"        content="2007-03-31T08:00+00:00">
<!-- date et heure exemple: 31/03/2007, 08:00 heures, +0 heure. par rapport à Greenwich -->
<meta name="DC.Language"    content="fr">
<!-- fr = fran&ccedil;ais -->
<script language="JavaScript" type="text/JavaScript">
<!--
//-->
</script>
<style type="text/css">
<!--
.Style25 {
	font-size: 12px;
	color: #990000;
}
.Style26 {
	font-size: 24px;
	font-weight: bold;
}
.Style1 {font-size: 24px}
.Style30 {font-size: 12px}
.Style32 {font-size: 12}
.Style33 {
	font-size: 18px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
-->
</style>
</Head>
<BODY>
<table width="963" border="1" cellpadding="2" cellspacing="2">
  <tr>
    <th width="126" scope="row"><div align="center"><span class="Style1"><a href="t_search_param_buying_control_ins.php" title="Retour" class="Style7 Style6 "><span class="Style3"><span class="Style25 Style25">Back</span></span></a></span></div></th>
    <td width="571"><div align="center" class="Style7 Style49"><span class="Style84"> <span class="Style33 Style66">List of Pending documents</span>    </span> </div></td>
    <td width="138"><div align="center" class="Style30">username:
            <?php
				echo "{$_SESSION['username']}";
	?>
    </div></td>
    <td width="92"><div align="center" class="Style30">Date :
            <?php 
      $today = date (" D j, M,Y  H:i:s");
      echo " $today "; ?>
    </div></td>
  </tr>
</table>



<p align="center" class="Style26 Style32">
  <?php
$maxRows_RePriceLow = 60;
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

/*
$query_RePriceLow = sprintf("%s" ,
"SELECT * from $view_table_name_en
where (tecowas_id = '$t_ec_id' )
AND  tbuying_status  = '2'
AND (tbuying_dbid >= STR_TO_DATE('$pDsta','%d/%m/%Y') 
	and (tbuying_dbid <= STR_TO_DATE('$pDend','%d/%m/%Y'))
    ) 
ORDER By tbuying_dbid");

$query_limit_RePriceLow = sprintf("%s LIMIT %d, %d", $query_RePriceLow, $startRow_RePriceLow, $maxRows_RePriceLow);


$RePriceLow = mysqli_query($query_limit_RePriceLow, $cibproto) or die(mysqli_error());

$row_RePriceLow = mysqli_fetch_assoc($RePriceLow);

if (isset($_GET['totalRows_RePriceLow'])) {
  $totalRows_RePriceLow = $_GET['totalRows_RePriceLow'];
} else {
  $all_RePriceLow = mysqli_query($query_RePriceLow);
  $totalRows_RePriceLow = mysqli_num_rows($all_RePriceLow);
}
$totalPages_RePriceLow = ceil($totalRows_RePriceLow/$maxRows_RePriceLow)-1;
*/
?>

  <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
  <html>
  <head> </p>
<table width="100%"  border="1" cellspacing="2" cellpadding="2" summary="Lowest Price per period">
  <caption class="Style1">&nbsp;
  </caption>
  <tr>
    <th width="5%" nowrap class="Style9 Style30" scope="col"><span class="Style30 Style9"><strong>Product</strong></span></th>
   <th width="5%" scope="col"><span class="Style30 Style9"><strong>Presentation</strong></span></th>

    <th width="2%" nowrap scope="col"><span class="Style30 Style9"><strong>Pack size </strong></span></th>
    <th width="5%" scope="col"><span class="Style30 Style9"><strong>Price per pack</strong></span></th>
    <th width="3%" nowrap scope="col"><span class="Style30 Style9">Quantity</span></th>
    <th width="7%" nowrap scope="col"><span class="Style30 Style9"><strong><strong>Total Cost </strong></strong></span></th>
    <th width="5%" scope="col"><span class="Style30 Style9"><strong>Inco Term </strong></span></th>
    <th width="6%" scope="col"><span class="Style30"><strong>Date of Bid Opening</strong></span></th>
    <th width="6%" scope="col"><span class="Style30 Style9"><strong>Supplier</strong></span></th>
    <th width="5%" scope="col"><span class="Style30 Style9"><strong>Type of Supplier </strong></span></th>
    <th width="5%" scope="col"><span class="Style30">Manufacturer</span></th>
    <th width="5%" scope="col"><span class="Style30">Transportion method </span></th>
    <th width="5%" scope="col"><span class="Style30 Style9"><strong>Lead time (days) </strong></span></th>
      <th width="5%" scope="col"><span class="Style30 Style9"><strong>Remarks </strong></span></th>
  </tr>
  <?php do { ?>
  <tr bgcolor="#9DACBF" background="#ECE9D8">
    <td nowrap bgcolor="#ECE9D8"><div align="center" class="Style9 Style30"><?php echo $row_RePriceLow['tproduct_desc']; ?></div></td>
    <td nowrap bgcolor="#ECE9D8"><div align="left" class="Style30">
        <div align="center"><span class="Style9"><?php echo $row_RePriceLow['tpresent_desc']; ?></span></div>
    </div></td>
    <td bgcolor="#ECE9D8"><div align="center" class="Style30"><span class="Style9"><?php echo $row_RePriceLow['tbuying_pack_size']; ?></span></div></td>
    <td bgcolor="#ECE9D8"><div align="center" class="Style30"><span class="Style9"><?php echo $row_RePriceLow['tbuying_price_per_pack'].$row_RePriceLow['tcur_symb']; ?></span></div></td>
    <td bgcolor="#ECE9D8" class="Style9 Style30"><div align="center"><?php echo $row_RePriceLow['tbuying_qty_pack']; ?></div></td>
    <td nowrap bgcolor="#ECE9D8"><div align="center" class="Style9 Style30"><span class="Style7"><span class="Style30"><span class="Style9  Style66"><?php echo $row_RePriceLow['tbuying_tcost'].$row_RePriceLow['tcur_symb']; ?></span></span></span> </div></td>
    <td bgcolor="#ECE9D8"><span class="Style30"><span class="Style9"><?php echo $row_RePriceLow['tinco_desc']; ?></span></span></td>
    <td nowrap bgcolor="#ECE9D8"><div align="center" class="Style30"><span class="Style9"><?php echo $row_RePriceLow['tbuying_dbid']; ?></span></div></td>
    <td background="#ECE9D8" bgcolor="#ECE9D8"><div align="center" class="Style30"><span class="Style9"><?php echo $row_RePriceLow['tprov_desc']."<BR>".$row_RePriceLow['tprov_coun_desc']; ?></span></div></td>
    <td nowrap bgcolor="#ECE9D8"><span class="Style30"><span class="Style9"><?php echo $row_RePriceLow['ttype_prov_desc']; ?></span></span></td>
    <td nowrap bgcolor="#ECE9D8"><div align="center" class="Style30"><span class="Style9"><?php echo $row_RePriceLow['tmanu_desc']."<BR>".$row_RePriceLow['tmanu_coun_desc']; ?></span></div></td>
    <td nowrap bgcolor="#ECE9D8"><div align="center" class="Style30"><span class="Style9"><?php echo $row_RePriceLow['ttransport_desc']; ?></span></div></td>
    <td bgcolor="#ECE9D8"><div align="center"><span class="Style30"><span class="Style9"><?php echo $row_RePriceLow['tbuying_lead_time']; ?></span></span></div></td>
    <td bgcolor="#ECE9D8"><div align="center"><span class="Style30"><span class="Style9"><?php echo $row_RePriceLow['tbuying_remark']; ?></span></span></div></td>
  
  </tr>
  <?php } while ($row_RePriceLow = mysqli_fetch_assoc($RePriceLow)); ?>
</table>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<div align="center"></div>
</body>
</html>
<?php
mysqli_free_result($RePriceLow);
?>
