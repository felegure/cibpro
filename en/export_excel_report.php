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
// echo " APRES La requete=$requete <BR>";
mysqli_select_db($database_cibproto, $cibproto);
$requete_1=mysqli_query($requete);
 //echo "choix=$choix <BR>";
 //echo "cur=$cur <BR>";
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
		//      echo "choix avant if choix=$choix <BR>";
			if ($choix!=0) {  			  
			 if ($choix==1) {
			  print '<center><strong>List of products by supplier with lowest prices  ';
			  }
			  elseif ($choix==2) {
						  print '<center><strong>List of products per suppliers and manufacturers per period  ';
			  }
			  if ($cur=="'$'" || $cur=="\'$\'") {
			 // echo "encore cur=$cur <BR>";
			  print '<table border=1>	
		      <TD><center><strong>Product</TD><TD><center><strong>Presentation</TD><TD><center><strong>
		      Supplier</TD><TD><center><strong>
		      Country of Supplier</TD><TD><center><strong>Manufacturer</TD><TD><center><strong>
		      Country of Manufacturer</TD><TD><center><strong>Pack size</TD><TD><center><strong>Price per pack ($)</TD>
			  <TD><center><strong>Quantity</TD>
		      <TD><center><strong>Total cost($)</TD><TD><center><strong>Inco term</TD><TD><center><strong>Unit price($) (smallest unit)  </TD>
			  <TD><center><strong>Quantity (smallest unit)</TD><TD><center><strong>Date of bid opening/Date of reception</TD><TD><center><strong>Supplied to</TD><TD><center><strong>Transportation method</TD>
			  <TD><center><strong> Lead time (days)</TD><TD><center><strong> Comments</TD></TR>';
              }
			     if ($cur=="'E'")
			  // else
			     { 
			//  echo "Euro currency=$cur <BR>";
			  print '<table border=1>	
		      <TD><center><strong>Product</TD><TD><center><strong>Presentation</TD><TD><center><strong>
		       Supplier</TD><TD><center><strong>
		      Country of Supplier</TD><TD><center><strong>Manufacturer</TD><TD><center><strong>
		      Country of Manufacturer</TD><TD><center><strong>Pack size</TD><TD><center><strong>Price per pack (€)</TD>
			  <TD><center><strong>Quantity</TD><TD><center><strong>Total cost(€)</TD><TD><center><strong>Inco term</TD><TD><center><strong>Unit price(€)(smallest unit)  </TD>
			  <TD><center><strong>Quantity (smallest unit)</TD><TD><center><strong>Date of bid opening/Date of reception</TD><TD><center><strong>Supplied to</TD><TD><center><strong>Transportation method</TD>
			  <TD><center><strong> Lead time (days)</TD><TD><center><strong> Comments</TD></TR>';

			  }
		$colmax= 18;
		}
		else { // choix==0
			 print '<center><strong>List of pending documents ';
			 print '<table border=1>	
		      <TD><center><strong>Product</TD><TD><center><strong>Presentation</TD><TD><center><strong>Packaging type</TD>
			  <TD><center><strong>Price per pack</TD><TD><center><strong>Currency</TD>
			  <TD><center><strong>	Pack size</TD>
			  <TD><center><strong>Quantity</TD><TD><center><strong>Total cost</TD><TD><center><strong>Currenc</TD>
              <TD><center><strong>Inco term</TD><TD><center><strong>Unit price(smallest unit)</TD><TD><center><strong>Currency</TD>
			  <TD><center><strong>Quantity (smallest unit)</TD> <TD><center><strong>Date of bid opening/Date of reception</TD>
			  <TD><center><strong>Source of funding</TD><TD><center><strong>Supplier</TD>
			  <TD><center><strong>Country of supplier</TD>
			  <TD><center><strong>Type of supplier</TD><TD><center><strong>Manufacturer</TD>
			  <TD><center><strong>Country of manufacturer</TD>
			  <TD><center><strong>Transportation method</TD><TD><center><strong>Supplied to</TD>
			  <TD><center><strong> Lead time (days)</TD> <TD><center><strong> Comments</TD>
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
