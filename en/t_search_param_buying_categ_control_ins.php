<?php require_once('../Connections/cibproto.php'); ?>
<?php
mysqli_select_db($cibproto, $database_cibproto);
$query_Re_categ = "SELECT tcateg_id, tcateg_desc FROM tcategory_en ORDER BY tcateg_desc";
$Re_categ = mysqli_query($cibproto,$query_Re_categ) or die(mysqli_error($cibproto));
$row_Re_categ = mysqli_fetch_assoc($Re_categ);
$totalRows_Re_categ = mysqli_num_rows($Re_categ);
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Category Param Search </title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.Style1 {color: #FFFFFF}
.Style2 {color: #000000}
.Style5 {color: #009900}
-->
</style>
</head>

<body bgcolor="#CCCCCC" text="#000066">
<div align="center">
<div align="left"><a href="manage_form_ins.php" title="Back">Back</a></div>


<FORM NAME="fcrit1" ACTION="aic_form_buying_input.php?kelcategory=$pCate" METHOD=POST>
    <p align="center" class="Style2">Enter essential drugs purchases by Category :</p>
    <p align="center" class="Style1">&nbsp;</p>
    <p align="center" class="Style2">&nbsp;</p>
    <table width="604" border="1">
      <tr>
        <th width="594" height="65" scope="col"><p align="center" class="Style2"><strong>Please feel free to select a category for data entering of essential drugs</strong></p>
          <p align="center" class="Style2"><strong>Select a Category :</strong></p>
          <table border="1" align="center" cellpadding="2" cellspacing="2">
            <tr>
              <td><span class="Style5">Category</span></td>
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
          </table>          <p align="center" class="Style2">&nbsp;</p>        </th>
      </tr>
    </table>
    <p align="center">&nbsp;</p>
    <p align="center"> 
 	  <input name="SUBMIT" type="SUBMIT" value='Submit'> 
    &nbsp; </p>  
  <p>&nbsp;</p>
</form>
<p>&nbsp;</p>
</body>
</div>
</html>
<?php
mysqli_free_result($Re_categ);
?>