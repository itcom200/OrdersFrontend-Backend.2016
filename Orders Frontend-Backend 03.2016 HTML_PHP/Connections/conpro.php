<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_conpro = "localhost";
$database_conpro = "pro";
$username_conpro = "root";
$password_conpro = "1234";
$conpro = mysql_pconnect($hostname_conpro, $username_conpro, $password_conpro) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_db_query($database_conpro,"SET NAMES UTF8");
?>
