<?php 

date_default_timezone_set('America/Sao_Paulo');
header ( "Content-Type: text/html; charset=ISO-8859-1", true );
include_once 'conectar.php';

// session_start inicia a sess�o session_start(); 
// as vari�veis login e senha recebem os dados digitados na p�gina anterior 
$login = $_POST['login'];
$senha = md5($_POST['senha']); 
$result = mysql_query("SELECT * FROM `admins` WHERE `login` = '$login' AND `SENHA`= '$senha'"); 
/* Logo abaixo temos um bloco com if e else, verificando se a vari�vel $result foi bem sucedida, 
 * ou seja se ela estiver encontrado algum registro id�ntico o seu valor ser� igual a 1, se n�o, 
 * se n�o tiver registros seu valor ser� 0. Dependendo do resultado ele redirecionar� para 
 * a pagina site.php ou retornara para a pagina do formul�rio inicial para que se possa tentar novamente realizar o login */ 

if(mysql_num_rows ($result) > 0 ) { 
	$_SESSION['login'] = $login; 
	$_SESSION['senha'] = $senha; 
	header('location:mostrar.php'); 
} else{ unset ($_SESSION['login']); 
unset ($_SESSION['senha']); 
header('location:index.php'); } 
?>

