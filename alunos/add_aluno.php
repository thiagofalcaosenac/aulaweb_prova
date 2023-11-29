<?php

// verifica se os campos foram preenchidos e se o formulário foi enviado
if (isset($_POST['form_nome']) && isset($_POST['form_documento']) && isset($_POST['form_email']) && isset($_POST['form_sexo'])
    && isset($_POST['form_dataNascimento']) && isset($_POST['form_cidade']) && isset($_POST['form_estado'])) {

    // inclui o arquivo de conexão com o banco de dados
    include("../config/connection.php");

    // recebe os valores do formulário em variáveis locais
    $nome = $_POST['form_nome'];
    $documento = $_POST['form_documento'];
    $email = $_POST['form_email'];
    $sexo = $_POST['form_sexo'];
    $dataNascimento = $_POST['form_dataNascimento'];
    $cidade = $_POST['form_cidade'];
    $estado = $_POST['form_estado'];

    // cria a query de inserção no banco de dados
    $sql = "INSERT INTO alunos (nome, documento, email, sexo, dataNascimento, cidade, estado) VALUES (:nome, :documento, :email, :sexo, :dataNascimento, :cidade, :estado)";
    // prepara a query para ser executada
    $pdo = $pdo->prepare($sql);

    // substitui os parâmetros da query
    $pdo->bindParam(":nome", $nome);
    $pdo->bindParam(":documento", $documento);
    $pdo->bindParam(":email", $email);
    $pdo->bindParam(":sexo", $sexo);
    $pdo->bindParam(":dataNascimento", $dataNascimento);
    $pdo->bindParam(":cidade", $cidade);
    $pdo->bindParam(":estado", $estado);

    // executa a query
    $pdo->execute();
    // verifica se a query foi executada com sucesso
    if ($pdo->rowCount() == 1) {
        $mensagem = "Aluno inserido com sucesso!";
        header("Location: list_aluno.php");
    } else {
        $mensagem = "Erro ao inserir aluno!";
    }
}

// troca o título da página
$titulo = "Adicionar Aluno";
include("../header_dash.php");
?>
<div class="container p-3">
    <div>
        <div class="row">
            <div class="col-md-6">
                <h3>Adicionar Aluno</h3>
                <p>O cadastro do aluno é para ele pagar os pecados com as disciplinas lecionadas pelo professor</p>
                <?php
                // exibe a mensagem de sucesso ou erro usando o operador ternário
                echo (isset($mensagem)) ? "<p class='alert alert-secondary'>$mensagem</p>" : "";
                ?>
            </div>
            <div class="col-md-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div>
                        <label for="nome" class="form-label w-100">
                            <input class="form-control" type="text" name="form_nome" placeholder="Nome do Aluno" id="nome" required>
                        </label>
                    </div>
                    <div>
                        <label for="documento" class="form-label w-100">
                            <input class="form-control" type="text" name="form_documento" placeholder="Documento do Aluno" id="documento" required>
                        </label>
                    </div>
                    <div>
                        <label for="email" class="form-label w-100">
                            <input class="form-control" type="email" name="form_email" placeholder="Email do Aluno" id="email" required>
                        </label>
                    </div>
                    <div>
                        <label for="sexo" class="form-label w-100">
                            <input class="form-control" type="text" name="form_sexo" placeholder="Sexo" id="sexo" required>
                        </label>
                    </div>
                    <div>
                        <label for="dataNascimento" class="form-label w-100">
                            <input class="form-control" type="date" name="form_dataNascimento" placeholder="Data de Nascimento" id="dataNascimento" required>
                        </label>
                    </div>
                    <div>
                        <label for="cidade" class="form-label w-100">
                            <input class="form-control" type="text" name="form_cidade" placeholder="Cidade" id="cidade" required>
                        </label>
                    </div>
                    <div>
                        <label for="estado" class="form-label w-100">
                            <input class="form-control" type="text" name="form_estado" placeholder="Estado (Sigla)" id="estado" required>
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