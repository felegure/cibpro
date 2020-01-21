<?php 
session_start();
require_once('../Connections/cibproto.php'); 
error_reporting(E_ALL);
$rowid= $_GET['rowid'];
$buying=$_GET['hab'];
$usercountry=$_SESSION['username'];

$currentPage = $_SERVER["PHP_SELF"];
$message3="Mauvais format de date";
require_once ("utilang_en.php");
// mysqli_nom_rows(results) retourne le nombre de resultats du Query
///
// 20 10 09 modifié ce pgm pour onCLick= CalculateTotal....()
$editFormAction = $_SERVER['PHP_SELF'];	
//$ok=$_POST["tbuying_ok"];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}
 if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form2")) {
// if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "aic_form_input")) {
   
 $ok=$_POST["tbuying_ok"];
 $val=$_POST["tbuying_val"];
 echo "Main ok=$ok , val=$val<BR>";  
//if ($ok ==1)
// {
$retour=ControleFields($_POST,$ok);
 // echo " retourX=$retour <BR>";

   if (ControleFields($_POST,$ok))
   {
  //echo " If ControleFields  <BR>";
  	$buying=$_POST;
	var_dump($buying);
	mysqli_select_db($cibproto, $database_cibproto);
	$query = "SELECT * FROM $view_tprov_country where tprov_id = {$_POST['tprov_id']} order by tprov_desc ";

//exécution de la requête et récupération du nombre de résultats
	$result = mysqli_query($cibproto, $query)or die(mysqli_error($cibproto));
	$affected_rows = mysqli_num_rows($result);
//S'il y a exactement un résultat, l'utilisateur est authentifié, sinon, on l'empêche d'entrer
	if($affected_rows == 1) {
	$pointeur_prov=mysqli_fetch_object ($result); 
	$VAR_PAYS_PROV = $pointeur_prov->tprov_coun_id;
    }


	$querym = "SELECT * FROM $view_manuf_country  where tmanu_id = {$_POST['tmanu_id']} order by tmanu_desc";

//exécution de la requête et récupération du nombre de résultats

	$result = mysqli_query($cibproto, $querym)or die(mysqli_error($cibproto));
	$affected_rows = mysqli_num_rows($result);
// S'il y a exactement un résultat, l'utilisateur est authentifié, sinon, on l'empêche d'entrer
	if($affected_rows == 1) {
	$pointeur_manu=mysqli_fetch_object ($result); 
	$VAR_PAYS_MANU = $pointeur_manu->tmanu_coun_id;
	// echo "  VAR_PAYS_MANU=$VAR_PAYS_MANU <BR>";
	}
	require_once("selectedcurrency.php");

	$CURE=$_POST['tcur_id'];

 // echo "XXXX Post_tcur_id=$CURE<BR>";

	$message = "";
	$Maj="Update $tbuying_table set ";

	$sw=0;

	if ($_POST['tsmalunit_id'] != '0') 
  	if ($_POST['tsmalunit_id'] != $_POST['tsmalunit_id0']) {
    $varsmalunit = GetSQLValueString($buying['tsmalunit_id'],"text");
	if ($sw == 0)
	$Maj = $Maj." tbuying_smalunit_id = $varsmalunit ";
	else 
	$Maj = $Maj.", tbuying_smalunit_id = $varsmalunit ";
	$sw=1;
	
 //	 echo "Maj apres varsmalunit =$Maj<BR>";
  	}
 
	$varpresent = GetSQLValueString($_POST['tpresent_id'],"text");
  	$varpresent2 = GetSQLValueString($_POST['tpresent_id0'],"text");
  // echo " varpresent=$varpresent  , varpresent2=$varpresent2<BR>";

	if ($_POST['tpresent_id'] != '0' ) 
  	if ($_POST['tpresent_id'] != $_POST['tpresent_id0']) 
  	{
	   // $varpresent = GetSQLValueString($buying['tpresent_id'],"text");
   		if ($sw==0)
   		$Maj = $Maj." tbuying_present_id = $varpresent ";
  		 else
   		 $Maj = $Maj." , tbuying_present_id = $varpresent ";
  		 $sw=1;
  //   echo "Maj apres varpresent=$Maj   sw=$sw<BR>";
  	} 
 
	if ($_POST['tpack_id'] != '0' )
  	if ($_POST['tpack_id'] != $_POST['tpack_id0']) {
   	$varpack = GetSQLValueString($_POST['tpack_id'],"text");
   	if ($sw==0)
   	$Maj = $Maj." tbuying_pack_id = $varpack ";
   	else
   	$Maj = $Maj." , tbuying_pack_id = $varpack ";
    $sw=1;
//    echo "Maj apres varpack =$Maj<BR>";
 	} 
////////////////////////////////////
	$sw_calc=0;  // sera utilise pour reclaculer le total cost ou pas
	 // si $sw_calc==1 don on doit recalculer 
	$varcurText = GetSQLValueString($_POST['tcur_id0'],"text");
	$varcur = $_POST['tcur_id0'];
	if ($_POST['tcur_id'] != '0') 
  	if ($_POST['tcur_id'] != $_POST['tcur_id0']) {
   	$varcurText = GetSQLValueString($_POST['tcur_id'],"text");
	$varcur = $_POST['tcur_id'];
	$sw_calc=1; 
  	if ($sw==0) 
	$Maj = $Maj." tbuying_cur_id = $varcurText";
	else
	$Maj = $Maj." , tbuying_cur_id = $varcurText";
    $sw=1;
	}
	
    if ( $_POST["tbuying_ok"]!= 0){
  
	if ($ok==2)
	$ppp1=$buying['tbuying_price_per_pack'];
	
	$ppp2=$buying['tbuying_price_per_pack2'];
	$ppp2=sprintf("%.4f",$ppp2);
	// echo "ppp2=$ppp2 <BR>";
	$ppu1=$buying['tbuying_ppu'];
	$buying['tbuying_ppu1']=$buying['tbuying_ppu'];
// $buying['tbuying_ppu2']=$buying['tbuying_ppu2'];
	$PRICE_PER_PACK_TEMP=$buying['ppp2'];
	$PRICE_PER_PACK_TEMP=sprintf("%.4f",$PRICE_PER_PACK_TEMP);
	if ( $_POST["tbuying_ok"]== 2) // si Price per pack
	{
	
	$PRICE_PER_SMALLEST_UNIT=$buying['tbuying_price_per_pack2'] / $buying['tbuying_pack_size2'];
	$QU_TEMP=$buying['tbuying_pack_size2'] * $buying['tbuying_qty_pack2'];
    

	// echo "THEN PRICE_PER_SMALLEST_UNIT=$PRICE_PER_SMALLEST_UNIT<BR> QU_TEMP=$QU_TEMP <BR> ";
// $PRICE_PER_SMALLEST_UNIT=$buying['tbuying_ppu2']; //
// $QU_TEMP=$buying['tbuying_qu2'];
	}	
	else{
	$PRICE_PER_SMALLEST_UNIT=$buying['tbuying_ppu2'];
	$PRICE_PER_SMALLEST_UNIT=sprintf("%.4f",$buying['tbuying_ppu2']);
	
	$QU_TEMP=sprintf("%.4f",$buying['tbuying_qu2']);
	
	// QU_TEMP A GERER
	$QTY_TEMP=$buying['tbuying_qu2'] / $buying['tbuying_pack_size2']; 
	$QTY_TEMP=sprintf("%.4f",$QTY_TEMP);
	 // echo "Else PRICE_PER_SMALLEST_UNIT=$PRICE_PER_SMALLEST_UNIT<BR> QU_TEMP=$QU_TEMP <BR> QTY_TEMP=$QTY_TEMP";
	}

// echo "PRICE_PER_SMALLEST_UNIT=$PRICE_PER_SMALLEST_UNIT<BR>";
//echo "QU_TEMP= <BR>";
	$TOTAL_COST=$buying['tbuying_tcost2'];
// $QTY_PACK=$buying['tbuying_qty_pack2'];

	$qu1=$buying['tbuying_qu'];
	if ($_POST['tbuying_ok']==1)
 	$qu2=$buying['tbuying_qu2'];
     if ($ok==2)
	$qty1=$buying['tbuying_qty_pack'];
	// $qty2=$buying['tbuying_qty_pack2'];
	$qty2=$buying['qty2'];
	$total_cost=$buying['tbuying_tcost2'];

	if ( $_POST["tbuying_ok"]!= 0)
	{
	$PPP_TEMP=sprintf("%.4f",$ppp2);
	$PRICE_PER_PACK_TEMP=sprintf("%.4f",$ppp2);
	// $PRICE_PER_PACK_TEMP=sprintf("%.4f",$_POST['tbuying_price_per_pack2']);
	
	$sw_calc=1;
	// $ppu1=$_POST['ppu2'];
//	 echo " XXXX ppu1_TEMP=$ppu1<BR>";
	$varppu = GetSQLValueString($ppp2,"double");
	if ( $varcur =='EUR')
	{
			$CUR_VAL = $TCURVAL_EUR;
			$PPP_DOL = $PRICE_PER_PACK_TEMP * $CUR_VAL;
			$PPP_EUR = $PRICE_PER_PACK_TEMP;
			$PPU_DOL = $PRICE_PER_SMALLEST_UNIT * $CUR_VAL;
			$PPU_EUR = $PRICE_PER_SMALLEST_UNIT;
			$TOTAL_COST_DOL = $TOTAL_COST * $CUR_VAL;
			$TOTAL_COST_EUR = $TOTAL_COST;
	}
    else {
		    $CUR_VAL = $TCURVAL_DOL;  		
		    $PPP_DOL = $PRICE_PER_PACK_TEMP;
			$PPP_EUR = $PRICE_PER_PACK_TEMP * $CUR_VAL;
			$PPU_DOL = $PRICE_PER_SMALLEST_UNIT;
			$PPU_EUR = $PRICE_PER_SMALLEST_UNIT * $CUR_VAL;
			$TOTAL_COST_DOL = $TOTAL_COST;
			$TOTAL_COST_EUR = $TOTAL_COST* $CUR_VAL; ;
	}
	// echo "  A sw=$sw  PPP_TEMP=$PPP_TEMP <BR>";
	
	if ($PPP_TEMP > 0){
		if ($sw == 0) 
		{// $Maj = $Maj." tbuying_ppu = $varppu";
		
		$Maj = $Maj." tbuying_price_per_pack = $PPP_TEMP";
		$Maj = $Maj. ", tbuying_price_per_pack_dol =  $PPP_DOL";
	    $Maj = $Maj. ", tbuying_price_per_pack_eur =  $PPP_EUR";
        }
     	else {
	// $Maj = $Maj." , tbuying_ppu = $varppu";
		$Maj = $Maj." , tbuying_price_per_pack = $PPP_TEMP"; 
		$Maj = $Maj. ", tbuying_price_per_pack_dol =  $PPP_DOL";
	 	$Maj = $Maj. ", tbuying_price_per_pack_eur =  $PPP_EUR";
	 	 }
		 $sw=1;
	}	
	// $Maj = $Maj. ", tbuying_price_per_pack_dol =  $PPP_DOL";
	//  $Maj = $Maj. ", tbuying_price_per_pack_eur =  $PPP_EUR";
	// $sw=1;
    }	
 // echo "DEUX";
  // echo "  sw=$sw Maj=$Maj<BR>";
 ///////	/
 	if ($buying['tbuying_qu'] != $_POST['qu2'])  {
 	$sw_calc=1; 
	
	// echo "sw_calc=$sw_calc <BR>";
	$varqu =  GetSQLValueString($_POST['qu2'],"double");
	$varqu=sprintf("%.4f",$varqu);
	// echo "varqu=$varqu <BR>";
	// $QU_TEMP=sprintf("%.4f",$_POST['qu2']);
	 //
	 if ($QU_TEMP > 0){
		if ($sw==0) 
		 $Maj = $Maj."  tbuying_qu = $QU_TEMP";
		 else{
		 $Maj = $Maj."  ,tbuying_qu = $QU_TEMP";
		
	 	 }
		  $sw=1;
 		}
	}
	 // echo " QU_TEMP=$QU_TEMP, sw=$sw ,  Maj=$Maj <BR>";
//$varqu = 1;
	if ($ok==2)
	$varqty =  GetSQLValueString($buying['tbuying_qty_pack'],"double");
	if ($ok==2)
	$QTY_TEMP=sprintf("%.4f",$_POST['tbuying_qty_pack']);
    if ($ok==1 || $ok==2)
	 if ($_POST['tbuying_qty_pack'] != $_POST['qty2'])  {
 	$sw_calc=1; 
	$varqty =  GetSQLValueString($_POST['qty2'],"double");
	$varqty=sprintf("%.4f",$varqty);
	
	 $QTY_TEMP=sprintf("%.4f",$_POST['qty2']);
// echo " QTY_TEMP=$QTY_TEMP <BR>";
	if ($QTY_TEMP >0){
		if ($sw==0) 
		 $Maj = $Maj."  tbuying_qty_pack = $QTY_TEMP";
		 else{
		 $Maj = $Maj."  ,tbuying_qty_pack = $QTY_TEMP";
		
	 	 }
		  $sw=1;
 		}
 	}
 $PACK_SIZE_TEMP= sprintf("%.4f",$_POST['tbuying_pack_size']);
 
if ($_POST['tbuying_pack_size'] != $_POST['tbuying_pack_size2']  ) {
 	$sw_calc=1; 
	$PACK_SIZE_TEMP=sprintf("%f",$_POST['tbuying_pack_size2']);

if ($PACK_SIZE_TEMP > 0) {
	 if ($sw == 0) 
		
		$Maj = $Maj." tbuying_pack_size = $PACK_SIZE_TEMP";
     else {
	
		$Maj = $Maj." , tbuying_pack_size = $PACK_SIZE_TEMP";
	 
	 }
  	 $sw=1;
 	 }
 }
   //  echo "XXXX valeur de Quantite =$Maj <BR>";
// $varcost = GetSQLValueString($buying['tbuying_tcost'],"text");


// echo " varppu=$varppu, varqu=$varqu <BR>";
// $varppu=sprintf("%.2f",$varppu);
//$varqu=sprintf("%.2f",$varqu);
/*
echo "XXX QTY_TEMP=$QTY_TEMP<BR>";
echo "XXX PRICE_PER_PACK=$PRICE_PER_PACK_TEMP<BR>";
echo "XXX PACK_SIZE_TEMP=$PACK_SIZE_TEMP<BR>";
echo "XXX valeur de sw=$sw<BR>";

*/
// $varcost = $QU_TEMP * $PRICE_PER_PACK_TEMP ;
$varcost = $_POST['tbuying_tcost2'];
$TOTAL_COST = $_POST['tbuying_tcost2'];


$tbuying_ok=$_POST['tbuying_ok'];
	/*
		echo "XXX varcur=$varcur<BR>";
		echo "XXX PPP_DOL=$PPP_DOL<BR>";
		echo "XXX PPP_EUR=$PPP_EUR<BR>";
		echo "XXX TOTAL_COST=$TOTAL_COST<BR>";
		echo "XXX TOTAL_COST_EUR=$TOTAL_COST_EUR<BR>";
		echo "XXX TOTAL_COST_DOL=$TOTAL_COST_DOL<BR>";
		echo "XXX PPP_DOL=$PPP_DOL<BR>";
		echo "XXX PPP_EUR=$PPP_EUR<BR>";
		echo "XXX valeur de sw=$sw<BR>";

*/
if ($PPP_DOL > 0) {
		 $Maj = $Maj." ,tbuying_tcost = $TOTAL_COST ";
		 $Maj = $Maj." ,tbuying_tcost_dol = $TOTAL_COST_DOL ";
		 $Maj = $Maj." ,tbuying_tcost_eur = $TOTAL_COST_EUR ";
		 $Maj = $Maj." ,tbuying_ppu = $PRICE_PER_SMALLEST_UNIT ";
		 $Maj = $Maj." ,tbuying_ppu_dol = $PPU_DOL ";
		 $Maj = $Maj." ,tbuying_ppu_eur = $PPU_EUR ";
		 $sw=1; 
		// echo "XXXXX Maj=$Maj et sw=$sw   PPU_DOL=$PPU_DOL<BR>";
}
// echo "XXXXX Maj=$Maj <BR>";
}
$varexr = sprintf("%.4f",$_POST['exr']);
if ($_POST['exr'] != $_POST['exr2'])  {
//$varexr = GetSQLValueString($buying['exr2'],"text");
$varexr = sprintf("%.4f",$_POST['exr2']);
if ($sw==0) 
		   $Maj = $Maj." tbuying_exr = $varexr ";
		 else{
		  $Maj = $Maj." , tbuying_exr = $varexr ";
		  }
          $sw=1; 
	 }	  
 
	 
// }
		 
//    echo "XXXX  Valeur de varcost=$varcost <BR>";
// } //// NOW
// echo "XXXX  Valeur de Maj apres varcost=$Maj <BR>";

if ($_POST['tpresent_id'] != '0') {
  if ($_POST['tpresent_id'] != $_POST['tpresent_id0']) {
   $varpresent =  GetSQLValueString($_POST['tpresent_id'],"text");
   if ($sw==0) 
		 $Maj = $Maj." tbuying_present_id = $varpresent ";
		 else{
		 $Maj = $Maj." , tbuying_present_id = $varpresent ";
		
	 	 }
   $sw=1;
 //   echo "XXXX Maj valeur de tpresent_id=$Maj<BR>";
  }
}


//    echo "XXXX valeur de Price_per_pack et tout le reste Quantite =$Maj <BR>";

if ($_POST['tinco_id'] != '0'){
  if ($_POST['tinco_id'] != $_POST['tinco_id0']) {
   $varinco = GetSQLValueString($_POST['tinco_id'],"text");
   if ($sw==0) 
		  $Maj = $Maj." tbuying_inco_id = $varinco ";
		 else{
		   $Maj = $Maj." , tbuying_inco_id = $varinco ";
		
	 	 }
         $sw=1;
//    echo "XXXX valeur de tinco_id=$varinco";
  }
}


if ($_POST['tsrcfund_id'] != '0') {
  if ($_POST['tsrcfund_id'] != $_POST['tsrcfund_id0']) {
   $varsrcfund = GetSQLValueString($buying['tsrcfund_id'],"text");
   if ($sw==0) 
		  $Maj = $Maj." tbuying_srcfund_id = $varsrcfund ";
		 else{
		  $Maj = $Maj." , tbuying_srcfund_id = $varsrcfund ";
		 }
          $sw=1;
 //     echo "XXXXXXXXXXXXXXXXapres tsrcfund_id=$Maj<BR>";
  }
}

if ($_POST['tprov_id'] != '0') {
  if ($_POST['tprov_id'] != $_POST['tprov_id0']) {
  $varprovid = GetSQLValueString($_POST['tprov_id'],"text");
  //  echo "VVVV varprod=$varprovid<BR>";
   if ($sw==0) {
		  $Maj = $Maj." tbuying_prov_id = $varprovid ";
		  $varprov_coun_id = $pointeur_prov->tprov_coun_id;
          $Maj = $Maj." , tbuying_prov_coun_id = '$varprov_coun_id' ";
		  }
		 else {
		  $Maj = $Maj." , tbuying_prov_id = $varprovid ";
		  $varprov_coun_id = $pointeur_prov->tprov_coun_id;
   		  $Maj = $Maj." ,tbuying_prov_coun_id = '$varprov_coun_id' ";
		
	 	 }
          $sw=1;
   //   echo "XXXX valeur de tprov_id=$varprovid<BR>";
  }
}  
//  echo " apres Stprov_XXXXX Maj= $Maj<BR>";
if ($_POST['ttype_prov_id'] != '0') {
  if ($_POST['ttype_prov_id'] != $_POST['ttype_prov_id0']) {
   $varttypeprovid = GetSQLValueString($_POST['ttype_prov_id'],"text");
  if ($sw==0) 
		 $Maj = $Maj." tbuying_type_prov_id = $varttypeprovid ";
		 else{
		  $Maj = $Maj." , tbuying_type_prov_id = $varttypeprovid ";
		 
	 	 }
         $sw=1;
  //   echo "XXXX valeur de type prov_id =$varttypeprovid <BR>";
  }
}
if ($_POST['tmanu_id'] != '0') {
  if ($_POST['tmanu_id'] != $_POST['tmanu_id0']) {
   $varmanuid = GetSQLValueString($_POST['tmanu_id'],"text");
     if ($sw==0) {
		 $Maj = $Maj." tbuying_manu_id = $varmanuid ";
		// 		 $varmanucounid = $pointeur_prov->tprov_coun_id;
			
		  $Maj = $Maj." , tbuying_manu_coun_id = '$VAR_PAYS_MANU' ";
   //      $Maj = $Maj." , tbuying_manu_coun_id = '$varmanucounid' ";
// echo "XXXXx sw = 0 varmanucounid valeur de Maj = $Maj <BR>"; 
         }
		 else {
		 $Maj = $Maj." , tbuying_manu_id = $varmanuid ";
		 $varmanucounid = $pointeur_manu->tmanu_coun_id;
         $Maj = $Maj." , tbuying_manu_coun_id = '$varmanucounid' ";
//		echo "XXXXx sw = 1 varmanucounid valeur de Maj = $Maj <BR>"; 
	 	 }
   //   echo "XXXX valeur de tmanu_id=$varmanuid";
	      $sw=1;
  }
}

$vartransportid = GetSQLValueString($_POST['ttransport_id'],"text");
if ($_POST['ttransport_id'] != '0') {
  if ($_POST['ttransport_id'] != $_POST['ttransport_id0']) {
   $vartransportid = GetSQLValueString($_POST['ttransport_id'],"text");
    if ($sw==0) 
		  $Maj = $Maj." tbuying_transport_id = $vartransportid ";
		 else{
		   $Maj = $Maj." , tbuying_transport_id = $vartransportid ";
		
	 	 }
          $sw=1;
  //   echo "XXXX valeur de transport_id=$vartransportid<BR>";
  }
}

$varleadtime = GetSQLValueString($_POST['tbuying_lead_time2'],"text");
if ($_POST['tbuying_lead_time'] != $_POST['tbuying_lead_time2'])  {
$varleadtime = GetSQLValueString($_POST['tbuying_lead_time2'],"text");
if ($sw==0) 
		  $Maj = $Maj." tbuying_lead_time = $varleadtime ";
		 else{
		  $Maj = $Maj." , tbuying_lead_time = $varleadtime ";
		 
		 }
	     $sw=1;
}

// Zone comment

if ($buying['tbuying_remark2'] != "")
{
	$varemark = GetSQLValueString($_POST['tbuying_remark'],"text");
	$varemark2 = GetSQLValueString($_POST['tbuying_remark2'],"text");
	// echo "varemark=$varemark, varemark2=$varemark2 <BR>";
	if ($_POST['tbuying_remark'] != $_POST['tbuying_remark2'])  {
	$varemark = GetSQLValueString($_POST['tbuying_remark2'],"text");
	if ($sw==0) 
		   $Maj = $Maj." tbuying_remark = $varemark2";
		 else{
		   $Maj = $Maj." , tbuying_remark = $varemark2";
		
	     }
		  $sw=1;
		//  echo "Maj=$Maj <BR>";
 }
}
  $vardbid = GetSQLValueString($_POST['tbuying_dbid'] ,"date");
// echo "Xvardbid=$vardbid <BR>";

 $vardbid2 = GetSQLValueString($_POST['tbuying_dbid2'] ,"date");
 $longueur=strlen($vardbid2);
 	// echo "XXXXXXXXXXXXXXvardbid=$vardbid YYYYYYYYYY vardbid2=$vardbid2 xx longueur de vardbid2=$longueur <BR>";
//if (empty($vardbid2))  
//echo "XXXXXXXXXXXXXXvardbid2 VIDE=$vardbid2 YYYYYYYYYY vardbid2=$vardbid2<BR>";
//if ($vardbid2 == "NULL") 
// echo "XXXXXXXXXXXXXXvardbid2 NULL=$vardbid2 YYYYYYYYYY vardbid2=$vardbid2<BR>";
if ($vardbid2 != "NULL" && $longueur == 12)
{
    if ($vardbid != $vardbid2 && $longueur ==12) 
    {
		$annee = substr($vardbid2,7,4);
		$mois = substr($vardbid2,4,2);
		$jour = substr($vardbid2,1,2);
    //	 echo (" DIFF XXXXXXXXXXXXX jour=$jour, mois=$mois, annee=$annee");
	    if ($mois!="" && $jour!="" && $annee!="")
		
		if (checkdate($mois,$jour,$annee))
		{
		  $LaDate=formater($vardbid2, true);
		//  echo "XXX AU retour laDate=$LaDate<BR>";
		  // tester le mois  et l"année 
		  // tester avec les fonctions onChange de javascript ce serait plu ssimple 
		  mysqli_select_db($database_cibproto, $cibproto);
	//	  $query = "select STR_TO_DATE('{$_POST['tbuying_dbid']}', '%d-%m-%Y' ) Date_bid";
	      $query = "select STR_TO_DATE('{$_POST['tbuying_dbid2']}', '%d-%m-%Y' ) Date_bid";

		  $result = mysqli_query($cibproto, $query)or die(mysqli_error($cibproto));
		  $affected_rows = mysqli_num_rows($result);

//S'il y a exactement un résultat, l'utilisateur est authentifié, sinon, on l'empêche d'entrer
		  if($affected_rows == 1) 
		  {
			$pointeur_dbid=mysqli_fetch_object ($result); 

			$dbid = $pointeur_dbid->Date_bid;
			//  echo "XXX DDDDdbid=$dbid<BR>";
			if ($sw==0) 
		   		$Maj = $Maj." tbuying_dbid = '$dbid'";
		
			//DATE_FORMAT"."($dbid,'%d-%m-%Y') ";
		 	else{
				 $Maj = $Maj." , tbuying_dbid = '$dbid'";
				// $Maj = $Maj." , tbuying_dbid = DATE_FORMAT". "($dbid,'%d-%m-%Y')";
		    	// $Maj = $Maj." , tbuying_dbid = '$dbid'";
		 		//  echo "XXXXXXXXXXXXXXXXXXXXXXXXX Maj=$Maj <BR>";
	     	}
            $sw=1;
			
		}  // affected_row==1
		//  echo "XXXXXXXXXXXXXXXXXXXXXXXXX Maj=$Maj <BR>";
		
	}   // checkdate 
   else  {
				$message .="  Date of Bid opening ".$message3." <BR>";
				echo " $message3 <BR>";
	}   
	
}
 
  }
  
  else  {
				$message .="  Date of Bid opening / Date of Reception ".$message3. " <BR>";
				echo " $message ! <BR>";
	}  
  // echo ("sw=$sw<BR>");
  $val=$buying['tbuying_val'];
 
  if ($val!= 0)
  if ($sw==1)
   {
     
    $varowid = GetSQLValueString($buying['tbuying_rowid'],"int");
    $updateSQL = $Maj. " WHERE tbuying_rowid = $varowid ;";
	// echo "valeur de Maj=$Maj <BR> varowid=$varowid <BR> et de update=$updateSQL<BR>";
	// echo "valeur tbuying_val=$_POST[tbuying_val] <BR>";
     mysqli_select_db($cibproto, $database_cibproto);
    $Result1 = mysqli_query($cibproto, $updateSQL) or die(mysqli_error());
	// echo " $msg_upd <BR>";    
  	// echo "$message3 XXX sw=$sw<BR>"; 
	  echo " $msg_upd <BR>";  
    }
	else echo "$msg_no_upd <BR>";
  $insertGoTo = "manage_form_ins.php";
 
   if (isset($_SERVER['QUERY_STRING'])) {
  //require_once ("t_search_param_buying_update.php");
   require_once ("aic_form_buying_update_foreme.php");
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
   $insertGoTo .= $_SERVER['QUERY_STRING'];
  }

 }
 }
 
