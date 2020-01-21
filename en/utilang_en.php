<?php
require_once ("ControleChange.php");
require_once ("ControleFields.php");
//require_once ("ControleInsert.php");
require_once ("ValidateUpdate.php");
require_once ("Gethevalue.php");
// Constants definition
define ("DEFAULT_MODE", "default");
define ("INSERT_MODE", "ins");
define ("UPDATE_MODE", "upd");
define ("DELETE_MODE", "del");
$Form_title_en_insert = "DATA ENTERING"; 
$Form_title_en_update = "DATA MODIFICATION";
$Form_title_en_delete = "DATA DELETION";

$Form_title_fr_update = "MODIFICATION DES DONNEES";
$Form_title_fr_delete = "SUPPRESSION DES DONNEES";

$Form_title_fr = "ENTREE DES DONNEES";
$Form_title_po = "DONNEES PORTUGAIS";

$Form_title_en_qua = "Data entering for Quality problem";
$Form_title_en_pvg = "Data entering for pharmacovigilance notification";

$t_ec_id = $_SESSION['COUNTRY'];             // country_id selected in the logon form
$tbuying_auth = $_SESSION['username'];       // username extracted from the database

$space = " From country : ";
$error_AEXT = " Record already exist ";
$msg_ins = "1 Row inserted";
$msg_upd = " 1 Row updated";
$msg_no_upd = " No Row updated";
$msg_del = " 1 Row deleted";
$tempo_table_name = "TempoBuying".$t_ec_id;  // Temporary table created per country
// $view_table_name = "tbuying_view_07";        // Table_view_07 to be changed in a view
$tbuying_table = "tbuying_07";
//$view_table_name_fr = "tbuying_view_fr";
$view_table_name = "tbuying_view_en";
//$view_table_name_por = "tbuying_view_por";
//$view_tqual_fr = "tqual_view_fr";
$view_tqual = "tqual_view_en";
//$view_tqual_por = "tqual_view_por";
$view_tprov_country = "tprov_country_en_view";
$view_manuf_country = "tmanuf_country_en_view";

$view_tsupview = "tsupview_en";
$view_provider_occ ="tcountprov";
$droptempoSQL="DROP TABLE $tempo_table_name;"; // first drop the tbale

$Space = "  Country ";
$Euro_rate=655.96;

$dbi="Date of bid opening ";
$tra="Transportation method ";
$src="Source of funding ";
$sup="Provided to ";
$eco="Ecowas country ";
$pro="Product ";
$smu="Smallest unit ";
$ppu="Unit price ";
$ttc="Total cost ";
$cur="Currency ";
$exr="Exchange rate ";
$qty="Quantity ";
$inc="Inco term ";
$rem="Comments ";
$tra="Transportation method ";
$pay="Provided to ";


// Fields for reports in English
$eco_e="Ecowas country";
$pro_e="Product";
$smu_e="Smallest unit";
$ppu_e="Unit price";
$ttc_e="Total cost";
$cur_e="Currency";
$exr_e="Exchange rate";
$qty_e="Quantity";
$int_e="Inco term";

$rem_e="Comments";

$dbi_e="Date of bid opening";
$tra_e="Transportation method";
$prt_e="Provided to ";

// English 
// Fields

// Title / Titres
$Suppliers_f="Liste des produits par fournisseurs" ;
$Manufacturers_f="Liste des produits par fabricants";
$Manufacturers_sum_f="Liste des fabricants";
$Suppliers_sum_f="Liste des fournisseurs";

$PricePeriod="Price per period";
$PendingDocument="Liste of pending documents";
$Suppliers_e="List of products per suppliers" ;
$Suppliers_e_s_m="List of products per suppliers and manufacturers" ;
$Manufacturers_e="List of product per manufacturers";
$Manufacturers_sum_e="List of manufacturers";
$Suppliers_sum_e="List of suppliers";

$PriceProduct_f="Prix par produit";
$PricePeriod_f="Prix par période";

$PricePeriod_f_l="Prix le plus bas par produit";

$PricePeriod_f_l_p="Prix le plus bas par produit par période";

$PendingDocument_f="Liste des documents en attente";

// List of tables english
$ecowas="tecowas_en";
$product="tproduct_en";
$category="tcategory_en";
$concentration="tconcentration_en";
$country="tcountry_en";
$cur="tcur_en";
$dosage="tdosage_en";
$pack="tpack_en";
$present="tpresent_en";
$smalunit="tsmalunit_en";
$srcfund="tsrcfund_en";
$transport="ttransport_en";
$provider="tprovider";
$manufacturer="tmanufacturer";
$typrov="ttypeprov_en";
$incoterm="tincoterm";

$Ecowas="tecowas";
$Product="tproduct_en";
$Category="tcategory_en";
$Concentration="tconcentration_en";
$Country="tcountry_en";
$Cur="tcur_en";
$Dosage="tdosage_en";
$Pack="tpack_en";
$Present="tpresent_en";
$Smalunit="tsmalunit_en";
$Srcfund="tsrcfund_en";
$Transport="ttransport_en";
$Provider="tprovider";
$Manufacturer="tmanufacturer";
$Typrov="ttypeprov_en";
$Incoterm="tincoterm";

$table="Message";
/// variables pour les controles de validité
$tmotifqual="tmotifqual_en";

$mesg_upd="Record Updated<BR>";
$message1="is Mandatory !";
$message2="is Numeric !";
$message20="Should be Numeric ";
$message3="wrong Date Format";
$message4="is missing !";
?>

