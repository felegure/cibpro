<?php session_start(); 
require_once('../Connections/cibproto.php');
$currentPage = $_SERVER["PHP_SELF"];
require_once ("utilang_en.php");
/*
$pEcow = $_POST['pEcow'];
$pProv = $_POST['pProv'] ;
*/
$maxRows_Re_provider = 1000;

$pageNum_Re_provider = 0;
if (isset($_GET['pageNum_Re_provider'])) {
  $pageNum_Re_provider = $_GET['pageNum_Re_provider'];
}
$startRow_Re_provider = $pageNum_Re_provider * $maxRows_Re_provider;

mysqli_select_db( $cibproto,$database_cibproto);
$query_Re_provider = "SELECT  tprov_desc, tcountry_desc,tprov_cont, tprov_adr, tprov_postal,tprov_tel1, tprov_tel2, tprov_fax, 
tprov_email, tprov_website,tprov_remark   FROM $view_tprov_country where tprov_status = 1 order by tprov_desc";
/*
Where (tprov_coun_id like '%$pEcow' or '$pEcow' = '*')
AND  (tprov_id like '%$pProv' or '$pProv' = '*')";
*/
$query_limit_Re_provider = sprintf("%s LIMIT %d, %d", $query_Re_provider, $startRow_Re_provider, $maxRows_Re_provider);
$Re_provider = mysqli_query($cibproto, $query_limit_Re_provider ) or die(mysqli_error($cibproto));
$row_Re_provider = mysqli_fetch_assoc($Re_provider);

if (isset($_GET['totalRows_Re_provider'])) {
  $totalRows_Re_provider = $_GET['totalRows_Re_provider'];
} else {
  $all_Re_provider = mysqli_query($cibproto, $query_Re_provider);
  $totalRows_Re_provider = mysqli_num_rows($all_Re_provider);
  if ($totalRows_Re_provider ==0) {
    echo "<script language='JavaScript'>alert('No rows found !!')</script>"; 
	require_once ("pickareport.php");
	exit;
	}
}
$totalPages_Re_provider = ceil($totalRows_Re_provider/$maxRows_Re_provider)-1;

$queryString_Re_provider = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Re_provider") == false && 
        stristr($param, "totalRows_Re_provider") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Re_provider = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Re_provider = sprintf("&totalRows_Re_provider=%d%s", $totalRows_Re_provider, $queryString_Re_provider);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Report List of Suppliers information - aic_list_supplier_summary.php</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.Style5 {font-size: 12px}
.Style9 {font-size: 12px}
.Style25 {
	font-size: 12px;
	color: #000066;
}


.Style30 {font-size: 12px}
.Style84 {font-size: 24px}
.Style85 {
	font-size: 12px;
	color: #000066;
}
.Style86 {color: #990000}
.Style6 {color: #000066}
.Style87 {color: #000099;
	font-weight: bold;
}
.Style88 {font-size: 18px}
-->
</style>
</head>

<body>
<div align="center">
  <p align="center"><span class="Style7"><span class="Style21"><strong>
  <span class="Style7"><span class="Style1"><strong>
<table width="963" border="1" cellpadding="2" cellspacing="2">
  <tr>
    <th width="126" scope="row"><div align="center" class="Style85"><a href="pickareport.php" title="Retour" class="Style25 Style86">Back</a></div></th>
    <td width="571"><div align="center" class="Style84"><span class="Style30">List</span> <span class="Style30">of</span> <span class="Style30">Suppliers </span><span class="Style30">with contact<strong>s</strong></span>
    </div></td>
    <td width="138"><div align="center" class="Style9"><span class="Style23 Style9">username</span>:
            <?php
				echo "{$_SESSION['username']}";
	?>
    </div></td>
    <td width="92"><div align="center" class="Style9"><span class="Style9">Date</span> :
            <?php 
      $today = date ("  D j, M,Y  H:i:s");
      echo " $today "; ?>
    </div></td>
  </tr>
</table></a></p>
<table width=100%"  border="1" cellspacing="2" cellpadding="2">
  <caption>&nbsp;
  </caption>
  <tr class="Style30">
    <th width="7%" scope="col"><span class="Style5">S/N</span></th>
    <th width="6%" scope="col"><span class="Style5 Style23">Supplier</span></th>
	   <th width="6%" scope="col"><span class="Style5">Country</span></th>
    <th width="6%" scope="col"><span class="Style5">Contact</span></th>
    <th width="5%" scope="col"><span class="Style5">Adress</span></th>
	 <th width="6%" scope="col"><span class="Style5">Zip Code</span></th>
    <th width="5%" scope="col"><span class="Style5">Telephone 1</span></th>
    <th width="5%" scope="col"><span class="Style5">Telephone 2</span></th>
    <th width="5%" scope="col"><span class="Style5">Fax</span></th>
    <th width="5%" scope="col"><span class="Style5">email adress</span></th>
    <th width="5%" scope="col"><span class="Style5">Web site</span></th>
	   <th width="5%" scope="col"><span class="Style5">Comments</span></th>
  </tr>
  <?php  $cpt=1; 
  do { ?>
  <tr>
    <td bordercolor="#99CCCC"><div align="center" class="Style5"><strong><?php echo $cpt; ?></strong></div></td>
  
    <td><div align="center" class="Style5"><span class="Style30"><?php echo $row_Re_provider['tprov_desc'] ?></span></div></td>
   <td><div align="center" class="Style5"><span class="Style30"><?php echo $row_Re_provider['tcountry_desc'];?></span></div></td>
    <td><div align="center" class="Style9"><?php echo $row_Re_provider['tprov_cont']; ?></div></td>
    <td><div align="center" class="Style5"><?php echo $row_Re_provider['tprov_adr']."<BR>". $row_Re_provider['tprov_postal']; ?></div></td>
   <td><div align="center" class="Style5">
      <div align="center"><?php echo $row_Re_provider['tprov_postal'] ?></div>
    </div></td>
    <td><div align="center" class="Style5">
      <div align="center"><?php echo $row_Re_provider['tprov_tel1'] ?></div>
    </div></td>
	<td><div align="center" class="Style5">
      <div align="center"><?php echo $row_Re_provider['tprov_tel2'] ?></div>
    </div></td>
	<td><div align="center" class="Style5">
      <div align="center"><?php echo $row_Re_provider['tprov_fax'] ?></div>
    </div></td>
    <td><div align="left" class="Style5">
      <div align="center"><?php echo $row_Re_provider['tprov_email']; ?></div>
    </div></td>
    <td><div align="center" class="Style5"><?php echo $row_Re_provider['tprov_website']; ?></div></td>
	<td><div align="center" class="Style5"><?php echo $row_Re_provider['tprov_remark']; ?></div></td>
    
  </tr>
  <?php $cpt=$cpt+1;
  } while ($row_Re_provider = mysqli_fetch_assoc($Re_provider)); ?>
</table>


<p><span class="Style87"><a href="export_excel_report_detail.php?requete=<?PHP echo $query_Re_provider ?>&type=1" class="Style6"><span class="Style62 Style6 Style25 Style54"><span class="Style62 Style6  Style25 Style89"><span class="Style22 Style50 Style86 Style88">Export to excel</span></span></span></a></span></p>
</div>
</body>
</html>
<?php
mysqli_free_result($Re_provider);
?>
