<?php
$server = "VPR0681554W11-1\SQLEXPRESS";
$banco = "Projeto_Streaming_web";
$user = "sa";
$pass = "123456";

try{
    $conn = new PDO("sqlsrv:server=$server;Database=$banco", $user, $pass);
    
}catch(PDOException $e){
    echo $e->getMessage();
}


?>