$maxRows_Re_tbuying = 1;
$pageNum_Re_tbuying = 0;
if (isset($_GET['pageNum_Re_tbuying'])) {
  $pageNum_Re_tbuying = $_GET['pageNum_Re_tbuying'];
}
$startRow_Re_tbuying = $pageNum_Re_tbuying * $maxRows_Re_tbuying;

$query_Re_product = "SELECT * FROM $product WHERE tproduct_status = '1' order by tproduct_desc";
$Re_product = mysqli_query($cibproto, $query_Re_product) or die(mysqli_error($cibproto));
$row_Re_product = mysqli_fetch_assoc($Re_product);
$totalRows_Re_product = mysqli_num_rows($Re_product);
mysqli_select_db($cibproto, $database_cibproto);

mysqli_select_db($cibproto, $database_cibproto);
$query_Re_manuf = "SELECT * FROM tmanufacturer WHERE tmanufacturer.tmanu_status='1' order by tmanu_desc";
$Re_manuf = mysqli_query($cibproto, $query_Re_manuf) or die(mysqli_error($cibproto));
$row_Re_manuf = mysqli_fetch_assoc($Re_manuf);
$totalRows_Re_manuf = mysqli_num_rows($Re_manuf);

$query_Re_concent = "SELECT * FROM $concentration where tconcent_status = '1' ORDER BY tconcent_desc ASC";
$Re_concent = mysqli_query($cibproto, $query_Re_concent) or die(mysqli_error($cibproto));
$row_Re_concent = mysqli_fetch_assoc($Re_concent);
$totalRows_Re_concent = mysqli_num_rows($Re_concent);

