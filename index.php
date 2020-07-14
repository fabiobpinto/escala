<?php
date_default_timezone_set ( 'America/Sao_Paulo' );
header ( "Content-Type: text/html; charset=ISO-8859-1", true );
?>
<!DOCTYPE html>
<html>
<head>
<title>Escala</title>
<!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
<meta name="viewport" content="width=device-width,initial-scale=1">
<style type="text/css">
body {
	padding-top: 40px;
	padding-bottom: 40px;
	background-color: #f5f5f5;
}

.form-signin {
	max-width: 300px;
	padding: 19px 29px 29px;
	margin: 0 auto 20px;
	background-color: #fff;
	border: 1px solid #e5e5e5;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 5px;
	-webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, .05);
	-moz-box-shadow: 0 1px 2px rgba(0, 0, 0, .05);
	box-shadow: 0 1px 2px rgba(0, 0, 0, .05);
}

.form-signin .form-signin-heading, .form-signin .checkbox {
	margin-bottom: 10px;
}

.form-signin input[type="text"], .form-signin input[type="password"] {
	font-size: 16px;
	height: auto;
	margin-bottom: 15px;
	padding: 7px 9px;
}

.centered {
	text-align: center;
	float: none;
	margin-left: auto;
	margin-right: auto;
}
body { padding-top:20px; }
.panel-body .btn:not(.btn-block) { width:120px;margin-bottom:10px; }
</style>

</head>

<body>
	<div class="container centered">
		<form class="form-signin" name="login" id="login" method="post"
			action="autentica.php">
			<div>
				<img class="img-responsive" alt="NET" src="img/logopq.png" />
			</div>
			 <div class="panel-body espace">
                        <div class="col-xs-6 col-md-6">
                          <a href="data.php" class="btn btn-success btn-large" role="button"><i class="icon-book icon-white"></i> <br/>Data Center</a>
                        </div>
                          <div class="col-xs-6 col-md-6">
                          <a href="head.php" class="btn btn-info btn-large" role="button"><i class="icon-user icon-white"></i> <br/>Head End</a>
                        </div>
			<div class="col-xs-6 col-md-6">
                          <a href="telecom.php" class="btn btn-warning btn-large" role="button"><i class=" icon-retweet  icon-white"></i> <br/>Telecom</a>
                        </div>
                          <div class="col-xs-6 col-md-6">
                          <a href="admin/index.php" class="btn btn-danger btn-large" role="button"><i class="icon-home icon-white"></i> <br/>Admin</a>
                        </div>
                </div>
		</form>

	</div>
	<!-- /container -->
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>

</html>
