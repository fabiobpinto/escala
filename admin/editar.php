<?php
date_default_timezone_set ( 'America/Sao_Paulo' );
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
$id = $_POST['id'];

$busca = mysql_query("SELECT * FROM $table WHERE id = $id");
$row = mysql_fetch_array($busca);

$nome= $row[1];
$cel= $row[2];
$data= $row[3];
$hora_ent= $row[4];
$hora_sai= $row[5];
$setor= $row[6];
$funcao= $row[7];
include 'topo.php';
?>


	<div class="container-fluid">
			<div>
			<img class="img-responsive espace" alt="NET" src="../img/logopq.png" />
			</div>
		<form method="POST" action="salvar.php">
			<fieldset>
				<legend>Edi��o</legend>

				<div class="control-group">
					<label class="control-label" for="nome">Id:</label>
					<div class="controls">
						<input id="id" name="id" type="text" class="input-small" 
						value="<?php print $id; ?>"
						readonly="readonly" />
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="nome">Nome:</label>
					<div class="controls">
						<input id="nome" name="nome" type="text" required placeholder="Nome"
							class="input-large" value="<?php print $nome; ?>"/>
							<p class="help-block">O Nome n�o pode ter acento</p>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="celular">Celular:</label>
					<div class="controls">
						<input id="celular" name="celular" type="text"
							placeholder="Celular" required class="input-large" value="<?php print $cel; ?>"/>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="data">Data:</label>
					<div class="controls">
						<input id="data" name="data" type="date" required placeholder="Data"
							class="input-large" value="<?php print date('d/m/Y', strtotime($data)); ?>"/>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="celular">Hor�rio:</label>
					<div class="controls">
						<input id="hora_ent" name="hora_ent" type="time" required
							placeholder="Hora Inicio" class="input-small" value="<?php print $hora_ent; ?>"/> 
						<input id="hora_sai"
							name="hora_sai" type="time" required placeholder="Hora Fim" class="input-small" value="<?php print $hora_sai; ?>"/>
					</div>
				</div>

				
				<div class="control-group">
					<label class="control-label" for="setor">Setor:</label>
					<div class="controls">
						<select id="setor" name="setor" class="large" required>
							<option value="Data Center">Data Center</option>
							<option value="Head End">Head End</option>
							<option value="Telecom">Telecom</option>
						</select>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="setor">Fun��o:</label>
					<div class="controls">
						<select id="funcao" name="funcao" class="large" required>
							<option value="Analista Datacenter">Analista Datacenter</option>
							<option value="Atendimento">Atendimento</option>
							<option value="T�cnico">T�cnico</option>
							<option value="Sobre Aviso">Sobre Aviso</option>
						</select>
					</div>
				</div>
				
				
				<div class="control-group">
					<label class="control-label" for="btnSalvar"></label>
					<div class="controls">
						<button id="btnSalvar" name="btnSalvar" class="btn btn-info"><i class='icon-ok icon-white'></i> Salvar</button>
						<a class="btn btn-danger" href="mostrar.php" role="button"><i class='icon-remove icon-white'></i> Cancelar</a>
					</div>
				</div>
			</fieldset>
		</form>
	</div>
	<script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
</body>
</html>
