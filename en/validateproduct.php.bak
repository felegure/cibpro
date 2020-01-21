<?php 
function validateproduct($cibproto, $country)
{

// $currentPage = $_SERVER["PHP_SELF"];
require_once ("utilang.php");

$maxRows_Re_buying_view = 10;
$pageNum_Re_buying_view = 0;
if (isset($_GET['pageNum_Re_buying_view'])) {
  $pageNum_Re_buying_view = $_GET['pageNum_Re_buying_view'];
}
$startRow_Re_buying_view = $pageNum_Re_buying_view * $maxRows_Re_buying_view;

$maxRows_Re_buying_view_2 = 10;
$pageNum_Re_buying_view_2 = 0;
if (isset($_GET['pageNum_Re_buying_view_2'])) {
  $pageNum_Re_buying_view_2 = $_GET['pageNum_Re_buying_view_2'];
}
$startRow_Re_buying_view_2 = $pageNum_Re_buying_view_2 * $maxRows_Re_buying_view_2;

mysqli_select_db($database_cibproto, $cibproto);
$query_Re_buying_view_2 = "SELECT checker,tbuying_rowid, tecowas_id, tecowas_desc, 
tproduct_id, tproduct_desc, tproduct_brand_name, 
tpack_id, tpack_desc, 
tbuying_price_per_pack, tbuying_price_per_pack_dol, tbuying_price_per_pack_eur, tbuying_pack_size,
tbuying_lead_time, 
ttransport_id, ttransport_desc, tpresent_id, tpresent_desc, tinco_id, 
tinco_desc, DATE_FORMAT(tbuying_dbid,'%d-%m-%Y') tbuying_dbid, tcur_id, tcur_desc, tcur_symb, exr, tsrcfund_id, 
tsrcfund_desc, tprov_id, tprov_desc, tprov_coun_id, tprov_coun_desc, ttype_prov_id, 
ttype_prov_desc, tmanu_id, tmanu_desc, tmanu_coun_id, tmanu_coun_desc, 
tsmalunit_id, tsmalunit_desc, tbuying_ppu, tbuying_ppu_cur, 
tbuying_ppu_dol, tbuying_ppu_eur, tbuying_tcost, tbuying_qu, tbuying_pack_size, tbuying_lead_time,
tbuying_status
FROM $view_table_name_ent WHERE tecowas_id = '{$country}'
and tbuying_status = '2'";

$query_limit_Re_buying_view_2 = sprintf("%s LIMIT %d, %d", $query_Re_buying_view_2, $startRow_Re_buying_view_2, $maxRows_Re_buying_view_2);
$Re_buying_view_2 = mysqli_query($query_limit_Re_buying_view_2, $cibproto) or die(mysqli_error());
$row_Re_buying_view_2 = mysqli_fetch_assoc($Re_buying_view_2);

if (isset($_GET['totalRows_Re_buying_view_2'])) {
  $totalRows_Re_buying_view_2 = $_GET['totalRows_Re_buying_view_2'];
} else {
  $all_Re_buying_view_2 = mysqli_query($query_Re_buying_view_2);
  $totalRows_Re_buying_view_2 = mysqli_num_rows($all_Re_buying_view_2);
}
$totalPages_Re_buying_view_2 = ceil($totalRows_Re_buying_view_2/$maxRows_Re_buying_view_2)-1;

$queryString_Re_buying_view_2 = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Re_buying_view_2") == false && 
        stristr($param, "totalRows_Re_buying_view_2") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Re_buying_view_2 = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Re_buying_view_2 = sprintf("&totalRows_Re_buying_view_2=%d%s", $totalRows_Re_buying_view_2, $queryString_Re_buying_view_2);

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Validation</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.Style1 {font-size: 9px}
.Style25 {
	font-size: 12px;
	color: #000066;
}
.Style100 {
	font-size: 18px;
	color: #0000FF;
	font-weight: bold;
}
.Style30 {font-size: 12px}
.Style101 {font-size: 9}
.Style102 {font-size: 14px}



-->
</style>
</head>

<body>
<blockquote>&nbsp; <a href="manage_form_val.php" title="Retour" class="Style9 Style19">Back</a> </blockquote>

<table border="0" width="50%" align="center">
  <tr>
    <td width="23%" align="center">
      <?php if ($pageNum_Re_buying_view_2 > 0) { // Show if not first page ?>
      <a href="<?php printf("%s?pageNum_Re_buying_view_2=%d%s", $currentPage, 0, $queryString_Re_buying_view_2); ?>"><img src="First.gif" border=0></a>
      <?php } // Show if not first page ?>
    </td>
    <td width="31%" align="center">
      <?php if ($pageNum_Re_buying_view_2 > 0) { // Show if not first page ?>
      <a href="<?php printf("%s?pageNum_Re_buying_view_2=%d%s", $currentPage, max(0, $pageNum_Re_buying_view_2 - 1), $queryString_Re_buying_view_2); ?>"><img src="Previous.gif" border=0></a>
      <?php } // Show if not first page ?>
    </td>
    <td width="23%" align="center">
      <?php if ($pageNum_Re_buying_view_2 < $totalPages_Re_buying_view_2) { // Show if not last page ?>
      <a href="<?php printf("%s?pageNum_Re_buying_view_2=%d%s", $currentPage, min($totalPages_Re_buying_view_2, $pageNum_Re_buying_view_2 + 1), $queryString_Re_buying_view_2); ?>"><img src="Next.gif" border=0></a>
      <?php } // Show if not last page ?>
    </td>
    <td width="23%" align="center">
      <?php if ($pageNum_Re_buying_view_2 < $totalPages_Re_buying_view_2) { // Show if not last page ?>
      <a href="<?php printf("%s?pageNum_Re_buying_view_2=%d%s", $currentPage, $totalPages_Re_buying_view_2, $queryString_Re_buying_view_2); ?>"><img src="Last.gif" border=0></a>
      <?php } // Show if not last page ?>
    </td>
  </tr>
</table>
 <a href="radio_3.php">radio_3</a></p> 
 <a href="radio_4.php">radio_4</a> <table width="1000" border="1">
  <tr>
  <th width="100" nowrap scope="row"><span class="Style30">Action</span></th>
   <th width="100" nowrap scope="row"><span class="Style30">Date of Bid</span></th>
    <th width="100" nowrap scope="row"><span class="Style30">Product</span></th>
    <td width="185" class="Style1"><div align="center" class="Style30">Unit price</div></td>
    <td width="180" class="Style1"><div align="center" class="Style30">Smalest</div></td>

    <td width="180" class="Style30"><div align="center">Packaging</div></td>
    <td width="162" class="Style1"><div align="center" class="Style30">Presentation</div></td>
    <td width="177" class="Style1"><div align="center"><span class="Style30">Quantity</span></div></td>

    <td width="164" class="Style1"><div align="center" class="Style30">Total cost</div></td>
    <td width="181" class="Style1"><div align="center" class="Style30">Incoterm</div></td>
    <td width="163" class="Style1"><div align="center"><span class="Style102">Supplier</span></div></td>
    <td width="175" class="Style1"><div align="center" class="Style30">Manufacturer</div></td>
    <td width="200" class="Style1"><div align="center" class="Style30">Transportation</div></td>
    <td width="80" class="Style1"><div align="center" class="Style30">Lead time (days</div></td>
    <td width="80" class="Style1"><div align="center" class="Style30">rowid</div></td>

  </tr>
   <?php 
   $i=0;
   do { 
   ?>
  <tr>
    <td width="100" nowrap class="Style25"><div align="center">
      <input name="Action" type="text" class="Style19" value="" size="1" maxlength="1" >
	  
   <td width="185" bgcolor="#CCCCCC" class="Style25"><div align="center"><?php echo $row_Re_buying_view_2['tbuying_dbid']; ?></div></td>
	<td width="185" bgcolor="#CCCCCC" class="Style25"><div align="center"><?php echo $row_Re_buying_view_2['tproduct_desc']; ?></div></td>
   
    <td width="60" bgcolor="#CCCCCC" class="Style25"><div align="center"><?php echo $row_Re_buying_view_2['tbuying_ppu'].$row_Re_buying_view_2['tcur_id']; ?></div></td>
	
    <td nowrap bgcolor="#CCCCCC" class="Style25"><div align="center"><?php echo $row_Re_buying_view_2['tsmalunit_desc']; ?></div></td>
    <td bgcolor="#CCCCCC" class="Style25"><div align="center"><span class="Style30"><?php echo $row_Re_buying_view_2['tpack_desc']; ?></span></div></td>
    <td bgcolor="#CCCCCC" class="Style25"><div align="center"><?php echo $row_Re_buying_view_2['tpresent_desc']; ?></div></td>
    <td bgcolor="#CCCCCC" class="Style25"><div align="center"><?php echo $row_Re_buying_view_2['tbuying_qu']; ?></div></td>
    <td bgcolor="#CCCCCC" class="Style25"><div align="center"><?php echo $row_Re_buying_view_2['tbuying_tcost'].$row_Re_buying_view_2['tcur_id']; ?></div></td>
    <td bgcolor="#CCCCCC" class="Style25"><div align="center"><?php echo $row_Re_buying_view_2['tinco_desc']; ?></div></td>
    <td bgcolor="#CCCCCC" class="Style25"><div align="center"><?php echo $row_Re_buying_view_2['tprov_desc']."<BR> ".$row_Re_buying_view_2['tprov_coun_desc']; ?></div></td>
    <td bgcolor="#CCCCCC" class="Style25"><div align="center"><?php echo $row_Re_buying_view_2['tmanu_desc']." ".$row_Re_buying_view_2['tmanu_coun_desc']; ?></div></td>
    <td bgcolor="#CCCCCC" class="Style25"><div align="center"><?php echo $row_Re_buying_view_2['ttransport_desc']; ?></div></td>
    <td bgcolor="#CCCCCC" class="Style25"><div align="center"><?php echo $row_Re_buying_view_2['tbuying_lead_time']; ?></div></td>
	   <td bgcolor="#CCCCCC" class="Style25"><div align="center"><?php echo $row_Re_buying_view_2['tbuying_rowid']; ?></div></td>

  
  </tr>
   <?php 
   //$Tableau[$i]=@$_POST['checker'];
 //  $Tableau[$i]="Premier";
   //$Tableau[$i+1]="Deuxieme";
   
   
    $Tableau[$i]=$row_Re_buying_view_2['tbuying_rowid'];
	$Tabchecked[$i]=@$_POST['checker'];
	$O=@$_POST['checker'];
	echo " YYY valeur de O=$O<BR>";
	echo " YYYYYYYYYYYYYYY Contenu de Tabchecked=$Tabchecked[$i]";
	if ($Tabchecked[$i]=='o') echo "OOOOOOOOOOOOOOO non vide Vous avez choisi comme option -<b>";
	else echo "00000000000000000000 est vide <BR>";
    if (!isset($_POST['checker'])) 	 echo "XXX checker non selectionne $i   ";
	if (isset($_POST['checker'])) 	 echo "XXX checker selectionne $i   ";
	else echo "XXX checker nest pas selectionne $i    ";
   echo "tableau($i)(0)=$Tableau[$i] , tableau($i)(1)=$Tabchecked[$i] <BR>";
   /*
   if(!empty($_POST['checker'])) echo "OOOOOOOOOOOOOOO non vide Vous avez choisi comme option -<b>";
	else echo "00000000000000000000 est vide <BR>";
    if (!isset($_POST['checker'])) 	 echo "XXX checker non selectionne $i   ";
	if (isset($_POST['checker'])) 	 echo "XXX checker selectionne $i   ";
	else echo "XXX checker nest pas selectionne $i    ";
   echo "tableau($i)(0)=$Tableau[$i] , tableau($i)(1)=$Tabchecked[$i] <BR>";
   */
   
   $i= $i + 1;
   } while ($row_Re_buying_view_2 = mysqli_fetch_assoc($Re_buying_view_2)); ?>
</table>
<script language="JavaScript"><!--
   function test(champ) {
      if(champ[0].checked || champ[1].checked)
         return true
      alert("Faites un choix !")
      return false
   }
//--></script>

<FORM method="POST"
   onSubmit="return test(this.checker)">
   <input name="checker2" type="checkbox"
      value="Oui">
  Oui
  <input type="Submit" value="VALIDATION">
</FORM>

<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
<?php

mysqli_free_result($Re_buying_view_2);

// definir une fonction  qui va essayer de afire la validation

?>
}