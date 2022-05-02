<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/Model/Tutore.php");
    $metodo = isset($_POST['metodo']) ? $_POST['metodo'] : ""; 

    switch($metodo){
        case 'criar':
            $tutore = new Tutore();
            $tutore->nome = $_POST['nome'];
            $tutore->disciplina = $_POST['disciplina'];
            $tutore->criarTutore();
            header('Location: ../tutore/cadTutore.php?sucess=true');
        break;
        case 'buscar':
            $id = $_POST['tutore'];
            header('Location: ../tutore/editTutore.php?tutore='.$id);
        break;
        case 'salvar':
            var_dump($_POST);
            $monitore = new Tutore();
            $monitore->nome = $_POST['nome'];
            $monitore->disciplina = $_POST['disciplina'];
            $monitore->salvarMonitore($_POST['id']);
            header('Location: ../tutore/editTutore.php?sucess=true');
        break;
    }

    class TutoreController{
        function getTutores(){
            $tutores = new Tutore();
            return $tutores->getTutores();
        }

        function getTutore($id){
            $tutore = new Tutore();
            return $tutore->getTutore($id);
        }
    }
?>