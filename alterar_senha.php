<?php
include_once "dao/conexao.php";
session_start();
$result_usuario = "SELECT * FROM usuario where idUsuario = '$_SESSION[idUsuario]'";
$res = $con->query($result_usuario);
$linha = $res->fetch_assoc();
$senha_db = $linha['senha'];

$senha_atual = $_POST['senha_atual'];
$nova_senha = $_POST['nova_senha'];
$confirma_senha = $_POST['confirma_senha'];

if($nova_senha == $confirma_senha){

if(password_verify($senha_atual,$senha_db))
{
    $senha_segura = password_hash($nova_senha, PASSWORD_DEFAULT);
    $update_senha = "UPDATE usuario set senha = '$senha_segura' where idUsuario = '$_SESSION[idUsuario]'";
    if($con->query($update_senha) === true){
        echo "<script>alert('Senha Atualizada com sucesso.');window.location='index.php'</script>";
    }
}else{
    echo "<script>alert('Senha atual Incorreta!');window.location='index.php'</script>";
    exit();
}

}else{
    echo "<script>alert('Senha e confirmação incorreta!');window.location='index.php'</script>";
    exit();
}



