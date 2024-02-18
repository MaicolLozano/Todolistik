<?php
// Configuración de la base de datos
$db_host = 'localhost';
$db_name = 'todolistapp';
$db_user = 'root';
$db_password = '';

// $db_host = 'sql204.infinityfree.com';
// $db_name = 'if0_35962665_todolistapp';
// $db_user = 'if0_35962665';
// $db_password = 'ZJfirSg9aJ';


// Conexión a la base de datos
$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);

// Verificar la conexión
if (!$conn) {
    die('Error de conexión: ' . mysqli_connect_error());
}
?>