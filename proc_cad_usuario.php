<?php
session_start();
include_once("conexao.php");
$ramal = filter_input(INPUT_POST, 'ramal', FILTER_SANITIZE_EMAIL);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$whatsapp = filter_input(INPUT_POST, 'whatsapp', FILTER_SANITIZE_EMAIL);
$hr_almoco = filter_input(INPUT_POST, 'hr_almoco', FILTER_SANITIZE_EMAIL);
$setor = filter_input(INPUT_POST, 'setor', FILTER_SANITIZE_EMAIL);

//echo "Nome: $nome <br>";
//echo "E-mail: $email <br>";
//echo "ramal: $ramal <br>";

$result_usuario = "INSERT INTO usuarios (ramal, nome, email, whatsapp, hr_almoco, setor, created) VALUES ('$ramal', '$nome','$email','$whatsapp','$hr_almoco','$setor', NOW())";
$resultado_usuario = mysqli_query($conn, $result_usuario);

if(mysqli_insert_id($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Usuário cadastrado com sucesso</p>";
	header("Location: index.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Usuário não foi cadastrado com sucesso</p>";
	header("Location: cad_usuario.php");
}
