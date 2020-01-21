<?php require_once('../Connections/cibproto.php'); ?>
<?php
mysqli_select_db($database_conproto, $conproto);
$query_Re_users = "SELECT * FROM tusers";
$Re_users = mysqli_query($query_Re_users, $conproto) or die(mysqli_error());
$row_Re_users = mysqli_fetch_assoc($Re_users);
$totalRows_Re_users = mysqli_num_rows($Re_users);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Gestion des utilisateurs</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<form name="form1" method="post" action="">
  <p>&nbsp;</p>
  <p>Pays : </p>
  <p>User_id:</p>
  <p>Nom :</p>
  <p>Fonction :</p>
  <p>Department/Service :</p>
  <p>Adresse :</p>
  <p>Telephone 1 : </p>
  <p>Telephone 2 :</p>
  <p>Telephone mobile :</p>
  <p>Fax :</p>
  <p>email :</p>
  <p>Site web :</p>
  <p>Password :</p>
  <p>Comments :</p>
  <p>Status </p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
</body>
</html>
<?php
mysqli_free_result($Re_users);
?>
