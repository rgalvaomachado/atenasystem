<?php
    include_once("../Model/Disciplina.php");

    class DisciplinaController{
        function getDisciplinas(){
            $disciplinas = new Disciplina();
            return $disciplinas->getDisciplinas();
        }

        function getDisciplina($id){
            $disciplina = new Disciplina();
            return $disciplina->getDisciplina($id);
        }

        function buscarDisciplina($post){
            $id = $post['disciplina'];
            header('Location: ../disciplina/editDisciplina.php?disciplina='.$id);
        }

        function criarDisciplina($post){
            $disciplina = new Disciplina();
            $disciplina->nome = $post['nome'];
            $disciplina->criar();
            header('Location: ../disciplina/cadDisciplina.php?sucess=true');
        }

        function salvarDisciplina($post){
            $disciplina = new Disciplina();
            $disciplina->nome = $post['nome'];
            $disciplina->salvar($post['id']);
            header('Location: ../disciplina/editDisciplina.php?sucess=true');
        }

        function excluirDisciplina($post){
            $disciplina = new Disciplina();
            $disciplina->id = $post['id'];
            $disciplina->excluir();
            header('Location: ../disciplina/editDisciplina.php?delete=true');
        }
    }
?>