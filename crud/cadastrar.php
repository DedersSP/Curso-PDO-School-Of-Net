<?php
/**
 * Created by PhpStorm.
 * User: deders
 * Date: 23/05/15
 * Time: 01:29
 */

if (isset($_POST['cadastrar'])){
    $aluno = new Aluno($conexao);
    $aluno->setNome($_POST['nome'])->setNota($_POST['nota']);
    if ($aluno->inserir()){
        echo '<p class="bg-success">Aluno(a) '.$aluno->getNome().' Cadastrado com Sucesso!</p>';
    }
}
?>

<h3>Cadastrar Alunos</h3>
<form class="form-inline has-error has-feedback" method="post"><!--Form Cadastrar-->
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