<?php
session_start();
include_once("conexao.php");

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$ramal = filter_input(INPUT_POST, 'ramal', FILTER_SANITIZE_STRING);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$whatsapp = filter_input(INPUT_POST, 'whatsapp', FILTER_SANITIZE_STRING);
$hr_almoco = filter_input(INPUT_POST, 'hr_almoco', FILTER_SANITIZE_STRING);
$setor = filter_input(INPUT_POST, 'setor', FILTER_SANITIZE_STRING);

//echo "Nome: $nome <br>";
//echo "E-mail: $email <br>";

$result_usuario = "UPDATE usuarios SET ramal='$ramal', nome='$nome', email='$email', whatsapp='$whatsapp', hr_almoco='$hr_almoco', setor='$setor', modified=NOW() WHERE id='$id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);

if(mysqli_affected_rows($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Usuário editado com sucesso</p>";
	header("Location: index.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Usuário não foi editado com sucesso</p>";
	header("Location: editar.php?id=$id");
}
