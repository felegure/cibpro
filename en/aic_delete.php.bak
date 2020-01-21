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
 require_once ("UtilBuying.php");
if ((isset($_GET['tbuying_ec_id'])) && ($_GET['tbuying_ec_id'] != "")) {
  $deleteSQL = sprintf("DELETE FROM tbuying_07 WHERE tbuying_ec_id=%s",
                       GetSQLValueString($_GET['tbuying_ec_id'], "text"));

  mysqli_select_db($database_cibproto, $cibproto);
  $Result1 = mysqli_query($deleteSQL, $cibproto) or die(mysqli_error());
}

if ((isset($_GET['tbuying_rowid'])) && ($_GET['tbuying_rowid'] != "")) {
  $deleteSQL = sprintf("DELETE FROM tbuying_view WHERE tbuying_rowid=%s",
                       GetSQLValueString($_GET['tbuying_rowid'], "int"));

  mysqli_select_db($database_cibproto, $cibproto);
  $Result1 = mysqli_query($deleteSQL, $cibproto) or die(mysqli_error());
}

mysqli_select_db($database_cibproto, $cibproto);
$query_Re_tbuying_valid = "SELECT * FROM tbuying WHERE tbuying.tbuying_status =  '2'";
$Re_tbuying_valid = mysqli_query($query_Re_tbuying_valid, $cibproto) or die(mysqli_error());
$row_Re_tbuying_valid = mysqli_fetch_assoc($Re_tbuying_valid);
$totalRows_Re_tbuying_valid = mysqli_num_rows($Re_tbuying_valid);

$maxRows_Re_buying_view = 10;
$pageNum_Re_buying_view = 0;
if (isset($_GET['pageNum_Re_buying_view'])) {
  $pageNum_Re_buying_view = $_GET['pageNum_Re_buying_view'];
}
$startRow_Re_buying_view = $pageNum_Re_buying_view * $maxRows_Re_buying_view;

mysqli_select_db($database_cibproto, $cibproto);
$query_Re_buying_view = "SELECT * FROM tbuying_view WHERE tbuying_view.tbuying_status = '2'";
$query_limit_Re_buying_view = sprintf("%s LIMIT %d, %d", $query_Re_buying_view, $startRow_Re_buying_view, $maxRows_Re_buying_view);
$Re_buying_view = mysqli_query($query_limit_Re_buying_view, $cibproto) or die(mysqli_error());
$row_Re_buying_view = mysqli_fetch_assoc($Re_buying_view);

