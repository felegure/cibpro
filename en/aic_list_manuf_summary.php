<?php 
session_start();
require_once('../Connections/cibproto.php'); ?>
<?php
 require_once ("utilang_en.php");
 
$maxRows_ReManufacturer = 1000;
$pageNum_ReManufacturer = 0;
if (isset($_GET['pageNum_ReManufacturer'])) {
  $pageNum_ReManufacturer = $_GET['pageNum_ReManufacturer'];
}
$startRow_ReManufacturer = $pageNum_ReManufacturer * $maxRows_ReManufacturer;

mysqli_select_db($cibproto, $database_cibproto);
$query_ReManufacturer = "SELECT tmanu_desc, tcountry_desc, tmanu_cont, tmanu_adr, tmanu_postal, tmanu_fax,tmanu_tel1, tmanu_tel2, 
tmanu_email, tmanu_website, tmanu_remark FROM tmanuf_country_en_view order by tmanu_desc";
$query_Re_provider = "SELECT  tprov_desc, tcountry_desc,tprov_cont, tprov_adr, tprov_postal,tprov_tel1, tprov_tel2, 
tprov_fax, tprov_email, tprov_website,tprov_remark   FROM $view_manuf_country";
$query_limit_ReManufacturer = sprintf("%s LIMIT %d, %d", $query_ReManufacturer, $startRow_ReManufacturer, $maxRows_ReManufacturer);
$ReManufacturer = mysqli_query($cibproto, $query_limit_ReManufacturer) or die(mysqli_error($cibproto));
$row_ReManufacturer = mysqli_fetch_assoc($ReManufacturer);

if (isset($_GET['totalRows_ReManufacturer'])) {
  $totalRows_ReManufacturer = $_GET['totalRows_ReManufacturer'];
} else {
  $all_ReManufacturer = mysqli_query($cibproto, $query_ReManufacturer);
  $totalRows_ReManufacturer = mysqli_num_rows($all_ReManufacturer);
  if ($totalRows_ReManufacturer ==0) {
    echo "<script language='JavaScript'>alert('No rows found !!')</script>"; 
	require_once ("pickareport");
	exit;
	}

}
$totalPages_ReManufacturer = ceil($totalRows_ReManufacturer/$maxRows_ReManufacturer)-1;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Report list of Manufacturers</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.Style6 {color: #000066}
.Style7 {font-size: 24px}
.Style9 {font-size: 12px}
.Style25 {
	font-size: 12px;
	color: #990000;
}
.Style1 {font-size: 24px}


.Style30 {font-size: 12px}
.Style49 {color: #000000}
.Style52 {
	font-size: 24px;
	color: #000000;
	font-weight: bold;
}
.Style87 {color: #000099;
	font-weight: bold;
}
.Style53 {font-size: 18px}
-->
</style>
</head>

<body>

<p align="center">&nbsp;</p>
<p align="center"><span class="Style7"><span class="Style1"><strong>
<table width="963" border="1" cellpadding="2" cellspacing="2">
  <tr>
    <th width="126" height="32" scope="row"><div align="center" class="Style9"><a href="pickareport.php" title="Retour" class="Style7 Style6 "><span class="Style25 Style19">Back</span></a></div></th>
    <td width="571"><div align="center" class="Style7 Style49"><span class="Style1"><span class="Style52"><span class="Style30">List of Manufacturers with contact<strong>s</strong></span><span class="Style62">
    </span></span></span></div></td>
    <td width="138"><div align="center" class="Style9"><span class="Style19">username</span>:
<?php
				echo "{$_SESSION['username']}";
	?>
    </div></td>
    <td width="92"><div align="center" class="Style9"><span class="Style19">Date</span> :
            <?php 
      $today = date ("  D j, M,Y  H:i:s");
      echo " $today "; ?>
    </div></td>
  </tr>
</table>
  </strong> <span class="Style18"> </span> </span>
    
</span>
<table width=100%"  border="1" cellspacing="2" cellpadding="2">
  <caption>&nbsp;
  </caption>
  <tr class="Style30">
    <th width="7%" scope="col"><span class="Style5">S/N</span></th>
    <th width="6%" scope="col"><span class="Style5">Manufacturer</span></th>
    <th width="6%" scope="col"><span class="Style5">Country</span></th>
    <th width="6%" scope="col"><span class="Style5">Contact</span></th>
    <th width="5%" scope="col"><span class="Style5">Adress</span></th>
    <th width="6%" scope="col"><span class="Style5">Zip Code</span></th>
    <th width="5%" scope="col"><span class="Style5">Telephone 1</span></th>
    <th width="5%" scope="col"><span class="Style5">Telephone 2</span></th>
    <th width="5%" scope="col"><span class="Style5">Fax</span></th>
    <th width="5%" scope="col"><span class="Style5">email adress</span></th>
    <th width="5%" scope="col"><span class="Style5">Web site</span></th>
    <th width="5%" scope="col"><span class="Style5">Comments</span></th>
  </tr>
  <?php  $cpt=1; 
  do { ?>
  <tr>
    <td bordercolor="#99CCCC"><div align="center" class="Style5 Style30"><strong><?php echo $cpt; ?></strong></div></td>
    <td><div align="center" class="Style5 Style30"><?php echo $row_ReManufacturer['tmanu_desc'];?></div></td>
    <td><div align="center" class="Style5 Style30"><?php echo $row_ReManufacturer['tcountry_desc']; ?></div></td>
    <td><div align="center" class="Style5 Style30"><?php echo $row_ReManufacturer['tmanu_cont']; ?></div></td>
    <td><div align="center" class="Style5 Style30"><?php echo $row_ReManufacturer['tmanu_adr']?></div></td>
    <td><div align="center" class="Style5 Style30">
        <div align="center"><?php echo $row_ReManufacturer['tmanu_postal']; ?></div>
    </div></td>
    <td><div align="center" class="Style5 Style30">
        <div align="center"><?php echo $row_ReManufacturer['tmanu_tel1'] ?></div>
    </div></td>
    <td><div align="center" class="Style5 Style30">
        <div align="center"><?php echo $row_ReManufacturer['tmanu_tel2']; ?></div>
    </div></td>
    <td><div align="center" class="Style5 Style30">
        <div align="center"><?php echo $row_ReManufacturer['tmanu_fax'] ?></div>
    </div></td>
    <td><div align="left" class="Style5 Style30">
        <div align="center"><?php echo $row_ReManufacturer['tmanu_email']; ?></div>
    </div></td>
    <td><div align="center" class="Style5 Style30"><?php echo $row_ReManufacturer['tmanu_website']; ?></div></td>
    <td><div align="center" class="Style5 Style30"><?php echo $row_ReManufacturer['tmanu_remark']; ?></div></td>
  </tr>
  <?php $cpt=$cpt+1;
  } while ($row_ReManufacturer = mysqli_fetch_assoc($ReManufacturer)); ?>
</table>
<p align="center"><span class="Style87"><a href="export_excel_report_detail.php?requete=<?PHP echo $query_ReManufacturer ?>&type=2" class="Style6"><span class="Style62 Style6 Style25 Style54"><span class="Style62 Style6  Style25 Style89"><span class="Style22 Style50 Style86 Style88 Style53">Export to excel</span></span></span></a></span></p>
<p>&nbsp;</p>
</body>
</html>
<?php
mysqli_free_result($ReManufacturer);
?>
