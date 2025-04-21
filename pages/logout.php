<?php
session_start();
session_unset(); // remove todas as variáveis de sessão
session_destroy(); // destrói a sessão

// Redireciona para a página inicial (não logado)
header("Location: /jardim/index.php");
exit;
?>