<style type="text/css">
<!--
.Style1 {font-size: 18px;
	color: #0000FF;
	font-weight: bold;
}
.Style31 {font-size: 12px}
.Style32 {color: #000000; font-size: 12px; }
-->
</style>
<table width="963" border="1" cellpadding="2" cellspacing="2">
  <tr>
    <th width="126" scope="row"><div align="center" class="Style31">&nbsp; <a href="aic_form_buying_validate.php" title="Retour" class="Style9 Style19">Back</a></div></th>
    <td width="571"><div align="center" class="Style7 Style49"><span class="Style84"> <span class="Style1">All data have been validated</span></span></div></td>
    <td width="138"><div align="center" class="Style32">user :
        <?php 
session_start();
$country=$_SESSION['COUNTRY'];
require_once('../Connections/cibproto.php');
// $connexion= $_GET["connexion"];
// $rowid= $_GET["connexion"];
 $usercountry=$_SESSION['username'];
 
 echo "$usercountry";
 $updateSQL = "UPDATE tbuying_07 set tbuying_status='1' Where tbuying_ec_id = '{$country}' and 
tbuying_status = '2'";
// echo "aic_form_buying_validate_maj, updateSQL=$updateSQL <BR>";
// echo " Validation effectu&eacute;e ==> pour retourner cliquer sur : <A HREF='aic_form_buying_validateNew.php'> Retour</A> ";
//echo "<A HREF='aic_form_buying_validate_maj.php? ". "&connexion=$cibproto". "&country={$_SESSION['COUNTRY']}"
//			. "&titre=$titreURL'>
//			Valider <A/>\n";
 // mysqli_select_db($database_cibproto, $cibproto);

 $Result= mysqli_query($updateSQL, $cibproto) or die(mysqli_error());
// echo " XXX result=$Result<BR>";

if ($Result < 0 ) {echo  " ";}
/*
else {
 $i=1;
 while ($i <= 1000)
 {
  $i++;
 }

}
*/

 //exit ;

?>
    </div></td>
    <td width="92"><div align="center" class="Style32">Date :
            <?php 
      $today = date (" D j, M,Y  H:i:s");
      echo " $today "; ?>
    </div></td>
  </tr>
</table>
<td width="92"><div align="center" class="Style32"></div></td>
  </tr>
</table>