$colname_Re_smalunit = "1";
if (isset($_GET['1'])) {
  $colname_Re_smalunit = (get_magic_quotes_gpc()) ? $_GET['1'] : addslashes($_GET['1']);
}

$query_Re_smalunit = sprintf("SELECT tsmalunit_id, tsmalunit_desc FROM $smalunit WHERE tsmalunit_status = '%s' order by tsmalunit_desc", $colname_Re_smalunit);
$Re_smalunit = mysqli_query($cibproto, $query_Re_smalunit) or die(mysqli_error($cibproto));
$row_Re_smalunit = mysqli_fetch_assoc($Re_smalunit);
$totalRows_Re_smalunit = mysqli_num_rows($Re_smalunit);

$query_Re_packaging = "SELECT tpack_id, tpack_desc FROM $pack WHERE tpack_status = '1' order by tpack_desc";
$Re_packaging = mysqli_query($cibproto, $query_Re_packaging) or die(mysqli_error($cibproto));
$row_Re_packaging = mysqli_fetch_assoc($Re_packaging);
$totalRows_Re_packaging = mysqli_num_rows($Re_packaging);

$query_Re_present = "SELECT tpresent_id, tpresent_desc FROM $present WHERE tpresent_status = '1' order by tpresent_desc";
$Re_present = mysqli_query($cibproto,$query_Re_present) or die(mysqli_error($cibproto));
$row_Re_present = mysqli_fetch_assoc($Re_present);
$totalRows_Re_present = mysqli_num_rows($Re_present);


