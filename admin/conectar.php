<?php
$locahost = 'localhost';
$user = 'www';
$pass = 'datacenterMY$QL';
$db = 'portal';
$table = 'escala';
$titulo = "Escala";


$conn = mysql_connect($locahost,$user,$pass,$db)  or die("N�o foi possivel conectar no MySQL");
mysql_select_db($db) or die( "N�o foi poss�vel conectar ao banco");

if (!$conn) {
	echo "N�o foi poss�vel conectar ao banco MySQL.";
	exit;
}

?>
