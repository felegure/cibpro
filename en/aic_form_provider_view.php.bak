<?php session_start(); 
require_once('../Connections/cibproto.php');
$currentPage = $_SERVER["PHP_SELF"];

$maxRows_Re_provider = 10;
$pageNum_Re_provider = 0;
if (isset($_GET['pageNum_Re_provider'])) {
  $pageNum_Re_provider = $_GET['pageNum_Re_provider'];
}
$startRow_Re_provider = $pageNum_Re_provider * $maxRows_Re_provider;

mysqli_select_db($database_cibproto, $cibproto);
$query_Re_provider = "SELECT * FROM tprovider";
$query_limit_Re_provider = sprintf("%s LIMIT %d, %d", $query_Re_provider, $startRow_Re_provider, $maxRows_Re_provider);
$Re_provider = mysqli_query($query_limit_Re_provider, $cibproto) or die(mysqli_error());
$row_Re_provider = mysqli_fetch_assoc($Re_provider);

if (isset($_GET['totalRows_Re_provider'])) {
  $totalRows_Re_provider = $_GET['totalRows_Re_provider'];
} else {
  $all_Re_provider = mysqli_query($query_Re_provider);
  $totalRows_Re_provider = mysqli_num_rows($all_Re_provider);
}
$totalPages_Re_provider = ceil($totalRows_Re_provider/$maxRows_Re_provider)-1;

$queryString_Re_provider = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Re_provider") == false && 
        stristr($param, "totalRows_Re_provider") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Re_provider = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Re_provider = sprintf("&totalRows_Re_provider=%d%s", $totalRows_Re_provider, $queryString_Re_provider);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>List of Suppliers</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.Style1 {font-size: 12px}
.Style2 {font-size: 24px}
.Style5 {color: #003366}
.Style16 {font-size: 12px;
	color: #000066;
}
-->
</style>
</head>

<body>
<div align="center">
  <table width="963" border="1" cellpadding="2" cellspacing="2">
    <tr>
      <th width="126" scope="row"><div align="center"><span class="Style2"><a href="pickaform.php" title="Retour" class="Style7 Style6 "><span class="Style5"><span class="Style16">Back</span></span></a></span></div></th>
      <td width="571"><div align="center" class="Style2">List of Suppliers</div></td>
      <td width="138"><div align="center" class="Style1">username:
              <?php
				echo "{$_SESSION['username']}";
	?>
      </div></td>
      <td width="92"><div align="center" class="Style1">Date :
              <?php 
      $today = date ("  M ,D j,Y  H:i:s");
      echo " $today "; ?>
      </div></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>
  <table border="0" width="50%" align="center">
    <tr>
      <td width="23%" align="center">
        <?php if ($pageNum_Re_provider > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_Re_provider=%d%s", $currentPage, 0, $queryString_Re_provider); ?>"><img src="First.gif" border=0></a>
        <?php } // Show if not first page ?>
      </td>
      <td width="31%" align="center">
        <?php if ($pageNum_Re_provider > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_Re_provider=%d%s", $currentPage, max(0, $pageNum_Re_provider - 1), $queryString_Re_provider); ?>"><img src="Previous.gif" border=0></a>
        <?php } // Show if not first page ?>
      </td>
      <td width="23%" align="center">
        <?php if ($pageNum_Re_provider < $totalPages_Re_provider) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_Re_provider=%d%s", $currentPage, min($totalPages_Re_provider, $pageNum_Re_provider + 1), $queryString_Re_provider); ?>"><img src="Next.gif" border=0></a>
        <?php } // Show if not last page ?>
      </td>
      <td width="23%" align="center">
        <?php if ($pageNum_Re_provider < $totalPages_Re_provider) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_Re_provider=%d%s", $currentPage, $totalPages_Re_provider, $queryString_Re_provider); ?>"><img src="Last.gif" border=0></a>
        <?php } // Show if not last page ?>
      </td>
    </tr>
  </table>
  </p>
<p>&nbsp;</p>
  
  <table border="10">
    <tr>
      <td width="146"><span class="Style1">Code </span></td>
      <td width="183"><span class="Style1">Pays</span></td>
      <td width="163"><span class="Style1">Description</span></td>
      <td width="500"><span class="Style1">Adresse</span></td>
      <td width="171"><span class="Style1">Code postal </span></td>
      <td width="200"><span class="Style1">Fax</span></td>
      <td width="200"><span class="Style1">Telephone </span></td>
      <td width="200"><span class="Style1">Telephone 2 </span></td>
      <td width="200"><span class="Style1">email</span></td>
      <td width="181"><span class="Style1">Site web</span></td>
      <td width="300"><span class="Style1">Contact</span></td>
      <td width="500"><span class="Style1">Remarque</span></td>
      <td width="50"><span class="Style1">Status</span></td>
    </tr>
    <?php do { ?>
    <tr>
      <td><span class="Style1"><?php echo $row_Re_provider['tprov_id']; ?></span></td>
      <td><span class="Style1"><?php echo $row_Re_provider['tprov_coun_id']; ?></span></td>
      <td><span class="Style1"><?php echo $row_Re_provider['tprov_desc']; ?></span></td>
      <td><span class="Style1"><?php echo $row_Re_provider['tprov_adr']; ?></span></td>
      <td><span class="Style1"><?php echo $row_Re_provider['tprov_postal']; ?></span></td>
      <td><span class="Style1"><?php echo $row_Re_provider['tprov_fax']; ?></span></td>
      <td><span class="Style1"><?php echo $row_Re_provider['tprov_tel1']; ?></span></td>
      <td><span class="Style1"><?php echo $row_Re_provider['tprov_tel2']; ?></span></td>
      <td><span class="Style1"><?php echo $row_Re_provider['tprov_email']; ?></span></td>
      <td><span class="Style1"><?php echo $row_Re_provider['tprov_website']; ?></span></td>
      <td><span class="Style1"><?php echo $row_Re_provider['tprov_cont']; ?></span></td>
      <td><span class="Style1"><?php echo $row_Re_provider['tprov_remark']; ?></span></td>
      <td><span class="Style1"><?php echo $row_Re_provider['tprov_status']; ?></span></td>
    </tr>
    <?php } while ($row_Re_provider = mysqli_fetch_assoc($Re_provider)); ?>
  </table>
  <p>&nbsp; </p>
</div>
</body>
</html>
<?php
mysqli_free_result($Re_provider);
?>
