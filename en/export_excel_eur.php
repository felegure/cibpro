<title>export_excel_eur</title><?PHP
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=report_cib.xls");

require_once('../Connections/cibproto.php');
$requete=$_GET['requete'];
$requete_1=mysqli_query($requete);

 echo " La requete=$requete <BR>";
 echo " La requete_1=$requete_1 <BR>";
 echo "XXXXXXXXXXXXXXX<BR>";
 
// on v�rifie le contenu de  la requ�te ;

$nbr_row= mysqli_num_rows($requete_1);
  echo " XXXX nombre de rows=$nbr_row <BR>";
if (mysqli_num_rows($requete_1) ==0) 
    {   
	// si elle est vide, on en informe l'utilisateur � l'aide d'un Javascript 
		print "<script> alert('La requ�te n\'a pas abouti !')</script>";
	} 
	else 
	{
	// construction du tableau HTML
	print '<center><strong>List of products by supplier with lowest prices ';
	print '<table border=1>	
		 <TD><center><strong>Product</TD><TD><center><strong>Presentation</TD><TD><center><strong>
		 Supplier</TD><TD><center><strong>
		 Country of Supplier</TD><TD><center><strong>Manufacturers</TD><TD><center><strong>
		 Country of Manufacturers</TD><TD><center><strong>Pack size</TD><TD><center><strong>Quantity</TD>
		 <TD><center><strong>Price per pack size(�)</TD><TD><center><strong>Total cost(�) </TD><TD><center><strong>Incoterm</TD><TD><center><strong>Price per smallest unit(�) </TD><TD><center><strong>
		 Date of bid opening</TD><TD><center><strong>
		 Supplied to</TD> <center><strong> Lead time</TD></TR><TR>';
  
	// lecture du contenu de la requ�te avec 2 boucles imbriqu�es; par ligne et par colonne
	for ($ligne=0 ; $ligne<mysqli_num_rows($requete_1);$ligne++)
	 {
		 for ($colonne = 0;$colonne < 14 ; $colonne++)  
			  {
			   print '<TD>' .mysqli_result($requete_1 , $ligne,$colonne).  '</TD>';   
			  }
	print '</TR>';
	}
print '</TABLE>';
}
if (mysqli_num_rows($requete_1) >0) 
	{   
	print "<script> alert('La table est bien mise � jour !')</script>";
	} 


	?>


