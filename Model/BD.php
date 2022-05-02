<?php
    class BD{
        public $bd;
        public $err;
        public $username = 'root';     // Usuário do banco de dados
        public $password = 'root';  // Senha do banco de dados
        public $host = '127.0.0.1'; // Endereço IP do banco de dados
        public $dataBase = 'atenasystem';

        function __construct(){
            try {
                $this->bd = new PDO('mysql:host='.$this->host.';dbname='.$this->dataBase,$this->username,$this->password);
                $this->bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $err ) {
                echo $this->err->getCode();
                echo $this->err->getMessage();
            }
        }
    }
?>