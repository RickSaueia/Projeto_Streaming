<?php
session_start();
include  "../connection.php";
$email = $_POST['email'];
$senha = $_POST['senha'];

if (empty($email) || empty($senha)) {
    die("Por favor, preencha todos os campos.<br><a href=form_login.php>Voltar</a>");
}

$consulta = $conn->query("SELECT * FROM usuarios WHERE email = '$email' and senha = '$senha'");
$resultado = $consulta->fetch(PDO::FETCH_ASSOC);

if($resultado){
    session_start();
    $_SESSION['id_usuario'] = $resultado['id_usuario'];
    $_SESSION['nome_session'] = $resultado['nome'];
    $_SESSION['email_session'] = $email;
    $_SESSION['senha_session'] = $senha;
    $_SESSION['plano_session'] = $resultado['plano_assinatura'];
    header('location:../index.php');

}else{
    $_SESSION['erro_usuario'] = "E-mail ou senha inválidos!";
    header("location:pg_login.php");
    exit();
}


?>