<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>CRUD - Cadastrar</title>	
		 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 	<style type="text/css">
 		
.container {
    width: 553px;
}
 	</style>
 	<script type="text/javascript">
	    $(function() {
	        $("#whats").mask("(31)9 9999-9999");

	       $("#ramal").mask("(31)3618-9999");
	    });
		
	</script>
	</head>
	<body>
		<h1>Cadastrar na lista de ramal</h1>
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>


<div class="container">
		<div id="form">
		<form method="POST" action="proc_cad_usuario.php">
			<label>Ramal: </label>
			<input type="text" name="ramal"  id="ramal" class="form-control" placeholder="3618-7959">
			
			<label>Nome: </label>
			<input type="nome" name="nome" class="form-control" placeholder="Warley Mendes">

			<label>E-mail: </label>
			<input type="email" name="email" class="form-control" placeholder="informatica.prominas@faculdadeunica.com.br">
			<label>Whatsapp: </label>
			<input type="nome" name="whatsapp" id="whats" class="form-control" placeholder="(31)9 9157-9749">

			<label>Horario de Almoço: </label>
			<input type="nome" name="hr_almoco" class="form-control" placeholder="12:30 AS 13:30">
			<label>Setor: </label>
			<input type="nome" name="setor" class="form-control" placeholder="Setor"><br>
			<input type="submit" class="btn btn-secondary btn-lg btn-block value="Cadastrar na lista!">
		</form>
	</div>
</div>	
	</body>
</html>