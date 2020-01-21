<?php 
session_start();
require_once('../Connections/cibproto.php'); 

require_once ("utilang_en.php");
// Dans ce cas de figure on n'a pas besoin de passer en paramètre la devise.
// on prendra celle qui se trouve dns la base de données
///

$CUR='$';
////////////////////
$NOM = $_SERVER['SCRIPT_NAME'];
// echo "SCRIPT_NAME =$NOM <BR>";
$pForm_Name= $_POST['pForm_Name'] ;
// echo " pForm_Name=$pForm_Name <BR>";
// 22 02 2013 /////////////////////////
// $pCurrency= $_POST['pCurrency'] ;
//////////
require_once ("aic_sel_parameters_qualet.php");
////////////////////////////////////
/*  22 02 2013 on n'a plus besoin de tester le devise car pas de choix au niveau du menu precedent
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
*/
////////
require_once ("aic_prod_query_qualite.php");
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>List of Quality problems Notifications - aic_list_qual_probl.php</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.Style5 {font-size: 12px}
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
.Style87 {color: #FF0000}
-->
</style>
</head>
<body>
<table width="963" border="1" cellpadding="2" cellspacing="2">
  <tr>
    <th width="126" scope="row"><div align="center"><span class="Style1"><a href="<?php echo $pForm_Name ?>"  title="Retour" class="Style7 Style6 "><span class="Style3"><span class="Style25">Back</span></span></a></span></div></th>
    <td width="1271"><div align="center" class="Style7 Style49"><span class="Style84"> 
        <span class="Style30"> List of Quality problems by countries</span> 
        <div align="center" class="Style30"> 
          <?php 
     echo "{$pDsta}  au {$pDend} ";
             ?>
        </div>  
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

<span class="Style5">

</span>
<table width="2294"  border="1" cellspacing="1" cellpadding="1" summary="Lowest Price per period">
  <!--DWLayoutTable-->
  <caption class="Style1">&nbsp;
  </caption>
  <tr> 
    <th width="20" nowrap class="Style5" scope="col">S/N</th>
    <th width="143" nowrap class="Style5" scope="col">Country</th>
    <th width="100" nowrap class="Style5" scope="col">Date of notification</th>
	    
    <th width="143" nowrap class="Style5" scope="col">Nature of the problem</th>
    <th width="143" nowrap class="Style5" scope="col">Product</th>
    <th width="141" nowrap class="Style5" scope="col">Presentation</th>
    <th width="128" nowrap class="Style5" scope="col">Lot number</th>
    <th width="128" nowrap class="Style5" scope="col">Supplier</th>
    <th width="131" nowrap class="Style5" scope="col"><p>Manufacturer</p></th>
    <th width="165" class="Style5" scope="col"><p>Pack size</p>
      </th>
    <th width="93" nowrap class="Style5" scope="col"><p>Price per pack size</p>
      </th>
    <th width="155" class="Style5" scope="col"><span class="Style30">Number of 
      pack size</span></th>
    <th width="100" nowrap class="Style5" scope="col">Total cost</th>
    <th width="125" class="Style5" scope="col">Incoterm</th>
    <th width="168" nowrap scope="col"><p class="Style5"><span class="Style30">Unit 
        price</span> (smallest unit) </p></th>
    <th width="142" nowrap class="Style5" scope="col"><p class="Style30">Quantity(psmallest 
        unit)</p></th>
    <th width="136" class="Style5" scope="col"><p class="Style30">Date of bid 
        opning/rececption date</p>
      <p class="Style30"> (jj-mm-aaaa) </p></th>
     
    <th width="150" nowrap class="Style5" scope="col">Transportation method</th>
    <th width="163" nowrap class="Style5" scope="col">Leadt time(dyas)</th>
    <th width="150" nowrap class="Style5" scope="col">Comments</th>
  </tr>
  <?php $cpt=1; 
  do { ?>
  <tr class="Style30"> 
    <td height="23"><div align="center" class="Style5"><strong><strong><?php echo $cpt; ?></strong> 
        </strong></div></td>
    <td><div align="center" class="Style5"><span class="Style5"><strong><?php echo $row_ReSupplier['tecowas_desc']; ?></strong></span></div></td>
    <td><div align="center" class="Style5"><?php echo $row_ReSupplier['tnotqual_date']; ?></div></td>
    <td><div align="center" class="Style5"><font color="#FF0000"><strong><?php echo $row_ReSupplier['tmotifqual_desc']; ?></strong></font></div></td>
	<td><div align="center" class="Style5"><?php echo $row_ReSupplier['tproduct_desc']; ?></div></td>
    <td><div align="center" class="Style5"><?php echo $row_ReSupplier['tpresent_desc']; ?></div></td>
    <td><div align="center"><span class="Style5"><font color="#FF0000"><strong><?php echo $row_ReSupplier['tnotqual_lot'] ; ?></strong></font></span></div></td>
    <td><div align="center"><span class="Style5"><?php echo $row_ReSupplier['tprov_desc']."<BR>".$row_ReSupplier['tprov_coun_desc'] ; ?></span></div></td
	><td><div align="center"><span class="Style5"><?php echo $row_ReSupplier['tmanu_desc']."<BR>".$row_ReSupplier['tmanu_coun_desc']; ?></span></div></td>
    <td><div align="center" class="Style5"><?php echo number_format($row_ReSupplier['tbuying_pack_size'],0,',', ' ');
    ?></div></td>
    <td class="Style5"><div align="center">
        <?php 
		// cette partie modifiee pour prendre la devise de la base 22 fevrier 2013
		
					              /*
								            if ( $CUR=='$') { 
										    echo $CUR.number_format($row_ReSupplier[$tbuying_price_per_pack],4,',', ' ');
										    }
	                                        else { echo number_format($row_ReSupplier[$tbuying_price_per_pack],4,',', ' ').$CUR;
											}
											*/
										echo number_format($row_ReSupplier['tbuying_price_per_pack'],4,',', ' ').' '.$row_ReSupplier['tcur_desc'];	
	                                       ?>
      </div></td>
    <td><div align="center">
        <?php 
	echo $nombre_format_français=number_format($row_ReSupplier['tbuying_qty_pack'],0,',', ' ');
	?>
      </div></td>
    <td width="100" class="Style9 Style30"><div align="center"> 
        <div align="center" class="Style30">
          <?php 
	                                    /* 22 10 2013 meme motif tbuying_price_per_pack
										  if ( $CUR=='$') {echo $CUR.number_format($row_ReSupplier[$tbuying_tcost],4,',', ' ');}
	                                      else {
										   echo number_format($row_ReSupplier[$tbuying_tcost],4,',', ' ').$CUR;
										  
										   } 
										   */
										   echo number_format($row_ReSupplier['tbuying_tcost'],4,',', ' ').' '.$row_ReSupplier['tcur_desc']; 
	                                     ?>
        </div>
        <span class="Style16 Style31"></span></div></td>
    <td><div align="center" class="Style5"><?php echo $row_ReSupplier['tinco_desc']; ?></div></td>
    <td><div align="center" class="Style5"> 
        <?php 
											/*	22 02 2013 
											 meme motifif ( $CUR=='$') {echo $CUR.number_format($row_ReSupplier[$tbuying_ppu],4,',', ' ');}
	     			                         else {echo number_format($row_ReSupplier[$tbuying_ppu],4,',', ' ').$CUR;}
											*/
												 echo number_format($row_ReSupplier['tbuying_ppu'],4,',', ' ').' '.$row_ReSupplier['tcur_desc']; 
	      									    ?>
      </div></td>
    <td nowrap class="Style9 Style30"><div align="center"><span class="Style16 Style31"><em><span class="Style30"><?php echo number_format($row_ReSupplier['tbuying_qu'],0,',', ' ');  ?></span></em></span></div></td>
    <td><div align="center"><span class="Style5"><?php echo $row_ReSupplier['tbuying_dbid']; ?></span></div></td>
  
    <td nowrap><div align="center"><span class="Style5"><?php echo $row_ReSupplier['ttransport_desc']; ?></span></div></td>
    <td nowrap><div align="center"><span class="Style5"><?php echo $row_ReSupplier['tbuying_lead_time']; ?></span></div></td>
    <td><div align="center"><span class="Style30"><span class="Style9 Style30"><?php echo $row_ReSupplier['tbuying_remark']; ?></span></span></div></td>
  </tr>
  <?php  $cpt=$cpt+1; 
  } while ($row_ReSupplier = mysqli_fetch_assoc($ReSupplier)); ?>
</table>
<?php
// cas où on a qu'un sujet de débat
// 22 02 2013
// Dans ce cas pas de test de devise ce sear affiché comme cela a ete encodé
// j'enlève la possibilté d'exporter vers excel
?>
</body>
</html>
<?php
mysqli_free_result($ReSupplier);
?>
