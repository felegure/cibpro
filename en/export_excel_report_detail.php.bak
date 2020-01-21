<?PHP
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=report_details.xls");

require_once('../Connections/cibproto.php');
$requete=$_GET['requete'];
$type=$_GET['type'];
$slashh='\\';
$blanco=' ';
$requete=str_replace($slashh,$blanco,$requete);
// echo "XXXXXXXXXXXXXXXXXX sans=$requete <BR>";

// echo " APRES La requete=$requete <BR>";
mysqli_select_db($database_cibproto, $cibproto);
$requete_1=mysqli_query($requete);
 // echo " type=$type <BR>";
 // echo " La requete=$requete <BR>";
 // echo " La requete_1=$requete_1 <BR>";
 // echo "XXXXXXXXXXXXXXX<BR>";
// on vérifie le contenu de  la requête ;

$nbr_row= mysqli_num_rows($requete_1);
// echo " XXXX nombre de rows=$nbr_row <BR>";
if (mysqli_num_rows($requete_1) ==0) 
    {   
	// si elle est vide, on en informe l'utilisateur à l'aide d'un Javascript 
		print "<script> alert('No rows found !')</script>";
	} 
	else 
	{
	
	  if ($type==1) {
	  // construction du tableau HTML
	   print '<center><strong>List of suppliers with contacts ';
       
	   }
	   else {
	  // construction du tableau HTML
	   print '<center><strong>List of manufacturers with contacts ';
       }
	   print '<table border=1>	
		 <TD><center><strong> Name</TD><TD><center><strong>
		 Country </TD><TD><center><strong>Contact</TD><TD><center><strong>
		 Adress</TD><TD><center><strong>Postal code</TD><TD><center><strong>Telephone 1</TD>
		 <TD><center><strong>Telephone 2</TD><TD><center><strong>Fax</TD><TD><center><strong>email adress </TD><TD><center><strong>Website</TD>
		 <TD><center><strong>Comments</TD></TR>';

	// lecture du contenu de la requête avec 2 boucles imbriquées; par ligne et par colonne
	for ($ligne=0 ; $ligne<mysqli_num_rows($requete_1);$ligne++)
	 {
		 for ($colonne = 0;$colonne < 11 ; $colonne++)  
			  {
			   print '<TD>' .mysqli_result($requete_1 , $ligne,$colonne).  '</TD>';   
			  }
	print '</TR>';
	}
print '</TABLE>';
}
/*
if (mysqli_num_rows($requete_1) >0) 
	{   
	print "<script> alert('La table est bien mise à jour !')</script>";
	} 

*/
	?>

<title>Export excel - export_excel_report_detail.php</title>
