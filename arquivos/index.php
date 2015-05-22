<?php

require_once 'EntidadeInterface.php';
require_once 'Usuario.php';
require_once 'ServiceDB.php';


try{
    $conexao = new PDO("mysql:host=localhost;dbname=teste", "root", "deders");
}catch (PDOException $e) {
    die ("Não possível estabelecer a conexão com o banco de dados. Erro = " . $e->getMessage());
}

$usuario = new Usuario();

//$usuario->setId(9);
//$usuario->setNome('João Batista')->setEmail('joao@mktreports.com.br');

//$servicedb = new ServiceDB($conexao, $usuario);
//$servicedb->inserir();





//$usuario = new Usuario();
//$id = 9;
//$servicedb = new ServiceDB($conexao, $usuario);
//$servicedb->deletar($id);

$resul = $conexao->prepare("SHOW COLUMNS FROM usuarios");
$fieldname = array();
if ($resul->execute()){
    while ($row = $resul->fetch()){
        $fieldname[] = $row['Field'];
    }
}

print_r($fieldname);
echo "<br>";
print_r(implode(',', $fieldname));



/*foreach ($servicedb->listar('nome desc') as $user){
    echo $user['id']." - ".$user['nome']." - ".$user['email']."<br>";
}*/


/*foreach($usuario->listar("nome desc") as $u) {
    echo $u['id']." | ".$u['nome']." | ".$u['email']."<br>";
}*/