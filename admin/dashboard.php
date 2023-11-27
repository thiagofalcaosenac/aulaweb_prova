<?php
// inicia a sessão em PHP
@session_start();

// verifica se o usuário está logado
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}

// define o título da página
$titulo = "Painel de Controle";
include_once __DIR__ . "/header_dash.php";
?>
<div class="container p-3">
    <div class="row">
        <div class="col-md-6">
            <h4>Bem vindo</h4>
        </div>
        <div class="col-md-6">
            O Dashboard é a página principal de um site que permite inserir notícia. Nesta página, o usuário pode
            acessar as principais funcionalidades do site, como adicionar, editar, excluir e gerenciar as notícias
            publicadas. O Dashboard também mostra as estatísticas de visualização, comentários, curtidas e
            compartilhamentos das notícias. O Dashboard é uma página dinâmica e interativa que facilita o controle e a
            administração do conteúdo do site.
        </div>
    </div>

</div>
<?php
// inclui o footer do dashboard
include_once __DIR__ . "/footer_dash.php";
?>