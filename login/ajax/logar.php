<?php
// Incluindo arquivo de conexão/configuração
require_once('../config/conn.php');

// Instanciando novo objeto da classe Login
$objLogin = new Login();

// Recuperando informações enviadas
$login = $_POST['login'];
$senha = $_POST['senha'];

// Se conseguir encontrar o usuário e a senha estiver correta
if ($objLogin->logar($login, $senha))
    // Retornando falso
    echo false;
else
    // Retornando mensagem de erro
    echo 'Login ou senha inválidos';
?>
