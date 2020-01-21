<?php
require_once('../Connections/cibproto.php'); 
require_once('utilang_en.php');

// $kelcategory= $_GET["kelcategory"];
 //require_once("selectedcurrency.php");
//echo (" aic_form_buying_input_qual_insert.php <BR>");
$editFormAction = $_SERVER['PHP_SELF'];

if (isset($_SERVER['QUERY_STRING'])) {

  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
  
}

$t_ec_id = $_SESSION['COUNTRY'];
$tbuying_auth = $_SESSION['username'];

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "aic_form_buying_input_qual"))
 {

   mysqli_select_db($database_cibproto, $cibproto);
   $_POST['tnotqual_mod']=date("Y-m-d");
   $query = "select STR_TO_DATE('{$_POST['tnotqual_date']}', '%d-%m-%Y' ) Date_not,STR_TO_DATE('{$_POST['tnotqual_dmod']}', '%d-%m-%Y' ) Date_mod" ;
	$result = mysqli_query($query, $cibproto)or die(mysqli_error());;
	$affected_rows = mysqli_num_rows($result);

//S'il y a exactement un résultat, l'utilisateur est authentifié, sinon, on l'empêche d'entrer
	if($affected_rows == 1) {
	$pointeur_dbid=mysqli_fetch_object ($result); 
	$dnotif = $pointeur_dbid->Date_not;
	$dmod = date("Y-m-d");
	}
  
  	if (ControleInsert($_POST)) {
  
  	$insertSQL = sprintf("INSERT INTO tnotqual (tnotqual_id, tbuying_rowid,tmotifqual_id, tnotqual_lot,tnotqual_date,
  	tnotqual_status, tnotqual_remark, tnotqual_dmod, tnotqual_auth) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)",
                     //  GetSQLValueString($_POST['tnotqual_id'], "text"),
					 GetSQLValueString($maxim, "text"),
                       GetSQLValueString($rowid, "text"),
					  //  GetSQLValueString($_POST['tbuying_rowid'], "text"),
                       GetSQLValueString($_POST['tmotifqual_id'], "text"),
                       GetSQLValueString($_POST['tnotqual_lot'], "text"),
					   GetSQLValueString($dnotif, "date"),
                       GetSQLValueString($_POST['tnotqual_status'], "text"),
                       GetSQLValueString($_POST['tnotqual_remark'], "text"),
                       GetSQLValueString($dmod, "date"),
					   GetSQLValueString($tbuying_auth, "text"));

   
 //	 echo " Ligne a inserer=$insertSQL <BR>";

  	mysqli_select_db($database_cibproto, $cibproto);
// $Result1 = mysqli_query($insertSQL, $cibproto) or die(mysqli_error());

	  if (!$Result1= mysqli_query($insertSQL, $cibproto)) {
 		 $return = new Exception("Erreur SQL");
		$tbl = $return->getTrace();
	// echo " Insert=$insertSQL <BR>";
		$errorno=mysqli_errno();
		$errorsql=mysqli_error();
	// 	echo "Erreur=$error_AEXT $errorno <BR>";
 	}	 
 	else
	 {
 	echo " $msg_ins <BR>";
   }
 //
  $insertGoTo = "manage_form_ins.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  // Pourquoi revenir au menu c'est pas normal  A REVOIR 
  //
 // header(sprintf("Location: %s", $insertGoTo));
}
}
?>