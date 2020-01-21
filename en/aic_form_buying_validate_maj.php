<?php 
session_start();
$country=$_SESSION['COUNTRY'];
$rowid= $_GET["rowid"];
$usercountry=$_SESSION['username'];
// echo "country=$country <BR>";
// echo "$usercountry";
require_once('../Connections/cibproto.php');
//require_once ("utilang_en.php");

$updateSQL = "UPDATE tbuying_07 SET tbuying_status='1' 
 WHERE tbuying_rowid=$rowid and tbuying_ec_id = '{$country}' and 
 tbuying_status = '2'";
// echo "aic_form_buying_validate_maj, updateSQL=$updateSQL <BR>";
// echo " Validation effectuée ==> pour retourner cliquer sur : <A HREF='aic_form_buying_validateNew.php'> Retour</A> ";
//echo "<A HREF='aic_form_buying_validate_maj.php? ". "&connexion=$cibproto". "&country={$_SESSION['COUNTRY']}"
//			. "&titre=$titreURL'>
//			Valider <A/>\n";
 // mysqli_select_db($database_cibproto, $cibproto);

 $Result= mysqli_query($updateSQL, $cibproto) or die(mysqli_error());
// echo " XXX result=$Result<BR>";

// if ($Result < 0 ) {echo  " ";}
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Validation</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
<style type="text/css">
<!--
.Style1 {	font-size: 18px;
	color: #990000;
	font-weight: bold;
}
.Style31 {font-size: 12px}
.Style32 {color: #000000; font-size: 12px; }
.Style33 {color: #990000}
-->
</style>
<table width="963" border="1" cellpadding="2" cellspacing="2">
  <tr>
    <th width="126" scope="row"><div align="center" class="Style31">&nbsp; <a href="aic_form_buying_validate.php" title="Retour" class="Style9 Style19 Style33">Back</a></div></th>
    <td width="571"><div align="center" class="Style7 Style49"><span class="Style84"> <span class="Style1">Data validated</span></span></div></td>
    <td width="138"><div align="center" class="Style32">user :


 <?php
 echo "{$_SESSION['username']}"; ?>
  </div></td>
       <td width="92"><div align="center" class="Style32">Date :
            <?php 
      $today = date (" D j, M,Y  H:i:s");
      echo " $today "; ?>
    </div></td>
  </tr>
</table>



