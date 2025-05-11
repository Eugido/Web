<?php
header('Content-Type: application/json');
include 'db.php';

$response = ["images" => [], "videos" => []];

// Obtener imágenes
try {
    $sql_images = "SELECT title_image, url_image, url_icon FROM images";
    $stmt_images = $pdo->query($sql_images);
    while ($row = $stmt_images->fetch()) {
        $response["images"][] = [
            "title" => $row["title_image"],
            "url" => $row["url_image"],
            "icon" => $row["url_icon"]
        ];
    }
} catch (PDOException $e) {
    $response["error"] = "Error al obtener imágenes: " . $e->getMessage();
}

// Obtener videos
try {
    $sql_videos = "SELECT title_video, url_video, url_icon FROM videos";
    $stmt_videos = $pdo->query($sql_videos);
    while ($row = $stmt_videos->fetch()) {
        $response["videos"][] = [
            "title" => $row["title_video"],
            "url" => $row["url_video"],
            "icon" => $row["url_icon"]
        ];
    }
} catch (PDOException $e) {
    $response["error"] = "Error al obtener videos: " . $e->getMessage();
}

echo json_encode($response);
?>





