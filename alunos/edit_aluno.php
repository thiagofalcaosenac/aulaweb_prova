<?php
$titulo = "Editar Alunos";
include("../header_dash.php");
include("../config/connection.php");

// verifica se o id do professor foi enviado
if (isset($_GET['idAluno'])) {
    // recebe o id da professor
    $idAluno = $_GET['idAluno'];
} else {
    // se não foi enviado, redireciona para a página de listagem
    header("Location: list_aluno.php");
    exit();
}
// recebe o id da notícia
$idAluno = $_GET['idAluno'];

// verifica se os campos foram preenchidos e se o formulário foi enviado
if (isset($_POST['form_nome']) && isset($_POST['form_documento']) && isset($_POST['form_email']) && isset($_POST['form_sexo'])
    && isset($_POST['form_dataNascimento']) && isset($_POST['form_cidade']) && isset($_POST['form_estado']) && isset($_POST['id'])) {

    // recebe os valores do formulário em variáveis locais
    $id = $_POST['id'];
    $nome = $_POST['form_nome'];
    $documento = $_POST['form_documento'];
    $email = $_POST['form_email'];
    $sexo = $_POST['form_sexo'];
    $dataNascimento = $_POST['form_dataNascimento'];
    $cidade = $_POST['form_cidade'];
    $estado = $_POST['form_estado'];

    $sql = "UPDATE alunos SET nome = '$nome', documento = '$documento', email = '$email', sexo = '$sexo', dataNascimento = '$dataNascimento', cidade = '$cidade', estado = '$estado' WHERE id = $id";

    $pdo->query($sql);
    $mensagem = "Aluno atualizado com sucesso!";
}

// cria a query de consulta da notícia
$sql = "SELECT * FROM alunos WHERE id = $idAluno";
// executa a query
$resultado = $pdo->query($sql);
// transforma o resultado em um array associativo
$resultado = $resultado->fetch(PDO::FETCH_ASSOC);

?>
<div class="container p-3  bg-light text-dark">
    <div>
        <div class="row">
            <div class="col-md-6">
                <h3>Editar Aluno</h3>
                <p>A edição do aluno é para ele pagar os pecados com as disciplinas lecionadas pelo professor</p>
                <?php
                // exibe a mensagem de sucesso ou erro usando o operador ternário
                echo (isset($mensagem)) ? "<p class='alert alert-secondary'>$mensagem</p>" : "";
                ?>
            </div>
            <div class="col-md-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div>
                        <input type="hidden" name="id" value="<?php echo (isset($resultado['id'])) ? $resultado['id'] : "" ?>">

                        <label for="nome" class="form-label w-100">
                            <input class="form-control" type="text" name="form_nome" placeholder="Nome do Aluno" id="nome" value="<?php echo $resultado['nome']; ?>" required>
                        </label>
                    </div>
                    <div>
                        <label for="documento" class="form-label w-100">
                            <input class="form-control" type="text" name="form_documento" placeholder="Documento do Aluno" id="documento" value="<?php echo $resultado['documento']; ?>" required>
                        </label>
                    </div>
                    <div>
                        <label for="email" class="form-label w-100">
                            <input class="form-control" type="email" name="form_email" placeholder="Email do Aluno" id="email" value="<?php echo $resultado['email']; ?>" required>
                        </label>
                    </div>
                    <div>
                        <label for="sexo" class="form-label w-100">
                            <input class="form-control" type="text" name="form_sexo" placeholder="Sexo" id="sexo" value="<?php echo $resultado['sexo']; ?>" required>
                        </label>
                    </div>
                    <div>
                        <label for="dataNascimento" class="form-label w-100">
                            <input class="form-control" type="date" name="form_dataNascimento" placeholder="Data de Nascimento" id="dataNascimento" value="<?php echo $resultado['dataNascimento']; ?>" required>
                        </label>
                    </div>
                    <div>
                        <label for="cidade" class="form-label w-100">
                            <input class="form-control" type="text" name="form_cidade" placeholder="Cidade" id="cidade" value="<?php echo $resultado['cidade']; ?>" required>
                        </label>
                    </div>
                    <div>
                        <label for="estado" class="form-label w-100">
                            <input class="form-control" type="text" name="form_estado" placeholder="Estado (Sigla)" id="estado" value="<?php echo $resultado['estado']; ?>" required>
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