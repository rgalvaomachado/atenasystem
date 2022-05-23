<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/Model/Comissao.php");
    $metodo = isset($_POST['metodo']) ? $_POST['metodo'] : ""; 

    switch($metodo){
        case 'criar':
            $comissao = new Comissao();
            $comissao->nome = $_POST['nome'];
            $comissao->usuario = $_POST['usuario'];
            $comissao->senha = $_POST['senha'];
            $comissao->criarComissao();
            header('Location: ../comissao/cadComissao.php?sucess=true');
        break;
        case 'buscar':
            $id = $_POST['comissao'];
            header('Location: ../comissao/editComissao.php?comissao='.$id);
        break;
        case 'salvar':
            $comissao = new Comissao();
            $comissao->nome = $_POST['nome'];
            $comissao->usuario = $_POST['usuario'];
            $comissao->senha = $_POST['senha'];
            $comissao->salvarComissao($_POST['id']);
            header('Location: ../comissao/editComissao.php?sucess=true');
        break;
        case 'excluir':
            $comissao = new Comissao();
            $comissao->id = $_POST['id'];
            $comissao->excluir();
            header('Location: ../comissao/editComissao.php?delete=true');
        break;
    }

    class ComissaoController{
        function getComissoes(){
            $comissoes = new Comissao();
            return $comissoes->getComissoes();
        }

        function getComissao($id){
            $comissao = new Comissao();
            return $comissao->getComissao($id);
        }
    }
?>