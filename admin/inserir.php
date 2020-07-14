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
include 'topo.php';
?>
	<div class="container-fluid">
		<div>
			<img class="img-responsive espace" alt="NET" src="../img/logopq.png" />
		</div>
		<form method="POST" action="salvar.php">
			<fieldset>
				<legend>Cadastro</legend>

				<div class="control-group">
					<label class="control-label" for="nome">Nome:</label>
					<div class="controls">
						<input id="nome" name="nome" type="text" placeholder="Nome"
							required class="input-large" />
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="celular">Celular:</label>
					<div class="controls">
						<input id="celular" name="celular" type="text"
							placeholder="Celular" required class="input-large" />
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="data">Data:</label>
					<div class="controls">
						<input id="data" name="data" type="date" required
							placeholder="Data" class="input-large" />
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="celular">Hor�rio:</label>
					<div class="controls">
						<input id="hora_ent" name="hora_ent" type="time"
							placeholder="Hora Inicio" required class="input-small" /> <input
							id="hora_sai" name="hora_sai" type="time" required
							placeholder="Hora Fim" class="input-small" />
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
						<button id="btnSalvar" name="btnSalvar" class="btn btn-info">
							<i class='icon-ok icon-white'></i> Salvar
						</button>
						<a class="btn btn-danger" href="mostrar.php" role="button"><i
							class='icon-remove icon-white'></i> Cancelar</a>
					</div>
				</div>
			</fieldset>
		</form>
	</div>
	<script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
</body>
</html>
