<?php
$pMini = $_POST['pMini'] ;
$pMaxi = $_POST['pMaxi'] ;
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
$taillePays = sizeof($pEcow);
  for ($i=0; $i < $taillePays; $i++) {
	   if ($i==0){
		$param_country.= " AND ( tecowas_id like ";
	   }
	   else {
		 $param_country.= " OR tecowas_id like ";
	   }
	   $param_country.= "'";
	   $param_country.= "%$pEcow[$i]";
	   $param_country.= "' ";
	   $sw=1;
  }
  $param_country.= ")";
}
else  $param_country="";

$param_cat="";

$i=0;
$sw = 0;
if ( $pCate[0]!='*')
{
	$tailleCat = sizeof($pCate);
  for ($i=0; $i < $tailleCat; $i++) {
	   if ($i==0)
		$param_cat.= " AND ( tproduct_cat like ";
		else {
			$param_cat.= " OR tproduct_cat like ";
		}		
		$param_cat.= "'";
		$param_cat.= "%$pCate[$i]";
		$param_cat.= "' ";
		$sw = 1;
  }
  $param_cat.= ")";
}
else $param_cat = "";

$param_prod="";
$i=0;
if ($pProd[0]!='*') {
	 var_dump($pProd);
 $tailleProd = sizeof($pProd);
	for ($i=0; $i < $tailleProd; $i++) {

	 if ($i==0){
		$param_prod.= " AND ( tproduct_id like ";
		}
		else { $param_prod.= " OR tproduct_id like ";
		}
		$param_prod.= "'";
		$param_prod.= "%$pProd[$i]";
		$param_prod.= "' ";
		$sw = 1;		
	}
	$param_prod.= ")";

}
else $param_prod=""; 

 
$param_prov="";

$i=0;

if ($pProv[0] !='*') {
$tailleprov = sizeof($pProv);

	for ($i=0; $i<sizeof($pProv); $i++) {
	if ($i==0) 
	$param_prov.= " AND ( tprov_id = ";
	else $param_prov.= " OR tprov_id = ";
	$param_prov.= "'";
	$param_prov.= "$pProv[$i]";
	$param_prov.= "' ";

	}
	$param_prov.= ")";

}
else $param_prov="";

?>

