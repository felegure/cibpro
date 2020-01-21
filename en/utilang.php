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
$Form_title_en_update = "DATA UPDATE";
$Form_title_en_delete = "DATA DELETION";

$Form_title_fr_update = "MODIFICATION DES DONNEES";
$Form_title_fr_delete = "SUPPRESSION DES DONNEES";

$Form_title_fr = "ENTREE DES DONNEES";
$Form_title_po = "DONNEES PORTUGAIS";

$t_ec_id = $_SESSION['COUNTRY'];             // country_id selected in the logon form
$tbuying_auth = $_SESSION['username'];       // username extracted from the database

$tempo_table_name = "TempoBuying".$t_ec_id;  // Temporary table created per country
// $view_table_name = "tbuying_view_07";        // Table_view_07 to be changed in a view
$tbuying_table = "tbuying_07";
$view_table_name_fr = "tbuying_view_fr";
$view_table_name_en = "tbuying_view_en";
$view_table_name_ent = "tbuying_view_ent";
$droptempoSQL="DROP TABLE $tempo_table_name;"; // first drop the tbale

$Space = "  Pays ";
$Euro_rate=655.97;
// Fields for reports in English
$ec_f="Pays Cedeao";
$po_f="Produit";
$ca_f="Categorie";
$uv_f="Valeur";
$co_f="Concentration";
$df_f="Dosage";
$us_f="Unité";
$pp_f="Plus petite unité";
$pa_f="Packaging";
$pr_f="Présentation";
$pu_f="Prix unitaire";
$tc_f="Coût total";
$cu_f="Devise";
$ex_f="Taux de change";
$qu_f="Quantité";
$it_f="Terme Inco";
$pd_f="Fournisseur";
$tf_f="Type de fournisseur";
$ma_f="Fabricant";

$pf_f="Pays origine";
$re_f="Commentaires";

$db_f="Date ouverture des plis";
$tr_f="Transport";
$sf_f="Type de financement";
$st_f="Fourni à";
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

// List of tables french
$Product_en="tproduct_fr";
$Category_fr="tcategory_fr";
$Concentration_fr="tconcentration_fr";
$Country_fr="tcountry_fr";
$Cur_fr="tcur_fr";
$Dosage_fr="tdosage_fr";
$Pack_fr="tpack_fr";
$Present_fr="tpresent_fr";
$Smalunit_fr="tsmalunit_fr";
$Srcfund_fr="tsrcfund_fr";
$Transport_fr="ttransport_fr";
$Typrov_fr="ttypeprov_fr";




?>

