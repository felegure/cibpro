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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO tusers (tusers_id, tusers_desc, tusers_ecowas_id, tusers_funct, tusers_dept, tusers_adress, tusers_ph1, tusers_ph2, tusers_mob, tusers_fax, tusers_email, tusers_web, tusers_passwd, tusers_remark, tusers_status) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['tusers_id'], "int"),
                       GetSQLValueString($_POST['tusers_desc'], "text"),
                       GetSQLValueString($_POST['tusers_ecowas_id'], "text"),
                       GetSQLValueString($_POST['tusers_funct'], "text"),
                       GetSQLValueString($_POST['tusers_dept'], "text"),
                       GetSQLValueString($_POST['tusers_adress'], "text"),
                       GetSQLValueString($_POST['tusers_ph1'], "text"),
                       GetSQLValueString($_POST['tusers_ph2'], "text"),
                       GetSQLValueString($_POST['tusers_mob'], "text"),
                       GetSQLValueString($_POST['tusers_fax'], "text"),
                       GetSQLValueString($_POST['tusers_email'], "text"),
                       GetSQLValueString($_POST['tusers_web'], "text"),
                       GetSQLValueString($_POST['tusers_passwd'], "text"),
                       GetSQLValueString($_POST['tusers_remark'], "text"),
                       GetSQLValueString($_POST['tusers_status'], "text"));

  mysqli_select_db($database_cibproto, $cibproto);
  $Result1 = mysqli_query($insertSQL, $cibproto) or die(mysqli_error());
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form2")) {
  $updateSQL = sprintf("UPDATE tusers SET tusers_desc=%s, tusers_ecowas_id=%s, tusers_funct=%s, tusers_dept=%s, tusers_adress=%s, tusers_ph1=%s, tusers_ph2=%s, tusers_mob=%s, tusers_fax=%s, tusers_email=%s, tusers_web=%s, tusers_passwd=%s, tusers_remark=%s, tusers_status=%s WHERE tusers_id=%s",
                       GetSQLValueString($_POST['tusers_desc'], "text"),
                       GetSQLValueString($_POST['tusers_ecowas_id'], "text"),
                       GetSQLValueString($_POST['tusers_funct'], "text"),
                       GetSQLValueString($_POST['tusers_dept'], "text"),
                       GetSQLValueString($_POST['tusers_adress'], "text"),
                       GetSQLValueString($_POST['tusers_ph1'], "text"),
                       GetSQLValueString($_POST['tusers_ph2'], "text"),
                       GetSQLValueString($_POST['tusers_mob'], "text"),
                       GetSQLValueString($_POST['tusers_fax'], "text"),
                       GetSQLValueString($_POST['tusers_email'], "text"),
                       GetSQLValueString($_POST['tusers_web'], "text"),
                       GetSQLValueString($_POST['tusers_passwd'], "text"),
                       GetSQLValueString($_POST['tusers_remark'], "text"),
                       GetSQLValueString($_POST['tusers_status'], "text"),
                       GetSQLValueString($_POST['tusers_id'], "int"));

  mysqli_select_db($database_cibproto, $cibproto);
  $Result1 = mysqli_query($updateSQL, $cibproto) or die(mysqli_error());

  
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$maxRows_Re_users = 1;
$pageNum_Re_users = 0;
if (isset($_GET['pageNum_Re_users'])) {
  $pageNum_Re_users = $_GET['pageNum_Re_users'];
}
$startRow_Re_users = $pageNum_Re_users * $maxRows_Re_users;

mysqli_select_db($database_cibproto, $cibproto);
$query_Re_users = "SELECT * FROM tusers";
$query_limit_Re_users = sprintf("%s LIMIT %d, %d", $query_Re_users, $startRow_Re_users, $maxRows_Re_users);
$Re_users = mysqli_query($query_limit_Re_users, $cibproto) or die(mysqli_error());
$row_Re_users = mysqli_fetch_assoc($Re_users);

if (isset($_GET['totalRows_Re_users'])) {
  $totalRows_Re_users = $_GET['totalRows_Re_users'];
} else {
  $all_Re_users = mysqli_query($query_Re_users);
  $totalRows_Re_users = mysqli_num_rows($all_Re_users);
}
$totalPages_Re_users = ceil($totalRows_Re_users/$maxRows_Re_users)-1;

