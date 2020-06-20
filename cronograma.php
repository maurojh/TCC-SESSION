<?php

session_start();

// verificamos se ele está logado:
// se houver id em $_SESSION ele logou
if(!isset($_SESSION['id'])) {
    header("Location:entrada.php");
}

// se estiver logado, mostra cronograma
// aqui o SELECT * FROM cronograma WHERE idUsuario = {$_SESSION['id']}
// ou
// faz:
// $id = $_SESSION['id'];
// e 
// $comando = "SELECT * FROM cronograma WHERE idUsuario = $id";
...