<?php session_start(); ?>
<?php require_once('../Connections/cibproto.php'); ?>
<?php
$currentPage = $_SERVER["PHP_SELF"];
require_once "utilang.php";
$maxRows_Re_category = 10;
$pageNum_Re_category = 0;
if (isset($_GET['pageNum_Re_category'])) {
  $pageNum_Re_category = $_GET['pageNum_Re_category'];
}
$startRow_Re_category = $pageNum_Re_category * $maxRows_Re_category;

mysqli_select_db($database_cibproto, $cibproto);
$query_Re_category = "SELECT * FROM tcategory";
$query_limit_Re_category = sprintf("%s LIMIT %d, %d", $query_Re_category, $startRow_Re_category, $maxRows_Re_category);
$Re_category = mysqli_query($query_limit_Re_category, $cibproto) or die(mysqli_error());
$row_Re_category = mysqli_fetch_assoc($Re_category);

if (isset($_GET['totalRows_Re_category'])) {
  $totalRows_Re_category = $_GET['totalRows_Re_category'];
} else {
  $all_Re_category = mysqli_query($query_Re_category);
  $totalRows_Re_category = mysqli_num_rows($all_Re_category);
}
$totalPages_Re_category = ceil($totalRows_Re_category/$maxRows_Re_category)-1;

$queryString_Re_category = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Re_category") == false && 
        stristr($param, "totalRows_Re_category") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Re_category = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Re_category = sprintf("&totalRows_Re_category=%d%s", $totalRows_Re_category, $queryString_Re_category);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>List of Categories - CIB Prototype</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.Style2 {font-size: 24px}
.Style3 {
	font-size: 12px;
	color: #336600;
	font-weight: bold;
}
.Style4 {color: #003366}
.Style14 {	color: #000066;
	font-size: 12px;
}
.Style17 {font-size: 12px}
-->
</style>
</head>

<body>

<table width="963" border="1" cellpadding="2" cellspacing="2">
  <tr>
    <th width="126" scope="row"><div align="center"><span class="Style2"><a href="pickaform.php" title="Retour" class="Style7 Style6 "><span class="Style4"><span class="Style14">Back</span></span></a></span></div></th>
    <td width="571"><div align="center" class="Style2">List of  Categories</div></td>
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
<div align="center">
  <div align="center">
    <table border="0" width="50%" align="center"><table border="0" width="50%" align="center"><tr><td width="23%" align="center">&nbsp;</td>
          <td width="31%" align="center">&nbsp;</td>
          <td width="23%" align="center">&nbsp;</td>
          <td width="23%" align="center">&nbsp;</td>
        </tr>
    </table>
    </table>
    
    <table border="0" width="50%" align="center">
      <tr>
        <td width="23%" align="center">
          <?php if ($pageNum_Re_category > 0) { // Show if not first page ?>
          <a href="<?php printf("%s?pageNum_Re_category=%d%s", $currentPage, 0, $queryString_Re_category); ?>"><img src="First.gif" border=0></a>
          <?php } // Show if not first page ?>
        </td>
        <td width="31%" align="center">
          <?php if ($pageNum_Re_category > 0) { // Show if not first page ?>
          <a href="<?php printf("%s?pageNum_Re_category=%d%s", $currentPage, max(0, $pageNum_Re_category - 1), $queryString_Re_category); ?>"><img src="Previous.gif" border=0></a>
          <?php } // Show if not first page ?>
        </td>
        <td width="23%" align="center">
          <?php if ($pageNum_Re_category < $totalPages_Re_category) { // Show if not last page ?>
          <a href="<?php printf("%s?pageNum_Re_category=%d%s", $currentPage, min($totalPages_Re_category, $pageNum_Re_category + 1), $queryString_Re_category); ?>"><img src="Next.gif" border=0></a>
          <?php } // Show if not last page ?>
        </td>
        <td width="23%" align="center">
          <?php if ($pageNum_Re_category < $totalPages_Re_category) { // Show if not last page ?>
          <a href="<?php printf("%s?pageNum_Re_category=%d%s", $currentPage, $totalPages_Re_category, $queryString_Re_category); ?>"><img src="Last.gif" border=0></a>
          <?php } // Show if not last page ?>
        </td>
      </tr>
    </table>
    </p>
  </div>
</div>
<div align="center">
  <table border="10">
    <tr>
      <td>Category ID</td>
      <td>Description</td>
      <td>Status</td>
      <td>Remark</td>
    </tr>
    <?php do { ?>
    <tr>
      <td><?php echo $row_Re_category['tcateg_id']; ?></td>
      <td><?php echo $row_Re_category['tcateg_desc']; ?></td>
      <td><?php echo $row_Re_category['tcateg_status']; ?></td>
      <td><?php echo $row_Re_category['tcateg_remark']; ?></td>
    </tr>
    <?php } while ($row_Re_category = mysqli_fetch_assoc($Re_category)); ?>
  </table>
</div>
</body>
</html>
<?php
mysqli_free_result($Re_category);
?>
