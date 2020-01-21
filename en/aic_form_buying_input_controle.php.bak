<?php 
session_start();
require_once('../Connections/cibproto.php'); 

 $Space = "   FROM COUNTRY : ";
 
  require_once ("utilang.php");
 ?>
<?php
//
// Ajout de la fonctionalite de forcer le Total Cost = Qty of unit * PPU
// le total_cost est CALCULE
//
/*
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}
*/

$t_ec_id = $_SESSION['COUNTRY'];
$tbuying_auth = $_SESSION['username'];
//echo " XXXXXXXXXXXX  t_ec_id = $t_ec_id";
//echo " XXXXXXXXXXXXXX  tbuying_auth = $tbuying_auth";

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "aic_form_buying"))
 {
/*
if (ControleInsert($_POST)) 
{

	mysqli_select_db($database_cibproto, $cibproto);
	$query = "SELECT * FROM tprov_country_en_view where tprov_id = {$_POST['tbuying_prov_id']}";
// echo "XXXquery=$query<BR>";

//exécution de la requête et récupération du nombre de résultats

	$result = mysqli_query($query, $cibproto)or die(mysqli_error());;
	$affected_rows = mysqli_num_rows($result);

//S'il y a exactement un résultat, l'utilisateur est authentifié, sinon, on l'empêche d'entrer
	if($affected_rows == 1) {
	$pointeur_prov=mysqli_fetch_object ($result); 
	$VAR_PAYS_PROV = $pointeur_prov->tprov_coun_id;

	}

mysqli_select_db($database_cibproto, $cibproto);
$query = "SELECT * FROM tmanuf_country_en_view where tmanu_id = {$_POST['tbuying_manu_id']}";
// echo "XXXquery=$query<BR>";

//exécution de la requête et récupération du nombre de résultats

$result = mysqli_query($query, $cibproto)or die(mysqli_error());;
$affected_rows = mysqli_num_rows($result);

//S'il y a exactement un résultat, l'utilisateur est authentifié, sinon, on l'empêche d'entrer
if($affected_rows == 1) {

$pointeur_manu=mysqli_fetch_object ($result); 

}

//
if ( $_POST['tbuying_cur_id'] =='EUR')
{
$CUR_VAL = $_SESSION['TCURVAL_EUR'];
$PPU_DOL = $_POST['tbuying_ppu'] * $CUR_VAL;
$PPP_DOL = $_POST['tbuying_price_per_pack'] * $CUR_VAL;
$PPU_EUR = $_POST['tbuying_ppu'] ;
$PPP_EUR = $_POST['tbuying_price_per_pack'] ;


}
else {
$CUR_VAL = $_SESSION['TCURVAL_DOL'];
$PPU_EUR = $_POST['tbuying_ppu'] * $CUR_VAL;
$PPP_EUR = $_POST['tbuying_price_per_pack'] * $CUR_VAL;

$PPU_DOL = $_POST['tbuying_ppu'] ;
$PPP_DOL = $_POST['tbuying_price_per_pack'] ;


}

////////////////
mysqli_select_db($database_cibproto, $cibproto);
$query = "select STR_TO_DATE('{$_POST['tbuying_dbid']}', '%d-%m-%Y' ) Date_bid";

// echo "XXXquery=$query<BR>";

//exécution de la requête et récupération du nombre de résultats

$result = mysqli_query($query, $cibproto)or die(mysqli_error());;
$affected_rows = mysqli_num_rows($result);

//S'il y a exactement un résultat, l'utilisateur est authentifié, sinon, on l'empêche d'entrer
if($affected_rows == 1) {

$pointeur_dbid=mysqli_fetch_object ($result); 

$dbid = $pointeur_dbid->Date_bid;
///////////
// echo "XXXXXXXXXXXXXXdbid=$dbid <BR>";
}


 $insertSQL = sprintf("INSERT INTO tbuying_07
 (tbuying_ec_id, tbuying_product_id, 
  tbuying_uv,
  tbuying_concent_id, tbuying_categ_id, tbuying_dosage_id, 
  tbuying_smalunit_id, tbuying_us, 
  tbuying_pack_id, tbuying_ppu, tbuying_ppu_dol, tbuying_ppu_eur, tbuying_tcost, tbuying_qu, tbuying_price_per_pack,
  tbuying_price_per_pack_dol, tbuying_price_per_pack_eur, tbuying_pack_size, tbuying_lead_time,  tbuying_present_id, 
  tbuying_inco_id, tbuying_dbid, tbuying_cur_id, tbuying_exr, tbuying_ppu_cur, tbuying_srcfund_id,
  tbuying_prov_id, tbuying_type_prov_id, tbuying_prov_coun_id, tbuying_manu_id,tbuying_manu_coun_id,
  tbuying_transport_id, tbuying_date, tbuying_auth,
  tbuying_dmod, tbuying_remark, tbuying_status) 
  VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s ,%s, %s, %s ,%s, %s, %s, %s, %s,%s, %s, %s, 
  %s,%s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($t_ec_id, "text"),
					   GetSQLValueString($_POST['tbuying_product_id'], "text"),
                       GetSQLValueString($_POST['tbuying_uv'], "text"),
                       GetSQLValueString($_POST['tbuying_concent_id'], "text"),
                       GetSQLValueString($_POST['tbuying_categ_id'], "text"),
                       GetSQLValueString($_POST['tbuying_dosage_id'], "text"), 
                       GetSQLValueString($_POST['tbuying_smalunit_id'], "int"),
                       GetSQLValueString($_POST['tbuying_us'], "text"),
                       GetSQLValueString($_POST['tbuying_pack_id'], "int"),
                       GetSQLValueString($_POST['tbuying_ppu'], "text"),
					   GetSQLValueString($PPU_DOL, "double"),
					   GetSQLValueString($PPU_EUR, "double"),
 	                   GetSQLValueString($_POST['tbuying_ppu'] * $_POST['tbuying_qu'], "text"),
                       GetSQLValueString($_POST['tbuying_qu'], "text"),
					   GetSQLValueString($_POST['tbuying_price_per_pack'], "double"),
					   GetSQLValueString($PPP_DOL, "double"),
					   GetSQLValueString($PPP_EUR, "double"),
					   GetSQLValueString($_POST['tbuying_pack_size'], "text"),
					   GetSQLValueString($_POST['tbuying_lead_time'], "text"),
                       GetSQLValueString($_POST['tbuying_present_id'], "int"),
                       GetSQLValueString($_POST['tbuying_inco_id'], "text"),
           			   GetSQLValueString($dbid, "date"),
                       GetSQLValueString($_POST['tbuying_cur_id'], "text"),
                       GetSQLValueString($_POST['tbuying_exr'], "double"),
					   GetSQLValueString($_POST['tbuying_ppu'] * $CUR_VAL, "double") ,
                       GetSQLValueString($_POST['tbuying_srcfund_id'], "text"),
                       GetSQLValueString($_POST['tbuying_prov_id'], "int"),
                       GetSQLValueString($_POST['tbuying_type_prov_id'], "text"),
  					   GetSQLValueString($pointeur_prov->tprov_coun_id, "text"),
					   GetSQLValueString($_POST['tbuying_manu_id'], "text"),
					   GetSQLValueString($pointeur_manu->tmanu_coun_id, "text"),
					   GetSQLValueString($_POST['tbuying_transport_id'], "text"),
                       GetSQLValueString($_POST['tbuying_date'], "date"),
                       GetSQLValueString($tbuying_auth , "text"),
                       GetSQLValueString($_POST['tbuying_dmod'], "date"),
                       GetSQLValueString($_POST['tbuying_remark'], "text"),
                       2);

  mysqli_select_db($database_cibproto, $cibproto);
  $Result1 = mysqli_query($insertSQL, $cibproto) or die(mysqli_error());

$i=1;
while ($i <= 1000)
{
   
   $i++;
}
echo " 1 Record inserted<BR>";
  
}
else {
// Erreur rencontrée : sortie prematuree du script 
 // echo "</BODY><HTML>";
echo "XXXXXXXXXXXXXXXXXXXXXXXXXXX";
exit;
 }
 
  /////////////////////
  
  ///////////////////
  // Pourquoi revenir au menu c'est pas normal  A REVOIR 
  //
 // header(sprintf("Location: %s", $insertGoTo));
*/
}

