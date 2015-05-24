<?php
/**
 * Created by PhpStorm.
 * User: deders
 * Date: 23/05/15
 * Time: 01:29
 */
    $aluno = new Aluno($conexao);
    $id = $_GET["editar?id"];
    $result = $aluno->findById($id);

    if (isset($_POST['editar'])){
        $aluno->setId($_POST['id'])->setNome($_POST['nome'])->setNota($_POST['nota']);
        if ($aluno->alterar()){
            header("Location: index.php?editarmsg");
        }
    }
?>

<h3>Editar Dados</h3>
<form class="form-inline has-error has-feedback" method="post"><!--Form Editar-->
    <div class="form-group">
        <label for="exampleInputName2">Nome</label>
        <input type="text" class="form-control" name="nome" id="nome" value="<?php echo $result['nomealuno']; ?>" required="true">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail2">Nota</label>
        <input type="number" class="form-control" name="nota" id="nota" value="<?php echo $result['notaaluno']; ?>" required="true">
    </div>
    <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $result['idalunos']; ?>">
    <button type="submit" class="btn btn-default" name="editar">Editar</button>

</form>