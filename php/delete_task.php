<?php
require_once 'config.php';
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Verificar si se ha proporcionado un ID de tarea válido
if (isset($_GET['id'])) {
    $task_id = $_GET['id'];
    $user_id = $_SESSION['user_id'];

    $query = "DELETE FROM tasks WHERE id = '$task_id' AND user_id = '$user_id'";
    mysqli_query($conn, $query);

    header('Location: dashboard.php');
    exit();
}