mysqli_select_db($database_cibproto, $cibproto);
$query_Re_tbuying = "SELECT * FROM tbuying_07";
$Re_tbuying = mysqli_query($query_Re_tbuying, $cibproto) or die(mysqli_error());
$row_Re_tbuying = mysqli_fetch_assoc($Re_tbuying);
$totalRows_Re_tbuying = mysqli_num_rows($Re_tbuying);

mysqli_select_db($database_cibproto, $cibproto);
$query_Re_product = "SELECT * FROM $Product WHERE tproduct_status = '1' order by tproduct_id ";
$Re_product = mysqli_query($query_Re_product, $cibproto) or die(mysqli_error());
$row_Re_product = mysqli_fetch_assoc($Re_product);
$totalRows_Re_product = mysqli_num_rows($Re_product);


mysqli_select_db($database_cibproto, $cibproto);
$query_Re_concent = "SELECT * FROM $Concentration WHERE tconcent_status = '1' ORDER BY tconcent_desc ASC";
$Re_concent = mysqli_query($query_Re_concent, $cibproto) or die(mysqli_error());
$row_Re_concent = mysqli_fetch_assoc($Re_concent);
$totalRows_Re_concent = mysqli_num_rows($Re_concent);

mysqli_select_db($database_cibproto, $cibproto);
$query_Re_category = "SELECT tcateg_id, tcateg_desc, tcateg_status FROM $Category WHERE tcateg_status = '1' ORDER BY tcateg_desc";
$Re_category = mysqli_query($query_Re_category, $cibproto) or die(mysqli_error());
$row_Re_category = mysqli_fetch_assoc($Re_category);
$totalRows_Re_category = mysqli_num_rows($Re_category);

mysqli_select_db($database_cibproto, $cibproto);
$query_Re_prod_categ = "SELECT tcateg_id, tcateg_desc, tcateg_status FROM $Category WHERE tcateg_status = 1 ORDER BY tcateg_desc";
$Re_prod_categ = mysqli_query($query_Re_prod_categ, $cibproto) or die(mysqli_error());
$row_Re_prod_categ = mysqli_fetch_assoc($Re_prod_categ);
$totalRows_Re_prod_categ = mysqli_num_rows($Re_prod_categ);

mysqli_select_db($database_cibproto, $cibproto);
$query_Re_dosage = "SELECT tdosage_id, tdosage_desc, tdosage_status FROM $Dosage WHERE tdosage_status='1' ORDER BY tdosage_desc";
$Re_dosage = mysqli_query($query_Re_dosage, $cibproto) or die(mysqli_error());
$row_Re_dosage = mysqli_fetch_assoc($Re_dosage);
$totalRows_Re_dosage = mysqli_num_rows($Re_dosage);

mysqli_select_db($database_cibproto, $cibproto);
$query_Re_smalunit = "SELECT tsmalunit_id, tsmalunit_desc, tsmalunit_status FROM  $Smalunit WHERE tsmalunit_status = '1' ORDER BY tsmalunit_desc";
$Re_smalunit = mysqli_query($query_Re_smalunit, $cibproto) or die(mysqli_error());
$row_Re_smalunit = mysqli_fetch_assoc($Re_smalunit);
$totalRows_Re_smalunit = mysqli_num_rows($Re_smalunit);

