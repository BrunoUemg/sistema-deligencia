<?php 

include_once "dao/conexao.php";

$nomeUsuario = $con->escape_string($_POST['nomeUsuario']);
$userAcesso = $con->escape_string($_POST['userAcesso']);


if($userAcesso == null){
    echo "<script>alert('Erro!');window.location='cadastrar_usuario.php'</script>";

    exit();
}

    $con->query("INSERT INTO usuario (userAcesso, senha, nomeUsuario, acesso)VALUES('$userAcesso', '$userAcesso', '$nomeUsuario', 2)");
    echo "<script>alert('Cadastrado com sucesso!');window.location='cadastrar_usuario.php'</script>";

?>