$query_Re_currency = "SELECT tcur_id, tcur_desc FROM $cur WHERE tcur_status = '1' order by tcur_desc DESC";
$Re_currency = mysqli_query($cibproto, $query_Re_currency) or die(mysqli_error($cibproto));
$row_Re_currency = mysqli_fetch_assoc($Re_currency);
$totalRows_Re_currency = mysqli_num_rows($Re_currency);

//mysqli_select_db($database_cibproto, $cibproto);
$query_Re_srcfund = "SELECT tsrcfund_id, tsrcfund_desc FROM $srcfund WHERE tsrcfund_status = '1' order by tsrcfund_desc";
$Re_srcfund = mysqli_query($cibproto, $query_Re_srcfund) or die(mysqli_error($cibproto));
$row_Re_srcfund = mysqli_fetch_assoc($Re_srcfund);
$totalRows_Re_srcfund = mysqli_num_rows($Re_srcfund);

//mysqli_select_db($database_cibproto, $cibproto);
$query_Re_provider = "SELECT tprov_id, tprov_coun_id, tprov_desc FROM tprovider WHERE tprov_status = '1' order by tprov_desc";
$Re_provider = mysqli_query($cibproto, $query_Re_provider) or die(mysqli_error($cibproto));
$row_Re_provider = mysqli_fetch_assoc($Re_provider);
$totalRows_Re_provider = mysqli_num_rows($Re_provider);
//
//mysqli_select_db($database_cibproto, $cibproto);
$query_Re_ttype_prov = "SELECT ttype_prov_id, ttype_prov_desc FROM $typrov WHERE ttype_prov_status = '1' ORDER BY ttype_prov_desc ASC";
$Re_ttype_prov = mysqli_query($cibproto, $query_Re_ttype_prov) or die(mysqli_error($cibproto));
$row_Re_ttype_prov = mysqli_fetch_assoc($Re_ttype_prov);
$totalRows_Re_ttype_prov = mysqli_num_rows($Re_ttype_prov);

//mysqli_select_db($database_cibproto, $cibproto);
$query_Re_transport = "SELECT ttransport_id, ttransport_desc FROM $transport WHERE ttransport_status = '1' order by ttransport_desc";
$Re_transport = mysqli_query($cibproto, $query_Re_transport) or die(mysqli_error($cibproto));
$row_Re_transport = mysqli_fetch_assoc($Re_transport);
$totalRows_Re_transport = mysqli_num_rows($Re_transport);

//mysqli_select_db($database_cibproto, $cibproto);
$query_Re_tincoterm = "SELECT tinco_id, tinco_desc FROM tincoterm WHERE tinco_status = '1' order by tinco_desc";
$Re_tincoterm = mysqli_query($cibproto,$query_Re_tincoterm) or die(mysqli_error($cibproto));
$row_Re_tincoterm = mysqli_fetch_assoc($Re_tincoterm);
$totalRows_Re_tincoterm = mysqli_num_rows($Re_tincoterm);

$colname_Re_prod = "1";
if (isset($_SESSION['STATCOUNTRY'])) {
  $colname_Re_prod = (get_magic_quotes_gpc()) ? $_SESSION['STATCOUNTRY'] : addslashes($_SESSION['STATCOUNTRY']);
}
//mysqli_select_db($database_cibproto, $cibproto);

