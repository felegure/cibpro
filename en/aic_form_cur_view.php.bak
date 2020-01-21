<?php session_start(); 
require_once('../Connections/cibproto.php');

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_Re_tcur = 10;
$pageNum_Re_tcur = 0;
if (isset($_GET['pageNum_Re_tcur'])) {
  $pageNum_Re_tcur = $_GET['pageNum_Re_tcur'];
}
$startRow_Re_tcur = $pageNum_Re_tcur * $maxRows_Re_tcur;

mysqli_select_db($database_cibproto, $cibproto);
$query_Re_tcur = "SELECT * FROM tcur";
$query_limit_Re_tcur = sprintf("%s LIMIT %d, %d", $query_Re_tcur, $startRow_Re_tcur, $maxRows_Re_tcur);
$Re_tcur = mysqli_query($query_limit_Re_tcur, $cibproto) or die(mysqli_error());
$row_Re_tcur = mysqli_fetch_assoc($Re_tcur);

if (isset($_GET['totalRows_Re_tcur'])) {
  $totalRows_Re_tcur = $_GET['totalRows_Re_tcur'];
} else {
  $all_Re_tcur = mysqli_query($query_Re_tcur);
  $totalRows_Re_tcur = mysqli_num_rows($all_Re_tcur);
}
$totalPages_Re_tcur = ceil($totalRows_Re_tcur/$maxRows_Re_tcur)-1;

$queryString_Re_tcur = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Re_tcur") == false && 
        stristr($param, "totalRows_Re_tcur") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Re_tcur = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Re_tcur = sprintf("&totalRows_Re_tcur=%d%s", $totalRows_Re_tcur, $queryString_Re_tcur);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>List of Currency - CIB Prototype</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.Style2 {font-size: 24px}
.Style4 {font-size: 12px; color: #0000FF; }
.Style5 {font-size: 12px}
.Style6 {color: #000066}
.Style16 {font-size: 12px;
	color: #000066;
}
.Style17 {color: #003366}
-->
</style>
</head>

<body>
<table width="963" border="1" cellpadding="2" cellspacing="2">
  <tr>
    <th width="126" scope="row"><div align="center"><span class="Style2"><a href="pickaform.php" title="Retour" class="Style7 Style6 "><span class="Style17"><span class="Style16">Back</span></span></a></span></div></th>
    <td width="571"><div align="center" class="Style2">List of Currencies</div></td>
    <td width="138"><div align="center" class="Style5">username:
            <?php
				echo "{$_SESSION['username']}";
	?>
    </div></td>
    <td width="92"><div align="center" class="Style5">Date :
            <?php 
      $today = date ("  M ,D j,Y  H:i:s");
      echo " $today "; ?>
    </div></td>
  </tr>
</table>
<p align="center" class="Style2">&nbsp;</p>
<p>
<table border="0" width="50%" align="center">
  <tr>
    <td width="23%" align="center">
      <?php if ($pageNum_Re_tcur > 0) { // Show if not first page ?>
      <a href="<?php printf("%s?pageNum_Re_tcur=%d%s", $currentPage, 0, $queryString_Re_tcur); ?>"><img src="First.gif" border=0></a>
      <?php } // Show if not first page ?>
    </td>
    <td width="31%" align="center">
      <?php if ($pageNum_Re_tcur > 0) { // Show if not first page ?>
      <a href="<?php printf("%s?pageNum_Re_tcur=%d%s", $currentPage, max(0, $pageNum_Re_tcur - 1), $queryString_Re_tcur); ?>"><img src="Previous.gif" border=0></a>
      <?php } // Show if not first page ?>
    </td>
    <td width="23%" align="center">
      <?php if ($pageNum_Re_tcur < $totalPages_Re_tcur) { // Show if not last page ?>
      <a href="<?php printf("%s?pageNum_Re_tcur=%d%s", $currentPage, min($totalPages_Re_tcur, $pageNum_Re_tcur + 1), $queryString_Re_tcur); ?>"><img src="Next.gif" border=0></a>
      <?php } // Show if not last page ?>
    </td>
    <td width="23%" align="center">
      <?php if ($pageNum_Re_tcur < $totalPages_Re_tcur) { // Show if not last page ?>
      <a href="<?php printf("%s?pageNum_Re_tcur=%d%s", $currentPage, $totalPages_Re_tcur, $queryString_Re_tcur); ?>"><img src="Last.gif" border=0></a>
      <?php } // Show if not last page ?>
    </td>
  </tr>
</table>
</p>
<div align="center">
  <table border="10">
    <tr>
      <td width="161">Currency code </td>
      <td width="500">Description</td>
      <td width="184">Status</td>
      <td width="500">Remark</td>
    </tr>
    <?php do { ?>
    <tr>
      <td><?php echo $row_Re_tcur['tcur_id']; ?></td>
      <td><?php echo $row_Re_tcur['tcur_desc']; ?></td>
      <td><?php echo $row_Re_tcur['tcur_status']; ?></td>
      <td><?php echo $row_Re_tcur['tcur_remark']; ?></td>
    </tr>
    <?php } while ($row_Re_tcur = mysqli_fetch_assoc($Re_tcur)); ?>
  </table>
</div>
</body>
</html>
<?php
mysqli_free_result($Re_tcur);
?>
