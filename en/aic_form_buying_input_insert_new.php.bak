<?php
require_once('../Connections/cibproto.php'); 
require_once('utilang_en.php'); 
  $kelcategory= $_GET["kelcategory"];

$editFormAction = $_SERVER['PHP_SELF'];

if (isset($_SERVER['QUERY_STRING'])) {

  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
  
}

$t_ec_id = $_SESSION['COUNTRY'];
$tbuying_auth = $_SESSION['username'];

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "aic_form_input"))
 {

if (ControleInsert($_POST)) 
{

	mysqli_select_db($database_cibproto, $cibproto);
	$query = "SELECT * FROM $view_tprov_country where tprov_id = {$_POST['tbuying_prov_id']} order by tprov_desc";

	$result = mysqli_query($query, $cibproto)or die(mysqli_error());;
	$affected_rows = mysqli_num_rows($result);

//S'il y a exactement un résultat, l'utilisateur est authentifié, sinon, on l'empêche d'entrer
	if($affected_rows == 1) {

	$pointeur_prov=mysqli_fetch_object ($result); 
	$VAR_PAYS_PROV = $pointeur_prov->tprov_coun_id;

	}

mysqli_select_db($database_cibproto, $cibproto);
$query = "SELECT * FROM $view_manuf_country  where tmanu_id = {$_POST['tbuying_manu_id']} order by tmanu_desc";

//exécution de la requête et récupération du nombre de résultats

$result = mysqli_query($query, $cibproto)or die(mysqli_error());;
$affected_rows = mysqli_num_rows($result);

//S'il y a exactement un résultat, l'utilisateur est authentifié, sinon, on l'empêche d'entrer
if($affected_rows == 1) {

$pointeur_manu=mysqli_fetch_object ($result); 

}
$PPU_TEMP=sprintf("%.4f",$_POST['tbuying_price_per_pack']);
$QU_TEMP=sprintf("%.4f",$_POST['tbuying_qty_pack']);
$PACK_SIZE=sprintf("%.4f",$_POST['tbuying_pack_size']);
$PRICE_PER_PACK_TEMP=sprintf("%.4f",$_POST['tbuying_price_per_pack']);
$TOTAL_QTY = $PACK_SIZE * $QU_TEMP;
$TOTAL_COST=$PRICE_PER_PACK_TEMP * $QU_TEMP;

$PRICE_PER_SMALLEST_UNIT=$TOTAL_COST/ $TOTAL_QTY;
/*
echo ("XXXXXXXXXXXXX QU_TEMP=$QU_TEMP<BR>");
echo ("XXXXXXXXXXXXX PRICE_PER_PACK_TEMP=$PRICE_PER_PACK_TEMP<BR>");
echo ("XXXXXXXXXXXXX PPU_TEMP=$PPU_TEMP<BR>");
echo ("XXXXXXXXXXXXX PACK_SIZE=$PACK_SIZE<BR>");
echo (" XXX PRIX TOTAL = $TOTAL_COST <BR>");
echo (" XXXXXXXX TOTAL_QTY = $TOTAL_QTY <BR>");
echo (" XXX PRIX PER_SMALLEST UNIT=$PRICE_PER_SMALLEST_UNIT<BR>");
echo (" XXX TOTAL_QTY=$TOTAL_QTY<BR>");
*/

if ( $_POST['tbuying_cur_id'] =='EUR')
{
$CUR_VAL = $TCURVAL_EUR;
$PPU_DOL = $PRICE_PER_SMALLEST_UNIT  * $CUR_VAL ;
$PPP_DOL = $PRICE_PER_PACK_TEMP * $CUR_VAL;
$PPU_EUR = $PRICE_PER_SMALLEST_UNIT;
$PPP_EUR = $PRICE_PER_PACK_TEMP ;
}
else {
$CUR_VAL = $TCURVAL_DOL;
$PPU_EUR =  $PRICE_PER_SMALLEST_UNIT  * $CUR_VAL ;
$PPP_EUR = $PRICE_PER_PACK_TEMP * $CUR_VAL;
$PPU_DOL = $PRICE_PER_SMALLEST_UNIT;
$PPP_DOL = $PRICE_PER_PACK_TEMP ;
}

$TOTAL_COST_DOL = $QU_TEMP * $PPP_DOL;
$TOTAL_COST_EUR = $QU_TEMP * $PPP_EUR;
$PRICE_PER_SMALLEST_UNIT_DOL = $TOTAL_COST_DOL / $TOTAL_QTY;
$PRICE_PER_SMALLEST_UNIT_EUR = $TOTAL_COST_EUR / $TOTAL_QTY;
mysqli_select_db($database_cibproto, $cibproto);
$query = "select STR_TO_DATE('{$_POST['tbuying_dbid']}', '%d-%m-%Y' ) Date_bid";
$result = mysqli_query($query, $cibproto)or die(mysqli_error());;
$affected_rows = mysqli_num_rows($result);

//S'il y a exactement un résultat, l'utilisateur est authentifié, sinon, on l'empêche d'entrer
	if($affected_rows == 1) {
$pointeur_dbid=mysqli_fetch_object ($result); 
$dbid = $pointeur_dbid->Date_bid;
}
 
// $Temp_product=GetSQLValueString($_POST['tbuying_product_id'], "text");
$Temp_product=$_POST['tbuying_product_id'];
$Temp_pack_qty=$_POST['tbuying_qty_pack'];
// echo "Valeur de qty_pack=$Temp_pack_qty <BR>";
// $Temp_product_desc=$_POST['tbuying_product_desc'];
 // echo "Valeur de product_id=$Temp_product <BR>";
 //   echo "Valeur de product_desc=$Temp_product_desc <BR>";

  $londprod=strlen($Temp_product);
  $categ_id=strrchr($Temp_product,"+");
  $longcateg=strlen($categ_id);
  $categ_id=substr($categ_id,1,strlen($categ_id) - 1);
//  echo "Valeur de product_id=$Temp_product, categ=$categ_id, long de categ=$longcateg  lon de prod=$londprod<BR>";
 $Tproduct=explode("+",$Temp_product);

// echo " XXX product(0)=$Tproduct[0] <BR>";
//  echo " XXX product(1)=$Tproduct[1] <BR>";

 $temp_product=substr($Tproduct[0],0,strlen($Tproduct[0]));
 $temp_dosage=substr($Tproduct[1],0,strlen($Tproduct[1]) );
/*
echo "XXXX produit=$temp_product <BR>";
 echo "XXXX dosage=$temp_dosage <BR>";
 echo "XXX categ_id=$categ_id <BR>";
*/

 $insertSQL = sprintf("INSERT INTO $tbuying_table
 (tbuying_ec_id, tbuying_product_id, tbuying_categ_id,tbuying_smalunit_id,  
  tbuying_pack_id, tbuying_ppu, tbuying_ppu_dol, tbuying_ppu_eur, tbuying_tcost, tbuying_tcost_dol,
  tbuying_tcost_eur, tbuying_qty_pack, tbuying_price_per_pack,
  tbuying_price_per_pack_dol, tbuying_price_per_pack_eur, tbuying_pack_size, tbuying_lead_time,  tbuying_present_id, 
  tbuying_inco_id, tbuying_dbid, tbuying_cur_id, tbuying_exr,  tbuying_srcfund_id,
  tbuying_prov_id, tbuying_type_prov_id, tbuying_prov_coun_id, tbuying_manu_id,tbuying_manu_coun_id,
  tbuying_transport_id, tbuying_date, tbuying_auth,
  tbuying_dmod, tbuying_remark, tbuying_status) 
  VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s,%s ,%s, %s, %s ,%s, %s, %s, %s, %s,%s, %s, %s, 
  %s,%s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($t_ec_id, "text"),
					   GetSQLValueString($temp_product, "text"),
                       GetSQLValueString($categ_id, "text"), 
                       GetSQLValueString($_POST['tbuying_smalunit_id'], "int"),
                       GetSQLValueString($_POST['tbuying_pack_id'], "int"),
                       GetSQLValueString($PRICE_PER_SMALLEST_UNIT, "text"),
					   GetSQLValueString($PRICE_PER_SMALLEST_UNIT_DOL, "double"),
					   GetSQLValueString($PRICE_PER_SMALLEST_UNIT_EUR, "double"),
 	                   GetSQLValueString($TOTAL_COST, "double"),
					   GetSQLValueString($TOTAL_COST_DOL, "double"), 
					   GetSQLValueString($TOTAL_COST_EUR, "double"),
                       GetSQLValueString($_POST['tbuying_qty_pack'], "text"),
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
					   
// echo " Ligne a inserer=$insertSQL <BR>";

  mysqli_select_db($database_cibproto, $cibproto);
// $Result1 = mysqli_query($insertSQL, $cibproto) or die(mysqli_error());

  if (!$Result1= mysqli_query($insertSQL, $cibproto)) {
 	 $return = new Exception("Erreur SQL");
	$tbl = $return->getTrace();
	// echo " Insert=$insertSQL <BR>";
	$errorno=mysqli_errno();
	$errorsql=mysqli_error();
	echo "Error=$error_AEXT $errorno <BR>";
 }	 
 else {

 $i=1;
 while ($i <= 1000)
 {
  $i++;
 }
 echo " $msg_ins <BR>";

 // je vide les champs deja renseigne pour reafficher la page
  $_POST['tbuying_ppu']="";
  $_POST['tbuying_qu']="";
  $_POST['tbuying_qty_pack']="";
  $_POST['tbuying_pack_size']="";
  $_POST['tbuying_price_per_pack']="";
  $_POST['tbuying_lead_time']="";
  $_POST['tbuying_remark']=""; 
  // echo " tbuying_ppu=@$_POST['tbuying_ppu']";
}
}
  $insertGoTo = "manage_form_ins.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  // Pourquoi revenir au menu c'est pas normal  A REVOIR 
  //
 // header(sprintf("Location: %s", $insertGoTo));
}

mysqli_select_db($database_cibproto, $cibproto);
$query_Re_tbuying = "SELECT * FROM tbuying_07";
$Re_tbuying = mysqli_query($query_Re_tbuying, $cibproto) or die(mysqli_error());
$row_Re_tbuying = mysqli_fetch_assoc($Re_tbuying);
$totalRows_Re_tbuying = mysqli_num_rows($Re_tbuying);

mysqli_select_db($database_cibproto, $cibproto);

/*
$query_Re_prod = "SELECT * FROM $Product 
WHERE tproduct_status = '1' ";
$query_Re_prod.= $param_cat;
$query_Re_prod.= "order by tproduct_desc";
*/

$query_Re_prod = "SELECT * FROM $Product 
WHERE tproduct_status = '1' AND  (tproduct_cat = '$pCate' or '$pCate' = '*') order by tproduct_desc";

//$query_Re_product = "SELECT * FROM $Product WHERE tproduct_status = '1' order by tproduct_id ";

 // echo "  XXXXXvaleur query_Re_product=$query_Re_prod<BR> ";

 $Re_product = mysqli_query($query_Re_prod, $cibproto) or die(mysqli_error());
 $row_Re_product = mysqli_fetch_assoc($Re_product);
$totalRows_Re_product = mysqli_num_rows($Re_product);

mysqli_select_db($database_cibproto, $cibproto);
$query_Re_concent = "SELECT * FROM $concentration WHERE tconcent_status = '1' ORDER BY tconcent_desc ASC";
$Re_concent = mysqli_query($query_Re_concent, $cibproto) or die(mysqli_error());
$row_Re_concent = mysqli_fetch_assoc($Re_concent);
$totalRows_Re_concent = mysqli_num_rows($Re_concent);

mysqli_select_db($database_cibproto, $cibproto);
$query_Re_dosage = "SELECT tdosage_id, tdosage_desc, tdosage_status FROM $dosage WHERE tdosage_status='1' ORDER BY tdosage_desc";
$Re_dosage = mysqli_query($query_Re_dosage, $cibproto) or die(mysqli_error());
$row_Re_dosage = mysqli_fetch_assoc($Re_dosage);
$totalRows_Re_dosage = mysqli_num_rows($Re_dosage);

mysqli_select_db($database_cibproto, $cibproto);
$query_Re_smalunit = "SELECT tsmalunit_id, tsmalunit_desc, tsmalunit_status FROM  $smalunit WHERE tsmalunit_status = '1' ORDER BY tsmalunit_desc";
$Re_smalunit = mysqli_query($query_Re_smalunit, $cibproto) or die(mysqli_error());
$row_Re_smalunit = mysqli_fetch_assoc($Re_smalunit);
$totalRows_Re_smalunit = mysqli_num_rows($Re_smalunit);

mysqli_select_db($database_cibproto, $cibproto);
$query_Re_packaging = "SELECT tpack_id, tpack_desc, tpack_status FROM $pack WHERE tpack_status = '1' ORDER BY tpack_desc";
$Re_packaging = mysqli_query($query_Re_packaging, $cibproto) or die(mysqli_error());
$row_Re_packaging = mysqli_fetch_assoc($Re_packaging);
$totalRows_Re_packaging = mysqli_num_rows($Re_packaging);

mysqli_select_db($database_cibproto, $cibproto);
$query_Re_present = "SELECT tpresent_id, tpresent_desc, tpresent_status FROM $present WHERE tpresent_status = '1' ORDER BY tpresent_desc";
$Re_present = mysqli_query($query_Re_present, $cibproto) or die(mysqli_error());
$row_Re_present = mysqli_fetch_assoc($Re_present);
$totalRows_Re_present = mysqli_num_rows($Re_present);

mysqli_select_db($database_cibproto, $cibproto);
$query_Re_currency = "SELECT tcur_id, tcur_desc FROM $cur WHERE tcur_status = '1' order by tcur_desc";
$Re_currency = mysqli_query($query_Re_currency, $cibproto) or die(mysqli_error());
$row_Re_currency = mysqli_fetch_assoc($Re_currency);
$totalRows_Re_currency = mysqli_num_rows($Re_currency);

$colname_Re_srcfund = "1";
if (isset($_GET['1'])) {
  $colname_Re_srcfund = (get_magic_quotes_gpc()) ? $_GET['1'] : addslashes($_GET['1']);
}
mysqli_select_db($database_cibproto, $cibproto);
$query_Re_srcfund = sprintf("SELECT tsrcfund_id, tsrcfund_desc FROM $srcfund WHERE tsrcfund_status = '%s' order by tsrcfund_desc", $colname_Re_srcfund);
$Re_srcfund = mysqli_query($query_Re_srcfund, $cibproto) or die(mysqli_error());
$row_Re_srcfund = mysqli_fetch_assoc($Re_srcfund);
$totalRows_Re_srcfund = mysqli_num_rows($Re_srcfund);

$colname_Re_provider = "1";
if (isset($_GET['1'])) {
  $colname_Re_provider = (get_magic_quotes_gpc()) ? $_GET['1'] : addslashes($_GET['1']);
}
mysqli_select_db($database_cibproto, $cibproto);
$query_Re_provider = sprintf("SELECT tprov_id, tprov_coun_id, 
tprov_desc FROM $provider WHERE tprov_status = '%s' order by tprov_desc", $colname_Re_provider);
$Re_provider = mysqli_query($query_Re_provider, $cibproto) or die(mysqli_error());
$row_Re_provider = mysqli_fetch_assoc($Re_provider);
$totalRows_Re_provider = mysqli_num_rows($Re_provider);

$colname_Re_ttype_prov = "1";
if (isset($_GET['1'])) {
  $colname_Re_ttype_prov = (get_magic_quotes_gpc()) ? $_GET['1'] : addslashes($_GET['1']);
}

mysqli_select_db($database_cibproto, $cibproto);
$query_Re_ttype_prov = sprintf("SELECT ttype_prov_id, ttype_prov_desc FROM $typrov WHERE ttype_prov_status = '%s' ORDER BY ttype_prov_desc ASC", $colname_Re_ttype_prov);
$Re_ttype_prov = mysqli_query($query_Re_ttype_prov, $cibproto) or die(mysqli_error());
$row_Re_ttype_prov = mysqli_fetch_assoc($Re_ttype_prov);
$totalRows_Re_ttype_prov = mysqli_num_rows($Re_ttype_prov);

mysqli_select_db($database_cibproto, $cibproto);
$query_Re_country = "SELECT tcountry_id, tcountry_desc, tcountry_status FROM $country WHERE tcountry_status = '1' ORDER BY tcountry_desc ASC";
$Re_country = mysqli_query($query_Re_country, $cibproto) or die(mysqli_error());
$row_Re_country = mysqli_fetch_assoc($Re_country);
$totalRows_Re_country = mysqli_num_rows($Re_country);

$colname_Re_transport = "1";
if (isset($_GET['1'])) {
  $colname_Re_transport = (get_magic_quotes_gpc()) ? $_GET['1'] : addslashes($_GET['1']);
}
mysqli_select_db($database_cibproto, $cibproto);
$query_Re_transport = sprintf("SELECT ttransport_id, ttransport_desc FROM $transport WHERE ttransport_status = '%s' order by ttransport_desc", $colname_Re_transport);
$Re_transport = mysqli_query($query_Re_transport, $cibproto) or die(mysqli_error());
$row_Re_transport = mysqli_fetch_assoc($Re_transport);
$totalRows_Re_transport = mysqli_num_rows($Re_transport);

mysqli_select_db($database_cibproto, $cibproto);
$query_Re_tincoterm = "SELECT tinco_id, tinco_desc FROM $incoterm WHERE tinco_status = '1' order by tinco_desc";
$Re_tincoterm = mysqli_query($query_Re_tincoterm, $cibproto) or die(mysqli_error());
$row_Re_tincoterm = mysqli_fetch_assoc($Re_tincoterm);
$totalRows_Re_tincoterm = mysqli_num_rows($Re_tincoterm);

$colname_Re_ecowas = "1";
if (isset($_GET['1'])) {
  $colname_Re_ecowas = (get_magic_quotes_gpc()) ? $_GET['1'] : addslashes($_GET['1']);
}
mysqli_select_db($database_cibproto, $cibproto);
$query_Re_ecowas = sprintf("SELECT tecowas_id, tecowas_desc FROM $ecowas WHERE tecowas_status = '%s'", $colname_Re_ecowas);
$Re_ecowas = mysqli_query($query_Re_ecowas, $cibproto) or die(mysqli_error());
$row_Re_ecowas = mysqli_fetch_assoc($Re_ecowas);
$totalRows_Re_ecowas = mysqli_num_rows($Re_ecowas);

$colname_Re_prod = "1";
if (isset($_SESSION['STATCOUNTRY'])) {
  $colname_Re_prod = (get_magic_quotes_gpc()) ? $_SESSION['STATCOUNTRY'] : addslashes($_SESSION['STATCOUNTRY']);
}

mysqli_select_db($database_cibproto, $cibproto);
$query_Re_dosage1 = "SELECT tdosage_id, tdosage_desc, tdosage_status FROM $dosage WHERE tdosage_status = '1' ORDER BY tdosage_desc";
$Re_dosage1 = mysqli_query($query_Re_dosage1, $cibproto) or die(mysqli_error());
$row_Re_dosage1 = mysqli_fetch_assoc($Re_dosage1);
$totalRows_Re_dosage1 = mysqli_num_rows($Re_dosage1);

mysqli_select_db($database_cibproto, $cibproto);
$query_Re_tinco1 = "SELECT tinco_id, tinco_desc, tinco_status FROM $incoterm WHERE tinco_status = '1' ORDER BY tinco_desc";
$Re_tinco1 = mysqli_query($query_Re_tinco1, $cibproto) or die(mysqli_error());
$row_Re_tinco1 = mysqli_fetch_assoc($Re_tinco1);
$totalRows_Re_tinco1 = mysqli_num_rows($Re_tinco1);

mysqli_select_db($database_cibproto, $cibproto);
$query_Re_manuf = "SELECT tmanu_id, tmanu_coun_id, tmanu_desc, tmanu_status FROM $manufacturer WHERE tmanu_status = '1' 
ORDER BY tmanu_desc";
$Re_manuf = mysqli_query($query_Re_manuf, $cibproto) or die(mysqli_error());
$row_Re_manuf = mysqli_fetch_assoc($Re_manuf);
$totalRows_Re_manuf = mysqli_num_rows($Re_manuf);

?>