<?PHP
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=report_cib.xls");

require_once('../Connections/cibproto.php');
$requete=$_GET['requete'];
$requete_1=mysqli_query($requete);
/*
 echo " La requete=$requete <BR>";
 echo " La requete_1=$requete_1 <BR>";
 echo "XXXXXXXXXXXXXXX<BR>";
 */
// on vérifie le contenu de  la requête ;

$nbr_row= mysqli_num_rows($requete_1);
//  echo " XXXX nombre de rows=$nbr_row <BR>";
if (mysqli_num_rows($requete_1) ==0) 
    {   
	// si elle est vide, on en informe l'utilisateur à l'aide d'un Javascript 
		print "<script> alert('La requête n\'a pas abouti !')</script>";
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
		 <TD><center><strong>Price per pack size ($)</TD><TD><center><strong>Total cost($) </TD><TD><center><strong>Incoterm</TD><TD><center><strong>Price per smallest unit ($) </TD><TD><center><strong>
		 Date of bid opening</TD><TD><center><strong>
		 Supplied to</TD> <center><strong> Lead time</TD></TR><TR>';
 
  if (mysqli_num_rows($requete_1) ==0) 
    {   
	// si elle est vide, on en informe l'utilisateur à l'aide d'un Javascript 
		print "<script> alert('La requête n\'a pas abouti !')</script>";
	} 
	else 
	{
		//      echo "choix avant if choix=$choix <BR>";
			 			  
			  if ($choix==1) {
			  print '<center><strong>Liste des produits par fournisseurs avec le prix unitaire le plus bas pour une période donnée ';
			  }
			  elseif ($choix==2) {
			  print '<center><strong>Liste des produits par fournisseurs et fabricants ';
			  }
			  if ($cur=="'$'") {
			  print '<table border=1>	
		      <TD><center><strong>Product</TD><TD><center><strong>Presentation</TD><TD><center><strong>
			  Supplier</TD><TD><center><strong>
		      Country of Supplier</TD><TD><center><strong>Manufacturers</TD><TD><center><strong>
		      Country of Manufacturers</TD><TD><center><strong>Pack size</TD><TD><center><strong>Quantity</TD>
		      <TD><center><strong>Price per pack size ($)</TD><TD><center><strong>Total cost($) </TD><TD><center><strong>Incoterm</TD><TD><center><strong>Price per smallest unit ($) </TD><TD><center><strong>
		      Date of bid opening</TD><TD><center><strong>
		      Supplied to</TD> <center><strong> Lead time</TD></TR><TR>';
              }
			  else { 
			//  echo "Euro currency=$cur <BR>";
			  print '<table border=1>	
		      <TD><center><strong>Produit</TD><TD><center><strong>Présentation</TD><TD><center><strong>
		      Fournisseur</TD><TD><center><strong>
		      Pays Fournisseur</TD><TD><center><strong>Fabricant</TD><TD><center><strong>
		      Pays Fabricant</TD><TD><center><strong>Taille du conditionnement</TD><TD><center><strong>Quantité du conditionnement</TD>
		      <TD><center><strong>Prix du conditionnement (€)</TD><TD><center><strong>Cout total(€) </TD><TD><center><strong>Incoterme</TD><TD><center><strong>Prix unitaire(€) </TD><TD><center><strong>
		      Date Ouverture des plis</TD><TD><center><strong>Pays bénéficiaire</TD><TD><center><strong> Délai en jours</TD></TR>';
			  }
	// lecture du contenu de la requête avec 2 boucles imbriquées; par ligne et par colonne
		$colmax= 15;
	for ($ligne=0 ; $ligne<mysqli_num_rows($requete_1);$ligne++)
	 {
		 for ($colonne = 0;$colonne < $colmax ; $colonne++)  
			  {
			   print '<TD>' .mysqli_result($requete_1 , $ligne,$colonne).  '</TD>';   
			  }
	print '</TR>';
	}
print '</TABLE>';
if (mysqli_num_rows($requete_1) >0) 
	{   
	print "<script> alert('La table est bien mise à jour !')</script>";
	} 


	?>


