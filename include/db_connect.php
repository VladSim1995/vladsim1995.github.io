<?php

$db_host        = 'localhost';
$db_user        = 'admin';
$db_pass        = '1111';
$db_database    = 'db_cafe';

$link = mysql_connect($db_host,$db_user,$db_pass);

mysql_select_db($db_database,$link) or die ("��� ���������� � �� ".mysql_error());
mysql_query("SET names cp1251");


?>