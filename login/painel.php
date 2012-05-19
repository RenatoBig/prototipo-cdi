<?php
// Incluindo arquivo de conexão/configuração
require_once('config/conn.php');

// Instanciando novo objeto da classe Login
$objLogin = new Login();

// Verificando se o usuário está logado, caso contrá será redirecionado para a página de login
if (!$objLogin->verificar('index.html'))
    // Finalizado o script, apenas para garantir que o usuário irá ver o conteúdo da página
    exit;

// Selecionando informações do usuário
$query = mysql_query("SELECT * FROM usuarios WHERE id = {$objLogin->getID()}");
$usuario = mysql_fetch_object($query);
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Painel do usuário logado</title>
    </head>
    <body>
        <h1>Painel</h1>

        <p>Bem vindo <strong><?php echo $usuario->nome; ?></strong></p>

        Informações da sessão:

        <ul>
            <li><strong>ID:</strong> <?php echo $objLogin->getID() ?></li>
            <li><strong>Matrícula:</strong> <?php echo $objLogin->getLogin() ?></li>
			<li><strong>Aniversário:</strong> <?php echo $objLogin->getNasc() ?></li>
        </ul>

        <a href="sair.php">Sair</a>
    </body>
</html>
