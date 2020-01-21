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

$Form_title_fr = "ENTREE DES DONNES";
$Form_title_po = "DONNEES PORTUGAIS";

$t_ec_id = $_SESSION['COUNTRY'];             // country_id selected in the logon form
$tbuying_auth = $_SESSION['username'];       // username extracted from the database

$tempo_table_name = "TempoBuying".$t_ec_id;  // Temporary table created per country
// $view_table_name = "tbuying_view_07";        // Table_view_07 to be changed in a view
$tbuying_table = "tbuying_07";
$view_table_name = "tbuying_view";
$droptempoSQL="DROP TABLE $tempo_table_name;"; // first drop the tbale

$Space = "  From country ";

?>
