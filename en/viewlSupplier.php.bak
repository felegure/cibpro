<?php 
session_start();
require_once('../Connections/cibproto.php'); ?>
<?php
require_once ("utilang.php");

$maxRows_ReSupplier = 60;
$pageNum_ReSupplier = 0;
if (isset($_GET['pageNum_ReSupplier'])) {
  $pageNum_ReSupplier = $_GET['pageNum_ReSupplier'];
}
$startRow_ReSupplier = $pageNum_ReSupplier * $maxRows_ReSupplier;

mysqli_select_db($database_cibproto, $cibproto);
// Table name 
$table_name = "tbuying_view_07";
//echo "NOM DE TABLE=$table_name";
/*
// Select all suppliers except manufacturers
$query_ReSupplier = "SELECT * FROM $table_name where (ttype_tprov_id <> '4' 
and ttype_tprov_id <>'14')
                         order by tprov_desc , tproduct_desc";
*/
// Select all the suppliers included manaufacturers
$query_ReSupplier = "SELECT * FROM $view_table_name_en 
                         order by tprov_desc , tproduct_desc";
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
<title>Suppliers List</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.Style5 {font-size: 12px}
.Style6 {color: #000066}
.Style7 {font-size: 24px}
.Style8 {font-size: 12px; color: #000066; }
.Style1 {font-family: Verdana, Arial, Helvetica, sans-serif}
.Style13 {
	font-style: italic;
	font-size: 12px;
	color: #333366;
	font-weight: bold;
}
.Style18 {	font-size: 12px;
	color: #000066;
	font-style: italic;
}
-->
</style>
</head>

<body>

<p align="center"><span class="Style1"><span class="Style7"><strong><strong>
  <?php
				echo "$Suppliers_e";
	?>
</strong></strong></span> <span class="Style18"> </span> <span class="Style7">
<?php
$today = date (" m/j/Y");
echo " - date : ". $today." ";
?>
</span></span></p>
<p align="left"><a href="pickareport.php" title="Retour" class="Style5 Style6">Back</a></p>
<table width=100%"  border="1" cellspacing="1" cellpadding="1">
    <caption>&nbsp;
    </caption>
  <tr>
    <th width="6%" scope="col"><span class="Style5">Provider</span></th>
    <th width="6%" scope="col"><span class="Style5">Type of Supplier</span></th>
    <th width="5%" scope="col"><span class="Style5">Country of Origin</span></th>
    <th width="5%" scope="col"><span class="Style5">Product</span></th>
    <th width="5%" scope="col"><span class="Style5">Unit of Value</span></th>
    <th width="5%" scope="col"><span class="Style5">Concentration</span></th>
    <th width="5%" scope="col"><span class="Style5">Dosage Form </span></th>
    <th width="5%" scope="col"><span class="Style5">Smallest Unit </span></th>
    <th width="5%" scope="col"><span class="Style5">Unit Size </span></th>
    <th width="5%" scope="col"><span class="Style5">Type of Packaging </span></th>
    <th width="5%" scope="col"><span class="Style5">Price Per Unit </span></th>
    <th width="5%" scope="col"><span class="Style5">Total Cost </span></th>
    <th width="5%" scope="col"><span class="Style5">Qty of Unit </span></th>
    <th width="5%" scope="col"><span class="Style5">Presentation</span></th>
    <th width="5%" scope="col"><span class="Style5">Inco Term </span></th>
   
    <th width="6%" scope="col"><span class="Style5">Src of funding </span></th>
    <th width="7%" scope="col"><span class="Style5">Supply to</span></th>
    <th width="7%" scope="col"><span class="Style5">Transport</span></th>
      
  </tr>
  <?php do { ?>
  <tr>
    <td><div align="center" class="Style5"><strong><?php echo $row_ReSupplier['tprov_desc']; ?></strong></div></td>
    <td><div align="center" class="Style5"><?php echo $row_ReSupplier['ttype_prov_desc']; ?></div></td>
    <td><div align="center" class="Style5"><?php echo $row_ReSupplier['tprov_coun_desc']; ?></div></td>
    <td><div align="center" class="Style5">
        <div align="center"><strong><?php echo $row_ReSupplier['tproduct_desc']; ?></strong></div>
    </div></td>
    <td><div align="left" class="Style5"><?php echo $row_ReSupplier['tbuying_uv']; ?></div></td>
    <td><div align="center" class="Style5"><?php echo $row_ReSupplier['tconcent_desc']; ?></div></td>
    <td><div align="center" class="Style5"><?php echo $row_ReSupplier['tdosage_desc']; ?></div></td>
    <td><div align="center" class="Style5"><?php echo $row_ReSupplier['tsmalunit_desc']; ?></div></td>
    <td><div align="center" class="Style5"><?php echo $row_ReSupplier['tbuying_us']; ?></div></td>
    <td><div align="center" class="Style5"><?php echo $row_ReSupplier['tpack_desc']; ?></div></td>
    <td><div align="center" class="Style5"><?php echo $row_ReSupplier['tbuying_ppu'].$row_ReSupplier['tcur_symb']; ?></div></td>
    <td nowrap><div align="center"><span class="Style5"><?php echo $row_ReSupplier['tbuying_tcost'].$row_ReSupplier['tcur_symb']; ?></span></div></td>
    <td><div align="center" class="Style5">
        <div align="center" class="Style5"><?php echo $row_ReSupplier['tbuying_qu']; ?></div>
    </div></td>
    <td><div align="center" class="Style5"><?php echo $row_ReSupplier['tpresent_desc']; ?></div></td>
    <td nowrap><div align="center" class="Style5"><?php echo $row_ReSupplier['tinco_desc']; ?></div></td>
     <td><div align="center" class="Style5"><?php echo $row_ReSupplier['tsrcfund_desc']; ?></div></td>
    <td><span class="Style5"><?php echo $row_ReSupplier['tecowas_desc']; ?></span></td>
    <td><span class="Style5"><?php echo $row_ReSupplier['ttransport_desc']; ?></span></td>
  </tr>
  <?php } while ($row_ReSupplier = mysqli_fetch_assoc($ReSupplier)); ?>
</table>
<p>&nbsp;</p>
</body>
</html>
<?php
mysqli_free_result($ReSupplier);
?>
