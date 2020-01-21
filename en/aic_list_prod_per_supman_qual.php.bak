<?php 
session_start();
require_once('../Connections/cibproto.php'); 
require_once ("utilang_en.php");
$CUR='$';
$country=$_SESSION['COUNTRY'];
$param_country=$country;
$NOM = $_SERVER['SCRIPT_NAME'];

// echo "SCRIPT_NAME =$NOM <BR>";
if (isset($_POST["pForm_Name"])) {
	$pForm_Name = $_POST['pForm_Name'] ;
	$saveF = $pForm_Name;
	$_POST['Form']=$saveF;
//echo "aic_list_prod_per_supman .php 1ere entrée <BR>";
// $kelcategory= $_GET["kelcategory"];
  //$kelcategory= ${kelcategory};
 // echo "XXXX  save aussi=$save <BR>";
 require_once ("aic_sel_parameters_qual.php");
}
else {
// $pForm_Name=@$_POST['Form'];
$pForm_Name="t_search_product_range_qualite.php";

/// recuperer les parametres ici
$rowid= $_GET['rowid'];
$buying=$_GET['hab'];
$usercountry=$_SESSION['username'];
$pCate=$_GET['pCate'];
$pDsta=$_GET['pDsta'];
$pDend=$_GET['pDend'];
$pMini=$_GET['pMini'];
$pMaxi=$_GET['pMaxi'];
// $pEcow=$_GET['pEcow'];
//$pCate=$_GET['pCate'];
$pProv=$_GET['pProv'];

//echo "aic_list_prod_per_supman_qual.php -   Parametre passé rowid =$rowid ";
//echo "Parametre passé pCate=$pCate, pDend=$pDend, pDsta=$pDsta, pMini=$pMini, pMaxi=$pMaxi,pProv=$pProv <BR> ";
//echo "2èeme entrée en retour de aic_list_prod_per_supman.php.php <BR> ";
require_once ("aic_sel_parameters_quale.php");
}
//$pForm_Name= $_POST['pForm_Name'] ;

//echo " pForm_Name=$pForm_Name <BR>";

