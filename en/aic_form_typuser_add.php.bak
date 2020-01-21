<?php require_once('../Connections/cibproto.php'); 
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
  $insertSQL = sprintf("INSERT INTO ttypuser (ttypuser_id, ttypuser_desc, ttypuser_status, ttypuser_author, ttypuser_dmod) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['ttypuser_id'], "text"),
                       GetSQLValueString($_POST['ttypuser_desc'], "text"),
                       GetSQLValueString($_POST['ttypuser_status'], "text"),
                       GetSQLValueString($_POST['ttypuser_author'], "text"),
                       GetSQLValueString($_POST['ttypuser_dmod'], "date"));

  mysqli_select_db($database_cibproto, $cibproto);
  $Result1 = mysqli_query($insertSQL, $cibproto) or die(mysqli_error());
}

mysqli_select_db($database_cibproto, $cibproto);
$query_Re_typuser = "SELECT * FROM ttypuser";
$Re_typuser = mysqli_query($query_Re_typuser, $cibproto) or die(mysqli_error());
$row_Re_typuser = mysqli_fetch_assoc($Re_typuser);
$totalRows_Re_typuser = mysqli_num_rows($Re_typuser);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Type of User insertion</title>
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
  <p align="center" class="Style1"> TYPE OF USER - CREATION</p>
  <table align="center">
    <tr valign="baseline">
      <td nowrap align="right">Type of User Code:</td>
      <td><input type="text" name="ttypuser_id" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Description:</td>
      <td><input type="text" name="ttypuser_desc" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Status</td>
      <td><input type="text" name="ttypuser_status" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Author:</td>
      <td><input type="text" name="ttypuser_author" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Last modification by :</td>
      <td><input type="text" name="ttypuser_dmod" value="" size="32"></td>
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
mysqli_free_result($Re_typuser);
?>
