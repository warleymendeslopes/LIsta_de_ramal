<?php
session_start();
include_once("conexao.php");
?>
<!DOCTYPE html>
<html>
<head> <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>assinatura</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.1.1.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.quicksearch/2.3.1/jquery.quicksearch.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">  
  <style type="text/css">
  	.input-group .form-control {
    position: relative;
    z-index: 2;
    float: left;
    width: 23%;
    margin-bottom: 0;
}
.inco_add{
	position: relative;
	width: 30px;
}



  </style>
</head>
<body>
	<div class="form-group input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
  <input name="consulta" id="txt_consulta" placeholder="Consultar" type="text" class="form-control">
 </div><a href="cad_usuario.php">
    <img class="inco_add" src="img/add.png"></a></h2>
	<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		
		//Receber o número da página
		$pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);		
		$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
		
		//Setar a quantidade de itens por pagina
		$qnt_result_pg = 300;
		?>
		<table id="tabela" class="table table-hover">
  <thead>
      <tr>
          <th>Ramal</th>
          <th>Nome</th>
          <th>E-mail</th>
          <th>Whatsapp</th>	
          <th>Setor</th>	
          <th>Almoço</th>
      </tr>
      </thead>
      		<?php		
		//calcular o inicio visualização
		$inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;
		
		$result_usuarios = "SELECT * FROM usuarios LIMIT $inicio, $qnt_result_pg";
		$resultado_usuarios = mysqli_query($conn, $result_usuarios);
		while($row_usuario = mysqli_fetch_assoc($resultado_usuarios)){
			?>
			<tr>
          <th><?php echo $row_usuario['ramal'] ; ?></th>
          <td><?php echo $row_usuario['nome'] ; ?></td>	
          <td><?php echo $row_usuario['email'] ; ?></td>
          <td><?php echo $row_usuario['whatsapp'] ; ?></td>
          <td><?php echo $row_usuario['setor'] ; ?></td>
          <td><?php echo $row_usuario['hr_almoco'] ; ?></td>
        <!--  <td><?php // echo "<a href='edit_usuario.php?id=" . $row_usuario['id'] . "'>Editar  </a>"; </td> ?>!-->
			  <td><?php echo "<a href='proc_apagar_usuario.php?id=" . $row_usuario['id'] . "'>Apagar</a>"; ?></td>
      </tr>
<script>
  $('input#txt_consulta').quicksearch('table#tabela tbody tr');
 </script>




		<?php } ?>

</body>
</html>