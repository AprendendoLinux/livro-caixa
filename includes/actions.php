<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<?php 
session_start();
set_time_limit(0);

include 'includes/config.php';
include 'includes/functions.php';

if (isset($_GET['acao']) && $_GET['acao'] == 'apagar') {
    $id = $_GET['id'];

    mysql_query("DELETE FROM lc_movimento WHERE id='$id'");
    echo mysql_error();

    header("Location: ?mes=" . $_GET['mes'] . "&ano=" . $_GET['ano'] . "&ok=2");
    exit();
}

if (isset($_POST['acao']) && $_POST['acao'] == 'editar_cat') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];

    mysql_query("UPDATE lc_cat SET nome='$nome' WHERE id='$id'");
    echo mysql_error();

    header("Location: ?mes=" . $_GET['mes'] . "&ano=" . $_GET['ano'] . "&cat_ok=3");
    exit();
}

if (isset($_GET['acao']) && $_GET['acao'] == 'apagar_cat') {
    $id = $_GET['id'];

    $qr=mysql_query("SELECT c.id FROM lc_movimento m, lc_cat c WHERE c.id=m.cat && c.id=$id");
    if (mysql_num_rows($qr)>0){
        header("Location: ?mes=" . $_GET['mes'] . "&ano=" . $_GET['ano'] . "&cat_err=1");
        exit();
    }
    
    mysql_query("DELETE FROM lc_cat WHERE id='$id'");
    echo mysql_error();

    header("Location: ?mes=" . $_GET['mes'] . "&ano=" . $_GET['ano'] . "&cat_ok=2");
    exit();
}

if (isset($_POST['acao']) && $_POST['acao'] == 'editar_mov') {
    $id = $_POST['id'];
    $dia = $_POST['dia'];
    $tipo = $_POST['tipo'];
    $cat = $_POST['cat'];
    $descricao = $_POST['descricao'];
    $valor = str_replace(",", ".", $_POST['valor']);

    mysql_query("UPDATE lc_movimento SET dia='$dia', tipo='$tipo', cat='$cat', descricao='$descricao', valor='$valor' WHERE id='$id'");
    echo mysql_error();

    header("Location: ?mes=" . $_GET['mes'] . "&ano=" . $_GET['ano'] . "&ok=3");
    exit();
}

if (isset($_POST['acao']) && $_POST['acao'] == 2) {

    $nome = $_POST['nome'];

    mysql_query("INSERT INTO lc_cat (nome) values ('$nome')");

    echo mysql_error();

    header("Location: ?mes=" . $_GET['mes'] . "&ano=" . $_GET['ano'] . "&cat_ok=1");
    exit();
}

if (isset($_POST['acao']) && $_POST['acao'] == 1) {

    $data = $_POST['data'];
    $tipo = $_POST['tipo'];
    $cat = $_POST['cat'];
    $descricao = $_POST['descricao'];
    $valor = str_replace(",", ".", $_POST['valor']);

    $t = explode("/", $data);
    $dia = $t[0];
    $mes = $t[1];
    $ano = $t[2];

    mysql_query("INSERT INTO lc_movimento (dia,mes,ano,tipo,descricao,valor,cat) values ('$dia','$mes','$ano','$tipo','$descricao','$valor','$cat')");

    echo mysql_error();

    header("Location: ?mes=" . $_GET['mes'] . "&ano=" . $_GET['ano'] . "&ok=1");
    exit();
}

if (isset($_POST['acao']) && $_POST['acao'] == 'cadastrar_conta') {

    $valor = str_replace(",", ".", $_POST['valor']);
    $nome = $_POST['nome'];
    $data = $_POST['data_pagamento'];
	$conta_mensal = $_POST['mensal'];
    $observacoes = $_POST['observacoes'];
    $tipo = $_POST['tipo'];

    $t = explode("/", $data);
    $dia = $t[0];
    $mes = $t[1];
    $ano = $t[2];

    mysql_query("INSERT INTO lc_contas (dia,mes,ano,valor,de_para,conta_mensal,tipo,observacoes) values ('$dia','$mes','$ano','$valor','$nome','$conta_mensal', '$tipo','$observacoes')");

    echo mysql_error();

    header("Location: ?ok=conta_cadastrada");
    exit();
}

if (isset($_GET['acao']) && $_GET['acao'] == 'excluir_conta') {
    $id = $_GET['id'];

    mysql_query("DELETE FROM lc_contas WHERE id='$id' LIMIT 1");
    header("Location:contas.php?ok=conta_apagada");
}

