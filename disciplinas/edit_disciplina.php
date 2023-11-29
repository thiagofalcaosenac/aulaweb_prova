<?php

$titulo = "Editar Disciplina";
include("../header_dash.php");
include("../config/connection.php");

// verifica se o id do professor foi enviado
if (isset($_GET['idDisc'])) {
    // recebe o id da professor
    $idDisc = $_GET['idDisc'];
} else {
    // se não foi enviado, redireciona para a página de listagem
    header("Location: list_disciplina.php");
    exit();
}

$idDisc = $_GET['idDisc'];

// verifica se os dados foram enviados
if (isset($_POST['form_descricao']) && isset($_POST['form_curso']) && isset($_POST['form_cargaHoraria']) && isset($_POST['id'])) {

    // recebe os dados do formulário
    $id = $_POST['id'];
    $descricao = $_POST['form_descricao'];
    $curso = $_POST['form_curso'];
    $cargaHoraria = $_POST['form_cargaHoraria'];

    $sql = "UPDATE disciplinas SET descricao = '$descricao', curso = '$curso', cargaHoraria = '$cargaHoraria' WHERE id = $id";

    $pdo->query($sql);
    $mensagem = "Disciplina atualizada com sucesso!";
}

// cria a query de consulta da notícia
$sql = "SELECT * FROM disciplinas WHERE id = $idDisc";
// executa a query
$resultado = $pdo->query($sql);
// transforma o resultado em um array associativo
$resultado = $resultado->fetch(PDO::FETCH_ASSOC);

?>
<div class="container p-3 bg-primary">
    <div>
        <div class="row">
            <div class="col-md-6">
                <h3>Editar Disciplina</h3>
                <p>Edição das disciplinas para o aluno pagar os pecados</p>
                <?php
                // exibe a mensagem de sucesso ou erro usando o operador ternário
                echo (isset($mensagem)) ? "<p class='alert alert-secondary'>$mensagem</p>" : "";
                ?>
            </div>
            <div class="col-md-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div>
                        <input type="hidden" name="id" value="<?php echo (isset($resultado['id'])) ? $resultado['id'] : "" ?>">

                        <label for="descricao" class="form-label w-100">
                            <input class="form-control" type="text" name="form_descricao" placeholder="Descrição da Disciplina" id="descricao" value="<?php echo $resultado['descricao']; ?>" required>
                        </label>
                    </div>
                    <div>
                        <label for="curso" class="form-label w-100">
                            <input class="form-control" type="text" name="form_curso" placeholder="Curso da Disciplina" id="curso" value="<?php echo $resultado['curso']; ?>" required>
                        </label>
                    </div>
                    <div>
                        <label for="cargaHoraria" class="form-label w-100">
                            <input class="form-control" type="number" name="form_cargaHoraria" placeholder="Carga Horária em Horas da Disciplina" id="cargaHoraria" value="<?php echo $resultado['cargaHoraria']; ?>" required>
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

