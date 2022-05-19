<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/Controller/MonitoreController.php");

$usuario = $_POST['usuario'];
$senha = md5($_POST['senha']);
$validado = false;


//DEV
// $usuarioAdmin = "admin";
// $senhaAdmin = "21232f297a57a5a743894a0e4a801fc3"; //admin

// $usuarioComicao = "comicao";
// $senhaComicao = "21232f297a57a5a743894a0e4a801fc3"; //admin

//PROD
$usuarioAdmin = "atena";
$senhaAdmin = "1c9ad86591e3d561b450a3e7391f327f";

$usuarioComicao = "cdfatena";
$senhaComicao = "33e3052368ec84ee5e67635db6bee271";


if($usuario == $usuarioComicao && $senha == $senhaComicao){
    $usuarioValidado = $usuarioComicao;
    $modoValidado = 'comicao';
    $validado = true;
}

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