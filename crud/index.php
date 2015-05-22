<?php
/**
 * Created by PhpStorm.
 * User: deders
 * Date: 20/05/15
 * Time: 02:43
 * Criando um arquivo SQL
 */

try{
    $conexao = new PDO("mysql:host=localhost;dbname=teste", "root", "deders");
    $conexao->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8');
}catch (PDOException $e) {
    die ("Não possível estabelecer a conexão com o banco de dados. Erro = " . $e->getMessage());
}

/*//listar os que têm as três maiores notas
echo "<h3>Considerando notas de 1 a 10 - Listamos os alunos com as 3 maiores notas</h3>\n";
$query = "select * from alunos where notaaluno >= 8 order by notaaluno DESC";
$stmt = $conexao->prepare($query);
if ($stmt->execute()){
    foreach ($stmt->fetchAll(\PDO::FETCH_ASSOC) as $aluno){
        echo $aluno['idalunos']." | ".$aluno['nomealuno']." | ".$aluno['notaaluno']."<br>";
    }
}else {
    echo "Não alunos com notas igual ou superior a 8!";
}*/



/*//listar todos os alunos
echo "<h3>Listando todos os Alunos</h3>";
$query = "select * from alunos order by nomealuno ASC";
$stmt = $conexao->prepare($query);
if ($stmt->execute()){
    foreach ($stmt->fetchAll(\PDO::FETCH_ASSOC) as $aluno){
        echo $aluno['idalunos']." | ".$aluno['nomealuno']." | ".$aluno['notaaluno']."<br>";
    }
}else {
    echo "Não alunos com notas igual ou superior a 8!";
}*/

/*//Delete Aluno
$id = "a";
$query = "delete from alunos where idalunos=:id";
$stmt = $conexao->prepare($query);
$stmt->bindValue(':id', $id);
if ($id != null and is_int($id)){
    $stmt->execute();
}else{
    echo "O Id do Aluno não esta preenchido ou não é um numero valido!";
}*/


//Inserir Aluno
/*$query = "insert into alunos (nomealuno, notaaluno) values ('Flávia Takeda', 6)";
$stmt = $conexao->prepare($query);
$stmt->execute();*/

?>
<!doctype html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PDO CRUD | School of Net</title>
    <link rel="stylesheet" href="css/style.css"/>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">PDO CRUD | School Of Net</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <h3>Cadastrar Alunos</h3>
        <form class="form-inline has-error has-feedback"><!--Form Cadastrar-->
            <div class="form-group">
                <label for="exampleInputName2">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome" placeholder="Informe Nome Completo" required="true">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail2">Nota</label>
                <input type="number" class="form-control" name="nota" id="nota" placeholder="Informe a nota do aluno" required="true">
            </div>
            <button type="submit" class="btn btn-default" name="cadastrar">Cadastrar</button>
        </form>
    </div>


    <div class="container">

        <h3>Lista de Alunos</h3>

        <table class="table table-striped">
            <tr>
            <th style="text-align: center">Id</th>
            <th style="text-align: center">Aluno</th>
            <th style="text-align: center">Nota</th>
            <th style="text-align: center">Editar</th>
            </tr>
            <tr>
                <td>1</td>
                <td>André Batista</td>
                <td style="text-align: center">10</td>
                <td style="text-align: center">Editar | Excluir</td>
            </tr>
        </table>

    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

</body>
</html>