<?php
// Configuración de la base de datos
$db_host = 'localhost';
$db_name = 'todolistapp';
$db_user = 'root';
$db_password = '';



// Conexión a la base de datos
$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);

// Verificar la conexión
if (!$conn) {
    die('Error de conexión: ' . mysqli_connect_error());
}
?>