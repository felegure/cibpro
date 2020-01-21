<?php session_start(); 
require_once('../Connections/cibproto.php');
$currentPage = $_SERVER["PHP_SELF"];

$maxRows_Re_country = 10;
$pageNum_Re_country = 0;
if (isset($_GET['pageNum_Re_country'])) {
  $pageNum_Re_country = $_GET['pageNum_Re_country'];
}
$startRow_Re_country = $pageNum_Re_country * $maxRows_Re_country;

mysqli_select_db($database_cibproto, $cibproto);
$query_Re_country = "SELECT * FROM tcountry";
$query_limit_Re_country = sprintf("%s LIMIT %d, %d", $query_Re_country, $startRow_Re_country, $maxRows_Re_country);
$Re_country = mysqli_query($query_limit_Re_country, $cibproto) or die(mysqli_error());
$row_Re_country = mysqli_fetch_assoc($Re_country);

if (isset($_GET['totalRows_Re_country'])) {
  $totalRows_Re_country = $_GET['totalRows_Re_country'];
} else {
  $all_Re_country = mysqli_query($query_Re_country);
  $totalRows_Re_country = mysqli_num_rows($all_Re_country);
}
$totalPages_Re_country = ceil($totalRows_Re_country/$maxRows_Re_country)-1;

$queryString_Re_country = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Re_country") == false && 
        stristr($param, "totalRows_Re_country") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Re_country = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Re_country = sprintf("&totalRows_Re_country=%d%s", $totalRows_Re_country, $queryString_Re_country);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>List of Coutries - CIB Prototype</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.Style1 {font-size: 24px}
.Style2 {
	font-size: 12px;
	color: #000066;
}
.Style17 {font-size: 12px}
.Style3 {color: #003366}
-->
</style>
</head>

<body>
<div align="center">
  <table width="963" border="1" cellpadding="2" cellspacing="2">
    <tr>
      <th width="126" scope="row"><div align="center"><span class="Style1"><a href="pickaform.php" title="Retour" class="Style7 Style6 "><span class="Style3"><span class="Style2">Back</span></span></a></span></div></th>
      <td width="571"><div align="center" class="Style1">List of Countries</div></td>
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
  <p>&nbsp;</p>
</div>


<table border="0" width="50%" align="center">
  <tr>
    <td width="23%" align="center">
      <?php if ($pageNum_Re_country > 0) { // Show if not first page ?>
      <a href="<?php printf("%s?pageNum_Re_country=%d%s", $currentPage, 0, $queryString_Re_country); ?>"><img src="First.gif" border=0></a>
      <?php } // Show if not first page ?>
    </td>
    <td width="31%" align="center">
      <?php if ($pageNum_Re_country > 0) { // Show if not first page ?>
      <a href="<?php printf("%s?pageNum_Re_country=%d%s", $currentPage, max(0, $pageNum_Re_country - 1), $queryString_Re_country); ?>"><img src="Previous.gif" border=0></a>
      <?php } // Show if not first page ?>
    </td>
    <td width="23%" align="center">
      <?php if ($pageNum_Re_country < $totalPages_Re_country) { // Show if not last page ?>
      <a href="<?php printf("%s?pageNum_Re_country=%d%s", $currentPage, min($totalPages_Re_country, $pageNum_Re_country + 1), $queryString_Re_country); ?>"><img src="Next.gif" border=0></a>
      <?php } // Show if not last page ?>
    </td>
    <td width="23%" align="center">
      <?php if ($pageNum_Re_country < $totalPages_Re_country) { // Show if not last page ?>
      <a href="<?php printf("%s?pageNum_Re_country=%d%s", $currentPage, $totalPages_Re_country, $queryString_Re_country); ?>"><img src="Last.gif" border=0></a>
      <?php } // Show if not last page ?>
    </td>
  </tr>
</table>
<p>&nbsp;</p>
<div align="center">
  <table width="710" height="79" border="10">
    <tr>
      <td width="153"><div align="center">Code </div></td>
      <td width="500"><div align="center">Description</div></td>
      <td width="50"><div align="center">Status</div></td>
      <td width="500"><div align="center">Remarque</div></td>
    </tr>
    <?php do { ?>
    <tr>
      <td><?php echo $row_Re_country['tcountry_id']; ?></td>
      <td><?php echo $row_Re_country['tcountry_desc']; ?></td>
      <td><?php echo $row_Re_country['tcountry_status']; ?></td>
      <td><?php echo $row_Re_country['tcountry_remark']; ?></td>
    </tr>
    <?php } while ($row_Re_country = mysqli_fetch_assoc($Re_country)); ?>
  </table>
</div>
</body>
</html>
<?php
mysqli_free_result($Re_country);
?>
