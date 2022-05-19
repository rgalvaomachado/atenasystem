<?php
    class BD{
        public $bd;
        public $err;
        public $username = 'epiz_31638575';     // Usuário do banco de dados
        public $password = 'WJPD7CHZw7Q7oB';  // Senha do banco de dados
        public $host = 'sql209.epizy.com'; // Endereço IP do banco de dados
        public $dataBase = 'epiz_31638575_atenasystem';

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