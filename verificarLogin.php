<?php
// inicia a sessão
if(!isset($_SESSION)){
    session_start();
} 
if (empty($_SESSION['idusuario'])) {
 
	// se não existe sessão iniciada redirecionar para a principal.php
	
	header('Location: principal.php');
	exit();
}


?>