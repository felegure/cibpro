<?php require_once('Connections/cibproto.php'); ?>
<?php
$maxRows_Re_Products = 100;
$pageNum_Re_Products = 0;
if (isset($_GET['pageNum_Re_Products'])) {
  $pageNum_Re_Products = $_GET['pageNum_Re_Products'];
}
$startRow_Re_Products = $pageNum_Re_Products * $maxRows_Re_Products;

mysqli_select_db($database_cibproto, $cibproto);
$query_Re_Products = "SELECT tproduct_desc, tproduct_strength, tproduct_concent, tproduct_cat FROM tproduct order by tproduct_cat,tproduct_desc";
$query_limit_Re_Products = sprintf("%s LIMIT %d, %d", $query_Re_Products, $startRow_Re_Products, $maxRows_Re_Products);
$Re_Products = mysqli_query($query_limit_Re_Products, $cibproto) or die(mysqli_error());
$row_Re_Products = mysqli_fetch_assoc($Re_Products);

if (isset($_GET['totalRows_Re_Products'])) {
  $totalRows_Re_Products = $_GET['totalRows_Re_Products'];
} else {
  $all_Re_Products = mysqli_query($query_Re_Products);
  $totalRows_Re_Products = mysqli_num_rows($all_Re_Products);
}
$totalPages_Re_Products = ceil($totalRows_Re_Products/$maxRows_Re_Products)-1;
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Product List</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.Style1 {font-family: Verdana, Arial, Helvetica, sans-serif}
.Style4 {font-size: 9px}
.Style5 {font-size: 12px}
.Style8 {font-size: 24px}
.Style9 {color: #003366}

-->
</style>
</head>

<body>
<div align="left"><a href="pickareport.htm" title="Retour" class="Style5 Style9">Retour</a>
</div>
<table width="60%"  border="1" cellspacing="2" cellpadding="2" summary="This is the list of Products in DB">
  <caption class="Style1">
  <span class="Style8">Product List
  <?
$today = date (" m/j/Y");
echo " - date : ". $today." ";
?>
  </span>  
  </caption>
  <tr>
    <th class="Style4" scope="col"><div align="center">Product Description </div></th>
    <th class="Style4" scope="col">Strength</th>
    <th class="Style4" scope="col">Concentration</th>
    <th class="Style4" scope="col">Category</th>
  </tr>
  <?php do { ?>
  <tr>
    <td><div align="center" class="Style4"><?php echo $row_Re_Products['tproduct_desc']; ?></div></td>
    <td><div align="right" class="Style4"><?php echo $row_Re_Products['tproduct_strength']; ?></div></td>
    <td class="Style4"><?php echo $row_Re_Products['tproduct_concent']; ?></td>
    <td><div align="center" class="Style4"><?php echo $row_Re_Products['tproduct_cat']; ?></div></td>
  </tr>
  <?php } while ($row_Re_Products = mysqli_fetch_assoc($Re_Products)); ?>
</table>

</body>
</html>
<?php
mysqli_free_result($Re_Products);
?>
