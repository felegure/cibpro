<?php
require_once('../Connections/cibproto.php'); 
mysqli_select_db( $cibproto, $database_cibproto);

$query = "SELECT * FROM tcur_par
WHERE tcur_par_id = 'USD' 
and tcur_par_status = '1' ";
//exécution de la requête et récupération du nombre de résultats

$result = mysqli_query($cibproto, $query);
$affected_rows = mysqli_num_rows($result);

//S'il y a exactement un résultat, l'utilisateur est authentifié, sinon, on l'empêche d'entrer
if($affected_rows == 1) {
$pointeur=mysqli_fetch_object ($result); 
$TCURPAR_DOL= $pointeur->tcur_par_id;
$TCURVAL_DOL= $pointeur->tcur_par_val;
}

$query = "SELECT * FROM tcur_par
WHERE tcur_par_id = 'EUR' 
and tcur_par_status = '1' ";
//exécution de la requête et récupération du nombre de résultats

$result = mysqli_query($cibproto, $query);
$affected_rows = mysqli_num_rows($result);

//S'il y a exactement un résultat, l'utilisateur est authentifié, sinon, on l'empêche d'entrer
if($affected_rows == 1) {
$pointeur=mysqli_fetch_object ($result); 
$TCURPAR_EUR= $pointeur->tcur_par_id;
$TCURVAL_EUR= $pointeur->tcur_par_val;
}
$_POST['tbuying_cur_dol']=$TCURVAL_DOL;
$_POST['tbuying_cur_eur']=$TCURVAL_EUR;
 /*
 echo "XXXTCURPAR_DOL=$TCURPAR_DOL<BR>";
 echo "XXXTCURVAL_DOL=$TCURVAL_DOL<BR>";

 echo "XXXTCURPAR_EUR=$TCURPAR_EUR<BR>";
 echo "XXXTCURVAL_EUR=$TCURVAL_EUR<BR>";
*/
?>

