<?php
// define o título da página
$titulo = "Gestão escolar";
include_once __DIR__ . "/header_dash.php";
?>

<div class="container p-3">
    <div class="row">
        <div class="col-md-6">
            <h4>Bem vindo</h4>
        </div>
        <div class="col-md-6">
            O sistema de gestão escolar é um software que permite integrar departamentos, automatizar tarefas e simplificar o gerenciamento de instituições de ensino. 
            Como o nome dá a entender, trata-se de uma solução tecnológica própria para o segmento educacional.
        </div>
    </div>
    <div class="row">
        <div class="p-3 col-md-6">        
            <img src="estudando.jpg" class="img-fluid" alt="Responsive image">
        </div>
    </div>
</div>

<?php
// inclui o footer do dashboard
include_once __DIR__ . "/footer_dash.php";
?>