<?php
    include_once('../Model/Alune.php');
    include_once('PresencaController.php');
    
    class AluneController{
        function getAlunes(){
            $alunes = new Alune();
            return $alunes->getAlunes();
        }

        function getAlune($id){
            $alune = new Alune();
            return $alune->getAlune($id);
        }

        function getAlunesSala($sala){
            $alunes = new Alune();
            $alunes->sala = $sala;
            return $alunes->getAlunesSala();
        }

        function criarAlune($post){
            $alune = new Alune();
            $alune->nome = $post['nome'];
            $alune->sala = $post['sala'];
            $alune->criar();
            header('Location: ../AluneCadastro.php?sucess=true');
        }

        function buscarAlune($post){
            $id = $post['alune'];
            header('Location: ../AluneEditar.php?alune='.$id);
        }

        function salvarAlune($post){
            $alune = new Alune();
            $alune->nome = $post['nome'];
            $alune->sala = $post['sala'];
            $alune->salvar($post['id']);
            header('Location: ../AluneEditar.php?sucess=true');
        }

        function excluirAlune($post){
            $PresencaController = new PresencaController();
            $PresencaController->deletaPresencaAlune($post['id']);
            $alune = new Alune();
            $alune->id = $post['id'];
            $alune->excluir();
            header('Location: ../AluneEditar.php?delete=true');
        }
    }
?>