<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $email = $_POST['mail'];
    $dni = $_POST['dni'];
    $password = password_hash($_POST['contraseña'], PASSWORD_BCRYPT);

    try {
        $stmt = $pdo->prepare("INSERT INTO users (name, surname, email, dni, password) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$nombre, $apellidos, $email, $dni, $password]);

        header("Location: ../html/Gracias-registro.html");
        exit();
    } catch (PDOException $e) {
        header("Location: ../html/LoSiento-Registro.html");
        exit();
    }
}
?>




