<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/Model/Representante.php");
    $metodo = isset($_POST['metodo']) ? $_POST['metodo'] : ""; 

    switch($metodo){
        case 'criar':
            $representante = new Representante();
            $representante->nome = $_POST['nome'];
            $representante->usuario = $_POST['usuario'];
            $representante->senha = $_POST['senha'];
            $representante->criarRepresentante();
            header('Location: ../representante/cadRepresentante.php?sucess=true');
        break;
        case 'buscar':
            $id = $_POST['representante'];
            header('Location: ../representante/editRepresentante.php?representante='.$id);
        break;
        case 'salvar':
            $representante = new Representante();
            $representante->nome = $_POST['nome'];
            $representante->usuario = $_POST['usuario'];
            $representante->senha = $_POST['senha'];
            $representante->salvarRepresentante($_POST['id']);
            header('Location: ../representante/editRepresentante.php?sucess=true');
        break;
        case 'excluir':
            $representante = new Representante();
            $representante->id = $_POST['id'];
            $representante->excluir();
            header('Location: ../representante/editRepresentante.php?delete=true');
        break;
    }

    class RepresentanteController{
        function getRepresentantes(){
            $representantes = new Representante();
            return $representantes->getRepresentantes();
        }

        function getRepresentante($id){
            $representante = new Representante();
            return $representante->getRepresentante($id);
        }
    }
?>