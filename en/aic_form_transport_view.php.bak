<?php session_start(); 
require_once('../Connections/cibproto.php');
$currentPage = $_SERVER["PHP_SELF"];

$maxRows_Re_transport = 10;
$pageNum_Re_transport = 0;
if (isset($_GET['pageNum_Re_transport'])) {
  $pageNum_Re_transport = $_GET['pageNum_Re_transport'];
}
$startRow_Re_transport = $pageNum_Re_transport * $maxRows_Re_transport;

mysqli_select_db($database_cibproto, $cibproto);
$query_Re_transport = "SELECT * FROM ttransport";
$query_limit_Re_transport = sprintf("%s LIMIT %d, %d", $query_Re_transport, $startRow_Re_transport, $maxRows_Re_transport);
$Re_transport = mysqli_query($query_limit_Re_transport, $cibproto) or die(mysqli_error());
$row_Re_transport = mysqli_fetch_assoc($Re_transport);

if (isset($_GET['totalRows_Re_transport'])) {
  $totalRows_Re_transport = $_GET['totalRows_Re_transport'];
} else {
  $all_Re_transport = mysqli_query($query_Re_transport);
  $totalRows_Re_transport = mysqli_num_rows($all_Re_transport);
}
$totalPages_Re_transport = ceil($totalRows_Re_transport/$maxRows_Re_transport)-1;

$queryString_Re_transport = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Re_transport") == false && 
        stristr($param, "totalRows_Re_transport") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Re_transport = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Re_transport = sprintf("&totalRows_Re_transport=%d%s", $totalRows_Re_transport, $queryString_Re_transport);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>List of Transport type - CIB Prototype</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.Style1 {
	font-size: 12px;
	color: #0000FF;
}
.Style2 {font-size: 24px}
.Style3 {color: #003366}
.Style17 {font-size: 12px}
.Style16 {font-size: 12px;
	color: #000066;
}
-->
</style>
</head>

<body>
<table width="963" border="1" cellpadding="2" cellspacing="2">
  <tr>
    <th width="126" scope="row"><div align="center"><span class="Style2"><a href="pickaform.php" title="Retour" class="Style7 Style6 "><span class="Style3"><span class="Style16">Back</span></span></a></span></div></th>
    <td width="571"><div align="center" class="Style2">List of Transport type</div></td>
    <td width="138"><div align="center" class="Style17">username:
            <?php
				echo "{$_SESSION['username']}";
	?>
    </div></td>
    <td width="92"><div align="center" class="Style17">Date :
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
      <?php if ($pageNum_Re_transport > 0) { // Show if not first page ?>
      <a href="<?php printf("%s?pageNum_Re_transport=%d%s", $currentPage, 0, $queryString_Re_transport); ?>"><img src="First.gif" border=0></a>
      <?php } // Show if not first page ?>
    </td>
    <td width="31%" align="center">
      <?php if ($pageNum_Re_transport > 0) { // Show if not first page ?>
      <a href="<?php printf("%s?pageNum_Re_transport=%d%s", $currentPage, max(0, $pageNum_Re_transport - 1), $queryString_Re_transport); ?>"><img src="Previous.gif" border=0></a>
      <?php } // Show if not first page ?>
    </td>
    <td width="23%" align="center">
      <?php if ($pageNum_Re_transport < $totalPages_Re_transport) { // Show if not last page ?>
      <a href="<?php printf("%s?pageNum_Re_transport=%d%s", $currentPage, min($totalPages_Re_transport, $pageNum_Re_transport + 1), $queryString_Re_transport); ?>"><img src="Next.gif" border=0></a>
      <?php } // Show if not last page ?>
    </td>
    <td width="23%" align="center">
      <?php if ($pageNum_Re_transport < $totalPages_Re_transport) { // Show if not last page ?>
      <a href="<?php printf("%s?pageNum_Re_transport=%d%s", $currentPage, $totalPages_Re_transport, $queryString_Re_transport); ?>"><img src="Last.gif" border=0></a>
      <?php } // Show if not last page ?>
    </td>
  </tr>
</table>
</p>
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
      <td><?php echo $row_Re_transport['ttransport_id']; ?></td>
      <td><?php echo $row_Re_transport['ttransport_desc']; ?></td>
      <td><?php echo $row_Re_transport['ttransport_status']; ?></td>
      <td><?php echo $row_Re_transport['ttransport_remark']; ?></td>
    </tr>
    <?php } while ($row_Re_transport = mysqli_fetch_assoc($Re_transport)); ?>
  </table>
</div>
</body>
</html>
<?php
mysqli_free_result($Re_transport);
?>
