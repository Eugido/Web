<?php
$usuarios = [
    ['1', 'Carlos', 'García', 'carlos.garcia@example.com', '12345678A', 'Burlesque2024!'],
    ['2', 'María', 'López', 'maria.lopez@example.com', '23456789B', 'GlamourNoche99'],
    ['3', 'José', 'Martínez', 'jose.martinez@example.com', '34567890C', 'P@ssionShow123'],
    ['4', 'Ana', 'Fernández', 'ana.fernandez@example.com', '45678901D', 'DivaElegante77'],
    ['5', 'David', 'Rodríguez', 'david.rodriguez@example.com', '56789012E', 'BaileVintage22'],
    ['6', 'Laura', 'Sánchez', 'laura.sanchez@example.com', '67890123F', 'SeductionMaster45!'],
    ['7', 'Miguel', 'Pérez', 'miguel.perez@example.com', '78901234G', 'TallerCabaret88'],
    ['8', 'Lucía', 'Gómez', 'lucia.gomez@example.com', '89012345H', 'FeathersAndGloves2025'],
    ['9', 'Javier', 'Díaz', 'javier.diaz@example.com', '90123456I', 'RitmoSensual66'],
    ['10', 'Elena', 'Moreno', 'elena.moreno@example.com', '01234567J', 'ArtistaBurlesque99']
];

foreach ($usuarios as $usuario) {
    $id = $usuario[0];
    $nombre = $usuario[1];
    $apellidos = $usuario[2];
    $email = $usuario[3];
    $dni = $usuario[4];
    $passwordEncriptada = password_hash($usuario[5], PASSWORD_BCRYPT);

    echo "('$id', '$nombre', '$apellidos', '$email', '$dni', '$passwordEncriptada'),<br>";
}
?>

