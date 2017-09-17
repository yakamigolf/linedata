<?php 
$user = 'cp706423_scl';
$password = 'Qawsedrf1234';
$db = 'cp706423_scl';
$host = 'ismartfun.com';

$link = mysql_connect(
   $host, 
   $user, 
   $password
);
$db_selected = mysql_select_db(
   $db, 
   $link
);
mysql_query("SET NAMES UTF8");

$sql = "SELECT * FROM line_rec;";
$result = mysql_query($sql);
$row = mysql_mysql_fetch_assoc($result);
?>