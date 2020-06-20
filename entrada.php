<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Entrada</title>
</head>
<body>
<?php
    session_start();
     
    // Se usuário já estiver logado vai para cronograma.php
    if(isset($_SESSION['id'])) {
        header("Location:cronograma.php");
    }
?>
    <form action="recebe.php">
        E-mail: <input type="email" name="email"><br>
        Senha: <input type="password" name="senha"><br>
        <input type="submit" value="Entrar">
    </form>
</body>
</html>