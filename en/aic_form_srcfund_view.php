<?php session_start(); 
require_once('../Connections/cibproto.php');
$currentPage = $_SERVER["PHP_SELF"];

$maxRows_Re_tsrcfund = 10;
$pageNum_Re_tsrcfund = 0;
if (isset($_GET['pageNum_Re_tsrcfund'])) {
  $pageNum_Re_tsrcfund = $_GET['pageNum_Re_tsrcfund'];
}
$startRow_Re_tsrcfund = $pageNum_Re_tsrcfund * $maxRows_Re_tsrcfund;

mysqli_select_db($database_cibproto, $cibproto);
$query_Re_tsrcfund = "SELECT * FROM tsrcfund";
$query_limit_Re_tsrcfund = sprintf("%s LIMIT %d, %d", $query_Re_tsrcfund, $startRow_Re_tsrcfund, $maxRows_Re_tsrcfund);
$Re_tsrcfund = mysqli_query($query_limit_Re_tsrcfund, $cibproto) or die(mysqli_error());
$row_Re_tsrcfund = mysqli_fetch_assoc($Re_tsrcfund);

if (isset($_GET['totalRows_Re_tsrcfund'])) {
  $totalRows_Re_tsrcfund = $_GET['totalRows_Re_tsrcfund'];
} else {
  $all_Re_tsrcfund = mysqli_query($query_Re_tsrcfund);
  $totalRows_Re_tsrcfund = mysqli_num_rows($all_Re_tsrcfund);
}
$totalPages_Re_tsrcfund = ceil($totalRows_Re_tsrcfund/$maxRows_Re_tsrcfund)-1;

$queryString_Re_tsrcfund = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Re_tsrcfund") == false && 
        stristr($param, "totalRows_Re_tsrcfund") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Re_tsrcfund = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Re_tsrcfund = sprintf("&totalRows_Re_tsrcfund=%d%s", $totalRows_Re_tsrcfund, $queryString_Re_tsrcfund);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>List of Source of funding type - CIB Prototype</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.Style1 {
	color: #006600;
	font-size: 12px;
}
.Style2 {font-size: 24px}
.Style5 {color: #003366}
.Style15 {font-size: 12px}
.Style16 {font-size: 12px;
	color: #000066;
}
-->
</style>
</head>

<body>
<table width="963" border="1" cellpadding="2" cellspacing="2">
  <tr>
    <th width="126" scope="row"><div align="center"><span class="Style2"><a href="pickaform.php" title="Retour" class="Style7 Style6 "><span class="Style5"><span class="Style16">Back</span></span></a></span></div></th>
    <td width="571"><div align="center" class="Style2">List of Source of funding</div></td>
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
</p>

<table border="0" width="50%" align="center">
  <tr>
    <td width="23%" align="center">
      <?php if ($pageNum_Re_tsrcfund > 0) { // Show if not first page ?>
      <a href="<?php printf("%s?pageNum_Re_tsrcfund=%d%s", $currentPage, 0, $queryString_Re_tsrcfund); ?>"><img src="First.gif" border=0></a>
      <?php } // Show if not first page ?>
    </td>
    <td width="31%" align="center">
      <?php if ($pageNum_Re_tsrcfund > 0) { // Show if not first page ?>
      <a href="<?php printf("%s?pageNum_Re_tsrcfund=%d%s", $currentPage, max(0, $pageNum_Re_tsrcfund - 1), $queryString_Re_tsrcfund); ?>"><img src="Previous.gif" border=0></a>
      <?php } // Show if not first page ?>
    </td>
    <td width="23%" align="center">
      <?php if ($pageNum_Re_tsrcfund < $totalPages_Re_tsrcfund) { // Show if not last page ?>
      <a href="<?php printf("%s?pageNum_Re_tsrcfund=%d%s", $currentPage, min($totalPages_Re_tsrcfund, $pageNum_Re_tsrcfund + 1), $queryString_Re_tsrcfund); ?>"><img src="Next.gif" border=0></a>
      <?php } // Show if not last page ?>
    </td>
    <td width="23%" align="center">
      <?php if ($pageNum_Re_tsrcfund < $totalPages_Re_tsrcfund) { // Show if not last page ?>
      <a href="<?php printf("%s?pageNum_Re_tsrcfund=%d%s", $currentPage, $totalPages_Re_tsrcfund, $queryString_Re_tsrcfund); ?>"><img src="Last.gif" border=0></a>
      <?php } // Show if not last page ?>
    </td>
  </tr>
</table>
<div align="center">
  <table border="10">
    <tr>
      <td width="161">Code </td>
      <td width="500">Description</td>
      <td width="184">Status</td>
      <td width="500">Remarque</td>
    </tr>
    <?php do { ?>
    <tr>
      <td><?php echo $row_Re_tsrcfund['tsrcfund_id']; ?></td>
      <td><?php echo $row_Re_tsrcfund['tsrcfund_desc']; ?></td>
      <td><?php echo $row_Re_tsrcfund['tsrcfund_status']; ?></td>
      <td><?php echo $row_Re_tsrcfund['tsrcfund_remark']; ?></td>
    </tr>
    <?php } while ($row_Re_tsrcfund = mysqli_fetch_assoc($Re_tsrcfund)); ?>
  </table>
</div>
</body>
</html>
<?php
mysqli_free_result($Re_tsrcfund);
?>
