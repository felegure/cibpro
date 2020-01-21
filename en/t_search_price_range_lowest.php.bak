<?php require_once('../Connections/cibproto.php'); ?>
<?php
mysqli_select_db($database_cibproto, $cibproto);
$query_Re_country = "SELECT tcountry_id, tcountry_desc FROM tcountry";
$Re_country = mysqli_query($query_Re_country, $cibproto) or die(mysqli_error());
$row_Re_country = mysqli_fetch_assoc($Re_country);
$totalRows_Re_country = mysqli_num_rows($Re_country);

mysqli_select_db($database_cibproto, $cibproto);
$query_Re_categ = "SELECT tcategory.tcateg_id, tcategory.tcateg_desc FROM tcategory ORDER BY tcategory.tcateg_desc";
$Re_categ = mysqli_query($query_Re_categ, $cibproto) or die(mysqli_error());
$row_Re_categ = mysqli_fetch_assoc($Re_categ);
$totalRows_Re_categ = mysqli_num_rows($Re_categ);

mysqli_select_db($database_cibproto, $cibproto);
$query_Re_product = "SELECT tproduct.tproduct_id, tproduct.tproduct_desc FROM tproduct ORDER BY tproduct.tproduct_desc";
$Re_product = mysqli_query($query_Re_product, $cibproto) or die(mysqli_error());
$row_Re_product = mysqli_fetch_assoc($Re_product);
$totalRows_Re_product = mysqli_num_rows($Re_product);

mysqli_select_db($database_cibproto, $cibproto);
$query_Re_currency = "SELECT tcur.tcur_id, tcur.tcur_desc FROM tcur ORDER BY tcur.tcur_desc";
$Re_currency = mysqli_query($query_Re_currency, $cibproto) or die(mysqli_error());
$row_Re_currency = mysqli_fetch_assoc($Re_currency);
$totalRows_Re_currency = mysqli_num_rows($Re_currency);

mysqli_select_db($database_cibproto, $cibproto);
$query_Re_Ecowas = "SELECT tecowas.tecowas_id, tecowas.tecowas_desc FROM tecowas ORDER BY tecowas.tecowas_desc";
$Re_Ecowas = mysqli_query($query_Re_Ecowas, $cibproto) or die(mysqli_error());
$row_Re_Ecowas = mysqli_fetch_assoc($Re_Ecowas);
$totalRows_Re_Ecowas = mysqli_num_rows($Re_Ecowas);

mysqli_select_db($database_cibproto, $cibproto);
$query_Re_supplier = "SELECT tprovider.tprov_id, tprovider.tprov_desc FROM tprovider ORDER BY tprov_desc";
$Re_supplier = mysqli_query($query_Re_supplier, $cibproto) or die(mysqli_error());
$row_Re_supplier = mysqli_fetch_assoc($Re_supplier);
$totalRows_Re_supplier = mysqli_num_rows($Re_supplier);
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Product Search results using a form</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body bgcolor="#CCCCCC" text="#000066">
<div align="center">
<div align="left"><a href="pickareport.php" title="Back">Back</a>
</div>
<p align="center"><strong><font size="4"><strong><font size="4">Search Form</font></strong></font></strong></p>

  <FORM NAME="fcrit1" ACTION="vlPriceRangeLow.php" METHOD=POST>
    <p align="center"><strong>Please enter the parameters:</strong></p>
    <table border="1" align="center" cellpadding="2" cellspacing="2">
    <tr>
      <td width="237">Country</td>
      <td width="218" colspan="2"><select name="pEcow">
        <option value="*">All</option>
        <?php
do {  
?>
        <option value="<?php echo $row_Re_Ecowas['tecowas_id']?>"><?php echo $row_Re_Ecowas['tecowas_desc']?></option>
        <?php
} while ($row_Re_Ecowas = mysqli_fetch_assoc($Re_Ecowas));
  $rows = mysqli_num_rows($Re_Ecowas);
  if($rows > 0) {
      mysqli_data_seek($Re_Ecowas, 0);
	  $row_Re_Ecowas = mysqli_fetch_assoc($Re_Ecowas);
  }
