<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<?php
session_start();
set_time_limit(0);

$pagina_login = 1;

include 'includes/config.php';
include 'includes/functions.php';

if (isset($_GET['sair'])) {
    $_SESSION['logado'] = "";
	session_destroy();
}
?>
<?php $titulo = 'Livro caixa' ?>
<?php include('includes/head.php') ?>
    <body id="bodyLogin">
		<div id="content" class="pageLogin">
		
			<!--[if lt IE 7]>
				<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
			<![endif]-->
	
			<header>
				<div class="conteudo">
					<img id="logoSistema" src="img/all/logo_caixa.png" alt="Livro Caixa" width="201" height="44">
					<time datetime="2014-11-19">
						<span class="dia"><?= date('d') ?></span>
						<span class="mes"><?= mostraMes(date('m')) ?></span>
						<span class="ano"><?= date('Y') ?></span>
					</time>
				</div>
			</header>
			
			<section id="login">
				<form action="" id="formLogin" method="post">
					<input type="text" name="login" placeholder="Email">
					<input type="password" name="senha" placeholder="Senha">
					<?php if(isset($_GET['error']) && $_GET['error'] != ''){ ?>
					<div class="error_login">Login ou senha errada</div>
					<?php } ?>
					<input type="submit" value="ENTRAR">
				</form>
			</section>
			
			<footer>
				Livro Caixa - Desenvolvido por RMCC. Vers&atilde;o 1.3
			</footer>
			
		</div>

		<?php include('includes/footer.php') ?>
    </body>
</html>
