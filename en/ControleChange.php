
<?php
function ControleChange ($buying)
{

echo "ControleChange()";
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

if ($buying['tbuying_uv'] == "")
$message .="tbuying_uv is missing <BR>";
if ($buying['tbuying_concent_id'] =="")
$message .="Concent_id is missing <BR>";
if ($buying['tbuying_categ_id'] =="")
$message .="Category_id is missing <BR> ";
if ($buying['tbuying_dosage_id'] =="")
$message .="Dosage_id is missing <BR>";
if (!is_numeric($buying['tbuying_smalunit_id']))
$message .="Numeric value <BR>";
if ($buying['tbuying_us'] =="")
if (!is_numeric($buying['tbuying_pack_id']))
$message .="Numeric value ! <BR>";
if ($buying['tbuying_ppu'] =="")
$message .= "ppu is missing ! <BR>";
if (!is_numeric($buying['tbuying_pack_id']))
$message .="Numeric value ! <BR>";
if ($buying['tbuying_qu'] =="")
$message .="Quantity is missing ! <BR>";
if (!is_numeric($buying['tbuying_present_id']))
$message .="Presentation_id is missing ! <BR>";
if ($buying['tbuying_inco_id'] =="")
$message .="Inco_id is missing ! <BR>";
if ($buying['tbuying_dbid'] =="")
$message .="Date of Bid is missing ! <BR>";
if ($buying['tbuying_cur_id'] =="")
$message .="Currency_id is missing ! <BR>";     
if (!is_numeric($buying['tbuying_exr']))
$message .="Exchange rate is missing ! <BR>";
if ($buying['tbuying_srcfund_id'] =="")
$message .="Source of funding is missing ! <BR>";  
if ($buying['tbuying_prov_id'] =="")
$message .="Provider_id is missing ! <BR>";  
if ($buying['tbuying_type_prov_id'] =="")
$message .="Provider Type_id is missing ! <BR>";                    
if ($buying['tbuying_prov_coun_id'] =="")
$message .="Country of Provider is missing ! <BR>";  
if ($buying['tbuying_manu_id'] =="")
$message .="Manufacturer_id is missing ! <BR>";  
if ($buying['tbuying_manu_coun_id'] =="")
$message .="Country of Manufacturer_id missing ! <BR>";  
if ($buying['tbuying_transport_id'] =="")
$message .="Transport_id is missing ! <BR>";  
echo "message=$message";
if ($message) {
echo "<b> The following errors were encountered :</b><BR>$message";
// redisplay the form function
return false;
}
else return true;
}
?>