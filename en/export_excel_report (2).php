<?PHP
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=cib_report.xls");

require_once('../Connections/cibproto.php');
$requete=$_GET['requete'];
$choix=$_GET['choix'];
$cur=$_GET['cur'];

$slashh='\\';
$blanco=' ';
$requete=str_replace($slashh,$blanco,$requete);
 echo "XXXXXXXXXXXXXXXXXX sans=$requete <BR>";

 echo " APRES La requete=$requete <BR>";
mysqli_select_db($database_cibproto, $cibproto);
$requete_1=mysqli_query($requete);
 echo "choix=$choix <BR>";
 echo "cur=$cur <BR>";
// echo " La requete=$requete <BR>";
// echo " La requete_1=$requete_1 <BR>";
// echo "XXXXXXXXXXXXXXX<BR>";
// on vérifie le contenu de  la requête ;

$nbr_row= mysqli_num_rows($requete_1);
// echo " XXXX nombre de rows=$nbr_row <BR>";
if (mysqli_num_rows($requete_1) ==0) 
    {   
	// si elle est vide, on en informe l'utilisateur à l'aide d'un Javascript 
		print "<script> alert('La requête n\'a pas abouti !')</script>";
	} 
	else 
	{
		//      echo "choix avant if choix=$choix <BR>";
			if ($choix!=0) {  			  
			 if ($choix==1) {
			 print '<center><strong>Liste des produits par fournisseurs avec le prix unitaire le plus bas pour une période donnée ';
			  }
			  elseif ($choix==2) {
			  print '<center><strong>Liste des produits par fournisseurs et fabricants ';
			  }
			  if ($cur=="'$'") {
			  print '<table border=1>	
		      <TD><center><strong>Produit</TD><TD><center><strong>Présentation</TD><TD><center><strong>
		      Fournisseur</TD><TD><center><strong>
		      Pays Fournisseur</TD><TD><center><strong>Fabricant</TD><TD><center><strong>
		      Pays Fabricant</TD><TD><center><strong>Taille du conditionnement</TD><TD><center><strong>Quantité du conditionnement</TD>
		      <TD><center><strong>Prix du conditionnement ($)</TD><TD><center><strong>Cout total($) </TD><TD><center><strong>Incoterme</TD><TD><center><strong>Prix unitaire($) </TD>
			  <TD><center><strong>Date Ouverture des plis</TD><TD><center><strong>Pays bénéficiaire</TD><TD><center><strong> Mode de transport</TD>
			  <TD><center><strong> Délai en jours</TD></TR>';
              }
			  else { 
			//  echo "Euro currency=$cur <BR>";
			  print '<table border=1>	
		      <TD><center><strong>Produit</TD><TD><center><strong>Présentation</TD><TD><center><strong>
		      Fournisseur</TD><TD><center><strong>
		      Pays Fournisseur</TD><TD><center><strong>Fabricant</TD>
			  <TD><center><strong>Pays Fabricant</TD><TD><center><strong>Conditionnement</TD>
			  <TD><center><strong>Taille du conditionnement</TD>
			  <TD><center><strong>Quantité du conditionnement</TD><TD><center><strong>Prix du conditionnement (€)</TD>
			  <TD><center><strong>Cout total(€) </TD><TD><center><strong>Incoterme</TD><TD><center><strong>Prix unitaire(€) </TD>
			  <TD><center><strong>Quantité (plus petite unité)</TD><TD><center><strong>Date Ouverture des plis</TD>
			  <TD><center><strong>Pays bénéficiaire</TD>
			  <TD><center><strong> Mode de transport</TD><TD><center><strong> Délai en jours</TD>
			  <TD><center><strong> Commentaire</TD></TR>';
			  }
		$colmax= 16;
		}
		else { // choix==0
			 print '<center><strong>Liste des documents en attente ';
			 print '<table border=1>	
		      <TD><center><strong>Produit</TD><TD><center><strong>Présentation</TD><TD><center><strong>Conditionnement</TD>
			  <TD><center><strong>Prix par conditionnement</TD><TD><center><strong>Devise</TD>
			  <TD><center><strong>	Taille du conditionnement</TD>
			  <TD><center><strong>Quantité du conditionnement</TD><TD><center><strong>Cout total</TD><TD><center><strong>Devise</TD>
              <TD><center><strong>Incoterme</TD><TD><center><strong>Prix unitaire (ppu)</TD><TD><center><strong>Devise</TD>
			  <TD><center><strong>Quantité (ppu)</TD> <TD><center><strong>Date Ouverture des plis</TD>
			  <TD><center><strong>Source de financement</TD><TD><center><strong>Fournisseur</TD>
			  <TD><center><strong>Pays Fournisseur</TD>
			  <TD><center><strong>Type de fournisseur</TD><TD><center><strong>Fabricant</TD>
			  <TD><center><strong>Pays Fabricant</TD>
			  <TD><center><strong>Mode de transport</TD><TD><center><strong>Pays bénéficiaire</TD>
			  <TD><center><strong> Délai en jours</TD> <TD><center><strong> Commentaires</TD>
			  </TR>';
			$colmax= 24;  
		}
	// lecture du contenu de la requête avec 2 boucles imbriquées; par ligne et par colonne
	
	for ($ligne=0 ; $ligne<mysqli_num_rows($requete_1);$ligne++)
	 {
		 for ($colonne = 0;$colonne < $colmax ; $colonne++)  
			  {
			   print '<TD>' .mysqli_result($requete_1 , $ligne,$colonne).  '</TD>';   
			  }
	print '</TR>';
	}
print '</TABLE>';
}
if (mysqli_num_rows($requete_1) >0) 
	{   
	print "<script> alert('La table est bien mise à jour !')</script>";
	} 

	?>

<title>Export excel - export_excel_report.php</title>
