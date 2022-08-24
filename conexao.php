<?php
    try{
        $pdo = new PDO("mysql:dbname=ortopelve;host=localhost", "root", "");
    }catch(Exception $e){
        echo "Erro ao conectar com o banco de dados! ".$e;
    }
?>