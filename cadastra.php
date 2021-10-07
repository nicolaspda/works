<?php
if(!isset($_SESSION)){
    session_start();
}

require("conexao.php");




$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$senha = md5($_POST['senha']);
$senhaConfirma  = md5($_POST['senhaConfirma']);


	$consulta = mysqli_query($link, "SELECT * FROM usuarios WHERE Email = '$email'");



			if ($consulta && mysqli_num_rows($consulta) == 0) {

				echo true;


				$query = ("insert into usuarios (nome,telefone,email,senha) values ('$nome','$telefone','$email','$senha')");
				//echo "Cadastro efetuado com sucesso" . PHP_EOL;
            //   // Query para obter os dados sendo repassada para outra variável @result
				

				mysqli_query($link,$query);
				

				$dadosLogin = "SELECT idusuario, Nome  FROM usuarios WHERE Email = '$email'";
								$result = mysqli_query($link, $dadosLogin);


				   

				while($row = $result->fetch_assoc()) {
                 
                 
                $_SESSION['idusuario'] = $row["idusuario"];
                $_SESSION['Nome'] = $row["Nome"];


                }

				//mysqli_close($link);




				} else{
					echo false;


					//echo "O E-mail informado já encontra-se cadastrado." . PHP_EOL;
				}


				








?>
