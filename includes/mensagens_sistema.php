<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<?php
if (isset($_GET['cat_err']) && $_GET['cat_err']==1){
?>

<div class="mensagem erro">
<strong>Esta categoria n&atilde;o pode ser removida, pois h&aacute; movimentos associados a esta</strong>
</div>

<?php }?>

    <?php
if (isset($_GET['cat_ok']) && $_GET['cat_ok']==2){
?>

<div class="mensagem sucesso">
<strong>Categoria removida com sucesso!</strong>
</div>

<?php }?>
    
<?php
if (isset($_GET['cat_ok']) && $_GET['cat_ok']==1){
?>

<div class="mensagem sucesso">
<strong>Categoria Cadastrada com sucesso!</strong>
</div>

<?php }?>
    
    <?php
if (isset($_GET['cat_ok']) && $_GET['cat_ok']==3){
?>

<div class="mensagem sucesso">
<strong>Categoria alterada com sucesso!</strong>
</div>

<?php }?>

<?php
if (isset($_GET['ok']) && $_GET['ok']==1){
?>

<div class="mensagem sucesso">
<strong>Movimento Cadastrado com sucesso!</strong>
</div>

<?php }?>

<?php
if (isset($_GET['ok']) && $_GET['ok']==2){
?>

<div class="mensagem sucesso">
<strong>Movimento removido com sucesso!</strong>
</div>

<?php }?>
    
<?php
if (isset($_GET['ok']) && $_GET['ok']==3){
?>

<div class="mensagem sucesso">
<strong>Movimento alterado com sucesso!</strong>
</div>

<?php }?>

<?php if (isset($_GET['ok']) && $_GET['ok']=='conta_cadastrada'){ ?>
<div class="mensagem sucesso">
<strong>Conta cadastrada com sucesso!</strong>
</div>
<?php }?>

<?php if (isset($_GET['ok']) && $_GET['ok']=='conta_paga'){?>
<div class="mensagem sucesso">
<strong>Conta paga!</strong>
</div>
<?php }?>

<?php if (isset($_GET['ok']) && $_GET['ok']=='conta_apagada'){ ?>
<div class="mensagem sucesso">
<strong>Conta removida!</strong>
</div>
<?php }?>

<?php if (isset($_GET['ok']) && $_GET['ok']=='usuario_cadastrado'){ ?>
<div class="mensagem sucesso">
<strong>Usu&aacute;rio cadastrado!</strong>
</div>
<?php }?>

<?php if (isset($_GET['ok']) && $_GET['ok']=='usuario_atualizado'){ ?>
<div class="mensagem sucesso">
<strong>Usu&aacute;rio atualizado!</strong>
</div>
<?php }?>

<?php if (isset($_GET['erro']) && $_GET['erro']=='erro_usuario'){ ?>
<div class="mensagem erro">
<strong>N??o foi poss??vel cadastrar usu??rio! Preencha todos os campos e digite um email que n??o foi utilizado por outro usu??rio</strong>
</div>
<?php }?>

<?php if (isset($_GET['erro']) && $_GET['erro']=='erro_excluir'){?>
<div class="mensagem erro">
<strong>Erro ao tentar excluir usu??rio</strong>
</div>
<?php }?>

<?php if (isset($_GET['erro']) && $_GET['erro']=='mesmo_usuario'){?>
<div class="mensagem erro">
<strong>Voc?? n??o pode excluir o seu pr??prio usu??rio</strong>
</div>
<?php }?>

<?php if (isset($_GET['ok']) && $_GET['ok']=='usuario_excluido'){?>
<div class="mensagem sucesso">
<strong>Usu??rio exclu??do</strong>
</div>

<?php }?>
