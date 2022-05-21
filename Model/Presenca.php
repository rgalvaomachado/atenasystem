<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/Model/BD.php");

    class Presenca extends BD{
        public $cod_alune;
        public $cod_sala;
        public $cod_tutore;
        public $cod_monitore;
        public $aula;
        public $presente;
        public $data;
        public $data_final;

        function presencaAlune(){
            $stmt = $this->bd->prepare('
                INSERT INTO presenca (cod_alune, cod_sala, cod_tutore, cod_monitore, aula, presente, data)
                VALUES(:cod_alune, :cod_sala, :cod_tutore, :cod_monitore, :aula, :presente, :data)
            ');
            $stmt->execute([
                ':cod_alune' => $this->cod_alune,
                ':cod_sala' => $this->cod_sala,
                ':cod_tutore' => 0,
                ':cod_monitore' => 0,
                ':aula' => $this->aula,
                ':presente' => $this->presente,
                ':data' => $this->data
            ]);
        }

        function presencaTutore(){
            $stmt = $this->bd->prepare('
                INSERT INTO presenca (cod_alune, cod_sala, cod_tutore, cod_monitore, aula, presente, data)
                VALUES(:cod_alune, :cod_sala, :cod_tutore, :cod_monitore, :aula, :presente, :data)
            ');
            $stmt->execute([
                ':cod_alune' => 0,
                ':cod_sala' => $this->cod_sala,
                ':cod_tutore' => $this->cod_tutore,
                ':cod_monitore' => 0,
                ':aula' => $this->aula,
                ':presente' => $this->presente,
                ':data' => $this->data
            ]);
        }

        function presencaMonitore(){
            $stmt = $this->bd->prepare('
                INSERT INTO presenca (cod_alune, cod_sala, cod_tutore, cod_monitore, aula, presente, data)
                VALUES(:cod_alune, :cod_sala, :cod_tutore, :cod_monitore, :aula, :presente, :data)
            ');
            $stmt->execute([
                ':cod_alune' => 0,
                ':cod_sala' => $this->cod_sala,
                ':cod_tutore' => 0,
                ':cod_monitore' => $this->cod_monitore,
                ':aula' => 0,
                ':presente' => $this->presente,
                ':data' => $this->data
            ]);
        }

        function presencaReuniao(){
            $stmt = $this->bd->prepare('
                INSERT INTO presenca (cod_alune, cod_sala, cod_tutore, cod_monitore, aula, presente, data)
                VALUES(:cod_alune, :cod_sala, :cod_tutore, :cod_monitore, :aula, :presente, :data)
            ');
            $stmt->execute([
                ':cod_alune' => 0,
                ':cod_sala' => 0,
                ':cod_tutore' => $this->cod_tutore,
                ':cod_monitore' => 0,
                ':aula' => 0,
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

        function buscarPresencaTutore(){
            $buscarPresencaTutore =  $this->bd->prepare('
                SELECT presente 
                FROM presenca 
                WHERE cod_tutore = :cod_tutore AND data = :data 
            ');
            $buscarPresencaTutore->execute([
                ':cod_tutore' => $this->cod_tutore,
                ':data' => $this->data
            ]);
            return $buscarPresencaTutore->fetch(PDO::FETCH_ASSOC);
        }

        function justificarPresencaAlune(){
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

        function justificarPresencaTutore(){
            $stmt = $this->bd->prepare('
                UPDATE presenca
                SET presente = :presente 
                WHERE cod_tutore = :cod_tutore AND data = :data 
            ');
            $stmt->execute(array(
                ':cod_tutore' => $this->cod_tutore,
                ':data' => $this->data,
                ':presente' => $this->presente
            ));
        }

        function getPresencaPeriodo(){
            $getPresencaPeriodo =  $this->bd->prepare('
                SELECT *
                FROM presenca
                WHERE 
                    cod_sala = :cod_sala 
                    AND cod_monitore = :cod_monitore 
                    AND cod_tutore = :cod_tutore 
                    AND cod_alune = :cod_alune 
                    AND data BETWEEN :data AND :data_final AND presente = \'S\'
            ');
            $getPresencaPeriodo->execute([
                ':cod_sala' => $this->cod_sala,
                ':cod_monitore' => $this->cod_monitore,
                ':cod_tutore' => $this->cod_tutore,
                ':cod_alune' => $this->cod_alune,
                ':data' => $this->data,
                ':data_final' => $this->data_final,
            ]);
            return $getPresencaPeriodo->fetchAll(PDO::FETCH_ASSOC);
        } 

        function getAusenciaPeriodo(){
            $getAusenciaPeriodo =  $this->bd->prepare('
                SELECT *
                FROM presenca
                WHERE 
                    cod_sala = :cod_sala 
                    AND cod_monitore = :cod_monitore 
                    AND cod_tutore = :cod_tutore 
                    AND cod_alune = :cod_alune 
                    AND data BETWEEN :data AND :data_final AND presente = \'N\'
            ');
            $getAusenciaPeriodo->execute([
                ':cod_sala' => $this->cod_sala,
                ':cod_monitore' => $this->cod_monitore,
                ':cod_tutore' => $this->cod_tutore,
                ':cod_alune' => $this->cod_alune,
                ':data' => $this->data,
                ':data_final' => $this->data_final,
            ]);
            return $getAusenciaPeriodo->fetchAll(PDO::FETCH_ASSOC);
        } 
        
        function getJustificadoPeriodo(){
            $getJustificadoPeriodo =  $this->bd->prepare('
                SELECT *
                FROM presenca
                WHERE 
                    cod_sala = :cod_sala 
                    AND cod_monitore = :cod_monitore 
                    AND cod_tutore = :cod_tutore 
                    AND cod_alune = :cod_alune 
                    AND data BETWEEN :data AND :data_final AND presente = \'J\'
            ');
            $getJustificadoPeriodo->execute([
                ':cod_sala' => $this->cod_sala,
                ':cod_monitore' => $this->cod_monitore,
                ':cod_tutore' => $this->cod_tutore,
                ':cod_alune' => $this->cod_alune,
                ':data' => $this->data,
                ':data_final' => $this->data_final,
            ]);
            return $getJustificadoPeriodo->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>