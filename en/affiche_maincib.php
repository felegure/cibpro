<?php
session_start();?>
<?php
$nomsession = session_name();

if ($_SESSION['Access'] == '1') {

include ("maincib_all.htm");
}
if ($_SESSION['Access'] == '2') {

include ("maincib_view.php");
}
if ($_SESSION['Access'] == '3') {


include ("maincib_ins.php");
}
if ($_SESSION['Access'] == '4') {

include ("maincib_val.php");
}
if ($_SESSION['Access'] == '5') {

include ("maincib_adm.php");
}
?>
