<?php
header('Content-Type: text/html; charset=utf-8');

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
/*
## coments[For more info, samples, tips, screenshots, help, contact, forum, please visit phpMyDataGrid site]
## developerSite[http://www.gurusistemas.com/indexdatagrid.php]
## authorContact[For contact author: tavoarcila at gmail dot com or info at gurusistemas dot com]
*/ ?>
<!DOCTYPE html>
<html>
<head>
	<meta name="description" content="Gestão de Estrutura - CDI"  />
	<meta name="keywords" content="Custos, Gestão, Estrutura Formal, Modelo de gestão" />
	<meta name="author" content="Renato Pinheiro Pinto" />
	<meta charset="UTF-8" />
<title>phpMyDatagrid - Adaptando para o Prototipo CDI</title>

<?php
	
	include ("classes/phpmydatagrid.class.php");
	
	$objGrid = new datagrid;
	
	$objGrid -> friendlyHTML();

	$objGrid -> pathtoimages("./images/");

	$objGrid -> closeTags(true);  
	
	/* NOME DO FORM A SER CRIADO */
	$objGrid -> form('perm_unidadesfuncionais', true);
	
	$objGrid -> language("pt_br");
	
	$objGrid -> methodForm("post"); 
	
	//$objGrid -> total("salary,workeddays");
	
	/* CONSULTA DA GRADE */
	$objGrid -> searchby("codigoCatmat,categoriaEquipamento,nomeEquipamento");
	
	//$objGrid -> linkparam("sess=".$_REQUEST["sess"]."&username=".$_REQUEST["username"]);	 
	
	$objGrid -> decimalDigits(2);
	
	$objGrid -> decimalPoint(",");
	
	//include_once('adodb/adodb.inc.php');
	
	/* to use ADOdb is so simple as say true */
	$objGrid -> conectadb("127.0.0.1", "cdidesenv", "cdidesenv", "prototipo-cdi");
	
	/* NOME DA TABELA NO BANCO prototipo-cdi */
	$objGrid -> tabla ("perm_unidadesfuncionais");

	/* BOTÕES DA EDIÇÃO VIA FORMULÁRIO (não inline) */
	$objGrid -> buttons(true,true,true,true);
	
	$objGrid -> keyfield("id");

	$objGrid -> salt("Some Code4Stronger(Protection)");

	/* TÍTULO DA GRADE */
	$objGrid -> TituloGrid("CDI - Gestão de Estrutura - Unidades Funcionais (estrutura dos serviços de saúde)");

	$objGrid -> FooterGrid("<div style='float:right'>&copy; 2007 Gurusistemas.com / adaptado por Renato Pinheiro</div>");

	$objGrid -> datarows(20);
	
	$objGrid -> paginationmode('links');

	$objGrid -> orderby("id", "ASC");

	$objGrid -> noorderarrows();
	
	// Estrutura dos dados Matriciados			
	$objGrid -> FormatColumn("id","Id", 11, 11, 1, "50", "right", "integer");
	$objGrid -> FormatColumn("nomeUnidade","Nome da Unidade Funcional Permanente" , 100, 100, 0, "200", "center");
	$objGrid -> FormatColumn("descUnidade", "Descrição da Unidade", 100, 100, 0, "650", "center");
	// Data de Modificaçã e Usuários que modificaram o registro	
	$objGrid -> FormatColumn("dataMod", "última modificação", 50, 50, 2, "100", "center","date:dmy:/");
	$objGrid -> FormatColumn("usuario", "modificado por:", 50, 50, 2, "100", "center","select:{$objLogin->getLogin()}");
	
	
	//$objGrid -> where ("active = '1'");

	$objGrid -> setHeader();
?>

<!-- /* Sample Script to execute when user click over the photo link */ -->
<script type="text/javascript">
	function updatepicture(	code, name, lastname ){
		alert ("SAMPLE SCRIPT\n\nHere must go a process to update the picture or something else for:\n\nRecord ID:"+code+
				"\nName: "+ name +
				"\nLast name: "+ lastname );
	}
</script>
</head>

<body>
<?php 
	$objGrid -> ajax("silent");

	$objGrid -> grid();
	
	$objGrid -> desconectar();
?>
</body>
</html>