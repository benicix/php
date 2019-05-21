<?php

    class ConexaoDAO{
        
        private $host, $user, $password, $dbname;
        public $vConn;

        public function abrirConexao(){
            $host = "localhost";
            $user = "root";
            $password = "";
            $dbName = "northwind"; 
            $vConn = mysqli_connect($host, $user, $password, $dbName);

            return $vConn;
        }

        function fechaConexao(){
            mysqli_close($this->vConn);
        }
    }
?>
