<?php 
session_start();
require_once('../Connections/cibproto.php'); ?>
<?php
require_once ("utilang_en.php");
$CUR='$';

$NOM = $_SERVER['SCRIPT_NAME'];
$pForm_Name= $_POST['pForm_Name'] ;
//echo " pForm_Name=$pForm_Name <BR>";
require_once ("aic_sel_parameters.php");
require_once ("aic_prod_query_supplier.php");
$previous_menu="t_search_supman_dol_c.php";

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Report List of product per supplier per manufacturer - aic_list_prod_per_supman_dol.php</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.Style6 {color: #000066}
.Style7 {font-size: 24px}
.Style9 {font-size: 12px}
.Style25 {
	font-size: 14px;
	color: #990000;
}
.Style1 {font-size: 24px}


.Style30 {font-size: 12px}
.Style49 {color: #000000}
.Style87 {color: #000099;
	font-weight: bold;
}
.Style50 {font-size: 18px}
-->
</style>
</head>

<body>
<table width="963" border="1" cellpadding="2" cellspacing="2">
  <tr>
    <th width="126" scope="row"><div align="center"><span class="Style1"><a href="t_search_supman_dol_c.php" title="Retour" class="Style7 Style6 "><span class="Style3"><span class="Style25">Back</span></span></a></span></div></th>
    <td width="571"><div align="center" class="Style7 Style49"> <span class="Style30">List of products per suppliers and manufacturers from 
        <?php 
     echo "{$pDsta}  to {$pDend} ";
             ?>
    </span>             </div></td>
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

<table width=100%"  border="1" cellspacing="1" cellpadding="1">
    <caption>&nbsp;
    </caption>
  <tr class="Style30">
    <th width="6%" scope="col"><span class="Style5">S/N</span></th>
    <th width="5%" scope="col"><span class="Style5">Product description</span></th>

    <th width="5%" nowrap scope="col"><span class="Style5">Presentation</span></th>
	  <th width="5%" nowrap scope="col"><span class="Style5">Supplier</span></th>
    <th width="5%" nowrap scope="col"><span class="Style5">Manufacturer</span></th>
    <th width="5%" scope="col"><span class="Style5">Pack size</span></th>

    <th width="5%" nowrap scope="col"><span class="Style5">Price per pack</span></th>
    <th width="5%" nowrap scope="col"><span class="Style5">Quantity</span></th>

    <th width="5%" scope="col"><span class="Style5">Total cost</span><span class="Style5"></span></th>
    <th width="5%" scope="col"><span class="Style5"> Incoterm </span></th>
   
    <th width="7%" scope="col"><p class="Style5">Unit price (smallest unit)</p>    </th>
	  <th width="7%" nowrap scope="col"><p class="Style5">Date of bid opening / Date of reception</p>
        <p class="Style5">(dd-mm-yyyy)</p></th>
    <th width="7%" scope="col"><span class="Style5">Supplied to</span></th>
    <th width="7%" scope="col"><span class="Style5">Transportation method </span></th>
	 <th width="7%" scope="col"><span class="Style5">Lead time (days)</span></th>
	<th width="5%" scope="col"><span class="Style9 Style30">Comments</span></th>
  </tr>
  <?php $cpt=1; 
  do { ?>
  <tr class="Style30">
    <td height="23"><div align="center" class="Style5"><strong><strong><?php echo $cpt; ?></strong> </strong></div></td>
    <td><div align="center" class="Style5"><?php echo $row_ReSupplier['tproduct_desc']; ?></div></td>
    <td><div align="center" class="Style5"><?php echo $row_ReSupplier['tpresent_desc']; ?></div></td>

    <td><div align="center"><span class="Style5"><?php echo $row_ReSupplier['tprov_desc']."<BR>".$row_ReSupplier['tprov_coun_desc'] ; ?></span></div></td>
    <td><div align="center"><span class="Style5"><?php echo $row_ReSupplier['tmanu_desc']."<BR>".$row_ReSupplier['tmanu_coun_desc']; ?></span></div></td>
    <td><div align="center" class="Style5"><?php echo $row_ReSupplier['tbuying_pack_size']; ?></div></td>

    <td class="Style5"><div align="center"><?php echo $row_ReSupplier['tbuying_price_per_pack_dol'].$CUR; ?></div></td>
   
    <td><div align="center"><span class="Style5"><?php echo $row_ReSupplier['tbuying_qty_pack']; ?></span></div></td>
 
    <td><div align="center"><span class="Style5"><?php echo $row_ReSupplier['tbuying_tcost_dol'].$CUR; ?></span></div></td>
    <td><div align="center" class="Style5"><?php echo $row_ReSupplier['tinco_desc']; ?></div></td>
   
    <td><div align="center" class="Style5"><?php echo $row_ReSupplier['tbuying_ppu_dol'].$CUR; ?></div></td>
    <td><div align="center"><span class="Style5"><?php echo $row_ReSupplier['tbuying_dbid']; ?></span></div></td>
   <td><div align="center"><span class="Style5"><?php echo $row_ReSupplier['tecowas_desc']; ?></span></div></td>
   <td nowrap><div align="center"><span class="Style5"><?php echo $row_ReSupplier['ttransport_desc']; ?></span></div></td>
    <td nowrap><div align="center"><span class="Style5"><?php echo $row_ReSupplier['tbuying_lead_time']; ?></span></div></td>
	 <td><div align="center"><span class="Style30"><span class="Style9 Style30"><?php echo $row_ReSupplier['tbuying_remark']; ?></span></span></div></td>
   
  </tr>
  <?php  $cpt=$cpt+1; 
  } while ($row_ReSupplier = mysqli_fetch_assoc($ReSupplier)); ?>
</table>
<p align="center"><span class="Style87"><a href="export_excel_report.php?requete=<?PHP echo $query_ReSupplier?>&choix=2 &cur='$'" class="Style6"><span class="Style62 Style6 Style25 Style54"><span class="Style62 Style6  Style25 Style89"><span class="Style22 Style50">Export to excel</span></span></span></a></span></p>
</body>
</html>
<?php
mysqli_free_result($ReSupplier);
?>
