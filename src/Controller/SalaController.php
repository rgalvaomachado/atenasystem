<?php
    include_once('../Model/Sala.php');

    class SalaController{
        function getSalas(){
            $salas = new Sala();
            return json_encode($salas->getSalas());
        }

        function getSala($id){
            $sala = new Sala();
            return $sala->getSala($id);
        }

        function criarSala($post){
            $sala = new Sala();
            $sala->nome = $post['nome'];
            $sala->criar();
            header('Location: ../sala/cadSala.php?sucess=true');
        }

        function buscarSala($post){
            $id = $post['sala'];
            header('Location: ../sala/editSala.php?sala='.$id);
        }

        function salvarSala($post){
            $sala = new Sala();
            $sala->nome = $post['nome'];
            $sala->salvar($post['id']);
            header('Location: ../sala/editSala.php?sucess=true');
        }

        function excluirSala($post){
            $sala = new Sala();
            $sala->id = $post['id'];
            $sala->excluir();
            header('Location: ../sala/editSala.php?delete=true');
        }
    }
?>