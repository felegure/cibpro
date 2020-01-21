<?php 
session_start();
require_once('../Connections/cibproto.php'); 
require('../fpdf/fpdf.php'); 
$currentPage = $_SERVER["PHP_SELF"];
require_once ("utilang.php");

mysqli_select_db($database_cibproto, $cibproto);
$pEcow = $_POST['pEcow'];
$pCate = $_POST['pCate'] ;
$pProd = $_POST['pProd'] ;
$pProv = $_POST['pProv'] ;
$pMini = $_POST['pMini'] ;
$pMaxi = $_POST['pMaxi'] ;
$pCure = $_POST['pCure'] ;
$pDsta = $_POST['pDsta'] ;
$pDend = $_POST['pDend'] ;


//echo "date debut=$pDsta<BR>";
//echo "date fin=$pDend<BR>";


$maxRows_RePriceLow = 60; // 60
$pageNum_RePriceLow = 0;
if (isset($_GET['pageNum_RePriceLow'])) {
  $pageNum_RePriceLow = $_GET['pageNum_RePriceLow'];
}
$startRow_RePriceLow = $pageNum_RePriceLow * $maxRows_RePriceLow;

$colname_RePriceLow = "1";
if (isset($_GET['tbuying_dbid'])) {
  $colname_RePriceLow = (get_magic_quotes_gpc()) ? $_GET['tbuying_dbid'] : addslashes($_GET['tbuying_dbid']);
}
if (!mysqli_select_db($database_cibproto, $cibproto))
{ 
echo "Desolé accès a la base" . $database_cibproto . " impossible \n";
exit;
}

