<?php 

include_once "dao/conexao.php";

setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
session_start();
$data_hoje = date("Y-m-d");
$hora = date("H:i:s");



$sql_usuario = "SELECT * FROM usuario where idUsuario = $_SESSION[idUsuario]";
$res = $con->query($sql_usuario);
$linha_usuario = $res->fetch_assoc();
$idUsuario = $linha_usuario['idUsuario'];
$nomeUsuario = $linha_usuario['nomeUsuario'];
$senha_db = $linha_usuario['senha'];


$idDeligencia = $con->escape_string($_POST['idDeligencia']);
$senhaValidacao = $con->escape_string($_POST['senhaValidacao']);

if(password_verify($senhaValidacao,$senha_db)){
        
    $con->query("UPDATE deligencia set situacao = 1 where idDeligencia = '$idDeligencia'");
    $con->query("INSERT INTO historico_deligencia (dataAlteracao,horaAlteracao,situacao,idUsuario, idDeligencia)VALUES('$data_hoje', '$hora', 'Concluído', '$idUsuario', '$idDeligencia')");
    
    if($linha_usuario['acesso'] == 1){
        echo "<script>alert('Concluído com sucesso!');window.location='deligencia_gm.php'</script>";
    }else{
        echo "<script>alert('Concluído com sucesso!');window.location='consultar_deligencia.php'</script>";
    }
    

}else{
    echo "<script>alert('Senha Invalida!');window.location='consultar_deligencia.php'</script>";
}





    



?>