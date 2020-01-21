
<style type="text/css">
<!--
.Style1 {	font-size: 18px;
	color: #FF0000;
	font-weight: bold;
}
.Style31 {font-size: 12px}
.Style32 {color: #000000; font-size: 12px; }
.Style33 {color: #990000}
-->
</style>
<table width="963" border="1" cellpadding="2" cellspacing="2">
  <tr>
    <th width="126" scope="row"><div align="center" class="Style31">&nbsp; <a href="aic_form_buying_delete.php" title="Retour" class="Style9 Style19 Style33">Back</a></div></th>
    <td width="571"><div align="center" class="Style7 Style49"><span class="Style84"> <span class="Style1">Row Deleted</span></span></div></td>
    <td width="138"><div align="center" class="Style32">username :
            <?php 
// session_start();
// $country=$_SESSION['COUNTRY'];
require_once('../Connections/cibproto.php');
 $connexion= $_GET["rowid"];
 $rowid= $_GET["rowid"];
 // $usercountry=$_SESSION['username'];
// echo "XXXX connexion=$connexion <BR>";
// echo "XXXX rowid=$rowid <BR>";
// echo "XXXX $usercountry <BR>";
/*
modif apportée le 07 05 2009 pour enlver le message d'erreur session already started
 $actionSQL = "DELETE FROM tbuying_07 WHERE tbuying_rowid=$rowid and tbuying_ec_id = '{$country}' and 
tbuying_status = '2'";
*/
 $actionSQL = "DELETE FROM tbuying_07 WHERE tbuying_rowid=$rowid and 
tbuying_status = '2'";
// echo " valeur de actionSQL=$actionSQL <BR>";
 $Result= mysqli_query($actionSQL, $cibproto) or die(mysqli_error());
// echo " XXX result=$Result<BR>";

if ($Result < 0 ) {echo  " ";}
	
?>
    </div></td>
    <td width="92"><div align="center" class="Style32">Date :
            <?php 
      $today = date (" D j, M,Y  H:i:s");
      echo " $today "; ?>
    </div></td>
  </tr>
</table>



