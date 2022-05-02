<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/Model/Alune.php");
    $metodo = isset($_POST['metodo']) ? $_POST['metodo'] : ""; 

    switch($metodo){
        case 'criar':
            $sala = new Alune();
            $sala->nome = $_POST['nome'];
            $sala->sala = $_POST['sala'];
            $sala->criar();
            header('Location: ../alune/cadAlune.php?sucess=true');
        break;
        case 'buscar':
            $id = $_POST['alune'];
            header('Location: ../alune/editAlune.php?alune='.$id);
        break;
        case 'salvar':
            $sala = new Alune();
            $sala->nome = $_POST['nome'];
            $sala->sala = $_POST['sala'];
            $sala->salvar($_POST['id']);
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
    }
?>