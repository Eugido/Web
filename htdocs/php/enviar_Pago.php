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

    // Cambia la dirección de correo electrónico del destinatario con la variable del formulario
    $correo_destinatario = $_POST['mail'];
    $mail->addAddress($correo_destinatario, 'Destinatario');

    $asunto = 'Entradas';
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $email = $_POST['mail'];
    $entradas = $_POST['Numero-entradas'];

    $mensaje = "Gracias por adquirir entradas\n\n";
    $mensaje .= "A continuacion, se muestra la informacion que nos proporcionaste:\n\n";
    $mensaje .= "Nombre: $nombre\n";
    $mensaje .= "Apellidos: $apellidos\n";
    $mensaje .= "Correo electronico: $email\n";
    $mensaje .= "Numero de Entradas: $entradas\n\n";
    $mensaje .= 'Este correo electronico te acredita por el numero de entradas que figura en el';

    $mail->Subject = $asunto;
    $mail->Body = $mensaje;

    $mail->send();
    header("Location: ../html/Gracias-entradas.html");
} catch (Exception $e) {
    header("Location: ../html/LoSiento-Pago.html");
}
?>



