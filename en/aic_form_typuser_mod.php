<?php require_once('../Connections/cibproto.php'); ?>
<?php
$currentPage = $_SERVER["PHP_SELF"];

function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE ttypuser SET ttypuser_desc=%s, ttypuser_status=%s, ttypuser_author=%s, ttypuser_dmod=%s WHERE ttypuser_id=%s",
                       GetSQLValueString($_POST['ttypuser_desc'], "text"),
                       GetSQLValueString($_POST['ttypuser_status'], "text"),
                       GetSQLValueString($_POST['ttypuser_author'], "text"),
                       GetSQLValueString($_POST['ttypuser_dmod'], "date"),
                       GetSQLValueString($_POST['ttypuser_id'], "text"));

  mysqli_select_db($database_cibproto, $cibproto);
  $Result1 = mysqli_query($updateSQL, $cibproto) or die(mysqli_error());
}

$maxRows_Re_typuser = 1;
$pageNum_Re_typuser = 0;
if (isset($_GET['pageNum_Re_typuser'])) {
  $pageNum_Re_typuser = $_GET['pageNum_Re_typuser'];
}
$startRow_Re_typuser = $pageNum_Re_typuser * $maxRows_Re_typuser;

mysqli_select_db($database_cibproto, $cibproto);
$query_Re_typuser = "SELECT * FROM ttypuser";
$query_limit_Re_typuser = sprintf("%s LIMIT %d, %d", $query_Re_typuser, $startRow_Re_typuser, $maxRows_Re_typuser);
$Re_typuser = mysqli_query($query_limit_Re_typuser, $cibproto) or die(mysqli_error());
$row_Re_typuser = mysqli_fetch_assoc($Re_typuser);

if (isset($_GET['totalRows_Re_typuser'])) {
  $totalRows_Re_typuser = $_GET['totalRows_Re_typuser'];
} else {
  $all_Re_typuser = mysqli_query($query_Re_typuser);
  $totalRows_Re_typuser = mysqli_num_rows($all_Re_typuser);
}
$totalPages_Re_typuser = ceil($totalRows_Re_typuser/$maxRows_Re_typuser)-1;

$queryString_Re_typuser = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Re_typuser") == false && 
        stristr($param, "totalRows_Re_typuser") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Re_typuser = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Re_typuser = sprintf("&totalRows_Re_typuser=%d%s", $totalRows_Re_typuser, $queryString_Re_typuser);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>aic_form_typuser_mod.php</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.Style1 {
	color: #0000FF;
	font-size: 18px;
	font-weight: bold;
}
-->
</style>
</head>

<body>
<form method="post" name="form1" action="<?php echo $editFormAction; ?>">
  <p><a href="pickauser.php" title="Back">Back</a></p>
  <p align="center" class="Style1">TYPE OF USER MODIFICATION </p>
  <p align="center" class="Style1">
  <table border="0" width="50%" align="center">
    <tr>
      <td width="23%" align="center">
        <?php if ($pageNum_Re_typuser > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_Re_typuser=%d%s", $currentPage, 0, $queryString_Re_typuser); ?>"><img src="First.gif" border=0></a>
        <?php } // Show if not first page ?>
      </td>
      <td width="31%" align="center">
        <?php if ($pageNum_Re_typuser > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_Re_typuser=%d%s", $currentPage, max(0, $pageNum_Re_typuser - 1), $queryString_Re_typuser); ?>"><img src="Previous.gif" border=0></a>
        <?php } // Show if not first page ?>
      </td>
      <td width="23%" align="center">
        <?php if ($pageNum_Re_typuser < $totalPages_Re_typuser) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_Re_typuser=%d%s", $currentPage, min($totalPages_Re_typuser, $pageNum_Re_typuser + 1), $queryString_Re_typuser); ?>"><img src="Next.gif" border=0></a>
        <?php } // Show if not last page ?>
      </td>
      <td width="23%" align="center">
        <?php if ($pageNum_Re_typuser < $totalPages_Re_typuser) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_Re_typuser=%d%s", $currentPage, $totalPages_Re_typuser, $queryString_Re_typuser); ?>"><img src="Last.gif" border=0></a>
        <?php } // Show if not last page ?>
      </td>
    </tr>
  </table>
  </p>
<table align="center">
    <tr valign="baseline">
      <td nowrap align="right">Ttypuser_id:</td>
      <td><?php echo $row_Re_typuser['ttypuser_id']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Ttypuser_desc:</td>
      <td><input type="text" name="ttypuser_desc" value="<?php echo $row_Re_typuser['ttypuser_desc']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Ttypuser_status:</td>
      <td><input type="text" name="ttypuser_status" value="<?php echo $row_Re_typuser['ttypuser_status']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Ttypuser_author:</td>
      <td><input type="text" name="ttypuser_author" value="<?php echo $row_Re_typuser['ttypuser_author']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Ttypuser_dmod:</td>
      <td><input type="text" name="ttypuser_dmod" value="<?php echo $row_Re_typuser['ttypuser_dmod']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td><input type="submit" value="UPDATE "></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1">
  <input type="hidden" name="ttypuser_id" value="<?php echo $row_Re_typuser['ttypuser_id']; ?>">
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysqli_free_result($Re_typuser);
?>
