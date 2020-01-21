<?php 
session_start();
require_once('../Connections/cibproto.php'); 
require_once ("utilang_en.php");
require_once ("aic_sel_parameters.php");
$CUR='€';
// $cur_price="tbuying_ppu_dol";
$NOM = $_SERVER['SCRIPT_NAME'];
//echo "SCRIPT_NAME =$NOM <BR>";
$pForm_Name= $_POST['pForm_Name'] ;
//echo " pForm_Name=$pForm_Name <BR>";
$previous_menu="t_search_price_supp_range_eur_c.php";
if ( $pCure =='EUR') {
$TCUR_SYMB = "€";
$tbuying_price_per_pack="tbuying_price_per_pack_eur";
$tbuying_tcost="tbuying_tcost_eur";
$tbuying_ppu="tbuying_ppu_eur";
}
else 
{
$TCUR_SYMB = "$";
$tbuying_price_per_pack="tbuying_price_per_pack_dol";
$tbuying_tcost="tbuying_tcost_dol";
$tbuying_ppu="tbuying_ppu_dol";
}

 mysqli_select_db($database_cibproto, $cibproto);
 		
	$query_Redetsup = 
	"SELECT tecowas_desc,tproduct_desc, tpresent_desc, tprov_desc, tprov_coun_desc, tmanu_desc, tmanu_coun_desc,tbuying_pack_size,
{$tbuying_price_per_pack},tbuying_qty_pack, {$tbuying_tcost}, tinco_desc,{$tbuying_ppu},
DATE_FORMAT(tbuying_dbid,'%d-%m-%Y') tbuying_dbid ,tecowas_desc,ttransport_desc, tbuying_lead_time, tbuying_remark
FROM $view_table_name where tbuying_status='1'";
	
	 $query_Redetsup.= $param_country.$param_cat.$param_prod.$param_prov;
 
	 $query_Redetsup.= " AND ({$tbuying_ppu} between '$pMini' and '$pMaxi' or ('$pMini' is NULL and '$pMaxi' is NULL))";
   
		
  //  echo "PREMIER TEST = $query_Redetsup <BR>"; 
	
     $Redetsup = mysqli_query($query_Redetsup, $cibproto) or die(mysqli_error());
     $row_Redetsup = mysqli_fetch_assoc($Redetsup);
     $totalRows_Redetsup = mysqli_num_rows($Redetsup);
	// echo "totalRows_Redetsup=$totalRows_Redetsup <BR>";
	 
	 if ($totalRows_Redetsup == 0 ){
		
		echo "<script language='JavaScript'>alert('No data found !') </script>"; 
		require_once ($pForm_Name);
		exit;
  		}
		

mysqli_select_db($database_cibproto, $cibproto);
$query_Regroupsup = "SELECT tbuying_rowid, tbuying_prov_id, tprov_desc,tprov_coun_id
FROM $view_provider_occ ";
$Regroupsup = mysqli_query($query_Regroupsup, $cibproto) or die(mysqli_error());
$row_Regroupsup = mysqli_fetch_assoc($Regroupsup);
$totalRows_Regroupsup = mysqli_num_rows($Regroupsup);
// echo "Nombre de records=$totalRows_Regroupsup <BR>";
if ($totalRows_Regroupsup ==0) {
	exit;
  }
