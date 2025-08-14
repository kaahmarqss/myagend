<?php
class Login {
    private $pdo;

    public function __construct($host, $db, $user, $pass) {
        $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
        try {
            $this->pdo = new PDO($dsn, $user, $pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erro de conexão: " . $e->getMessage());
        }
    }

    public function register($username, $email, $password) {
        //$hash = password_hash($password, PASSWORD_DEFAULT);
        // Atualize a SQL para inserir o e-mail também
        $sql = "INSERT INTO usuarios_login (usuario, email, senha_usuario) VALUES (:usuario, :email, :senha_usuario)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([':usuario' => $username, ':email' => $email, ':senha_usuario' => $password]);
    }

    public function login($username, $password) {
        $sql = "SELECT * FROM usuarios_login WHERE usuario = :usuario LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':usuario' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($user && $password === $user['senha_usuario']) {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['usuario'] = $user['usuario'];
            return true;
        }
    
        return false;
    }

    

    public function isLoggedIn() {
        session_start();
        return isset($_SESSION['user_id']);
    }

    public function logout() {
        session_start();
        session_unset();
        session_destroy();
    }
}
?>