if ( $pCure =='EUR') {
$PPU = "tbuying_ppu_eur";
$TCUR_SYMB = "€";
}
else 
{
$PPU = "tbuying_ppu_dol";
$TCUR_SYMB = "$";
}
/*
echo " XXXXXXXXXXXXXXXXXXXPPU=$PPU <BR>";
echo " XXXXXXXXXXXXXXXXXXXXXXXcontenu PPU={$PPU} <BR>";
*/
$queryString_RePriceLow = sprintf("%s" ,
"SELECT tecowas_desc, tproduct_id,tproduct_desc, tproduct_brand_name,tbuying_uv, tconcent_desc, tdosage_desc, tpresent_desc,
 min({$PPU}) tbuying_ppu_dol, pack_size, price_per_pack,price_per_pack_dol,price_per_pack_eur,
  leadtime,tsmalunit_desc, tpack_desc,tsrcfund_desc, tprov_coun_desc, 
 tbuying_tcost, tbuying_qu, tprov_desc, tcur_desc, tcur_symb,
ttype_prov_desc,tinco_desc,ttransport_desc, DATE_FORMAT(tbuying_dbid,'%d-%m-%Y') tbuying_dbid
from $view_table_name_en
where (tecowas_id like '%$pEcow' or '$pEcow' = '*') 
AND  (tcateg_id like '%$pCate' or '$pCate' = '*')
AND (tproduct_id like '%$pProd' or '$pProd' = '*') 
AND (tprov_id like '%$pProv' or '$pProv' = '*')
AND (tbuying_ppu between '$pMini' and '$pMaxi' or ('$pMini' is NULL and '$pMaxi' is NULL))
AND (tbuying_dbid >= STR_TO_DATE('$pDsta','%d/%m/%Y') 
	and (tbuying_dbid <= STR_TO_DATE('$pDend','%d/%m/%Y')
    ))
GROUP BY tproduct_id
ORDER BY tproduct_id, {$PPU}, tbuying_dbid ASC");

$query_limit_RePriceLow = sprintf("%s LIMIT %d, %d", $queryString_RePriceLow, $startRow_RePriceLow, $maxRows_RePriceLow);


$RePriceLow = mysqli_query($query_limit_RePriceLow, $cibproto) or die(mysqli_error());

$row_RePriceLow = mysqli_fetch_assoc($RePriceLow);

if (isset($_GET['totalRows_RePriceLow'])) {
  $totalRows_RePriceLow = $_GET['totalRows_RePriceLow'];
} else {
  $all_RePriceLow = mysqli_query($queryString_RePriceLow);
  $totalRows_RePriceLow = mysqli_num_rows($all_RePriceLow);
}
$totalPages_RePriceLow = ceil($totalRows_RePriceLow/$maxRows_RePriceLow)-1;
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
.Style5 {font-size: 12px}
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
.Style49 {color: #000000}
.Style78 {font-size: 12px; color: #000000; }
.Style84 {font-size: 24px}

-->
</style>
</Head>
<BODY>
<table width="963" border="1" cellpadding="2" cellspacing="2">
  <tr>
    <th width="126" scope="row"><div align="center"><span class="Style84"><a href="t_search_price_range_dol_c.php" title="Retour" class="Style7 Style6 "><span class="Style3"><span class="Style25">Back</span></span></a></span></div></th>
    <td width="571"><div align="center" class="Style7 Style49"><span class="Style84">List of products by supplier with lowest prices from
              <?php
				echo "{$pDsta}  to {$pDend} ";
	?>
    </span> </div></td>
    <td width="124"><div align="center" class="Style30">username:
            <?php
				echo "{$_SESSION['username']}";
	?>
    </div></td>
    <td width="106"><div align="center" class="Style30">Date :
            <?php 
      $today = date (" D j, M,Y  H:i:s");
      echo " $today "; ?>
    </div></td>
    <td width="106"><div align="center" class="Style30">Acrobat :
            <form name="form1" method="post" action="<?php
			$text= "CECI est un exemple";
			$date="date du jour";
			$pdf=new FPDF();
 			$pdf->AddPage();
 			$pdf->SetFont('Arial','B',12);//définition de la police
 			$pdf->SetXY(10,65);//Position de notre "traceur"
 			$pdf->Cell(190,10,$text,1,1,'C');//Création d'une cellule de texte
 			$pdf->Ln(50);//Saut de ligne
 			$pdf->Cell(100,7,'Online le, '.$date,0,0,'L');//Horodatage.
		   $pdf->output();
 		//sortie : 
  			?>
">
              </form>
            <?php 
      
	  //	include('fpdf.php');//Inclusion de la classe php FPDF que vous pouvez télécharger ici
 		$text=" CECI EST UN EXEMPLE";//Récupération de notre texte
 		//VARIABLE AJOUT PDF
		$date = date("d/m/y");//Ajout d'une date pour personnaliser notre document
 		//Création du pdf
 		$pdf=new FPDF();
 		$pdf->AddPage();
 		$pdf->SetFont('Arial','B',12);//définition de la police
 		$pdf->SetXY(10,65);//Position de notre "traceur"
 		$pdf->Cell(190,10,$text,1,1,'C');//Création d'une cellule de texte
 		$pdf->Ln(50);//Saut de ligne
 		$pdf->Cell(100,7,'Online le, '.$date,0,0,'L');//Horodatage.
 		//sortie : 
  	?>
        PDF </div></td>
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
	  $pEcow = $_POST['pEcow'];
$pCate = $_POST['pCate'] ;
$pProd = $_POST['pProd'] ;
$pMini = $_POST['pMini'] ;
$pMaxi = $_POST['pMaxi'] ;
$pCure = $_POST['pCure'] ;
$pDsta = $_POST['pDsta'] ;
$pDend = $_POST['pDend'] ;

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
  <head> 
</p>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<div align="center"></div>
<table width="100%"  border="1" cellspacing="1" cellpadding="1" summary="Lowest Price per period">
  <caption class="Style1">&nbsp;
  </caption>
  
  <tr>
    <th width="5%" nowrap class="Style5" scope="col">S/N</th>
    <th width="5%" nowrap class="Style5" scope="col">Product description</th>
    <th width="7%" nowrap class="Style5" scope="col">Brand name </th>
    <th width="7%" nowrap class="Style5" scope="col">Supplier</th>
    <th width="7%" nowrap class="Style5" scope="col">Pack size</th>
   
    <th width="5%" class="Style5" scope="col">Packaging</th>
 
    <th width="2%" nowrap class="Style5" scope="col">Price per Pack</th>
    <th width="2%" nowrap class="Style5" scope="col">Unit price </th>
   
    <th width="5%" class="Style5" scope="col">Inco Term </th>
    <th width="6%" nowrap scope="col"><p class="Style5">Date of Opening Bid</p>
    <p class="Style5"> (dd-mm-yyyy) </p></th>
    <th width="5%" class="Style5" scope="col">Supplied to</th>
    <th width="5%" nowrap class="Style5" scope="col">Lead time(weeks) </th>
   
  </tr>
  <?php $cpt=1;
  do { ?>
  <tr class="Style5">
    <td><div align="center" class="Style5"><?php echo $cpt; ?></div></td>
    <td><div align="center">
      <div align="center" class="Style5"><?php echo $row_RePriceLow['tproduct_desc']." ".$row_RePriceLow['tconcent_desc']." ".$row_RePriceLow['tdosage_desc']; ?></div>
    </div></td>
    <td><div align="center" class="Style5"><?php echo $row_RePriceLow['tproduct_brand_name']; ?></div></td>
    <td><div align="center" class="Style5"><?php echo $row_RePriceLow['tprov_desc']." ".$row_RePriceLow['tprov_coun_desc']; ?></div></td>
    <td><div align="center" class="Style5"><?php echo $row_RePriceLow['pack_size']; ?></div></td>
    <td><div align="right" class="Style30">
      <div align="center" class="Style5"><?php echo $row_RePriceLow['tpack_desc']; ?></div>
     
    </div></td>
   
 
    <td class="Style9 Style30"><div align="center" class="Style5"><?php echo $row_RePriceLow['price_per_pack_dol']."$"; ?></div></td>
    <td nowrap class="Style9 Style30"><div align="center" class="Style5"><em><?php echo $row_RePriceLow['tbuying_ppu_dol']."$"; ?></em></div></td>
    <td class="Style9 Style30"><div align="center">
      <div align="center" class="Style5"><?php echo $row_RePriceLow['tinco_desc']; ?></div>
      </div></td>
    <td class="Style13"><div align="center" class="Style78"><?php echo $row_RePriceLow['tbuying_dbid']; ?></div></td>
   
    <td><div align="center" class="Style5"><?php echo $row_RePriceLow['tecowas_desc']; ?></div></td>
    <td><div align="center" class="Style5"><?php echo $row_RePriceLow['leadtime']; ?></div></td>
  </tr>
  <?php $cpt=$cpt+1; 
  } while ($row_RePriceLow = mysqli_fetch_assoc($RePriceLow)); ?>
</table>


</body>
</html>
<?php
mysqli_free_result($RePriceLow);
?>
