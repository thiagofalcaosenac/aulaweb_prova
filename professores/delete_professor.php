<?php

// insere o arquivo de conexão com o banco de dados
include("../config/connection.php");

if (isset($_GET['idProf'])) {
    $idProf = $_GET['idProf'];
    $sql = "DELETE FROM professores WHERE id  = '$idProf'";
    $result = $pdo->query($sql);

    if ($result) {
        header("Location: list_professor.php");
    }
}
