<?php

// insere o arquivo de conexão com o banco de dados
include("../config/connection.php");

if (isset($_GET['idAluno'])) {
    $idDisc = $_GET['idAluno'];
    $sql = "DELETE FROM alunos WHERE id  = '$idDisc'";
    $result = $pdo->query($sql);

    if ($result) {
        header("Location: list_aluno.php");
    }
}
