<?php

try{
    $conexao = new PDO("mysql:host=localhost;dbname=teste", "root", "deders");
    $query = "select * from usuarios WHERE id=:id";

    $stmt = $conexao->prepare($query);
    $stmt->bindValue(":id", $_GET['id'], PDO::PARAM_INT);
    $stmt->execute();

    print_r($stmt->fetchAll());

}catch (PDOException $e){
    echo "Não possível estabelecer a conexão com o banco de dados. Erro = ".$e->getMessage();
}