<?php 
session_start();
require_once('../Connections/cibproto.php'); 
$currentPage = $_SERVER["PHP_SELF"];
require_once ("utilang_en.php");
$pForm_Name= $_POST['pForm_Name'] ;
// echo " pForm_Name=$pForm_Name <BR>";
require_once ("aic_sel_parameters.php");
require_once ("aic_prod_lowest_price.php");

if ( $pCure =='EUR') {
$TCUR_SYMB = "€";
$CUR='€';
$tbuying_price_per_pack="tbuying_price_per_pack_eur";
$tbuying_tcost="tbuying_tcost_eur";
$tbuying_ppu="tbuying_ppu_eur";
}
else 
{
$TCUR_SYMB = "$";
$CUR='$';
$tbuying_price_per_pack="tbuying_price_per_pack_dol";
$tbuying_tcost="tbuying_tcost_dol";
$tbuying_ppu="tbuying_ppu_dol";
}
require_once ("aic_prod_lowest_price.php");

?>


<Head>
<title>Price Report</title>
<link rel="stylesheet" href="styles.css" type="text/css">
<meta name="description"     content="Faites ici en une ou deux lignes, la description de ce fichier.">
<meta name="keywords"        content="keywords; 1, keywords; 2, etc...">
<meta name="author"         content="Felicien NEZZI,  WAHO 2007">
<meta name="Funtion"   content="CIB MANAGER, fnezzi@wahooas.org">
<meta name="Date"        content="2007-03-31T08:00+00:00">
<!-- date et heure exemple: 31/03/2007, 08:00 heures, +0 heure. par rapport à Greenwich -->
<meta name="DC.Language"    content="fr">
<!-- fr = fran&ccedil;ais -->
<script language="JavaScript" type="text/JavaScript">
<!--
//-->
</script>
<style type="text/css">
<!--
.Style6 {color: #000066}
.Style7 {font-size: 24px}
.Style9 {font-size: 12px}
.Style13 {
	font-style: italic;
	font-size: 12px;
	color: #333366;
	font-weight: bold;
}
.Style13 {color: #FFFF00; font-weight: bold; }
.Style25 {
	font-size: 12px;
	color: #000066;
}
.Style1 {font-size: 24px}


.Style30 {font-size: 12px}
.Style31 {
	color: #003366;
	font-size: 12px;
}
.Style54 {font-size: 14px}
.Style80 {color: #FF0000}
-->
</style>
</Head>
<BODY>
<table width="963" border="1" cellpadding="2" cellspacing="2">
  <tr>
    <th width="126" scope="row"><div align="center" class="Style22"><span class="Style1"><a href="<?php echo $pForm_Name ?>" title="Retour" class="Style7 Style6 "><span class="Style3"><span class="Style25 Style25"> <span class="Style22">Back</span></span></span></a></span></div></th>
    <td width="571"><div align="center" class="Style7 Style49"><span class="Style30"><span class="Style64">List of products by suppliers with lowest prices from <span class="Style30">
      <?php 
     echo "{$pDsta}  to {$pDend} ";
             ?>
    </span> </span></span><span class="Style1"> <span class="Style30">
    </span></span></div></td>
    <td width="138"><div align="center" class="Style30">username:
            <?php
				echo "{$_SESSION['username']}";
	?>
    </div></td>
    <td width="92"><div align="center" class="Style30">Date :
            <?php 
      $today = date (" D j, M,Y  H:i:s");
      echo " $today "; ?>
    </div></td>
  </tr>
</table>
<table width="50%" border="0" align="center">
  <tr>
    <td width="23%" align="center">
      <?php if ($pageNum_RePriceLow > 0) { // Show if not first page ?>
      <a href="<?php printf("%s?pageNum_RePriceLow=%d%s", $currentPage, 0, $queryString_RePriceLow); ?>"><img src="First.gif" border=0></a>
      <?php } // Show if not first page ?>
    </td>
    <td width="31%" align="center">
      <?php if ($pageNum_RePriceLow > 0) { // Show if not first page ?>
      <a href="<?php 
	  /*
	  $pEcow = $_POST['pEcow'];
$pCate = $_POST['pCate'] ;
$pProd = $_POST['pProd'] ;
$pMini = $_POST['pMini'] ;
$pMaxi = $_POST['pMaxi'] ;
$pCure = $_POST['pCure'] ;
$pDsta = $_POST['pDsta'] ;
$pDend = $_POST['pDend'] ;
*/
	  printf("%s?pageNum_RePriceLow=%d%s", $currentPage, max(0, $pageNum_RePriceLow - 1), $queryString_RePriceLow); ?>"><img src="Previous.gif" border=0></a>
      <?php } // Show if not first page ?>
    </td>
    <td width="23%" align="center">
      <?php if ($pageNum_RePriceLow < $totalPages_RePriceLow) { // Show if not last page ?>
      <a href="<?php printf("%s?pageNum_RePriceLow=%d%s", $currentPage, min($totalPages_RePriceLow, $pageNum_RePriceLow + 1), $queryString_RePriceLow); ?>"><img src="Next.gif" border=0></a>
      <?php } // Show if not last page ?>
    </td>
    <td width="23%" align="center">
      <?php if ($pageNum_RePriceLow < $totalPages_RePriceLow) { // Show if not last page ?>
      <a href="<?php printf("%s?pageNum_RePriceLow=%d%s", $currentPage, $totalPages_RePriceLow, $queryString_RePriceLow); ?>"><img src="Last.gif" border=0></a>
      <?php } // Show if not last page ?>
    </td>
  </tr>
</table>
<p align="left">
 
  <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
  <html>
  <head> </p>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<div align="center"></div>
<table width="100%"  border="1" cellspacing="1" cellpadding="1" summary="Lowest Price per period">
  <caption class="Style84">&nbsp;
  </caption>
  <tr>
    <th width="5%" nowrap class="Style30" scope="col">S/N</th>
    <th width="5%" nowrap class="Style30" scope="col"><span class="Style9 Style30">Product description</span></th>
    <th width="7%" nowrap class="Style30" scope="col">Presentation</th>
    <th width="7%" nowrap class="Style30" scope="col">Supplier</th>
    <th width="7%" nowrap class="Style30" scope="col"><p>Manufacturer</p></th>
    <th width="5%" class="Style30" scope="col"><p>Pack size</p>
    </th>
    <th width="2%" nowrap class="Style30" scope="col"><p>Price per pack</p>
    </th>
    <th width="2%" class="Style30" scope="col">Quantity </th>
    <th width="5%" class="Style30" scope="col">Total cost </th>
    <th width="5%" class="Style30" scope="col">Incoterm</th>
    <th width="6%" scope="col"><p class="Style30">Unit price (smallest unit) </p></th>
	<th width="6%" scope="col"><p class="Style30">Quantity (smallest unit) </p></th>
    <th width="5%" class="Style30" scope="col"><p class="Style30">Date of bid opening / Date of reception</p>
        <p class="Style30"> (dd-mm-yyyy) </p></th>
    <th width="5%" nowrap class="Style30" scope="col">Supplied to</th>
    <th width="5%" nowrap class="Style30" scope="col">Transportation method</th>
	<th width="5%" nowrap class="Style30" scope="col">Lead time (days)</th>
	<th width="5%" scope="col"><span class="Style9 Style30">Comments</span></th>
  </tr>
   </tr>
  <?php $cpt=1;
  do { ?>
  <tr>
    <td><div align="center"><span class="Style30"><?php echo $cpt; ?></span></div></td>
    <td nowrap><div align="center">
      <div align="center" class="Style30"><?php echo $row_RePriceLow['tproduct_desc']; ?></div>
    </div></td>
   
    <td><div align="center"><span class="Style30"><?php echo $row_RePriceLow['tpresent_desc']; ?></span></div></td>
    <td><div align="center" class="Style30">
      <div align="right" class="Style30">
	  
      <div align="center" class="Style30"><?php echo $row_RePriceLow['tprov_desc']."<BR>".$row_RePriceLow['tprov_coun_desc']; ?></div>
      </div>
      </div></td>
	    <td><div align="center" class="Style30">
      <div align="right" class="Style30">
	  
      <div align="center" class="Style30"><?php echo $row_RePriceLow['tmanu_desc']."<BR>".$row_RePriceLow['tmanu_coun_desc']; ?></div>
      </div>
      </div></td>
    <td><div align="center"><span class="Style30"><?php echo number_format($row_RePriceLow['tbuying_pack_size']); ?></span></div></td>
    <td class="Style9 Style30"><div align="center"><span class="Style30"><?php 
                                                                           if ( $CUR=='$') {echo $CUR.number_format($row_RePriceLow[$tbuying_price_per_pack],4);}
	                                                                       else {echo number_format($row_RePriceLow[$tbuying_price_per_pack],4).$CUR;}
	                                                                    ?>
      </span></div></td>
    <td nowrap class="Style9 Style30"><div align="center" class="Style30"><?php echo number_format($row_RePriceLow['tbuying_qty_pack']); ?></div></td>
        <td class="Style9 Style30"><div align="center">
      <div align="center" class="Style30"><?php 
	                                       if ( $CUR=='$') {echo $CUR.number_format($row_RePriceLow[$tbuying_tcost],4);}
	                                       else {echo number_format($row_RePriceLow[$tbuying_tcost],4).$CUR;}
	                                     ?></div>
      <span class="Style16 Style31"></span></div></td>
	<td class="Style9 Style30"><div align="center">
      <div align="center" class="Style30"><?php echo $row_RePriceLow['tinco_desc']; ?></div>
      <span class="Style16 Style31"></span></div></td>
	  <td><div align="center" class="Style16 Style31"><?php 
														  if ( $CUR=='$') {echo $CUR.number_format($row_RePriceLow[$tbuying_ppu],4);}
	 														else {echo number_format($row_RePriceLow[$tbuying_ppu],4).$CUR;}
	  												 ?></div></td> 
	  <td><div align="center" class="Style16 Style31"><?php echo number_format($row_RePriceLow['tbuying_qu']); ?></div></td> 
    <td nowrap class="Style13"><div align="center" class="Style31"><?php echo $row_RePriceLow['tbuying_dbid']; ?></div></td>
   
    <td><div align="center"><span class="Style30"><span class="Style9 Style30"><?php echo $row_RePriceLow['tecowas_desc']; ?></span></span></div></td>
    <td><div align="center"><span class="Style30"><span class="Style9 Style30"><?php echo $row_RePriceLow['ttransport_desc']; ?></span></span></div></td>
    <td><div align="center"><span class="Style30"><span class="Style9 Style30"><?php echo $row_RePriceLow['tbuying_lead_time']; ?></span></span></div></td>

	<td><div align="center"><span class="Style30"><span class="Style9 Style30"><?php echo $row_RePriceLow['tbuying_remark']; ?></span></span></div></td>
   
  </tr>
  <?php $cpt=$cpt+1; 
  } while ($row_RePriceLow = mysqli_fetch_assoc($RePriceLow)); ?>
</table>


<p align="center"><span class="Style87"><a href="export_excel_report.php?requete=<?PHP echo $queryString_RePriceLow?>&choix=1 &cur='$'" class="Style6"><span class="Style62 Style6 Style25 Style54"><span class="Style62 Style6  Style25 Style89"><span class="Style22">Export to excel</span></span></span></a></span></p>
</body>
</html>
<?php
mysqli_free_result($RePriceLow);
?>



