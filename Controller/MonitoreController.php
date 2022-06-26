<?php
    include_once("../Model/Monitore.php");

    class MonitoreController{
        function getMonitores(){
            $monitores = new Monitore();
            return $monitores->getMonitores();
        }

        function getMonitore($id){
            $monitore = new Monitore();
            return $monitore->getMonitore($id);
        }

        function buscarMonitore($post){
            $id = $post['monitore'];
            header('Location: ../monitore/editMonitore.php?monitore='.$id);
        }
        function criarMonitore($post){
            $monitore = new Monitore();
            $monitore->nome = $post['nome'];
            $monitore->usuario = $post['usuario'];
            $monitore->senha = $post['senha'];
            $monitore->criarMonitore();
            header('Location: ../monitore/cadMonitore.php?sucess=true');
        }

        function salvarMonitore($post){
            $monitore = new Monitore();
            $monitore->nome = $post['nome'];
            $monitore->usuario = $post['usuario'];
            $monitore->senha = $post['senha'];
            $monitore->salvarMonitore($post['id']);
            header('Location: ../monitore/editMonitore.php?sucess=true');
        }

        function excluirMonitore($post){
            $monitore = new Monitore();
            $monitore->id = $post['id'];
            $monitore->excluir();
            header('Location: ../monitore/editMonitore.php?delete=true');
        }
    }
?>