<?php
include_once('MonitoreController.php');
include_once('RepresentanteController.php');
include_once('ComissaoController.php');

class LoginController{
    function login($post){
        $usuario = $post['usuario'];
        $senha = $post['senha'];
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
            // header('location:../home.php');
            echo json_encode([
                "redirect" => "../home.php"
            ]);
        }else{
            // header('location:../index.php?error=1');
            echo json_encode([
                "redirect" => "../index.php?error=1"
            ]);
        }
    }
}
?>