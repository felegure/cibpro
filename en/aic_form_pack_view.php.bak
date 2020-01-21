<?php session_start(); 
require_once('../Connections/cibproto.php');

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_Re_pack = 10;
$pageNum_Re_pack = 0;
if (isset($_GET['pageNum_Re_pack'])) {
  $pageNum_Re_pack = $_GET['pageNum_Re_pack'];
}
$startRow_Re_pack = $pageNum_Re_pack * $maxRows_Re_pack;

mysqli_select_db($database_cibproto, $cibproto);
$query_Re_pack = "SELECT * FROM tpack";
$query_limit_Re_pack = sprintf("%s LIMIT %d, %d", $query_Re_pack, $startRow_Re_pack, $maxRows_Re_pack);
$Re_pack = mysqli_query($query_limit_Re_pack, $cibproto) or die(mysqli_error());
$row_Re_pack = mysqli_fetch_assoc($Re_pack);

if (isset($_GET['totalRows_Re_pack'])) {
  $totalRows_Re_pack = $_GET['totalRows_Re_pack'];
} else {
  $all_Re_pack = mysqli_query($query_Re_pack);
  $totalRows_Re_pack = mysqli_num_rows($all_Re_pack);
}
$totalPages_Re_pack = ceil($totalRows_Re_pack/$maxRows_Re_pack)-1;

$queryString_Re_pack = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Re_pack") == false && 
        stristr($param, "totalRows_Re_pack") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Re_pack = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Re_pack = sprintf("&totalRows_Re_pack=%d%s", $totalRows_Re_pack, $queryString_Re_pack);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>List of Packaging type - CIB Prototype</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.Style1 {font-size: 24px}
.Style3 {
	font-size: 12px;
	color: #000066;
}
.Style4 {color: #003366}
.Style15 {font-size: 12px}
-->
</style>
</head>

<body>
<table width="963" border="1" cellpadding="2" cellspacing="2">
  <tr>
    <th width="126" scope="row"><div align="center"><span class="Style1"><a href="pickaform.php" title="Retour" class="Style7 Style6 "><span class="Style4"><span class="Style3">Back</span></span></a></span></div></th>
    <td width="571"><div align="center" class="Style1">List of Packaging type</div></td>
    <td width="138"><div align="center" class="Style15">username:
            <?php
				echo "{$_SESSION['username']}";
	?>
    </div></td>
    <td width="92"><div align="center" class="Style15">Date :
            <?php 
      $today = date ("  M ,D j,Y  H:i:s");
      echo " $today "; ?>
    </div></td>
  </tr>
</table>
<p align="center">&nbsp;</p>
<p>
<table border="0" width="50%" align="center">
  <tr>
    <td width="23%" align="center">
      <?php if ($pageNum_Re_pack > 0) { // Show if not first page ?>
      <a href="<?php printf("%s?pageNum_Re_pack=%d%s", $currentPage, 0, $queryString_Re_pack); ?>"><img src="First.gif" border=0></a>
      <?php } // Show if not first page ?>
    </td>
    <td width="31%" align="center">
      <?php if ($pageNum_Re_pack > 0) { // Show if not first page ?>
      <a href="<?php printf("%s?pageNum_Re_pack=%d%s", $currentPage, max(0, $pageNum_Re_pack - 1), $queryString_Re_pack); ?>"><img src="Previous.gif" border=0></a>
      <?php } // Show if not first page ?>
    </td>
    <td width="23%" align="center">
      <?php if ($pageNum_Re_pack < $totalPages_Re_pack) { // Show if not last page ?>
      <a href="<?php printf("%s?pageNum_Re_pack=%d%s", $currentPage, min($totalPages_Re_pack, $pageNum_Re_pack + 1), $queryString_Re_pack); ?>"><img src="Next.gif" border=0></a>
      <?php } // Show if not last page ?>
    </td>
    <td width="23%" align="center">
      <?php if ($pageNum_Re_pack < $totalPages_Re_pack) { // Show if not last page ?>
      <a href="<?php printf("%s?pageNum_Re_pack=%d%s", $currentPage, $totalPages_Re_pack, $queryString_Re_pack); ?>"><img src="Last.gif" border=0></a>
      <?php } // Show if not last page ?>
    </td>
  </tr>
</table>
</p>
<div align="center">
  <table border="10">
    <tr>
      <td width="161">Packaging ID </td>
      <td width="500">Description</td>
      <td width="184">Status</td>
      <td width="500">Remark</td>
    </tr>
    <?php do { ?>
    <tr>
      <td><?php echo $row_Re_pack['tpack_id']; ?></td>
      <td><?php echo $row_Re_pack['tpack_desc']; ?></td>
      <td><?php echo $row_Re_pack['tpack_status']; ?></td>
      <td><?php echo $row_Re_pack['tpack_remark']; ?></td>
    </tr>
    <?php } while ($row_Re_pack = mysqli_fetch_assoc($Re_pack)); ?>
  </table>
</div>
</body>
</html>
<?php
mysqli_free_result($Re_pack);
?>