$queryString_Re_users = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Re_users") == false && 
        stristr($param, "totalRows_Re_users") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Re_users = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Re_users = sprintf("&totalRows_Re_users=%d%s", $totalRows_Re_users, $queryString_Re_users);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>aic_form_user_mod.php</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.Style1 {
	color: #0000FF;
	font-weight: bold;
	font-size: 24px;
}
-->
</style>
</head>

<body>

</form>
<form method="post" name="form2" action="<?php echo $editFormAction; ?>">
  <p><a href="pickauser.php" title="Retour">Back</a>	</p>
  <p align="center" class="Style1"> UPDATE USERS	</p>
  <p align="center">

  <table border="0" width="50%" align="center">
    <tr>
      <td width="23%" align="center">
        <?php if ($pageNum_Re_users > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_Re_users=%d%s", $currentPage, 0, $queryString_Re_users); ?>"><img src="First.gif" border=0></a>
        <?php } // Show if not first page ?>      </td>
      <td width="31%" align="center">
        <?php if ($pageNum_Re_users > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_Re_users=%d%s", $currentPage, max(0, $pageNum_Re_users - 1), $queryString_Re_users); ?>"><img src="Previous.gif" border=0></a>
        <?php } // Show if not first page ?>      </td>
      <td width="23%" align="center">
        <?php if ($pageNum_Re_users < $totalPages_Re_users) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_Re_users=%d%s", $currentPage, min($totalPages_Re_users, $pageNum_Re_users + 1), $queryString_Re_users); ?>"><img src="Next.gif" border=0></a>
        <?php } // Show if not last page ?>      </td>
      <td width="23%" align="center">
        <?php if ($pageNum_Re_users < $totalPages_Re_users) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_Re_users=%d%s", $currentPage, $totalPages_Re_users, $queryString_Re_users); ?>"><img src="Last.gif" border=0></a>
        <?php } // Show if not last page ?>      </td>
    </tr>
  </table>
  </p>
  <?php do { ?>
  <table align="center">
    <tr valign="baseline">
      <td nowrap align="right">Tusers_id:</td>
      <td><?php echo $row_Re_users['tusers_id']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Tusers_desc:</td>
      <td><input type="text" name="tusers_desc" value="<?php echo $row_Re_users['tusers_desc']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Tusers_ecowas_id:</td>
      <td><input type="text" name="tusers_ecowas_id" value="<?php echo $row_Re_users['tusers_ecowas_id']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Tusers_funct:</td>
      <td><input type="text" name="tusers_funct" value="<?php echo $row_Re_users['tusers_funct']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Tusers_dept:</td>
      <td><input type="text" name="tusers_dept" value="<?php echo $row_Re_users['tusers_dept']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Tusers_adress:</td>
      <td><input type="text" name="tusers_adress" value="<?php echo $row_Re_users['tusers_adress']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Tusers_ph1:</td>
      <td><input type="text" name="tusers_ph1" value="<?php echo $row_Re_users['tusers_ph1']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Tusers_ph2:</td>
      <td><input type="text" name="tusers_ph2" value="<?php echo $row_Re_users['tusers_ph2']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Tusers_mob:</td>
      <td><input type="text" name="tusers_mob" value="<?php echo $row_Re_users['tusers_mob']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Tusers_fax:</td>
      <td><input type="text" name="tusers_fax" value="<?php echo $row_Re_users['tusers_fax']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Tusers_email:</td>
      <td><input type="text" name="tusers_email" value="<?php echo $row_Re_users['tusers_email']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Tusers_web:</td>
      <td><input type="text" name="tusers_web" value="<?php echo $row_Re_users['tusers_web']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Tusers_passwd:</td>
      <td><input type="text" name="tusers_passwd" value="<?php echo $row_Re_users['tusers_passwd']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Tusers_remark:</td>
      <td><input type="text" name="tusers_remark" value="<?php echo $row_Re_users['tusers_remark']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Tusers_status:</td>
      <td><input type="text" name="tusers_status" value="<?php echo $row_Re_users['tusers_status']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td><input name="submit" type="submit" value="UPDATE"></td>
    </tr>
  </table>
  <?php } while ($row_Re_users = mysqli_fetch_assoc($Re_users)); ?>
  <input type="hidden" name="MM_update" value="form2">
  <input type="hidden" name="tusers_id" value="<?php echo $row_Re_users['tusers_id']; ?>">
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysqli_free_result($Re_users);
?>
