<?php
if(!isset($_SESSION)){
    session_start();
}
	require("conexao.php"); 
	$id_mark = $_POST['id_marker'];

    $sql = "SELECT id, name, descricao, valor FROM anuncios WHERE id = '$id_mark' ";
	$result = mysqli_query($link, $sql);

    while($row = $result->fetch_assoc()) {


     echo " ID: " . $row["id"];
     echo "<br> Titulo: " . $row["name"];
     echo "<br>  Descrição: " . $row["descricao"];
     echo "<br>  Valor: " . $row["valor"];
    }

?>