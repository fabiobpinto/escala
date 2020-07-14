<?php
$locahost = 'localhost';
$user = 'www';
$pass = 'datacenterMY$QL';
$db = 'portal';
$table = 'escala';
$titulo = "Escala";


$conn = mysql_connect($locahost,$user,$pass,$db)  or die("Não foi possivel conectar no MySQL");
mysql_select_db($db) or die( "Não foi possível conectar ao banco");

if (!$conn) {
	echo "Não foi possível conectar ao banco MySQL.";
	exit;
}

?>
