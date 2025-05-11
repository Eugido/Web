<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/SMTP.php';

$smtpHost = 'smtp.gmail.com';
$smtpPort = 587;
$smtpUsuario = 'gidoeu@gmail.com';
$smtpClave = 'mrljgfplxcyzjvvm';

$mail = new PHPMailer(true);

try {
    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->Host = $smtpHost;
    $mail->SMTPAuth = true;
    $mail->Username = $smtpUsuario;
    $mail->Password = $smtpClave;
    $mail->SMTPSecure = 'tls';
    $mail->Port = $smtpPort;

    $mail->setFrom($smtpUsuario, 'Web Miss Sweet Mimi');
    $mail->addAddress('gidoeu@gmail.com', 'Destinatario');

    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $email = $_POST['mail'];
    $asunto = $_POST['asunto'];
    $mensaje = $_POST['cuentame'];

    $mail->Subject = $asunto;
    $mail->Body    = "Nombre: $nombre\nApellidos: $apellidos\ne-mail: $email\nMensaje: $mensaje";

    $mail->send();
    header("Location: ../html/Gracias-formulario.html");
} catch (Exception $e) {
    header("Location: ../html/LoSiento-formulario.html");
}
?>