$query_Re_prod = sprintf("SELECT * FROM $product 
WHERE tproduct_status = '%s' order by tproduct_desc", $colname_Re_prod);
$Re_prod = mysqli_query($cibproto,$query_Re_prod) or die(mysqli_error($cibproto));
$row_Re_prod = mysqli_fetch_assoc($Re_prod);
$totalRows_Re_prod = mysqli_num_rows($Re_prod);

$query_Re_tempo_tbuying = "SELECT tbuying_rowid, tecowas_id, tecowas_desc, 
tproduct_id, tproduct_desc, tproduct_brand_name, 
tpack_id, tpack_desc, 
tbuying_price_per_pack, tbuying_price_per_pack_dol, tbuying_price_per_pack_eur, tbuying_pack_size,
tbuying_lead_time, tbuying_qu, tbuying_qty_pack,
ttransport_id, ttransport_desc, tpresent_id, tpresent_desc, tinco_id, 
tinco_desc, DATE_FORMAT(tbuying_dbid,'%d-%m-%Y') tbuying_dbid, tcur_id, tcur_desc, tcur_symb, exr, tsrcfund_id, 
tsrcfund_desc, tprov_id, tprov_desc, tprov_coun_id, tprov_coun_desc, ttype_prov_id, 
ttype_prov_desc, tmanu_id, tmanu_desc, tmanu_coun_id, tmanu_coun_desc, 
tsmalunit_id, tsmalunit_desc, tbuying_ppu, tbuying_ppu_dol, tbuying_ppu_eur, 
tbuying_tcost, tbuying_tcost_dol, tbuying_tcost_eur,tbuying_qty_pack, tbuying_pack_size, 
tbuying_lead_time, tbuying_remark, tbuying_status
 FROM $view_table_name WHERE  tbuying_rowid=$rowid and tbuying_status='2'
and tecowas_id='$t_ec_id' ";

$Re_tempo_tbuying = mysqli_query($cibproto,$query_Re_tempo_tbuying) or die(mysqli_error());
$row_Re_tempo_tbuying = mysqli_fetch_assoc($Re_tempo_tbuying) or die(mysqli_error($cibproto));
$totalRows_Re_tempo_tbuying = mysqli_num_rows($Re_tempo_tbuying);

//mysqli_select_db($database_cibproto, $cibproto);
$query_Re_manuf = "SELECT * FROM tmanufacturer WHERE tmanu_status='1' order by tmanu_desc";
$Re_manuf = mysqli_query($cibproto,$query_Re_manuf) or die(mysqli_error($cibproto));
$row_Re_manuf = mysqli_fetch_assoc($Re_manuf);
$totalRows_Re_manuf = mysqli_num_rows($Re_manuf);

//mysqli_select_db($database_cibproto, $cibproto); 
$query_Re_tinco1 ="SELECT tinco_id, tinco_desc FROM tincoterm WHERE
tinco_status = '1' order by tinco_desc" ; 
$Re_tinco1 = mysqli_query($cibproto,$query_Re_tinco1) or die(mysqli_error($cibproto));
$row_Re_tinco1 = mysqli_fetch_assoc($Re_tinco1); 
$totalRows_Re_tinco1 = mysqli_num_rows($Re_tinco1); 

$maxRows_Re_tempo_tbuying = 1; 
$pageNum_Re_tempo_tbuying = 0; 
if (isset($_GET['pageNum_Re_tempo_tbuying'])) { $pageNum_Re_tempo_tbuying = $_GET['pageNum_Re_tempo_tbuying']; 
} 
$startRow_Re_tempo_tbuying = $pageNum_Re_tempo_tbuying * $maxRows_Re_tempo_tbuying; 
//mysqli_select_db($database_cibproto, $cibproto); 

$query_limit_Re_tempo_tbuying = sprintf("%s LIMIT %d, %d", $query_Re_tempo_tbuying, $startRow_Re_tempo_tbuying, $maxRows_Re_tempo_tbuying); 
$Re_tempo_tbuying = mysqli_query($cibproto,$query_limit_Re_tempo_tbuying) or die(mysqli_error($cibproto));
$row_Re_tempo_tbuying = mysqli_fetch_assoc($Re_tempo_tbuying); 
if (isset($_GET['totalRows_Re_tempo_tbuying'])) { $totalRows_Re_tempo_tbuying = $_GET['totalRows_Re_tempo_tbuying'];
 } 
 else { $all_Re_tempo_tbuying = mysqli_query($cibproto,$query_Re_tempo_tbuying); 
 $totalRows_Re_tempo_tbuying = mysqli_num_rows($all_Re_tempo_tbuying); 
 } 
 $totalPages_Re_tempo_tbuying = ceil($totalRows_Re_tempo_tbuying/$maxRows_Re_tempo_tbuying)-1; 
 $queryString_Re_tempo_tbuying ="";
  if (!empty($_SERVER['QUERY_STRING'])) { 
  $params = explode("&", $_SERVER['QUERY_STRING']); 
  $newParams = array(); 
  foreach ($params as $param) { 
    if (stristr($param,"pageNum_Re_tempo_tbuying") == false&&
	    stristr($param,"totalRows_Re_tempo_tbuying") == false) { 
	   array_push($newParams, $param); 
	}
  } 
  if (count($newParams) != 0) { 
	$queryString_Re_tempo_tbuying ="&". htmlentities(implode("&", $newParams)); 
  }
 }
 $queryString_Re_tempo_tbuying = sprintf("&totalRows_Re_tempo_tbuying=%d%s", $totalRows_Re_tempo_tbuying, $queryString_Re_tempo_tbuying); 
 $queryString_Re_tbuying =""; 
 if (!empty($_SERVER['QUERY_STRING'])) { 
 $params = explode("&", $_SERVER['QUERY_STRING']); $newParams = array();
  foreach ($params as $param) {
   if (stristr($param,"pageNum_Re_tbuying") == false&&stristr($param,"totalRows_Re_tbuying") == false) { 
   array_push($newParams, $param); 
   } 
  } 
  
  }
 
 ?>
 
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Update tbuying</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.Style1 {
	font-size: 18px;
	color: #0000FF;
	font-weight: bold;
}
.Style6 {
	color: #006600;
	font-size: 9px
}

.Style19 {
	font-size: 15px;
	color: #006600;
	font-weight: bold;
}
.Style190 {
	font-size: 12px;
	color: #006600;
	font-weight: bold;
}
.Style20 {color: #990000}
.Style21 {color: #660099}
.Style22 {color: #990000}
.Style26 {font-size: 12}
.Style29 {color: #990000; font-size: 12; }
.Style30 {color: #000000}
.Style66 {
	font-size: 10px;
	color: #000099;
	font-weight: bold;
}
.Style68 {font-size: 9px
	color: #333333;
	
}
.Style680 {font-size: 8px
	color: #333333;
	
}
.Style19 {	color: #006600;
	font-weight: bold;
}
.Style24 {color: #000066}
.Style69 {color: #000099; font-weight: bold; }
.Style70 {color: #006600}
.Style71 {
	color: #000000;
	font-weight: bold;
}
-->
</style>
</head>

<body>

  <p align="left"><a href="aic_form_buying_update.php" title="Retour" class="Style22">Back</a>	
  <p align="center"> <span class="Style22">
  <?php
				echo "$Form_title_en_update";
	?>
  </span></p>
  <p>
<table border="0" width="50%" align="center">
  <tr>
    <td width="23%" align="center">
      <?php if ($pageNum_Re_tempo_tbuying > 0) { // Show if not first page ?>
      <a href="<?php printf("%s?pageNum_Re_tempo_tbuying=%d%s", $currentPage, 0, $queryString_Re_tempo_tbuying); ?>"><img src="First.gif" border=0></a>
      <?php } // Show if not first page ?>
    </td>
    <td width="31%" align="center">
      <?php if ($pageNum_Re_tempo_tbuying > 0) { // Show if not first page ?>
      <a href="<?php printf("%s?pageNum_Re_tempo_tbuying=%d%s", $currentPage, max(0, $pageNum_Re_tempo_tbuying - 1), $queryString_Re_tempo_tbuying); ?>"><img src="Previous.gif" border=0></a>
      <?php } // Show if not first page ?>
    </td>
    <td width="23%" align="center">
      <?php if ($pageNum_Re_tempo_tbuying < $totalPages_Re_tempo_tbuying) { // Show if not last page ?>
      <a href="<?php printf("%s?pageNum_Re_tempo_tbuying=%d%s", $currentPage, min($totalPages_Re_tempo_tbuying, $pageNum_Re_tempo_tbuying + 1), $queryString_Re_tempo_tbuying); ?>"><img src="Next.gif" border=0></a>
      <?php } // Show if not last page ?>
    </td>
    <td width="23%" align="center">
      <?php if ($pageNum_Re_tempo_tbuying < $totalPages_Re_tempo_tbuying) { // Show if not last page ?>
      <a href="<?php printf("%s?pageNum_Re_tempo_tbuying=%d%s", $currentPage, $totalPages_Re_tempo_tbuying, $queryString_Re_tempo_tbuying); ?>"><img src="Last.gif" border=0></a>
      <?php } // Show if not last page ?>
    </td>
  </tr>
</table>
</p>
<form name="aic_form_input" method="post" action="<?php echo $editFormAction; ?>">
  <table width="48" height="10" border="1" align="center" cellpadding="1" cellspacing="1" bgcolor="#ECE9D8" frame="border"> 
    <tr valign="baseline"> 
      <td width="53" align="right" ><div align="center">Product</div></td> 
      <td width="782"><div align="left">
        <input name="tproduct_desc22" type="text" class="Style19" value="<?php echo $row_Re_tempo_tbuying['tproduct_desc']; ?>" size="130" readonly="true">
      </div>
</td> 
    </tr> 
  </table> 

  <table width="917" border="3" cellpadding="1" cellspacing="1" bgcolor="#ECE9D8">
    <tr valign="baseline">
      <td width="144" align="right" ><div align="center" class="Style26 Style20">
          <div align="right"><span class="Style22">Presentation (*)</span></div>
      </div></td>
      <td width="185">
        <div align="left">
          <input name="tpresent_id2" type="text" class="Style68" value="<?php echo $row_Re_tempo_tbuying['tpresent_desc']; ?>" size="10" readonly="true">
          <select name="tpresent_id" class="Style19">
            <option value="0">NULL</option>
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
          </select>
          <input name="tpresent_id0" type="hidden" value="<?php echo $row_Re_tempo_tbuying['tpresent_id']; ?>">
      </div></td>
      <td width="170">
        <div align="center">
          <p class="Style29"><span class="Style22">Date of bid opening / Date of reception <span class="Style68"> (DD-MM-YYYY) (*)</span></span></p>
      </div></td>
      <td width="391">
        <input name="tbuying_dbid" type="text" class="Style68" value="<?php echo $row_Re_tempo_tbuying['tbuying_dbid']; ?>" size="15" maxlength="10" readonly="true">
        <input name="tbuying_dbid2" type="text" class="Style19"  value="<?php echo $row_Re_tempo_tbuying['tbuying_dbid']; ?>" onChange="ControlFields(document.aic_form_input.tbuying_dbid2.value,'Date',2,document.aic_form_input.tbuying_dbid)">
        <a href="#" onClick=" window.open('pop.php?frm=aic_form_input&ch=tbuying_dbid2','calendrier','width=350,height=160,scrollbars=0').focus();"><img src="petit_calendrier.gif" border="0"/></a> </td>
    </tr>
    <tr valign="baseline">
      <td height="43" align="right" nowrap ><div align="right"><span class="Style22">Smallest unit<span class="Style68">(*)</span></span></div></td>
      <td><div align="left">
          <table width="120" border="1" cellspacing="2" cellpadding="2">
            <tr>
              <th width="40" scope="row"><div align="left">
                  <input name="tsmalunit_desc" type="text" class="Style68" value="<?php echo $row_Re_tempo_tbuying['tsmalunit_desc']; ?>" size="10" readonly="true">
                  <input name="tsmalunit_id0" type="hidden" value="<?php echo $row_Re_tempo_tbuying['tsmalunit_id']; ?>">
              </div></th>
              <td width="60"><select name="tsmalunit_id" class="Style19">
                  <option value="0">NULL</option>
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
            </tr>
          </table>
      </div></td>
      <td><div align="center" class="Style22">
          <div align="center" class="Style22">
            <div align="center">Source of funding<span class="Style68">(*)</span> </div>
          </div>
        </div>
      <td><div align="left">
          <table width="222" border="1" cellspacing="1" cellpadding="1">
            <tr>
              <th width="116" scope="row"><input name="tsrcfund_desc22" type="text" class="Style68" value="<?php echo $row_Re_tempo_tbuying['tsrcfund_desc']; ?>" size="15" readonly="true">
                  <input name="tsrcfund_id0" type="hidden" value="<?php echo $row_Re_tempo_tbuying['tsrcfund_id']; ?>"></th>
              <td width="72"><select name="tsrcfund_id" class="Style19">
                  <option value="0">NULL</option>
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
              </select></td>
            </tr>
          </table>
      </div></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap><div align="center" class="Style22">
          <div align="right">
            <div align="center" class="Style22">
              <div align="right">Packaging Type<span class="Style68">(*)</span></div>
            </div>
          </div>
      </div></td>
      <td>
        <div align="left">
          <table width="185" height="41" border="1" cellpadding="1" cellspacing="1">
            <tr>
              <th width="99"  scope="row"><div align="left">
                  <input name="tpack_desc" type="text" class="Style68" value="<?php echo $row_Re_tempo_tbuying['tpack_desc']; ?>" size="10" readonly="true">
                  <input name="tpack_id0" type="hidden" value="<?php echo $row_Re_tempo_tbuying['tpack_id']; ?>">
              </div></th>
              <td width="153"><select name="tpack_id" class="Style19">
                  <option value="0">NULL</option>
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
            </tr>
          </table>
      </div></td>
      <td align="right" nowrap><div align="center"  class="Style22">
          <div align="center">Supplier<span class="Style68">(*)</span></div>
      </div></td>
      <td>
        <div align="left">
          <table width="221" border="1" cellspacing="1" cellpadding="1">
            <tr>
              <th width="150" scope="row"><input name="tprov_desc22" type="text" class="Style68" value="<?php echo $row_Re_tempo_tbuying['tprov_desc']; ?>" size="15" readonly="true">
                  <input name="tprov_id0" type="hidden" value="<?php echo $row_Re_tempo_tbuying['tprov_id']; ?>"></th>
              <td width="96"><select name="tprov_id" class="Style19" onChange="<?php
$_POST['tbuying_prov_coun_id']=$Space;
?>">
                  <option value="0">NULL</option>
                  <?php
do {  
?>
                  <option value="<?php echo $row_Re_provider['tprov_id'];?>"> <?php echo $row_Re_provider['tprov_desc'].$Space.$row_Re_provider['tprov_coun_id'];
		  		 ?></option>
                  <?php
} while ($row_Re_provider = mysqli_fetch_assoc($Re_provider));
  $rows = mysqli_num_rows($Re_provider);
  if($rows > 0) {
      mysqli_data_seek($Re_provider, 0);
	  $row_Re_provider = mysqli_fetch_assoc($Re_provider);
  }
?>
              </select></td>
            </tr>
          </table>
      </div></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap><div align="center" class="Style22">
          <div align="right">Incoterm<span class="Style68">(*)</span></div>
      </div></td>
      <td><table width="185" border="1" cellspacing="1" cellpadding="1">
          <tr>
            <th width="115" scope="row"><div align="left">
                <input name="tinco_desc22" type="text" class="Style68" value="<?php echo $row_Re_tempo_tbuying['tinco_desc']; ?>" size="10" readonly="true">
                <input name="tinco_id0" type="hidden" value="<?php echo $row_Re_tempo_tbuying['tinco_id']; ?>">
            </div></th>
            <td width="137"><select name="tinco_id" class="Style19">
                <option value="0">NULL</option>
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
      </table></td>
      <td align="right" nowrap><div align="center" class="Style29">
          <p align="center"><span class="Style22">Type of Supplier<span class="Style68">(*)</span></span></p>
      </div></td>
      <td><div align="justify"> </div>
          <table width="221" border="1" cellspacing="2" cellpadding="2">
            <tr>
              <th width="121" scope="row"><input name="ttype_prov_desc22" type="text" class="Style68" value="<?php echo $row_Re_tempo_tbuying['ttype_prov_desc']; ?>" size="15" readonly="true">
                  <input name="ttype_prov_id0" type="hidden" value="<?php echo $row_Re_tempo_tbuying['ttype_prov_id']; ?>">
              </th>
              <td width="80"><select name="ttype_prov_id" class="Style19">
                  <option value="0">NULL</option>
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
              </td>
            </tr>
        </table></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap><div align="center" class="Style22">
          <p align="right">Currency<span class="Style68">(*)</span></p>
          <p>&nbsp;</p>
      </div></td>
      <td>
        <div align="left">
          <table width="122" border="1" cellspacing="1" cellpadding="1">
            <tr>
              <th width="6`80" scope="row"><input name="tcur_desc" type="text" class="Style68" value="<?php echo $row_Re_tempo_tbuying['tcur_desc']; ?>" size="10" readonly="true">
                  <input name="tcur_id0" type="hidden" value="<?php echo $row_Re_tempo_tbuying['tcur_id']; ?>"></th>
              <td width="49"><span class="Style22">
                <select name="tcur_id" class="Style19">
                  <option value="0">NULL</option>
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
              </span></td>
            </tr>
          </table>
          <span class="Style6"><span class="Style29"><span class="Style22"> </span></span></span></div></td>
      <td align="right" nowrap><div align="center" class="Style29">
          <div align="center"><span class="Style22">Manufacturer<span class="Style68">(*)</span></span></div>
      </div></td>
      <td><div align="left">
          <table width="223" border="1" cellspacing="2" cellpadding="2">
            <tr>
              <th width="125" scope="row"><div align="center">
                  <input name="tmanufacturer2" type="text" class="Style68" value="<?php echo $row_Re_tempo_tbuying['tmanu_desc']; ?>" size="15" readonly="true">
                  <input name="tmanu_id0" type="hidden" value="<?php echo $row_Re_tempo_tbuying['tmanu_id']; ?>">
              </div></th>
              <td width="78"><select name="tmanu_id" class="Style19">
                  <option value="0">NULL</option>
                  <?php
do {  
?>
                  <option value="<?php echo $row_Re_manuf['tmanu_id']?>"><?php echo $row_Re_manuf['tmanu_desc'].$Space.$row_Re_manuf['tmanu_coun_id'];
		?></option>
                  <?php
} while ($row_Re_manuf = mysqli_fetch_assoc($Re_manuf));
  $rows = mysqli_num_rows($Re_manuf);
  if($rows > 0) {
      mysqli_data_seek($Re_manuf, 0);
	  $row_Re_manuf = mysqli_fetch_assoc($Re_manuf);
  }
?>
              </select></td>
            </tr>
          </table>
      </div></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap><div align="center" class="Style22">
          <p align="right">Exchange rate<span class="Style68">(*)</span></p>
      </div></td>
      <td>
        <div align="left"> <span class="Style6"><span class="Style29"><span class="Style22">
          <input name="exr" type="text" class="Style68" value="<?php echo $row_Re_tempo_tbuying['exr']; ?>" size="10" readonly="true">
          <input name="exr2" type="text" class="Style19" onChange="ControlFields(document.aic_form_input.exr2.value,'Exchange rate ',1)" value="<?php echo $row_Re_tempo_tbuying['exr']; ?>" size="10">
      </span></span></span></div></td>
      <td><div align="center"><span class="Style22">Transportation method <span class="Style68">(*)</span></span></div></td>
      <td><div align="left">
          <table width="183" border="1" cellspacing="2" cellpadding="2">
            <tr>
              <th width="121" scope="row"><input name="ttransport_desc2" type="hidden" class="Style6" value="<?php echo $row_Re_transport['ttransport_desc']; ?>">
                  <input name="ttransport_id0" type="text" class="Style68" value="<?php echo $row_Re_tempo_tbuying['ttransport_id']; ?>" size="15"></th>
              <td width="41"><select name="ttransport_id" class="Style19">
                  <option value="0">NULL</option>
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
              </td>
            </tr>
          </table>
      </div></td>
    </tr>
    <tr valign="baseline">
      <td height="47" align="right" nowrap><div align="center">
          <p align="right" class="Style22">Smallest unit price<span class="Style68">(*)</span></p>
          <p align="right" class="Style22">Quantity (smallest unit)<span class="Style68">(*)</span> </p>
          <p class="Style22">
            <input type="radio" name="tbuying_price_unit"  class="Style19" value="1">
            <span class="Style71">Per smallest unit </span></p>
      </div></td>
      <td><div align="center" class="Style22">
          <div align="left">
            <table width="181" border="0">
              <tr>
                <td width="175">                <input name="tbuying_ppu" type="text" class="Style68" value="<?php echo $row_Re_tempo_tbuying['tbuying_ppu'] ?>" size="8" 
					readonly="true">                <input name="tbuying_ppu2" type="text" class="Style190" onChange="ControlFields(document.aic_form_input.tbuying_ppu2.value,'Unit price ',1,document.aic_form_input.tbuying_price_unit )"  
				   value="<?php echo $row_Re_tempo_tbuying['tbuying_ppu']; ?>" size="10">              </td>
              </tr>
              <tr>
                <td>                <div align="left">
                    <input name="tbuying_qu" type="text" class="Style68"  value="<?php echo $row_Re_tempo_tbuying['tbuying_qu'] ?>" size="8" 
			readonly="true">
                    <input name="tbuying_qu2" type="text" class="Style190" value="<?php echo $row_Re_tempo_tbuying['tbuying_qu']; ?>" size="10"
				  onChange="
				  ControlFields(document.aic_form_input.tbuying_qu2.value,'Quantity per smallest ',1,document.aic_form_input.tbuying_price_unit);
			 
			          document.aic_form_input.tbuying_price_per_pack.disabled=true;
	                  document.aic_form_input.tbuying_qty_pack.disabled=true;">
  </div></td>
              </tr>
            </table>
          </div>
          <p align="left" class="Style22">
            <input name="button23" type="hidden" class="Style19" onClick="CalculateTotalPrice(document.aic_form_input.tbuying_price_unit,1)"  value="Calculer">
            <span class="Style30">
            <input name="button2" type="button" class="Style22" onClick="CalculateTotalPrice(document.aic_form_input.tbuying_price_unit,1)"  value="Change">
          </span><span class="Style30"> </span> <span class="Style21"> </span></p>
      </div></td>
      <td>
        <p align="right" class="Style22"><span class="Style24">Remarks/Comments</span></p>
      <p align="right">&nbsp; </p></td>
      <td><div align="left">
          <p><span class="Style22">
            <input name="tbuying_remark" class="Style68"  value="<?php echo $row_Re_tempo_tbuying['tbuying_remark']; ?>" size="60"  readonly="true">
          </span> </p>
      </div></td>
      <td><div align="left"><span class="Style6"><span class="Style29"><span class="Style22"> </span></span></span> </div></td>
    </tr>
    <tr valign="baseline">
      <td height="47" align="right" nowrap><p class="Style22">Price per pack<span class="Style68">(*)</span></p>
          <p class="Style22"> Quantity<span class="Style68">(*)</span></p>
          <p><span class="Style22">Pack size<span class="Style68">(*)</span></span></p>
          <p><span class="Style22"><span class="Style24">
            <input name="tbuying_price_unit" type="radio"  class="Style19" value="1" checked>
        </span></span><span class="Style71">Per pack size</span> </p></td>
      <td>        <p align="left">
          <input name="tbuying_price_per_pack" type="text" class="Style68" value="<?php echo $row_Re_tempo_tbuying['tbuying_price_per_pack']; ?>" size="10" readonly="true">
          <input name="tbuying_price_per_pack2" type="text" class="Style19" onChange="ControlFields(document.aic_form_input.tbuying_price_per_pack2.value,'Price per pack',1,document.aic_form_input.tbuying_price_unit)"value="<?php echo $row_Re_tempo_tbuying['tbuying_price_per_pack']; ?>" size="10">
          </p>        <p align="left">
            <input name="tbuying_qty_pack" type="text" class="Style68" value="<?php echo $row_Re_tempo_tbuying['tbuying_qty_pack']; ?>" size="10" readonly="true">
            <input name="tbuying_qty_pack2" type="text" class="Style19" onChange="ControlFields(document.aic_form_input.tbuying_qty_pack2.value,'Quantity ',1,document.aic_form_input.tbuying_price_unit)" value="<?php echo $row_Re_tempo_tbuying['tbuying_qty_pack']; ?>" size="10">
          </p>        <p align="left">
            <input name="tbuying_pack_size" type="text" class="Style68" value="<?php echo $row_Re_tempo_tbuying['tbuying_pack_size']; ?>" size="10" readonly="true">
            <input name="tbuying_pack_size2" type="text" class="Style19" onChange="ControlFields(document.aic_form_input.tbuying_pack_size2.value,'Pack size',1,document.aic_form_input.tbuying_price_unit)"  value="<?php echo $row_Re_tempo_tbuying['tbuying_pack_size']; ?>" size="10">
          </p>        <p align="left"><span class="Style22">
          <input name="button22" type="hidden" class="Style19" onClick="CalculateTotalPrice(document.aic_form_input.tbuying_price_unit,2)"  value="Calculer">
          <span class="Style69">
          <input name="button3" type="button" class="Style22" onClick="CalculateTotalPrice(document.aic_form_input.tbuying_price_unit,2)"  value="Change">
      </span></span> </p></td>
      <td><div align="center" class="Style22">
          <div align="right">
            <p><span class="Style6">.</span></p>
            <p align="right" class="Style22"><span class="Style24">Remarks/Comments</span></p>
            <p align="right"></p>
            <p><span class="Style70"></span></p>
            <p>&nbsp;</p>
            <p align="left">&nbsp;</p>
          </div>
      </div></td>
      <td><div align="left">
          <table width="221" border="1" cellspacing="1" cellpadding="1">
            <tr> </tr>
          </table>
          <span class="Style22">
          <textarea name="tbuying_remark2" cols="60" rows="" class="Style19"></textarea>
      </span></div></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap><div align="center" class="Style22">
          <div align="center" class="Style22">
            <div align="right"></div>
          </div>
      </div></td>
      <td><div align="left"><span class="Style22">Total cost
            <input name="tbuying_tcost2" type="text" class="Style19" value="<?php echo $row_Re_tempo_tbuying['tbuying_tcost']; ?>" size="10" readonly="true">

      </span> </div></td>
      <td><div align="center" class="Style22">
          <div align="center" class="Style30">
            <div align="right">. </div>
          </div>
      </div></td>
      <td><div align="right"><span class="Style22">. </span> </div></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap><div align="center"><span class="Style21"><span class="Style24">Lead time  (days)</span> 
        </span></div></td>
      <td><div align="left"><span class="Style22">
        <input name="tbuying_lead_time" type="text" class="Style68" value="<?php echo $row_Re_tempo_tbuying['tbuying_lead_time']; ?>" size="10" readonly="true">
        <input name="tbuying_lead_time2" type="text" class="Style19" onChange="ControlFields(document.aic_form_input.tbuying_lead_time2.value,'D&eacute;lai de livraison ',1)"  value="<?php echo $row_Re_tempo_tbuying['tbuying_lead_time']; ?>" size="10">
      </span>
        </div></td>
      <td><div align="center" class="Style22">
          <div align="right">. </div>
      </div></td>
      <td><div align="right">. </div></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap><div align="center"><span class="Style21">
        <input name="tbuying_rowid" type="hidden" value="<?php echo $row_Re_tempo_tbuying['tbuying_rowid']; ?>">
      </span></div></td>
      <td><div align="left">
        <input name="tbuying_ppu_cur" type="hidden" class="Style6" value="<?php echo $row_Re_tempo_tbuying['tbuying_ppu_cur']; ?>">
        <input name="MM_update" type="hidden" value="form2">
        <input name="tbuying_ppu3" type="hidden" class="Style6" value="<?php echo $row_Re_tempo_tbuying['tbuying_ppu']; ?>">
        <input name="tbuying_ppu20" type="hidden" class="Style6" value="<?php echo $row_Re_tempo_tbuying['tbuying_ppu']; ?>">
        <input name="tbuying_ok" type="hidden" class="Style6" value="0" >
        <input name="ppu1" type="hidden" class="Style6" value="" >
        <input name="ppu2" type="hidden" class="Style6" value="" >
        <input name="ppp1" type="hidden" class="Style6" value="" >
        <input name="ppp2" type="hidden" class="Style6" value="" >
        <input name="qu1" type="hidden" class="Style6" value="" >
        <input name="qu2" type="hidden" class="Style6" value="" >
        <input name="qty1" type="hidden" class="Style6" value="" >
        <input name="qty2" type="hidden" class="Style6" value="" >
        <span class="Style22"><span class="Style6"><span class="Style29"> </span></span></span>
        <input name="tcost1" type="hidden" class="Style6" value="" >
        <input name="tcost22" type="hidden" class="Style6" value="" >
        <input name="pack_size1" type="hidden" class="Style6" value="" >
        <input name="pack_size2" type="hidden" class="Style6" value="" >
        <input name="tbuying_val" type="hidden" class="Style6" value="0" >
          </div></td>
      <td><div align="right"><span class="Style22">
      <input name="Submit" type="submit" class="Style1" onClick='ValidateON()' value="submit" 
>
      </span></div></td>
      <td>
        <div align="right">
          <table width="224" border="1" cellpadding="1" cellspacing="1">
            <tr> </tr>
          </table>
          .</div></td>
    </tr>
    <tr valign="baseline">
      
    </tr>
    <caption>&nbsp;
    </caption>
  </table>
</form>
<p>&nbsp;</p>


<SCRIPT language="javascript">
//=======

function CF()
{
  alert ("CF ");	 
}

//=====
function ChoosePrice(radio) {
	// alert ("ChoosePrice xxx");
	document.aic_form_input.tbuying_ok.value=9;
 //    alert("radio.length = "); 
	  for (var i=0; i<radio.length;i++) {
	  // alert("Système = "+radio.length);
         if (radio[i].checked) 
          {  
		//  alert("Système 0 = "+radio[i].value);
			if ( i == 0) 
				{
					document.aic_form_input.tbuying_ok.value=0;
					document.aic_form_input.tbuying_price_per_pack2.disabled=true;
		  			document.aic_form_input.tbuying_qty_pack2.disabled=true;
					
				document.aic_form_input.tbuying_ppu2.disabled=false;
		  		document.aic_form_input.tbuying_qu2.disabled=false;
				}
				else {
				document.aic_form_input.tbuying_ok.value=1;
			    document.aic_form_input.tbuying_ppu2.disabled=true;
		  		document.aic_form_input.tbuying_qu2.disabled=true;
				document.aic_form_input.tbuying_price_per_pack2.disabled=false;
				document.aic_form_input.tbuying_qty_pack2.disabled=false;
			    }
         }
      }
   }
   function CalculateTotalPrice(radio,origine) {
	// alert ("CalculateTotalPrice="+origine);
	// alert("Système = "+radio.length);
      for (var i=0; i<radio.length;i++) {
 //alert("Système 0= "+radio[i].value);
         if (radio[i].checked) 
          {  
		 
		//  alert("tbuying_ok = "+document.aic_form_input.tbuying_ok.value);
			if ( i == 0) 
				{
				 document.aic_form_input.tbuying_ok.value=1;
				//alert("Prix plus petite unite X Total Cost PPU2");
				document.aic_form_input.tbuying_qty_pack2.value=document.aic_form_input.tbuying_qu2.value / document.aic_form_input.tbuying_pack_size2.value; 
				//alert ("1");
				document.aic_form_input.tbuying_price_per_pack2.value=document.aic_form_input.tbuying_ppu2.value * document.aic_form_input.tbuying_pack_size2.value;
				//alert ("2");
				document.aic_form_input.tbuying_tcost2.value=document.aic_form_input.tbuying_qty_pack2.value * document.aic_form_input.tbuying_price_per_pack2.value;
			
					 document.aic_form_input.ppp2.value = document.aic_form_input.tbuying_price_per_pack2.value;
					// alert("ppp2");
					 document.aic_form_input.qty2.value = document.aic_form_input.tbuying_qty_pack2.value;
					// alert("ppP2= "+document.aic_form_input.ppp2.value);
					// alert("qty2= "+document.aic_form_input.qty2.value);
										
					 document.aic_form_input.tbuying_price_per_pack2.disabled=true;
		  			 document.aic_form_input.tbuying_qty_pack2.disabled=true;
									
				}
				else {
			//     alert("Système 1 = "+radio[i].value);
			     document.aic_form_input.tbuying_ok.value=2;
				 //alert("Prix PER PACK SIZE per pack size O");
			     document.aic_form_input.tbuying_ppu2.value=document.aic_form_input.tbuying_price_per_pack2.value/document.aic_form_input.tbuying_pack_size2.value;
				  //alert("PPU2="+document.aic_form_input.tbuying_ppu2.value);
				 document.aic_form_input.tbuying_qu2.value=document.aic_form_input.tbuying_pack_size2.value*document.aic_form_input.tbuying_qty_pack2.value;
				 document.aic_form_input.tbuying_tcost2.value=document.aic_form_input.tbuying_qty_pack2.value * document.aic_form_input.tbuying_price_per_pack2.value;
		    //    document.aic_form_input.tbuying_ppu2.value=document.aic_form_input.tbuying_ppp2.value/document.aic_form_input.tbuying_qty_pack2.value;
				 document.aic_form_input.qu2.value=document.aic_form_input.tbuying_pack_size2.value * document.aic_form_input.tbuying_qty_pack2.value;
				 document.aic_form_input.tbuying_ppu2.disabled=true;
				 document.aic_form_input.tbuying_qu2.disabled=true;
			
				 document.aic_form_input.ppp2.value = document.aic_form_input.tbuying_price_per_pack2.value;
				 document.aic_form_input.qty2.value = document.aic_form_input.tbuying_qty_pack2.value;

			 
			   }
         }
   
	  }
   }
function ChooseFocus(Qty) {

      				
				//alert(" ChooseFocus ");
			//	alert(document.aic_form_input.tbuying_qu.value);
			
   }

 function ValidateON()
{
 var m="mon texte"; 
	var confirmation=confirm("Update?"); 
	// alert ("validateOn");
	ok=document.aic_form_input.tbuying_ok.value;
	//alert ("ValidateOn ok="+ok);
	if (confirmation){ 
  //action à faire pour la valeur true 
  	// alert ("then confirmation");
	document.aic_form_input.tbuying_val.value = 1;
	//alert ("111");
  	// alert ("then"+document.aic_form_input.tbuying_val.value);
	}
	else{ 
	// alert ("else confirmation");
	document.input_form_input.tbuying_val = 3;
	// alert ("else"+document.input_form_input.tbuying_val);
    }
}

/*
function ControlFields(champ,nomchamp,ordre, bouton)
{
 //  alert ("ControlFields ordre="+ordre);
	if(champ=='') // 1
	{
		//alert(nomchamp+' is a Mandatory field !');
		//document.aic_form_input.champnom.focus();
	}
	else if(isNaN(champ)) // 2
	{
	alert(nomchamp+' is a Numeric field !');
	// valeur=document.aic_form_input.tbuying_qu2.value;
	
	//alert('champ='+champ);
	document.aic_form_input.tbuying_ok.value=0;
	//alert('valeur ok='+document.aic_form_input.tbuying_ok.value);
	document.aic_form_input.champ.focus();

	
	}
    else 
	{document.aic_form_input.tbuying_ok.value=1;
	//alert ("avant appel");
	CalculateTotalPrice(bouton,1);
	//alert ("apres appel");
	//alert ("else");
	}
}

*/
function ControlFields(champ,nomchamp,ordre, bouton)
{
    retour=parseInt(champ);
 // alert ('retour'+retour);
// parseInt(string, radix
//alert ('champ'+champ);
	
   // alert ("ControlFields ordre="+ordre);
	if(champ=='') // 1
	{
		alert(nomchamp+' is a Mandatory field !');
		//document.aic_form_input.champnom.focus();
	}
	else if(isNaN(champ)) // 2
	{
	
	 if (nomchamp!='Date') {
		alert(nomchamp+' is a Numeric field !');
		document.aic_form_input.tbuying_ok.value=0;
		}
		else { 
				//alert ('date');
				document.aic_form_input.tbuying_ok.value=1;
				document.aic_form_input.tbuying_ok.value=1;
				ok=document.aic_form_input.tbuying_ok.value;
				alert(ok+' ok !');
				
	          }
	// alert('champ='+champ);
				//////document.aic_form_input.tbuying_ok.value=0;
	// alert('valeur ok='+document.aic_form_input.tbuying_ok.value);
	document.aic_form_input.champ.focus();

	
	} 
    else 
	{document.aic_form_input.tbuying_ok.value=1;
	//alert ("avant appel");
	CalculateTotalPrice(bouton,1);
	// alert ("apres appel");
	//alert ("else");
	}
}

</script>

<?php
mysqli_free_result($Re_product);
mysqli_free_result($Re_concent);
mysqli_free_result($Re_smalunit);
mysqli_free_result($Re_packaging);
mysqli_free_result($Re_present);
mysqli_free_result($Re_currency);
mysqli_free_result($Re_srcfund);
mysqli_free_result($Re_provider);
mysqli_free_result($Re_ttype_prov);
mysqli_free_result($Re_transport);
mysqli_free_result($Re_tincoterm);
mysqli_free_result($Re_prod);
mysqli_free_result($Re_tinco1);
mysqli_free_result($Re_tempo_tbuying);
mysqli_free_result($Re_manuf);
?>

<?php
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
