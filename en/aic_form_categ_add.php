<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Document sans titre</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.Style1 {font-size: 24px}
-->
</style>
</head>
<body>


<?php require_once('../Connections/cibproto.php'); ?>
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
  $insertSQL = sprintf("INSERT INTO tcategory (tcateg_id, tcateg_desc, tcateg_status, tcateg_remark) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['tcateg_id'], "text"),
                       GetSQLValueString($_POST['tcateg_desc'], "text"),
                       GetSQLValueString($_POST['tcateg_status'], "text"),
                       GetSQLValueString($_POST['tcateg_remark'], "text"));

  mysqli_select_db($database_cibproto, $cibproto);
  $Result1 = mysqli_query($insertSQL, $cibproto) or die(mysqli_error());
}
?>

&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
<p align="center" class="Style1">Op&eacute;rations sur la table CATEGORY</p>
<p>&nbsp;</p>
<form method="post" name="form1" action="<?php echo $editFormAction; ?>">
  <a href="pickanobject.php" title="Back">Back</a>  <table align="center">
    <tr valign="baseline">
      <td nowrap align="right">Tcateg_id:</td>
      <td><input type="text" name="tcateg_id" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Tcateg_desc:</td>
      <td><input type="text" name="tcateg_desc" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Tcateg_status:</td>
      <td><input type="text" name="tcateg_status" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Tcateg_remark:</td>
      <td><input type="text" name="tcateg_remark" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td><input type="submit" value="Insérer l'enregistrement"></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1">
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
