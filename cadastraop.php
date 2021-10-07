<?php
if(!isset($_SESSION)){
    session_start();
}

require("conexao.php");


$idUsuario = $_SESSION['idusuario'];
$name = $_POST['name'];
$descricao = $_POST['descricao'];
$valor = $_POST['valor'];
$lat = $_POST['lat'];
$lng = $_POST['lng'];
$cat = $_POST['categoria'];
$id_vaga = $_POST['id_vaga'];

	foreach ($_POST['categoria2'] as $cate2){ 
		if(!empty($cate2)) {
			$cat2 = $cate2;
		}
		else if(!isset($cat2)){
			$cat2 = $cate2;
		}
	}

if(!empty($id_vaga)){
	$query = "UPDATE anuncios SET name = '$name', descricao = '$descricao', valor = '$valor', categoria = '$cat', categoria2 = '$cat2' WHERE id = '$id_vaga'";	

		mysqli_query($link,$query);
		echo "Oportunidade atualizada com sucesso!";

}else{



$query = ("INSERT INTO `anuncios` (`name`, `address`, `lat`, `lng`, `type`, `descricao`, `situacao`, `tempoAtivo`, `valor`, `categoria`, `categoria2`, `FKusuarioID` ) VALUES ('$name', 'any', '$lat', '$lng', 'qualquer 1', '$descricao', 'ativo', '2018-04-28', '$valor', '$cat', '$cat2', '$idUsuario')");

mysqli_query($link,$query);

echo "Oportunidade cadastrada com sucesso!";
}

?>
