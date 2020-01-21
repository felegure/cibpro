<?php require_once('../Connections/cibproto.php'); ?>
<?php
mysqli_select_db($cibproto, $database_cibproto);
$query_Re_country = "SELECT tcountry_id, tcountry_desc FROM tcountry_en";
$Re_country = mysqli_query($cibproto, $query_Re_country) or die(mysqli_error($cibproto));
$row_Re_country = mysqli_fetch_assoc($Re_country);
$totalRows_Re_country = mysqli_num_rows($Re_country);

//mysqli_select_db($database_cibproto, $cibproto);
$query_Re_categ = "SELECT tcateg_id, tcateg_desc FROM tcategory_en ORDER BY tcateg_desc";
$Re_categ = mysqli_query($cibproto, $query_Re_categ) or die(mysqli_error($cibproto));
$row_Re_categ = mysqli_fetch_assoc($Re_categ);
$totalRows_Re_categ = mysqli_num_rows($Re_categ);

//mysqli_select_db($database_cibproto, $cibproto);
$query_Re_product = "SELECT tproduct_id, tproduct_desc FROM tproduct_en ORDER BY tproduct_desc";
$Re_product = mysqli_query($cibproto, $query_Re_product) or die(mysqli_error($cibproto));
$row_Re_product = mysqli_fetch_assoc($Re_product);
$totalRows_Re_product = mysqli_num_rows($Re_product);

//mysqli_select_db($database_cibproto, $cibproto);
$query_Re_currency = "SELECT tcur_id, tcur_desc FROM tcur_en WHERE tcur_status='1' ORDER BY tcur_desc";
$Re_currency = mysqli_query($cibproto, $query_Re_currency) or die(mysqli_error($cibproto));
$row_Re_currency = mysqli_fetch_assoc($Re_currency);
$totalRows_Re_currency = mysqli_num_rows($Re_currency);

//mysqli_select_db($database_cibproto, $cibproto);
$query_Re_Ecowas = "SELECT tecowas.tecowas_id, tecowas.tecowas_desc FROM tecowas ORDER BY tecowas.tecowas_desc";
$Re_Ecowas = mysqli_query($cibproto, $query_Re_Ecowas) or die(mysqli_error($cibproto));
$row_Re_Ecowas = mysqli_fetch_assoc($Re_Ecowas);
$totalRows_Re_Ecowas = mysqli_num_rows($Re_Ecowas);

//mysqli_select_db($database_cibproto, $cibproto);
$query_Re_supplier = "SELECT tprovider.tprov_id, tprovider.tprov_desc FROM tprovider ORDER BY tprov_desc";
$Re_supplier = mysqli_query($cibproto, $query_Re_supplier) or die(mysqli_error($cibproto));
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
<div align="left"><a href="manage_form_ins.php" title="Back">Back</a></div>
<FORM NAME="fcrit1" ACTION="vlbuying_control.php" METHOD=POST>
    <p align="center"><strong>Please enter the parameters:</strong></p>
    <table border="1" align="center" cellpadding="2" cellspacing="2">
      <tr> </tr>
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
        <td><select name="pProd[]" multiple multiple[]>
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
    
  </tr>
  <tr>
    
  </tr>
  <tr>
    <td>Date of Bid Opening / Date of reception </td>
    <td><p>From&nbsp;
      <input name="pDsta" readonly="readonly" type="text" value="01-01-2005" size="20" maxlength="20">      
      <a href="#" onClick=" window.open('pop.php?frm=fcrit1&ch=pDsta','calendrier','width=350,height=160,scrollbars=0').focus();"><img src="petit_calendrier.gif" border="0"/></a> 
      <p> &nbsp; To &nbsp;&nbsp;
            <input name="pDend" readonly="readonly" type="text" value="31-12-2012" size="20" maxlength="10">
     <a href="#" onClick=" window.open('pop.php?frm=fcrit1&ch=pDend','calendrier','width=350,height=160,scrollbars=0').focus();"><img src="petit_calendrier.gif" border="0"/></a> 
	  </p></td>
  </tr>
    </table>
	<br>
 <p align="center"> 
	<button type="button" onSelect="document.fcrit1.pForm_Name.value='t_search_param_control_ins.php'" onClick="document.fcrit1.pForm_Name.value='t_search_param_buying_control_ins.php'"  value='Submit'>Submit</button> 
 <!--	  <input name="SUBMIT" type="button" onSelect="document.fcrit1.pForm_Name.value='t_search_param_control_ins.php'" onClick="document.fcrit1.pForm_Name.value='t_search_param_buying_control_ins.php'"  value='Submit'> -->
 </p>  
  <p>
    <input name="pForm_Name" type="hidden"  value="t_search_param_buying_control_ins.php">
  </p>
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
