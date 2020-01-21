<?php session_start(); 
require_once('../Connections/cibproto.php');

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_Re_present = 10;
$pageNum_Re_present = 0;
if (isset($_GET['pageNum_Re_present'])) {
  $pageNum_Re_present = $_GET['pageNum_Re_present'];
}
$startRow_Re_present = $pageNum_Re_present * $maxRows_Re_present;

mysqli_select_db($database_cibproto, $cibproto);
$query_Re_present = "SELECT * FROM tpresent";
$query_limit_Re_present = sprintf("%s LIMIT %d, %d", $query_Re_present, $startRow_Re_present, $maxRows_Re_present);
$Re_present = mysqli_query($query_limit_Re_present, $cibproto) or die(mysqli_error());
$row_Re_present = mysqli_fetch_assoc($Re_present);

if (isset($_GET['totalRows_Re_present'])) {
  $totalRows_Re_present = $_GET['totalRows_Re_present'];
} else {
  $all_Re_present = mysqli_query($query_Re_present);
  $totalRows_Re_present = mysqli_num_rows($all_Re_present);
}
$totalPages_Re_present = ceil($totalRows_Re_present/$maxRows_Re_present)-1;

$queryString_Re_present = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Re_present") == false && 
        stristr($param, "totalRows_Re_present") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Re_present = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Re_present = sprintf("&totalRows_Re_present=%d%s", $totalRows_Re_present, $queryString_Re_present);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>List of Presentation  - CIB Prototype</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.Style1 {font-size: 12px}
.Style2 {font-size: 24px}
.Style3 {color: #003366}
.Style14 {color: #000066;
	font-size: 12px;
}
-->
</style>
</head>

<body>
<table width="963" border="1" cellpadding="2" cellspacing="2">
  <tr>
    <th width="126" scope="row"><div align="center"><span class="Style2"><a href="pickaform.php" title="Retour" class="Style7 Style6 "><span class="Style3"><span class="Style14">Back</span></span></a></span></div></th>
    <td width="571"><div align="center" class="Style2">List of Presentation</div></td>
    <td width="138"><div align="center" class="Style1">username:
            <?php
				echo "{$_SESSION['username']}";
	?>
    </div></td>
    <td width="92"><div align="center" class="Style1">Date :
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
      <?php if ($pageNum_Re_present > 0) { // Show if not first page ?>
      <a href="<?php printf("%s?pageNum_Re_present=%d%s", $currentPage, 0, $queryString_Re_present); ?>"><img src="First.gif" border=0></a>
      <?php } // Show if not first page ?>
    </td>
    <td width="31%" align="center">
      <?php if ($pageNum_Re_present > 0) { // Show if not first page ?>
      <a href="<?php printf("%s?pageNum_Re_present=%d%s", $currentPage, max(0, $pageNum_Re_present - 1), $queryString_Re_present); ?>"><img src="Previous.gif" border=0></a>
      <?php } // Show if not first page ?>
    </td>
    <td width="23%" align="center">
      <?php if ($pageNum_Re_present < $totalPages_Re_present) { // Show if not last page ?>
      <a href="<?php printf("%s?pageNum_Re_present=%d%s", $currentPage, min($totalPages_Re_present, $pageNum_Re_present + 1), $queryString_Re_present); ?>"><img src="Next.gif" border=0></a>
      <?php } // Show if not last page ?>
    </td>
    <td width="23%" align="center">
      <?php if ($pageNum_Re_present < $totalPages_Re_present) { // Show if not last page ?>
      <a href="<?php printf("%s?pageNum_Re_present=%d%s", $currentPage, $totalPages_Re_present, $queryString_Re_present); ?>"><img src="Last.gif" border=0></a>
      <?php } // Show if not last page ?>
    </td>
  </tr>
</table>
</p>
<div align="center">
  <table border="10">
    <tr>
      <td width="161">Presentation ID </td>
      <td width="500">Description</td>
      <td width="184">Status</td>
      <td width="500">Remark</td>
    </tr>
    <?php do { ?>
    <tr>
      <td><?php echo $row_Re_present['tpresent_id']; ?></td>
      <td><?php echo $row_Re_present['tpresent_desc']; ?></td>
      <td><?php echo $row_Re_present['tpresent_status']; ?></td>
      <td><?php echo $row_Re_present['tpresent_remark']; ?></td>
    </tr>
    <?php } while ($row_Re_present = mysqli_fetch_assoc($Re_present)); ?>
  </table>
</div>
</body>
</html>
<?php
mysqli_free_result($Re_present);
?>
