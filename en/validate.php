<?php
session_start();
// $db_user = 'root';
// $db_pass = '';

//Connection � mysql et s�lection de la base de donn�es
// $connection = mysqli_connect('localhost', $db_user, $db_pass) or die(mysqli_error());
// mysqli_select_db('cibase', $connection) or die(mysqli_error());

require ("connect.php");

$connection = mysqli_connect(SERVER, USER, PASSWORD);

 if (!$connection) {
	
		echo "Sorry, the connexion to the " . SERVEUR . "failed \n";
		exit;
 } else 

 if (!mysqli_select_db($connection,BASE )) {
		echo "Sorry, Access to " .  BASE . " failed \n";
        exit;    
 } 


$user_name = $_POST['user_name'];
$password = $_POST['password']; 
$pAccess = "";

$query = "SELECT * FROM tcur_par
WHERE tcur_par_id = 'USD' 
and tcur_par_status = '1' ";
//ex�cution de la requ�te et r�cup�ration du nombre de r�sultats


$result = mysqli_query( $connection, $query,);
$affected_rows = mysqli_num_rows($result);

//S'il y a exactement un r�sultat, l'utilisateur est authentifi�, sinon, on l'emp�che d'entrer
if($affected_rows == 1) {
$pointeur=mysqli_fetch_object ($result); 
$_SESSION['TCURPAR'] = $pointeur->tcur_par_id;
$_SESSION['TCURVAL'] = $pointeur->tcur_par_val;
}


//Pr�paration de la requ�te
$query1 = "SELECT * FROM taccess 
WHERE taccess_user_name='$user_name' AND taccess_user_pwd='$password'
and taccess_typuser_id = 'ALL' 
and taccess_status = '1' ";
//ex�cution de la requ�te et r�cup�ration du nombre de r�sultats

 $result = mysqli_query( $connection,$query1);
// $result = mysqli_store_result($query1, $connection);

$affected_rows = mysqli_num_rows($result);

//S'il y a exactement un r�sultat, l'utilisateur est authentifi�, sinon, on l'emp�che d'entrer
if($affected_rows == 1) {
$pAccess='1';
$pointeur=mysqli_fetch_object ($result); 
$_SESSION['username'] = $user_name; 
$_SESSION['Access'] = $pAccess;
$_SESSION['COUNTRY'] = $pointeur->taccess_ecowas_id;
$_SESSION['STATUS'] = $pointeur->taccess_status;

require_once ("affiche_maincib_1.php"); 
}
$query2 = "SELECT * FROM taccess 
WHERE taccess_user_name='$user_name' AND taccess_user_pwd='$password'
and taccess_typuser_id = 'VIE' 
and taccess_status = '1' ";

//ex�cution de la requ�te et r�cup�ration du nombre de r�sultats
$result = mysqli_query($connection, $query2);
$affected_rows = mysqli_num_rows($result);

//S'il y a exactement un r�sultat, l'utilisateur est authentifi�, sinon, on l'emp�che d'entrer
if($affected_rows == 1) {
$pAccess='2';
$pointeur=mysqli_fetch_object ($result); 
$_SESSION['username'] = $user_name; 
$_SESSION['Access'] = $pAccess;
$_SESSION['COUNTRY'] = $pointeur->taccess_ecowas_id;
$_SESSION['STATUS'] = $pointeur->taccess_status;
require_once ("affiche_maincib_1.php"); 
}

$query3 = "SELECT * FROM taccess 
WHERE taccess_user_name='$user_name' AND taccess_user_pwd='$password'
and taccess_typuser_id = 'INS' 
and taccess_status = '1' ";

//ex�cution de la requ�te et r�cup�ration du nombre de r�sultats
$result = mysqli_query($connection,$query3);
$affected_rows = mysqli_num_rows($result);

//S'il y a exactement un r�sultat, l'utilisateur est authentifi�, sinon, on l'emp�che d'entrer
if($affected_rows == 1) {
$pAccess='3';

$pointeur=mysqli_fetch_object ($result); 


//On ajoute l'utilisateur aux variables de session
$_SESSION['username'] = $user_name; 
$_SESSION['Access'] = $pAccess;

$_SESSION['COUNTRY'] = $pointeur->taccess_ecowas_id;
$_SESSION['STATUS'] = $pointeur->taccess_status;
/
require_once ("affiche_maincib_1.php"); 
}

$query4 = "SELECT * FROM taccess 
WHERE taccess_user_name='$user_name' AND taccess_user_pwd='$password'
and taccess_typuser_id = 'VAL' 
and taccess_status = '1' ";
//ex�cution de la requ�te et r�cup�ration du nombre de r�sultats
$result = mysqli_query($connection, $query4);
$affected_rows = mysqli_num_rows($result);

//S'il y a exactement un r�sultat, l'utilisateur est authentifi�, sinon, on l'emp�che d'entrer
if($affected_rows == 1) {
$pAccess='4';

$pointeur=mysqli_fetch_object ($result); 

$_SESSION['username'] = $user_name; 
$_SESSION['Access'] = $pAccess;
$_SESSION['COUNTRY'] = $pointeur->taccess_ecowas_id;
$_SESSION['ROWID']=1000;

require_once ("affiche_maincib_1.php"); 
}

//On ajoute l'utilisateur aux variables de session
//Pr�paration de la requ�te

$query5 = "SELECT * FROM taccess 
WHERE taccess_user_name='$user_name' AND taccess_user_pwd='$password'
and taccess_typuser_id = 'ADM' 
and taccess_status = '1' ";
 
//ex�cution de la requ�te et r�cup�ration du nombre de r�sultats
$result = mysqli_query($connection, $query5);
$affected_rows = mysqli_num_rows($result);

//S'il y a exactement un r�sultat, l'utilisateur est authentifi�, sinon, on l'emp�che d'entrer
if($affected_rows == 1) {
$pAccess='5';
$pointeur=mysqli_fetch_object ($result); 
$_SESSION['username'] = $user_name; 
$_SESSION['Access'] = $pAccess;
$_SESSION['COUNTRY'] = $pointeur->taccess_ecowas_id;
$_SESSION['STATUS'] = $pointeur->taccess_status;
$_SESSION['NOMSESSION'] = session_name();
require_once ("affiche_maincib_1.php");
}

if ($pAccess == '' ) {
$_SESSION['ERROR_MSG'] = "Access Forbiden  - Please check your user name & password";
echo "<script language='JavaScript'>alert('Please check your user name and password !' )</script>"; 
require_once ("access.php");
exit;
}
?>