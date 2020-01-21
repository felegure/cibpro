<?php

$pCure = $_POST['pCure'] ;
$pDsta = $_POST['pDsta'] ;
$pDend = $_POST['pDend'] ;

if (isset($_POST['pEcow'])) $pEcow = $_POST['pEcow'] ;
else $pEcow='*';

if (isset($_POST['pCate'])) $pCate = $_POST['pCate'] ;
else $pCate='*';
if (isset($_POST['pProd'])) $pProd = $_POST['pProd'] ;
else $pProd = '*';

if (isset($_POST['pProv'])) $pProv = $_POST['pProv'] ;
else $pProv = '*';


$param_country="";
$i=0;
$sw=0;
if ( $pEcow[0]!='*')
{
  for ($i=0; $i<sizeof($pEcow); $i++) {
	   if ($i==0)
		$param_country.= " AND ( tecowas_id like ";
		else $param_country.= " OR tecowas_id like ";
		
		$param_country.= "'";
		$param_country.= "%$pEcow[$i]";
		$param_country.= "' ";
	//	if ($i==1 || $i == sizeof($pEcow)) $param_country.= ")";
	     $sw=1;
	//}
	 //else $param_country="";
//echo "XXX param_country=$param_country, i=$i, sizeof($pEcow)<BR>"; 
}
if ($sw==1) $param_country.= ")";
}
else  $param_country="";
//echo " A la fin de la boucle i=$i <BR>";
//if ($i==1 ) $param_country.= ")";

//xxxxxxxxxxxxxxx
//echo "XXXXXXXXXXXXXXpCate0=$pCate[0]";
//echo "XXXXXXXXXXXXXXpCate=1$pCate[1]";
//echo "XXXXXXXXXXXXXXpCate2=$pCate[2]";


// Faire une boucle pour compter le nombre d'enregistrements,
// fabriquer la clause Where en fonction de la clause Where
//


$nbre_element1=count($pCate);

$nbre_element2=sizeof($pCate);
//echo "XXXXXX pCate=$pCate<BR>";
//echo "XXXXXX nbre_element1=$nbre_element1<BR>";
//echo "XXXXXX nbre_element2=$nbre_element2, sizeof($pCate)<BR>";

$param_cat="";
if ( $pCate[0]!='*')
{
  for ($i=0; $i<sizeof($pCate); $i++) {
	   if ($i==0)
		$param_cat.= " AND ( tproduct_cat like ";
		else $param_cat.= " OR tproduct_cat like ";
		
		$param_cat.= "'";
		$param_cat.= "%$pCate[$i]";
		$param_cat.= "' ";
		if ($i==1 || $i == sizeof($pCate)) $param_cat.= ")";
	     
	//}
	 //else $param_cat="";
// echo "XXX param_cat=$param_cat, i=$i, sizeof($pCate)<BR>"; 
}
}
else  $param_cat="";
// echo " A la fin de la boucle i=$i <BR>";
if ($i==1 ) $param_cat.= ")";


$param_prod="";

if ($pProd[0]!='*') {
	for ($i=0; $i<sizeof($pProd); $i++) {
	//echo "XXXXXXX i=$i $pProd[$i] <BR>";

	 if ($i==0){
		$param_prod.= " AND ( tproduct_id like ";
		//echo "XXXXXXX i=$i et AND <BR>";
		}
		
		else { $param_prod.= " OR tproduct_id like ";
		//echo "XXXXXXX i=$i et OR <BR>";

		}
		$param_prod.= "'";
		$param_prod.= "%$pProd[$i]";
		$param_prod.= "' ";
		if ($i == sizeof($pProd) - 1) $param_prod.= ")";
	}
	//echo "XXX param_prod=$param_prod i=$i<BR>"; 
}
else $param_prod=""; 
//if ($i==1 ) $param_prod.= ")";
//echo "XXX apres la boucle param_prod=$param_prod i=$i<BR>";

$param_prov="";

if ($pProv[0] !='*') {
   // echo "Supplier $i= $pProv[$i] <BR>";

	for ($i=0; $i<sizeof($pProv); $i++) {
	if ($i==0) 
	$param_prov.= " AND ( tprov_id = ";
	else $param_prov.= " OR tprov_id = ";
	$param_prov.= "'";
	$param_prov.= "$pProv[$i]";
	$param_prov.= "' ";
	if ($i == sizeof($pProv) - 1) $param_prov.= ")";
	}
	
// echo "XXX param_prov=$param_prov et i=$i<BR>"; 
}
else $param_prov="";


//echo "date debut=$pDsta<BR>";
//echo "date fin=$pDend<BR>";

?>

