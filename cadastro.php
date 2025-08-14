<?php
require 'app/classes/Login.class.php';

$objCadastro = new Login("localhost", "my_agend", "root", "");
$msg = '';

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
    $username = $_POST['usuario'];
    $email = $_POST['email'];
    $password = $_POST['senha_login'];

    // Tenta registrar o usuário
    if ($objCadastro->register($username, $email, $password)) {
        $msg = "Cadastro bem-sucedido! Agora você pode fazer login.";
        // header("Location: index.php"); // Você pode redirecionar para o login após o registro
        // exit;
    } else {
        $msg = "Nome de usuário ou e-mail já existe!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="app/css/style2.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <main class="container">
        <h1>Cadastro</h1>

        <!-- Formulário de cadastro -->
        <form method="POST">
            <?php if ($msg): ?>
                <p style="color:red;"><?php echo $msg; ?></p>
            <?php endif; ?>

            <div class="cad">
                <input type="text" name="usuario" placeholder="Nome de Usuário" required>
                <i class="bx bxs-user"></i>
            </div>

            <div class="cad">
                <input type="email" name="email" placeholder="E-mail" required>
                <i class="bx bxs-envelope"></i>
            </div>

            <div class="cad">
                <input type="password" name="senha_login" placeholder="Senha" required>
                <i class="bx bxs-lock-alt"></i>
            </div>

            <button type="submit" name="submit" class="cadastro">Cadastrar</button>
        </form>

        <div class="login2">
            <p>Já tem uma conta? <a href="index.php">Faça o login</a></p>
        </div>
    </main>
</body>
</html>