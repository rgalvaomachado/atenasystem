<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/Controller/MonitoreController.php");

$usuario = $_POST['usuario'];
$senha = md5($_POST['senha']);
$validado = false;

$usuarioAdmin = "atena";
$senhaAdmin = "b80a922b6556a69861aed7cd54cab9cf";

if($usuario == $usuarioAdmin && $senha == $senhaAdmin){
    $usuarioValidado = $usuarioAdmin;
    $modoValidado = 'admin';
    $validado = true;
}

$MonitoreController = new MonitoreController();
$monitores = $MonitoreController->getMonitores();
foreach($monitores as $monitore){
    if($usuario == $monitore['usuario'] && $senha == $monitore['senha']){
        $usuarioValidado = $monitore['usuario'];
        $modoValidado = 'monitore';
        $validado = true;
    }
}

if($validado){
    session_start();
    $_SESSION['usuario'] =  $usuarioValidado;
    $_SESSION['modo'] = $modoValidado;
    header('location:../home.php');
}else{
    header('location:../index.php?error=1');
}
?>