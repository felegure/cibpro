<%@LANGUAGE="JAVASCRIPT" CODEPAGE="1252"%>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Document sans titre</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php
$param1="10";
$param2="20";
echo "param1=$param1<BR>";
?>

<a href="page2.php?param1=<?php echo $param1; ?>&param2=<?php echo $param2; ?>">Vers la page 2</a>


</body>
</html>
