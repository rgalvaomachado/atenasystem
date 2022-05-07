<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/Model/Alune.php");
    $metodo = isset($_POST['metodo']) ? $_POST['metodo'] : ""; 

    switch($metodo){
        case 'criar':
            $alune = new Alune();
            $alune->nome = $_POST['nome'];
            $alune->sala = $_POST['sala'];
            $alune->criar();
            header('Location: ../alune/cadAlune.php?sucess=true');
        break;
        case 'buscar':
            $id = $_POST['alune'];
            header('Location: ../alune/editAlune.php?alune='.$id);
        break;
        case 'salvar':
            $alune = new Alune();
            $alune->nome = $_POST['nome'];
            $alune->sala = $_POST['sala'];
            $alune->salvar($_POST['id']);
            header('Location: ../Alune/editAlune.php?sucess=true');
        break;
    }

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
    }
?>