//require_once ("aic_sel_parameters_qual.php");
require_once ("aic_prod_query_supplier_qual.php");
$previous_menu="t_search_product_range_qualite.php";
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Liste des enregistrements à choisir - aic_list_prod_per_supman_qual.php</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.Style6 {color: #000066}
.Style7 {font-size: 24px}
.Style25 {
	font-size: 12px;
	color: #990000;
}
.Style1 {font-size: 24px}


.Style30 {font-size: 12px}
.Style49 {color: #000000}
.Style84 {font-size: 24px}
.Style86 {font-size: 18px}
.Style88 {	color: #000099;
	font-weight: bold;
}
.Style93 {font-size: 18px; color: #990000; }
-->
</style>
</head>
<body>
<table width="963" border="1" cellpadding="2" cellspacing="2" bgcolor="#ECE9D8" frame="border">
  <tr>
    <th width="126" scope="row"><div align="center"><span class="Style1"><a href="t_search_product_range_qualite.php" title="Back" class="Style7 Style6 "><span class="Style3"><span class="Style25">Back</span></span></a></span></div></th>
    <td width="571"><div align="center" class="Style7 Style49"><span class="Style84"> 
        <span class="Style30"><strong>List of records for problems of </strong></span><strong><font color="#990000">quality</font> 
        </strong> 
        <div align="center" class="Style30"><strong> from 
          <?php 
     echo "{$pDsta}  to {$pDend} ";
             ?>
          </strong> </div>
        </span> </div></td>
    <td width="138"><div align="center" class="Style30">user: 
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

<table width="2294"  border="1" cellspacing="1" cellpadding="1" summary="Lowest Price per period">
  <!--DWLayoutTable-->
  <caption class="Style1">&nbsp;
  </caption>
  
  <tr class="Style30"> 
    <th width="20" scope="col"><span class="Style5">Select</span></th>
    <th width="20" nowrap class="Style5" scope="col">S/N</th>
    <th width="143" nowrap class="Style5" scope="col">Product</th>
	    
    <th width="141" nowrap class="Style5" scope="col">Presentation</th>

        
    <th width="128" nowrap class="Style5" scope="col">Supplier</th>
    <th width="131" nowrap class="Style5" scope="col"><p>Manufacturer</p>
    </th>
   
    <th width="165" class="Style5" scope="col"><p><span class="Style5">Pack size</span></p>    
    </th>
 
    <th width="93" nowrap class="Style5" scope="col"><p><span class="Style5">Price 
        per pack</span></p>
    </th>
    <th width="155" class="Style5" scope="col"><span class="Style5">Quantity</span> 
      (in pack)</span> </th>
   
    <th width="100" nowrap class="Style5" scope="col">Total cost</th>
	    <th width="125" class="Style5" scope="col">Incoterm</th>

    <th width="168" nowrap scope="col"><p class="Style5">Unit price (smallest 
        unit)</p>
    </th>
    <th width="142" nowrap class="Style5" scope="col">Quantity (smallest unit) 
    </th>
    <th width="136" class="Style5" scope="col"><p class="Style5">Date of bid opening 
        /</p>
      <p class="Style5">Date of reception</p>
      <p class="Style5">(dd-mm-yyyy)</p>
      <p>&nbsp;</p>
    </th>
    <th width="140" nowrap class="Style5" scope="col"><span class="Style5">Supplied 
      to</span></th>
	<th width="150" nowrap class="Style5" scope="col"><span class="Style5">Transportation 
      method</span></th>
		
    <th width="163" nowrap class="Style5" scope="col"><span class="Style5">Lead 
      time (days)</span></th>
    <th width="150" nowrap class="Style5" scope="col"><span class="Style30"><span class="Style30 Style9"><strong>Comments</strong></span></span></th>
  </tr>
  <?php $cpt=1;
   do { ?>
 <tr class="Style30"> 
    <td><div align="center" class="Style5"> 
        <?php  
	  $country=$_SESSION['COUNTRY'];
	  $usercountry=$_SESSION['username'];
	  $rowid=$row_ReSupplier['tbuying_rowid'];
	  $rowProduct=$row_ReSupplier['tbuying_rowid'];
	  $pProd=$row_ReSupplier['tproduct_desc'];
	  $pEco=$row_ReSupplier['tecowas_desc'];
	  $pProv=$row_ReSupplier['tprov_desc'];
	  $pManu=$row_ReSupplier['tmanu_desc'];
	  $pDbid=$row_ReSupplier['tbuying_dbid'];
	  $pCur=$row_ReSupplier['tcur_id'];
	  $pUse=$usercountry;
	  $pPpu=number_format($row_ReSupplier['tbuying_ppu'],4,',', ' ');
	  $pQu=$row_ReSupplier['tbuying_qu'];
	
	// $titreURL = urlEncode ($row_Re_buying_view_2['tbuying_rowid']);
	$titreURL = urlEncode ($rowid);
		

	echo "<A HREF='aic_form_buying_input_qual.php?rowid=$rowid&hab=$row_ReSupplier&pCate=$pCate
	&pDend=$pDend&pDsta=$pDsta&pMini=$pMini&pMaxi=$pMaxi&pEco=$pEco&pProv=$pProv&pProd=$pProd
	&pManu=$pManu&pDbid=$pDbid&pPpu=$pPpu&pQu=$pQu&pCur=$pCur&pUse=$pUse'>
			(Select?) <A/>";
	?></span>
        </div></td>
    <td><div align="center"><span class="Style30"><?php echo $cpt; ?></span></div></td>
    <td nowrap><div align="center">
      <div align="center" class="Style30"><?php echo $row_ReSupplier['tproduct_desc']; ?></div>
    </div></td>
   
    <td><div align="center"><span class="Style30"><?php echo $row_ReSupplier['tpresent_desc']; ?></span></div></td>
    <td><div align="center" class="Style30">
      <div align="right" class="Style30">
	  
      <div align="center" class="Style30"><?php echo $row_ReSupplier['tprov_desc'].' '.$row_ReSupplier['tprov_coun_desc']; ?></div>
      </div>
      </div></td>
	    <td><div align="center" class="Style30">
      <div align="right" class="Style30">
	  
      <div align="center" class="Style30"><?php echo $row_ReSupplier['tmanu_desc'].' '.$row_ReSupplier['tmanu_coun_desc']; ?></div>
      </div>
      </div></td>
    <td><div align="center"><span class="Style30"><?php echo number_format($row_ReSupplier['tbuying_pack_size'],0,',', ' ');
?></span></div></td>
    <td width="100" class="Style9 Style30"><div align="center"><span class="Style30"><?php 
	               //  $nombre_format_français=number_format($row_ReSupplier$[$tbuying_price_per_pack],4,',', ' ');
				   
	if ( $row_ReSupplier['tcur_id']=='USD') { 
    echo $row_ReSupplier['tcur_id'].' '.number_format($row_ReSupplier['tbuying_price_per_pack'],4,',', ' '); }
	else { echo number_format($row_ReSupplier['tbuying_price_per_pack'],4,',', ' ').' '.$row_ReSupplier['tcur_id'];																	  }
	?></span></div></td>
    <td nowrap class="Style9 Style30"><div align="center"><span class="Style16 Style31"><em><span class="Style30">
	<?php 
	echo $nombre_format_français=number_format($row_ReSupplier['tbuying_qty_pack'],0,',', ' ');
	?></span></em></span></div></td>
        <td width="100" class="Style9 Style30"><div align="center">
        <div align="center" class="Style30"> <span class="Style5"> 
          <?php 
	                                             if ( $row_ReSupplier['tcur_id']=='USD') { echo $row_ReSupplier['tcur_id'].' '.number_format($row_ReSupplier['tbuying_tcost'],4,',', ' ');}  
											     else {echo number_format($row_ReSupplier['tbuying_tcost'],4,',', ' ').' '.$row_ReSupplier['tcur_id'];
												 }                                      
	                                            ?>
          </span> </div>
      <span class="Style16 Style31"></span></div></td>
	<td class="Style9 Style30"><div align="center">
      <div align="center" class="Style30"><?php echo $row_ReSupplier['tinco_desc']; ?></div>
      <span class="Style16 Style31"></span></div></td>
	  <td><div align="center"><span class="Style30"><span class="Style16 Style31"><em><?php 
	                                                      $nombre_format_français=number_format($row_ReSupplier['tbuying_ppu'],4,',', ' ');
														  if ( $row_ReSupplier['tcur_id']=='USD') {echo $row_ReSupplier['tcur_id'].' '.number_format($row_ReSupplier['tbuying_ppu'],4,',', ' ');}
	 														else {echo number_format($row_ReSupplier['tbuying_ppu'],4,',', ' ').' '.$row_ReSupplier['tcur_id'];}
	  												 ?></em></span></span></div></td> 
    <td nowrap class="Style13"><div align="center" class="Style16 Style31"><span class="Style30"><?php echo number_format($row_ReSupplier['tbuying_qu'],0,',', ' ');  ?></span></div></td>
   	<td nowrap class="Style13"><div align="center" class="Style16 Style31"><span class="Style30"><?php echo $row_ReSupplier['tbuying_dbid']; ?></span></div></td>
   
    <td><div align="center"><span class="Style30"><span class="Style9 Style30"><?php echo $row_ReSupplier['tecowas_desc']; ?></span></span></div></td>
    <td><div align="center"><span class="Style30"><span class="Style9 Style30"><?php echo $row_ReSupplier['ttransport_desc']; ?></span></span></div></td>
	<td><div align="center"><span class="Style30"><span class="Style9 Style30"><?php echo $row_ReSupplier['tbuying_lead_time']; ?></span></span></div></td>
    <td><div align="center"><span class="Style30"><span class="Style9 Style30"><?php echo $row_ReSupplier['tbuying_remark']; ?></span></span></div></td>
   
  </tr>
  <?php $cpt=$cpt+1; 
  } while ($row_ReSupplier = mysqli_fetch_assoc($ReSupplier)); ?>
</table>
<p align="center" class="Style25"><span class="Style88"><a href="export_excel_report.php?requete=<?PHP echo $query_ReSupplier ?>&choix=2 &cur='$'" class="Style6 Style25 Style88"><span class="Style62 Style25"><span class="Style86">Export 
  </span></span> <span class="Style93">to excel</span></a> 
  <input name="Form" type="hidden" value="<?php echo @$_POST['Form']?>">
  </span></p>
<p align="center" class="Style25">&nbsp;</p>
</body>
</html>
<?php
mysqli_free_result($ReSupplier);
?>
