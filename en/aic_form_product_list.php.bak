<?php 
session_start();
require_once('../Connections/cibproto.php'); 
require_once('utilang_en.php');
?>
<?php
$currentPage = $_SERVER["PHP_SELF"];

$currentPage = $_SERVER["PHP_SELF"];

global $save;
if (isset($_POST["pCate"])) {
	$pCate = $_POST['pCate'] ;
	$save = $pCate;
	$_POST['categ']=$save;
// echo "XXXX pCate existe=$pCate save aussi=$save <BR>";
 //$kelcategory= $_GET["kelcategory"];
  //$kelcategory= ${kelcategory};
 // echo "XXXX  save aussi=$save <BR>";
}
else {
$pCate=@$_POST['categ'];
}
// mysqli_select_db($database_cibproto, $cibproto);
//$query_Re_prod = "SELECT * FROM $Product 
//
$query_Re_prod = "SELECT * FROM  tproduct_fr 
WHERE tproduct_status = '1' AND  (tproduct_cat = '$pCate' or '$pCate' = '*') order by $product";

if ($pCate<>'*') {
$query_Re_categ= "Select tcateg_desc FROM $category where tcateg_id ='$pCate'";
mysqli_select_db($database_cibproto, $cibproto);
$pageNum_Re_categ = 0;
$maxRows_Re_categ = 1;
$startRow_Re_categ = $pageNum_Re_categ * $maxRows_Re_categ;

$query_limit_Re_categ = sprintf("%s LIMIT %d, %d", $query_Re_categ, $startRow_Re_categ, 1);
$Re_categ = mysqli_query($query_limit_Re_categ, $cibproto) or die(mysqli_error());
$row_Re_categ = mysqli_fetch_assoc($Re_categ);
$Category=$row_Re_categ['tcateg_desc'];
//echo $row_Re_categ['tcateg_desc'];
}
else  $Category= "All Categories";


// echo "categorie trouvée = $Category   categ=$pCate";

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}
$maxRows_Re_product = 1000;
$pageNum_Re_product = 0;
if (isset($_GET['pageNum_Re_product'])) {
  $pageNum_Re_product = $_GET['pageNum_Re_product'];
}
$startRow_Re_product = $pageNum_Re_product * $maxRows_Re_product;
//  echo "AVANT <n> database=$database_cibproto";
// echo " database=$database_cibproto, cibproto=$cibproto"; 
// mysqli_select_db($database_cibproto, $cibproto);
mysqli_select_db("cibase", $cibproto);

$query_Re_product = "SELECT tproduct_desc, tproduct_status, tproduct_remark FROM $product 
where tproduct_cat = '$pCate' or '$pCate' = '*'
order by tproduct_desc";
$query_limit_Re_product = sprintf("%s LIMIT %d, %d", $query_Re_product, $startRow_Re_product, $maxRows_Re_product);
$Re_product = mysqli_query($query_limit_Re_product, $cibproto) or die(mysqli_error());
$row_Re_product = mysqli_fetch_assoc($Re_product);

if (isset($_GET['totalRows_Re_product'])) {
  $totalRows_Re_product = $_GET['totalRows_Re_product'];
 //  echo "nombre record then =  $totalRows_Re_product";
} else {
  $all_Re_product = mysqli_query($query_Re_product);
  $totalRows_Re_product = mysqli_num_rows($all_Re_product);
//  echo "nombre record else =  $totalRows_Re_product";
}
$totalPages_Re_product = ceil($totalRows_Re_product/$maxRows_Re_product)-1;

$queryString_Re_product = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Re_product") == false && 
        stristr($param, "totalRows_Re_product") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Re_product = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Re_product = sprintf("&totalRows_Re_product=%d%s", $totalRows_Re_product, $queryString_Re_product);

$queryString_Re_product = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Re_product") == false && 
        stristr($param, "totalRows_Re_product") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Re_product = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Re_product = sprintf("&totalRows_Re_product=%d%s", $totalRows_Re_product, $queryString_Re_product);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>List of Products</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.Style1 {font-size: 24px}
