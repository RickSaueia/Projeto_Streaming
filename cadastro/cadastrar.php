<?php
session_start();
include "../connection.php";
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$cpf = $_POST['cpf'];
$plano_assinatura = "gratuito";
$confirmar_senha = $_POST['confirmar_senha'];


if (empty($nome) || empty($email) || empty($senha) || empty($cpf)) {
    die("Por favor, preencha todos os campos.<br><a href=form_cadastrar.php>Voltar</a>");
}


$dominios_permitidos = ['gmail.com', 'hotmail.com', 'outlook.com'];
$email_parts = explode('@', $email);
$dominio_email = end($email_parts);

if (!in_array($dominio_email, $dominios_permitidos)) {
    $_SESSION['erro_email'] = "E-Mail inválido";
    header("location: pg_cadastro.php");
    exit();
}


$dominios_permitidos = ['gmail.com', 'hotmail.com', 'outlook.com'];

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['erro_email'] = "E-Mail inválido!";
    header("location: pg_cadastro.php");
    exit();
}


$email_parts = explode('@', $email);

if (count($email_parts) != 2 || empty($email_parts[0])) {
    $_SESSION['erro_email'] = "E-Mail inválido!";
    header("location:   pg_cadastro.php");
    exit();
}

$dominio_email = $email_parts[1];

if (!in_array($dominio_email, $dominios_permitidos)) {
    $_SESSION['erro_email'] = "E-Mail deve ser @gmail.com, @hotmail.com ou @outlook.com!";
    header("location: pg_cadastro.php");
    exit();
}

if (!preg_match('/^\d{3}\.\d{3}\.\d{3}-\d{2}$/', $cpf)) {
    session_start();
    $_SESSION['erro_cpf'] = "CPF Inválido!";
    header("location: pg_cadastro.php");
    exit();
}


try {

    $query = $conn->prepare("SELECT * FROM usuarios WHERE email = :email");
    $query->bindValue(":email", $email);
    $query->execute();
    $resultado = $query->fetch(PDO::FETCH_ASSOC);

    if ($resultado) {
        $_SESSION['erro_email'] = "E-Mail já existente!";
        header("location: pg_cadastro.php");
        exit();
    } else {
        if ($senha != $confirmar_senha) {
            $_SESSION['erro_senha'] = "Senhas não coincidem!";
            header("location: pg_cadastro.php");
            exit();
        } else {
            $sql_cadastrar = $conn->prepare("INSERT INTO usuarios (nome, email, senha, cpf, plano_assinatura) VALUES (:nome, :email, :senha, :cpf, :plano_assinatura)");

            $sql_cadastrar->bindValue(":nome", $nome);
            $sql_cadastrar->bindValue(":email", $email);
            $sql_cadastrar->bindValue(":senha", $senha);
            $sql_cadastrar->bindValue(":cpf", $cpf);
            $sql_cadastrar->bindValue(":plano_assinatura", $plano_assinatura);
            $executar_cadastro = $sql_cadastrar->execute();
            header("location:../login/pg_login.php");
        }
    }
} catch (Exception $e) {
    echo "Erro no banco de dados: " . $e->getMessage();
}
