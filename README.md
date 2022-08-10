## Sistema de Livro Caixa - Controle Financeiro

Esse sistema é um fork gratuito da versão vendida [neste link](https://temdetudoscript.com/item/Script-Php-Livro-Caixa-%252d-Simple-Lc-%252d-100%25.html).

**Melhorias implantadas:**
* Correção de Charsets (Caracteres acentuados não eram reconhecidos)
* Padronização de Categorias
* Migração de ISO pra UTF8

![](https://raw.githubusercontent.com/AprendendoLinux/livro-caixa/main/img/all/controle-financeiro.jpg)

**[Clique aqui para fazer download do sistema](https://github.com/AprendendoLinux/livro-caixa/releases/download/1.3/livro-caixa.tar.gz)**

**Funcionalidades:**
* Navegação por mês
* Balanço Geral
* Categorias de movimentos
* Entradas e saídas do mês
* Movimentos detalhados por mês
* Autenticação
* Filtro por Categorias

**Requisitos:**
* PHP 5.6 (Use [esse contêiner](https://hub.docker.com/r/aprendendolinux/php5.6.40-apache), pois **não pode** ser outra versão)
* Mysql (ou MariaDB) Server 5.7 (Não testei com outra versão)

Baixe o arquivo e descompacte no diretório do seu servidor.

Importe o arquivo **sql/livrocaixa.sql** em seu gerenciador de banco de dados do MySQL
Modifique o arquivo config.php com o usuário e a senha do seu banco, e o usuário e senha para autenticação

Acesse http://edereco-do-seu-servidor/
