<?php 

date_default_timezone_set('America/Sao_Paulo');
// $cont = 0;
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
			error_reporting ( 0 );
			// Transferir o arquivo
			if (isset ( $_POST ['submit'] )) {
				if (is_uploaded_file ( $_FILES ['filename'] ['csv'] ['tmp_name'] )) {
					echo "<h2>" . "Arquivo  <i>" . $_FILES ['filename'] ['name'] . "</i> transferido com sucesso." . "</h2>";
					echo "<hr/>";
				}
				// Importar o arquivo transferido para o banco de dados
				if (! file_exists ( $_FILES ['filename'] ['tmp_name'] )) {
					echo "<h3>Erro na importação:</h3>";
					echo "<p>Nenhum arqvuivo selecionado! <br/></p>";
					?>
							<a class="btn btn-danger"
							onclick="parent.window.document.location.href = '';">Voltar</a> <br />
					<?php
					die ();
				} else {
					$file = fopen ( $_FILES ['filename'] ['tmp_name'], "r" );
				}
			echo "<h3>Exibindo o status da importação:</h3>";
			while ( ($data = fgetcsv ( $file, 1000, "," )) !== FALSE ) {
				while ( ! feof ( $file ) ) {
					$linha = fgets ( $file, 1024 );
					$dados = explode ( ';', $linha );
					if (($dados [0] != 'Nome') && (! empty ( $linha ))) {
						$parts = explode ( '/', $dados [2] );
						$convert = $parts [2] . '-' . $parts [1] . '-' . $parts [0];
						$setor_sem_espaco = trim ($dados[6]);
						$grava = "INSERT into $table(nome,cel,dt_plantao,hora_ent,hora_sai,setor,funcao)values('$dados[0]','$dados[1]','$convert','$dados[3]','$dados[4]','$dados[5]','$setor_sem_espaco')";
						if (mysql_query ( $grava )) {
							echo "Registro inserido: " . $dados [0] . " " . $dados [1] . " " . $dados [2] . " " . $dados [3] . " " . $dados [4] ." ". $dados [5] ." ". $setor_sem_espaco . "<br/>";
						} else {
							echo "<p>O arquivo não foi gravado com sucesso! <br/></p>";
							
							?>
						<a class="btn btn-danger"
						onclick="parent.window.document.location.href = '';">Voltar</a> <br />
						<?php
							die (mysql_error());
						}
					$cont ++;
				}
				}
				echo "<hr/>";
				echo "<b><h4>Foram importados " . $cont . " registros.</h4></b>";
						?>
						<hr/>
			Voltando em <span id='countdown'>10</span> segundos <br /> 
			<a	class="btn" onclick="parent.window.document.location.href = '';">Voltar</a>
			<?php
			}
			fclose ( $file );
			mysql_close ();
			// Visualizar formulário de transferência
		} else {
			?>
			<div class='input-append row-fluid'>
			<h2>Importar Escala</h2>
			<?php 
	echo $logindb;
?>
			
				<form enctype='multipart/form-data' action='importar.php'
					method='post'>

					<input type='file' name='filename' style='visibility: hidden;'
						id='pdffile'><br /> <input type='text' id='subfile' class='span3 '
						placeholder='Selecione um arquivo' disabled> <a class="btn"
						onclick="$('#pdffile').click();"><i class="icon-search"></i>Procurar</a>
					<label>Escolha o arquivo</label> <input type='submit' name='submit'
						value='Upload' class='btn btn-success'>
			</form>
			
			</div>
			<div class="container-fluid alert alert-danger">
				<p>Arquivo para para realização da Importação</p>
				<a class='btn' title='Baixar' href='http://<?php echo $_SERVER['SERVER_NAME']?>/escala/doc/arquivo.csv'>
							<i class='icon-download-alt'></i>Download</a>
			</div>
			
			
		<?php
}
?> 

		</div>
	
	<script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script type="text/javascript">

// 	Botão de Upload do arquivo
 	$(document).ready(function(){
 		$('#pdffile').change(function(){
			$('#subfile').val($(this).val());
		}); 
		$('#showHidden').click(function(){
			$('#pdffile').css('visibilty','visible');
		});
 	});

//  	Redirecionamento da página
	var start = new Date();
	start = Date.parse(start)/1000;
	var seconds = 10; // TEMPO EM SEGUNDOS EM QUE HAVERHAVERÁ O REDIRECIONAMENTO
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
			window.location = "importar.php"; //URL DA PAGINA A SER REDIRECIONADA
		}
	}
	window.setTimeout('CountDown()',100);	

 	</script>
</div>
</body>
</html>