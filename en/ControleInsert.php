
<?php
function ControleInserte ($buying)
{

$message = "";
// mis en commentaire le 18 06 08

//if ($buying['tbuying_uv'] == "")
//$message .="tbuying_uv is missing <BR>";

$message1="Obligatoire !";
$message2="est Numérique !";
$message20="Valeur Numérique ! ";
$message3="Mauvais format de date";
$message4="Valeur manquante !";

/*
if ($buying['tbuying_concent_id'] =="")
 $message .="Concent_id ".$message1." <BR>";
if ($buying['tbuying_categ_id'] =="")
$message .="Category_id ".$message1." <BR>";
if ($buying['tbuying_dosage_id'] =="")
$message .="Dosage_id ".$message1. " <BR>";
*/
if (!is_numeric($buying['tbuying_smalunit_id']))
$message .=$message2. " <BR>";
// if ($buying['tbuying_us'] =="")
if (!is_numeric($buying['tbuying_pack_id']))
$message .="Pack_id ".$message2. " <BR>";

//////////////////////////////
/*
if ($buying['tbuying_price_per_pack'] !="")
{
	if (!is_numeric($buying['tbuying_price_per_pack']) && $buying['tbuying_price_per_pack'] <= 0 ) 
	$message .= "Prix par conditionnement".$message2." <BR>";
}
else $message .= "Prix  par conditionnement ".$message1."  <BR>";
*/

if (!is_numeric($buying['tbuying_pack_id']))
$message .="Pack_id ".$message2." <BR>";



if (!is_numeric($buying['tbuying_present_id']))
$message .="Presentation_id ". $message1." <BR>";
if ($buying['tbuying_inco_id'] =="")
$message .="Inco_id ".$message1." <BR>";


if ($buying['tbuying_dbid'] =="")
$message .="Date d'ouverture des plis ".$message1." <BR>";
else
{
// Verifier ta date aussi
  $vardbid = GetSQLValueString($buying['tbuying_dbid'] ,"date");
 //  echo "XXXXXXXXXXXXXXvardbid=$vardbid <BR>";
 //  $vardbid2 = GetSQLValueString($dbid ,"date");
 //  echo " vardbid=$vardbid<BR>";
   $LaDate= explode("-", $vardbid);
  $annee = substr($vardbid,7,4);
  $mois = substr($vardbid,4,2);
  $jour = substr($vardbid,1,2);
 // echo " jour=$jour<BR> mois=$mois<BR> annee=$annee<BR>";
  /*
  echo "$LaDate[0]<BR> "; // pièce1
  echo "$LaDate[1]<BR>"; 
  echo "$LaDate[2]<BR>"; 
  */
  $ok=0;
  $longueur=strlen($vardbid) ;
 //  echo "XXX longueur=$longueur <BR>";
  if (strlen($vardbid) == 12 ) {
     if (checkdate($mois,$jour,$annee))
     {
       $LaDate=formater($buying['tbuying_dbid'], true);
     }
     else $message .="Date ouverture des plis ".$message3." <BR>";
   }
   else  $message .="  Date ouverture des plis ".$message3." <BR>";
 } 
// $LaDate=ControleDate($buying['tbuying_dbid'], true);

// echo " XXXXXXXXXXXXXXXLaDate=$LaDate";
if ($buying['tbuying_cur_id'] =="")
$message .="Currency_id ".$message1." <BR>" ; 

if (!is_numeric($buying['tbuying_exr']))
$message .="Taux d'échange Obligatoire et Numérique ! <BR>";

if ($buying['tbuying_srcfund_id'] =="")
$message .="Source de financement ".$message1." <BR>";  
if ($buying['tbuying_prov_id'] =="")
$message .="Provider_id ".$message1." <BR>";  
if ($buying['tbuying_type_prov_id'] =="")
$message .="Provider Type_id ".$message1." <BR>";                    
// if ($buying['tbuying_prov_coun_id'] =="")
// $message .="Country of Provider is missing ! <BR>";  
if ($buying['tbuying_manu_id'] =="")
$message .="Manufacturer_id ".$message1." <BR>";  
// if ($buying['tbuying_manu_coun_id'] =="")
// $message .="Country of Manufacturer_id missing ! <BR>";  
if ($buying['tbuying_transport_id'] =="")
$message .="Transport_id ".$message1." <BR>" ;
// echo "message=$message";

/* 
if ($buying['tbuying_pack_size'] =="")
$message .= "Pack size is missing ! <BR>";
*/ 

if ($buying['tbuying_lead_time'] !="")
{
	if (!is_numeric($buying['tbuying_lead_time']))
         $message .= "Date de livraison ".$message2." <BR>";
}

if ( is_numeric($buying['tbuying_pack_size']) && is_numeric($buying['tbuying_price_per_pack']) && is_numeric($buying['tbuying_qty_pack'])  )
{
   if ($buying['tbuying_pack_size'] <= 0)      $message .= "Taille du conditionnement est manquante ou doit etre plus grand que zéro ! <BR>";
   if ($buying['tbuying_price_per_pack'] <= 0) $message .= "Prix par du conditionnement est manquant ou doit etre plus grand que zéro ! <BR>";
   if ($buying['tbuying_qty_pack'] <= 0)       $message .= "La Quantité du Conditionnement est manquante ou doit etre plus grand que zéro ! <BR>";
}  

  // penser a tester le pack size au cas ou le price_per_pack est non vide
 if (!is_numeric($buying['tbuying_pack_size']))
	if ($buying['tbuying_pack_size'] ==""  )
	$message .= "Taille du conditionnement est manquante  ! <BR>";

if (!is_numeric($buying['tbuying_qty_pack']))
	if ($buying['tbuying_qty_pack'] =="")
	$message .= "La Quantité du Conditionnement est manquante ! <BR>";
if (!is_numeric($buying['tbuying_price_per_pack']))
	if ($buying['tbuying_price_per_pack'] =="")
	$message .= "Le Prix par conditionnement est manquant ! <BR>";

if ($message) {
 
echo "<b> Liste des erreurs rencontrées :</b><BR>$message";
echo "<b> Prière de Retourner à la page Précédente </b> <BR>";
// redisplay the insert form function
return false;
}

return true;
}
?>