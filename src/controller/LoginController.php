<?php
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
            if(!isset($_SESSION)) {
                session_start();
            }
            
            $_SESSION['usuario'] =  $usuarioValidado;
            $_SESSION['modo'] = $modoValidado;
            echo json_encode([
                "redirect" => "/home"
            ]);
        }else{
            echo json_encode([
                "redirect" => "/login?error=1"
            ]);
        }
    }

    function logout(){
        session_start();
        $_SESSION['usuario'] =  "";
        $_SESSION['modo'] = "";
        session_destroy();
        // header('location:../index.php');
        echo json_encode([
            "redirect" => "/login"
        ]);
    }

    function getSession(){
        return [
            "logged" => !empty($_SESSION['usuario']),
            "usuario" => isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null,
            "modo" => isset($_SESSION['modo']) ? $_SESSION['modo'] : null
        ];
    }
}
?>