<?php
include "connection.php";
$sql = $conn->query("SELECT * FROM conteudos");
$query_resultados = $sql->fetchAll(PDO::FETCH_ASSOC);
var_dump($query_resultados);
?>