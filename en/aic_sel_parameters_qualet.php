<?php 
/*
Ce 20 fevrier pour la qualité 
ajout des lignes param_manu
On n'utilise pas les champs mini, maxi,  ni selection du pays 
$pMini = $_POST['pMini'] ;
$pMaxi = $_POST['pMaxi'] ;
$pCure = $_POST['pCure'] ;
*/
$pDsta = $_POST['pDsta'] ;
$pDend = $_POST['pDend'] ;

// echo "aic_sel_parameters--  pDsta=$pDsta, pDend=$pDend <BR>";

if (isset($_POST['pEcow'])) $pEcow = $_POST['pEcow'] ;
else $pEcow='*';

if (isset($_POST['pCate'])) $pCate = $_POST['pCate'] ;
else $pCate='*';
if (isset($_POST['pProd'])) $pProd = $_POST['pProd'] ;
else $pProd = '*';

if (isset($_POST['pProv'])) $pProv = $_POST['pProv'] ;
else $pProv = '*';

if (isset($_POST['pManu'])) $pProv = $_POST['pManu'] ;
else $pManu = '*';

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
	    $sw=1;
		// echo " dans la boucle=$param_country , $i<BR>";
   }
 
if ($sw==1) $param_country.= ")";
}
else  $param_country="";

// echo " apres tout sw=$sw  et param_country=$param_country, $i <BR>";
// Faire une boucle pour compter le nombre d'enregistrements,
// fabriquer la clause Where en fonction de la clause Where
//

$param_cat="";
$i=0;
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
		// echo "boucle cat , i=$i<BR>";
   }
}

else  $param_cat="";
if ($i==1 ) $param_cat.= ")";
// echo " apres param cat dans la boucle=$param_cat, $i <BR>";

$param_prod="";
$i=0;
if ($pProd[0]!='*') {
	for ($i=0; $i<sizeof($pProd); $i++) {
	 if ($i==0){
		$param_prod.= " AND ( tproduct_id like ";
	 }
		
		else { $param_prod.= " OR tproduct_id like ";
		}
		$param_prod.= "'";
		$param_prod.= "%$pProd[$i]";
		$param_prod.= "' ";
		if ($i == sizeof($pProd) - 1) $param_prod.= ")";
	}
}
else $param_prod=""; 
$param_prov="";
$i=0;
if ($pProv[0] !='*') {

	for ($i=0; $i<sizeof($pProv); $i++) {
	if ($i==0) 
	$param_prov.= " AND ( tprov_id = ";
	else $param_prov.= " OR tprov_id = ";
	$param_prov.= "'";
	$param_prov.= "$pProv[$i]";
	$param_prov.= "' ";
	if ($i == sizeof($pProv) - 1) $param_prov.= ")";
	}
}
else $param_prov="";
// ajoute le 21 fevrier 2013
$param_manu="";
$i=0;
if ($pManu[0] !='*') {

	for ($i=0; $i<sizeof($pManu); $i++) {
	if ($i==0) 
	$param_manu.= " AND ( tmanu_id = ";
	else $param_manu.= " OR tmanu_id = ";
	$param_manu.= "'";
	$param_manu.= "$pManu[$i]";
	$param_manu.= "' ";
	if ($i == sizeof($pManu) - 1) $param_manu.= ")";
	}
}
else $param_manu="";
?>