<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/Model/Comissao.php");

    class ComissaoController{
        function getComissoes(){
            $comissoes = new Comissao();
            return $comissoes->getComissoes();
        }

        function getComissao($id){
            $comissao = new Comissao();
            return $comissao->getComissao($id);
        }

        function criarComissao($post){
            $comissao = new Comissao();
            $comissao->nome = $post['nome'];
            $comissao->usuario = $post['usuario'];
            $comissao->senha = $post['senha'];
            $comissao->criarComissao();
            header('Location: ../comissao/cadComissao.php?sucess=true');
        }

        function buscarComissao($post){
            $id = $post['comissao'];
            header('Location: ../comissao/editComissao.php?comissao='.$id);
        }

        function salvarComissao($post){
            $comissao = new Comissao();
            $comissao->nome = $post['nome'];
            $comissao->usuario = $post['usuario'];
            $comissao->senha = $post['senha'];
            $comissao->salvarComissao($post['id']);
            header('Location: ../comissao/editComissao.php?sucess=true');
        }

        function excluirComissao($post){
            $comissao = new Comissao();
            $comissao->id = $post['id'];
            $comissao->excluir();
            header('Location: ../comissao/editComissao.php?delete=true');
        }
    }
?>