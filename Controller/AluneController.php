<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/Model/Alune.php");
    require_once($_SERVER["DOCUMENT_ROOT"]."/Controller/PresencaController.php");
    
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
            header('Location: ../alune/cadAlune.php?sucess=true');
        }

        function buscarAlune($post){
            $id = $post['alune'];
            header('Location: ../alune/editAlune.php?alune='.$id);
        }

        function salvarAlune($post){
            $alune = new Alune();
            $alune->nome = $post['nome'];
            $alune->sala = $post['sala'];
            $alune->salvar($post['id']);
            header('Location: ../alune/editAlune.php?sucess=true');
        }

        function excluirAlune($post){
            $PresencaController = new PresencaController();
            $PresencaController->deletaPresencaAlune($post['id']);
            $alune = new Alune();
            $alune->id = $post['id'];
            $alune->excluir();
            header('Location: ../alune/editAlune.php?delete=true');
        }
    }
?>