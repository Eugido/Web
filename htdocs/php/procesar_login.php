<?php
require '../php/db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['mail'];
    $password = $_POST['contraseñaUsuario'];

    try {
        $stmt = $pdo->prepare("SELECT user_id, password FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['usuario_id'] = $user['user_id'];
            $_SESSION['usuario_autenticado'] = true;
            header("Location: ../html/Gracias-identificarse.html");
            exit();
        } else {
            header("Location: ../html/LoSiento-identidad.html");
            exit();
        }
    } catch (PDOException $e) {
        header("Location: ../html/LoSiento-identidad.html");
        exit();
    }
}
?>















