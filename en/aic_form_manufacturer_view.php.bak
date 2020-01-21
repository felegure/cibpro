<?php session_start(); 
require_once('../Connections/cibproto.php');
$currentPage = $_SERVER["PHP_SELF"];

$maxRows_Re_manufacturer = 10;
$pageNum_Re_manufacturer = 0;
if (isset($_GET['pageNum_Re_manufacturer'])) {
  $pageNum_Re_manufacturer = $_GET['pageNum_Re_manufacturer'];
}
$startRow_Re_manufacturer = $pageNum_Re_manufacturer * $maxRows_Re_manufacturer;

mysqli_select_db($database_cibproto, $cibproto);
$query_Re_manufacturer = "SELECT * FROM tmanufacturer";
$query_limit_Re_manufacturer = sprintf("%s LIMIT %d, %d", $query_Re_manufacturer, $startRow_Re_manufacturer, $maxRows_Re_manufacturer);
$Re_manufacturer = mysqli_query($query_limit_Re_manufacturer, $cibproto) or die(mysqli_error());
$row_Re_manufacturer = mysqli_fetch_assoc($Re_manufacturer);

if (isset($_GET['totalRows_Re_manufacturer'])) {
  $totalRows_Re_manufacturer = $_GET['totalRows_Re_manufacturer'];
} else {
  $all_Re_manufacturer = mysqli_query($query_Re_manufacturer);
  $totalRows_Re_manufacturer = mysqli_num_rows($all_Re_manufacturer);
}
$totalPages_Re_manufacturer = ceil($totalRows_Re_manufacturer/$maxRows_Re_manufacturer)-1;

$queryString_Re_manufacturer = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Re_manufacturer") == false && 
        stristr($param, "totalRows_Re_manufacturer") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Re_manufacturer = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Re_manufacturer = sprintf("&totalRows_Re_manufacturer=%d%s", $totalRows_Re_manufacturer, $queryString_Re_manufacturer);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>List of Manufacturers - CIB PROTOTYPE</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.Style1 {font-size: 24px}
.Style2 {
	font-size: 12px;
	color: #0000FF;
}
.Style3 {color: #003366}
.Style16 {font-size: 12px;
	color: #000066;
}
.Style17 {font-size: 12px}
-->
</style>
</head>

<body>
<table width="963" border="1" cellpadding="2" cellspacing="2">
  <tr>
    <th width="126" scope="row"><div align="center"><span class="Style1"><a href="pickaform.php" title="Retour" class="Style7 Style6 "><span class="Style3"><span class="Style16">Back</span></span></a></span></div></th>
    <td width="571"><div align="center" class="Style1">List of Manufacturers</div></td>
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
<p align="center" class="Style1">
<p>
<table border="0" width="50%" align="center">
  <tr>
    <td width="23%" align="center">
      <?php if ($pageNum_Re_manufacturer > 0) { // Show if not first page ?>
      <a href="<?php printf("%s?pageNum_Re_manufacturer=%d%s", $currentPage, 0, $queryString_Re_manufacturer); ?>"><img src="First.gif" border=0></a>
      <?php } // Show if not first page ?>
    </td>
    <td width="31%" align="center">
      <?php if ($pageNum_Re_manufacturer > 0) { // Show if not first page ?>
      <a href="<?php printf("%s?pageNum_Re_manufacturer=%d%s", $currentPage, max(0, $pageNum_Re_manufacturer - 1), $queryString_Re_manufacturer); ?>"><img src="Previous.gif" border=0></a>
      <?php } // Show if not first page ?>
    </td>
    <td width="23%" align="center">
      <?php if ($pageNum_Re_manufacturer < $totalPages_Re_manufacturer) { // Show if not last page ?>
      <a href="<?php printf("%s?pageNum_Re_manufacturer=%d%s", $currentPage, min($totalPages_Re_manufacturer, $pageNum_Re_manufacturer + 1), $queryString_Re_manufacturer); ?>"><img src="Next.gif" border=0></a>
      <?php } // Show if not last page ?>
    </td>
    <td width="23%" align="center">
      <?php if ($pageNum_Re_manufacturer < $totalPages_Re_manufacturer) { // Show if not last page ?>
      <a href="<?php printf("%s?pageNum_Re_manufacturer=%d%s", $currentPage, $totalPages_Re_manufacturer, $queryString_Re_manufacturer); ?>"><img src="Last.gif" border=0></a>
      <?php } // Show if not last page ?>
    </td>
  </tr>
</table>
</p>
<table border="1">
  <tr>
    <td>Code fabricant </td>
    <td>Pays</td>
    <td>Description</td>
    <td>Adresse</td>
    <td>Code postal </td>
    <td>Fax</td>
    <td>Telephone1</td>
    <td>Telephone 2 </td>
    <td>Adresse email</td>
    <td>Site Web </td>
    <td>Contact</td>
    <td>Remarque</td>
    <td>Status (0=inactif, 1=actif) </td>
  </tr>
  <?php do { ?>
  <tr>
    <td><?php echo $row_Re_manufacturer['tmanu_id']; ?></td>
    <td><?php echo $row_Re_manufacturer['tmanu_coun_id']; ?></td>
    <td><?php echo $row_Re_manufacturer['tmanu_desc']; ?></td>
    <td><?php echo $row_Re_manufacturer['tmanu_adr']; ?></td>
    <td><?php echo $row_Re_manufacturer['tmanu_postal']; ?></td>
    <td><?php echo $row_Re_manufacturer['tmanu_fax']; ?></td>
    <td><?php echo $row_Re_manufacturer['tmanu_tel1']; ?></td>
    <td><?php echo $row_Re_manufacturer['tmanu_tel2']; ?></td>
    <td><?php echo $row_Re_manufacturer['tmanu_email']; ?></td>
    <td><?php echo $row_Re_manufacturer['tmanu_website']; ?></td>
    <td><?php echo $row_Re_manufacturer['tmanu_cont']; ?></td>
    <td><?php echo $row_Re_manufacturer['tmanu_remark']; ?></td>
    <td><?php echo $row_Re_manufacturer['tmanu_status']; ?></td>
  </tr>
  <?php } while ($row_Re_manufacturer = mysqli_fetch_assoc($Re_manufacturer)); ?>
</table>
<p align="center">&nbsp;</p>
</body>
</html>
<?php
mysqli_free_result($Re_manufacturer);
?>
