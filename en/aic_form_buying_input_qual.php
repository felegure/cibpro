<?php 
session_start();
require_once('../Connections/cibproto.php'); 
error_reporting(E_ALL);
$rowid= $_GET['rowid'];
$buying=$_GET['hab'];
//$usercountry=$_SESSION['username'];
$pDsta=$_GET['pDsta'];
$pDend=$_GET['pDend'];
$pMini=$_GET['pMini'];
$pMaxi=$_GET['pMaxi'];
$pCate=$_GET['pCate'];
$pProd=$_GET['pProd'];
$pEco=$_GET['pEco'];
$pProv=$_GET['pProv'];
$pManu=$_GET['pManu'];
$pDbid=$_GET['pDbid'];
$pPpu=$_GET['pPpu'];
$pQu=$_GET['pQu'];
$pCur=$_GET['pCur'];
$pUse=$_GET['pUse'];
//echo "aic_form_buying_input_qual.php <BR> ";
$currentPage = $_SERVER["PHP_SELF"];
$message3="Wrong date format";
require_once ("utilang_en.php");
 //echo "aic_form_buying_input_qual -   Parametre passé rowid =$rowid ";
// usercountry=$usercountry <BR> ";
// 
mysqli_select_db($database_cibproto, $cibproto);
$query_Re_tmotifqual = "SELECT tmotifqual_id, tmotifqual_desc FROM  $tmotifqual WHERE tmotifqual_status = 1 order by tmotifqual_desc";
$Re_tmotifqual = mysqli_query($query_Re_tmotifqual, $cibproto) or die(mysqli_error());
$row_Re_tmotifqual = mysqli_fetch_assoc($Re_tmotifqual);
$totalRows_Re_tmotifqual = mysqli_num_rows($Re_tmotifqual);

//mysqli_select_db($database_cibproto, $cibproto);
$query_Re_tnotqual = "select max(tnotqual_id)+1 tnotqual_id from tnotqual";
$Re_tnotqual = mysqli_query($query_Re_tnotqual, $cibproto) or die(mysqli_error());
$row_Re_tnotqual = mysqli_fetch_assoc($Re_tnotqual);
$totalRows_Re_tnotqual = mysqli_num_rows($Re_tnotqual);
// echo "total_rows=$totalRows_Re_tnotqual";
$maxim=$row_Re_tnotqual['tnotqual_id'];

if ($maxim) ;
//echo "existe <BR>";
else{ $maxim=1;
//echo "n'existe pas <BR>";
//echo "N'existe pas maxim=$maxim  rowid=$rowid";
}
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "aic_form_buying_input_qual")) {

require "aic_form_buying_input_qual_insert.php";

}

