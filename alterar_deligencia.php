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


$idDeligencia = $con->escape_string($_POST['idDeligencia']);




if(!empty($_POST['idUsuario'])){
    $idUsuarioNovo = $con->escape_string($_POST['idUsuario']);
    
    $sql_usuario_novo = "SELECT * FROM usuario where idUsuario = $idUsuarioNovo";
    $res = $con->query($sql_usuario_novo);
    $linha_usuario_novo = $res->fetch_assoc();

    
    
    $con->query("UPDATE deligencia set idUsuario = '$idUsuarioNovo' where idDeligencia = '$idDeligencia'");
    $con->query("INSERT INTO historico_deligencia (dataAlteracao,horaAlteracao,situacao,idUsuario, idDeligencia)VALUES('$data_hoje', '$hora', '$nomeUsuario encaminhou para $linha_usuario_novo[nomeUsuario]', '$idUsuario', '$idDeligencia')");
 echo "<script>alert('Encaminhado para outro GM!');window.location='deligencia_gm.php'</script>";
}else{

  $situacao = $con->escape_string($_POST['situacao']);  
  $con->query("INSERT INTO historico_deligencia (dataAlteracao,horaAlteracao,situacao,idUsuario, idDeligencia)VALUES('$data_hoje', '$hora', '$situacao', '$idUsuario', '$idDeligencia')");
echo "<script>window.location='consultar_deligencia.php'</script>";
exit;
}
?>