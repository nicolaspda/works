<?php

if(!isset($_SESSION)){
    session_start();
}

require("conexao.php");

$emailLoginGoogle = $_SESSION['Email'];
$tele = ($_POST['tele']);



$altera_tel = "UPDATE `usuarios` SET `Telefone`= '$tele' WHERE `Email` = '$emailLoginGoogle'";
mysqli_query($link,$altera_tel);
echo $tele;



?>