<?php
session_start();
require 'db.php';

if (!isset($_SESSION['usuario_id'])) {
    echo json_encode(['error' => ' 😉 Identificate para ver tus eventos 😉']);
    exit;
}

$user_id = $_SESSION['usuario_id'];

$sql = "SELECT e.event_id, e.event_name, url_image, e.event_description, e.event_date, 
               e.event_type, e.duration, e.places, e.price
        FROM registrations r
        INNER JOIN events e ON r.event_id = e.event_id
        WHERE r.user_id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$user_id]);
$eventos = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Debugging: Ver la respuesta antes de enviarla
header('Content-Type: application/json');
echo json_encode($eventos, JSON_PRETTY_PRINT);
exit;
?>


