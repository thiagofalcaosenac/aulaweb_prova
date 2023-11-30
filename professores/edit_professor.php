<?php

$titulo = "Editar Professores";
include("../header_dash.php");
include("../config/connection.php");

// verifica se o id do professor foi enviado
if (isset($_GET['idProf'])) {
    // recebe o id da professor
    $idProf = $_GET['idProf'];
} else {
    // se não foi enviado, redireciona para a página de listagem
    header("Location: list_professor.php");
    exit();
}
// recebe o id da notícia
$idProf = $_GET['idProf'];

/* Atualização da notícia */
// verifica se os dados foram enviados
if (isset($_POST['form_matricula']) && isset($_POST['form_nome']) && isset($_POST['form_telefone']) && isset($_POST['form_email']) && isset($_POST['id'])) {

    // recebe os dados do formulário
    $id = $_POST['id'];
    $matricula = $_POST['form_matricula'];
    $nome = $_POST['form_nome'];
    $telefone = $_POST['form_telefone'];
    $email = $_POST['form_email'];

    $sql = "UPDATE professores SET matricula = '$matricula', nome = '$nome', telefone = '$telefone', email = '$email' WHERE id = $id";

    $pdo->query($sql);
    $mensagem = "Professor atualizada com sucesso!";
}

// cria a query de consulta da notícia
$sql = "SELECT * FROM professores WHERE id = $idProf";
// executa a query
$resultado = $pdo->query($sql);
// transforma o resultado em um array associativo
$resultado = $resultado->fetch(PDO::FETCH_ASSOC);

?>
<div class="container p-3 bg-light text-dark">
    <div>
        <div class="row">
            <div class="col-md-6">
                <h3>Editar Professor</h3>
                <p>A edição do professor é essencial para a rotação da terra prosseguir, assim como uma mãe coloca o filho no mundo, o professor prepara esse filho pro mundo.</p>
                <?php
                // exibe a mensagem de sucesso ou erro usando o operador ternário
                echo (isset($mensagem)) ? "<p class='alert alert-secondary'>$mensagem</p>" : "";
                ?>
            </div>
            <div class="col-md-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div>
                        <input type="hidden" name="id" value="<?php echo (isset($resultado['id'])) ? $resultado['id'] : "" ?>">

                        <label for="matricula" class="form-label w-100">
                            <input class="form-control" type="text" name="form_matricula" placeholder="Matrícula do Professor" id="matricula" value="<?php echo $resultado['matricula']; ?>" required>
                        </label>
                    </div>
                    <div>
                        <label for="nome" class="form-label w-100">
                            <input class="form-control" type="text" name="form_nome" placeholder="Nome do Professor" id="nome" value="<?php echo $resultado['nome']; ?>" required>
                        </label>
                    </div>
                    <div>
                        <label for="telefone" class="form-label w-100">
                            <input class="form-control" type="text" name="form_telefone" placeholder="Telefone do Professor" id="telefone" value="<?php echo $resultado['telefone']; ?>" required>
                        </label>
                    </div>
                    <div>
                        <label for="email" class="form-label w-100">
                            <input class="form-control" type="text" name="form_email" placeholder="eu@examepl.com" id="email" value="<?php echo $resultado['email']; ?>" required>
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
include("../footer_dash.php");
?>