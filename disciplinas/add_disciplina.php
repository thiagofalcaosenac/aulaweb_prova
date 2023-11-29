<?php

// verifica se os campos foram preenchidos e se o formulário foi enviado
if (isset($_POST['form_descricao']) && isset($_POST['form_curso']) && isset($_POST['form_cargaHoraria'])) {

    // inclui o arquivo de conexão com o banco de dados
    include("../config/connection.php");

    // recebe os valores do formulário em variáveis locais
    $descricao = $_POST['form_descricao'];
    $curso = $_POST['form_curso'];
    $cargaHoraria = $_POST['form_cargaHoraria'];

    // cria a query de inserção no banco de dados
    $sql = "INSERT INTO disciplinas (descricao, curso, cargaHoraria) VALUES (:descricao, :curso, :cargaHoraria)";
    // prepara a query para ser executada
    $pdo = $pdo->prepare($sql);

    // substitui os parâmetros da query
    $pdo->bindParam(":descricao", $descricao);
    $pdo->bindParam(":curso", $curso);
    $pdo->bindParam(":cargaHoraria", $cargaHoraria);
    
    // executa a query
    $pdo->execute();
    // verifica se a query foi executada com sucesso
    if ($pdo->rowCount() == 1) {
        $mensagem = "Disciplina inserida com sucesso!";
        header("Location: list_disciplina.php");
    } else {
        $mensagem = "Erro ao inserir disciplina!";
    }
}

// troca o título da página
$titulo = "Adicionar Disciplina";
include("../header_dash.php");
?>
<div class="container p-3">
    <div>
        <div class="row">
            <div class="col-md-6">
                <h3>Adicionar Disciplina</h3>
                <p>Cadastro das disciplinas para o aluno pagar os pecados</p>
                <?php
                // exibe a mensagem de sucesso ou erro usando o operador ternário
                echo (isset($mensagem)) ? "<p class='alert alert-secondary'>$mensagem</p>" : "";
                ?>
            </div>
            <div class="col-md-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div>
                        <label for="descricao" class="form-label w-100">
                            <input class="form-control" type="text" name="form_descricao" placeholder="Descrição da Disciplina" id="descricao" required>
                        </label>
                    </div>
                    <div>
                        <label for="curso" class="form-label w-100">
                            <input class="form-control" type="text" name="form_curso" placeholder="Curso da Disciplina" id="curso" required>
                        </label>
                    </div>
                    <div>
                        <label for="cargaHoraria" class="form-label w-100">
                            <input class="form-control" type="number" name="form_cargaHoraria" placeholder="Carga Horária em Horas da Disciplina" id="cargaHoraria" required>
                        </label>
                    </div>
                    
                    <!-- inclui o botão de enviar -->
                    <input type="submit" class="btn btn-primary" value="Enviar">
                </form>
            </div>
        </div>
    </div>
</div>
<?php
// inclui o footer do painel de controle
include("../footer_dash.php");
?>