<?php 
include_once "conexao.php";

session_start();
$usuario = $_POST['user'];
$senha = $_POST['senha'];



$sql = "SELECT * FROM usuario WHERE userAcesso = '$usuario'  ";
	
$res = $con->query($sql);
$linha = $res->fetch_assoc();
	
    $id = $linha['idUsuario'];
	$nome = $linha['nomeUsuario'];
    $user = $linha['userAcesso'];
    $senha_db = $linha['senha'];
    $acesso = $linha['acesso'];	
    
    if($senha == $senha_db){
    $senha_segura = password_hash($senha, PASSWORD_DEFAULT);
    $updateSenha = $con->query("UPDATE usuario set senha = '$senha_segura' where idUsuario = '$id'");
    $select_senha_segura = "SELECT * FROM usuario where idUsuario = '$id'";        
    $res = $con->query($select_senha_segura);
    $linha_senha = $res->fetch_assoc();
    $senha_db = $linha_senha['senha'];
    }
    if ($usuario == $user && password_verify($senha, $senha_db))
    {
        session_start();
        $_SESSION['idUsuario'] = $id;
        $_SESSION['nomeUsuario'] = $nome;
		$_SESSION['idAdministrativo'] = $idAdministrativo;
		$_SESSION['idJovem'] = $idJovem;
        $_SESSION['userAcesso'] = $user;
        $_SESSION['acesso'] = $acesso;

	header('location: ../index.php');
    }
else 
{
	echo "<script>alert('Usuário ou senha incorreta !');window.location='../login.php'</script>";
}

?>