?>
      </select></td>
    </tr>
    <tr>
      <td>Category</td>
      <td><select name="pCate">
        <option value="*">All</option>
        <?php
do {  
?>
        <option value="<?php echo $row_Re_categ['tcateg_id']?>"><?php echo $row_Re_categ['tcateg_desc']?></option>
        <?php
} while ($row_Re_categ = mysqli_fetch_assoc($Re_categ));
  $rows = mysqli_num_rows($Re_categ);
  if($rows > 0) {
      mysqli_data_seek($Re_categ, 0);
	  $row_Re_categ = mysqli_fetch_assoc($Re_categ);
  }
?>
      </select></td>
    </tr>
    <tr>
      <td>Product</td>
      <td><select name="pProd">
        <option value="*">All</option>
        <?php
do {  
?>
        <option value="<?php echo $row_Re_product['tproduct_id']?>"><?php echo $row_Re_product['tproduct_desc']?></option>
        <?php
} while ($row_Re_product = mysqli_fetch_assoc($Re_product));
  $rows = mysqli_num_rows($Re_product);
  if($rows > 0) {
      mysqli_data_seek($Re_product, 0);
	  $row_Re_product = mysqli_fetch_assoc($Re_product);
  }
?>
      </select></td>
    </tr>
	
	<td>Supplier</td>
        <td><select name="pProv">
        <option value="*">All</option>
        <?php
do {  
?>
        <option value="<?php echo $row_Re_supplier['tprov_id']?>"><?php echo $row_Re_supplier['tprov_desc']?></option>
        <?php
} while ($row_Re_supplier = mysqli_fetch_assoc($Re_supplier));
  $rows = mysqli_num_rows($Re_supplier);
  if($rows > 0) {
      mysqli_data_seek($Re_supplier, 0);
	  $row_Re_supplier = mysqli_fetch_assoc($Re_supplier);
  }
?>
      </select></td>
	
    
	<tr>
	<td>PRICE</td>
	
      <td><p> minimum&nbsp;	  
        <input name="pMini" type="text" value="0">
        &nbsp;
	  <p>maximum  
	    <input name="pMaxi" type="text" value="99999"></td>
	  
    </tr>
    <tr>
      <td>Currency</td>
      <td><select name="pCure">
        <option value="*">All</option>
        <?php
do {  
?>
        <option value="<?php echo $row_Re_currency['tcur_id']?>"><?php echo $row_Re_currency['tcur_desc']?></option>
        <?php
} while ($row_Re_currency = mysqli_fetch_assoc($Re_currency));
  $rows = mysqli_num_rows($Re_currency);
  if($rows > 0) {
      mysqli_data_seek($Re_currency, 0);
	  $row_Re_currency = mysqli_fetch_assoc($Re_currency);
  }
?>
      </select></td>
    </tr>
    <tr>
	<td>Date of Bid</td>
	
      <td><p>From&nbsp;
          <input name="pDsta" type="text" value="01/01/2005" size="10" maxlength="10">
      </p>
          <p> &nbsp; To &nbsp;&nbsp;
            <input name="pDend" type="text" value="31/12/2008" size="10" maxlength="10"></p></td>
      
    </tr>
  </table>
  
    <p align="center"> 
 	  <input name="SUBMIT" type=SUBMIT value='Submit'> 
    &nbsp; </p>  
  <p>&nbsp;</p>
</form>
<p>&nbsp;</p>
</body>
</div>
</html>
<?php
mysqli_free_result($Re_country);

mysqli_free_result($Re_categ);

mysqli_free_result($Re_product);

mysqli_free_result($Re_currency);

mysqli_free_result($Re_Ecowas);
?>
