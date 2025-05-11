<?php
session_start();
require 'db.php';

if (!isset($_SESSION['usuario_id'])) {
    echo json_encode(['error' => 'No has iniciado sesión']);
    exit;
}

$user_id = $_SESSION['usuario_id'];
$data = json_decode(file_get_contents("php://input"), true);
$event_id = $data['event_id'] ?? null;

if (!$event_id) {
    echo json_encode(['error' => 'Falta el ID del evento']);
    exit;
}

// Verificar si el evento tiene plazas disponibles
$event_stmt = $pdo->prepare("SELECT places FROM events WHERE event_id = ?");
$event_stmt->execute([$event_id]);
$event = $event_stmt->fetch();

if (!$event) {
    echo json_encode(['error' => 'El evento no existe']);
    exit;
}

if ($event['places'] <= 0) {
    echo json_encode(['error' => 'No quedan plazas disponibles']);
    exit;
}

// Verificar si ya está registrado
$check_stmt = $pdo->prepare("SELECT * FROM registrations WHERE user_id = ? AND event_id = ?");
$check_stmt->execute([$user_id, $event_id]);

if ($check_stmt->rowCount() > 0) {
    echo json_encode(['error' => 'Ya tienes una entrada para este evento.']);
    exit;
}

// Iniciar transacción para evitar inconsistencias
$pdo->beginTransaction();

try {
    // Registrar la compra en la base de datos
    $stmt = $pdo->prepare("INSERT INTO registrations (user_id, event_id) VALUES (?, ?)");
    $stmt->execute([$user_id, $event_id]);

    // Descontar una plaza del evento
    $update_stmt = $pdo->prepare("UPDATE events SET places = places - 1 WHERE event_id = ?");
    $update_stmt->execute([$event_id]);

    // Obtener email del usuario
    $user_stmt = $pdo->prepare("SELECT email FROM users WHERE user_id = ?");
    $user_stmt->execute([$user_id]);
    $user = $user_stmt->fetch();

    if ($user) {
        $to = $user['email'];
        $subject = "Confirmación de compra - Entrada para evento";
        $message = "¡Gracias por tu compra! Te has inscrito correctamente en el evento. Nos vemos pronto.";
        $headers = "From: no-reply@misssweetmimi.com";

        mail($to, $subject, $message, $headers);
    }

    // Confirmar la transacción
    $pdo->commit();
    
    echo json_encode(['success' => true]);
} catch (Exception $e) {
    // Revertir cambios en caso de error
    $pdo->rollBack();
    echo json_encode(['error' => 'No se pudo registrar la compra']);
}
?>

