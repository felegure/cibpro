<?php require_once('../Connections/cibproto.php'); 
require_once('./selectedbases.php');
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Product Search results using a form</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body bgcolor="#CCCCCC" text="#000066">
<div align="center">
<div align="left"><a href="pickareport_cons.php" title="Back"><font color="#990000">Back</font></a></div>
<FORM NAME="fcrit1" ACTION="aic_list_qual_probl_c.php" METHOD=POST>
  <p align="center"><strong>Please enter the parameters:</strong></p>
    
  <font color="#990000">Quality</font> 
  <table border="1" align="center" cellpadding="2" cellspacing="2">
         
      <td width="237">Country</td>
      <td width="218" colspan="2"><p> 
          <select name="pEcow[]" multiple>
            <option value="*">All</option>
            <?php
do {  
?>
            <option value="<?php echo $row_Re_ecowas['tecowas_id']?>"><?php echo $row_Re_ecowas['tecowas_desc']?></option>
            <?php
} while ($row_Re_ecowas = mysqli_fetch_assoc($Re_ecowas));
  $rows = mysqli_num_rows($Re_ecowas);
  if($rows > 0) {
      mysqli_data_seek($Re_ecowas, 0);
	  $row_Re_Ecowas = mysqli_fetch_assoc($Re_ecowas);
  }
?>
          </select>
        </p>
        </td>
    </tr>
    <tr> 
      <td>Category</td>
      <td><select name="pCate[]" multiple>
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
      <td><select name="pProd[]" multiple>
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
    <td><select name="pProv[]" multiple>
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
      <td>Manufacturer</td>
    <td><select name="pManu[]" multiple>
        <option value="*">All</option>
        <?php
do {  
?>
        <option value="<?php echo $row_Re_manuf['tmanu_id']?>"><?php echo $row_Re_manuf['tmanu_desc']?></option>
        <?php
} while ($row_Re_manuf = mysqli_fetch_assoc($Re_manuf));
  $rows = mysqli_num_rows($Re_manuf);
  if($rows > 0) {
      mysqli_data_seek($Re_manuf, 0);
	  $row_Re_manuf = mysqli_fetch_assoc($Re_manuf);
  }
?>
      </select></td>
   </tr>
    <tr> 
      <td><p>Date of bid opening/Reception dates </p></td>
      <td><p> from 
          <input name="pDsta" readonly="readonly" type="text" value="01-01-2005" size="20" maxlength="20">
          <a href="#" onClick=" window.open('pop.php?frm=fcrit1&ch=pDsta','calendrier','width=350,height=160,scrollbars=0').focus();"><img src="../fr/petit_calendrier.gif" border="0"/></a> 
        </p>
        <p> to
<input name="pDend" readonly="readonly" type="text" value="31-12-2012" size="20" maxlength="10">
          <a href="#" onClick=" window.open('pop.php?frm=fcrit1&ch=pDend','calendrier','width=350,height=160,scrollbars=0').focus();"><img src="../fr/petit_calendrier.gif" border="0"/></a> 
        </p></td>
    </tr>
  </table>
  
  <p align="center"> 
 	  <input name="SUBMIT" type=SUBMIT onSelect="document.fcrit1.pForm_Name.value='t_search_product_pb_qualite_c.php'" onClick="document.fcrit1.pForm_Name.value='t_search_product_pb_qualite_c.php'"  value='Send'> 
    &nbsp; </p>  
  <p>
    <input name="pForm_Name" type="hidden"  value="t_search_product_pb_qualite_c.php">
</p>
</form>
<p>&nbsp;</p>
</body>
</div>
</html>
<?php
mysqli_free_result($Re_ecowas);

mysqli_free_result($Re_categ);

mysqli_free_result($Re_product);

mysqli_free_result($Re_currency);

?>
