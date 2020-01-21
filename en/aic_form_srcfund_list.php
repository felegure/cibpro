<?php 
session_start();
require_once('../Connections/cibproto.php'); 
require_once('utilang_en.php');
?>
<?php
$currentPage = $_SERVER["PHP_SELF"];

$currentPage = $_SERVER["PHP_SELF"];

$query_Re_srcfund = "Select tsrcfund_desc, tsrcfund_status FROM $srcfund order by tsrcfund_desc";

mysqli_select_db($cibproto, $database_cibproto);
$pageNum_Re_srcfund = 0;
$maxRows_Re_srcfund = 1;
$startRow_Re_srcfund = $pageNum_Re_srcfund * $maxRows_Re_srcfund;

$query_limit_Re_srcfund = sprintf("%s LIMIT %d, %d", $query_Re_srcfund, $startRow_Re_srcfund, 1);
$Re_srcfund = mysqli_query($cibproto, $query_limit_Re_srcfund) or die(mysqli_error());
$row_Re_srcfund = mysqli_fetch_assoc($Re_srcfund);
$srcfund_desc=$row_Re_srcfund['tsrcfund_desc'];
//echo $row_Re_srcfund['tsrcfund_desc'];

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}
$maxRows_Re_srcfund = 200;
$pageNum_Re_srcfund = 0;
if (isset($_GET['pageNum_Re_srcfund'])) {
  $pageNum_Re_srcfund = $_GET['pageNum_Re_srcfund'];
}
$startRow_Re_srcfund = $pageNum_Re_srcfund * $maxRows_Re_srcfund;


$query_limit_Re_srcfund = sprintf("%s LIMIT %d, %d", $query_Re_srcfund, $startRow_Re_srcfund, $maxRows_Re_srcfund);
$Re_srcfund = mysqli_query($cibproto, $query_limit_Re_srcfund) or die(mysqli_error());
$row_Re_srcfund = mysqli_fetch_assoc($Re_srcfund);

if (isset($_GET['totalRows_Re_srcfund'])) {
  $totalRows_Re_srcfund = $_GET['totalRows_Re_srcfund'];

} else {
  $all_Re_srcfund = mysqli_query($cibproto, $query_Re_srcfund);
  $totalRows_Re_srcfund = mysqli_num_rows($all_Re_srcfund);

}
$totalPages_Re_srcfund = ceil($totalRows_Re_srcfund/$maxRows_Re_srcfund)-1;

$queryString_Re_srcfund = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Re_srcfund") == false && 
        stristr($param, "totalRows_Re_srcfund") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Re_product = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Re_srcfund = sprintf("&totalRows_Re_srcfund=%d%s", $totalRows_Re_srcfund, $queryString_Re_srcfund);

$queryString_Re_srcfund = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Re_srcfund") == false && 
        stristr($param, "totalRows_Re_srcfund") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Re_srcfund = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Re_srcfund = sprintf("&totalRows_Re_srcfund=%d%s", $totalRows_Re_srcfund, $queryString_Re_srcfund);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Source of funding</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.Style1 {font-size: 24px}
.Style6 {
	font-size: 12px;
	color: #009900;
}
.Style7 {
	font-size: 12px;
	color: #33FF00;
	font-weight: bold;
}
.Style13 {color: #003366}
.Style14 {
	color: #000066;
	font-size: 12px;
}
-->
</style>
</head>

<body>
<table width="963" border="1" cellpadding="2" cellspacing="2">
  <tr>
    <th width="126" scope="row"><div align="center"><span class="Style1"><a href="pickareport.php"Retour" class="Style7 Style6 "><span class="Style3"><span class="Style25"><font color="#000000">Back</font></span></span></a></span></div></th>
    <td width="571"><div align="center" class="Style7 Style49">
        <p><span class="Style84"> <span class="Style30"><font color="#000000"><font size="+2">Source 
          of funding</font></font></span> </span></p>
        <p><span class="Style84"> <font color="#000000"> <font color="#FFFFFF">:</font> 
          number of records :</font><font color="#FF0000"><span class="Style84"> 
          <?php 
           echo "$totalRows_Re_srcfund"; ?>
          </span></p>
        <p>&nbsp;</p>
        <span class="Style84">
        <div align="center" class="Style30"> </div>
        </span> </div></td>
    <td width="138"><div align="center" class="Style30">user:
            <?php
				echo "{$_SESSION['username']}";
	?>
    </div></td>
    <td width="92"><div align="center" class="Style30">Date : 
        <?php 
      $today = date (" D j, M,Y  H:i:s");
      echo " $today "; ?>
      </div></td>
  </tr>
</table>
<p><a href="pickareport.php" title="Retour" class="Style7 Style6 "><span class="Style13"></span></a>
<div align="center">
<table border="0" width="50%" align="center">
  <tr>
    <td width="23%" align="center">
      <?php if ($pageNum_Re_srcfund > 0) { // Show if not first page ?>
      <a href="<?php printf("%s?pageNum_Re_srcfund=%d%s", $currentPage, 0, $queryString_Re_srcfund); ?>"><img src="First.gif" border=0></a>
      <?php } // Show if not first page ?>
    </td>
    <td width="31%" align="center">
      <?php if ($pageNum_Re_srcfund > 0) { // Show if not first page ?>
      <a href="<?php printf("%s?pageNum_Re_srcfund=%d%s", $currentPage, max(0, $pageNum_Re_srcfund - 1), $queryString_Re_srcfund); ?>"><img src="Previous.gif" border=0></a>
      <?php } // Show if not first page ?>
    </td>
    <td width="23%" align="center">
      <?php if ($pageNum_Re_srcfund < $totalPages_Re_srcfund) { // Show if not last page ?>
      <a href="<?php printf("%s?pageNum_Re_srcfund=%d%s", $currentPage, min($totalPages_Re_srcfund, $pageNum_Re_srcfund + 1), $queryString_Re_srcfund); ?>"><img src="Next.gif" border=0></a>
      <?php } // Show if not last page ?>
    </td>
    <td width="23%" align="center">
      <?php if ($pageNum_Re_srcfund < $totalPages_Re_srcfund) { // Show if not last page ?>
      <a href="<?php printf("%s?pageNum_Re_srcfund=%d%s", $currentPage, $totalPages_Re_srcfund, $queryString_Re_srcfund); ?>"><img src="Last.gif" border=0></a>
      <?php } // Show if not last page ?>
    </td>
  </tr>
</table>
</p>
</div>
<div align="center">
  <table border="10">
    <!--DWLayoutTable-->
    <tr> 
      <td height="23"><div align="center">Source of funding</div></td>
      <td><div align="center">Status (2=inactive, 1=active) </div></td>
  
    </tr>
    <?php do { ?>
    <tr> 
      <td><div align="justify"><font color="#000000"><strong><?php echo $row_Re_srcfund['tsrcfund_desc']; ?></strong></font></div></td>
      <td><div align="center"><font color="#0000FF"><strong><?php echo $row_Re_srcfund['tsrcfund_status']; ?></strong></font></div></td>
    </tr>
    <?php } while ($row_Re_srcfund = mysqli_fetch_assoc($Re_srcfund)); ?>
  </table>
</div>
<p>&nbsp;</p>
<p align="center">&nbsp;</p>

<p>&nbsp;</p>
</body>
</html>
<?php
mysqli_free_result($Re_srcfund);
?>