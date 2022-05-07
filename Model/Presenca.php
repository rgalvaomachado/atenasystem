<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/Model/BD.php");

    class Presenca extends BD{
        public $cod_alune;
        public $cod_sala;
        public $cod_tutore;
        public $aula;
        public $presente;
        public $data;

        function criar(){
            $stmt = $this->bd->prepare('
                INSERT INTO presenca (cod_alune, cod_sala, cod_tutore, aula, presente, data)
                VALUES(:cod_alune, :cod_sala, :cod_tutore, :aula, :presente, :data)
            ');
            $stmt->execute([
                ':cod_alune' => $this->cod_alune,
                ':cod_sala' => $this->cod_sala,
                ':cod_tutore' => 0,
                ':aula' => $this->aula,
                ':presente' => $this->presente,
                ':data' => $this->data
            ]);
        }

        function buscarPresencaAlune(){
            $buscarPresencaAlune =  $this->bd->prepare('
                SELECT presente 
                FROM presenca 
                WHERE cod_alune = :cod_alune AND cod_sala = :cod_sala AND aula = :aula AND data = :data 
            ');
            $buscarPresencaAlune->execute([
                ':cod_alune' => $this->cod_alune,
                ':cod_sala' => $this->cod_sala,
                ':aula' => $this->aula,
                ':data' => $this->data
            ]);
            return $buscarPresencaAlune->fetch(PDO::FETCH_ASSOC);
        }

        function justificarPreencaAlune(){
            $stmt = $this->bd->prepare('
                UPDATE presenca
                SET presente = :presente 
                WHERE cod_alune = :cod_alune AND cod_sala = :cod_sala AND aula = :aula AND data = :data 
            ');
            $stmt->execute(array(
                ':cod_alune' => $this->cod_alune,
                ':cod_sala' => $this->cod_sala,
                ':aula' => $this->aula,
                ':data' => $this->data,
                ':presente' => $this->presente
            ));
        }

    }
?>