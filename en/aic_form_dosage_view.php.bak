<?php session_start(); 
require_once('../Connections/cibproto.php');

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_Re_dosage = 10;
$pageNum_Re_dosage = 0;
if (isset($_GET['pageNum_Re_dosage'])) {
  $pageNum_Re_dosage = $_GET['pageNum_Re_dosage'];
}
$startRow_Re_dosage = $pageNum_Re_dosage * $maxRows_Re_dosage;

mysqli_select_db($database_cibproto, $cibproto);
$query_Re_dosage = "SELECT * FROM tdosage";
$query_limit_Re_dosage = sprintf("%s LIMIT %d, %d", $query_Re_dosage, $startRow_Re_dosage, $maxRows_Re_dosage);
$Re_dosage = mysqli_query($query_limit_Re_dosage, $cibproto) or die(mysqli_error());
$row_Re_dosage = mysqli_fetch_assoc($Re_dosage);

if (isset($_GET['totalRows_Re_dosage'])) {
  $totalRows_Re_dosage = $_GET['totalRows_Re_dosage'];
} else {
  $all_Re_dosage = mysqli_query($query_Re_dosage);
  $totalRows_Re_dosage = mysqli_num_rows($all_Re_dosage);
}
$totalPages_Re_dosage = ceil($totalRows_Re_dosage/$maxRows_Re_dosage)-1;

$queryString_Re_dosage = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Re_dosage") == false && 
        stristr($param, "totalRows_Re_dosage") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Re_dosage = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Re_dosage = sprintf("&totalRows_Re_dosage=%d%s", $totalRows_Re_dosage, $queryString_Re_dosage);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>List of Dosage Form de dosage - CIB Prototype</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.Style1 {font-size: 12px}
.Style2 {
	font-size: 12px;
	color: #006600;
}
.Style3 {font-size: 24px}
.Style6 {color: #003366}
.Style14 {color: #000066;
	font-size: 12px;
}
-->
</style>
</head>

<body>
<div align="center">
  <table width="963" border="1" cellpadding="2" cellspacing="2">
    <tr>
      <th width="126" scope="row"><div align="center"><span class="Style3"><a href="pickaform.php" title="Retour" class="Style7 Style6 "><span class="Style6"><span class="Style14">Back</span></span></a></span></div></th>
      <td width="571"><div align="center" class="Style3">List of Dosage form</div></td>
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
  <p>&nbsp;</p>
</div>
<table border="0" width="50%" align="center">
  <tr>
    <td width="23%" align="center">
      <?php if ($pageNum_Re_dosage > 0) { // Show if not first page ?>
      <a href="<?php printf("%s?pageNum_Re_dosage=%d%s", $currentPage, 0, $queryString_Re_dosage); ?>"><img src="First.gif" border=0></a>
      <?php } // Show if not first page ?>
    </td>
    <td width="31%" align="center">
      <?php if ($pageNum_Re_dosage > 0) { // Show if not first page ?>
      <a href="<?php printf("%s?pageNum_Re_dosage=%d%s", $currentPage, max(0, $pageNum_Re_dosage - 1), $queryString_Re_dosage); ?>"><img src="Previous.gif" border=0></a>
      <?php } // Show if not first page ?>
    </td>
    <td width="23%" align="center">
      <?php if ($pageNum_Re_dosage < $totalPages_Re_dosage) { // Show if not last page ?>
      <a href="<?php printf("%s?pageNum_Re_dosage=%d%s", $currentPage, min($totalPages_Re_dosage, $pageNum_Re_dosage + 1), $queryString_Re_dosage); ?>"><img src="Next.gif" border=0></a>
      <?php } // Show if not last page ?>
    </td>
    <td width="23%" align="center">
      <?php if ($pageNum_Re_dosage < $totalPages_Re_dosage) { // Show if not last page ?>
      <a href="<?php printf("%s?pageNum_Re_dosage=%d%s", $currentPage, $totalPages_Re_dosage, $queryString_Re_dosage); ?>"><img src="Last.gif" border=0></a>
      <?php } // Show if not last page ?>
    </td>
  </tr>
</table>
</p>
<div align="center">
  <table width="710" height="79" border="10">
    <tr>
      <td width="153"><div align="center">Dosage ID </div></td>
      <td width="500"><div align="center">Description</div></td>
      <td width="50"><div align="center">Status</div></td>
      <td width="500"><div align="center">Remark</div></td>
    </tr>
    <?php do { ?>
    <tr>
      <td><?php echo $row_Re_dosage['tdosage_id']; ?></td>
      <td><?php echo $row_Re_dosage['tdosage_desc']; ?></td>
      <td><?php echo $row_Re_dosage['tdosage_status']; ?></td>
      <td><?php echo $row_Re_dosage['tdosage_remark']; ?></td>
    </tr>
    <?php } while ($row_Re_dosage = mysqli_fetch_assoc($Re_dosage)); ?>
  </table>
</div>
</body>
</html>
<?php
mysqli_free_result($Re_dosage);
?>