if (isset($_POST['acao']) && $_POST['acao'] == 'pagar_conta') {
	$detalhesContaQuery = mysql_query('SELECT * FROM lc_contas WHERE id = '.$_POST['id_conta']) or die(mysql_error());
	$detalhesConta = mysql_fetch_assoc($detalhesContaQuery);
	$dia = date('d');
	$mes = date('m');
	$ano = date('Y');
	$tipo = $detalhesConta['tipo'] == 'credito' ? 1 : 0;
	if($detalhesConta['tipo'] == 'debito'){
		$descricao = 'Conta paga a '.$detalhesConta['de_para'].'. Obs.:'.$detalhesConta['observacoes'];
	} else if($detalhesConta['tipo'] == 'credito'){
		$descricao = 'Conta recebida de '.$detalhesConta['de_para'].'. Obs.:'.$detalhesConta['observacoes'];
	}
	$valor = $detalhesConta['valor'];
    mysql_query("INSERT INTO lc_movimento (dia,mes,ano,tipo,descricao,valor) values ('$dia','$mes','$ano','$tipo','$descricao','$valor')") or die(mysql_error());
    mysql_query("UPDATE lc_contas SET pago = 'pago' WHERE id = ".$_POST['id_conta']." LIMIT 1") or die(mysql_error());
	
	if($detalhesConta['conta_mensal'] == 'true'){
		$time = strtotime($detalhesConta['ano']."/".$detalhesConta['mes']."/".$detalhesConta['dia']);
		$novo_dia = date("d", strtotime("+1 month", $time));
		$novo_mes = date("m", strtotime("+1 month", $time));
		$novo_ano = date("Y", strtotime("+1 month", $time));
		$recadastrar_conta = mysql_query("INSERT INTO lc_contas (de_para,dia,mes,ano,observacoes,tipo,conta_mensal,valor,pago) values ('".$detalhesConta['de_para']."',".$novo_dia.",".$novo_mes.",".$novo_ano.",'".$detalhesConta['observacoes']."','".$detalhesConta['tipo']."','".$detalhesConta['conta_mensal']."',".$detalhesConta['valor'].', null)') or die(mysql_error());
	}
	
	$preSymbol = strpos($_SERVER['REQUEST_URI'],'?') !== false ? '&':'?';
	header("Location:".$_SERVER['REQUEST_URI'].$preSymbol."ok=conta_paga");
}

if (isset($_GET['mes']))
    $mes_hoje = $_GET['mes'];
else
    $mes_hoje = date('m');

if (isset($_GET['ano']))
    $ano_hoje = $_GET['ano'];
else
    $ano_hoje = date('Y');
	
	
if (isset($_POST['acao']) && $_POST['acao'] == 'cadastrar_usuario') {

	if($_POST['nome'] == '' || $_POST['email'] == '' || $_POST['senha'] == ''){
		header("Location: ?erro=erro_usuario");
		exit();
	}
	
    $cadastro = mysql_query('INSERT INTO lc_usuarios (nome, email, senha, tipo) values ("'.$_POST['nome'].'","'.$_POST['email'].'","'.base64_encode($_POST['senha']).'","'.$_POST['tipo_conta'].'")');
	
	if(mysql_error() != ''){
		header("Location: ?erro=erro_usuario");
	} else {
	    header("Location: ?ok=usuario_cadastrado");
	}
}

if (isset($_POST['acao']) && $_POST['acao'] == 'editar_usuario') {

	if($_POST['nome'] == '' || $_POST['email'] == ''){
		header("Location: ?erro=erro_usuario&id=".$_GET['id']);
		exit();
	}
	
	$mudar_senha = $_POST['senha'] != '' ? ', senha="'.base64_encode($_POST['senha']).'"' : '';
	
    $editar_query = mysql_query('UPDATE lc_usuarios SET nome="'.$_POST['nome'].'", email="'.$_POST['email'].'"'.$mudar_senha.', tipo="'.$_POST['tipo_conta'].'" WHERE id = '.$_POST['id_usuario']);
	
	if(mysql_error() != ''){
		header("Location: ?erro=erro_usuario&id=".$_GET['id']);
	} else {
	    header("Location: ?ok=usuario_atualizado&id=".$_GET['id']);
	}
}

if (isset($_GET['excluir']) && $_GET['excluir'] != "") {
	if($_GET['excluir'] != $_SESSION['id']){
		$excluir_query = mysql_query('DELETE FROM lc_usuarios WHERE id = '.addslashes($_GET['excluir'].' LIMIT 1'));
	} else {
		header("Location: ?erro=mesmo_usuario");
		exit();
	}
	
	if(mysql_error() != ''){
		header("Location: ?erro=erro_excluir");
	} else {
	    header("Location: ?ok=usuario_excluido");
	}
}
?>