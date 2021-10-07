<?php
if(!isset($_SESSION)){
    session_start();
}

	// estabelece conexao a base de dados
	require("conexao.php");

 
	// receber o pedido de login com segurança
	$email = mysqli_real_escape_string($link, $_POST['Email']);
	$password = ($_POST['Senha']);
	$senha_codificada = md5($password); // Senha digitada sendo criptografada
	 
	// Query para receber a pesquisa de usuário destinada apenas a verificaçao de linhas
	$login = mysqli_query($link, "SELECT idusuario, Nome, Telefone, Email FROM usuarios WHERE Email = '$email' AND Senha = '$senha_codificada' ");

	// Query para receber a pesquisa de usuário destinada a utilização dos dados
	$dadosLogin = "SELECT Email, Nome, idusuario, Telefone  FROM usuarios WHERE Email = '$email' AND Senha = '$senha_codificada'";
 
	
	// se o número de linhas obtidos na query $login for igual a 1 permite a entrada dentro do IF

	if ($login && mysqli_num_rows($login) == 1) {
	
	// Query para obter os dados sendo repassada para outra variável @result

	$result = mysqli_query($link, $dadosLogin);

	// Dados da linha "$row" da query  na variavel "$result sendo associadas as variaveis de sessao"
    while($row = $result->fetch_assoc()) {
     
     
		$_SESSION['idusuario'] = $row["idusuario"];
		$_SESSION['Nome'] = $row["Nome"];
		$_SESSION['Telefone'] = $row["Telefone"];
		$_SESSION['Email'] = $row["Email"];


	

	// Redirecionando usuário com as variaves de sessao alimentadas para a pagina principalUser.php
		//header('Location: principalUser.php');

	
      }

      				echo true;

	
	}else {
 		
 		echo false;

		// Se o login falhar

		//variavel de sessao "error" sendo alimentada com a msg de erro
		$error = "username/password incorrect";
		$_SESSION["error"] = $error;
		

		echo "Utilizador ou Senha invalidos!";
				
	}

?>