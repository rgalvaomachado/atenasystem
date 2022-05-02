<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/Model/BD.php");

    class Disciplina extends BD{
        public $nome;
        public $disciplina;

        function criar(){
            $stmt = $this->bd->prepare('INSERT INTO disciplina (nome) VALUES(:nome)');
            $stmt->execute([
                ':nome' => $this->nome
            ]);
        }

        function getDisciplinas(){
            $getDisciplina =  $this->bd->prepare('SELECT id,nome FROM disciplina ORDER BY nome');
            $getDisciplina->execute();
            return $getDisciplina->fetchAll(PDO::FETCH_ASSOC);
        }

        function getDisciplina($id){
            $getDisciplina =  $this->bd->prepare('SELECT nome FROM disciplina WHERE id = :id ');
            $getDisciplina->execute([
                ':id' => $id,
            ]);
            return $getDisciplina->fetch(PDO::FETCH_ASSOC);
        }

        function salvar($id){
            $stmt = $this->bd->prepare('UPDATE disciplina SET nome = :nome WHERE id = :id');
            $stmt->execute(array(
              ':id'   => $id,
              ':nome' => $this->nome,
            ));
        }
    }
?>