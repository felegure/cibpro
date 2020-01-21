<?php

$pLan='en';
$tCat="tcategory_".$pLan;
$tPro="tproduct_".$pLan;
$tCur="tcur_".$pLan;
$tEco="tecowas_".$pLan;


mysqli_select_db( $cibproto, $database_cibproto);
$query_Re_categ = "SELECT tcateg_id, tcateg_desc FROM tcategory_en ORDER BY tcateg_desc";
$Re_categ = mysqli_query($cibproto, $query_Re_categ ) or die(mysqli_error($cibproto));
$row_Re_categ = mysqli_fetch_assoc($Re_categ);
$totalRows_Re_categ = mysqli_num_rows($Re_categ);


//mysqli_select_db($database_cibproto, $cibproto);
$query_Re_categ = "SELECT tcateg_id, tcateg_desc FROM $tCat WHERE tcateg_status=1 ORDER BY tcateg_desc";
$Re_categ = mysqli_query( $cibproto, $query_Re_categ) or die(mysqli_error($cibproto));
$row_Re_categ = mysqli_fetch_assoc($Re_categ);
$totalRows_Re_categ = mysqli_num_rows($Re_categ);


//mysqli_select_db($database_cibproto, $cibproto);
$query_Re_product = "SELECT tproduct_id, tproduct_desc FROM $tPro WHERE tproduct_status=1 ORDER BY tproduct_desc";
$Re_product = mysqli_query($cibproto, $query_Re_product) or die(mysqli_error($cibproto));
$row_Re_product = mysqli_fetch_assoc($Re_product);
$totalRows_Re_product = mysqli_num_rows($Re_product);

//mysqli_select_db($database_cibproto, $cibproto);
$query_Re_currency = "SELECT tcur_id, tcur_desc FROM $tCur WHERE tcur_id='USD' ORDER BY tcur_desc";
$Re_currency = mysqli_query($cibproto, $query_Re_currency) or die(mysqli_error($cibproto));
$row_Re_currency = mysqli_fetch_assoc($Re_currency);
$totalRows_Re_currency = mysqli_num_rows($Re_currency);

//mysqli_select_db($database_cibproto, $cibproto);
$query_Re_ecowas = "SELECT tecowas_id, tecowas_desc FROM $tEco WHERE tecowas_status=1 ORDER BY tecowas_desc";
$Re_ecowas = mysqli_query($cibproto,$query_Re_ecowas) or die(mysqli_error($cibproto));
$row_Re_ecowas = mysqli_fetch_assoc($Re_ecowas);
$totalRows_Re_ecowas = mysqli_num_rows($Re_ecowas);

//mysqli_select_db($database_cibproto, $cibproto);
$query_Re_supplier = "SELECT tprov_id, tprov_desc FROM tprovider WHERE tprov_status=1 ORDER BY tprov_desc";
$Re_supplier = mysqli_query($cibproto, $query_Re_supplier) or die(mysqli_error($cibproto));
$row_Re_supplier = mysqli_fetch_assoc($Re_supplier);
$totalRows_Re_supplier = mysqli_num_rows($Re_supplier);

$query_Re_manuf = "SELECT tmanu_id, tmanu_desc FROM tmanufacturer WHERE tmanu_status=1 ORDER BY tmanu_desc";
$Re_manuf = mysqli_query($cibproto, $query_Re_manuf) or die(mysqli_error($cibproto));
$row_Re_manuf = mysqli_fetch_assoc($Re_manuf);
$totalRows_Re_manuf = mysqli_num_rows($Re_manuf);


?>