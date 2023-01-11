<?php
    include_once('../Model/Sala.php');

    class SalaController{
        function getSalas(){
            $salas = new Sala();
            return $salas->getSalas();
        }

        function getSala($id){
            $sala = new Sala();
            return $sala->getSala($id);
        }

        function criarSala($post){
            $sala = new Sala();
            $sala->nome = $post['nome'];
            $sala->criar();
            header('Location: ../SalaCadastro.php?sucess=true');
        }

        function buscarSala($post){
            $id = $post['sala'];
            header('Location: ../SalaEditar.php?sala='.$id);
        }

        function salvarSala($post){
            $sala = new Sala();
            $sala->nome = $post['nome'];
            $sala->salvar($post['id']);
            header('Location: ../SalaEditar.php?sucess=true');
        }

        function excluirSala($post){
            $sala = new Sala();
            $sala->id = $post['id'];
            $sala->excluir();
            header('Location: ../SalaEditar.php?delete=true');
        }
    }
?>