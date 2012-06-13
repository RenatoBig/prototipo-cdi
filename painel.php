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
<!DOCTYPE html>
<html lang="pt">
	<head>
	<meta name="description" content="Gestão de Estrutura - CDI"  />
	<meta name="keywords" content="Custos, Gestão, Estrutura Formal, Modelo de gestão" />
	<meta name="author" content="Renato Pinheiro Pinto" />
	<meta charset="UTF-8" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="css/main2.css">
	<link type="text/css" href="css/jquery-ui-1.8.19.custom.css" rel="Stylesheet" />
	
	<!-- Jquery JavaScritps -->	
	<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
	<script src="js/jquery-ui-1.8.19.custom.min.js" type="text/javascript"></script>
	
	<!-- /* Script para o Jquery AUTOCOMPLETE */ -->
<script type="text/javascript">
		$(document).ready(function()
		{
			$('.input').autocomplete(
			{
				source: "search.php",
				minLength: 2
			});
		});
</script>
	
	<title>Gestão de Estrutura - CDI - SMSJP</title>
	
	</head>
	<body>
	 <p>Bem vindo <strong><?php echo $usuario->nome; ?></strong></p>
    <div id="menu">
        <ul>
            <li><strong>ID:</strong> <?php echo $objLogin->getID() ?></li>
            <li><strong>Matrícula:</strong> <?php echo $objLogin->getLogin() ?></li>
			<li><strong>Aniversário:</strong> <?php echo $objLogin->getNasc() ?></li>
	    <li><a href="sair.php">Sair</a></li>
        </ul>
    </div>
       	<hr width="100%" /> 	
	<h1>Gestão de Estrutura - CDI</h1>
	<h2> Informação Humanizada e Sistemas de Informação</h2>
		<ol type="1">
			<li>Gestão de Usuários (Sistemas)</li>
				<ol type="a">
					<li><a href="cdi.usuarios.php">Administração de Usuários</a> (Recursos Humanos e Gestão de Sistemas)</li>
				</ol>
			<li>Gestão de INTEGRAÇÃO (Integrador de Dados)</li>
				<ol type="a">
					<li><a href="cdi.integrador_dados.php" value="Integrador de Dados">Organização do Integrador de Dados</a> (Sarah - CDI)</li>
					<li><a href="cdi.perm_unidadesfuncionais.php" value="Unidades Funcionais Permanentes">Unidades Funcionais Permanentes</a>(Sarah - CDI)</li>
				</ol>
			<li>Gestão de Documentos, Relatórios, Processos entre outros modelos de abstratos</li>
				<ol type="a">
						<li><a href="cdi.perm_gruposdegastos.php">Estruturação dos Grupos de Gastos do PNGC</a> (CUSTOS)</li>
						<li><a href="cdi.estrutura_composicao_pngc.php">Estruturação da Composição de Custos</a> (CUSTOS)</li>
						<li><a href="cdi.tipo_objeto_custos.php">Modelo de relação Universal entre Objetos </a> (EXPERIMENTAL)</li>
						<li><a href="cdi.perm_tipodocumentos.php">Estruturação de modelos de documentos oficializados e operacionais</a> (Administração)</li>
				</ol>
			<li>Gestão de Locais Físicos das Unidades (Administração Setorial e Geoprocessamento)</li>
				<ol type="a">
					<li><a href="cdi.tb_pseudocnes_unidades.php">Construção de PseudoCnes e Agrupamento de CNES</a></li>
				</ol>
			<li>Visualização e homologação de EQUIPAMENTOS E MATERIAIS (Núcleo de Equipamentos)</li>
				<ol type="a">
					<li><a href="cdi.itens_equipamentos.php">Homologação de Itens, Equipamentos e Materiais</a></li>
				</ol>
		</ol>
		
		<p>Possível ferramenta de busca incondicional (Experimental): <input type="text" id="test2" class="input" /></p>

		

	</body>

</html>