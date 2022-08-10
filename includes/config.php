<?php
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
//Configuracao do Banco de dados
$host = "mysql";
$user = "root";
$pass = "senha-de-root";
$d_b = "livrocaixa";

//Titulo do seu livro Caixa, geralmente seu nome
$lc_titulo="Seu Nome";

//////////////////////////////////////
//Nao altere a partir daqui!
//////////////////////////////////////

$conn = mysql_connect($host, $user, $pass) or die("Erro na conexao com a base de dados");
$db = mysql_select_db($d_b, $conn) or die("Erro na selecao da base de dados");

mysql_query("SET NAMES 'utf8'");
mysql_query('SET character_set_connection=utf8');
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_results=utf8');

if (isset($_SESSION['logado']))
    $logado = $_SESSION['logado'];
else
    $logado = "";

	$senha_ = isset($_SESSION['senha']) ? $_SESSION['senha'] : 'false';
	
if (isset($_POST['login']) && $_POST['login'] != '') {
	
	$busca_usuario_query = mysql_query('SELECT * FROM lc_usuarios WHERE email="'.addslashes($_POST['login']).'" and senha="'.base64_encode($_POST['senha']).'"');
    if (mysql_num_rows($busca_usuario_query) > 0) {
		$busca_usuario = mysql_fetch_assoc($busca_usuario_query);
        $logado = $_SESSION['logado'] = base64_encode($_POST['senha']);
        $_SESSION['id'] = $busca_usuario['id'];
        $_SESSION['nome'] = $busca_usuario['nome'];
        $_SESSION['senha'] = $busca_usuario['senha'];
        $_SESSION['email'] = $busca_usuario['email'];
        $_SESSION['tipo'] = $busca_usuario['tipo'];
        header("Location: principal.php");
        exit();
    } else {
		header("Location: index.php?error=true");
	}
}

if ($logado != $senha_ && !isset($pagina_login)) {
    header("Location: index.php");
    exit();
}
?>
