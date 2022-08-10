<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<?php include('includes/actions.php') ?>
<?php $titulo = 'Usuários - Livro caixa' ?>
<?php include('includes/head.php') ?>
<?php $ativar = 'menu_icon_usuarios'; ?>
<?php include('includes/mensagens_sistema.php') ?>

    <body id="bodyAddMovimento">
		<div id="content">
		
			<!--[if lt IE 7]>
				<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
			<![endif]-->
	
				<div class="conteudo">
					<?php include('includes/lateral_esquerda.php') ?>
					<div class="col_dir">
					
						<header>
							<?php include('includes/header.php') ?>
						</header>
						
						<div id="topo">
							<div id="titulo_topo">
								Usuários
							</div>
							<div id="btns_acoes">
								<a href="cadastrar_usuario.php" class="padraoBotao">Cadastrar novo usuário</a>
							</div>
						</div>
						
						<?php
						$usuarios_query = mysql_query('SELECT * FROM lc_usuarios');
						?>
						
						<div id="ger_usuarios">
							<ul>
								<?php while($usuarios = mysql_fetch_assoc($usuarios_query)){ ?>
								<li>
									<strong><?= $usuarios['nome'] ?></strong>
									(<?= $usuarios['email'] ?>) - 
									<span class="strong_primary"><?= $usuarios['tipo'] ?></span>
									<a href="usuarios.php?excluir=<?= $usuarios['id'] ?>" class="btn_editar_usuario excluir_btn">Excluir</a>
									<a href="editar_usuario.php?id=<?= $usuarios['id'] ?>" class="btn_editar_usuario">Editar</a>
								</li>
								<?php } ?>
							</ul>
						</div>
						
					</div>
				</div>
			
			<footer>
				Livro Caixa - Desenvolvido por RMCC. Vers&atilde;o 1.3
			</footer>
			
		</div>

		<?php include('includes/footer.php') ?>
    </body>
</html>

