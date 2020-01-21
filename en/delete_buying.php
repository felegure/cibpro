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
    <th width="126" scope="row"><div align="center" class="Style31">&nbsp; <a href="aic_form_buying_delete.php" title="Retour" class="Style9 Style19">Back</a></div></th>
    <td width="571"><div align="center" class="Style7 Style49"><span class="Style84"> <span class="Style1">Delete all the rows</span></span></div></td>
    <td width="138"><div align="center" class="Style32">user :
        <?php 
session_start();
$country=$_SESSION['COUNTRY'];
require_once('../Connections/cibproto.php');
 // $connexion= $_GET["connexion"];
 // $rowid= $_GET["connexion"];
 $usercountry=$_SESSION['username'];
 /*
 if ($totalRows_Re_buying_view_2==0) {
 
	 echo "<script language='JavaScript'>alert('No rows found !!')</script>"; 
	 require_once ("manage_form_ins_1.php");
	exit;
  }
 
 
 // a voir cela de près on pourrait mettre echo pour generer du java script
 // 
script type="text/javascript">
var x=window.confirm("CONFIRM THE DELETION - Are you sure ok?")
if (x)
window.alert("Good!")
else
window.alert("Too bad")
</script>
  */
 echo "$usercountry";
 $actionSQL = "Delete from tbuying_07 ='1' Where tbuying_ec_id = '{$country}' and 
 tbuying_status = '2'";

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
<td width="92"><div align="center" class="Style32"></div></td>
  </tr>
</table>