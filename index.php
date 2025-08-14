<?php
session_start();  
require 'app/classes/Login.class.php';

$objLogin = new Login("localhost", "my_agend", "root", "");

$msg = '';

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($objLogin->login($username, $password)) {
        // Login bem-sucedido, redireciona para page.php
        header("Location: app/page.php");
        exit;  // Garante que o script não continue após o redirecionamento
    } else {
        $msg = "Usuário ou senha incorretos.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="app/css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <main class="container">
        <!-- Formulário de login -->
        <form method="POST">
            <h1>Login</h1>

            <?php if ($msg): ?>
                <p style="color:red;"><?php echo $msg; ?></p>
            <?php endif; ?>

            <div class="input-box">
                <input type="text" name="username" placeholder="Usuário" required>
                <i class="bx bxs-user"></i>
            </div>

            <div class="input-box">
                <input type="password" name="password" placeholder="Senha" required>
                <i class="bx bxs-lock-alt"></i>
            </div>

            <div class="remember-me">
                <label>
                    <input type="checkbox">
                    Lembrar senha
                </label>
                <a href="#">Esqueci a senha</a>
            </div>

            <button type="submit" name="submit" class="login">Login</button>
        </form>

        <!-- Área fora do formulário de login -->
        <div class="register">
            <p>Não tem uma conta?</p>
            <form action="cadastro.php" method="get">
                <button type="submit" class="login">Cadastrar</button>
            </form>
        </div>
    </main>
</body>
</html>