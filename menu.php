<?php
$path_disciplinas = 'http://localhost/aulaweb_prova/disciplinas';
$path_professores = 'http://localhost/aulaweb_prova/professores';
$path_alunos = 'http://localhost/aulaweb_prova/alunos';
$path_default = 'http://localhost/aulaweb_prova';
?>

<nav class="navbar navbar-dark bg-dark text-white">
    <div class="container-fluid">
        <button class="btn btn-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#menulateral" aria-controls="menulateral"><i class="bi bi-list"></i>
        </button>
        <a href="<?php echo $path_default; ?>/index.php" class="navbar-brand float-left">Home</a>
        <a class="navbar-brand float-right">Painel de controle</a>
    </div>
</nav>


<div class="offcanvas offcanvas-start shadow-lg bg-dark text-white" tabindex="-1" id="menulateral" data-bs-keyboard="false" data-bs-backdrop="false" aria-labelledby="menulateralLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="menulateralLabel">Menu</h5>
        <button type="button" class="btn-close text-reset bg-white" data-bs-dismiss="offcanvas" aria-label="Fechar"></button>
    </div>
    <div class="offcanvas-body bg-dark text-white">
        <div id="sidebar" class="border rounded">
            <div class="nav flex-column py-3">
                <h4>Disciplinas</h4>
                <a href="<?php echo $path_disciplinas; ?>/add_disciplina.php" class="list-inline-item">Inserir Disciplina</a>
                <a href="<?php echo $path_disciplinas; ?>/list_disciplina.php" class="list-inline-item">Listar Disciplina</a>
            </div>
            <div class="nav flex-column py-3">
                <h4>Professores</h4>
                <a href="<?php echo $path_professores; ?>/add_professor.php" class="list-inline-item">Inserir Professor</a>
                <a href="<?php echo $path_professores; ?>/list_professor.php" class="list-inline-item">Listar Professor</a>
            </div>
            <div class="nav flex-column py-3">
                <h4>Alunos</h4>
                <a href="<?php echo $path_alunos; ?>/add_aluno.php" class="list-inline-item">Inserir Aluno</a>
                <a href="<?php echo $path_alunos; ?>/list_aluno.php" class="list-inline-item">Listar Aluno</a>
            </div>
        </div>
    </div>
</div>