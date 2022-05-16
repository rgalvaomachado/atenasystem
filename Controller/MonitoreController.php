<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/Model/Monitore.php");
    $metodo = isset($_POST['metodo']) ? $_POST['metodo'] : ""; 

    switch($metodo){
        case 'criar':
            $monitore = new Monitore();
            $monitore->nome = $_POST['nome'];
            $monitore->usuario = $_POST['usuario'];
            $monitore->senha = $_POST['senha'];
            $monitore->criarMonitore();
            header('Location: ../monitore/cadMonitore.php?sucess=true');
        break;
        case 'buscar':
            $id = $_POST['monitore'];
            header('Location: ../monitore/editMonitore.php?monitore='.$id);
        break;
        case 'salvar':
            $monitore = new Monitore();
            $monitore->nome = $_POST['nome'];
            $monitore->usuario = $_POST['usuario'];
            $monitore->senha = $_POST['senha'];
            $monitore->salvarMonitore($_POST['id']);
            header('Location: ../monitore/editMonitore.php?sucess=true');
        break;
        case 'excluir':
            $monitore = new Monitore();
            $monitore->id = $_POST['id'];
            $monitore->excluir();
            header('Location: ../monitore/editMonitore.php?delete=true');
        break;
    }

    class MonitoreController{
        function getMonitores(){
            $monitores = new Monitore();
            return $monitores->getMonitores();
        }

        function getMonitore($id){
            $monitore = new Monitore();
            return $monitore->getMonitore($id);
        }
    }
?>