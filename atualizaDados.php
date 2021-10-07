<?php
if(!isset($_SESSION)){
    session_start();
}

require("conexao.php");

$idusuario = $_SESSION['idusuario'];
$telefone = $_POST['telefone'];
$senha = md5($_POST['senha']);
$senhaConfirma  = md5($_POST['senhaConfirma']);


	$consulta = mysqli_query($link, "SELECT * FROM usuarios WHERE idusuario = '$idusuario'");

			if ($consulta && mysqli_num_rows($consulta) == 1) {

				$query = ("UPDATE usuarios SET Telefone = '$telefone', senha = '$senha' WHERE idUsuario = '$idusuario'");	

				mysqli_query($link,$query);
				echo true;
				

				} else{

					echo false;
				}


?>
