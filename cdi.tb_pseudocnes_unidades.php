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
	
	$objGrid -> form('gruposdegasto', true);
	
	$objGrid -> language("pt_br");
	
	$objGrid -> methodForm("post"); 
	
	//$objGrid -> total("salary,workeddays");
	
	$objGrid -> searchby("id,nomeGrupoGasto");
	
	//$objGrid -> linkparam("sess=".$_REQUEST["sess"]."&username=".$_REQUEST["username"]);	 
	
	$objGrid -> decimalDigits(2);
	
	$objGrid -> decimalPoint(",");
	
	//include_once('adodb/adodb.inc.php');
	
	/* to use ADOdb is so simple as say true */
	$objGrid -> conectadb("127.0.0.1", "cdidesenv", "cdidesenv", "prototipo-cdi");
	
	$objGrid -> tabla ("tb_pseudocnes_unidades");

	$objGrid -> buttons(true,true,true,true);
	
	$objGrid -> keyfield("id");

	$objGrid -> salt("Some Code4Stronger(Protection)");

	$objGrid -> TituloGrid("CDI - Gestao de Estrutura. Tabela de PseudoCnes");

	$objGrid -> FooterGrid("<div style='float:right'>&copy; 2007 Gurusistemas.com / adaptado por Renato Pinheiro</div>");

	$objGrid -> datarows(20);
	
	$objGrid -> paginationmode('links');

	$objGrid -> orderby("distritoSanitario", "ASC");

	$objGrid -> noorderarrows();
	
	//TABELA

				
	//$objGrid -> FormatColumn("id","Id", 11, 11, 0, "15", "right", "integer");
	$objGrid -> FormatColumn("pseudoCnes","Pseudo Cnes" , 20, 20, 0, "70", "right");
	$objGrid -> FormatColumn("cpfCnpj", "CPF/CNPJ", 50, 50, 0, "70", "center");
	$objGrid -> FormatColumn("nomeFantasia", "Nome da Unidade", 100, 100, 0, "100", "center");
	$objGrid -> FormatColumn("razaoSocial", "Razão social", 100, 100, 0, "120", "center");
	$objGrid -> FormatColumn("razaoSocialMantenedora", "Razão social mantenedora", 100, 100, 0, "120", "center");
	$objGrid -> FormatColumn("logradouro", "Local", 100, 100, 0, "100", "center");
	$objGrid -> FormatColumn("complemento", "Complemento", 100, 100, 0, "100", "center");
	$objGrid -> FormatColumn("bairro", "bairro", 100, 100, 0, "100", "center");
	$objGrid -> FormatColumn("telefone", "Telefone", 11, 11, 0, "50", "center");
	$objGrid -> FormatColumn("fax", "Fax", 11, 11, 0, "50", "center");
	$objGrid -> FormatColumn("email", "Email", 100, 100, 0, "50", "center");
	$objGrid -> FormatColumn("distritoSanitario", "Distrito Sanitário", 1, 1, 0, "70", "center");
	$objGrid -> FormatColumn("codigoUfMunicipio", "Código Município", 100, 100, 0, "70", "center", "select:250750");

	
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