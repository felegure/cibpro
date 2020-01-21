<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_conproto = "localhost";
$database_conproto = "cibase";
$username_conproto = "root";
$password_conproto = "";
$conproto = mysqli_pconnect($hostname_conproto, $username_conproto, $password_conproto) or trigger_error(mysqli_error(),E_USER_ERROR); 
?>