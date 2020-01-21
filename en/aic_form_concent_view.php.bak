<?php session_start(); 
require_once('../Connections/cibproto.php');

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_Re_concent = 10;
$pageNum_Re_concent = 0;
if (isset($_GET['pageNum_Re_concent'])) {
  $pageNum_Re_concent = $_GET['pageNum_Re_concent'];
}
$startRow_Re_concent = $pageNum_Re_concent * $maxRows_Re_concent;

mysqli_select_db($database_cibproto, $cibproto);
$query_Re_concent = "SELECT * FROM tconcentration";
$query_limit_Re_concent = sprintf("%s LIMIT %d, %d", $query_Re_concent, $startRow_Re_concent, $maxRows_Re_concent);
$Re_concent = mysqli_query($query_limit_Re_concent, $cibproto) or die(mysqli_error());
$row_Re_concent = mysqli_fetch_assoc($Re_concent);

if (isset($_GET['totalRows_Re_concent'])) {
  $totalRows_Re_concent = $_GET['totalRows_Re_concent'];
} else {
  $all_Re_concent = mysqli_query($query_Re_concent);
  $totalRows_Re_concent = mysqli_num_rows($all_Re_concent);
}
$totalPages_Re_concent = ceil($totalRows_Re_concent/$maxRows_Re_concent)-1;

$queryString_Re_concent = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Re_concent") == false && 
        stristr($param, "totalRows_Re_concent") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Re_concent = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Re_concent = sprintf("&totalRows_Re_concent=%d%s", $totalRows_Re_concent, $queryString_Re_concent);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>List of  Concentration type - CIB Prototype</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.Style2 {
	font-size: 12px;
	color: #006600;
}
.Style3 {font-size: 24px}
.Style4 {color: #003366}
.Style14 {	color: #000066;
	font-size: 12px;
}
.Style17 {font-size: 12px}
-->
</style>
</head>

<body>
<table width="963" border="1" cellspacing="2" cellpadding="2">
  <tr>
    <th width="126" scope="row"><div align="center"><span class="Style3"><a href="pickaform.php" title="Retour" class="Style7 Style6 "><span class="Style4"><span class="Style14">Back</span></span></a></span></div></th>
    <td width="571"><div align="center" class="Style3">List of Concentration type</div></td>
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
      <?php if ($pageNum_Re_concent > 0) { // Show if not first page ?>
      <a href="<?php printf("%s?pageNum_Re_concent=%d%s", $currentPage, 0, $queryString_Re_concent); ?>"><img src="First.gif" border=0></a>
      <?php } // Show if not first page ?>
    </td>
    <td width="31%" align="center">
      <?php if ($pageNum_Re_concent > 0) { // Show if not first page ?>
      <a href="<?php printf("%s?pageNum_Re_concent=%d%s", $currentPage, max(0, $pageNum_Re_concent - 1), $queryString_Re_concent); ?>"><img src="Previous.gif" border=0></a>
      <?php } // Show if not first page ?>
    </td>
    <td width="23%" align="center">
      <?php if ($pageNum_Re_concent < $totalPages_Re_concent) { // Show if not last page ?>
      <a href="<?php printf("%s?pageNum_Re_concent=%d%s", $currentPage, min($totalPages_Re_concent, $pageNum_Re_concent + 1), $queryString_Re_concent); ?>"><img src="Next.gif" border=0></a>
      <?php } // Show if not last page ?>
    </td>
    <td width="23%" align="center">
      <?php if ($pageNum_Re_concent < $totalPages_Re_concent) { // Show if not last page ?>
      <a href="<?php printf("%s?pageNum_Re_concent=%d%s", $currentPage, $totalPages_Re_concent, $queryString_Re_concent); ?>"><img src="Last.gif" border=0></a>
      <?php } // Show if not last page ?>
    </td>
  </tr>
</table>
</p>
<div align="center">
  <table border="10">
    <tr>
      <td width="161">Concentration ID </td>
      <td width="500">Description</td>
      <td width="184">Status</td>
      <td width="500">Remarque</td>
    </tr>
    <?php do { ?>
    <tr>
      <td><?php echo $row_Re_concent['tconcent_id']; ?></td>
      <td><?php echo $row_Re_concent['tconcent_desc']; ?></td>
      <td><?php echo $row_Re_concent['tconcent_status']; ?></td>
      <td><?php echo $row_Re_concent['tconcent_remark']; ?></td>
    </tr>
    <?php } while ($row_Re_concent = mysqli_fetch_assoc($Re_concent)); ?>
  </table>
</div>
</body>
</html>
<?php
mysqli_free_result($Re_concent);
?>
