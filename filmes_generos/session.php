<?php
session_start();
$nome = isset($_SESSION['nome_session'])?$_SESSION['nome_session']:"";
$email = isset($_SESSION['email_session'])?$_SESSION['email_session']:"";
$id_user = isset($_SESSION['id_usuario'])?$_SESSION['id_usuario']:"";
$plano_assinatura = isset($_SESSION['plano_session'])?$_SESSION['plano_session']:"";
?>