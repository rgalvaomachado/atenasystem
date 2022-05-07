<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/Model/BD.php");

    class Alune extends BD{
        public $nome;
        public $sala;

        function criar(){
            $stmt = $this->bd->prepare('INSERT INTO alune (nome, cod_sala) VALUES(:nome, :cod_sala)');
            $stmt->execute([
                ':nome' => $this->nome,
                ':cod_sala' => $this->sala,
            ]);
        }

        function getAlunes(){
            $getAlunes =  $this->bd->prepare('SELECT id,nome,cod_sala FROM alune ORDER BY nome');
            $getAlunes->execute();
            return $getAlunes->fetchAll(PDO::FETCH_ASSOC);
        }

        function getAlunesSala(){
            $getAlunes =  $this->bd->prepare('SELECT id,nome FROM alune where cod_sala = :cod_sala');
            $getAlunes->execute([
                ':cod_sala' => $this->sala
            ]);
            return $getAlunes->fetchAll(PDO::FETCH_ASSOC);
        }

        function getAlune($id){
            $getAlune =  $this->bd->prepare('SELECT nome,cod_sala FROM alune WHERE id = :id ');
            $getAlune->execute([
                ':id' => $id,
            ]);
            return $getAlune->fetch(PDO::FETCH_ASSOC);
        }

        function salvar($id){
            $stmt = $this->bd->prepare('UPDATE alune SET nome = :nome, cod_sala = :cod_sala WHERE id = :id');
            $stmt->execute(array(
              ':id'   => $id,
              ':nome' => $this->nome,
              ':cod_sala' => $this->sala
            ));
        }
    }
?>