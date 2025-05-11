<?php
require 'db.php';

$sql = "SELECT event_id, event_name, url_image, event_description, event_date, event_type, duration, places, price FROM events";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$eventos = $stmt->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode($eventos);
?>

