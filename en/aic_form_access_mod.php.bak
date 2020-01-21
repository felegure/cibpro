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
  $updateSQL = sprintf("UPDATE taccess SET taccess_user_name=%s, taccess_user_pwd=%s, taccess_users_id=%s, taccess_typuser_id=%s, taccess_sdate=%s, taccess_edate=%s, taccess_aut=%s, taccess_dmod=%s, taccess_ecowas_id=%s, taccess_status=%s WHERE taccess_id=%s",
                       GetSQLValueString($_POST['taccess_user_name'], "text"),
                       GetSQLValueString($_POST['taccess_user_pwd'], "text"),
                       GetSQLValueString($_POST['taccess_users_id'], "text"),
                       GetSQLValueString($_POST['taccess_typuser_id'], "text"),
                       GetSQLValueString($_POST['taccess_sdate'], "date"),
                       GetSQLValueString($_POST['taccess_edate'], "date"),
                       GetSQLValueString($_POST['taccess_aut'], "text"),
                       GetSQLValueString($_POST['taccess_dmod'], "date"),
                       GetSQLValueString($_POST['taccess_ecowas_id'], "text"),
                       GetSQLValueString($_POST['taccess_status'], "text"),
                       GetSQLValueString($_POST['taccess_id'], "int"));

  mysqli_select_db($database_cibproto, $cibproto);
  $Result1 = mysqli_query($updateSQL, $cibproto) or die(mysqli_error());
}

$maxRows_Re_access = 1;
$pageNum_Re_access = 0;
if (isset($_GET['pageNum_Re_access'])) {
  $pageNum_Re_access = $_GET['pageNum_Re_access'];
}
$startRow_Re_access = $pageNum_Re_access * $maxRows_Re_access;

mysqli_select_db($database_cibproto, $cibproto);
$query_Re_access = "SELECT * FROM taccess";
$query_limit_Re_access = sprintf("%s LIMIT %d, %d", $query_Re_access, $startRow_Re_access, $maxRows_Re_access);
$Re_access = mysqli_query($query_limit_Re_access, $conproto) or die(mysqli_error());
$row_Re_access = mysqli_fetch_assoc($Re_access);

if (isset($_GET['totalRows_Re_access'])) {
  $totalRows_Re_access = $_GET['totalRows_Re_access'];
} else {
  $all_Re_access = mysqli_query($query_Re_access);
  $totalRows_Re_access = mysqli_num_rows($all_Re_access);
}
$totalPages_Re_access = ceil($totalRows_Re_access/$maxRows_Re_access)-1;

$queryString_Re_access = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Re_access") == false && 
        stristr($param, "totalRows_Re_access") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Re_access = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Re_access = sprintf("&totalRows_Re_access=%d%s", $totalRows_Re_access, $queryString_Re_access);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Document sans titre</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.Style1 {
	font-size: 18px;
	color: #0000CC;
	font-weight: bold;
}
-->
</style>
</head>

<body>
<form method="post" name="form1" action="<?php echo $editFormAction; ?>">
  <p><a href="pickauser.php" title="Back">Back</a></p>
  <p align="center" class="Style1">USER ACCES UPDATE </p>
  <p>
  <table border="0" width="50%" align="center">
    <tr>
      <td width="23%" align="center">
        <?php if ($pageNum_Re_access > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_Re_access=%d%s", $currentPage, 0, $queryString_Re_access); ?>"><img src="First.gif" border=0></a>
        <?php } // Show if not first page ?>
      </td>
      <td width="31%" align="center">
        <?php if ($pageNum_Re_access > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_Re_access=%d%s", $currentPage, max(0, $pageNum_Re_access - 1), $queryString_Re_access); ?>"><img src="Previous.gif" border=0></a>
        <?php } // Show if not first page ?>
      </td>
      <td width="23%" align="center">
        <?php if ($pageNum_Re_access < $totalPages_Re_access) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_Re_access=%d%s", $currentPage, min($totalPages_Re_access, $pageNum_Re_access + 1), $queryString_Re_access); ?>"><img src="Next.gif" border=0></a>
        <?php } // Show if not last page ?>
      </td>
      <td width="23%" align="center">
        <?php if ($pageNum_Re_access < $totalPages_Re_access) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_Re_access=%d%s", $currentPage, $totalPages_Re_access, $queryString_Re_access); ?>"><img src="Last.gif" border=0></a>
        <?php } // Show if not last page ?>
      </td>
    </tr>
  </table>
  </p>
<p>&nbsp;</p>
  <table align="center">
    <tr valign="baseline">
      <td nowrap align="right">Taccess_id:</td>
      <td><?php echo $row_Re_access['taccess_id']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Taccess_user_name:</td>
      <td><input type="text" name="taccess_user_name" value="<?php echo $row_Re_access['taccess_user_name']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Taccess_user_pwd:</td>
      <td><input type="text" name="taccess_user_pwd" value="<?php echo $row_Re_access['taccess_user_pwd']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Taccess_users_id:</td>
      <td><input type="text" name="taccess_users_id" value="<?php echo $row_Re_access['taccess_users_id']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Taccess_typuser_id:</td>
      <td><input type="text" name="taccess_typuser_id" value="<?php echo $row_Re_access['taccess_typuser_id']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Taccess_sdate:</td>
      <td><input type="text" name="taccess_sdate" value="<?php echo $row_Re_access['taccess_sdate']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Taccess_edate:</td>
      <td><input type="text" name="taccess_edate" value="<?php echo $row_Re_access['taccess_edate']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Taccess_aut:</td>
      <td><input type="text" name="taccess_aut" value="<?php echo $row_Re_access['taccess_aut']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Taccess_dmod:</td>
      <td><input type="text" name="taccess_dmod" value="<?php echo $row_Re_access['taccess_dmod']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Taccess_ecowas_id:</td>
      <td><input type="text" name="taccess_ecowas_id" value="<?php echo $row_Re_access['taccess_ecowas_id']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Taccess_status:</td>
      <td><input type="text" name="taccess_status" value="<?php echo $row_Re_access['taccess_status']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td><input name="submit" type="submit" value="Mettre à jour l'enregistrement"></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1">
  <input type="hidden" name="taccess_id" value="<?php echo $row_Re_access['taccess_id']; ?>">
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysqli_free_result($Re_access);

mysqli_free_result($Re_accesse);
?>
