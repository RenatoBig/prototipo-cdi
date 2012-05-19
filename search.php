<?php
$hostname = "localhost";
$user = "cdidesenv";
$pass = "cdidesenv";
$basedados = "prototipo-cdi";
$connect = mysql_connect($hostname,$user,$pass) or die ("Impossível estabelecer conexão com o servidor de banco de dados");
mysql_select_db($basedados) or die ("Impossivel estabelecer conexão com o banco de dados");

//busca valor digitado no campo autocomplete "$_GET['term']
$text = mysql_real_escape_string($_GET['term']);
$query = "SELECT nomeEquipamento from itens_equipamentos WHERE nomeEquipamento LIKE '%$text%' ORDER BY nomeEquipamento ASC";
$result = mysql_query($query);
//formata o resultado para JSON
$json = '[';
$first = true;
while($row = mysql_fetch_array($result))
{
  if (!$first) { $json .=  ','; } else { $first = false; }
  $json .= '{"value":"'.utf8_encode($row['nomeEquipamento']).'"}';
}
$json .= ']';

echo $json;

?>