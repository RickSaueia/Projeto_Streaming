<?php
session_start();
include "connection.php";

$id_user = $_SESSION['id_usuario'];
$id_conteudo = $_GET['id_conteudo'];
$like = "Like";

try {
    
    $query = $conn->prepare("SELECT COUNT(*) as total FROM interacoes WHERE avaliacoes = ? AND id_usuario = ? AND id_conteudo = ?");
    $query->execute([$like, $id_user, $id_conteudo]);
    $resultado = $query->fetch(PDO::FETCH_ASSOC);

    if ($resultado['total'] > 0) {
        
        $sql = $conn->prepare("DELETE FROM interacoes WHERE id_usuario = ? AND id_conteudo = ?");
        $sql->execute([$id_user, $id_conteudo]);
        echo json_encode(["status" => "removed"]);
    } else {
        
        $sql = $conn->prepare("INSERT INTO interacoes (avaliacoes, id_usuario, id_conteudo) VALUES (?, ?, ?)");
        $sql->execute([$like, $id_user, $id_conteudo]);
        echo json_encode(["status" => "added"]);
    }

    
    $query = $conn->prepare("SELECT COUNT(*) as total FROM interacoes WHERE id_conteudo = ? AND avaliacoes = ?");
    $query->execute([$id_conteudo, $like]);
    $like_count = $query->fetch(PDO::FETCH_ASSOC)['total'];

    
    header("location: pg_premium.php");

} catch (PDOException $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>