//mysqli_select_db($database_cibproto, $cibproto);
$query_Re_users = "SELECT * FROM taccess";
$Re_users = mysqli_query($query_Re_users, $cibproto) or die(mysqli_error());
$row_Re_users = mysqli_fetch_assoc($Re_users);
$totalRows_Re_users = mysqli_num_rows($Re_users);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Saisie des probl&egrave;mes de qualit&eacute;</title>
<style type="text/css">
<!--
.Style22 {font-weight: bold; font-size: 14px; color: #990000; }
.Style25 {
	font-size: 16px;
	color: #000099;
	font-weight: bold;
}
.Style31 {color: #000000}
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

   
function ControlFields(champ,nomchamp,ordre)
{

retour=parseInt(champ);

	if (isNaN(retour)) 
	{
	 if (nomchamp=='Date') alert
	alert(nomchamp+' est un champ Obligatoire et Numérique !');
	document.aic_form_input.champ.focus();
	}
	// alert ('isNaN'+retour);
	else ('else isNaN'+retour);
   
}
</script>
<form method="post" name="aic_form_buying_input_qual"> 
  <p align="left"><span class="Style22"> 
    <?php  
	 echo "<A HREF='aic_list_prod_per_supman_qual.php?rowid=$rowid&hab=$buying&pCate=$pCate&pDend=$pDend&pDsta=$pDsta&pMini=$pMini&pMaxi=$pMaxi
	&pProv=$pProv'>
			Back <A/>";		
	?>
    </span>
<table width="963" border="1" cellpadding="2" cellspacing="2">
  <tr>
    <th width="126" scope="row"><div align="center"><span class="Style84"><span class="Style84"><span class="Style30"><font color="#993300" size="-3">Country 
          </font></span></span><font color="#FF0000" size="-3"><span class="Style30">: 
          </span></font> 
          <div align="center" class="Style30"> <font color="#FF0000" size="-1">
            <?php 
      echo $pEco; ?>
            </font></div>
          </span></div></th>
    <td width="571"><div align="center" class="Style7 Style49"><span class="Style84"> 
          <span class="Style30"><font color="#993300" size="-3">Product : </font></span> 
          <div align="center" class="Style30"> <font color="#FF0000" size="-1"> 
            <?php 
      echo "$pProd"; ?>
            </font><font size="-3" face="Courier New, Courier, mono"> </font> 
          </div>  
    </span> </div></td>
	 <td width="571"><div align="center" class="Style7 Style49"><span class="Style84"> 
          <span class="Style30"><font color="#993300" size="-3">Supplier</font></span><font color="#993300" size="-1"> 
          : </font> 
          <div align="center" class="Style30"> <font color="#FF0000" size="-1"> 
            <?php 
      echo "$pProv"; ?>
            </font></div>
          </span> </div></td>
	 <td width="571"><div align="center" class="Style7 Style49"><span class="Style84"> 
          <span class="Style84"><font color="#993300" size="-3"><strong>Manufacturer 
          : </strong> </font></span> 
          <div align="center" class="Style30"> <font color="#FF0000" size="-1"> 
            <?php 
      echo "$pManu"; ?>
            </font></div>
          </span> </div></td>
	<td width="571"><div align="center" class="Style7 Style49"><span class="Style84"> 
          <span class="Style84"><span class="Style30"><font color="#993300" size="-3">Price 
          </font></span></span><font color="#993300" size="-3"><span class="Style30">: 
          </span></font> 
          <div align="center" class="Style30"> <font color="#FF0000" size="-1">
            <?php 
      echo "$pPpu ".$pCur; ?>
            </font> </div>
          </span> </div></td>
		  <td width="571"><div align="center" class="Style7 Style49"><span class="Style84"> 
          <span class="Style84"><span class="Style30"><font color="#993300" size="-3">Quantity 
          </font></span></span><font color="#993300" size="-3"><span class="Style30">: 
          </span></font> 
          <div align="center" class="Style30"> <font color="#FF0000" size="-1"> 
            <?php 
      echo "$pQu"; ?>
            </font> </div>
          </span> </div></td>
	<td width="571"><div align="center" class="Style7 Style49"><span class="Style84"> 
          <font color="#993300" size="-3"><strong>Date of bid/recection date :</strong></font><font color="#993300"> 
          </font> 
          <div align="center" class="Style30"><font color="#FF0000" size="-1"> 
            <?php 
      echo "$pDbid"; ?>
            </font> </div>
          </span> </div></td>
    <td width="138"><div align="center" class="Style30"><font color="#993300" size="-3">user: 
          </font><font color="#FF0000" size="-1"> 
          <?php	echo "$pUse";
	?>
          </font> </div></td>
    <td width="192"><div align="center" class="Style30"><font color="#990000" size="-3">Date</font><font size="-3"> 
          : </font> <font color="#FF0000" size="-3"> 
          <?php 
      $today = date (" D j, M,Y  H:i:s");
      echo " $today "; ?>
          </font> </div></td>
  </tr>
</table>

<p align="center"> <span class="Style22"><strong>
    <?php
				echo "$Form_title_en_qua";
	?>
    </strong></span></p> 
   
  <table width="903" height="472" border="1" align="center" cellpadding="1" cellspacing="1" bgcolor="#ECE9D8" frame="border">
    <!--DWLayoutTable-->
    <tr valign="baseline"> 
      <td width="310" height="42" align="right" nowrap ><div align="center" class="Style23"> 
          <div align="right"><span class="Style22">Pick the Nature of the Non 
            conformity<span class="Style21">(*)</span></span></div>
        </div></td>
      <td width="396"><select name="tmotifqual_id" class="Style19">
          <?php
do {  
?>
          <option value="<?php echo $row_Re_tmotifqual['tmotifqual_id']?>"><?php echo $row_Re_tmotifqual['tmotifqual_desc']?></option>
          <?php
} while ($row_Re_tmotifqual = mysqli_fetch_assoc($Re_tmotifqual));
  $rows = mysqli_num_rows($Re_tmotifqual);
  if($rows > 0) {
      mysqli_data_seek($Re_tmotifqual, 0);
	  $row_Re_tmotifqual = mysqli_fetch_assoc($Re_tmotifqual);
  }
?>
        </select></td>

    </tr>
    <tr valign="baseline"> 
      <td height="30" align="right" nowrap> <p align="right" class="Style22">Enter 
          the Lot number<span class="Style21">(*)</span></p></td>
      <td><p> 
          <input type="text" name="tnotqual_lot" value="" size="30">
        </p></td>

    </tr>
    <tr valign="baseline"> 
      <td height="30" align="right" nowrap><div align="center" class="Style22"> 
          <div align="center" class="Style22"> 
            <div align="right">Date of notification <span class="Style21">(*)</span></div>
          </div>
        </div></td>
      <td><input name="tnotqual_date" type="text" class="Style19" onChange="ControlFields(document.aic_form_buying_input.qual.tnotqual_date.value,'Date',1,document.aic_form_buying_input_qual.tnotqual_date)"  value=" " maxlength="10" readonly="true"> 
        <a href="#" onClick=" window.open('pop.php?frm=aic_form_buying_input_qual&ch=tnotqual_date','calendrier','width=350,height=160,scrollbars=0').focus();"><img src="petit_calendrier.gif" border="0"/></a> 
      </td>
    </tr>
      <td><div align="center" class="Style22"> 
          <div align="center" class="Style22"> 
            <div align="right">Comments<span class="Style21"></span></div>
          </div>
        </div></td>
      <td><div align="left"> 
          <textarea name="tnotqual_remark" cols="60"></textarea>
        </div></td>
    </tr>
    <tr valign="baseline"> 
      <td height="28" align="right" nowrap><div align="center" class="Style22"> 
          <div align="right">
            <input name="tnotqual_auth" type="hidden" value="">
            <input name="tnotqual_id" type="hidden" value="">
            <input name="tbuying_rowid" type="hidden" value="">
            <input name="tnotqual_status" type="hidden" value="1">
            <input name="tnotqual_dmod" type="hidden" class="Style19" value=" ">
          </div>
        </div></td>
      <td><!--DWLayoutEmptyCell-->&nbsp; </td>
    </tr>
    <tr valign="baseline"> 
      <td height="28" align="right" nowrap><div align="center" class="Style22"> 
          <div align="right"> </div>
        </div></td>
      <td><!--DWLayoutEmptyCell-->&nbsp;</td>
    </tr>

    <tr valign="baseline"> 
    </tr>
    <tr valign="baseline"> 
      <td height="40" align="right" nowrap><p align="center" class="Style22">&nbsp;</p></td>
      <td><p> 
          <input name="button" type="submit" class="Style1"  value="Insert"
	  >
        </p></td>
    </tr>
    <tr valign="baseline"> 
      <td height="35" align="right" nowrap><div align="center" class="Style24"></div></td>
      <td><!--DWLayoutEmptyCell-->&nbsp;</td>
      
    </tr>
    <tr> 
     
     
  </table>
  <p>
    <input type="hidden" name="MM_insert" value="aic_form_buying_input_qual">
  </p> 
</form> 
<p>&nbsp;</p> 

</body>
</html>
<?php

mysqli_free_result($Re_tmotifqual);

?>
<?php

function ControleInsert ($buying)
{

$message = "";
$message1="Obligatoire !";
$message2="est Numérique !";
$message20="Valeur Numérique ! ";
$message3="Mauvais format de date";
$message4="Valeur manquante !";

if ($buying['tnotqual_date'] =="")
$message .="Date de notification ".$message1." <BR>";
else
{
// Verifier ta date aussi
  $vardbid = GetSQLValueString($buying['tnotqual_date'] ,"date");
   $LaDate= explode("-", $vardbid);
  $annee = substr($vardbid,7,4);
  $mois = substr($vardbid,4,2);
  $jour = substr($vardbid,1,2);
  $ok=0;
  $longueur=strlen($vardbid) ;

  if (strlen($vardbid) == 12 ) {
     if (checkdate($mois,$jour,$annee))
     {
       $LaDate=formater($buying['tnotqual_date'], true);
     }
     else $message .="Date de notification ".$message3." <BR>";
   }
   else  $message .="  Date de notification ".$message3." <BR>";
 } 

if ($buying['tnotqual_lot'] =="")
$message .="Numero de lot ".$message1." <BR>" ; 

if ($buying['tmotifqual_id'] =="")
$message .="Motif ".$message1." <BR>";  

if ($message) {

echo "<b> Liste des erreurs rencontrées :</b><BR>$message";
echo "<b> Prière de Verifier les champs ci-dessus </b> <BR>";
// redisplay the insert form function
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

$pattern = "`([0-9]{2})/([0-9]{2})/([0-9]{4})`";
$replacement = "$3-$2-$1";

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
