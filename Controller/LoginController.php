<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/Controller/MonitoreController.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/Controller/RepresentanteController.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/Controller/ComissaoController.php");
$metodo = isset($_POST['metodo']) ? $_POST['metodo'] : ""; 

switch($metodo){
    case 'login':
        $usuario = $_POST['usuario'];
        $senha = md5($_POST['senha']);
        $validado = false;

        $RepresentanteController = new RepresentanteController();
        $representates = $RepresentanteController->getRepresentantes();
        foreach($representates as $representate){
            if($usuario == $representate['usuario'] && $senha == $representate['senha']){
                $usuarioValidado = $representate['usuario'];
                $modoValidado = 'representate';
                $validado = true;
            }
        }

        $ComissaoController = new ComissaoController();
        $comissoes = $ComissaoController->getComissoes();
        foreach($comissoes as $comissao){
            if($usuario == $comissao['usuario'] && $senha == $comissao['senha']){
                $usuarioValidado = $comissao['usuario'];
                $modoValidado = 'comissao';
                $validado = true;
            }
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
    break;
}
?>