<?php
require_once ("ControleChange.php");
require_once ("ControleFields.php");
require_once ("ControleInsert.php");
require_once ("ValidateUpdate.php");
require_once ("Gethevalue.php");
// Constants definition
define ("DEFAULT_MODE", "default");
define ("INSERT_MODE", "ins");
define ("UPDATE_MODE", "upd");
define ("DELETE_MODE", "del");
$Form_title_en_insert = "DATA ENTERING"; 
$Form_title_en_update = "DATA UPDATE";
$Form_title_en_delete = "DATA DELETION";

$Form_title_fr_update = "MODIFICATION DES DONNEES";
$Form_title_fr_delete = "SUPPRESSION DES DONNEES";

$Form_title_fr = "ENTREE DES DONNEES";
$Form_title_po = "DONNEES PORTUGAIS";
$Form_title_fr_qua = "Saisie des problèmes de Qualité";
$Form_title_fr_pvg = "Saisie des problèmes de pharmacovigilance";

$t_ec_id = $_SESSION['COUNTRY'];             // country_id selected in the logon form
$tbuying_auth = $_SESSION['username'];       // username extracted from the database

$space = " Pays : ";
$error_AEXT = " Enregistrement déjà existant !";
$error_ANOE = " Pas d'enregistrement existant !";
$msg_ins = "1 Enregistrement inséré";
$msg_upd = " 1 Enregistrement mis à jour";
$msg_del = " 1 Enregistrement supprimé";
$msg_no_upd = " Pas de mise à jour";
$tempo_table_name = "TempoBuying".$t_ec_id;  // Temporary table created per country
// $view_table_name = "tbuying_view_07";        // Table_view_07 to be changed in a view
$tbuying_table = "tbuying_07";
$view_table_name_fr = "tbuying_view_fr";
$view_table_name_en = "tbuying_view_en";
$view_tqual_fr = "tqual_view_fr";
$view_tqual_en = "tqual_view_en";
$view_tqual_por = "tqual_view_por";
$view_tqual = "tqual_view_fr";
$view_tprov_country = "tprov_country_fr_view";
$view_manuf_country = "tmanuf_country_fr_view";
$view_table_name_ent = "tbuying_view_ent";
$view_table_name = "tbuying_view_fr";
$view_tsupview = "tsupview_fr";
$view_provider_occ ="tcountprov";
$droptempoSQL="DROP TABLE $tempo_table_name;"; // first drop the tbale

$Space = "  Pays ";
$Euro_rate=655.956;
// Fields for reports in English

$dbi="Date ouverture des plis ";
$tra="Transport ";
$src="Source de financement ";
$sup="Fourni à ";
$eco="Pays Cedeao ";
$pro="Produit ";
$smu="Plus petite unité ";
$ppu="Prix unitaire ";
$ttc="Coût total ";
$cur="Devise ";
$exr="Taux de change ";
$qty="Quantité ";
$inc="Terme inco ";
$rem="Commentaires";
$tra="Transport ";
$pay="Fourni à ";

// English 
$eco_e="Pays Cedeao";
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

/*$Product="tproduct_fr";
$Product_en="tproduct_en";
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
$Typrov="ttypeprov_en";
*
$product="tproduct_fr";
$product_en="tproduct_en";
$category="tcategory_en";
$concentration="tconcentration_en";
$country="tcountry_en";
$cur="tcur_en";
$dosage="tdosage_en";
$pack="tpack_en";
$present="tpresent_en";
$smalunit="tsmalunit_en";
$srcfund="tsrcfund_en";
$typrov="ttypeprov_en";
*/
// List of tables french
$ecowas="tecowas_fr";
$product="tproduct_fr";
$category="tcategory_fr";
$concentration="tconcentration_fr";
$country="tcountry_fr";
$cur="tcur_fr";
$dosage="tdosage_fr";
$pack="tpack_fr";
$present="tpresent_fr";
$smalunit="tsmalunit_fr";
$srcfund="tsrcfund_fr";
$transport="ttransport_fr";
$provider="tprovider";
$manufacturer="tmanufacturer";
$transport="ttransport_fr";
$typrov="ttypeprov_fr";
$incoterm="tincoterm";

$Ecowas="tecowas";
$Product="tproduct_fr";
$Category="tcategory_fr";
$Concentration="tconcentration_fr";
$Country="tcountry_fr";
$Cur="tcur_fr";
$Dosage="tdosage_fr";
$Pack="tpack_fr";
$Present="tpresent_fr";
$Smalunit="tsmalunit_fr";
$Srcfund="tsrcfund_fr";
$Transport="ttransport_fr";
$Provider="tprovider";
$Manufacturer="tmanufacturer";
$Typrov="ttypeprov_fr";
$Incoterm="tincoterm";
$table="Message";
/// variables pour les controles de validité
$tmotifqual="tmotifqual_fr";
$tmotifvigi="tmotifvigi_fr";
$tactionvigi="tactionvigi_fr";
//
$message1="est un champ Obligatoire !";
$message2="est Numérique !";
$message20="Valeur Numérique ! ";
$message3="Mauvais format de date";
$message4="valeur manquante !";

?>
