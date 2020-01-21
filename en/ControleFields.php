<?php
function ControleFields ($buying,$origine)
{
/* 
French
syntax   :  ControleFields( $buying) 
 Purpose : Fields control before update tbuying_07
 Compare fields from fields retrieved from tempo table to fields 
*/
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
// echo "origine=$origine <BR>";
// if ($origine==1) return false;
$message="";
$message1="is Mandatory !";
$message2="Is Numeric !";

if ($origine ==1 )
if ($buying['tbuying_ppu2'] !="")
{
	if (!is_numeric($buying['tbuying_ppu']))
	$message .= "Smallest unit price ".$message2." <BR>";
}
else $message .= "Smallest unit price  ".$message1."  <BR>";
// echo "message=$message <BR";
//
if ($buying['tbuying_qu'] !="")
{
  if (!is_numeric($buying['tbuying_qu']))
   $message .="Quantity ". $message2."  <BR>";
}
else $message .="Quantity ".$message1." <BR>";
// echo "message=$message <BR";

if (!is_numeric($buying['tpresent_id']))
$message .="Presentation type ". $message1." <BR>";
if ($buying['tinco_id'] =="")
$message .="Inco term".$message1." <BR>";
if ($buying['tbuying_dbid'] =="")
$message .="Date of bid opening/Date of reception ".$message1." <BR>";
if ($buying['tcur_id'] =="")
$message .="Currency ".$message1." <BR>" ; 

if (!is_numeric($buying['exr2']))
$message .="Exchange rate is missing ! <BR>";


//echo "origine=$origine <BR>";
if ($origine==2)
$ppp1=$buying['tbuying_price_per_pack'];
//$ppp2=$buying['tbuying_price_per_pack2'];
//echo "ppp=$ppp1, ppp2=$ppp2 <BR>";
$ppu1=$buying['tbuying_ppu'];
$buying['tbuying_ppu1']=$buying['tbuying_ppu'];
// $buying['tbuying_ppu2']=$buying['tbuying_ppu2'];
if ($origine==1)
{
$ppu2=$buying['tbuying_ppu2'];
$qu2=$buying['tbuying_qu2'];
}
$qu1=$buying['tbuying_qu'];
// $qu2=$buying['tbuying_qu2'];
if ($origine==2)
$qty1=$buying['tbuying_qty_pack'];
// $qty2=$buying['tbuying_qty_pack2'];
$total_cost=$buying['tbuying_tcost2'];
// echo "ppp=$ppp1, ppp2=$ppp2 , ppu1=$ppu1, ppu2=$ppu2, qu1=$qu1, qu2=$qu2, qty1=$qty1, qty2=$qty2, tcost=$total_cost<BR>";
if ($buying['tsrcfund_id'] =="")
$message .="Source of funding ".$message1." <BR>";  
if ($buying['tprov_id'] =="")
$message .="Supplier ".$message1." <BR>";  
if ($buying['ttype_prov_id'] =="")
$message .="Type of supplier  ".$message1." <BR>";                    
// if ($buying['tbuying_prov_coun_id'] =="")
// $message .="Country of Provider is missing ! <BR>";  
if ($buying['tmanu_id'] =="")
$message .="Manufacturer ".$message1." <BR>";  
// if ($buying['tbuying_manu_coun_id'] =="")
// $message .="Country of Manufacturer_id missing ! <BR>";  
if ($buying['ttransport_id'] =="")
$message .="Transportation Method ".$message1." <BR>" ;
// echo "message=$message";

/* 
if ($buying['tbuying_pack_size'] =="")
$message .= "Pack size is missing ! <BR>";
*/
$ok=$buying['tbuying_ok'];
// echo " ok=$ok ";

if ($buying['tbuying_lead_time2'] !="")

	if (!is_numeric($buying['tbuying_lead_time2']))
         $message .= "Lead time ".$message2." <BR>";

   if ($origine ==1)
   if (!is_numeric($buying['tbuying_ppu2']))
    $message .="Unit price ".$message2." <BR>";

   if ($origine ==1)
   if (!is_numeric($buying['tbuying_qu2']))
    $message .="Quantity ".$message2." <BR>";
if ($origine==2)
  if (!is_numeric($buying['tbuying_price_per_pack2']))
    $message .="Price per pack ".$message2." <BR>";
//if ($origine ==1 )
//if (!is_numeric($buying['tbuying_qty_pack2']))
//    $message .="Quantité ".$message2." <BR>";

if ($buying['tbuying_pack_size2'] !="")

  // penser a tester le pack size au cas ou le price_per_pack est non vide
  
   if (!is_numeric($buying['tbuying_pack_size2']))
    $message .="Pack size ".$message2." <BR>";
//

if ($message) {
echo "<b> The following errors have been encountered :</b><BR>$message";
// echo "<b> Prière de Retourner à la page Précédente </b> <BR>";
// redisplay the form function
return false;
}
else return true;
}
?>