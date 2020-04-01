<?php

$conexao = new mysqli("localhost", "Riquelme_admin", "12345678", "curso_alura_js");

if($conexao->connect_errno) {
    echo "<p>Encontrei um erro $conexao->errno --> 
    $conexao->connect_error</p>";
    die();
}