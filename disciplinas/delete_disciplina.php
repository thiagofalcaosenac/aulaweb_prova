<?php

// insere o arquivo de conexão com o banco de dados
include("../config/connection.php");

if (isset($_GET['idDisc'])) {
    $idDisc = $_GET['idDisc'];
    $sql = "DELETE FROM disciplinas WHERE id  = '$idDisc'";
    $result = $pdo->query($sql);

    if ($result) {
        header("Location: list_disciplina.php");
    }
}
