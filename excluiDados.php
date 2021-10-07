<?php
if(!isset($_SESSION)){
    session_start();
}

require("conexao.php");

$id_vaga = $_POST['id_vaga'];

		$query = "DELETE FROM  anuncios WHERE id = '$id_vaga'";	

		mysqli_query($link,$query);
		echo true;
				

?>
