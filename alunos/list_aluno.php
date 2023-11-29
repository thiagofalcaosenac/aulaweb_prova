<?php
// define o título da página
$titulo = "Painel de Controle - Listar Alunos";
include("../header_dash.php");
include("../config/connection.php");
?>

<div class="container p-3">
    <div class="row">
        <div class="col-md-6">
            <h3>Listar Alunos</h3>
            <p>Explicação sobre a listagem de Alunos</p>
            <?php
            // condicional ternário
            echo (isset($mensagem)) ? "<p class='alert alert-secondary'>$mensagem</p>" : "";
            ?>
        </div>
        <div class="col-md-6">

            <ul class="list-group list-group-numbered">
                <?php
                $sql = "SELECT * FROM alunos";

                $resultado = $pdo->query($sql);

                if ($resultado->rowCount() > 0) :
                    $resultado = $resultado->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($resultado as $alunos) :
                ?>
                        <!-- inicio do looping -->
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <?php echo $alunos['nome']; ?>
                            </div>
                            <div class="ms-2 me-auto">
                                <?php echo $alunos['documento']; ?>
                            </div>
                            <div class="ms-2 me-auto">
                                <?php echo $alunos['email']; ?>
                            </div>
                            <div class="ms-2 me-auto">
                                <?php echo $alunos['sexo']; ?>
                            </div>
                            <div class="ms-2 me-auto">
                                <?php echo $alunos['dataNascimento']; ?>
                            </div>
                            <div class="ms-2 me-auto">
                                <?php echo $alunos['cidade']; ?>
                            </div>
                            <div class="ms-2 me-auto">
                                <?php echo $alunos['estado']; ?>
                            </div>

                            <!-- sistema de botões -->
                            <ul class="list-inline m-0">
                                <!-- Editar -->
                                <li class="list-inline-item">
                                    <a href="edit_aluno.php?idAluno=<?php echo $alunos['id']; ?>" class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="bi bi-pencil"></i></a>
                                </li>
                                <!-- Excluir -->
                                <li class="list-inline-item">
                                    <a href="delete_aluno.php?idAluno=<?php echo $alunos['id']; ?>" class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="bi bi-trash"></i></a>
                                </li>
                            </ul>
                        </li>
                        <!-- fim do looping -->
                <?php
                    // finaliza o foreach inicado com ":"
                    endforeach;

                // note que aqui estamos usando o else do if com ":" e endif; no final
                else :
                    echo "<li class='list-group-item d-flex justify-content-between align-items-start'>";
                    echo "<div class='ms-2 me-auto'>";
                    echo "<div class='fw-bold'>Nenhum aluno cadastrado</div>";
                    echo "</div>";
                    echo "</li>";
                endif;
                ?>
            </ul>
        </div>
    </div>
    <?php
    include("../footer_dash.php");