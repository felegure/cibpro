<?php require_once('../Connections/cibproto.php'); 
   
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


if (
(isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
	   
    $insertSQL = sprintf("INSERT INTO tusers (
	tusers_desc, tusers_ecowas_id, tusers_funct, tusers_dept, tusers_adress, tusers_ph1, tusers_ph2, 
	tusers_mob, tusers_fax, tusers_email, tusers_web, tusers_passwd, tusers_remark, tusers_status) 
	VALUES ( %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
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

mysqli_select_db($database_cibproto, $cibproto);
$query_Re_users = "SELECT * FROM tusers";
$Re_users = mysqli_query($query_Re_users, $cibproto) or die(mysqli_error());
$row_Re_users = mysqli_fetch_assoc($Re_users);
$totalRows_Re_users = mysqli_num_rows($Re_users);

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>aic_form_user_add.php</title>
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
  <p><a href="pickauser.php" title="Retour">Back</a></p>
  <p align="center" class="Style1">USER  - CREATION </p>
  <table align="center">
    <tr valign="baseline">
      <td nowrap align="right">User Name :</td>
      <td><textarea name="tusers_desc" cols="32"></textarea></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Country Code:</td>
      <td><input type="text" name="tusers_ecowas_id" value="" size="3"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Function</td>
      <td><textarea name="tusers_funct" cols="40"></textarea></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Department</td>
      <td><textarea name="tusers_dept" cols="40"></textarea></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Adress</td>
      <td><textarea name="tusers_adress" cols="40"></textarea></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Telephone number 1</td>
      <td><input type="text" name="tusers_ph1" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Telephone number 2</td>
      <td><input type="text" name="tusers_ph2" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Mobile phone number</td>
      <td><input type="text" name="tusers_mob" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Fax:</td>
      <td><input type="text" name="tusers_fax" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">email:</td>
      <td><input type="text" name="tusers_email" value="" size="40"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Website</td>
      <td><input type="text" name="tusers_web" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Password</td>
      <td><input type="password" name="tusers_passwd" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Remark:</td>
      <td><textarea name="tusers_remark" cols="32"></textarea></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Tusers_status:</td>
      <td><input type="text" name="tusers_status" value="" size="1"></td>
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
mysqli_free_result($Re_users);
?>
