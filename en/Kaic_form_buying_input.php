<?php 
session_start();
require_once('../Connections/cibproto.php'); 
require_once ("utilang_en.php");
require_once("selectedcurrency.php");
$_POST['tbuying_cur_dol']=$TCURVAL_DOL;
$_POST['tbuying_cur_eur']=$TCURVAL_EUR;
global $save;
if (isset($_POST["pCate"])) {
	$pCate = $_POST['pCate'] ;
	$save = $pCate;
	$_POST['categ']=$save;
// echo "XXXX pCate existe=$pCate save aussi=$save <BR>";
 $kelcategory= $_GET["kelcategory"];
}
else {
$pCate=@$_POST['categ'];
}
mysqli_select_db($database_cibproto, $cibproto);
$query = "SELECT * FROM tcur_par
WHERE tcur_par_id = 'USD' 
and tcur_par_status = '1' ";
//ex�cution de la requ�te et r�cup�ration du nombre de r�sultats

$result = mysqli_query($query, $cibproto);
$affected_rows = mysqli_num_rows($result);

//S'il y a exactement un r�sultat, l'utilisateur est authentifi�, sinon, on l'emp�che d'entrer
if($affected_rows == 1) {
$pointeur=mysqli_fetch_object ($result); 
$TCURPAR_DOL= $pointeur->tcur_par_id;
$TCURVAL_DOL= $pointeur->tcur_par_val;
}

$query = "SELECT * FROM tcur_par
WHERE tcur_par_id = 'EUR' 
and tcur_par_status = '1' ";
//ex�cution de la requ�te et r�cup�ration du nombre de r�sultats

$result = mysqli_query($query, $cibproto);
$affected_rows = mysqli_num_rows($result);

//S'il y a exactement un r�sultat, l'utilisateur est authentifi�, sinon, on l'emp�che d'entrer
if($affected_rows == 1) {
$pointeur=mysqli_fetch_object ($result); 
$TCURPAR_EUR= $pointeur->tcur_par_id;
$TCURVAL_EUR= $pointeur->tcur_par_val;
}

 echo "XXXTCURPAR_DOL=$TCURPAR_DOL<BR>";
 echo "XXXTCURVAL_DOL=$TCURVAL_DOL<BR>";

 echo "XXXTCURPAR_EUR=$TCURPAR_EUR<BR>";
 echo "XXXTCURVAL_EUR=$TCURVAL_EUR<BR>";


echo "TCURVAL_EUR=$TCURVAL_EUR <BR>";

$query_Re_prod = "SELECT * FROM $Product 
WHERE tproduct_status = '1' AND  (tproduct_cat = '$pCate' or '$pCate' = '*') order by tproduct_desc";

