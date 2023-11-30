<?php
// define o título da página
$titulo = "Painel de Controle - Listar Professores";
include("../header_dash.php");
include("../config/connection.php");
?>

<div class="container p-3 bg-light text-dark">
    <div class="row">
        <div class="col-md-6">
            <h3>Listar Professores</h3>
            <p>Explicação sobre a listagem de professores</p>
            <?php
            // condicional ternário
            echo (isset($mensagem)) ? "<p class='alert alert-secondary'>$mensagem</p>" : "";
            ?>
        </div>
        <div class="col-md-6">

            <ul class="list-group list-group-numbered">
                <!-- Começo a listagem -->
                <?php
                // cria a query de consulta ao banco de dados
                $sql = "SELECT * FROM professores";
                // executa a consulta e armazena o resultado em 
                $resultado = $pdo->query($sql);
                // verifica se houve resultados
                // note que aqui estamos usando o if e else com :
                if ($resultado->rowCount() > 0) :
                    // transforma o resultado em um array associativo
                    $resultado = $resultado->fetchAll(PDO::FETCH_ASSOC);
                    // percorre o array associativo com o foreach
                    // note que aqui estamos usando o foreach com :
                    // com isto vamos precisar usar endforeach; no final
                    foreach ($resultado as $professor) :
                ?>
                        <!-- inicio do looping -->
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <?php echo $professor['matricula']; ?>
                            </div>
                            <div class="ms-2 me-auto">
                                <?php echo $professor['nome']; ?>
                            </div>
                            <div class="ms-2 me-auto">
                                <?php echo $professor['telefone']; ?>
                            </div>
                            <div class="ms-2 me-auto">
                                <?php echo $professor['email']; ?>
                            </div>

                            <!-- sistema de botões -->
                            <ul class="list-inline m-0">
                                <!-- Editar -->
                                <li class="list-inline-item">
                                    <a href="edit_professor.php?idProf=<?php echo $professor['id']; ?>" class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="bi bi-pencil"></i></a>
                                </li>
                                <!-- Excluir -->
                                <li class="list-inline-item">
                                    <a href="delete_professor.php?idProf=<?php echo $professor['id']; ?>" class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="bi bi-trash"></i></a>
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
                    echo "<div class='fw-bold'>Nenhum professor cadastrado</div>";
                    echo "</div>";
                    echo "</li>";
                endif;
                ?>
            </ul>
        </div>
    </div>
    <?php
    include("../footer_dash.php");