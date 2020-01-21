<?php
mysqli_select_db($database_cibproto, $cibproto);
$query_Re_categ = "SELECT tcateg_id, tcateg_desc FROM tcategory_en ORDER BY tcateg_desc";
$Re_categ = mysqli_query($query_Re_categ, $cibproto) or die(mysqli_error());
$row_Re_categ = mysqli_fetch_assoc($Re_categ);
$totalRows_Re_categ = mysqli_num_rows($Re_categ);


mysqli_select_db($database_cibproto, $cibproto);
$query_Re_product = "SELECT tproduct_id, tproduct_desc FROM tproduct_en ORDER BY tproduct_desc";
$Re_product = mysqli_query($query_Re_product, $cibproto) or die(mysqli_error());
$row_Re_product = mysqli_fetch_assoc($Re_product);
$totalRows_Re_product = mysqli_num_rows($Re_product);

mysqli_select_db($database_cibproto, $cibproto);
$query_Re_currency = "SELECT tcur_id, tcur_desc FROM tcur WHERE tcur_id='USD' ORDER BY tcur_desc";
$Re_currency = mysqli_query($query_Re_currency, $cibproto) or die(mysqli_error());
$row_Re_currency = mysqli_fetch_assoc($Re_currency);
$totalRows_Re_currency = mysqli_num_rows($Re_currency);

mysqli_select_db($database_cibproto, $cibproto);
$query_Re_ecowas = "SELECT tecowas_id, tecowas_desc FROM tecowas ORDER BY tecowas_desc";
$Re_ecowas = mysqli_query($query_Re_ecowas, $cibproto) or die(mysqli_error());
$row_Re_ecowas = mysqli_fetch_assoc($Re_ecowas);
$totalRows_Re_ecowas = mysqli_num_rows($Re_ecowas);

mysqli_select_db($database_cibproto, $cibproto);
$query_Re_supplier = "SELECT tprov_id, tprov_desc FROM tprovider ORDER BY tprov_desc";
$Re_supplier = mysqli_query($query_Re_supplier, $cibproto) or die(mysqli_error());
$row_Re_supplier = mysqli_fetch_assoc($Re_supplier);
$totalRows_Re_supplier = mysqli_num_rows($Re_supplier);
?>

