<?php
session_start();
include "connection.php";

$id_user = $_SESSION['id_usuario'];
$id_conteudo = $_GET['id_conteudo'];
$avaliacao = "Deslike"; 

try {
    
    $query = $conn->prepare("SELECT avaliacoes FROM interacoes WHERE id_usuario = ? AND id_conteudo = ?");
    $query->execute([$id_user, $id_conteudo]);
    $resultado = $query->fetch(PDO::FETCH_ASSOC);

    if ($resultado) {
        if ($resultado['avaliacoes'] === $avaliacao) {
       
            $sql = $conn->prepare("DELETE FROM interacoes WHERE id_usuario = ? AND id_conteudo = ?");
            $sql->execute([$id_user, $id_conteudo]);
            $status = "removed";
        } else {
    
            $sql = $conn->prepare("UPDATE interacoes SET avaliacoes = ? WHERE id_usuario = ? AND id_conteudo = ?");
            $sql->execute([$avaliacao, $id_user, $id_conteudo]);
            $status = "updated";
        }
    } else {
     
        $sql = $conn->prepare("INSERT INTO interacoes (avaliacoes, id_usuario, id_conteudo) VALUES (?, ?, ?)");
        $sql->execute([$avaliacao, $id_user, $id_conteudo]);
        $status = "added";
    }


    $query = $conn->prepare("
        SELECT 
            SUM(CASE WHEN avaliacoes = 'Like' THEN 1 ELSE 0 END) as likes, 
            SUM(CASE WHEN avaliacoes = 'Deslike' THEN 1 ELSE 0 END) as deslikes
        FROM interacoes WHERE id_conteudo = ?
    ");
    $query->execute([$id_conteudo]);
    $counts = $query->fetch(PDO::FETCH_ASSOC);

    
    header("Location: index.php");
    

} catch (PDOException $e) {
    
    header("Location: index.php");
    exit();
}
?>
