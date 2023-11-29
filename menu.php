<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <button class="btn btn-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#menulateral" aria-controls="menulateral"><i class="bi bi-list"></i>
        </button>
        <a class="navbar-brand">Painel de controle</a>
    </div>
</nav>


<div class="offcanvas offcanvas-start shadow-lg" tabindex="-1" id="menulateral" data-bs-keyboard="false" data-bs-backdrop="false" aria-labelledby="menulateralLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="menulateralLabel">Menu</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Fechar"></button>
    </div>
    <div class="offcanvas-body">
        <div id="sidebar" class="border rounded">
            <div class="nav flex-column py-3">
                <h4>Notícias</h4>
                <a href="./noticias/add_noticia.php" class="list-inline-item">Inserir Notícia</a>
                <a href="./noticias/list_noticia.php" class="list-inline-item">Listar Notícias</a>
            </div>
            <div class="nav flex-column py-3">
                <h4>Professores</h4>
                <a href="./professores/add_professor.php" class="list-inline-item">Inserir Professor</a>
                <a href="./professores/list_professor.php" class="list-inline-item">Listar Professor</a>
            </div>
            <div class="nav flex-column py-3">
                <h4>Alunos</h4>
                <a href="./alunos/add_aluno.php" class="list-inline-item">Inserir Aluno</a>
                <a href="./alunos/list_aluno.php" class="list-inline-item">Listar Aluno</a>
            </div>
        </div>
    </div>
</div>