<?php
date_default_timezone_set ( 'America/Sao_Paulo' );
header ( "Content-Type: text/html; charset=ISO-8859-1", true );
include_once 'admin/conectar.php';

?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo  $titulo ?></title>
<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
<link href="css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="refresh" content="60">

<style>
th {
  //  background-color: blue;
   // color: white;
        background-color: #80ccd4;
  color: white;
width: 40px;
    padding-left: 5px;
    padding-right: 5px;
}
</style>







</head>

<body>
<div id="mask"></div>
	<div class=" container-fluid info">
<?php
$hora_atual = date ( "H:i" );
$hoje = date ( "Y-m-d" );

// Mostrar só o dia de hoje
$strSQL = "SELECT * FROM $table where setor like '%Data%' order by hora_ent, funcao, nome";
// Executa a query (o recordset $rs contém o resultado da query)
$rs = mysql_query ( $strSQL );
?>
<div>
			<img class="img-responsive" alt="NET" src="img/logo.png" />

		</div>

		<div class="modal hide fade window" id="myModal" style="z-index:9000" tabindex="-1" role="dialog"  aria-hidden="true">
			<div class="modal-header">
				<a class="close" data-dismiss="modal">×</a>
				<h3>Atenção</h3>
			</div>
			<div class="modal-body">
				
				<p>Caros,<br> 
					Para questões cadastrais, tratamento de ocorrências contatar os Atendentes.
				</p>
					<p>Analistas realizarão o atendimento somente em caso de não existirem atendentes disponíveis.
					</p>
					<p>Datacenter SJC.
				</p>
			</div>
			<div class="modal-footer">
				        <button type="button" class="btn  btn-primary" data-dismiss="modal">Fechar</button>
			</div>
		</div>
		
		
		
		<table class='table table-hover table-bordered espace'>
			<caption>
				<h4>Legenda Cores</h4>
			</caption>
			<thead>
				<tr>
					<th>Função</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Analista</td>
				</tr>
				<tr class='warning'>
					<td>Atendentes</td>
				</tr>
				<tr class='success'>
					<td>Sobre Aviso</td>
				</tr>
			</tbody>
		</table>

<?php
echo "<table class='table table-hover table-bordered espace'>
		 <caption><h3>Escala Data Center</h3></caption>
		 <thead>
			<tr>
				<th>Nome</th>
				<th>Celular</th>
			</tr>
		</thead>
		<tbody>
		";
// Loop pelo recordset $rs
// Cada linha vai para um array ($row) usando mysql_fetch_array
$atendimento = 'Atendimento';

$ontem = date('Y-m-d', strtotime($hoje. ' - 1 days'));

while ( $row = mysql_fetch_array ( $rs ) ) {
//Pega os cadastros que tem data atual e horarios normais	
if ($hoje == $row [3] && $hora_atual <= $row [5] && $hora_atual >= $row [4]){
		if ($row[7] == 'Atendimento') {
			echo "<tr class='warning'>";
		} else if($row[7] == 'Sobre Aviso'){
			echo "<tr class='success'>";
		}else {
			echo "<tr>";
		}
		echo "<td>$row[nome]</td>
			<td>$row[cel]
			<a class='btn btn-success' href='tel:$row[cel]'/><i class='icon-user'></i></a>
			</td>
		</tr>";
	}
	
}
echo "
			</tbody>
		</table>";

// Encerra a conexão
mysql_close ();

?> 

	<h3>
			Atualizando em <span id='countdown'>10</span> segundos <br />
		</h3>
	</div>

	<a href="index.php" class="btn btn-info " role="button"><i class="icon-arrow-left icon-white"></i> Voltar</a>

	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>

	<script type="text/javascript">
	
	//  	Redirecionamento da página
	var start = new Date();
	start = Date.parse(start)/1000;
	var seconds = 60; // TEMPO EM SEGUNDOS EM QUE HAVERHAVERÁ O REDIRECIONAMENTO
	function CountDown(){
	    var now = new Date();
	    now = Date.parse(now)/1000;
	    var counter = parseInt(seconds-(now-start),10);
	    if(counter <= 9){
		    document.getElementById('countdown').innerHTML = ' 0'+counter;
	    }else{
		    document.getElementById('countdown').innerHTML = counter;
	    }
	    if(counter > 0){
	        timerID = setTimeout("CountDown()", 100)
	    }else{
			window.location = "data.php"; //URL DA PAGINA A SER REDIRECIONADA
		}
	}
	window.setTimeout('CountDown()',100);	


	 $(window).load(function(){

		$('#myModal').modal('show');
		 
	    });

	</script>


</body>
</html>
