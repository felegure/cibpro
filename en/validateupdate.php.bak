<?php 
require_once('../Connections/cibproto.php'); 
?>
<?php
function ValidateUpdate ($buying, $cibproto)
{
 require_once('utilBuying.php'); 
/*
syntax   :  ValidateUpdate ( $buying) 
 Purpose : Comparison and Validation and  update tbuying_07
 Compare fields from fields retrieved from tempo table to fields 
 
 
 
 */

// echo "ValideUpdate()<BR>";
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
$Maj="Update $tbuying_table set ";

$sw=0;

$varuv= "tbuying_uv=";
// $varuv=$varuv.$buying['tbuying_uv'];

   $varuv=$varuv.GetSQLValueString($buying['tbuying_uv'], "text");

$Maj = $Maj.$varuv;
// echo "Maj apres $Maj =$Maj<BR>";
if ($buying['tconcent_id'] != $buying['tconcent_id0']) {

// $varconcent = $buying['tconcent_id0'];
$varconcent = GetSQLValueString($buying['tconcent_id'],"text");

   $Maj = $Maj.", tbuying_concent_id = $varconcent ";
   $sw=1;
}
// echo "Maj apres varconcent =$Maj<BR>";

if ($buying['tdosage_id'] != $buying['tdosage_id0']) {
   $vardosage = GetSQLValueString($buying['tdosage_id'],"text");
   $Maj = $Maj.", tbuying_dosage_id = $vardosage ";
   $sw=1;
}
echo "APres tdosage_id=$Maj<BR>";
if ($buying['tsmalunit_id'] != $buying['tsmalunit_id0']) {
    $varsmalunit = GetSQLValueString($buying['tsmalunit_id'],"text");
	$Maj = $Maj.", tsmalunit_id = $varsmalunit ";
   $sw=1;
} 
// echo "Maj apres varsmalunit =$Maj<BR>";
$varus = GetSQLValueString($buying['tbuying_us'],"text");
$Maj = $Maj." , tbuying_us = $varus";
if ($buying['tpack_id'] != $buying['tpack_id0']) {
  $varpack = GetSQLValueString($buying['tpack_id'],"text");
   $Maj = $Maj." , tbuying_pack_id = $varpack ";
   $sw=1;
} 
// echo "Maj apres varpack =$Maj<BR>";
  
  
if ($buying['tdosage_id'] != $buying['tdosage_id0']) {
  $vardosage = GetSQLValueString($buying['tdosage_id'],"text");
   $Maj = $Maj." , tbuying_dosage_id = $vardosage ";
   $sw=1;
} 


$varppu = GetSQLValueString($buying['tbuying_ppu'],"text");
$Maj = $Maj." , tbuying_ppu = $varppu";

$varcost = GetSQLValueString($buying['tbuying_tcost'],"text");

$Maj = $Maj." , tbuying_tcost = $varcost ";
$varqu =  GetSQLValueString($buying['tbuying_qu'],"text");
$Maj = $Maj." , tbuying_qu = $varqu ";

if ($buying['tpresent_id'] != $buying['tpresent_id0']) {
   $varpresent =  GetSQLValueString($buying['tpresent_id'],"text");
   $Maj = $Maj." , tbuying_present_id = $varpresent ";
   $sw=1;
}

if ($buying['tinco_id'] != $buying['tinco_id0']) {
   $varinco = GetSQLValueString($buying['tinco_id'],"text");
   $Maj = $Maj." , tbuying_inco_id = $varinco ";
   $sw=1;
}
$vardbid = GetSQLValueString($buying['tbuying_dbid'],"text");
$Maj = $Maj." , tbuying_dbid = $vardbid ";

if ($buying['tcur_id'] != $buying['tcur_id0']) {
   $varcur = GetSQLValueString($buying['tcur_id'],"text");
   $Maj = $Maj." , tbuying_cur_id = $varcur ";
   $sw=1;
}

$varexr = GetSQLValueString($buying['exr'],"text");
$Maj = $Maj." , tbuying_exr = $varexr ";


if ($buying['tsrcfund_id'] != $buying['tsrcfund_id0']) {
   $varsrcfund = GetSQLValueString($buying['tsrcfund_id'],"text");
   $Maj = $Maj." , tbuying_srcfund_id = $varsrcfund ";
   $sw=1;
}

if ($buying['tprov_id'] != $buying['tprov_id0']) {
  $varprovid = GetSQLValueString($buying['tprov_id'],"text");
   $Maj = $Maj." , tbuying_prov_id = $varprovid  ";
   $sw=1;
}

if ($buying['ttype_prov_id'] != $buying['ttype_prov_id0']) {
   $varttypeprovid = GetSQLValueString($buying['ttype_prov_id'],"text");
   $Maj = $Maj." , tbuying_type_prov_id = $varttypeprovid ";
   $sw=1;
}

if ($buying['tmanu_id'] != $buying['tmanu_id0']) {
   $varmanuid = GetSQLValueString($buying['tmanu_id'],"text");
   $Maj = $Maj." , tbuying_manu_id = $varmanuid  ";
   $sw=1;
}

if ($buying['tmanu_coun_id'] != $buying['tmanu_coun_id0']) {
   $varmanucounid = GetSQLValueString($buying['tmanu_coun_id'],"text");
   $Maj = $Maj." , tbuying_manu_coun_id = $varmanucounid ";
   $sw=1;
}


if ($buying['ttransport_id'] != $buying['ttransport_id0']) {
   $vartransportid = GetSQLValueString($buying['ttransport_id'],"text");
   $Maj = $Maj." , tbuying_transport_id = $vartransportid ";
   $sw=1;
}

if ($sw==1) {
	$varowid = GetSQLValueString($buying['tbuying_rowid'],"int");
	$updateSQL = $Maj. " WHERE tbuying_rowid = $varowid ;";
	// echo "Maj final = $Maj<BR>";

/*
$hostname_cibproto = "localhost";
$database_cibproto = "cibase";
$username_cibproto = "root";
$password_cibproto = "";
$cibproto = mysqli_pconnect($hostname_cibproto, $username_cibproto, $password_cibproto) or trigger_error(mysqli_error(),E_USER_ERROR); 

	echo "C'est FINI";
	*/
	// echo "database_cibproto=$database_cibproto";
	// echo "cibproto=$cibproto";
	
	/*
	mysqli_select_db($database_cibproto, $cibproto);
	*/
  // echo "cibproto=$cibproto";
  $Result1 = mysqli_query($updateSQL, $cibproto) or die(mysqli_error());

	return true;
} else return false;

}
?>
