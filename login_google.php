<?php

if(!isset($_SESSION)){
    session_start();
}

require("conexao.php");


$email_google = filter_input(INPUT_POST, 'userEmail', FILTER_SANITIZE_STRING);
$name_google = filter_input(INPUT_POST, 'userName', FILTER_SANITIZE_STRING);
$_SESSION['Email'] = $email_google; // Variavel de sessao para utilzar o no update de telefone login_google_prim.php



$login_google = mysqli_query($link, "SELECT * FROM usuarios WHERE Email = '$email_google'"); //A Query p/ contar as linhas tem que ser dessa forma

$resultado_usuario = "SELECT Nome, idusuario, Telefone  FROM usuarios WHERE Email = '$email_google'"; // e a Query pra buscar dados tem que ser dessa


if ($login_google && mysqli_num_rows($login_google) == 1) { 

	$result = mysqli_query($link, $resultado_usuario);  // joga o resultado da query aqui

    
    while($row = $result->fetch_assoc()) {
     
     
		$_SESSION['idusuario'] = $row["idusuario"];
		$_SESSION['Nome'] = $row["Nome"];
		$_SESSION['Telefone'] = $row["Telefone"];

      }


	echo 1;
	
		
}

else if ($login_google && mysqli_num_rows($login_google) < 1) { 


$sql = ("insert into usuarios (nome,telefone,email,senha) values ('$name_google','123','$email_google','123')");
mysqli_query($link,$sql);

echo 2;
}

else{
	echo 0;
	
		
		//variavel de sessao "error" sendo alimentada com a msg de erro
		$error = "username/password incorrect";
		$_SESSION["error"] = $error;
	
}




?>