mysqli_select_db($database_cibproto, $cibproto);
$query_Re_packaging = "SELECT tpack_id, tpack_desc, tpack_status FROM $Pack WHERE tpack_status = '1' ORDER BY tpack_desc";
$Re_packaging = mysqli_query($query_Re_packaging, $cibproto) or die(mysqli_error());
$row_Re_packaging = mysqli_fetch_assoc($Re_packaging);
$totalRows_Re_packaging = mysqli_num_rows($Re_packaging);

mysqli_select_db($database_cibproto, $cibproto);
$query_Re_present = "SELECT tpresent_id, tpresent_desc, tpresent_status FROM $Present WHERE tpresent_status = '1' ORDER BY tpresent_desc";
$Re_present = mysqli_query($query_Re_present, $cibproto) or die(mysqli_error());
$row_Re_present = mysqli_fetch_assoc($Re_present);
$totalRows_Re_present = mysqli_num_rows($Re_present);

mysqli_select_db($database_cibproto, $cibproto);
$query_Re_currency = "SELECT tcur_id, tcur_desc FROM $Cur WHERE tcur_status = '1'";
$Re_currency = mysqli_query($query_Re_currency, $cibproto) or die(mysqli_error());
$row_Re_currency = mysqli_fetch_assoc($Re_currency);
$totalRows_Re_currency = mysqli_num_rows($Re_currency);

$colname_Re_srcfund = "1";
if (isset($_GET['1'])) {
  $colname_Re_srcfund = (get_magic_quotes_gpc()) ? $_GET['1'] : addslashes($_GET['1']);
}
mysqli_select_db($database_cibproto, $cibproto);
$query_Re_srcfund = sprintf("SELECT tsrcfund_id, tsrcfund_desc FROM $Srcfund WHERE tsrcfund_status = '%s'", $colname_Re_srcfund);
$Re_srcfund = mysqli_query($query_Re_srcfund, $cibproto) or die(mysqli_error());
$row_Re_srcfund = mysqli_fetch_assoc($Re_srcfund);
$totalRows_Re_srcfund = mysqli_num_rows($Re_srcfund);

