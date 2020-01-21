
<head>
<title> Product Search results using a form</title>
<link rel="stylesheet" href="styles.css" type="text/css">
<style type="text/css">
<!--
.Style9 {font-size: 12px}
-->
</style>
</head>

<body>
<H1><center> Query Result </center></H1>
<P>
<TABLE BORDER=0 ALIGN=center WIDTH="100%">
	<TR CLASS=CG<TH> Search criteria</TH></TR>
</TABLE>
<?
	require "ConnectSQL.php");
	$product = $_POST['product'];
	 $yMin   = $_POST['yMin'];
	 $yMax   = $_POST['comb'];
	  
	  echo "<TABLE BORDER=4 CELLSPACING=2 CELLPADDING=2 ALIGN='CENTER'>
	  <TR CLASS=CG><TH>Product";
	  if ($comb == 'AND')
	  	echo "<TH> AND";
	  else
	  	echo "<TH> OR";
		echo "<TH COLSPAN=2> Selected Period";
		echo "</TR>;
		echo "<TR CLASS=A0><TD>$Product<TD><TD>$yMin<TD>$yMax</TR>";
		echo "</TABLE>";
		echo "<BR>";
		
		if ($comb == 'AND')
		   $requete = "SELECT * from tbuying_view"
		   . "WHERE tbuying_product_desc LIKE '$product' "
		   . "AND tbuying_dbid BETWEEN $yMin and $yMax"
		   . "order by tbuying_product_desc";
		else
		     $requete = "SELECT * from tbuying_view"
		   . "WHERE tbuying_product_desc LIKE '$product' "
		   . "order by tbuying_product_desc"; 
		 $connexion = mysqli_pconnect (SERVER, NAME, PASSWORD);
		 mysqli_select_db (BASE, $connexion);
		 $resultat = mysqli_query ($requete, $connexion);
		 
		 echo "<TABLE BORDER=0 ALIGN=center WIDTH=\"100%\">
		              <TR CLASS=CG><TH>Products</TH></TR>";
		 echo "</TABLE>";
		 echo "<TABLE BORDER=4 CELLSPACING=2 ALIGN='CENTER'>
		       <CAPTION CLASS=CG ALIGN=bottom> End of search</CAPTION>
			   	<TR CLASS=CG><TH>Ecowas country<TH>Product<TH>
				Concentration<TH>Dosage Form <th>Smalest Unit <Th>
				Packaging<th>Price per Unit <th>Total Cost <th>
                Qty of Unit <th>Presentation<th>Inco Term <th>
                Date of Bid <th>Currency<th>Source of funding <TH>
                Provider<th>Type of Supplier <th>Country<th>
                Tranport</tr>";
		

			
			
			
			
			
			
				
				
</body> 
</html>