?>
<?php
/*
$currentPage = $_SERVER["PHP_SELF"];
*/
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>List of product  by price for each supplier - aic_list_supp_price_prod_dol_c.php</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.Style6 {color: #000066}
.Style7 {font-size: 24px}
.Style9 {font-size: 12px}
.Style25 {
	font-size: 12px;
	color: #000066;
}
.Style1 {font-size: 24px}


.Style30 {font-size: 12px}
.Style49 {color: #000000}
.Style52 {
	font-size: 24px;
	color: #000000;
	font-weight: bold;
}
.Style88 {font-size: 12px; color: #990000; }
.Style91 {color: #0000FF}
-->
</style></head>

<body>
<div align="center"></div>
<table width="100%"  border="1" cellspacing="1" cellpadding="1" summary="Lowest Price per period">
  <caption class="Style1">&nbsp;
  </caption>
</table>


<div align="center"><span class="Style7 Style49"><span class="Style1"><span class="Style52"> <span class="Style62">  </span></span></span></span>
</div>
<table width="963" border="1" cellpadding="2" cellspacing="2">
  <tr>
    <th width="126" scope="row"><div align="center" class="Style25"><a href="t_search_price_supp_range_dol_c.php" title="Retour" class="Style7 Style6 "><span class="Style88">Back</span></a></div></th>
    <td width="571"><div align="center" class="Style7 Style49"><span class="Style30">List of products group by supplier from
      <?php 
     echo "{$pDsta}  to {$pDend} ";
             ?>
    </span>        </div></td>
    <td width="138"><div align="center" class="Style9">username:
            <?php
				echo "{$_SESSION['username']}";
	?>
    </div></td>
    <td width="92"><div align="center" class="Style9">Date :
            <?php 
      $today = date ("  D j, M,Y  H:i:s");
      echo " $today "; ?>
    </div></td>
  </tr>
</table>

<p>&nbsp;</p>
<table width="100%"  border="1" cellspacing="1" cellpadding="1" summary="Lowest Price per period">
  <?php do {
   ?>
  
    <?php 
	 $AIMP=$row_Regroupsup['tbuying_prov_id'];
	 $compteur=0;
	//  echo AIMP row_Regroupsup.tbuying_prov_id=$AIMP<BR>";
	 mysqli_select_db($database_cibproto, $cibproto);
 		
	$query_Redetsup = 
	"SELECT tecowas_desc,tproduct_desc, tpresent_desc, tprov_desc, tprov_coun_desc, tmanu_desc, tmanu_coun_desc,tbuying_pack_size,
{$tbuying_price_per_pack},tbuying_qty_pack, {$tbuying_tcost}, tinco_desc,{$tbuying_ppu},
DATE_FORMAT(tbuying_dbid,'%d-%m-%Y') tbuying_dbid ,tecowas_desc,ttransport_desc, tbuying_lead_time, tbuying_remark
FROM $view_table_name where tprov_id=$AIMP and tbuying_status='1'";
	
	 $query_Redetsup.= $param_country.$param_cat.$param_prod.$param_prov;
 
	 $query_Redetsup.= " AND ({$tbuying_ppu} between '$pMini' and '$pMaxi' or ('$pMini' is NULL and '$pMaxi' is NULL))
   
		 ORDER BY tprov_desc, tproduct_desc";
  //  echo "Dans la boucle detail= $query_Redetsup <BR>"; 
	
     $Redetsup = mysqli_query($query_Redetsup, $cibproto) or die(mysqli_error());
     $row_Redetsup = mysqli_fetch_assoc($Redetsup);
     $totalRows_Redetsup = mysqli_num_rows($Redetsup);
	// echo "totalRows_Redetsup=$totalRows_Redetsup <BR>";
	 
	 if ($totalRows_Redetsup < 1 ){
		/*
		 echo "<script language='JavaScript'>alert('Pas d\'enregistrement bbbb !!') </script>"; 
		*/ 
		// require_once ("t_search_price_supp_range_dol.php");
		continue;
  		}
		
		if ($compteur==0)
		{
		?>
		
		<tr>
  		  <td><div align="center" class="Style9">
  	      <p align="left" class="Style62 Style63 Style9 Style86 Style91"><?php echo $row_Regroupsup['tprov_desc'].' ('.$row_Regroupsup['tprov_coun_id'].')'; ?></p>    </td>
  		</tr>
		<?php } 
		
		?>
		
  	   <div align="left">
  	   <table width="200" border="1" cellspacing="0">
  		<tr>
	  <tr>

      <th width="5%" nowrap scope="col"><span class="Style30 Style60">Product description</span></th>
	
      <th width="7%" scope="col"><span class="Style30 Style60">Pack size</span></th>
     
      <th width="2%" scope="col"><span class="Style30 Style60">Price per pack</span></th>
      <th width="2%" scope="col"><span class="Style30 Style60">Quantity</span></th>
     <th width="2%" nowrap scope="col"><span class="Style30 Style60">Total cost</span></th>
	 <th width="2%" nowrap scope="col"><span class="Style30 Style60"> Unit price(smallest unit)</span></th> 
     <th width="5%" nowrap scope="col"><span class="Style30 Style60">Incoterm </span></th>
      <th width="6%" scope="col"><span class="Style30 Style60">Date of bid opening /Date of reception </span></th>
      <th width="5%" nowrap scope="col"><span class="Style30 Style60">Supplied to</span></th>
      <th width="5%" scope="col"><span class="Style30">Transportation method</span></th>
	    <th width="5%" scope="col"><span class="Style30">Lead time (days)</span></th>
	    <th width="5%" scope="col"><span class="Style9 Style30">Comments</span></th>
  </tr>
              <?php do { ?>

              <tr><td nowrap><span class="Style63"> <?php echo $row_Redetsup['tproduct_desc']; ?> </span></td>
			  <td nowrap><div align="center"><span class="Style63"><?php echo $row_Redetsup['tbuying_pack_size']; ?></span></div></td>
              <td nowrap><div align="center"><span class="Style63"><?php echo $row_Redetsup[$tbuying_price_per_pack].$CUR; ?></div></span></td>
              <td nowrap><div align="center"><span class="Style63"><?php echo $row_Redetsup['tbuying_qty_pack']; ?></div></span></td>
			  <td nowrap><div align="center"><span class="Style63"><?php echo $row_Redetsup[$tbuying_tcost].$CUR; ?></div></span></td>
              <td nowrap><div align="center"><span class="Style63"><?php echo $row_Redetsup[$tbuying_ppu].$CUR; ?></div></span></td>
	          <td nowrap><div align="center"><span class="Style63"><?php echo $row_Redetsup['tinco_desc']; ?></div></span></td>
              <td nowrap ><div align="center"><span class="Style63"><?php echo $row_Redetsup['tbuying_dbid']; ?></div></span></td>
			  <td nowrap><div align="center"><span class="Style63"><?php echo $row_Redetsup['tecowas_desc']; ?></div></span></td>
			    <td nowrap><div align="center"><span class="Style63"><?php echo $row_Redetsup['ttransport_desc']; ?></div></span></td>
			  <td nowrap><div align="center"><span class="Style63"><?php echo $row_Redetsup['tbuying_lead_time']; ?></div></span></td>
              <td nowrap><div align="center"><span class="Style63"><?php echo $row_Redetsup['tbuying_remark']; ?></div></span></td>
			</tr>
			</div>
            <?php $compteur = $compteur + 1;
	//		echo "XXXXX compteur boucle =$compteur <BR>"; 
	} while ($row_Redetsup = mysqli_fetch_assoc($Redetsup));
     mysqli_free_result($Redetsup);
    ?>
            
    </tr>
    </table>
  
    </td>
  
  <?php } while ($row_Regroupsup = mysqli_fetch_assoc($Regroupsup)); 
  
  ?> 
</table>
</body>
</html>
<?php
mysqli_free_result($Regroupsup);
?>
