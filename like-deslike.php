<?php
session_start();
include "connection.php";

$id_user = $_SESSION['id_usuario'];
$id_conteudo = $_GET['id_conteudo'];
$avaliacao = "Like"; // "Like" ou "Deslike"

try {
    // Verifica se o usuário já interagiu com esse conteúdo
    $query = $conn->prepare("SELECT avaliacoes FROM interacoes WHERE id_usuario = ? AND id_conteudo = ?");
    $query->execute([$id_user, $id_conteudo]);
    $resultado = $query->fetch(PDO::FETCH_ASSOC);

    if ($resultado) {
        if ($resultado['avaliacoes'] === $avaliacao) {
            // Se já tem o mesmo Like ou Deslike, remove a interação
            $sql = $conn->prepare("DELETE FROM interacoes WHERE id_usuario = ? AND id_conteudo = ?");
            $sql->execute([$id_user, $id_conteudo]);
            $status = "removed";
        } else {
            // Se tem uma avaliação diferente, atualiza para a nova
            $sql = $conn->prepare("UPDATE interacoes SET avaliacoes = ? WHERE id_usuario = ? AND id_conteudo = ?");
            $sql->execute([$avaliacao, $id_user, $id_conteudo]);
            $status = "updated";
        }
    } else {
        // Se ainda não interagiu, insere a nova avaliação
        $sql = $conn->prepare("INSERT INTO interacoes (avaliacoes, id_usuario, id_conteudo) VALUES (?, ?, ?)");
        $sql->execute([$avaliacao, $id_user, $id_conteudo]);
        $status = "added";
    }

    // Conta os likes e dislikes
    $query = $conn->prepare("
        SELECT 
            SUM(CASE WHEN avaliacoes = 'Like' THEN 1 ELSE 0 END) as likes, 
            SUM(CASE WHEN avaliacoes = 'Deslike' THEN 1 ELSE 0 END) as deslikes
        FROM interacoes WHERE id_conteudo = ?
    ");
    $query->execute([$id_conteudo]);
    $counts = $query->fetch(PDO::FETCH_ASSOC);

    // Redireciona para index.php com os valores de status, likes e deslikes
    header("Location: index.php");
    exit(); // Certifique-se de chamar exit() após o header para garantir que o código pare por aqui

} catch (PDOException $e) {
    // Caso haja erro, redireciona para a página com erro
    header("Location: index.php");
    exit();
}
?>
