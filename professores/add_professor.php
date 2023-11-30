<?php

// verifica se os campos foram preenchidos e se o formulário foi enviado
if (isset($_POST['form_matricula']) && isset($_POST['form_nome']) && isset($_POST['form_telefone']) && isset($_POST['form_email'])) {

    // inclui o arquivo de conexão com o banco de dados
    include("../config/connection.php");

    // recebe os valores do formulário em variáveis locais
    $matricula = $_POST['form_matricula'];
    $nome = $_POST['form_nome'];
    $telefone = $_POST['form_telefone'];
    $email = $_POST['form_email'];

    // cria a query de inserção no banco de dados
    $sql = "INSERT INTO professores (matricula, nome, telefone, email) VALUES (:matricula, :nome, :telefone, :email)";
    // prepara a query para ser executada
    $pdo = $pdo->prepare($sql);

    // substitui os parâmetros da query
    $pdo->bindParam(":matricula", $matricula);
    $pdo->bindParam(":nome", $nome);
    $pdo->bindParam(":telefone", $telefone);
    $pdo->bindParam(":email", $email);
    
    // executa a query
    $pdo->execute();
    // verifica se a query foi executada com sucesso
    if ($pdo->rowCount() == 1) {
        $mensagem = "Professor inserido com sucesso!";
        header("Location: list_professor.php");
    } else {
        $mensagem = "Erro ao inserir professor!";
    }
}

// troca o título da página
$titulo = "Adicionar Professor";
include("../header_dash.php");
?>
<div class="container p-3 bg-light text-dark">
    <div>
        <div class="row">
            <div class="col-md-6">
                <h3>Adicionar Professor</h3>
                <p>O cadastro do professor é essencial para a rotação da terra prosseguir, assim como uma mãe coloca o filho no mundo, o professor prepara esse filho pro mundo.</p>
                <?php
                // exibe a mensagem de sucesso ou erro usando o operador ternário
                echo (isset($mensagem)) ? "<p class='alert alert-secondary'>$mensagem</p>" : "";
                ?>
            </div>
            <div class="col-md-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div>
                        <label for="matricula" class="form-label w-100">
                            <input class="form-control" type="text" name="form_matricula" placeholder="Matrícula do Professor" id="matricula" required>
                        </label>
                    </div>
                    <div>
                        <label for="nome" class="form-label w-100">
                            <input class="form-control" type="text" name="form_nome" placeholder="Nome do Professor" id="nome" required>
                        </label>
                    </div>
                    <div>
                        <label for="telefone" class="form-label w-100">
                            <input class="form-control" type="text" name="form_telefone" placeholder="Telefone do Professor" id="telefone" required>
                        </label>
                    </div>
                    <div>
                        <label for="email" class="form-label w-100">
                            <input class="form-control" type="text" name="form_email" placeholder="eu@examepl.com" id="email" required>
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