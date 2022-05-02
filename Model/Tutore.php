<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/Model/BD.php");

    class Tutore extends BD{
        public $nome;
        public $disciplina;

        function criarTutore(){
            $stmt = $this->bd->prepare('INSERT INTO tutore (nome, disciplina) VALUES(:nome, :disciplina)');
            $stmt->execute([
                ':nome' => $this->nome,
                ':disciplina' => $this->disciplina
            ]);
        }
        
        function getTutores(){
            $getTutores =  $this->bd->prepare('SELECT id,nome,disciplina FROM tutore ORDER BY nome');
            $getTutores->execute();
            return $getTutores->fetchAll(PDO::FETCH_ASSOC);
        }

        function getTutore($id){
            $getTutore =  $this->bd->prepare('SELECT nome,disciplina FROM tutore WHERE id = :id ');
            $getTutore->execute([
                ':id' => $id,
            ]);
            return $getTutore->fetch(PDO::FETCH_ASSOC);
        }

        function salvarMonitore($id){
            $stmt = $this->bd->prepare('UPDATE tutore SET nome = :nome, disciplina = :disciplina WHERE id = :id');
            $stmt->execute(array(
              ':id'   => $id,
              ':nome' => $this->nome,
              ':disciplina' => $this->disciplina,
            ));
        }
    }
?>