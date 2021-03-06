<?php
/**
 * Created by PhpStorm.
 * User: deders
 * Date: 20/05/15
 * Time: 02:43
 * Criando um arquivo SQL
 */

require_once 'Aluno.class.php';
require_once 'ServiceDb.class.php';


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
                <a class="navbar-brand" href="">PDO CRUD | School Of Net</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php">Home</a></li>
                    <li><a href="index.php?cadastrar">Cadastrar Aluno</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>

    <div class="container">
        <?php
            if (isset($_GET["cadastrar"])){
                include 'cadastrar.php';
            }
        ?>

        <?php
        if (isset($_GET["editar?id"]) > 0){
            include 'editar.php';
        }

        if (isset($_GET["editarmsg"])){
            echo '<p class="bg-success">Alteração realizada com Sucesso!</p>';
        }
        ?>

        <?php
            $aluno = new Aluno();
            $servicedb = new ServiceDb($conexao, $aluno);
            if (isset($_GET['delete']) > 0){
                $servicedb->deletar($_GET['delete']);
                echo '<p class="bg-success">Aluno Excluido com Sucesso!</p>';
            }
        ?>


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
            <?php
                foreach ($servicedb->listar() as $key){
                    echo "<tr>";
                    echo "<td>".$key['idalunos']."</td>";
                    echo "<td>".$key['nomealuno']."</td>";
                    echo "<td style='text-align: center'>".$key['notaaluno']."</td>";
                    echo "<td style='text-align: center'> <a href='index.php?editar?id=".$key['idalunos']."'>Editar</a> | <a href='index.php?delete=".$key['idalunos']."'>Excluir</a></td>";
                    echo "</tr>";
                }
            ?>


        </table>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

</body>
</html>