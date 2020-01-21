<?php session_start(); 
require_once('../Connections/cibproto.php');

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_Re_tinco = 10;
$pageNum_Re_tinco = 0;
if (isset($_GET['pageNum_Re_tinco'])) {
  $pageNum_Re_tinco = $_GET['pageNum_Re_tinco'];
}
$startRow_Re_tinco = $pageNum_Re_tinco * $maxRows_Re_tinco;

mysqli_select_db($database_cibproto, $cibproto);
$query_Re_tinco = "SELECT * FROM tincoterm";
$query_limit_Re_tinco = sprintf("%s LIMIT %d, %d", $query_Re_tinco, $startRow_Re_tinco, $maxRows_Re_tinco);
$Re_tinco = mysqli_query($query_limit_Re_tinco, $cibproto) or die(mysqli_error());
$row_Re_tinco = mysqli_fetch_assoc($Re_tinco);

if (isset($_GET['totalRows_Re_tinco'])) {
  $totalRows_Re_tinco = $_GET['totalRows_Re_tinco'];
} else {
  $all_Re_tinco = mysqli_query($query_Re_tinco);
  $totalRows_Re_tinco = mysqli_num_rows($all_Re_tinco);
}
$totalPages_Re_tinco = ceil($totalRows_Re_tinco/$maxRows_Re_tinco)-1;

$queryString_Re_tinco = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Re_tinco") == false && 
        stristr($param, "totalRows_Re_tinco") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Re_tinco = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Re_tinco = sprintf("&totalRows_Re_tinco=%d%s", $totalRows_Re_tinco, $queryString_Re_tinco);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>List of Inco Terms - CIB Prototype</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.Style1 {font-size: 24px}
.Style3 {color: #0000FF}
.Style4 {
	color: #003366;
	font-size: 12px;
}
.Style15 {font-size: 12px}
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
    <th width="126" scope="row"><div align="center"><span class="Style1"><a href="pickaform.php" title="Retour" class="Style7 Style6 "><span class="Style17"><span class="Style16">Back</span></span></a></span></div></th>
    <td width="571"><div align="center" class="Style1">List of Inco Terms </div></td>
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
      <?php if ($pageNum_Re_tinco > 0) { // Show if not first page ?>
      <a href="<?php printf("%s?pageNum_Re_tinco=%d%s", $currentPage, 0, $queryString_Re_tinco); ?>"><img src="First.gif" border=0></a>
      <?php } // Show if not first page ?>
    </td>
    <td width="31%" align="center">
      <?php if ($pageNum_Re_tinco > 0) { // Show if not first page ?>
      <a href="<?php printf("%s?pageNum_Re_tinco=%d%s", $currentPage, max(0, $pageNum_Re_tinco - 1), $queryString_Re_tinco); ?>"><img src="Previous.gif" border=0></a>
      <?php } // Show if not first page ?>
    </td>
    <td width="23%" align="center">
      <?php if ($pageNum_Re_tinco < $totalPages_Re_tinco) { // Show if not last page ?>
      <a href="<?php printf("%s?pageNum_Re_tinco=%d%s", $currentPage, min($totalPages_Re_tinco, $pageNum_Re_tinco + 1), $queryString_Re_tinco); ?>"><img src="Next.gif" border=0></a>
      <?php } // Show if not last page ?>
    </td>
    <td width="23%" align="center">
      <?php if ($pageNum_Re_tinco < $totalPages_Re_tinco) { // Show if not last page ?>
      <a href="<?php printf("%s?pageNum_Re_tinco=%d%s", $currentPage, $totalPages_Re_tinco, $queryString_Re_tinco); ?>"><img src="Last.gif" border=0></a>
      <?php } // Show if not last page ?>
    </td>
  </tr>
</table>
</p>
<div align="center">
  <table border="10">
    <tr>
      <td width="161">Inco term code </td>
      <td width="500">Description</td>
      <td width="184">Status</td>
      <td width="500">Remark</td>
    </tr>
    <?php do { ?>
    <tr>
      <td><?php echo $row_Re_tinco['tinco_id']; ?></td>
      <td><?php echo $row_Re_tinco['tinco_desc']; ?></td>
      <td><?php echo $row_Re_tinco['tinco_status']; ?></td>
      <td><?php echo $row_Re_tinco['tinco_remark']; ?></td>
    </tr>
    <?php } while ($row_Re_tinco = mysqli_fetch_assoc($Re_tinco)); ?>
  </table>
</div>
</body>
</html>
<?php
mysqli_free_result($Re_tinco);
?>
