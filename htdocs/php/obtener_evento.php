<?php
require 'db.php';

$event_id = $_GET['event_id'] ?? null;

if (!$event_id) {
    echo json_encode(["error" => "ID del evento no recibido"]);
    exit;
}

$sql = "SELECT event_name, url_image, event_description, event_date, event_type, duration, price FROM events WHERE event_id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$event_id]);

$evento = $stmt->fetch(PDO::FETCH_ASSOC);

if ($evento) {
    echo json_encode($evento);
} else {
    echo json_encode(["error" => "Evento no encontrado"]);
}
?>