$colname_Re_provider = "1";
if (isset($_GET['1'])) {
  $colname_Re_provider = (get_magic_quotes_gpc()) ? $_GET['1'] : addslashes($_GET['1']);
}
mysqli_select_db($database_cibproto, $cibproto);
$query_Re_provider = sprintf("SELECT tprov_id, tprov_coun_id, 
tprov_desc FROM tprovider WHERE tprov_status = '%s'", $colname_Re_provider);
$Re_provider = mysqli_query($query_Re_provider, $cibproto) or die(mysqli_error());
$row_Re_provider = mysqli_fetch_assoc($Re_provider);
$totalRows_Re_provider = mysqli_num_rows($Re_provider);

$colname_Re_ttype_prov = "1";
if (isset($_GET['1'])) {
  $colname_Re_ttype_prov = (get_magic_quotes_gpc()) ? $_GET['1'] : addslashes($_GET['1']);
}

mysqli_select_db($database_cibproto, $cibproto);
$query_Re_ttype_prov = sprintf("SELECT ttype_prov_id, ttype_prov_desc FROM $Typrov WHERE ttype_prov_status = '%s' ORDER BY ttype_prov_desc ASC", $colname_Re_ttype_prov);
$Re_ttype_prov = mysqli_query($query_Re_ttype_prov, $cibproto) or die(mysqli_error());
$row_Re_ttype_prov = mysqli_fetch_assoc($Re_ttype_prov);
$totalRows_Re_ttype_prov = mysqli_num_rows($Re_ttype_prov);

mysqli_select_db($database_cibproto, $cibproto);
$query_Re_country = "SELECT tcountry_id, tcountry_desc, tcountry_status FROM $Country WHERE tcountry_status = '1' ORDER BY tcountry_desc ASC";
$Re_country = mysqli_query($query_Re_country, $cibproto) or die(mysqli_error());
$row_Re_country = mysqli_fetch_assoc($Re_country);
$totalRows_Re_country = mysqli_num_rows($Re_country);

$colname_Re_transport = "1";
if (isset($_GET['1'])) {
  $colname_Re_transport = (get_magic_quotes_gpc()) ? $_GET['1'] : addslashes($_GET['1']);
}
mysqli_select_db($database_cibproto, $cibproto);
$query_Re_transport = sprintf("SELECT ttransport_id, ttransport_desc FROM $Transport WHERE ttransport_status = '%s'", $colname_Re_transport);
$Re_transport = mysqli_query($query_Re_transport, $cibproto) or die(mysqli_error());
$row_Re_transport = mysqli_fetch_assoc($Re_transport);
$totalRows_Re_transport = mysqli_num_rows($Re_transport);

mysqli_select_db($database_cibproto, $cibproto);
$query_Re_tincoterm = "SELECT tinco_id, tinco_desc FROM tincoterm WHERE tincoterm.tinco_status = '1'";
$Re_tincoterm = mysqli_query($query_Re_tincoterm, $cibproto) or die(mysqli_error());
$row_Re_tincoterm = mysqli_fetch_assoc($Re_tincoterm);
$totalRows_Re_tincoterm = mysqli_num_rows($Re_tincoterm);

$colname_Re_ecowas = "1";
if (isset($_GET['1'])) {
  $colname_Re_ecowas = (get_magic_quotes_gpc()) ? $_GET['1'] : addslashes($_GET['1']);
}
mysqli_select_db($database_cibproto, $cibproto);
$query_Re_ecowas = sprintf("SELECT tecowas_id, tecowas_desc FROM tecowas WHERE tecowas_status = '%s'", $colname_Re_ecowas);
$Re_ecowas = mysqli_query($query_Re_ecowas, $cibproto) or die(mysqli_error());
$row_Re_ecowas = mysqli_fetch_assoc($Re_ecowas);
$totalRows_Re_ecowas = mysqli_num_rows($Re_ecowas);

$colname_Re_prod = "1";
if (isset($_SESSION['STATCOUNTRY'])) {
  $colname_Re_prod = (get_magic_quotes_gpc()) ? $_SESSION['STATCOUNTRY'] : addslashes($_SESSION['STATCOUNTRY']);
}
mysqli_select_db($database_cibproto, $cibproto);
$query_Re_prod = sprintf("SELECT tproduct_id, tproduct_desc, tproduct_cat, tproduct_status FROM $Product WHERE tproduct_status = '%s'", $colname_Re_prod);
$Re_prod = mysqli_query($query_Re_prod, $cibproto) or die(mysqli_error());
$row_Re_prod = mysqli_fetch_assoc($Re_prod);
$totalRows_Re_prod = mysqli_num_rows($Re_prod);

mysqli_select_db($database_cibproto, $cibproto);
$query_Re_dosage1 = "SELECT tdosage_id, tdosage_desc, tdosage_status FROM $Dosage WHERE tdosage_status = '1' ORDER BY tdosage_desc";
$Re_dosage1 = mysqli_query($query_Re_dosage1, $cibproto) or die(mysqli_error());
$row_Re_dosage1 = mysqli_fetch_assoc($Re_dosage1);
$totalRows_Re_dosage1 = mysqli_num_rows($Re_dosage1);

mysqli_select_db($database_cibproto, $cibproto);
$query_Re_tinco1 = "SELECT tincoterm.tinco_id, tincoterm.tinco_desc, tincoterm.tinco_status FROM tincoterm WHERE tincoterm.tinco_status = '1' ORDER BY tincoterm.tinco_desc";
$Re_tinco1 = mysqli_query($query_Re_tinco1, $cibproto) or die(mysqli_error());
$row_Re_tinco1 = mysqli_fetch_assoc($Re_tinco1);
$totalRows_Re_tinco1 = mysqli_num_rows($Re_tinco1);

mysqli_select_db($database_cibproto, $cibproto);
$query_Re_manuf = "SELECT tmanufacturer.tmanu_id, tmanufacturer.tmanu_coun_id, tmanufacturer.tmanu_desc, tmanufacturer.tmanu_status FROM tmanufacturer WHERE tmanufacturer.tmanu_status = '1' ORDER BY tmanufacturer.tmanu_desc";
$Re_manuf = mysqli_query($query_Re_manuf, $cibproto) or die(mysqli_error());
$row_Re_manuf = mysqli_fetch_assoc($Re_manuf);
$totalRows_Re_manuf = mysqli_num_rows($Re_manuf);


?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Data Input Screen</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.Style1 {
	font-size: 18px;
	color: #0000FF;
	font-weight: bold;
}
.Style19 {
	color: #006600;
	font-weight: bold;
}
.Style20 {font-size: 10px}
.Style21 {font-size: 9px}
.Style22 {color: #990000}
.Style23 {color: #00CC66}
-->
</style>
<script language="JavaScript" type="text/JavaScript">
<!--
function Controle()
{
alert(' COntrole debut XXXXXXXXXXXXXXXXXXXXXX');
if(document.aic_form_input.tbuying_ppu.value=='') // 1
{
echo "XXXXXXXXXXXXXXX PPU";
alert('Unit Price is a Mandatory field !');
document.aic_form_input.tbuying_ppu.focus();

}
else if(isNaN(document.aic_form_input.tbuying_ppu.value)) // 2
{
alert('Unit price is a Numeric field !');
document.aic_form_input.tbuying_ppu.focus();
}
else if(document.aic_form_input.tbuying_qu.value=='') // 1
{
alert('Quantity is a Mandatory field !');
document.aic_form_input.tbuying_qu.focus();

}
else if(isNaN(document.aic_form_input.tbuying_qu.value)) // 2
{
alert('Quantity is a Numeric value !');
document.aic_form_input.tbuying_qu.focus();
}
else if(document.aic_form_input.tbuying_pack_size.value!='') // 1
{
	if(isNaN(document.aic_form_input.tbuying_pack_size.value))
	{
	
		alert('Pack size is a Numeric field !');
		document.aic_form_input.tbuying_pack_size.focus();
    }
	else 
	{
	    if(document.aic_form_input.tbuying_price_per_pack=='')
		{
			alert('Price per pack is Mandatory !');
			document.aic_form_input.tbuying_price_per_pack.focus();
		}
		else
		{
			if(isNaN(document.aic_form_input.tbuying_price_per_pack.value))
			{
				alert('Price per pack is a Numeric field !');
				document.aic_form_input.tbuying_price_per_pack.focus();
			}
			
			
		} // ferme la boucle price_per_pack 
}  // pack_size est un champ vide
	

else if(document.aic_form_input.tbuying_lead_time!='') // 2   if(document.aic_form_input.tbuying_price_per_pack=='')
{
	if(isNaN(document.aic_form_input.tbuying_pack_size.value))
	{
	
		alert('Lead Time is a Numeric field !');
		document.aic_form_input.tbuying_lead_time.focus();
    }
 }

else
{
echo " ELSE XXXXXXX";
document.aic_form_input.method = "POST";
document.aic_form_input.action = "aic_form_buying_input_controle.php";
document.aic_form_input.submit();
}

}
}
//-->
</script>
</head>
<body> 
<form method="post" name="aic_form_input"> 
  <p align="left"><a href="manage_form_ins.php" title="Back">Back</a> 
  <p align="center"> <span class="Style1"> 
    <?php
				echo "$Form_title_en_insert";
	?> 
    </span></p> 
  <table height="500" border="1" align="center" cellpadding="1" cellspacing="1" bgcolor="#ECE9D8" frame="border"> 
    <tr valign="baseline"> 
      <td width="92" align="right" ><div align="center"><span class="Style22">Product</span><span class="Style21 Style22">(*)</span></div></td> 
      <td width="229"> <select name="tbuying_product_id" class="Style19"> 
          <?php
do {  
?> 
          <option value="<?php echo $row_Re_product['tproduct_id']?>"><?php echo $row_Re_product['tproduct_desc']?></option> 
          <?php
} while ($row_Re_product = mysqli_fetch_assoc($Re_product));
  $rows = mysqli_num_rows($Re_product);
  if($rows > 0) {
      mysqli_data_seek($Re_product, 0);
	  $row_Re_product = mysqli_fetch_assoc($Re_product);
  }
?> 
        </select></td> 
      <td align="right" nowrap><div align="center" class="Style22">Presentation<span class="Style21">(*)</span></div></td> 
      <td> <select name="tbuying_present_id" class="Style19"> 
          <?php
do {  
?> 
          <option value="<?php echo $row_Re_present['tpresent_id']?>"><?php echo $row_Re_present['tpresent_desc']?></option> 
          <?php
} while ($row_Re_present = mysqli_fetch_assoc($Re_present));
  $rows = mysqli_num_rows($Re_present);
  if($rows > 0) {
      mysqli_data_seek($Re_present, 0);
	  $row_Re_present = mysqli_fetch_assoc($Re_present);
  }
?> 
        </select></td> 
    </tr> 
    <tr valign="baseline"> 
      <td nowrap align="right" ><div align="center" class="Style23"></div></td> 
      <td><input name="tbuying_uv" type="hidden" value=" "></td> 
      <td align="right" nowrap><div align="center" class="Style22">Incoterm<span class="Style21">(*)</span></div></td> 
      <td> <select name="tbuying_inco_id" class="Style19"> 
          <?php
do {  
?> 
          <option value="<?php echo $row_Re_tinco1['tinco_id']?>"><?php echo $row_Re_tinco1['tinco_desc']?></option> 
          <?php
} while ($row_Re_tinco1 = mysqli_fetch_assoc($Re_tinco1));
  $rows = mysqli_num_rows($Re_tinco1);
  if($rows > 0) {
      mysqli_data_seek($Re_tinco1, 0);
	  $row_Re_tinco1 = mysqli_fetch_assoc($Re_tinco1);
  }
?> 
        </select></td> 
    </tr> 
    <tr valign="baseline"> 
      <td nowrap align="right"><div align="center" class="Style22">Concentration<span class="Style21">(*)</span></div></td> 
      <td><select name="tbuying_concent_id" class="Style19"> 
          <?php
do {  
?> 
          <option value="<?php echo $row_Re_concent['tconcent_id']?>"<?php if (!(strcmp($row_Re_concent['tconcent_id'], $row_Re_tbuying['tbuying_status']))) {echo "SELECTED";} ?>><?php echo $row_Re_concent['tconcent_desc']?></option> 
          <?php
} while ($row_Re_concent = mysqli_fetch_assoc($Re_concent));
  $rows = mysqli_num_rows($Re_concent);
  if($rows > 0) {
      mysqli_data_seek($Re_concent, 0);
	  $row_Re_concent = mysqli_fetch_assoc($Re_concent);
  }
?> 
        </select></td> 
      <td align="right" nowrap background="#990000"><div align="center"><span class="Style22">Date of bid opening <span class="Style21"> (DD-MM-YYYY) (*)</span></span></div></td> 
      <td><input name="tbuying_dbid" type="text" class="Style19" value="<?php
		//$today = date ("Y-m-j");
		$today = date ("j-m-Y");
		echo "$today";
	?>"></td> 
    </tr> 
    <tr valign="baseline"> 
      <td nowrap align="right"><div align="center" class="Style22">Category<span class="Style21">(*)</span></div></td> 
      <td> <select name="tbuying_categ_id" class="Style19"> 
          <?php
do {  
?> 
          <option value="<?php echo $row_Re_category['tcateg_id']?>"<?php if (!(strcmp($row_Re_category['tcateg_id'], $row_Re_tbuying['tbuying_product_id']))) {echo "SELECTED";} ?>><?php echo $row_Re_category['tcateg_id']?></option> 
          <?php
} while ($row_Re_category = mysqli_fetch_assoc($Re_category));
  $rows = mysqli_num_rows($Re_category);
  if($rows > 0) {
      mysqli_data_seek($Re_category, 0);
	  $row_Re_category = mysqli_fetch_assoc($Re_category);
  }
?> 
        </select></td> 
      <td><div align="center" class="Style22"></div></td> 
      <td><div align="left"> </div></td> 
    </tr> 
    <tr valign="baseline"> 
      <td nowrap align="right"><div align="center" class="Style22">Dosage form <span class="Style21">(*)</span></div></td> 
      <td> <select name="tbuying_dosage_id" class="Style19"> 
          <?php
do {  
?> 
          <option value="<?php echo $row_Re_dosage1['tdosage_id']?>"><?php echo $row_Re_dosage1['tdosage_desc']?></option> 
          <?php
} while ($row_Re_dosage1 = mysqli_fetch_assoc($Re_dosage1));
  $rows = mysqli_num_rows($Re_dosage1);
  if($rows > 0) {
      mysqli_data_seek($Re_dosage1, 0);
	  $row_Re_dosage1 = mysqli_fetch_assoc($Re_dosage1);
  }
?> 
        </select></td> 
      <td><div align="center" class="Style22">Source of funding<span class="Style21">(*)</span> </div></td> 
      <td><div align="left"> 
          <select name="tbuying_srcfund_id" class="Style19"> 
            <?php
do {  
?> 
            <option value="<?php echo $row_Re_srcfund['tsrcfund_id']?>"><?php echo $row_Re_srcfund['tsrcfund_desc']?></option> 
            <?php
} while ($row_Re_srcfund = mysqli_fetch_assoc($Re_srcfund));
  $rows = mysqli_num_rows($Re_srcfund);
  if($rows > 0) {
      mysqli_data_seek($Re_srcfund, 0);
	  $row_Re_srcfund = mysqli_fetch_assoc($Re_srcfund);
  }
?> 
          </select> 
        </div> 
    </tr> 
    <tr valign="baseline"> 
      <td nowrap align="right"><div align="center" class="Style22">Smallest unit<span class="Style21">(*)</span></div></td> 
      <td> <select name="tbuying_smalunit_id" class="Style19"> 
          <?php
do {  
?> 
          <option value="<?php echo $row_Re_smalunit['tsmalunit_id']?>"><?php echo $row_Re_smalunit['tsmalunit_desc']?></option> 
          <?php
} while ($row_Re_smalunit = mysqli_fetch_assoc($Re_smalunit));
  $rows = mysqli_num_rows($Re_smalunit);
  if($rows > 0) {
      mysqli_data_seek($Re_smalunit, 0);
	  $row_Re_smalunit = mysqli_fetch_assoc($Re_smalunit);
  }
?> 
        </select></td> 
      <td><div align="center" class="Style22">Provider<span class="Style21">(*)</span></div></td> 
      <td><div align="left"> 
          <select name="tbuying_prov_id" class="Style19" onChange="<?php
$_POST['tbuying_prov_coun_id']=$Space;

			echo $row_Re_provider['tprov_desc'].$Space.$row_Re_provider['tprov_coun_id'];
		 $VAR_PAYS=$row_Re_provider['tprov_coun_id'];
		 $Spacep=$row_Re_provider['tprov_coun_id'];
?>"> 
            <?php
do {  
?> 
            <option value="<?php echo $row_Re_provider['tprov_id'];?>"> 
            <?php 
			echo $row_Re_provider['tprov_desc'].$Space.$row_Re_provider['tprov_coun_id'];
		     $VAR_PAYS=$row_Re_provider['tprov_coun_id'];
		
		?> 
            </option> 
            <?php
} while ($row_Re_provider = mysqli_fetch_assoc($Re_provider));
  $rows = mysqli_num_rows($Re_provider);
  if($rows > 0) {
      mysqli_data_seek($Re_provider, 0);
	  $row_Re_provider = mysqli_fetch_assoc($Re_provider);
  }
?> 
          </select> 
        </div></td> 
    </tr> 
    <tr valign="baseline"> 
      <td nowrap align="right"><div align="center">Unit size</div></td> 
      <td><input name="tbuying_us" type="text" class="Style19" value="" size="10"></td> 
      <td><div align="center"></div></td> 
      <td><div align="left"> 
          <input name="tprov_coun_id" type="hidden" class="Style19" value="<?php echo $row_Re_prov_coun['tprov_coun_id']; ?>"> 
        </div></td> 
    </tr> 
    <tr valign="baseline"> 
      <td nowrap align="right"><div align="center" class="Style22">Packaging type<span class="Style21">(*</span>)</div></td> 
      <td> <select name="tbuying_pack_id" class="Style19"> 
          <?php
do {  
?> 
          <option value="<?php echo $row_Re_packaging['tpack_id']?>"><?php echo $row_Re_packaging['tpack_desc']?></option> 
          <?php
} while ($row_Re_packaging = mysqli_fetch_assoc($Re_packaging));
  $rows = mysqli_num_rows($Re_packaging);
  if($rows > 0) {
      mysqli_data_seek($Re_packaging, 0);
	  $row_Re_packaging = mysqli_fetch_assoc($Re_packaging);
  }
?> 
        </select></td> 
      <td><div align="center" class="Style22">Provider type<span class="Style21">(*)</span></div></td> 
      <td><div align="left"> 
          <select name="tbuying_type_prov_id" class="Style19"> 
            <?php
do {  
?> 
            <option value="<?php echo $row_Re_ttype_prov['ttype_prov_id']?>"><?php echo $row_Re_ttype_prov['ttype_prov_desc']?></option> 
            <?php
} while ($row_Re_ttype_prov = mysqli_fetch_assoc($Re_ttype_prov));
  $rows = mysqli_num_rows($Re_ttype_prov);
  if($rows > 0) {
      mysqli_data_seek($Re_ttype_prov, 0);
	  $row_Re_ttype_prov = mysqli_fetch_assoc($Re_ttype_prov);
  }
?> 
          </select> 
        </div></td> 
    </tr> 
    <tr valign="baseline"> 
      <td nowrap align="right"><div align="center" class="Style22">Unit price<span class="Style21">(*)</span></div></td> 
      <td><input name="tbuying_ppu" type="text" class="Style19" size="32" value="<?php echo @$_POST['tbuying_ppu'] ?>" > </td> 

      <td><div align="center" class="Style22">Manufacturer<span class="Style21">(*)</span></div></td> 
      <td><div align="left"> 
          <select name="tbuying_manu_id" class="Style19"> 
            <?php
do {  
?> 
            <option value="<?php echo $row_Re_manuf['tmanu_id']?>"> <?php echo $row_Re_manuf['tmanu_desc'].$Space.$row_Re_manuf['tmanu_coun_id'];
		?></option> 
            <?php
} while ($row_Re_manuf = mysqli_fetch_assoc($Re_manuf));
  $rows = mysqli_num_rows($Re_manuf);
  if($rows > 0) {
      mysqli_data_seek($Re_manuf, 0);
	  $row_Re_manuf = mysqli_fetch_assoc($Re_manuf);
  }
?> 
          </select> 
        </div></td> 
    </tr> 
    <tr valign="baseline"> 
      <td nowrap align="right"><div align="center" class="Style22">Currency<span class="Style21">(*)</span></div></td> 
      <td><select name="tbuying_cur_id" class="Style19"> 
          <?php
do {  
?> 
          <option value="<?php echo $row_Re_currency['tcur_id']?>"><?php echo $row_Re_currency['tcur_desc']?></option> 
          <?php
} while ($row_Re_currency = mysqli_fetch_assoc($Re_currency));
  $rows = mysqli_num_rows($Re_currency);
  if($rows > 0) {
      mysqli_data_seek($Re_currency, 0);
	  $row_Re_currency = mysqli_fetch_assoc($Re_currency);
  }
?> 
        </select> 
        Exchange rate
  <input name="tbuying_exr" type="text" class="Style19" size="8" value=<?php
				echo "$Euro_rate";?> ></td>
      <td><div align="left"> 
          <input name="tmanu_coun_id2" type="hidden" class="Style19" value="<?php echo $row_Re_manuf['tmanu_coun_id']; ?>"> 
        </div></td> 
    </tr> 
    <tr valign="baseline"> 
      <td nowrap align="right"><div align="center" class="Style22">Quantity<span class="Style21">(*)</span> </div></td> 
      <td><input name="tbuying_qu" type="text" class="Style19" value="<?php echo @$_POST['tbuying_qu'] ?>" size="32"> </td> 
      <td><div align="left"></div></td> 
      <td><div align="left"> </div></td> 
    </tr> 
    <tr valign="baseline"> 
      <td nowrap align="right"><div align="center">Total cost</div></td> 
      <td><input name="tbuying_tcost" type="text" class="Style19" size="32" readonly="true" 
	  value="<?php echo @$_POST['tbuying_ppu'] * @$_POST['tbuying_qu']?>" ></td> 
      <td nowrap><div align="left" class="Style22">Transportation Method<span class="Style21">(*)</span></div></td> 
      <td><div align="left"> 
          <select name="tbuying_transport_id" class="Style19"> 
            <?php
do {  
?> 
            <option value="<?php echo $row_Re_transport['ttransport_id']?>"><?php echo $row_Re_transport['ttransport_desc']?></option> 
            <?php
} while ($row_Re_transport = mysqli_fetch_assoc($Re_transport));
  $rows = mysqli_num_rows($Re_transport);
  if($rows > 0) {
      mysqli_data_seek($Re_transport, 0);
	  $row_Re_transport = mysqli_fetch_assoc($Re_transport);
  }
?> 
          </select> 
        </div></td> 
    </tr> 
    <tr valign="baseline"> 
      <td nowrap align="right"><div align="center">Pack size </div></td> 
      <td><input name="tbuying_pack_size" type="text" class="Style19" value="<?php echo @$_POST['tbuying_pack_size'] ?>" size="20"></td>
      <td><div align="left">Remark/Comments</div></td> 
      <td><div align="left"> 
          <textarea name="tbuying_remark" cols="60"></textarea> 
        </div></td> 
    </tr> 
    <tr valign="baseline"> 
      <td nowrap align="right">Price per pack </td> 
      <td><input name="tbuying_price_per_pack" type="text" class="Style19" 
	  value="<?php echo @$_POST['tbuying_price_per_pack'] ?>" size="10"></td>
      <td><div align="left"></div></td> 
      <td><div align="left"> 
          <input name="tbuying_date" type="hidden" value="
	  <?php
		$today = date ("Y-m-j");
		echo "$today";
	?>"> 
        </div></td> 
    </tr> 
    <tr valign="baseline"> 
      <td nowrap align="right"><div align="center">Lead Time <span class="Style20">(weeks) </span></div></td> 
      <td><input name="tbuying_lead_time" type="text" class="Style19" value="<?php echo @$_POST['tbuying_lead_time'] ?>" size="10"></td> 
      <td><div align="left"></div></td> 
      <td><div align="left"> 
          <input name="tbuying_dmod" type="hidden" value="
	  <?php
		$today = date ("Y-m-j");
		echo "$today";
	?>"> 
        </div></td> 
    </tr> 
    <tr valign="baseline"> 
      <td nowrap align="right"><div align="center"></div></td> 
      <td>&nbsp; </td> 
      <td><div align="center"></div></td> 
      <td><div align="left"> 
          <input name="tbuying_auth" type="hidden" value=""> 
        </div></td> 
    </tr> 
    <tr valign="baseline"> 
      <td nowrap align="right"><div align="center"> </div></td> 
      <td><div align="center"></div></td> 
      <td> <div align="center">
        <input name="submit" type="submit" class="Style1" value="Insert" onClick="Controle();" >
      </div></td> 
      <td><div align="center"></div></td> 
    </tr> 
    <tr valign="baseline"> 
      <td nowrap align="right"><div align="center" class="Style22"></div></td> 
      <td>&nbsp;</td> 
      <td><div align="left"></div></td> 
      <td><div align="left"> </div></td> 
    </tr> 
    <tr valign="baseline"> 
      <td nowrap align="right"><div align="center"></div></td> 
      <td>&nbsp;</td> 
      <td><div align="center"></div></td> 
      <td><div align="left"></div></td> 
    </tr> 
    <tr valign="baseline"> 
      <td nowrap align="right"><div align="center"></div></td> 
      <td>&nbsp;</td> 
      <td><div align="center"></div></td> 
      <td><div align="left"></div></td> 
    </tr> 
  </table> 
  <p>&nbsp; </p> 
  <p>&nbsp;</p> 
  <p>&nbsp;</p> 
  <p> 
    <input type="hidden" name="MM_insert" value="aic_form_buying"> 
  </p> 
</form> 
<p>&nbsp;</p> 
</body>
</html>
<?php
mysqli_free_result($Re_tbuying);

mysqli_free_result($Re_product);

mysqli_free_result($Re_concent);

mysqli_free_result($Re_category);

mysqli_free_result($Re_prod_categ);

mysqli_free_result($Re_dosage);

mysqli_free_result($Re_smalunit);

mysqli_free_result($Re_packaging);

mysqli_free_result($Re_present);

mysqli_free_result($Re_currency);

mysqli_free_result($Re_srcfund);

mysqli_free_result($Re_provider);

mysqli_free_result($Re_ttype_prov);

mysqli_free_result($Re_country);

mysqli_free_result($Re_transport);

mysqli_free_result($Re_tincoterm);

mysqli_free_result($Re_ecowas);

mysqli_free_result($Re_prod);

mysqli_free_result($Re_dosage1);

mysqli_free_result($Re_tinco1);

?>
<?php
function ControleInsert ($buying)
{

// echo "ControleInsert()";
/* 
need to add a variable for  the selected language (EN/FR/PO)
switch ($lang)
case ="FR"
$error_msg1 = "est manquant !";
case ="EN"
$error_msg1 = "is missing !";
case = "PO"
$error_msg1 = "Portugais est manquant !";
default : xxxx
*/

$message = "";
// mis en commentaire le 18 06 08

//if ($buying['tbuying_uv'] == "")
//$message .="tbuying_uv is missing <BR>";
$message1="is Mandatory !";
$message2="is Numeric !";
$message3="wrong Date Format";
if ($buying['tbuying_concent_id'] =="")
$message .="Concent_id ".$message1." <BR>";
if ($buying['tbuying_categ_id'] =="")
$message .="Category_id ".$message1." <BR>";
if ($buying['tbuying_dosage_id'] =="")
$message .="Dosage_id ".$message1. " <BR>";
if (!is_numeric($buying['tbuying_smalunit_id']))
$message .=$message2. " <BR>";
// if ($buying['tbuying_us'] =="")
if (!is_numeric($buying['tbuying_pack_id']))
$message .="Pack_id ".$message2. " <BR>";

//////////////////////////////

if ($buying['tbuying_ppu'] !="")
{
	if (!is_numeric($buying['tbuying_ppu']))
	$message .= "Unit price ".$message2." <BR>";
}
else $message .= "Unit price ".$message1."  <BR>";

if (!is_numeric($buying['tbuying_pack_id']))
$message .="Pack_id ".$message2." <BR>";
//
if ($buying['tbuying_qu'] !="")
{
  if (!is_numeric($buying['tbuying_qu']))
   $message .="Quantity ". $message2."  <BR>";
}
else $message .="Quantity ".$message1." <BR>";

if (!is_numeric($buying['tbuying_present_id']))
$message .="Presentation_id ". $message1." <BR>";
if ($buying['tbuying_inco_id'] =="")
$message .="Inco_id ".$message1." <BR>";


if ($buying['tbuying_dbid'] =="")
$message .="Date of Bid ".$message1." <BR>";
else
{

// Verifier ta date aussi

  $vardbid = GetSQLValueString($buying['tbuying_dbid'] ,"date");
  
  $annee = substr($vardbid,7,4);
  $mois = substr($vardbid,4,2);
  $jour = substr($vardbid,1,2);
  

  if (checkdate($mois,$jour,$annee))
  {

   $LaDate=formater($buying['tbuying_dbid'], true);
  }
  else $message .="Date_bid ".$message3." <BR>";
}

if ($buying['tbuying_cur_id'] =="")
$message .="Currency_id ".$message1." <BR>" ; 

if ($buying['tbuying_srcfund_id'] =="")
$message .="Source of funding ".$message1." <BR>";  
if ($buying['tbuying_prov_id'] =="")
$message .="Provider_id ".$message1." <BR>";  
if ($buying['tbuying_type_prov_id'] =="")
$message .="Provider Type_id ".$message1." <BR>";                    

if ($buying['tbuying_manu_id'] =="")
$message .="Manufacturer_id ".$message1." <BR>";  

if ($buying['tbuying_transport_id'] =="")
$message .="Transport_id ".$message1." <BR>" ;

if ($buying['tbuying_lead_time'] !="")
{
	if (!is_numeric($buying['tbuying_lead_time']))
         $message .= "Lead time ".$message2." <BR>";
}

if ($buying['tbuying_price_per_pack'] !="")
{
  // penser a tester le pack size au cas ou le price_per_pack est non vide
  
   if (!is_numeric($buying['tbuying_price_per_pack']))
    $message .="Price per pack ".$message2." <BR>";
}
//

if ($message) {
echo "<b> The following errors were encountered :</b><BR>$message";
echo "<b> Please Go to Previous Page </b> <BR>";
// redisplay the insert form function
return false;
}
return true;
}

function ControleDate ($date, $vers_mysql)

{
// JJ/MM/AAAA => AAAA-MM-JJ
if($vers_mysql)
{

$pattern = "([0-9]{2})/([0-9]{2})/([0-9]{4})";
$replacement = "$3-$2-$1";
// echo " then replacement=$replacement <BR> pattern=$pattern ";
}

// AAAA-MM-JJ => JJ/MM/AAAA
else
{
$pattern = "([0-9]{4})-([0-9]{2})-([0-9]{2})";
$replacement = "$3/$2/$1";

// echo " else replacement=$replacement<BR> pattern=$pattern";
}

return $replacement;
} 
 function formater($date,$vers_mysql)
{

// JJ/MM/AAAA => AAAA-MM-JJ
if($vers_mysql)
{

// echo " FFFFFFFFFFFFF formater date fonction";
$pattern = "`([0-9]{2})/([0-9]{2})/([0-9]{4})`";
$replacement = "$3-$2-$1";
 // echo " THEN XXXXXXXXX";
}

// AAAA-MM-JJ => JJ/MM/AAAA
else
{
$pattern = "`([0-9]{4})-([0-9]{2})-([0-9]{2})`";
$replacement = "$3/$2/$1";

}

return preg_replace($pattern, $replacement, $date);
}


?>
