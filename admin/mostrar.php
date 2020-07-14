<?php 
error_reporting ( 0 );
date_default_timezone_set('America/Sao_Paulo');
$cont = 0;
header ( "Content-Type: text/html; charset=ISO-8859-1", true );
include_once 'conectar.php';
include_once 'restrito.php';
?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo  $titulo ?></title>
<!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/bootstrap-responsive.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width,initial-scale=1">
</head>
<body>
<?php 
include 'topo.php';
?>
	<div class=" container-fluid info">
	<img class="img-responsive espace" alt="NET" src="../img/logopq.png"/>
<?php
//Apaga registros que tenham data com mais de 10 dias
$strApaga = "DELETE FROM $table WHERE TO_DAYS(NOW()) - TO_DAYS(dt_plantao) > 1 ; ";
$rs = mysql_query ( $strApaga );


// query SQL consulta
//Mostrar somente o dia de hoje
$hoje = date("Y-m-d");
$hora_atual = date("H:i");

//Mostrar só o dia de hoje
$strSQL = "SELECT * FROM $table where dt_plantao >= '$hoje'  order by dt_plantao,hora_ent, nome ASC";

//Mostrar todos dias
// $strSQL = "SELECT * FROM $table order by dt_plantao DESC";

// Executa a query (o recordset $rs contém o resultado da query)
$rs = mysql_query ( $strSQL );

echo "<table class='table table-hover table-bordered'>
		 <caption><h1>Escala Geral</h1></caption>
		 <thead>
			<tr>
				<th>Nome</th>
				<th>Celular</th>
				<th>Data</th>
				<th>Horário Entrada</th>
				<th>Horário Saída</th>
				<th>Setor</th>
				<th>Função</th>
				<th>Ação</th>
			</tr>
		</thead>
		<tbody>
		";
// Loop pelo recordset $rs
// Cada linha vai para um array ($row) usando mysql_fetch_array
			while ( $row = mysql_fetch_array ( $rs ) ) {
				$id1=$row['id'];
				if ($hoje == $row[3] && $hora_atual <= $row[5] && $hora_atual >= $row[4] ) {
					echo "<tr class='alert-danger some'>";
				}else{
					echo "<tr class='some'>";
				}
					echo "<td>$row[nome]</td>
					<td>$row[cel]</td>
					<td>".date ( 'd/m/Y', strtotime ($row[3]))."</td>
					<td>$row[hora_ent]</td>
					<td>$row[hora_sai]</td>
					<td>$row[setor]</td>
					<td>$row[funcao]</td>
					<td>";			
					?>
					<span class="action name btn"><a href="#" id="<?php echo $id1; ?>" class="delete" title="Deletar"><i class='icon-trash'></i></a></span>
					
						<a class='btn'    title='Editar'   href='javascript:SubmitForm(<?php echo $row['id']; ?>)'>
   						<i class='icon-pencil'></i></a>
   
   
   
   
					
					</td>
				   	<form id="form1" action="editar.php" method="post">
						  <input type="hidden" id="id" name="id">
					</form>
					</tbody>
					</tr>
				<?php
			} ?>
			</tbody>
		</table>
<?php

$total = mysql_num_rows($rs);

echo $total;

// Encerra a conex¿o
mysql_close ();

?>


</div>
	</div>
	<script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
<script type="text/javascript">
$(function() {
$(".delete").click(function(){
var element = $(this);
var del_id = element.attr("id");
var info = 'id=' + del_id;
if(confirm("Deseja excluir o Registro?"))
{
 $.ajax({
   type: "POST",
   url: "deletar.php",
   data: info,
   success: function(){
 }
});
  $(this).parents(".some").animate({backgroundColor: "#003"},"slow")
  .animate({ opacity: "hide"}, "slow");
 }
return false;
});
});

// Manda para tela de editar
function SubmitForm(id) {
      document.getElementById("id").value = id;
      document.getElementById("form1").submit();
}




</script>
</body>
</html>
