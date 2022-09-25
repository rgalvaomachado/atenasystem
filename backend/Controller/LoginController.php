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
        $representantes = json_decode($RepresentanteController->getRepresentantes());
        foreach($representantes as $representate){
            if($usuario == $representate->usuario && $senha == $representate->senha){
                $usuarioValidado = $representate->usuario;
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
            return json_encode([
                "access" => true
            ]);
        }else{
            return json_encode([
                "access" => false,
                "message" => "Usuário ou senha incorreta",
            ]);
        }
    }

    function logout(){
	    session_start();
        $_SESSION['usuario'] =  "";
        $_SESSION['modo'] = "";
        session_destroy();
        return json_encode([
            "access" => true
        ]);
    }
    function verificaLogin(){
	    session_start();
        if ($_SESSION['modo'] != '') {
            return json_encode([
                "access" => true
            ]);
        } else {
            return json_encode([
                "access" => false
            ]);
        }
    }
}
?>