if (isset($_GET['totalRows_Re_buying_view'])) {
  $totalRows_Re_buying_view = $_GET['totalRows_Re_buying_view'];
} else {
  $all_Re_buying_view = mysqli_query($query_Re_buying_view);
  $totalRows_Re_buying_view = mysqli_num_rows($all_Re_buying_view);
}
$totalPages_Re_buying_view = ceil($totalRows_Re_buying_view/$maxRows_Re_buying_view)-1;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Document sans titre</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<form name="form1" method="post" action="">
  <table border="1">
    <tr>
      <td>tbuying_rowid</td>
      <td>tecowas_id</td>
      <td>tecowas_desc</td>
      <td>tcateg_id</td>
      <td>tcateg_desc</td>
      <td>tproduct_id</td>
      <td>tproduct_desc</td>
      <td>tconcent_id</td>
      <td>tconcent_desc</td>
      <td>tbuying_dosage_id</td>
      <td>tdosage_desc</td>
      <td>tbuying_pack_id</td>
      <td>tpack_desc</td>
      <td>tbuying_transport_id</td>
      <td>ttransport_desc</td>
      <td>tbuying_present_id</td>
      <td>tpresent_desc</td>
      <td>tbuying_country_id</td>
      <td>tcountry_desc</td>
      <td>tinco_id</td>
      <td>tinco_desc</td>
      <td>tbuying_dbid</td>
      <td>tcur_id</td>
      <td>tcur_desc</td>
      <td>tsrcfund_desc</td>
      <td>tprov_desc</td>
      <td>tbuying_type_prov_id</td>
      <td>ttype_prov_desc</td>
      <td>tbuying_uv</td>
      <td>tbuying_smalunit_id</td>
      <td>tsmalunit_desc</td>
      <td>tbuying_us</td>
      <td>tbuying_ppu</td>
      <td>tbuying_tcost</td>
      <td>tbuying_qu</td>
      <td>tbuying_status</td>
    </tr>
    <?php do { ?>
    <tr>
      <td><?php echo $row_Re_buying_view['tbuying_rowid']; ?></td>
      <td><?php echo $row_Re_buying_view['tecowas_id']; ?></td>
      <td><?php echo $row_Re_buying_view['tecowas_desc']; ?></td>
      <td><?php echo $row_Re_buying_view['tcateg_id']; ?></td>
      <td><?php echo $row_Re_buying_view['tcateg_desc']; ?></td>
      <td><?php echo $row_Re_buying_view['tproduct_id']; ?></td>
      <td><?php echo $row_Re_buying_view['tproduct_desc']; ?></td>
      <td><?php echo $row_Re_buying_view['tconcent_id']; ?></td>
      <td><?php echo $row_Re_buying_view['tconcent_desc']; ?></td>
      <td><?php echo $row_Re_buying_view['tbuying_dosage_id']; ?></td>
      <td><?php echo $row_Re_buying_view['tdosage_desc']; ?></td>
      <td><?php echo $row_Re_buying_view['tbuying_pack_id']; ?></td>
      <td><?php echo $row_Re_buying_view['tpack_desc']; ?></td>
      <td><?php echo $row_Re_buying_view['tbuying_transport_id']; ?></td>
      <td><?php echo $row_Re_buying_view['ttransport_desc']; ?></td>
      <td><?php echo $row_Re_buying_view['tbuying_present_id']; ?></td>
      <td><?php echo $row_Re_buying_view['tpresent_desc']; ?></td>
      <td><?php echo $row_Re_buying_view['tbuying_country_id']; ?></td>
      <td><?php echo $row_Re_buying_view['tcountry_desc']; ?></td>
      <td><?php echo $row_Re_buying_view['tinco_id']; ?></td>
      <td><?php echo $row_Re_buying_view['tinco_desc']; ?></td>
      <td><?php echo $row_Re_buying_view['tbuying_dbid']; ?></td>
      <td><?php echo $row_Re_buying_view['tcur_id']; ?></td>
      <td><?php echo $row_Re_buying_view['tcur_desc']; ?></td>
      <td><?php echo $row_Re_buying_view['tsrcfund_desc']; ?></td>
      <td><?php echo $row_Re_buying_view['tprov_desc']; ?></td>
      <td><?php echo $row_Re_buying_view['tbuying_type_prov_id']; ?></td>
      <td><?php echo $row_Re_buying_view['ttype_prov_desc']; ?></td>
      <td><?php echo $row_Re_buying_view['tbuying_uv']; ?></td>
      <td><?php echo $row_Re_buying_view['tbuying_smalunit_id']; ?></td>
      <td><?php echo $row_Re_buying_view['tsmalunit_desc']; ?></td>
      <td><?php echo $row_Re_buying_view['tbuying_us']; ?></td>
      <td><?php echo $row_Re_buying_view['tbuying_ppu']; ?></td>
      <td><?php echo $row_Re_buying_view['tbuying_tcost']; ?></td>
      <td><?php echo $row_Re_buying_view['tbuying_qu']; ?></td>
      <td><?php echo $row_Re_buying_view['tbuying_status']; ?></td>
    </tr>
    <?php } while ($row_Re_buying_view = mysqli_fetch_assoc($Re_buying_view)); ?>
  </table>
  <p>&nbsp;</p>
</form>
<p>&nbsp;</p>
<input name="valide" type="submit" value="VALIDATION">
</body>
</html>
<?php
mysqli_free_result($Re_tbuying_valid);

mysqli_free_result($Re_buying_view);
?>
