<?php
$host = "caboose.proxy.rlwy.net";
$port = "43962";
$dbname = "railway";
$username = "root";
$password = "SONGJFoXzWBWzKLTHLOdSZDOzLfREEbB";

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8", $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    die(json_encode(["error" => "Error en la conexión a la base de datos"]));
}
?>