$Re_prod = mysqli_query($query_Re_prod, $cibproto) or die(mysqli_error());
$row_Re_prod = mysqli_fetch_assoc($Re_prod);
$totalRows_Re_prod = mysqli_num_rows($Re_prod);
require_once("aic_form_buying_input_insert.php");
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Data Entry</title>
<style type="text/css">
<!--
.Style1 {
	font-size: 18px;
	color: #0000FF;
	font-weight: bold;
}
.Style19 {
	font-size: 18px;
	color: #006600;
	font-weight: bold;
}
.Style21 {font-size: 9px}
.Style22 {color: #990000}
.Style23 {color: #00CC66}
.Style24 {color: #000066}
.Style30 {color: #000099; font-weight: bold; }
.Style32 {color: #000000; font-weight: bold; }
-->
</style>
</head>


<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.Style1 {
	font-size: 18px;
	color: #0000FF;
	font-weight: bold;
}
.Style19 {
	color: #006600;
	font-weight: bold;
}
.Style21 {font-size: 9px}
.Style22 {color: #990000}
.Style23 {color: #00CC66}
.Style24 {color: #000066}
.Style30 {color: #000099; font-weight: bold; }
.Style32 {color: #000000; font-weight: bold; }
.Style33 {	font-size: 18px;
	color: #006600;
	font-weight: bold;
}
.Style33 {	color: #006600;
	font-weight: bold;
}
.Style34 {font-size: 9px}
.Style34 {font-size: 9px}
.Style35 {	font-size: 18px;
	color: #006600;
	font-weight: bold;
}
.Style35 {	color: #006600;
	font-weight: bold;
}
.Style36 {	font-size: 18px;
	color: #006600;
	font-weight: bold;
}
.Style36 {	color: #006600;
	font-weight: bold;
}
.Style37 {font-size: 9px}
.Style37 {font-size: 9px}
.Style38 {	font-size: 18px;
	color: #006600;
	font-weight: bold;
}
.Style38 {	color: #006600;
	font-weight: bold;
}
.Style39 {	font-size: 18px;
	color: #006600;
	font-weight: bold;
}
.Style39 {	color: #006600;
	font-weight: bold;
}
-->
</style>
<script language="JavaScript" type="text/JavaScript" >
<!--

     //-->

function Controle()
{
// alert(' COntrole debut XXXXXXXXXXXXXXXXXXXXXX');

if(document.aic_form_input.tbuying_ppu.value=='') // 1
{
alert('Unit Price is a Mandatory field !');
document.aic_form_input.tbuying_ppu.focus();

}
else if(isNaN(document.aic_form_input.tbuying_ppu.value)) // 2
{
alert('Unit price is a Numeric field !');
document.aic_form_input.tbuying_ppu.focus();
}
else if(document.aic_form_input.tbuying_qu.value=='') // 1
{
alert('Quantity is a Mandatory field !');
document.aic_form_input.tbuying_qu.focus();

}
else if(isNaN(document.aic_form_input.tbuying_qu.value)) // 2
{
alert('Quantity is a Numeric value !');
document.aic_form_input.tbuying_qu.focus();
}
else if(document.aic_form_input.tbuying_pack_size.value!='') // 1
{
	if(isNaN(document.aic_form_input.tbuying_pack_size.value))
	{
	
		alert('Pack size is a Numeric field !');
		document.aic_form_input.tbuying_pack_size.focus();
		return false;
    }
	else 
	{
	    if(document.aic_form_input.tbuying_price_per_pack=='')
		{
			alert('Price per pack is Mandatory !');
			document.aic_form_input.tbuying_price_per_pack.focus();
			return false;
		}
		else
		{
			if(isNaN(document.aic_form_input.tbuying_price_per_pack.value))
			{
				alert('Price per pack is a Numeric field !');
				document.aic_form_input.tbuying_price_per_pack.focus();
				return false;
			}
			
			
		} // ferme la boucle price_per_pack 
}  // pack_size est un champ vide
	

else if(document.aic_form_input.tbuying_lead_time!='') // 2   if(document.aic_form_input.tbuying_price_per_pack=='')
{
	if(isNaN(document.aic_form_input.tbuying_pack_size.value))
	{
	
		alert('Lead Time is a Numeric field !');
		document.aic_form_input.tbuying_lead_time.focus();
		return false;
    }
 }

else
{

document.aic_form_input.method = "POST";
document.aic_form_input.action = "aic_form_buying_input.php";
document.aic_form_input.submit();
return true;
}

// }
}
//-->
</script>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
//-->
</script>
<body> 
<SCRIPT language="javascript">

function ChoosePrice(radio) {
	// alert (" ChoosePrice");
	document.aic_form_input.tbuying_ok.value=0;
    
	  for (var i=0; i<radio.length;i++) {
	
         if (radio[i].checked) 
          {  
		
			if ( i == 0) 
				{
					document.aic_form_input.tbuying_price_per_pack.disabled=true;
		  			document.aic_form_input.tbuying_qty_pack.disabled=true;
					document.aic_form_input.tbuying_ppu.disabled=false;
		  			document.aic_form_input.tbuying_qu.disabled=false;
				}
				else {
			
					document.aic_form_input.tbuying_ppu.disabled=true;
		  			document.aic_form_input.tbuying_qu.disabled=true;
					document.aic_form_input.tbuying_price_per_pack.disabled=false;
					document.aic_form_input.tbuying_qty_pack.disabled=false;
			    }
         }
       }
   }
   function CalculateTotalPrice(radio) {
	  for (var i=0; i<radio.length;i++) {
	      if (radio[i].checked) 
          {  
		  document.aic_form_input.tbuying_ok.value=1;
		   if ( i == 0) {
					
			document.aic_form_input.tbuying_tcost.value=document.aic_form_input.tbuying_qty_pack.value * document.aic_form_input.tbuying_price_per_pack.value;
			document.aic_form_input.tbuying_qty_pack.value=document.aic_form_input.tbuying_qu.value / document.aic_form_input.tbuying_pack_size.value; 
			document.aic_form_input.tbuying_price_per_pack.value=document.aic_form_input.tbuying_ppu.value * document.aic_form_input.tbuying_pack_size.value;
			document.aic_form_input.tbuying_ppu2.value=document.aic_form_input.tbuying_ppu.value;
			document.aic_form_input.tbuying_qu2.value=document.aic_form_input.tbuying_qu.value;
		    document.aic_form_input.tbuying_tcost2.value=document.aic_form_input.tbuying_tcost.value;
			document.aic_form_input.tbuying_qty_pack2.value=document.aic_form_input.tbuying_qty_pack.value; 
			document.aic_form_input.tbuying_ppu2.value=document.aic_form_input.tbuying_ppu.value;
			document.aic_form_input.tbuying_tcost2.value=document.aic_form_input.tbuying_qty_pack2.value * document.aic_form_input.tbuying_price_per_pack.value;
			document.aic_form_input.tbuying_tcost.value=document.aic_form_input.tbuying_qty_pack2.value * document.aic_form_input.tbuying_price_per_pack.value;
			document.aic_form_input.tbuying_ppp2.value=document.aic_form_input.tbuying_price_per_pack.value;
					
			}
			else {
			
			document.aic_form_input.tbuying_tcost.value=document.aic_form_input.tbuying_price_per_pack.value * document.aic_form_input.tbuying_qty_pack.value;
		    document.aic_form_input.tbuying_ppu.value=document.aic_form_input.tbuying_price_per_pack.value/document.aic_form_input.tbuying_pack_size.value;
			document.aic_form_input.tbuying_qu.value=document.aic_form_input.tbuying_pack_size.value*document.aic_form_input.tbuying_qty_pack.value;
			document.aic_form_input.tbuying_ppu2.value=document.aic_form_input.tbuying_ppu.value;
			document.aic_form_input.tbuying_qu2.value=document.aic_form_input.tbuying_qu.value;
			document.aic_form_input.tbuying_tcost2.value=document.aic_form_input.tbuying_ppu2.value * document.aic_form_input.tbuying_qty_pack2.value;
		    }
         }
   
	  }
   }

function ControlFields(champ,nomchamp,ordre,bidon)
{
retour=parseInt(champ);
//alert ('retour'+retour);
// parseInt(string, radix
// alert ('ordre'+ordre);
if (ordre==2) {
// alert ('2222');
 // voir=ChecklaDate(champ);
	if(!ChecklaDate(champ)) alert (' Wrong Date Format !');
	
}
else	
	{
		if (isNaN(retour)) 
		{
		alert(nomchamp+'  is a Numeric field or is a Mandatory Field!');
		document.aic_form_input.champ.focus();
		}
	// alert ('isNaN'+retour);
		// else alert('else isNaN'+retour);
	}
	
}

function ChecklaDate(d) {
    // Cette fonction permet de v�rifier la validit� d'une date au format jj/mm/aa ou jj/mm/aaaa
    // Par Romuald
 // alert ('function ChecklaDate');  
    if (d == "") // si la variable est vide on retourne faux
     return false;
     //alert ('d='+d);
    e = new RegExp("^[0-9]{1,2}-[0-9]{1,2}-([0-9]{2}|[0-9]{4})$");
  //      e = new RegExp("^[0-9]{1,2}-[0-9]{1,2}-([0-9]{2}|[0-9]{4})$"); 
  //alert ('e='+e);
     if (!e.test(d)) // On teste l'expression r�guli�re pour valider la forme de la date
     return false; // Si pas bon, retourne faux
 //   alert ('return');
     // On s�pare la date en 3 variables pour v�rification, parseInt() converti du texte en entier
     j = parseInt(d.split("-")[0], 10); // jour
     m = parseInt(d.split("-")[1], 10); // mois
     a = parseInt(d.split("-")[2], 10); // ann�e
    //alert ('j m a'+j+m+a);
     // Si l'ann�e n'est compos�e que de 2 chiffres on compl�te automatiquement
     if (a < 1000) {
     if (a < 89) a+=2000; // Si a < 89 alors on ajoute 2000 sinon on ajoute 1900
     else a+=1900;
     }
    
     // D�finition du dernier jour de f�vrier
     // Ann�e bissextile si annn�e divisible par 4 et que ce n'est pas un si�cle, ou bien si divisible par 400
     if (a%4 == 0 && a%100 !=0 || a%400 == 0) fev = 29;
     else fev = 28;
    
     // Nombre de jours pour chaque mois
     nbJours = new Array(31,fev,31,30,31,30,31,31,30,31,30,31);
    
     // Enfin, retourne vrai si le jour est bien entre 1 et le bon nombre de jours, idem pour les mois, sinon retourn faux
     return ( m >= 1 && m <=12 && j >= 1 && j <= nbJours[m-1] );
     }


</script>
<form method="post" name="aic_form_input"> 
  <p align="left"><a href="t_search_param_buying_categ_control_ins.php" title="Back" class="Style22">Back</a>
  <p align="center"> <span class="Style22"> 
    <?php
				echo "$Form_title_en_insert";
	?></span></p> 
  <table width="701" height="10" border="1" align="center" cellpadding="1" cellspacing="1" bgcolor="#ECE9D8" frame="border"> 
    <tr valign="baseline"> 
      <td width="111" align="right" nowrap ><div align="center"><span class="Style22">Product</span><span class="Style21 Style22"> (*)</span></div></td> 
      <td width="577"><div align="left">
        <select name="tbuying_product_id" class="Style19">
          <?php
do {  
?>
    <option value="<?php echo $row_Re_product['tproduct_id']."+".$row_Re_product['tproduct_cat']?>"><?php echo $row_Re_product['tproduct_desc']?></option>
          <?php
} while ($row_Re_product = mysqli_fetch_assoc($Re_product));
  $rows = mysqli_num_rows($Re_product);
  if($rows > 0) {
      mysqli_data_seek($Re_product, 0);
	  $row_Re_product = mysqli_fetch_assoc($Re_product);
  }
?>
        </select>
      </div>
</td> 
    </tr> 
  </table> 
  <table height="572" border="1" align="center" cellpadding="1" cellspacing="1" bgcolor="#ECE9D8" frame="border">
    <tr valign="baseline">
      <td width="216" height="42" align="right" nowrap ><div align="center" class="Style23">
        <div align="right"><span class="Style22">Presentation<span class="Style21">(*)</span></span></div>
      </div></td>
      <td width="72"><select name="tbuying_present_id" class="Style19">
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
      </select></td>
      <td width="150" align="right" nowrap><div align="center" class="Style22">
          <div align="center" class="Style22">
          Date of Bid / Reception Date<span class="Style21">(dd/mm/yyyy) (*)</span></div>
      </div></td>
      <td width="275">
<input name="tbuying_dbid" type="text" class="Style35" onChange="ControlFields(document.aic_form_input.tbuying_dbid.value,'Date of Bid opening /Date of reception ',2,document.aic_form_input.tbuying_price_unit);"
 value="" >

<a href="#" onClick=" window.open('pop.php?frm=aic_form_input&ch=tbuying_dbid','calendrier','width=350,height=160,scrollbars=0').focus();"><img src="petit_calendrier.gif" border="0"/></a> </td>
    </tr>
    <tr valign="baseline">
      <td height="30" align="right" nowrap>        <p align="right" class="Style22">Smallest unit<span class="Style21">(*)</span></p></td>
      <td><p>
          <select name="tbuying_smalunit_id" class="Style19">
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
          </select>
      </p></td>
      <td align="right" nowrap background="#990000"><div align="right"><span class="Style22"><span class="Style22">Source of funding(*) </span> </span></div></td>
      <td><select name="tbuying_srcfund_id" class="Style19">
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
    <tr valign="baseline">
      <td height="30" align="right" nowrap><div align="center" class="Style22">
          <div align="center" class="Style22">
            <div align="right">Packaging type<span class="Style21">(*)</span></div>
          </div>
      </div></td>
      <td><select name="tbuying_pack_id" class="Style19">
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
        </select>
      </td>
      <td><div align="center" class="Style22">
          <div align="center" class="Style22">
            <div align="right">Supplier<span class="Style21">(*)</span></div>
          </div>
      </div></td>
      <td><div align="left">
          <select name="tbuying_prov_id" class="Style19" onChange="<?php
$_POST['tbuying_prov_coun_id']=$Space;

			echo $row_Re_provider['tprov_desc'].$Space.$row_Re_provider['tprov_coun_id'];
		 $VAR_PAYS=$row_Re_provider['tprov_coun_id'];
		 $Spacep=$row_Re_provider['tprov_coun_id'];
?>">
            <?php
do {  
?>
            <option value="<?php echo $row_Re_provider['tprov_id'];?>">
            <?php 
			echo $row_Re_provider['tprov_desc'].$Space.$row_Re_provider['tprov_coun_id'];
		     $VAR_PAYS=$row_Re_provider['tprov_coun_id'];

		?>
            </option>
            <?php
} while ($row_Re_provider = mysqli_fetch_assoc($Re_provider));
  $rows = mysqli_num_rows($Re_provider);
  if($rows > 0) {
      mysqli_data_seek($Re_provider, 0);
	  $row_Re_provider = mysqli_fetch_assoc($Re_provider);
  }
?>
          </select>
          <input name="tprov_coun_id" type="hidden" class="Style19" value="<?php echo $row_Re_prov_coun['tprov_coun_id']; ?>">
      </div></td>
    </tr>
    <tr valign="baseline">
      <td height="28" align="right" nowrap><div align="center" class="Style22">
        <div align="right">Incoterm<span class="Style21">(*)</span></div>
      </div></td>
      <td><select name="tbuying_inco_id" class="Style19">
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
        </select>
      </td>
      <td><div align="center" class="Style22">
        <div align="right">Type of Supllier<span class="Style21">(*)</span></div>
      </div></td>
      <td><div align="left">
          <select name="tbuying_type_prov_id" class="Style19">
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
        </div>
    </tr>
    <tr valign="baseline">
      <td height="28" align="right" nowrap><div align="center" class="Style22">
        <div align="right">Currency<span class="Style21">(*)</span></div>
      </div></td>
      <td><select name="tbuying_cur_id" class="Style19">
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
      </select></td>
      <td><div align="center" class="Style22">
          <div align="right">Manufacturer<span class="Style21">(*</span><span class="Style21">)</span>
          </div>
          <div align="left" class="Style22"></div>
      </div></td>
      <td><div align="left">
          <select name="tbuying_manu_id" class="Style19">
            <?php
do {  
?>
            <option value="<?php echo $row_Re_manuf['tmanu_id']?>"> <?php echo $row_Re_manuf['tmanu_desc'].$Space.$row_Re_manuf['tmanu_coun_id'];
		?></option>
            <?php
} while ($row_Re_manuf = mysqli_fetch_assoc($Re_manuf));
  $rows = mysqli_num_rows($Re_manuf);
  if($rows > 0) {
      mysqli_data_seek($Re_manuf, 0);
	  $row_Re_manuf = mysqli_fetch_assoc($Re_manuf);
  }
?>
          </select>
          <input name="tmanu_coun_id2" type="hidden" class="Style19" value="<?php echo $row_Re_manuf['tmanu_coun_id']; ?>">
      </div></td>
    </tr>
    <tr valign="baseline">
      <td height="47" align="right" nowrap>        <p align="right" class="Style22">Exchange rate<span class="Style21">(*)</span></p></td><td><p>
          <input name="tbuying_exr" type="text" class="Style19" size="8" onChange="ControlFields(document.aic_form_input.tbuying_exr.value,'Exchange rate ',1)" value=<?php
				echo "$Euro_rate";?> >
      </p></td>
      <td nowrap><div align="center" class="Style22">
        <div align="right">Transportation Method<span class="Style21">(</span><span class="Style21">*)</span></div>
      </div></td>
      <td><div align="left">
          <select name="tbuying_transport_id" class="Style19">
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
      </div></td>
    </tr>
    <tr valign="baseline">
      <td height="47" align="right" nowrap><div align="center">
          <p align="right" class="Style22">Smallest unit price<span class="Style21">(*)</span></p>
          <p align="right" class="Style22">Quantity (smallest unit)<span class="Style21">(*)</span></p>
          <p class="Style22">
            <input type="radio" name="tbuying_price_unit"  class="Style19" value="1">
            <span class="Style24 Style25"><span class="Style31">Per smallest unit </span></span></p>
          </div></td>
      
      <td><div align="center" class="Style22">
          <table width="200" border="0">
            <tr>
              <td>
                <div align="left">
                  <input name="tbuying_ppu" type="text" class="Style19" value="<?php echo @$_POST['tbuying_ppu'] ?>" size="10" 
			onChange="ControlFields(document.aic_form_input.tbuying_ppu.value,'Unit price',1);
					
					  document.aic_form_input.tbuying_price_per_pack.disabled=true;
	                  document.aic_form_input.tbuying_qty_pack.disabled=true;">            
                </div></td>
            </tr>
            <tr>
              <td>
                <div align="left">
                  <input name="tbuying_qu" type="text" class="Style19"  value="<?php echo @$_POST['tbuying_qu'] ?>" size="10" 
			onChange="ControlFields(document.aic_form_input.tbuying_qu.value,'Quantity ',1);
			 
			          document.aic_form_input.tbuying_price_per_pack.disabled=true;
	                  document.aic_form_input.tbuying_qty_pack.disabled=true;">
                </div></td>
            </tr>
          </table>
          <p class="Style22">
            <input name="button2" type="button" class="Style30" onClick="CalculateTotalPrice(document.aic_form_input.tbuying_price_unit)"  value="Calculate">
            <span class="Style30">
            <input name="button2" type="button" class="Style22" onClick="ChoosePrice(document.aic_form_input.tbuying_price_unit)"  value="Change">
            </span><span class="Style30">
            </span> <span class="Style21"> </span></p>
          </div></td>
      <td>        <p align="right" class="Style22">Remarks/Comments</p>        
      <p align="right">&nbsp;                </p></td>
	  <td><div align="left">
	    <p>
            <textarea name="tbuying_remark" cols="60"></textarea>
          </p>
      </div></td>
 
    </tr>
    <tr valign="baseline">
      <td height="40" align="right" nowrap>  	    <p class="Style22">Price per pack<span class="Style21">(*)</span></p>
        <p class="Style22"> Quantity<span class="Style21">(*)</span></p>
        <p><span class="Style22">Pack size<span class="Style21">(*)</span></span></p>
        <p align="center" class="Style22"><span class="Style24">
      <input name="tbuying_price_unit" type="radio"  class="Style19" value="1" checked>
      <span class="Style32">Per pack size</span></span></p></td>
      <td><table width="200" border="0">
          <tr>
            <td><span class="Style21">
            <span class="Style34">
            <input name="tbuying_price_per_pack" type="text" class="Style33" 
	  value="<?php echo @$_POST['tbuying_price_per_pack'] ?>" size="10"
	    onChange="ChoosePrice(document.aic_form_input.tbuying_price_unit);
		   		  ControlFields(document.aic_form_input.tbuying_price_per_pack.value,'Price per pack',1);
				  document.aic_form_input.tbuying_ppu.disabled=true;
	              document.aic_form_input.tbuying_qu.disabled=true;">
            </span></span></td>
          </tr>
          <tr>
            <td><span class="Style21"><span class="Style37">
              <input name="tbuying_qty_pack" type="text" class="Style36" value="<?php echo @$_POST['tbuying_qty_pack'] ?>" size="10"
				onChange="ChoosePrice(document.aic_form_input.tbuying_price_unit);
						  ControlFields(document.aic_form_input.tbuying_qty_pack.value,'Quantity ',1);
				          document.aic_form_input.tbuying_ppu.disabled=true;
	                      document.aic_form_input.tbuying_qu.disabled=true;">
            </span></span></td>
          </tr>
          <tr>
            <td height="26"><span class="Style21">
              <input name="tbuying_pack_size" type="text" class="Style19" value="<?php echo @$_POST['tbuying_pack_size'] ?>" size="10"
				onChange="ChoosePrice(document.aic_form_input.tbuying_price_unit);
				ControlFields(document.aic_form_input.tbuying_pack_size.value,'Pack size ',1)">
</span></td>
          </tr>
        </table>
        <p align="center" class="Style22">
          <input name="button22" type="button" class="Style30" onClick="CalculateTotalPrice(document.aic_form_input.tbuying_price_unit)"  value="Calculate">
          <span class="Style30">
          <input name="button3" type="button" class="Style22" onClick="ChoosePrice(document.aic_form_input.tbuying_price_unit)"  value="Change">
          </span></p>
      </td>
      <td><div align="center"></div></td>
      <td>&nbsp;</td>
    </tr>
	<tr valign="baseline">
      <td height="40" align="right" nowrap><p align="center" class="Style22">&nbsp;</p></td>
      <td><p><span class="Style22">Total Cost</span>
        <input name="tbuying_tcost" type="text" class="Style19" size="10" readonly="true" >

          </p></td>
      <td><div align="center"></div></td>
      <td>&nbsp;</td>
    </tr>
    <tr valign="baseline">
      <td height="35" align="right" nowrap><div align="center" class="Style24"><span class="Style22">Lead Time (days)</span></div></td>
      <td><input name="tbuying_lead_time" type="text" class="Style19" onChange="ControlFields(document.aic_form_input.tbuying_lead_time.value,'D�lai de livraison ',1)" value="<?php echo @$_POST['tbuying_lead_time'] ?>" size="10"></td>
      <td>&nbsp;</td>
      <td><div align="left">
          </div></td>
	  
    </tr>
 <td height="35" align="right" nowrap><div align="center" class="Style24"></div></td>
      <td><input name="tbuying_date" type="hidden" value="
	  <?php
		$today = date ("Y-m-j");
		echo "$today";
	?>">
        <input name="tbuying_dmod" type="hidden" value="
	  <?php
		$today = date ("Y-m-j");
		echo "$today";
	?>">
        <input name="tbuying_auth" type="hidden" value="">
        <input name="tbuying_categ_id2" type="hidden" class="Style19" value="" ?>
        <input name="tbuying_dosage_id" type="hidden" class="Style19" value="" >
        <input name="MM_insert" type="hidden" value="aic_form_input">
        <input name="categ" type="hidden" value="<?php echo @$_POST['categ']?>">
        <input name="tbuying_tcost4" type="hidden" class="Style19" value="" >
        <input name="tbuying_tcost2" type="hidden" class="Style19" value="" >
        <input name="tbuying_ok" type="text" class="Style38" value="0" >        
        <input name="tbuying_ppu22" type="hidden" class="Style19" value="" >
        <input name="tbuying_qu2" type="hidden" class="Style19" value="" >
        <input name="tbuying_ppp2" type="hidden" class="Style19" value="" >
        <input name="tbuying_qty_pack2" type="hidden" class="Style19" value="" >
        <input name="tbuying_pack_size2" type="hidden" class="Style19" value="" >
        <input name="tbuying_cur_eur" type="text" class="Style39" >
        <input name="tbuying_cur_dol" type="text" class="Style39" ></td>
      <td><input name="button" type="submit" class="Style1"  value="Insert"
	  ></td>
      <td><div align="left">
      </div></td>
    <tr valign="baseline"> </tr>
  </table>
  <p>
    <input name="tbuying_ppu2" type="hidden" class="Style19" value="" >
  </p> 
</form> 
<p>&nbsp;</p> 

</body>
</html>
<?php
mysqli_free_result($Re_tbuying);

mysqli_free_result($Re_product);

mysqli_free_result($Re_concent);

mysqli_free_result($Re_smalunit);

mysqli_free_result($Re_packaging);

mysqli_free_result($Re_present);

mysqli_free_result($Re_currency);

mysqli_free_result($Re_srcfund);

mysqli_free_result($Re_provider);

mysqli_free_result($Re_ttype_prov);

mysqli_free_result($Re_country);

mysqli_free_result($Re_transport);

mysqli_free_result($Re_tincoterm);

mysqli_free_result($Re_ecowas);

mysqli_free_result($Re_prod);

mysqli_free_result($Re_dosage1);

mysqli_free_result($Re_tinco1);

?>
<?php
function ControleInsert ($buying)
{

$message = "";
$message1="Mandatory !";
$message2="Numeric !";
$message20="Numeric !";
$message3="Wrong date format !";
$message4="Missing value !";

if ($buying['tbuying_dbid'] =="")
$message .="Date of Bid opening ".$message1." <BR>";
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
  $ok=0;
  $longueur=strlen($vardbid) ;

  if (strlen($vardbid) == 12 ) {
     if (checkdate($mois,$jour,$annee))
     {
       $LaDate=formater($buying['tbuying_dbid'], true);
     }
     else $message .="Date of Bid opening ".$message3." <BR>";
   }
   else  $message .="  Date of Bid opening ".$message3." <BR>";
 } 

if ($buying['tbuying_cur_id'] =="")
$message .="Currency_id ".$message1." <BR>" ; 

if (!is_numeric($buying['tbuying_exr']))
$message .="Exchange rate is Numeric ! <BR>";

if ($buying['tbuying_srcfund_id'] =="")
$message .="Source of funding ".$message1." <BR>";  
if ($buying['tbuying_prov_id'] =="")
$message .="Provider_id ".$message1." <BR>";  
if ($buying['tbuying_type_prov_id'] =="")
$message .="Provider Type_id ".$message1." <BR>";                    
if ($buying['tbuying_manu_id'] =="")
$message .="Manufacturer_id ".$message1." <BR>";  

if ($buying['tbuying_transport_id'] =="")
$message .="Transportation method ".$message1." <BR>" ;

if ($buying['tbuying_lead_time'] !="")
{
	if (!is_numeric($buying['tbuying_lead_time']))
         $message .= "Lead time ".$message2." <BR>";
}

if ($message) {
 
echo "<b> The following errors have been encountered :</b><BR>$message";
// echo "<b> Please check the fields below </b> <BR>";
// redisplay the insert form function
$_POST["tbuying_ok"] = 1;
$voir=$_POST["tbuying_ok"] = 1;
// echo "voir = $voir <BR>";
return false;
}

return true;
}

function ControleDate ($date, $vers_mysql)
{
// JJ/MM/AAAA => AAAA-MM-JJ
if($vers_mysql)
{

$pattern = "([0-9]{2})/([0-9]{2})/([0-9]{4})";
$replacement = "$3-$2-$1";
}
else
{
$pattern = "([0-9]{4})-([0-9]{2})-([0-9]{2})";
$replacement = "$3/$2/$1";
}

return $replacement;
} 
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
// echo "ELSE YYYYYYYYYYYY";
}

return preg_replace($pattern, $replacement, $date);
}

function appel($mode){
// Cette fonction permettra de recuperer les valeurs calcul�es par java

echo "appel mode=$mode <BR>";
	///////////////////////////
	if (isset($_POST['tbuying_price_per_pack'])) {
    $ppp1=$_POST['tbuying_price_per_pack'];
	$PPP=sprintf("%.4f",$_POST['tbuying_price_per_pack']);
	
	echo "ppp1=$ppp1<BR>";
	echo "PPP=$PPP<BR>";
	
	}
    else {
	$ppp1=sprintf("%.4f",$_POST['tbuying_ppp2']);
	$PPP=sprintf("%.4f",$_POST['tbuying_ppp2']);
	/*
	echo "ppp1 par p2=$ppp1<BR>";
	echo "PPP par p2=$PPP<BR>";
	*/
	}
   	if (isset($_POST['tbuying_ppu'])) {
    $ppu1=$_POST['tbuying_ppu'];
	$PPU=sprintf("%.4f",$_POST['tbuying_ppu']);
	 echo "XXX ppu1=$ppu1<BR>";
	 echo "XXX PPU=$PPU<BR>";
	}
    else {
	$ppu1=sprintf("%.4f",$_POST['tbuying_ppu2']);
	$PPU=sprintf("%.4f",$_POST['tbuying_ppu2']);
	 echo "ppu1 par p2=$ppu1<BR>";
	 echo "PPU par p2=$PPU<BR>";
	
	}
	// echo "PPP=$PPP   PPU=$PPU <BR>";
	
	if (isset($_POST['tbuying_qty_pack'])) {
    $qty1=$_POST['tbuying_qty_pack'];
	$QTY_TEMP1=sprintf("%.4f",$_POST['tbuying_qty_pack']);
	
	echo "qty1=$qty1<BR>";
	echo "QTY_TEMP1=$QTY_TEMP1<BR>";
	
	}
    else {
	$qty1=sprintf("%.4f",$_POST['tbuying_qty_pack2']);
	$QTY_TEMP1=$_POST['tbuying_qty_pack2'];
	
	echo "qty1 par pack2=$qty1<BR>";
	echo "QTY_TEMP1 par qty2=$QTY_TEMP1<BR>";
	
	}
	
	if (isset($_POST['tbuying_qu'])) {
    $qu1=$_POST['tbuying_qu'];
	$QU_TEMP1=sprintf("%.4f",$_POST['tbuying_qu']);
	
	echo "qu1=$qty1<BR>";
	echo "QU_TEMP1=$QU_TEMP1<BR>";
	
	}
    else {
	$qu1=$_POST['tbuying_qu2'];
	$QU_TEMP1=sprintf("%.4f",$_POST['tbuying_qu2']);
	
	echo "qu1=$qty1<BR>";
	echo "QU_TEMP1=$QU_TEMP1<BR>";
	
	
	}
	$PACK_SIZE=sprintf("%.4f",$_POST['tbuying_pack_size']);
	 $PPU_TEMP = $PPU ;
	echo " PACK_SIZE=$PACK_SIZE <BR>";
	$TOTAL_QTY = sprintf("%.4f",$QTY_TEMP1);
	$TOTAL_COST=sprintf("%.4f",$_POST['tbuying_tcost']);
	echo "PPU_TEMP=$PPU<BR>";
	echo "QU_TEMP1=$QU_TEMP1<BR>";
	echo "PACK_SIZE=$PACK_SIZE<BR>";
	echo "PPP=$PPP<BR>";
	echo "QTY_PACK=$TOTAL_QTY<BR>";
	echo "TOTAL_COST=$TOTAL_COST <BR>";
echo "TCURVAL_EUR=$TCURVAL_EUR <BR>";
echo "TCURVAL_DOL=$TCURVAL_DOL <BR>";
/*
// require_once('../Connections/cibproto.php'); 
 mysqli_select_db($database_cibproto, $cibproto);
$query = "SELECT * FROM tcur_par
WHERE tcur_par_id = 'USD' 
and tcur_par_status = '1' ";
//ex�cution de la requ�te et r�cup�ration du nombre de r�sultats

$result = mysqli_query($query, $cibproto);
$affected_rows = mysqli_num_rows($result);

//S'il y a exactement un r�sultat, l'utilisateur est authentifi�, sinon, on l'emp�che d'entrer
if($affected_rows == 1) {
$pointeur=mysqli_fetch_object ($result); 
$TCURPAR_DOL= $pointeur->tcur_par_id;
$TCURVAL_DOL= $pointeur->tcur_par_val;
}

$query = "SELECT * FROM tcur_par
WHERE tcur_par_id = 'EUR' 
and tcur_par_status = '1' ";
//ex�cution de la requ�te et r�cup�ration du nombre de r�sultats

$result = mysqli_query($query, $cibproto);
$affected_rows = mysqli_num_rows($result);

//S'il y a exactement un r�sultat, l'utilisateur est authentifi�, sinon, on l'emp�che d'entrer
if($affected_rows == 1) {
$pointeur=mysqli_fetch_object ($result); 
$TCURPAR_EUR= $pointeur->tcur_par_id;
$TCURVAL_EUR= $pointeur->tcur_par_val;
}

 echo "XXXTCURPAR_DOL=$TCURPAR_DOL<BR>";
 echo "XXXTCURVAL_DOL=$TCURVAL_DOL<BR>";

 echo "XXXTCURPAR_EUR=$TCURPAR_EUR<BR>";
 echo "XXXTCURVAL_EUR=$TCURVAL_EUR<BR>";


echo "TCURVAL_EUR=$TCURVAL_EUR <BR>";

	if ( $_POST['tbuying_cur_id'] =='EUR')
	{
	$CUR_VAL = $TCURVAL_EUR;
	$PPU_DOL = $PPU * $CUR_VAL ;
	$PPP_DOL = $PPP * $CUR_VAL;
	$TOTAL_COST_DOL = $TOTAL_COST * $CUR_VAL;
	$TOTAL_COST_EUR = $TOTAL_COST;
	$PPU_EUR = $PPU;
	$PPP_EUR = $PPP ;
	}
	else {
	$CUR_VAL = $TCURVAL_DOL;
	$PPU_EUR =  $PPU * $CUR_VAL ;
	$PPP_EUR = $PPP * $CUR_VAL;
	$TOTAL_COST_EUR = $TOTAL_COST * $CUR_VAL;
	$TOTAL_COST_DOL = $TOTAL_COST;
	$PPU_DOL = $PPU;
	$PPP_DOL = $PPP;
	}
*/	
/*
$PPP=
$PPU=
$PPU_DOL=					   
$PPU_EUR=
$TOTAL_COST=
$TOTAL_COST_DOL= 
$TOTAL_COST_EUR=
$TOTAL_QTY=
$QU_TEMP1=
$PPP=
$PPP_DOL=
$PPP_EUR=
*/
}
function execute_query($query){
//echo "XXXXXXXXXXXXXXXXXX execute_query<BR>";
if(!$return = mysqli_query($query))
{
     // Cr�ation d'une exception
     // afin de pouvoir r�cuper la trace
     // et remonter a la source de l'appel de la fonction
    	 $return = new Exception("Erreur SQL");
     	$tbl = $return->getTrace();
     	echo'<table class="mysqli_error"><tr><td><b>erreur dans la base de donn�e. Faites en part � l\'administrateur</b></td></tr><tr><td><b>'.mysqli_errno().' :</b> '.mysqli_error().'</td></tr><tr><td colspan="2">Dans '.$tbl[1]['file'].' ligne '.$tbl[1]['line'].'</table>';
     	mysqli_close();
     	exit;
}
return $return;
}

?>
