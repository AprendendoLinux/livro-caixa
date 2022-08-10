<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<?php include('includes/actions.php') ?>
<?php $titulo = 'Cadastrar usuário - Livro caixa' ?>
<?php include('includes/head.php') ?>
<?php include('includes/mensagens_sistema.php') ?>
    <body id="bodyAddconta">
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
								Cadastrar usuário
							</div>
							<div id="btns_acoes">
								<a href="usuarios.php" class="padraoBotao">< Voltar</a>
							</div>
						</div>
						
						<div id="cadastrar_conta">

							<form action="#" method="post" class="form_cadastro" id="aReceberForm">
								<input type="hidden" name="acao" value="cadastrar_usuario">
								<ul>
									<li>
										<label for="valor">Nome:</label>
										<input type="text" name="nome" maxlength="100">
									</li>
									<li>
										<label for="nome">Email:</label>
										<input type="text" name="email" maxlength="45">
									</li>
									<li>
										<label for="valor">Senha:</label>
										<input type="password" name="senha" maxlength="45">
									</li>
									<li>
										<label for="nome">Tipo de conta:</label>
										<select name="tipo_conta">
											<option value="administrador">Administrador</option>
											<option value="gestor">Gestor de contas</option>
										</select>
									</li>									
								</ul>
								<input type="submit" value="Cadastrar" class="padraoBotao">
								<a href="usuarios.php" class="padraoBotaoDefault">Cancelar</a>
							</form>
							
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

