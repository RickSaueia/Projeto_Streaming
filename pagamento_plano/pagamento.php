<?php
include "../connection.php";
include "../session.php";
$nome = $_POST['nome_cartão'];
$numero = $_POST['numero_cartão'];
$valiade = $_POST['validade'];
$cvc = $_POST['cvc'];
$valor = 30.00;
$forma_pagamento = $_POST['forma_pagamento'];
$status_pagamento = "Completo";
$id_usuario = $_SESSION['id_usuario'];
 
 
//Cadastrar cartão
$sql = $conn->query("INSERT INTO cartao(nome_cartão,numero_cartão,validade,cvc)VALUES
('$nome','$numero','$valiade','$cvc')");
 
echo "<h1>Cadastro efetuado com sucesso!</h1>";
 
 
if (!isset($_SESSION['id_usuario'])) {
    echo "<h1>Erro: Usuário não autenticado.</h1>";
    exit;
}
 
 
//Forma pagamento
if (empty($forma_pagamento)) {
    echo "<h1>Erro: Forma de pagamento não selecionada.</h1>";
    exit;
}
 
try {
    $sql = $conn->prepare("INSERT INTO pagamentos(valor, forma_pagamento, status_pagamento, id_usuario)
                            VALUES ('$valor', '$forma_pagamento', '$status_pagamento', '$id_usuario')");
 
 
    $sql->execute([$valor, $forma_pagamento,$status_pagamento,$id_usuario]);
 
    echo "<h1>Pagamento cadastrado com sucesso!</h1>";
    header("location:../index.php");

    $sql = $conn->query("UPDATE usuarios SET plano_assinatura = 'Premium' where id_usuario = '$id_usuario'");

 
} catch (PDOException $e) {
    echo "<h1>Erro ao cadastrar o pagamento: " . $e->getMessage() . "</h1>";
}
 
 
 
?>