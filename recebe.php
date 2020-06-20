<?php
session_start();

if(isset($_SESSION['id'])) {
        // Se usuário já estiver logado vai para cronograma.php
        header("Location:cronograma.php");
}

// se usuário ainda não logou:
$email = $_GET['email'];
$senha = $_GET['senha'];

// só vou pegar id e nome, o email e senha só usamos para testar o usuário
$comando = "SELECT id, nome FROM usuarios WHERE email='$email' AND senha='$senha'";

$mysqli = new mysqli("localhost", "root", "senha", "banco");

if ($mysqli->connect_errno) {
    printf("Erro na conexão: %s\n", $mysqli->connect_error);
    exit();
}

if ($stmt = $mysqli->prepare($comando)) {
    $stmt->execute();
    $stmt->bind_result($id, $nome);
    if ($stmt->fetch()) {
        // se existir o usuário com aquele e-mail e senha
        $_SESSION['id'] = $id; // salva o id para usar no select do cronograma
        $_SESSION['nome'] = $nome; // salva o nome para mostrar ao usuário
        echo "Olá {$_SESSION['nome']}!<br>";
        // mostra o link para o usuário:
        echo "<a href='cronograma.php'>Ir para cronograma</a>";
    }
    $stmt->close();
}

$mysqli->close();
?>