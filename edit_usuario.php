<?php
session_start();
include_once("conexao.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_usuario = "SELECT * FROM usuarios WHERE id = '$id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>CRUD - Editar</title>		
	</head>
	<body>
		<a href="cad_usuario.php">Cadastrar</a><br>
		<a href="index.php">Listar</a><br>
		<h1>Editar Usuário</h1>
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>
		<form method="POST" action="proc_edit_usuario.php">
			<input type="hidden" name="id" value="<?php echo $row_usuario['id']; ?>">
			
			<label>Nome: </label>
			<input type="text" name="nome" placeholder="Digite o nome completo" value="<?php echo $row_usuario['nome']; ?>"><br><br>
			
			<label>E-mail: </label>
			<input type="email" name="email" placeholder="Digite o seu melhor e-mail" value="<?php echo $row_usuario['email']; ?>"><br><br>



			<label>Ramal: </label>
			<input type="text" name="ramal" placeholder="3618-7959" value="<?php echo $row_usuario['ramal']; ?>"><br><br>
			
			<label>Nome: </label>
			<input type="nome" name="nome" placeholder="Warley Mendes" value="<?php echo $row_usuario['nome']; ?>"><br><br>

			<label>E-mail: </label>
			<input type="email" name="email" placeholder="informatica.prominas@faculdadeunica.com.br" value="<?php echo $row_usuario['email']; ?>"><br><br>

			<label>Whatsapp: </label>
			<input type="nome" name="whatsapp" placeholder="(31)9 9157-9749" value="<?php echo $row_usuario['whatsapp']; ?>"><br><br>

			<label>Horario de Almoço: </label>
			<input type="nome" name="hr_almoco" placeholder="12:30 AS 13:30"  value="<?php echo $row_usuario['hr_almoco']; ?>"><br><br>
			<label>Setor: </label>
			<input type="nome" name="setor" placeholder="informatica" value="<?php echo $row_usuario['setor']; ?>"><br><br>
			
			<input type="submit" value="Editar">
		</form>
	</body>
</html>