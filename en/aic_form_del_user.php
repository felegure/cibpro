<?php require_once('../Connections/conproto.php'); ?>
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

if ((isset($_GET['tusers_id'])) && ($_GET['tusers_id'] != "")) {
  $deleteSQL = sprintf("DELETE FROM tusers WHERE tusers_id=%s",
                       GetSQLValueString($_GET['tusers_id'], "int"));

  mysqli_select_db($database_conproto, $conproto);
  $Result1 = mysqli_query($deleteSQL, $conproto) or die(mysqli_error());
}

if ((isset($_GET['tusers_id'])) && ($_GET['tusers_id'] != "")) {
  $deleteSQL = sprintf("DELETE FROM tusers WHERE tusers_id=%s",
                       GetSQLValueString($_GET['tusers_id'], "int"));

  mysqli_select_db($database_conproto, $conproto);
  $Result1 = mysqli_query($deleteSQL, $conproto) or die(mysqli_error());
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Document sans titre</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>

</body>
</html>
