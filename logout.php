<?php
// Inicia a sessão
if(!isset($_SESSION)){
    session_start();
} 
// Termina a sessao, excluindo todos os dados salvos nela
session_destroy();

// após terminar a sessao o usuário é redirecionado para a principal.php
header('Location: principal.php');
?>