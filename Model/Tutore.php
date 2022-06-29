<?php
    include_once('Database.php');

    class Tutore extends BD{
        public $nome;
        public $disciplina;

        function criarTutore(){
            $stmt = $this->bd->prepare('INSERT INTO tutore (nome, cod_disciplina) VALUES(:nome, :cod_disciplina)');
            $stmt->execute([
                ':nome' => $this->nome,
                ':cod_disciplina' => $this->disciplina
            ]);
        }
        
        function getTutores(){
            $getTutores =  $this->bd->prepare('SELECT id,nome,cod_disciplina FROM tutore ORDER BY nome ASC');
            $getTutores->execute();
            return $getTutores->fetchAll(PDO::FETCH_ASSOC);
        }

        function getTutore($id){
            $getTutore =  $this->bd->prepare('SELECT nome,cod_disciplina FROM tutore WHERE id = :id ORDER BY nome ASC');
            $getTutore->execute([
                ':id' => $id,
            ]);
            return $getTutore->fetch(PDO::FETCH_ASSOC);
        }

        function salvar($id){
            $stmt = $this->bd->prepare('UPDATE tutore SET nome = :nome, cod_disciplina = :cod_disciplina WHERE id = :id');
            $stmt->execute(array(
              ':id'   => $id,
              ':nome' => $this->nome,
              ':cod_disciplina' => $this->disciplina,
            ));
        }
        
        function excluir(){
            $stmt = $this->bd->prepare('DELETE FROM tutore where id = :id');
            $stmt->execute([
              ':id' => $this->id,
            ]);
        }
    }
?>