.Style6 {
	font-size: 12px;
	color: #009900;
}
.Style7 {
	font-size: 12px;
	color: #33FF00;
	font-weight: bold;
}
.Style13 {color: #003366}
.Style14 {
	color: #000066;
	font-size: 12px;
}
-->
</style>
</head>

<body>
<table width="963" border="1" cellpadding="2" cellspacing="2">
  <tr>
    <th width="126" scope="row"><div align="center"><span class="Style1"><a href="pickareport.php"Retour" class="Style7 Style6 "><span class="Style3"><span class="Style25"><font color="#000000">Back</font></span></span></a></span></div></th>
    <td width="571"><div align="center" class="Style7 Style49">
        <p><span class="Style84"> <span class="Style30"><font color="#000000">List 
          of <font size="+2">Essential Products</font></font></span> </span></p>
        <p><font color="#000000">Category :</font> <font color="#FF0000"><span class="Style84"> 
          <?php 
           echo " $Category   "; ?>
          </span></font><span class="Style84"> <font color="#000000"> <font color="#FFFFFF">:</font> 
          number of records :</font><font color="#FF0000"><span class="Style84"> 
          <?php 
           echo "$totalRows_Re_product"; ?>
          </span></p>
        <p>&nbsp;</p>
        <span class="Style84">
        <div align="center" class="Style30"> </div>
        </span> </div></td>
    <td width="138"><div align="center" class="Style30">user: 
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
<p><a href="pickareport.php" title="Retour" class="Style7 Style6 "><span class="Style13"></span></a>
<div align="center">
<table border="0" width="50%" align="center">
  <tr>
    <td width="23%" align="center">
      <?php if ($pageNum_Re_product > 0) { // Show if not first page ?>
      <a href="<?php printf("%s?pageNum_Re_product=%d%s", $currentPage, 0, $queryString_Re_product); ?>"><img src="First.gif" border=0></a>
      <?php } // Show if not first page ?>
    </td>
    <td width="31%" align="center">
      <?php if ($pageNum_Re_product > 0) { // Show if not first page ?>
      <a href="<?php printf("%s?pageNum_Re_product=%d%s", $currentPage, max(0, $pageNum_Re_product - 1), $queryString_Re_product); ?>"><img src="Previous.gif" border=0></a>
      <?php } // Show if not first page ?>
    </td>
    <td width="23%" align="center">
      <?php if ($pageNum_Re_product < $totalPages_Re_product) { // Show if not last page ?>
      <a href="<?php printf("%s?pageNum_Re_product=%d%s", $currentPage, min($totalPages_Re_product, $pageNum_Re_product + 1), $queryString_Re_product); ?>"><img src="Next.gif" border=0></a>
      <?php } // Show if not last page ?>
    </td>
    <td width="23%" align="center">
      <?php if ($pageNum_Re_product < $totalPages_Re_product) { // Show if not last page ?>
      <a href="<?php printf("%s?pageNum_Re_product=%d%s", $currentPage, $totalPages_Re_product, $queryString_Re_product); ?>"><img src="Last.gif" border=0></a>
      <?php } // Show if not last page ?>
    </td>
  </tr>
</table>
</p>
</div>
<div align="center">
  <table border="10">
    <!--DWLayoutTable-->
    <tr> 
      <td height="23"><div align="center">Product</div></td>
      <td><div align="center">Status (2=inactive, 1=active) </div></td>
  
    </tr>
    <?php do { ?>
    <tr> 
      <td><div align="justify"><font color="#000000"><strong><?php echo $row_Re_product['tproduct_desc']; ?></strong></font></div></td>
      <td><div align="center"><font color="#0000FF"><strong><?php echo $row_Re_product['tproduct_status']; ?></strong></font></div></td>
    </tr>
    <?php } while ($row_Re_product = mysqli_fetch_assoc($Re_product)); ?>
  </table>
</div>
<p>&nbsp;</p>
<p align="center">&nbsp;</p>

<p>&nbsp;</p>
</body>
</html>
<?php
mysqli_free_result($Re_product);
?>
