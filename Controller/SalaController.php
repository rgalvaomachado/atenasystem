<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/Model/Sala.php");
    $metodo = isset($_POST['metodo']) ? $_POST['metodo'] : ""; 
    switch($metodo){
        case 'criar':
            $sala = new Sala();
            $sala->nome = $_POST['nome'];
            $sala->criar();
            header('Location: ../sala/cadSala.php?sucess=true');
        break;
        case 'buscar':
            $id = $_POST['sala'];
            header('Location: ../sala/editSala.php?sala='.$id);
        break;
        case 'salvar':
            $sala = new Sala();
            $sala->nome = $_POST['nome'];
            $sala->salvar($_POST['id']);
            header('Location: ../sala/editSala.php?sucess=true');
        break;
        case 'excluir':
            $sala = new Sala();
            $sala->id = $_POST['id'];
            $sala->excluir();
            header('Location: ../sala/editSala.php?delete=true');
        break;
    }
    
    class SalaController{
        function getSalas(){
            $salas = new Sala();
            return $salas->getSalas();
        }

        function getSala($id){
            $sala = new Sala();
            return $sala->getSala($id);
        }
    }
?>