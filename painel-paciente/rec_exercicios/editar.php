<?php 

require_once("../../conexao.php");
@session_start();

$id = $_POST['id_2'];



$pdo->query("UPDATE exercicios_pacientes set feito = 'Sim'  where id = '$id' ");


echo "Editado com Sucesso!!";





?>