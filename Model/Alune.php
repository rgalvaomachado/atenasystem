<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/Model/BD.php");

    class Alune extends BD{
        public $nome;
        public $sala;

        function criar(){
            $stmt = $this->bd->prepare('INSERT INTO alune (nome, sala) VALUES(:nome, :sala)');
            $stmt->execute([
                ':nome' => $this->nome,
                ':sala' => $this->sala,
            ]);
        }

        function getAlunes(){
            $getAlunes =  $this->bd->prepare('SELECT id,nome,sala FROM alune ORDER BY nome');
            $getAlunes->execute();
            return $getAlunes->fetchAll(PDO::FETCH_ASSOC);
        }

        function getAlune($id){
            $getMonitore =  $this->bd->prepare('SELECT nome,sala FROM alune WHERE id = :id ');
            $getMonitore->execute([
                ':id' => $id,
            ]);
            return $getMonitore->fetch(PDO::FETCH_ASSOC);
        }

        function salvar($id){
            $stmt = $this->bd->prepare('UPDATE alune SET nome = :nome, sala = :sala WHERE id = :id');
            $stmt->execute(array(
              ':id'   => $id,
              ':nome' => $this->nome,
              ':sala' => $this->sala
            ));
        }
    }
?>