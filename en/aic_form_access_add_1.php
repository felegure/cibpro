<?php require_once('../Connections/conproto.php'); 
require_once('ControleInsert.php');
?>
<?php
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

  $insertSQL = sprintf("INSERT INTO taccess ( taccess_user_name, taccess_user_pwd, taccess_users_id, 
  taccess_typuser_id, taccess_sdate, taccess_edate, taccess_aut, taccess_dmod, taccess_ecowas_id, 
  taccess_status) VALUES ( %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['taccess_user_name'], "text"),
                       GetSQLValueString($_POST['taccess_user_pwd'], "text"),
                       GetSQLValueString($_POST['taccess_users_id'], "text"),
                       GetSQLValueString($_POST['taccess_typuser_id'], "text"),
                       GetSQLValueString($_POST['taccess_sdate'], "date"),
                       GetSQLValueString($_POST['taccess_edate'], "date"),
                       GetSQLValueString($_POST['taccess_aut'], "text"),
                       GetSQLValueString($_POST['taccess_dmod'], "date"),
                       GetSQLValueString($_POST['taccess_ecowas_id'], "text"),
                       GetSQLValueString($_POST['taccess_status'], "text"));

  mysqli_select_db($database_conproto, $conproto);
  $Result1 = mysqli_query($insertSQL, $conproto) or die(mysqli_error());
}

mysqli_select_db($database_conproto, $conproto);
$query_Re_access = "SELECT * FROM taccess";
$Re_access = mysqli_query($query_Re_access, $conproto) or die(mysqli_error());
$row_Re_access = mysqli_fetch_assoc($Re_access);
$totalRows_Re_access = mysqli_num_rows($Re_access);

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Access creation</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.Style1 {	color: #0000FF;
	font-size: 18px;
	font-weight: bold;
}
-->
</style>
</head>

<body>


<form method="post" name="form1" action="<?php echo $editFormAction; ?>">
  <p><a href="pickauser.php" title="Back">Back</a></p>
  <p align="center" class="Style1">USER ACCES - CREATION </p>
  <table align="center">
    <tr valign="baseline">
      <td nowrap align="right">Access_id:</td>
      <td><input type="text" name="taccess_id" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Access_name:</td>
      <td><input type="text" name="taccess_user_name" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Password</td>
      <td><input type="text" name="taccess_user_pwd" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">User_id:</td>
      <td><input type="text" name="taccess_users_id" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Type of user _id:</td>
      <td><input type="text" name="taccess_typuser_id" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Starting date:</td>
      <td><input type="text" name="taccess_sdate" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Ending date:</td>
      <td><input type="text" name="taccess_edate" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Author:</td>
      <td><input type="text" name="taccess_aut" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Modification date:</td>
      <td><input type="text" name="taccess_dmod" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Country code:</td>
      <td><input type="text" name="taccess_ecowas_id" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Status:</td>
      <td><input type="text" name="taccess_status" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td><input type="submit" class="Style1" value="Insert new record"></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1">
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysqli_free_result($Re_access);

?>
