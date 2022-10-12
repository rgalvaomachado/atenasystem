<?php
    include_once('Database.php');

    class Tutore extends BD{
        public $nome;
        public $disciplina;

        function criar(){
            $criar = $this->bd->prepare('INSERT INTO tutore (nome, cod_disciplina) VALUES(:nome, :cod_disciplina)');
            $criar->execute([
                ':nome' => $this->nome,
                ':cod_disciplina' => $this->disciplina
            ]);
            return $this->bd->lastInsertId();
        }
        
        function getTutores(){
            $getTutores =  $this->bd->prepare('SELECT id, nome, cod_disciplina FROM tutore ORDER BY nome ASC');
            $getTutores->execute();
            return $getTutores->fetchAll(PDO::FETCH_ASSOC);
        }

        function getTutore($id){
            $getTutore =  $this->bd->prepare('SELECT id, nome, cod_disciplina FROM tutore WHERE id = :id ORDER BY nome ASC');
            $getTutore->execute([
                ':id' => $id,
            ]);
            return $getTutore->fetch(PDO::FETCH_ASSOC);
        }

        function salvar($id){
            $salvar = $this->bd->prepare('UPDATE tutore SET nome = :nome, cod_disciplina = :cod_disciplina WHERE id = :id');
            $salvar->execute(array(
              ':id'   => $id,
              ':nome' => $this->nome,
              ':cod_disciplina' => $this->disciplina,
            ));
            return $salvar->rowCount();
        }
        
        function excluir(){
            $excluir = $this->bd->prepare('DELETE FROM tutore where id = :id');
            $excluir->execute([
              ':id' => $this->id,
            ]);
            return $excluir->rowCount();
        }
    }
?>