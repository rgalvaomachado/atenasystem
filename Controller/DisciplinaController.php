<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/Model/Disciplina.php");
    $metodo = isset($_POST['metodo']) ? $_POST['metodo'] : ""; 
    switch($metodo){
        case 'criar':
            $disciplina = new Disciplina();
            $disciplina->nome = $_POST['nome'];
            $disciplina->criar();
            header('Location: ../disciplina/cadDisciplina.php?sucess=true');
        break;
        case 'buscar':
            $id = $_POST['disciplina'];
            header('Location: ../disciplina/editDisciplina.php?disciplina='.$id);
        break;
        case 'salvar':
            $disciplina = new Disciplina();
            $disciplina->nome = $_POST['nome'];
            $disciplina->salvar($_POST['id']);
            header('Location: ../disciplina/editDisciplina.php?sucess=true');
        break;
        case 'excluir':
            $disciplina = new Disciplina();
            $disciplina->id = $_POST['id'];
            $disciplina->excluir();
            header('Location: ../disciplina/editDisciplina.php?delete=true');
        break;
    }
    
    class DisciplinaController{
        function getDisciplinas(){
            $disciplinas = new Disciplina();
            return $disciplinas->getDisciplinas();
        }

        function getDisciplina($id){
            $disciplina = new Disciplina();
            return $disciplina->getDisciplina($id);
        }
    }
?>